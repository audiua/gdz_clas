<?php
/**
 * Класс RssCommand
 */
class RssCommand extends ConsoleCommand
{
	/**
	 * Пидфайл
	 * @var string
	 */
	protected $pidFile = 'sendemail.pid';

	/**
	 * Включаем режим "не создавать пид-файл"
	 */
	protected function testMode() { return true;}

	/**
	 * Запускаем процесс отправки писем
	 */
	protected function process()
	{
		$site_url = 'http://sovets.net';

		$doc = new DOMDocument("1.0", 'utf-8');
		$rss = $doc->createElement("rss");
		$doc->appendChild($rss);

		$version = $doc->createAttribute("version");
		$rss->appendChild($version);
		$value = $doc->createTextNode('2.0');
		$version->appendChild($value);

		$xmlns = $doc->createAttribute("xmlns:dc");
		$rss->appendChild($xmlns);
		$value = $doc->createTextNode('http://purl.org/dc/elements/1.1/');
		$xmlns->appendChild($value);

		$channel = $doc->createElement("channel");
		$rss->appendChild($channel);

		$channelAttributes = array('title', 'link', 'language', 'description', 'generator');
		foreach ($channelAttributes as $channelAttribute) {
			$element = $doc->createElement($channelAttribute);
			$channel->appendChild($element);
			$value = $doc->createTextNode(SiteConfig::getInstance()->getValue("rss_{$channelAttribute}"));
			$element->appendChild($value);
		}

        // Новости за последнию неделю
		$time = time() - 3600 * 24 * 7;

		$criteria = new CDbCriteria();
		$criteria->addCondition("create_time > {$time}");
        $criteria->addCondition("(publish_date <= now() || publish_date IS NULL)");
        $criteria->order = 'id DESC';

        $articles = Article::model()->findAll($criteria);

		foreach ($articles as $article)
		{
			$attributes = array();
			$attributes['title'] = $article->title;
			$attributes['date'] = $article->lastmod;
			$attributes['url'] = '/' . $article->id . '-' . $article->name . '.html';
			$attributes['description'] = $article->meta_description;
			$attributes['category'] = !empty($article->category)?$article->category->title:'';
			$attributes['author']  = !empty($article->author)?$article->author->full_name:'';

			$this->addItem($doc, $channel, $attributes);
		}

		$doc->formatOutput = true;
		$doc->save(dirname(__FILE__) ."/../../rss.xml");

		echo $doc->saveXML();
	}

	private function addItem(& $doc, & $channel, $attributes)
	{
		$site_url = 'http://sovets.net';

		$item = $doc->createElement('item');
		$channel->appendChild($item);

		$title = $doc->createElement('title');
		$item->appendChild($title);
		$value = $doc->createTextNode($attributes['title']);
		$title->appendChild($value);

		$guid = $doc->createElement('guid');
		$item->appendChild($guid);
		$value = $doc->createTextNode($site_url . $attributes['url']);
		$guid->appendChild($value);

		$isPermaLink = $doc->createAttribute("isPermaLink");
		$guid->appendChild($isPermaLink);
		$value = $doc->createTextNode('true');
		$isPermaLink->appendChild($value);

		$link = $doc->createElement('link');
		$item->appendChild($link);
		$value = $doc->createTextNode($site_url . $attributes['url']);
		$link->appendChild($value);

		$description = $doc->createElement('description');
		$item->appendChild($description);
		$value = $doc->createCDATASection($attributes['description']);
		$description->appendChild($value);

		$category = $doc->createElement('category');
		$item->appendChild($category);
		$value = $doc->createCDATASection($attributes['category']);
		$category->appendChild($value);

		$author = $doc->createElement('dc:creator');
		$item->appendChild($author);
		$value = $doc->createTextNode($attributes['author']);
		$author->appendChild($value);

		$pubDate = $doc->createElement('pubDate');
		$item->appendChild($pubDate);
		$value = $doc->createTextNode(date('D, d M Y H:i:s O', $attributes['date']));
		$pubDate->appendChild($value);
	}


}