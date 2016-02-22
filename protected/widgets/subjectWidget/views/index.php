<div class="subject-list">
	<?php foreach( $this->model as $i => $one ): 
	    if( $one->$field ){
    		foreach( $one->$field as $book ){
    			if($book->public){
    				$showSubject = true;
    				break;
    			}
    		}
		}

		if($showSubject):
	?>
		<div class="subject">
		    <h3><?php 
		    	// выводим только с книгами
			    	echo CHtml::link( $one->subject->title, array('/'.$this->controller->id.'/'.$this->params['clas'].'/'.$one->subject->slug), array('class'=>'clas-'.$class, 'title'=>'ГДЗ '.$this->params['clas'] . ' клас '. $one->subject->title)); 
	    	?></h3>
		</div>

	<?php endif;
	$class++;
	$class = $class == 12 ? 5 : $class ;
	$showSubject = false;
	endforeach; ?>
</div>





