<?php

class TextbookController extends Controller{

const CACHE_TIME = 7200;

public $layout='';
public $canonical;
public $clasModel=null;
public $subjectModel=null;
public $bookModel=null;
public $nested;
public $h1='Підручники';
public $param;
public $keywords='підручники онлайн, скачати підручники';
public $description='Підручники для ';



public function init(){

	$this->param = $this->getActionParams();

	Yii::import('ext.mobileDetect.Mobile_Detect');
    $detect = new Mobile_Detect();
    if( $detect->isMobile() || $detect->isTablet() ){
		Yii::app()->theme = 'm';
    }

    return parent::init();
}

/**
 * Declares class-based actions.
 */
public function actions(){

	return array(
		'page'=>array(
			'class'=>'CViewAction',
		)
	);

}


public function filters() {
	return array(
		// array( 'COutputCache', 'duration'=> 60, ),
		// убираем дубли ссылок
		array('DuplicateFilter')
	);
}



/**
 * This is the default 'index' action that is invoked
 * when an action is not explicitly requested by users.
 */
public function actionIndex(){
	// d($this->createUrl());

// TODO - закешировать на 4 hour
	if($this->beginCache('main-textbook-page-'.Yii::app()->theme->name , array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('p'))) ){

		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
		);

		$activePage = Yii::app()->request->getParam('p','');
		if( $activePage ){
			$page = ' / Сторінка '.$activePage;
		} else {
			$page = '';
		}

		$this->pageTitle = 'Підручники '. Yii::app()->params['clas'].' клас ' .$page;
		$this->description .= ' для ' . Yii::app()->params['clas'].' класу';
		$this->keywords .= ', підручники ' . Yii::app()->params['clas'].' клас';
		$this->canonical = Yii::app()->createAbsoluteUrl('/');

		$criteria = new CDbCriteria;
		$criteria->condition = 't.public=1';
		$criteria->addCondition('t.class_id='.Yii::app()->params['clasId']);
		$criteria->addCondition('t.publish_date<'.time());

		$books = new CActiveDataProvider('Textbook',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>12,'pageVar'=>'p')));

		// кешируем сдесь html страницы
		$this->render('index', array('books'=>$books));


		$this->endCache(); 
	}

}

/**
 * [actionClas description]
 * @return [type] [description]
 */
public function actionClas($clas){
	throw new CHttpException('404', 'page not found');
	$clas = str_replace('-clas', '', $clas);
	// d();

	// TODO - закешировать на сутки
	if($this->beginCache('textbook_clas_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'p'))) ){
		
		$this->checkClas($clas);
		$this->clasModel = TextbookClas::model()->find('name=:clas',array(':clas'=>$clas));

		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
			'Підручники'=>$this->createUrl('/textbook'),
			$clas . ' клас'

		);

		$activePage = Yii::app()->request->getParam('p','');
		if( $activePage ){
			$page = ' / Сторінка '.$activePage;
		} else {
			$page = '';
		}

		$this->keywords = 'підручники для'.$this->clasModel->name . ' класу, підручники онлайн, скачати підручники ';
		$this->description = 'підручники '.$this->clasModel->name . ' клас ';
		// $this->h1 = 'ГДЗ '.(int)$clas.' клас';
		// $this->pageTitle = 'SHKOLYAR.INFO - '.$this->h1;
		// $this->canonical = Yii::app()->createAbsoluteUrl('/'.$clas);

		$this->setMeta($page);

		$criteria = new CDbCriteria;
		$criteria->condition = 't.class_id='.$this->clasModel->id;
		$criteria->addCondition('t.public=1');
		$criteria->addCondition('t.publish_date<'.time());

		$books = new CActiveDataProvider('Textbook', 
			array(
				'criteria'=>$criteria, 
				'pagination'=>array('pageSize'=>12,'pageVar'=>'p'),
			)
		);

		$this->render('clas', array('books'=>$books));

		$this->endCache(); 
	}
}

/**
 * [actionSubject description]
 * @return [type]          [description]
 */
public function actionSubject($clas, $subject){
	$clas = str_replace('-clas', '', $clas);
	// d();

	// TODO - закешировать на сутка
	if($this->beginCache('textbook_subject_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'subject', 'p'))) ){

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		// d($this->subjectModel);

		$activePage = Yii::app()->request->getParam('p','');
		if( $activePage ){
			$page = ' / Сторінка '.$activePage;
		} else {
			$page = '';
		}

		$this->keywords = 'підручники для '.$this->clasModel->name . ' класу '. $this->subjectModel->name.', підручники онлайн, скачати підручники ';
		$this->description = 'підручники '.$this->clasModel->name . ' клас '. $this->subjectModel->name;

		// $this->h1 = 'ГДЗ '.(int)$clas.' клас '. $this->subjectModel->subject->title;
		// $this->pageTitle = 'SHKOLYAR.INFO - '.$this->h1;
		// $this->canonical = Yii::app()->createAbsoluteUrl('/'.$clas.'/'.$subject);
		$this->setMeta($page);

		$criteria = new CDbCriteria;
		$criteria->condition = 't.class_id='.$this->clasModel->id;
		$criteria->addCondition('t.subject_id='.$this->subjectModel->id);
		$criteria->addCondition('t.public=1');
		$criteria->addCondition('t.publish_date<'.time());

		$books = new CActiveDataProvider('Textbook', 
			array(
				'criteria'=>$criteria, 
				'pagination'=>array('pageSize'=>12,'pageVar'=>'p'),
			)
		);

		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
			'Підручники'=>$this->createUrl('/textbook'),
			$this->subjectModel->name
		);

		$this->render('subject', array('books'=>$books));

		$this->endCache(); 
	}
}

/**
 * [actionBook description]
 * @return [type] [description]
 */
public function actionBook( $clas, $subject, $book ){
	$clas = str_replace('-clas', '', $clas);
	// TODO - закешировать на сутка
	if($this->beginCache('textbook_book_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'subject', 'book'))) ){
		
		// $path = Yii::app()->theme->basePath;
	 //    $mainAssets = Yii::app()->AssetManager->publish($path);
		// Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/panzoom.js', CClientScript::POS_END);

		$this->checkClas($clas);
		$this->checkSubject($subject);
		$this->checkBook($book);

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		$this->bookModel = $this->loadBook($book);

		$this->keywords = 'скачати підручник '.$this->clasModel->name . ' клас '. $this->subjectModel->name.' ' . $this->bookModel->author . ' ' . $this->bookModel->year.', підручники онлайн, скачати підручники ';
		$this->description = 'підручник '.$this->clasModel->name . ' клас '. $this->subjectModel->name.' ' . $this->bookModel->author . ' ' . $this->bookModel->year;


		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
			'Підручники'=>$this->createUrl('/textbook'),
			$this->subjectModel->name => $this->createUrl('/textbook/'.$this->clasModel->slug.'/'.$this->subjectModel->slug),
			$this->bookModel->author
		);

		$this->h1 = 'Підручник '.$clas.' клас '. $this->subjectModel->name . ' ' .$this->bookModel->author;
		$this->pageTitle = $this->h1;
		// $this->canonical = Yii::app()->createAbsoluteUrl('/gdz/'.$clas.'/'.$subject.'/'.$book);
		// $this->setMeta();

		$confiId = null;
		if(!empty($this->bookModel->issue_embed)){

			$embedCobfig = json_decode($this->bookModel->issue_embed);
			$confiId = $embedCobfig->rsp->_content->documentEmbed->dataConfigId;
		}

		$this->render('book', array('embedConfigId'=>$confiId));

		$this->endCache(); 
	
	}
}

/**
 * [loadGdzClas description]
 * @param  [type] $clas [description]
 * @return [type]       [description]
 */
private function loadClas($clas){

	$clasModel = TextbookClas::model()->find('name=:clas',array(':clas'=>(int)$clas));
	if( ! $clasModel ){
		throw new CHttpException('404', 'not clas');
	}

	return $clasModel;
}

/**
 * загрузка модели гдз предмета по слагу родительского предмета
 * @param  str $subject slug subject
 * @return GdzSubject
 */
private function loadSubject($subject){

	// d();

	$subjectModel = TextbookSubject::model()->findByAttributes(array('slug'=>$subject));
	// модель предмета
	if( ! $subjectModel){
		throw new CHttpException('404', 'нет такого предмета');
	}

	return $subjectModel;
}

private function loadBook($book){
	// модель книги
	$criteria=new CDbCriteria;
	$criteria->condition='class_id=:classId';
	$criteria->addCondition('subject_id=:subjectId');
	$criteria->addCondition('slug=:slug');
	$criteria->addCondition('t.publish_date<'.time());
	$criteria->addCondition('t.public=1');
	$criteria->params = array(
	    ':classId'=>$this->clasModel->id, 
	    ':subjectId'=>$this->subjectModel->id,
	    ':slug'=>$book
	);
	$gdzBookModel = Textbook::model()->find($criteria);

	// проверка на наличие учебника
	if( ! $gdzBookModel ){
		throw new CHttpException('404', 'нет такого учебника');
	}

	return $gdzBookModel;
}

/**
 * [checkClas description]
 * @param  [type] $clas [description]
 * @return [type]       [description]
 */
private function checkClas($clas){
	if( (int)$clas > 11 || (int)$clas < 5 ){
		throw new CHttpException('404', 'немае такого класу');
	}
}

/**
 * [checkSubject description]
 * @param  [type] $subject [description]
 * @return [type]          [description]
 */
private function checkSubject($subject){
	if( ! $subject ){
		throw new CHttpException('404', 'немае такого предмету');
	}
}

/**
 * [checkBook description]
 * @param  [type] $book [description]
 * @return [type]       [description]
 */
private function checkBook($book){
	if( ! $book ){
		throw new CHttpException('404', 'немае такои книги');
	}
}

private function setMeta($page=''){
	if($this->clasModel){
		$this->h1 = 'Підручники '. $this->clasModel->name.' клас';
		$this->canonical = '/textbook/'.$this->clasModel->slug;
		
	}

	if($this->subjectModel){
		$this->h1 .= ' ' . $this->subjectModel->name . ' ';
		$this->canonical .= '/'.$this->subjectModel->slug;
	}

	if($this->bookModel){
		$this->h1 .= $this->bookModel->author;
		$this->canonical .= '/'.$this->bookModel->slug;
	}

	$this->canonical = Yii::app()->createAbsoluteUrl($this->canonical);
	$this->pageTitle = $this->h1 . $page;
}


public function checkerBook($clas, $subject, $book){

	$bookClas = $this->loadClas($clas, 'textbook');
	// print_r($bookClas);
	// die;
   	$bookSubject = $this->loadSubject($subject, 'textbook');
 
	$criteria = new CDbCriteria;
	$criteria->condition='textbook_clas_id=:classId';
	$criteria->addCondition('textbook_subject_id=:subjectId');
	$criteria->addCondition('slug=:slug');
	$criteria->params = array(
	    ':classId' => $bookClas->id, 
	    ':subjectId' => $bookSubject->id,
	    ':slug' => $book
	);


	return TextbookBook::model()->count($criteria);

}


	public $apiKey = '9rbdd1doh6to113cwl7uoaolchhty5hi';
	public $apiSecret = 'g95gm96itv5ffi1qc5djugcipf274dgt';
    public $url = 'http://upload.issuu.com/1_0';
    public function actionIssue(){

    	// $val = json_decode('{"rsp":{"_content":{"document":{"username":"rompetrom","name":"1","documentId":"151210212009-19f8eba732c446e2aa78f04c446566be","uploadTimestamp":"2015-12-10T21:20:09.000Z","created":"2015-12-10T21:20:09.000Z","revisionId":"151210212009","publicationId":"19f8eba732c446e2aa78f04c446566be","title":"textbook.pdf","access":"public","state":"P","errorCode":0,"preview":false,"category":"000000","type":"000000","orgDocType":"pdf","orgDocName":"textbook.pdf","downloadable":false,"origin":"apiupload","rating":0,"ratingsAllowed":true,"ratingDist":"0|0|0|0|0","likes":0,"commentsAllowed":false,"showDetectedLinks":false,"pageCount":0,"dcla":"3|||||||0|0","ep":1449705600,"publishDate":"2015-12-10T00:00:00.000Z","coverWidth":0,"coverHeight":0}},"stat":"ok"}}');
    	// d($val);

//     	echo '<form action="http://upload.issuu.com/1_0" enctype="multipart/form-data" method="post"> 
//   <input type="hidden" name="action" value="issuu.document.upload"/> 
//   <input type="hidden" name="apiKey" value="9rbdd1doh6to113cwl7uoaolchhty5hi"/> 
//   <input type="hidden" name="name" value="textbook"/> 
//   <input type="hidden" name="title" value="english"/> 
//   <input type="hidden" name="signature" value="810b910ed5c8a53d704fd062a6001b22"/> 
//   <input type="file" name="file"/> 
//   <input type="text" name="signature" value="'.md5($this->apiSecret.'actionissuu.document.uploadapiKey'.$this->apiKey.'nametextbooktitleenglish').'"/> 
//   <input type="submit" value="Upload"/> 
// </form>';
    	file_put_contents('filename', 1);

    	$textbooks = Textbook::model()->findAll();
    	foreach($textbooks as $textbook){
    		if($textbook->issue_id){
    			continue;
    		}
    		$pdf = $textbook->getImgDir(false).'textbook.pdf';
    		if(!file_exists($pdf)){
    			echo 'no file '.$pdf ."\n";
    			continue;
    		}

	        $data = array(
	        	'apiKey' => $this->apiKey,
	        	'action'=>'issuu.document.upload',
	        	'name'=>$textbook->id,
	        	'format'=>'json',
	        	'title'=>$textbook->clas->slug . '-'. $textbook->subject->slug.'-'.$textbook->slug,
        	);

        	ksort($data);
        	$signature = $this->apiSecret;
        	foreach($data as $key => $value){
        		$signature .=$key.$value;
        	}
        	$cFile = curl_file_create(realpath($pdf), 'application/pdf', 'textbook.pdf');

        	$data['signature'] = md5($signature);
        	// $data['file'] = '@'.realpath($pdf).';filename="textbook.pdf;mime=application/pdf"';
        	$data['file'] = $cFile;

        	// d($data);

        	$headers = array("Content-Type:multipart/form-data"); 
	        $curl = curl_init();
	        curl_setopt($curl, CURLOPT_URL, $this->url);
	        curl_setopt($curl, CURLOPT_USERAGENT,'Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15');
	        curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
	        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // stop verifying certificate
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($curl, CURLOPT_POST, true); // enable posting
	        curl_setopt($curl, CURLOPT_POSTFIELDS,  $data); // post images
	        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
	        $r = curl_exec($curl);

	        print_r($r);
	        curl_close($curl);
	        
	        $response = json_decode($r);
	        if( isset($response->rsp->_content->document->documentId) ){
	        	$textbook->issue_id = $response->rsp->_content->document->documentId;
	        	$textbook->save();
	        } else {
	        	print_r($response);
	        }

	        // break;
    		
    	}

        
    }

    public function actionEmbed()
    {
    	ini_set('max_execution_time', 0);
    	$textbooks = Textbook::model()->findAll();
    	foreach($textbooks as $textbook){

    		if(empty($textbook->issue_id) || !empty($textbook->issue_embed)){
    			continue;
    		}

			$data = array(
	        	'apiKey' => $this->apiKey,
	        	'action'=>'issuu.document_embed.add',
	        	'documentId'=>$textbook->issue_id,
	        	'format'=>'json',
	        	'readerStartPage'=>'1',
	        	'width'=>'700',
	        	'height'=>'500',
        	);

        	ksort($data);
        	$signature = $this->apiSecret;
        	foreach($data as $key => $value){
        		$signature .=$key.$value;
        	}
        	$data['signature'] = md5($signature);

        	// echo http_build_query($data);

	        $curl = curl_init();
	        curl_setopt($curl, CURLOPT_URL, 'http://api.issuu.com/1_0');
	        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // stop verifying certificate
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($curl, CURLOPT_POST, true); // enable posting
	        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // post images
	        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
	        $r = curl_exec($curl);

	        print_r(curl_error($curl));
	        curl_close($curl);

	        $response = json_decode($r);
	        if(isset($response->rsp->_content->documentEmbed)){
	        	$textbook->issue_embed = $r;
	        	$textbook->save();
	        } else {
	        	echo $r;
	        }

	        sleep(5);

	        // break;

    	}
    }


    public function actionSync()
    {
    	$url = Yii::app()->request->getParam('u', null);

		$criteria = new CDbCriteria;
		$criteria->condition = 't.issue_id IS NOT NULL';
    	$textbooks = Textbook::model()->findAll($criteria);

    	// d($textbooks);
    	foreach($textbooks as $textbook){
    		$this->curl('http://mygdz.pp.ua/textbook/syncPost', $textbook);
    		// sleep();
    		// break;
    	}



    }

    public function actionSyncPost()
    {
    	$id = Yii::app()->request->getPost('id', null);
    	$issue_id = Yii::app()->request->getPost('issue_id', null);
    	$issue_embed = Yii::app()->request->getPost('issue_embed', null);

    	$textbook = Textbook::model()->findByPk($id);
    	$textbook->issue_id = $issue_id;
    	$textbook->issue_embed = $issue_embed;
    	$textbook->save();

    	echo 1;
    }

    protected function curl($url, $model)
    {

    	$data = array(
    		'id'=>$model->id,
    		'issue_id'=>$model->issue_id,
    		'issue_embed'=>$model->issue_embed
		);

		$dataStr = http_build_query($data);
		// d($dataStr);

    	$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT,'Opera/9.80 (Windows NT 6.2; Win64; x64) Presto/2.12.388 Version/12.15');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true); // enable posting
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dataStr); // post images
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // if any redirection after upload
        $r = curl_exec($curl);
        curl_close($curl);

        print_r($r);
    }

}