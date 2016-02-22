<?php

class SiteController extends Controller{

const CACHE_TIME = 7200;

public $layout='';
public $canonical;
public $clasModel=null;
public $subjectModel=null;
public $bookModel=null;
public $nested;
public $h1='Готові домашні завдання для ';
public $param;
public $keywords='готові домашні завдання, гдз, гдз онлайн, гдз україна, гдз решебники, gdz';
public $description='ГДЗ - готові домашні завдання онлайн, для середніх загальноосвітніх шкіл України.';



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

// 	$path = Yii::app()->basePath . '/extensions/PHPGoogleKeywordPosition/GoogleRankChecker.php';
// 	// d($path);
// 	include($path);
// $newGoogleRankChecker 	= new GoogleRankChecker();
// $newquery 		= 'учебники';
// $useproxies 		= false;
// $arrayproxies 		= [];
// $googledata 		= $newGoogleRankChecker->find($newquery, $useproxies, $arrayproxies);
// var_dump($googledata);


	// TODO - закешировать на 4 hour
	if($this->beginCache('main-gdz-page-'.Yii::app()->theme->name , array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('p'))) ){

		$this->breadcrumbs = array(

		);

		$activePage = Yii::app()->request->getParam('p','');
		if( $activePage ){
			$page = ' / Сторінка '.$activePage;
		} else {
			$page = '';
		}

		$this->pageTitle = 'Готові домашні завдання'.$page;
		$this->h1 .= Yii::app()->params['clas'].' класу';
		$this->canonical = Yii::app()->createAbsoluteUrl('/');

		$criteria = new CDbCriteria;
		$criteria->condition = 't.public=1';
		$criteria->addCondition('t.class_id='.Yii::app()->params['clasId']);
		$criteria->addCondition('t.create_time<'.time());

		$books = new CActiveDataProvider('Book',array('criteria'=>$criteria,'pagination'=>array('pageSize'=>12,'pageVar'=>'p')));

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


	// d();

	// TODO - закешировать на сутки
	if($this->beginCache('gdz_clas_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'p'))) ){
		
		$this->checkClas($clas);
		$this->clasModel = $this->loadClas($clas);

		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
			$clas . ' клас'

		);

		$activePage = Yii::app()->request->getParam('p','');
		if( $activePage ){
			$page = ' / Сторінка '.$activePage;
		} else {
			$page = '';
		}

		$this->keywords = 
			'ГДЗ - готові домашні завдання '.$clas.' клас, 
			гдз '.$clas. ' клас, 
			гдз онлайн '.$clas. ' клас, 
			гдз '.$clas. ' клас Україна, 
			гдз решебники '.$clas.' клас, 
			готові домашні завдання '.$this->clasModel->title.' клас, 
			гдз '.$this->clasModel->title.' клас';

		$this->description = 'ГДЗ - готові домашні завдання для ' . $clas . ' класу середніх загальноосвітніх шкіл України.';
		// $this->h1 = 'ГДЗ '.(int)$clas.' клас';
		// $this->pageTitle = 'SHKOLYAR.INFO - '.$this->h1;
		// $this->canonical = Yii::app()->createAbsoluteUrl('/'.$clas);

		$this->setMeta($page);

		$criteria = new CDbCriteria;
		$criteria->condition = 't.class_id='.$this->clasModel->id;
		$criteria->addCondition('t.public=1');
		$criteria->addCondition('t.public_time<'.time());

		$books = new CActiveDataProvider('Book', 
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

	// d();

	// TODO - закешировать на сутка
	if($this->beginCache('gdz_subject_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'subject', 'p'))) ){

		$this->checkClas($clas);
		$this->checkSubject($subject);

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		// d($this->subjectModel);

		$activePage = Yii::app()->request->getParam('p','');
		if( $activePage ){
			$page = ' / Сторінка '.$activePage;
		} else {
			$page = '';
		}

		$this->keywords = 'ГДЗ - готові домашні завдання ' . $this->subjectModel->title . ' ' 
			.$clas.' клас, гдз '. $this->subjectModel->title . ' ' .$clas.' клас, гдз онлайн '
			. $this->subjectModel->title . ' ' .$clas. ' клас, гдз '. $this->subjectModel->title . ' ' .$clas. ' клас Україна, гдз решебники '
			. $this->subjectModel->title . ' ' .$clas.' клас, готові домашні завдання '. $this->subjectModel->title . ' ' .$this->clasModel->title.' клас, гдз '. $this->subjectModel->title . ' ' .$this->clasModel->title.' клас';

		$this->description = 'ГДЗ - готові домашні завдання ' 
			. $this->subjectModel->title . ' ' .$clas.' клас, для середніх загальноосвітніх шкіл України.';

		// $this->h1 = 'ГДЗ '.(int)$clas.' клас '. $this->subjectModel->subject->title;
		// $this->pageTitle = 'SHKOLYAR.INFO - '.$this->h1;
		// $this->canonical = Yii::app()->createAbsoluteUrl('/'.$clas.'/'.$subject);
		$this->setMeta($page);

		$criteria = new CDbCriteria;
		$criteria->condition = 't.class_id='.$this->clasModel->id;
		$criteria->addCondition('t.subject_id='.$this->subjectModel->id);
		$criteria->addCondition('t.public=1');
		$criteria->addCondition('t.public_time<'.time());

		$books = new CActiveDataProvider('Book', 
			array(
				'criteria'=>$criteria, 
				'pagination'=>array('pageSize'=>12,'pageVar'=>'p'),
			)
		);

		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
			$this->subjectModel->title
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

	// TODO - закешировать на сутка
	if($this->beginCache('gdz_book_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'subject', 'book'))) ){
		
		// $path = Yii::app()->theme->basePath;
	 //    $mainAssets = Yii::app()->AssetManager->publish($path);
		// Yii::app()->getClientScript()->registerScriptFile($mainAssets.'/js/panzoom.js', CClientScript::POS_END);

		$this->checkClas($clas);
		$this->checkSubject($subject);
		$this->checkBook($book);

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		$this->bookModel = $this->loadBook($book);

		$this->keywords = 'ГДЗ - готові домашні завдання ' . $this->subjectModel->title . ' ' 
			.$clas.' клас ' . $this->bookModel->author . ', гдз '. $this->subjectModel->title . ' ' .$clas.' клас ' . $this->bookModel->author . ', гдз онлайн '
			. $this->subjectModel->title . ' ' .$clas. ' клас ' . $this->bookModel->author . ', гдз '. $this->subjectModel->title . ' ' .$clas. ' клас ' . $this->bookModel->author . ' україна, гдз решебники '
			. $this->subjectModel->title . ' ' .$clas.' клас ' . $this->bookModel->author . ', готові домашні завдання '. $this->subjectModel->title . ' ' .$this->clasModel->title.' клас ' . $this->bookModel->author . ', гдз '. $this->subjectModel->title . ' ' .$this->clasModel->title.' клас ' . $this->bookModel->author . '';

		$this->description = 'ГДЗ - готові домашні завдання ' 
			. $this->subjectModel->title . ' ' .$clas.' клас ' . $this->bookModel->author . ', для середніх загальноосвітніх шкіл України.';


		$this->breadcrumbs = array(
			'Головна'=>Yii::app()->homeUrl,
			$this->subjectModel->title => $this->createUrl('/'.$clas.'/'.$subject),
			$this->bookModel->author
		);

		// $this->h1 = 'ГДЗ '.(int)$clas.' клас '. $this->subjectModel->subject->title . ' ' .$this->bookModel->author;
		// $this->pageTitle = 'SHKOLYAR.INFO - '.$this->h1;
		// $this->canonical = Yii::app()->createAbsoluteUrl('/gdz/'.$clas.'/'.$subject.'/'.$book);\
		$this->setMeta();

		$this->render('book');

		$this->endCache(); 
	
	}
}

/**
 * 
 * @return [type] [description]
 */
public function actionTask($clas, $subject, $book, $task){


	// sleep(5);

	// TODO - закешировать на 30 days
	if($this->beginCache('task_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas', 'subject', 'book','task'))) ){

		$this->checkClas($clas);
		$this->checkSubject($subject);
		$this->checkBook($book);

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		$this->bookModel = $this->loadBook($book);

		$pathImg['path'] = $clas . '/' 
		. $subject . '/' 
		. $book . '/task/'
		. $task .'.png';

		if( ! file_exists( Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path'])){
			$_GET = null;
			throw new CHttpException('404', 'такого задания в этом учебнике нету');
		}

		$imgSize = getimagesize( Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path']);
		$pathImg['width'] = $imgSize[0];
		$pathImg['height'] = $imgSize[1];
		// $pathImg['width'] = getimagesize($_SERVER['DOCUMENT_ROOT'] . 'images/' . $pathImg['path'])[0];


		if(Yii::app()->request->isAjaxRequest){
				
			echo  CHtml::image( 
				Yii::app()->baseUrl .'/images/gdz/'.$pathImg['path'],
				'ГДЗ - готові домашні завдання '
				.$this->subjectModel->title . ' '
				.$this->param['clas']
				.' клас '.$this->bookModel->author
				.' рішення до завдяння '
				. $this->param['task'],
			array('class'=>'img-responsive ', 'data-width'=>$pathImg['width'],'data-height'=>$pathImg['height'], 'title'=> 'ГДЗ - готові домашні завдання ' .$this->subjectModel->title . ' '
				. $clas .' клас '.$this->bookModel->author.' рішення до завдяння '. $task));

			$this->endCache(); 
			
			Yii::app()->end();

	    } else {
	    	$this->render('task', array('task'=>$pathImg));
	    }


		$this->endCache(); 
	
	}

}	

/**
 * 
 * @return [type] [description]
 */
public function actionNestedOne($clas, $subject, $book, $section, $task){

	// TODO - закешировать на 30 days
	if($this->beginCache('task_nested_one_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas','subject','book','section','task'))) ){

		$this->checkClas($clas);
		$this->checkSubject($subject);
		$this->checkBook($book);

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		$this->bookModel = $this->loadBook($book);

		$path = $clas 
		. '/' . $subject 
		. '/' . $book . '/task/';

		$sections = scandir( Yii::app()->basePath . '/../' .'/images/gdz/' . $path);
		$pathImg= array();
		foreach($sections as $oneSection){

			if($subject=='lang_en'){
				$section = (int)$section . '_Урок ' . (int)$section;
			}

			if((int)$oneSection == (int)$section){
				$pathImg['path'] = $path . $oneSection . '/' . $task . '.png';
			}
		}

		if( ! file_exists( Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path'])){
			$_GET = null;
			throw new CHttpException('404', 'такого задания в этом учебнике нету');
		}

		$imgSize = getimagesize(Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path']);
		$pathImg['width'] = $imgSize[0];
		$pathImg['height'] = $imgSize[1];

		if(Yii::app()->request->isAjaxRequest){
				
			echo  CHtml::image(Yii::app()->baseUrl . '/images/gdz/' . $pathImg['path'],
			'ГДЗ - готові домашні завдання '
				.$this->subjectModel->title . ' '
				.$this->param['clas']
				.' клас '.$this->bookModel->author
				.' рішення до завдяння '
				. $section . '/' . $task,
			array('class'=>' task-img panzoom ', 'data-width'=>$pathImg['width'],'data-height'=>$pathImg['height'] ));
			

			$this->endCache(); 

			Yii::app()->end();

	    }

    	$this->render('task', array('task'=>$pathImg));
	    
	    $this->endCache(); 

	}
}


/**
 * 
 * @return [type] [description]
 */
public function actionNestedTwo($clas, $subject, $book, $section, $paragraph ,$task){

	// TODO - закешировать на 30 days
	if($this->beginCache('task_nested_one_page'.Yii::app()->theme->name, array('duration'=>self::CACHE_TIME, 'varyByParam'=>array('clas','subject','book','section', 'paragraph','task'))) ){

		$this->checkClas($clas);
		$this->checkSubject($subject);
		$this->checkBook($book);

		$this->clasModel = $this->loadClas($clas);
		$this->subjectModel = $this->loadSubject($subject);
		$this->bookModel = $this->loadBook($book);



		//TODO переделать под авто определение 
		$img = $task . '.png';

		$path = $clas 
		. '/' . $subject
		. '/' . $book . '/task/';

		$sections = scandir( Yii::app()->basePath . '/../' .'images/gdz/' . $path );
		foreach($sections as $oneSection){
			
			if((int)$oneSection == (int)$section){

				$parags =  scandir(Yii::app()->basePath . '/../' .'images/gdz/' . $path . '/' . $oneSection);
				foreach($parags as $p => $parag){

					if( (int)$parag == $paragraph ){
						$pathImg['path'] =$path . $oneSection . '/' . $parag . '/' . $task . '.png';
					}
				}
			}
		}
		
		// d(Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path']);

		if( ! file_exists(Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path'])){
			$_GET = null;
			throw new CHttpException('404', 'такого задания в этом учебнике нету');
		}

		$imgSize = getimagesize(Yii::app()->basePath . '/../' . 'images/gdz/' . $pathImg['path']);
		$pathImg['width'] = $imgSize[0];
		$pathImg['height'] = $imgSize[1];
		// $pathImg['width'] = getimagesize($_SERVER['DOCUMENT_ROOT'] . 'images/' . $pathImg['path'])[0];


		if(Yii::app()->request->isAjaxRequest){
				
			echo  CHtml::image(Yii::app()->baseUrl . 'images/gdz/' . $pathImg['path'], 'ГДЗ - готові домашні завдання '
				.$this->subjectModel->title . ' '
				.$this->param['clas']
				.' клас '.$this->bookModel->author
				.' рішення до завдяння '
				. $section . '/' . $paragraph . '/' . $task,
			array('class'=>' task-img panzoom ', 'data-width'=>$pathImg['width'],'data-height'=>$pathImg['height'] ));
			
			$this->endCache(); 

			Yii::app()->end();

	    }

		$this->render('task', array('task'=>$pathImg));

	    $this->endCache(); 

	}

}




/**
 * This is the action to handle external exceptions.
 */
public function actionError(){

		if($error=Yii::app()->errorHandler->error){
			if(Yii::app()->request->isAjaxRequest){
				echo $error['message'];
			} else {
				$this->render('error'.$error['code'], $error);
			}
		}
	}

/**
 * [loadGdzClas description]
 * @param  [type] $clas [description]
 * @return [type]       [description]
 */
private function loadClas($clas){
	if($clas != Yii::app()->params['clas']){
		throw new CHttpException('404', 'not clas');
	}

	$clasModel = Clas::model()->find('slug=:clas',array(':clas'=>(int)$clas));
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

	$subjectModel = Subject::model()->findByAttributes(array('slug'=>$subject, 'class_id'=>$this->clasModel->id));
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
	$criteria->addCondition('t.public_time<'.time());
	$criteria->addCondition('t.public=1');
	$criteria->params = array(
	    ':classId'=>$this->clasModel->id, 
	    ':subjectId'=>$this->subjectModel->id,
	    ':slug'=>$book
	);
	$gdzBookModel = Book::model()->find($criteria);

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
		$this->h1 = 'Готові домашні завдання '. $this->clasModel->slug.' клас';
		$this->canonical = '/'.$this->clasModel->slug;
		
	}

	if($this->subjectModel){
		$this->h1 .= ' ' . $this->subjectModel->title . ' ';
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

public function getDescription($subject=null, $clas=null){

	$criteria = new CDbCriteria;
	$criteria->condition = 't.owner="'.$this->id.'"';
	$criteria->addCondition('t.action="'.$this->action->id.'"');

	if($subject){
		$criteria->addCondition('t.subject_id="'.$subject.'"');
	}

	if($clas){
		$criteria->addCondition('t.clas_id="'.$clas.'"');
	}

	$model = Description::model()->find($criteria);
	if($model){
		return $model->description;
	}

	return '';

}

/**
 * Displays the login page
 */
public function actionLogin(){


	// авторизация только после получения куки на 1 мин
	$model = Setting::model()->findByAttributes(array('field'=>'cookie_token'));
	if( ! $model){
		throw new CHttpException('404');
	}

	$token = Yii::app()->request->cookies['cookie_token'];
	if( ! $token ){
		throw new CHttpException('404');
	}

	$value = unserialize($model->value);
	if( $value['expire'] < time() || $token->value !== $value['token'] ){
		throw new CHttpException('404');
	}


	$this->layout = '//layouts/login';
	$model=new LoginForm;


	// if it is ajax validation request
	if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'){
		echo CActiveForm::validate($model);
		Yii::app()->end();
	}

	// collect user input data
	if(isset($_POST['LoginForm'])){
		$model->attributes=$_POST['LoginForm'];
		// validate user input and redirect to the previous page if valid
		if($model->validate() && $model->login()){
			$this->redirect(Yii::app()->user->returnUrl);
		}
	}
	// display the login form
	$this->render('login',array('model'=>$model));
}

/**
 * Logs out the current user and redirect to homepage.
 */
public function actionLogout(){
	Yii::app()->user->logout();
	$this->redirect(Yii::app()->homeUrl);
}

public function actionJewel(){
	$token = sha1( uniqid() );

	// echo $token;
	$cookie = new CHttpCookie('cookie_token', $token );

	// print_r($cookie);
	$cookie->expire = time() + 60; // 1 min
	Yii::app()->request->cookies['cookie_token'] = $cookie;

	$model = Setting::model()->findByAttributes(array('field'=>'cookie_token'));
	if($model){
		$model->value = serialize(
			array(
				'expire'=>$cookie->expire,
				'token'=>$token
			)
		);

		if($model->update()){
			$this->redirect(Yii::app()->user->returnUrl);
		}
	}
}

public function actionSitemap(){
	$model = Clas::model()->findAll();
	$this->render('sitemap',array('model'=>$model));
}

}