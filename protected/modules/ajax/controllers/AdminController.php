<?php

class AdminController extends InsideController
{

public function filters()
{
    return array(
        'postOnly + clearCache',
    );
}

public function actionClearCache(){
	if (Yii::app()->request->isAjaxRequest) {
		Yii::app()->cache->flush();
		echo json_encode(array('success'=>true));

		Yii::app()->end();
	}
}

public function actionClearAssets(){
	if (Yii::app()->request->isAjaxRequest) {
		$this->clearDir(Yii::app()->assetManager->basePath.'/');
		echo json_encode(array('success'=>true));

		Yii::app()->end();
	}
}

// упрощенная функция scandir
private function myScandir($dir)
{
    $list = scandir($dir);
    unset($list[0],$list[1]);
    return array_values($list);
}

// функция очищения папки
private function clearDir($dir)
{
    $list = $this->myScandir($dir);
    foreach ($list as $file){
        if (is_dir($dir.$file)){
            $this->clearDir($dir.$file.'/');
            rmdir($dir.$file);
        } else { 
            unlink($dir.$file);
        }
    }
}

}