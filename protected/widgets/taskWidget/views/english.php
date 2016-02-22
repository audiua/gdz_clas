<?php

// print_r($model);
// die;


$k=0;
$active = '';
if(isset($this->params['task'])){
	$taskActive = $this->params['task'];
} else {
	$taskActive = 0;
}

if(isset($this->params['lesson'])){
	$lessonActive = $this->params['lesson'];
} else {
	$lessonActive = 0;
}

if(isset($this->params['unit'])){
	$unitActive = $this->params['unit'];
} else {
	$unitActive = 0;
}



foreach( $model as $i => $one ){

	if($i{0} == 'l'){

		echo '<div class="row no task-r">

		Урок '. substr($i,7).'

		</div>';
		
		
		echo '<div class="row no task-r">';
		$countTask = substr($i, 7);
		foreach($one as $task){

			if( $taskActive == (int)$task &&  $lessonActive == substr($i,7) && $unitActive == 0 ){
				$active = 'task-active';	
			}

			echo CHtml::link( '<div class=" col-xs-2 col-sm-1 col-md-1 col-lg-1 no task-one task-lesson '.$active.' ">ex. '.(int)$task.'</div>', array('/'.$this->params['clas'].'/'
				.$this->params['subject'].'/'
				.$this->params['book'].'/'
				.$countTask.'/'
				.(int)$task)
			);
			$active = '';
		}
		echo '</div>';
		
	}


	if($i{0} == 'u'){

		if($k!=0){
			echo '</div>';
			$k=0;
		}
		echo '<div class="row no task-r">' . ucfirst(substr($i,0,4)) . ' '. substr($i,5).'</div>';
		foreach($one as $u => $lesson){
			$countTask = substr($u, 7);
			// echo '<div class="row no task-r">';
			foreach($lesson as $task){

				if( $taskActive == (int)$task &&  $lessonActive == $countTask && $unitActive==substr($i,5) ){
					$active = 'task-active';	
				}

				if($k==0){
					echo '<div class="row no task-r">';
				}
				echo CHtml::link( '<div class="col-md-2 no task-one task-lesson '.$active.' "> les. '.$countTask. ', ex. '.(int)$task.'</div>', array('/'.$this->params['clas'].'/'
					.$this->params['subject'].'/'
					.$this->params['book'].'/'
					.substr($i, 5) .'/'
					.$countTask.'/'
					.(int)$task

					));
				$k++;
				$active = '';

				if($k==6){
					echo '</div>';
					$k=0;
				}
			}
		}

		
	}
	if($k!=0){
		echo '</div>';
		$k=0;
	}
}


?>		




