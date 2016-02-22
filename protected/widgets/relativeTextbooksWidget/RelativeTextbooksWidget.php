<?php

/**
 *  Вывод случайных книг класса или предмета
 */
class RelativeTextbooksWidget extends CWidget{

    public $params = array();
    public $model = null;
    public $mode;
    public $count=1;

    public function init(){


        $this->params = $this->controller->getActionParams();


        switch ($this->mode) {

            case 'clas':

                // $dependency = new CDbCacheDependency('SELECT MAX(update_time) FROM clas');
                // $this->model = Clas::model()->cache(864000,$dependency)->findAll();

                // получаем книги текущего класа
                $criteria = new CDbCriteria;
                $criteria->condition='class_id=:classId';
                $criteria->addCondition('t.id<>'.$this->controller->bookModel->id);
                $criteria->addCondition('t.public=1');
                $criteria->addCondition('t.publish_date<'.time());
                $criteria->params = array(':classId'=>$this->controller->clasModel->id);
                $books = Textbook::model()->findAll($criteria);

                

                if( count($books) > 4 * $this->count ){
                    shuffle($books);
                    $this->model = array_slice($books, 0, 4);
                } else {
                    $this->model = $books;
                }
                break;

            case 'subject':

                if( count($this->controller->subjectModel->books) < 3 * $this->count ){
                    $this->model = $this->controller->subjectModel->books;
                } else {
                    $books = $this->controller->subjectModel->books;
                    shuffle($books);
                    $this->model = array_slice( $books, 0, 3 );
                }
                break;

            case 'all':

                // получаем книги текущего 
                $criteria = new CDbCriteria;
                $criteria->condition='class_id<>:classId';
                $criteria->addCondition('t.public=1');
                $criteria->addCondition('t.publish_date<'.time());
                $criteria->params = array(':classId'=>$this->controller->clasModel->id);
                $books = Textbook::model()->findAll($criteria);


                if( count($books) < 4 * $this->count ){
                    $this->model = $books;
                } else {
                    shuffle($books);
                    $this->model = array_slice( $books,0, 4 * $this->count );
                }
                break;
            
            default:
                break;
        }


        
        
      
        parent::init();
    }

    public function run(){

       // передаем данные в представление виджета
        $view = Yii::app()->theme->name == 'm' ? 'index_m' : 'index' ;
       $this->render($view, array('model' => $this->model));
   }
}