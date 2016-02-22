<?php

class RegisterThemeFile{

	/**
	 * [register description]
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	public static function register($file= array('css','js')){

		foreach($file as $type){
			$path = Yii::app()->theme->basePath.'/'.$type;
			$all = scandir($path);
			// '.','..' есть всегда папке
			if(count($all) > 2){
				$mainAssets = Yii::app()->AssetManager->publish($path);
				foreach($all as $one){
					if($one{0}=='.'){
						continue;
					}

					if($type == 'css'){
						Yii::app()->clientScript->registerCssFile($mainAssets.'/'.$one);        
					} else {
						Yii::app()->clientScript->registerScriptFile($mainAssets.'/'.$one, CClientScript::POS_END);        
					}
				}
			}
		}
	}


}