<?php

class SettingController extends InsideController
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
			$knowall = new Knowall;
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

public function actionClearCache(){
	if (Yii::app()->request->isAjaxRequest) {
		Yii::app()->cache->flush();
		echo json_encode(array('success'=>true, 'size'=>0));

		Yii::app()->end();
	}
} 

public function actionSizeCache(){
	if (Yii::app()->request->isAjaxRequest) {

		$casheDir = Yii::app()->basePath.'/runtime/cache/';
		if(file_exists($casheDir)){
			$size = disk_total_space($casheDir);
			echo json_encode(array('success'=>true, 'size'=>$size));
		} else {
			echo json_encode(array('success'=>false));
		}

		Yii::app()->end();
	}
} 	

public function actionClearAssets(){
	Yii::app()->assetManager->basePath
} 

public function actionSizeAssets(){
	
} 

protected function myScandir($dir){
    $list = scandir($dir);
    unset($list[0],$list[1]);
    return array_values($list);
}

protected function clearDir($dir){
    $list = myscandir($dir);
    
    foreach ($list as $file){
        if (is_dir($dir.$file)){
            clear_dir($dir.$file.'/');
            rmdir($dir.$file);
        }
        else{
            unlink($dir.$file);
        }
    }

    return true;
}







}