<?php

class LibraryBookController extends InsideController
{

public function filters()
{
    return array(
        'postOnly + translit',
    );
}

public function actionTranslit(){

	if (Yii::app()->request->isAjaxRequest) {
		$slug = Yii::app()->request->getPost('slug');

		if($slug){
			$gdzBook = new LibraryBook;
			$gdzBook->slug = $slug;
			if($gdzBook->validate(array('slug'))){
				echo json_encode(array('success'=>true, 'translit'=>$gdzBook->slug));
			} else {
				$error = $gdzBook->getErrors();
				echo json_encode(array('success'=>false, 'translit'=>$gdzBook->slug,'error'=>$error['slug'][0]));
			}
		}
		
		Yii::app()->end();
	}
}

public function actionImageUpload(){
	$image=CUploadedFile::getInstanceByName('file');
	$filename = uniqid().'.'.$image->extensionName;
	$path = Yii::app()->basePath.'/../img/library/book_description/'.$filename;
	// echo $path;
	// die;
	$image->saveAs(Yii::app()->basePath.'/../img/library/book_description/'.$filename);


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
	 	'filelink' => Yii::app()->baseUrl.'/img/library/book_description/'.$filename, 
	 	'filename' => $filename 
 	); 
	echo stripslashes(json_encode($array)); 
}
	

}