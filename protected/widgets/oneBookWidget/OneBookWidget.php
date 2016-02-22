<?php

class OneBookWidget extends CWidget{

	public $params = array();
	public $model = null;

	public function init(){
		$this->params = $this->controller->param;
		$this->model = $this->controller->bookModel;
        parent::init();
    }

	public function run(){

       // передаем данные в представление виджета
       $this->render('index');
   }

}