<?php

class DescriptionWidget extends CWidget{

	public $params = array();
    public $model = null;

	public function init(){

        $param = array();
        $criteria = new CDbCriteria;
        $criteria->condition = 't.`owner`=:owner';
        $criteria->addCondition('t.`action`=:action');

        if(isset($this->params['page_mode'])){
            $criteria->addCondition('t.`page_mode`=:page_mode');
            $param[':page_mode']=$this->params['page_mode'];
        }
        if(isset($this->params['clas_id'])){
            $criteria->addCondition('t.`clas_id`=:clas_id');
            $param[':clas_id']=$this->params['clas_id'];
        }
        if(isset($this->params['subject_id'])){
            $criteria->addCondition('t.`subject_id`=:subject_id');
            $param[':subject_id']=$this->params['subject_id'];
        }
        if(isset($this->params['category_id'])){
            $criteria->addCondition('t.`category_id`=:category');
            $param[':category']=$this->params['category_id'];
        }
        $criteria->params = array_merge($param , array(
            ':owner'=>$this->params['owner'], 
            ':action'=>$this->params['action'],
        ) );

        $model = Description::model()->find($criteria);
        if($model){
            $this->model = $model;
        }

        parent::init();
    }

	public function run(){
        $this->render('index');
    }

    
}