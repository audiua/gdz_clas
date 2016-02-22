<?php

class TreeMenuWidget extends CWidget{

	public $params = array();

	public function init(){
		$this->params = $this->controller->param;
		$this->params['clas'] = isset($this->params['clas'])?$this->params['clas']:'';
    $this->params['subject'] = isset($this->params['subject'])?$this->params['subject']:'';
		$this->params['book'] = isset($this->params['book'])?$this->params['book']:'';

        parent::init();
    }

	public function run(){

		$tree = $this->generateTree( Clas::model()->findAll() );
		// d($tree);

		

       // передаем данные в представление виджета
       $this->render('index', array('data'=>$tree));
   }

   private function generateTree($classes)
   {
       $data = array();

       foreach ($classes as $i => $clas) {


           $data[$clas->id] = array(
               'id'   => $clas->id,
               'text' => '<h3><a href="'.$clas->slug.'">'.$clas->slug.' клас</a></h3>',
               'expanded' => ($clas->slug == $this->params['clas']) ? true : false,

           );
           foreach ($clas->subject as $subject) {
               $data[$clas->id]['children'][$subject->id] = array(
                   'id'   => $subject->id,
                   'text' =>  '<a href= "/' . $clas->slug.'/' . $subject->slug.'">'.$subject->title.'</a>',
                   'expanded' => ($subject->slug == $this->params['subject']) ? true : false,
                   
                );
           		foreach ($subject->book as $book) {
				   	$data[$clas->id]['children'][$subject->id]['children'][$book->id] = array(
						'id'   => $book->id,
                // 'text' =>  '<a href= "/' . $clas->slug.'/' . $subject->slug.'/'.$book->slug.'">'.$book->author.'</a>',
            'text' =>  ($book->slug == $this->params['book']) ? '<span class="hover">'.$book->author.'</span>' : '<a href= "/' . $clas->slug.'/' . $subject->slug.'/'.$book->slug.'">'.$book->author.'</a>',
				       	'expanded' => false,
				   	);
				}





           }


       }
       return $data;
   }

}