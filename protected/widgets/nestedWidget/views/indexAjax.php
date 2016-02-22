<?php 
	// получаем уникальный id для групы аккардиона
	$uniqIdAccordionGroup = 'a' . uniqid(); 
?>

<div class="panel-group outer" id="<?php echo $uniqIdAccordionGroup; ?>" >

<?php 

// print_r($this->params);

	// сортировка в нужном порядке
	require_once(Yii::app()->basePath . '/helpers/sort.php');
	uksort($model,"mysort");

	// определяем выбраный раздел
	if(isset($this->params['section'])){
		$taskSection = $this->params['section'];
	} else {
		$taskSection = 0;
	}

	// определяем выбраное задание
	if(isset($this->params['task'])){
		$taskActive = $this->params['task'];
	} else {
		$taskActive = 0;
	}

	// мотаем по разделам
	foreach( $model as $i => $one ){

		// индекс разделителя
		$posSeparator = stripos($i,'_');

		// назва раздела
		$sectionName = substr($i,$posSeparator+1);
			
		// определяем выбраный раздел как активный
		if((int)$i == $taskSection){
			$this->controller->pageTitle .= ', роздил '.(int)$i;
			$in = 'in';
			$bold = 'bold clas-color-'.$this->params['clas'];
		} else {
			$in = '';
			$bold = '';
		}

		// уникальный идентификатор для аккардиона
		$uniqId = 'g' . uniqid();
?>
		<div class="panel panel-default">
			<div class="panel-heading">
			  	<h4 class=" no  panel-title <?php echo $bold; ?>">
					<a data-toggle="collapse" data-parent="#<?php echo $uniqIdAccordionGroup; ?>" href="#<?php echo $uniqId; ?>" >
				  		<?php echo $sectionName; ?>
					</a>
			  	</h4>
			</div>
			<div id="<?php echo $uniqId; ?>" class="panel-collapse collapse <?php echo $in; ?>" >
			    <div class="panel-body">
			   
				  	<?php
				  	 	
				  		// кличество заданий в ряду
				  		$countTaskInRow=12;

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
		  	 		  	 	if((int)$task == $taskActive && (int)$i == $taskSection){

		  	 		  	 		// title страницы
		  	 		  	 		$this->controller->pageTitle .=', завдання '.(int)$task.'/';

		  	 		  	 		// клас актив для выбраного задания
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

					  		<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 no task-one task-one-<?php echo $this->params['clas']; ?>">
					  			<p class="task-number " data-url="<?php echo (int)$i; ?>/<?php echo (int)$task; ?>" >
					  				<?php echo (int)$task; ?>
					  			</p>
					  		</div>


					  		<?php

					  		$k++;
					  		$active = '';
					  		$color = '';

					  		// закрываем див когда отрисовали 12 заданий
					  		if($k==$countTaskInRow){
					  			echo '</div>';
					  			$k=0;
					  		}
				  	 		
					  	}//end foreach task

				  	// закрываем див, если он не закрыт (отрисовано меньше 12 заданий)
				  	if($k != 0){
				  	 echo '</div>';
				  	}

				  	// если есть папки то вызываем виджет для отрисовки двойной вложености
				  	if(!empty($tmp)){
				  		$this->controller->widget('NestedWidget', array('model'=>$tmp, 'view'=>'twoIndex','nested'=>(int)$i));
				  	}

				  	?>

			  	</div>
			</div>
		</div>

<?php 
	} // end foreach section
?>

</div>


