<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends Controller
{
	public function beforeAction($action){

		// технические работы из админки
		if( $action->id !== 'login'){
			$break = Setting::model()->cache(3600)->findByAttributes(array('field'=>'teh_break'));
			if($break && $break->value){
				$this->renderPartial('application.helpers.support');
				Yii::app()->end();
			}
		}
		
		return parent::beforeAction($action);
	}
}