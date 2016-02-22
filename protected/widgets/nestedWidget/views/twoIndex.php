<?php 
	// получаем уникальный id для вложеной групы аккардиона
	$uniqIdNestedAc = 't' . uniqid(); 
?>

<div class="panel-group" id="<?php echo $uniqIdNestedAc; ?>">

<?php 

	// определяем выбраное задание
	if(isset($this->params['task'])){
		$taskActive = $this->params['task'];
	} else {
		$taskActive = 0;
	}

	// определяем выбраный параграф
	if(isset($this->params['paragraph'])){
		$taskSection = $this->params['paragraph'];
	} else {
		$taskSection = 0;
	}
	// $taskActive = 0;
	
	// определяем выбраный раздел
	if(isset($this->params['section'])){
		$section = $this->params['section'];
	} else {
		$section = 0;
	}

	// определяем активный раздел
	if(isset($this->params['nested'])){
		$nested = $this->params['nested'];
	} else {
		$nested = 0;
	}
	


	// мотанм по параграфам
	foreach( $model as $i => $one ){

		// echo $i;

		// индекс разделителя
		$posSeparator = stripos($i,'_');

		// назва параграфа
		$sectionName = substr($i,$posSeparator+1);
		
		// определяем выбраный параграф как активный
		if((int)$i == $taskSection && $section == $nested){
			$this->controller->pageTitle .= ', параграф '.(int)$i . ', завдання '.$this->params['task'];
			$in = 'in';
			$bold = 'bold clas-color-'.$this->params['clas'];
		} else {
			$in = '';
			$bold = '';
		}

		// уникальный идентификатор для аккардиона
		$uniqId = 'tg'.uniqid();
?>
		<div class="panel panel-default">
			<div class="panel-heading inner">
			  	<h4 class="panel-title <?php echo $bold; ?>">
					<a class="inner-title" data-toggle="collapse" data-parent="#<?php echo $uniqIdNestedAc; ?>" href="#<?php echo $uniqId; ?>" >

				  		<?php echo  $sectionName; ?>

					</a>
			  	</h4>
			</div>
			<div id="<?php echo $uniqId; ?>" class="panel-collapse collapse <?php echo $in; ?>">
			    <div class="panel-body">
			   
				  	<?php
				  	 	
				  	 	// счетчики
				  	 	$k=0; 

				  	 	$tmp = array();
				  	 	$color = '';
				  	 	
				  	 	// мотаем по заданиям
				  	 	foreach( $one as $t => $task ){

				  	 		// если это массив то нужно его отрисовать с вложеностью, добавляем его в временный массив
				  	 		if(is_array($task)){
				  	 			$tmp[$t]=$task;
				  	 			continue;
				  	 		}

				  	 		// определяем активное задание и добавляем ему класс active
			  	 			if((int)$task == $taskActive && (int)$i == $taskSection ){
		  	 					$active = 'clas-active-'.$this->params['clas'];
		  	 					$color = 'clas-color-'.$this->params['clas'];
		  	 				} else {
		  	 					$active = '';
		  	 				}

		  	 				// отрисовка дива 
					  		if($k==0){
					  			echo '<div class="row no task-r">';
					  		}

					  		?>

					  		<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 no task-one task-one-<?php echo $this->params['clas']; ?> <?php echo $active; ?>" >
					  			<p class="task-number" data-url="<?php echo (int)$this->params['nested']; ?>/<?php echo (int)$i; ?>/<?php echo (int)$task; ?>" >
					  				<?php echo (int)$task; ?>
					  			</p>
					  		</div>


					  		<?php

					  		$k++;
					  		$active = '';
					  		$color = '';

					  		// закрываем див когда отрисовали 12 заданий
					  		if($k==12){
					  			echo '</div>';
					  			$k=0;
					  		}
				  	 		
					  	}//end foreach task

					// закрываем див, если он не закрыт (отрисовано меньше 12 заданий)
				  	if($k != 0){
				  	 echo '</div>';
				  	}



				  	?>





					

			  	</div>
			</div>
		</div>

<?php } // end foreach paragraph ?>

</div>