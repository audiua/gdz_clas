<?php

class PositionController extends Controller{
	// d();

	const TOKEN = 'token';

	// 7 дней
	const PERIOD = 25200;
	private $googleUrl = 'https://www.google.com.ua/search?hl=ru&num=50&btnG=%D0%9F%D0%BE%D0%B8%D1%81%D0%BA%2B%D0%B2%2BGoogle&as_epq=&as_oq=&as_eq=&lr=&cr=&as_ft=i&as_filetype=&as_qdr=all&as_occt=any&as_dt=i&as_sitesearch=&as_rights=&safe=images&gws_rd=ssl';

	private $keyword;
	private $host = 'mygdz.pp.ua';
	private $maxPosition = 100;

	public function actionIndex($token){
		// echo 'AAAAA';
		// d();

		if($token !== self::TOKEN){
			Yii::app()->end();
		}

		// получаем ключевое слово
		$this->keyword = $this->nextKeyword();
		// d($this->keyword);

		// проверка последнего времени обновления ключевого слова
		// если есть проверка меньше недели назад, то выходим
		if($this->checkKeyword()){
			// Yii::app()->end();
		}

		$newPosition = new KeywordPosition;
		$newPosition->google_position = $this->google();
		$newPosition->yandex_position = $this->yandex();
		$newPosition->keyword_id = $this->keyword->id;
		$newPosition->create_time = time();

		$newPosition->save();

	}

	/**
	 * google проверка позиции ключевого слова в гугле
	 * @return int  позиция в поиске(0-100)
	 */
	protected function google(){
		// d('google');

		$url = $this->googleUrl .'&as_q='.urlencode ($this->keyword->keyword);
		$start = 0;

		while($start <= 1){

			$url .= '&start='.$start;


			$googleResult = $this->curl($url);

			// if( ! file_exists('google_result')){
			// 	$googleResult = $this->curl($url);
			// 	file_put_contents('google_result', $googleResult );
			// } else {
			// 	$googleResult = file_get_contents('google_result');
			// }

			if(!$googleResult){
				return 0;
			}
			echo 'google';

			if(preg_match_all('/<h3 class="r"><a href="(.+?)"/is', $googleResult, $match)){
				// d($match);

				foreach($match[1] as $i => $item){
					// echo $item;
					// echo '<br>';
					if(stripos($item, $this->host) !== false){
						echo ($i+1) + ($start*50);
						return ($i+1) + ($start*50);
					}
				}

	        }

	        $start++;
	        sleep(3);
		}

		return 0;

	}

	/**
	 * yandex проверка позиции ключевого слова в yandex
	 * @return int  позиция в поиске
	 */
	protected function yandex(){
		$user = 'AUDIUA';
		$key = '03.115914496:e9bba095fea958c7cb529a6cf2ead1cc';
		$query = urlencode ($this->keyword->keyword);
		$url = 'http://xmlsearch.yandex.ru/xmlsearch?user='.$user.'&key='.$key.'&query='.$query.'&l10n=uk&sortby=rlv&filter=strict&groupby=attr%3Dd.mode%3Ddeep.groups-on-page%3D100.docs-in-group%3D1';
		$yandexXml = $this->curl($url);
		
		if($yandexXml){
			echo 'yandex';
			$xml = simplexml_load_string($yandexXml);
			echo '<pre>';
			print_r($xml);
			// d($xml);
			$position = 0;
			// echo $this->keyword->keyword;
			// echo '<br>';
			foreach ($xml->response->results->grouping->group as $group){
				// echo $group->doc->url;
				// echo '<br>';
			    $position++;
			    if ( stripos($group->doc->url, $this->host) !== false ) {

			        return $position;
			    }
				
			}
		}

		return 0;
	}

	/**
	 * nextKeyword возвращает ключевое слово, с самым малым полем обновления
	 * @return object Keyword
	 */
	protected function nextKeyword(){
		$criteria = new CDbCriteria;
		// сортируем по возрастанию по времени обновления
		// самый давний вначале
		$criteria->order = 'update_time ASC';
		$keyword = Keyword::model()->find($criteria);
		$keyword->update_time = time();

		// обновляем его - что он проверен
		$keyword->update();

		return $keyword;
	}

	/**
	 * checkKeyword проверяет дату последней проверки ключевого слова - пропускает старше недели(26200 сек разницы)
	 * @return boolean
	 */
	protected function checkKeyword(){
		$criteria = new CDbCriteria;
		$criteria->condition = 'keyword_id = '.$this->keyword->id;
		// берем только меньше недели
		$criteria->addCondition('create_time > '.time()-self::PERIOD);
		$checkPosition = KeywordPosition::model()->find($criteria);
		// d($checkPosition);
		
		
		if($checkPosition){
			return true;
		}

		return false;
	}

	private function curl($url){
		$curl = curl_init();
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		// curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,30);
		return curl_exec($curl);
	}




}
