<?php

class TextbookBookController extends InsideController
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
			$gdzBook = new TextbookBook;
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

public function actionSubject(){
	if (Yii::app()->request->isAjaxRequest) {
		$clas = Yii::app()->request->getPost('clas', null);

		if($clas){

			$subject = TextbookSubject::model()->getAll($clas);

		    foreach($subject as $value=>$name)
		    {
		        echo CHtml::tag('option',
		                   array('value'=>$value),CHtml::encode($name),true);
		    }
		}
		
		Yii::app()->end();
	}
}
	

}