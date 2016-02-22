<?php 


class Helper{

	/**
	 * длина статьи
	 * @param  Article $article
	 * @return int  длина статьи
	 */
	public static function getLength( $article ){

		$lenght = 0;

		// content
		if(isset($article->text)){
			$content = strip_tags($article->text);
			$content = str_replace( ' ', '', $content );
			$contentLength = mb_strlen($content, 'utf-8');
			$lenght += $contentLength;
		}

		if(isset($article->description)){
			$description = strip_tags($article->description);
			$description = str_replace( ' ', '', $description );
			$descriptionLength = mb_strlen($description, 'utf-8');
			$lenght += $descriptionLength;
		}

		// title
		if(isset($article->title)){
			$title = strip_tags($article->title);
			$title = str_replace( ' ', '', $title );
			$titleLength = mb_strlen($title, 'utf-8');
			$lenght += $titleLength;
		}

		return $lenght;

	}

	public static function getShortAuthor($author){
		return substr($author,0, stripos($author, ' '));
	}

	public static function getShort($title){

		$title = mb_strtolower($title, 'utf8');

		$short = array(
			'українська мова'=>'укр-мова',
			'українська література'=>'укр-літ',
			'російська мова'=>'рос-мова',
			'зарубіжна література'=>'зар-літ',
		);

		return isset($short[$title]) ? $short[$title] : $title ;
	}

	public static function getOwner(){
		return array(
			'writing'=>'твори',
			'gdz'=>'гдз',
			'textbook'=>'підручники',
			'knowall'=>'всезнайка',
			'site'=>'сайт'
		);
	}

	public static function getAction(){
		return array(
			'clas'=>'clas',
			'index'=>'index',
			'page'=>'page',
			'subject'=>'subject',
			'currentSubject'=>'currentSubject',
			'category'=>'category',
		);
	}

	public static function getPageMode(){
		return array(
			''=>'',
			'about'=>'Про нас',
			'rules'=>'Правила',
			'rightholder'=>'Правовласникам',
			'advertiser'=>'Рекламодавцям',
			'contacts'=>'Контакти',
		);
	}

	public static function lastTime($mode = null){

		$models = array(
			'GdzBook', 
			'TextbookBook', 
			'Knowall', 
			// 'libraryBook', 
			// 'libraryAuthor',
			// 'Writing'
		);

		$order = array(
			'public', 
			'update'
		);

		$lastTime=0;

		foreach($order as $item){

			$criteria=new CDbCriteria;
			$criteria->order = "`{$item}_time` DESC";
			$criteria->limit = 1;

			if(!$mode){
	    		foreach($models as $model){
	    			$last = $model::model()->public()->find($criteria);

	    			if(! $last){
	    				continue;
	    			}

	    			if( isset($last->public_time) && !is_null($last->public_time) ){
	    				$last->public_time = strtotime($last->public_time);

	    				if( $last->public_time > time() || $last->update_time > $last->public_time ){
	    					$lastTime = ( $last->update_time > $lastTime ) ? $last->update_time : $lastTime ;
	    				} else {
				    		$lastTime = ( $last->public_time > $lastTime ) ? $last->public_time : $lastTime ;
	    				}
	    			} else {
	    				if( $last->update_time > $lastTime ){
	    					$lastTime = $last->update_time;
	    				}
	    			}
	    		}

			} else {

				$last = $mode::model()->public()->find($criteria);
				if(!$last){
					continue;
				}
				
				if( isset($last->public_time) && !is_null($last->public_time) ){
					$last->public_time = strtotime($last->public_time);
					if( $last->public_time > time() || $last->update_time > $last->public_time ){
						$lastTime = ( $last->update_time > $lastTime ) ? $last->update_time : $lastTime ;
					} else {
			    		$lastTime = ( $last->public_time > $lastTime ) ? $last->public_time : $lastTime ;
					}

				} else {
					if( $last->update_time > $lastTime ){
						$lastTime = $last->update_time;
					}
				}
	    	}
		}

		
		return (int)$lastTime;
	}

	/**
	 * [lastDescriptionTime description]
	 * @param  [type] $owner     [description]
	 * @param  [type] $action    [description]
	 * @param  [type] $clasId    [description]
	 * @param  [type] $subjectId [description]
	 * @return [type]            [description]
	 */
	public static function lastDescriptionTime( $owner, $action, $mode=null, $clasId=null, $subjectId=null ){
		$criteria = new CDbCriteria;
		$criteria->condition = 'owner=:owner';
		$criteria->addCondition('action=:action');

		if($mode){
			$criteria->addCondition('page_mode="'.$mode.'"' );
		}

		if($clasId){
			$criteria->addCondition('clas_id='.(int)$clasId );
		}

		if($subjectId){
			$criteria->addCondition('subject_id='.(int)$subjectId );
		}

		$criteria->params = array(':owner'=>$owner, ':action'=>$action);

		$model = Description::model()->find($criteria);
		if($model){
			return (int)$model->update_time;
		}
	}
}