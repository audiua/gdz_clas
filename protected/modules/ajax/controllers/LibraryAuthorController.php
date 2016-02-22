<?php

class LibraryAuthorController extends InsideController
{

public function filters()
{
    return array(
        'postOnly + translit',
    );
}

public function actionTranslit(){

	if (Yii::app()->request->isAjaxRequest) {
		$title = Yii::app()->request->getPost('title');

		if($title){
			$knowall = new LibraryAuthor;
			$knowall->slug = $title;
			if($knowall->validate(array('slug'))){
				echo json_encode(array('success'=>true, 'translit'=>$knowall->slug));
			} else {
				$error = $knowall->getErrors();
				echo json_encode(array('success'=>false, 'translit'=>$knowall->slug,'error'=>$error['slug'][0]));
			}
		}
		
		Yii::app()->end();
	}
}

public function actionImageUpload(){
	$image=CUploadedFile::getInstanceByName('file');
	$filename = uniqid().'.'.$image->extensionName;
	$path = Yii::app()->basePath.'/../img/library/description/'.$filename;
	// echo $path;
	// die;
	$image->saveAs(Yii::app()->basePath.'/../img/library/description/'.$filename);


	// $image_open = Yii::app()->image->load(Yii::app()->basePath.'/../img/knowall/article/'.$filename); 
	// if(isset($image_open)){
	// 	if ($image_open->width > $image_open->height){
	// 		$dim = Image::HEIGHT;
	// 	} else{ 
	// 		$dim = Image::WIDTH;
	// 	}  
	// 	$image_open->resize(100, 100, $dim)->crop(100, 100); 
	//  	$image_open->save(Yii::app()->basePath.'/../img/knowall/article/'.'thumb_'.$filename); 
	// } 


	$array = array( 
	 	'filelink' => Yii::app()->baseUrl.'/img/library/description/'.$filename, 
	 	'filename' => $filename 
 	); 
	echo stripslashes(json_encode($array)); 
}

public function actionFileUpload() { 
	$file=CUploadedFile::getInstanceByName('file'); 
	$filename = md5(time()).'.'.$file->extensionName; 
	$path = dirname(__FILE__).'/../../../img/knowall/'.$filename; 
	copy($_FILES['file']['tmp_name'], $path); 
	$array = array( 
		'filelink' => Yii::app()->request->hostInfo.'/img/knowall/'.$filename, 
		'filename' => $filename 
	); 
	echo stripslashes(json_encode($array)); 
}

public function actionImageGetJson() { 
	$dir = dirname(__FILE__).'/../../../img/knowall/thumbs/'; 
	$files = array(); 
	if (is_dir($dir)) { 
		if ($dh = opendir($dir)) { 
			while (($file = readdir($dh)) !== false) { 
				if ($file != '.' && $file != '..'){
					$files[] = array( 'thumb' => Yii::app()->request->hostInfo.'/img/knowall/thumbs/'.$file, 'image' => Yii::app()->request->hostInfo.'/img/knowall/'.$file, 'title' => $file, ); 
				} 
				closedir($dh); 
			} 
		} echo json_encode($files); 
	}
} 	






}