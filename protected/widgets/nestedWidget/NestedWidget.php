<?php

class NestedWidget extends CWidget{

    public $params = array();
    public $model = null;
    public $view = 'indexAjax';
    public $nested = '';
    

    public function init(){
        $this->params = $this->controller->getActionParams();
        // if( !isset($this->params['section']) ){
        // }
          $this->params['nested']=$this->nested;
        // print_r($this->model);
        // die;
        parent::init();
    }

    public function run(){

       // передаем данные в представление виджета
       $this->render($this->view,array('model' => $this->model));
   }
}