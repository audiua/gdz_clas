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

if(isset($this->params['page'])){
	$pageActive = $this->params['page'];
} else {
	$pageActive = 0;
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



foreach( $model as $i => $item ){

	if($i{0} == 'l'){

		echo '<div class="row no task-r">

		Урок '. substr($i,7).'

		</div>';
		// die;

		echo '<div class="row no task-r">';
		foreach($item as $j => $task){
			// echo $task;
			$str = substr($task,0, -4);
			// echo $str;
			// die;
			$p_t = explode('_', $str);
			if(count($p_t) < 2){
				$countPage = 0;
				$countTask = $p_t[0];
			} else{
				list($countPage, $countTask) = explode('_', $str);
			}

			// echo $countPage, $countTask;
			// die;

			// $countTask = substr($i, 7);
			// $countPage = substr($j,5);
			

				if( $taskActive == $countTask &&  $lessonActive == substr($i,7) && $unitActive == 0 ){
					$active = 'task-active';	
				}

				echo CHtml::link( '<div class="col-xs-2 col-sm-12 col-md-12 col-lg-12 no task-one task-lesson '.$active.' ">p. '.$countPage.', ex. '.$countTask.'</div>', array('/'.$this->params['clas'].'/'
					.$this->params['subject'].'/'
					.$this->params['book'].'/'
					.'0/'
					.substr($i,7) .'/'
					.$countPage.'/'
					.$countTask)
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
		foreach($item as $u => $lesson){


			$countLesson = substr($u, 7);
			// echo '<div class="row no task-r">';
			foreach($lesson as $task){

				$str = substr($task,0, -4);
				// echo $str;
				// die;
				$p_t = explode('_', $str);
				if(count($p_t) < 2){
					$countPage = 0;
					$countTask = $p_t[0];
				} else{
					list($countPage, $countTask) = explode('_', $str);
				}


				if( $taskActive == $countTask &&  $lessonActive == $countLesson && $unitActive==substr($i,5) ){
					$active = 'task-active';	
				}

				if($k==0){
					echo '<div class="row no task-r">';
				}
				echo CHtml::link( '<div class="col-md-2 no task-one task-lesson '.$active.' "> p. '.$countPage. ', ex. '.$countTask.'</div>', array('/'.$this->params['clas'].'/'
					.$this->params['subject'].'/'
					.$this->params['book'].'/'
					.substr($i, 5) .'/'
					.$countLesson .'/'
					.$countPage.'/'
					.$countTask

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



