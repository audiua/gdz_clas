<?php

class TaskWidget extends CWidget{

	public $params = array();
	public $model = null;
	
	public function init(){
        $this->params = $this->controller->param;
        
        // формируем путь к 
		$path = Yii::app()->basePath . '/../' 
            . 'images/gdz/'.$this->params['clas']
            . '/'.$this->params['subject']
            . '/'.$this->params['book'].'/task';

        if( ! file_exists($path)){
            $_GET = null;
            throw new CHttpException('404', 'нет такой книги');
        }

		$this->model = $this->rec($path);
        if( empty($this->model) || !is_array($this->model) ){
            $_GET = null;
            throw new CHttpException('404', 'нет такой книги');
        }
        parent::init();
    }

	public function run(){
        $this->render( 'indexAjax', array('model' => $this->model) );
    }

    // рекурсивно дерево в асоц массив
    public function rec($dir){
        $path = array();

        if(!is_dir($dir)){
            $_GET = null;
            throw new CHttpException('404', 'нет такой книги');
        }
        $all = scandir($dir);
        $all = array_diff($all, array('.','..'));
        natsort($all);

        foreach($all as $one){
            if(is_dir($dir.DIRECTORY_SEPARATOR.$one)){
                $path[$one] = $this->rec($dir.DIRECTORY_SEPARATOR.$one);
            } elseif(is_file($dir.DIRECTORY_SEPARATOR.$one)) {
                $path[] = $one;
            }   
            
        }

        return $path;
    }
}