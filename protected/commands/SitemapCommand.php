<?php

date_default_timezone_set('Europe/Kiev');

/**
 * Class SitemapCommand
 */
class SitemapCommand extends CConsoleCommand {

	private $siteUrl = 'http://shkolyar.info';
	private $lastModify = array();

	const ALWAYS = 'always';
    const HOURLY = 'hourly';
    const DAILY = 'daily';
    const WEEKLY = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY = 'yearly';
    const NEVER = 'never';

    protected $items = array();

	public function actionIndex() {

		$this->addUrl('', self::WEEKLY, 0.2, Helper::lastPublicTime() );
		$this->addUrl('/about', self::MONTHLY, 0.1, 1420326180 );
		$this->addUrl('/contacts', self::MONTHLY, 0.1, 1420326180 );
		$this->addUrl('/advertiser', self::MONTHLY, 0.1, 1420326180 );
		$this->addUrl('/rules', self::MONTHLY, 0.1, 1420326180 );
		$this->addUrl('/rightholder', self::MONTHLY, 0.1, 1420326180 );
		$this->addUrl('/gdz', self::MONTHLY, 0.2, Helper::lastPublicTime('GdzBook') );
		$this->addUrl('/textbook', self::MONTHLY, 0.2, Helper::lastPublicTime('TextbookBook') );
		$this->addUrl('/writing', self::MONTHLY, 0.2, Helper::lastPublicTime('Writing') );
		$this->addUrl('/knowall', self::MONTHLY, 0.2, Helper::lastPublicTime('Knowall') );
		$this->addModels( Clas::model()->findAll(), self::WEEKLY, 0.2);
		$this->addModels( GdzClas::model()->findAll(), self::WEEKLY, 0.2);
		// $this->addModels( TextbookClas::model()->findAll(), self::WEEKLY, 0.2);
		// $this->addModels( Subject::model()->findAll(), self::DAILY, 0.5);
		// $this->addModels( GdzSubject::model()->findAll(), self::DAILY, 0.5);
		// $this->addModels( TextbookSubject::model()->findAll(), self::DAILY, 0.5);
		// $this->addModels( GdzBook::model()->public()->findAll(), self::DAILY, 0.8);
		// $this->addModels( TextbookBook::model()->public()->findAll(), self::DAILY, 0.8);
		// $this->addModels( Writing::model()->public()->findAll(), self::DAILY, 0.8);
		// $this->addModels( TextbookBook::model()->public()->findAll(), self::DAILY, 0.8);
		$xml = $this->render();

		file_put_contents(Yii::app()->basePath . '/../sitemap.xml', $xml);
	}

	 /**
     * @param $url
     * @param string $changeFreq
     * @param float $priority
     * @param int $lastmod
     */
    public function addUrl($url, $changeFreq=self::DAILY, $priority=0.5, $lastMod=0)
    {
        $item = array(
            'loc' => $this->siteUrl . $url,
            'changefreq' => $changeFreq,
            'priority' => $priority
        );
        if ($lastMod){
            $item['lastmod'] = $this->dateToW3C($lastMod);
 		}

        $this->items[] = $item;
    }

    /**
     * @param CActiveRecord[] $models
     * @param string $changeFreq
     * @param float $priority
     */
    public function addModels($models, $changeFreq=self::DAILY, $priority=0.5){
        $time=time();

        // print_r($models);
        // die;
        foreach ($models as $model){

            //  добаляем в карту только опубликованные
            if( isset($model->created) ){
                if( $time < $model->created ){
                    continue;
                }
            }

            $item = array(
                'loc' => $this->siteUrl . $model->getUrl(),
                'changefreq' => $changeFreq,
                'priority' => $priority
            );
 
            if ($model->hasAttribute('update_time')){

            	if(isset($model->public_time)){
            		if($model->public_time > $model->update_time){
            			$item['lastmod'] = $this->dateToW3C($model->public_time);
            		} else {
            			$item['lastmod'] = $this->dateToW3C($model->update_time);
            		}
            	} else {
                	$item['lastmod'] = $this->dateToW3C($model->update_time);
            	}


            }
 
            $this->items[] = $item;
        }
    }

    /**
     * @return string XML code
     */
    public function render()
    {
        $dom = new DOMDocument('1.0', 'utf-8');
        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
        foreach($this->items as $item)
        {
            $url = $dom->createElement('url');
 
            foreach ($item as $key=>$value)
            {
                $elem = $dom->createElement($key);
                $elem->appendChild($dom->createTextNode($value));
                $url->appendChild($elem);
            }
 
            $urlset->appendChild($url);
        }
        $dom->appendChild($urlset);
 
        return $dom->saveXML();
    }
 
    protected function dateToW3C($date)
    {
    	
        if (is_int($date)){
            $dateTime = new DateTime(date('Y-m-d\TH:i:sP',$date));
            return $dateTime->format(DateTime::W3C);
        } else {

            $dateTime = new DateTime(date('Y-m-d\TH:i:sP',strtotime($date)));
            return $dateTime->format(DateTime::W3C);
        }
    }

	
}
