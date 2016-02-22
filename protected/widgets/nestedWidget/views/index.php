<?php $uniqIdAccordion = 'a' . uniqid(); ?>
<div class="panel-group outer" id="<?php echo $uniqIdAccordion; ?>">

		
<?php 

// print_r($this->params);

	require_once(Yii::app()->basePath . '/helpers/sort.php');
	uksort($model,"mysort");

	if(isset($this->params['section'])){
		$taskSection = $this->params['section'];
	} else {
		$taskSection = 0;
	}

	if(isset($this->params['task'])){
		$taskActive = $this->params['task'];
	} else {
		$taskActive = 0;
	}

	foreach( $model as $i => $one ): 

		// echo $i;


	$posSeparator = stripos($i,'_');
	$sectionName = substr($i,$posSeparator+1);
		
	if((int)$i == $taskSection){
		$this->controller->pageTitle .= ', роздил '.(int)$i;
		$in = 'in';
		$bold = 'bold clas-color-'.$this->params['clas'];
	} else {
		$in = '';
		$bold = '';
	}

	$uniqId = 'g'.md5($i)
?>
	<div class="panel panel-default">
		<div class="panel-heading">
		  	<h4 class=" no  panel-title <?php echo $bold; ?>">
				<a data-toggle="collapse" data-parent="#<?php echo $uniqIdAccordion; ?>" href="#<?php echo $uniqId; ?>">


			  		<?php echo  $sectionName; ?>

				</a>
		  	</h4>
		</div>
		<div id="<?php echo $uniqId; ?>" class="panel-collapse collapse <?php echo $in; ?>">
		    <div class="panel-body">
		   
			  	<?php
			  	 	
			  	 	$k=0; 
			  	 	$tmp = [];
			  	 	$color = '';
			  	 	foreach( $one as $t => $task ){
			  	 		if(is_array($task)){
			  	 			$tmp[$t]=$task;
			  	 			continue;
			  	 		}

	  	 		  	 	if((int)$task == $taskActive && (int)$i == $taskSection){
	  	 		  	 		$this->controller->pageTitle .=', завдання '.(int)$task.'/';
	  	 					$active = 'clas-active-'.$this->params['clas'];
	  	 					$color = 'clas-color-'.$this->params['clas'];
	  	 				} else {
	  	 					$active = '';
	  	 				}

				  		if($k==0){
				  			echo '<div class="row no task-r">';
				  		}

				  		// echo '<div class="col-md-1 no task-one">';

				  		echo CHtml::link( '<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1 no task-one task-one-'.$this->params['clas'].' ' .$active.' "><p class="'.$color.'">'.(int)$task.'</p></div>', array('/'.$this->params['clas'].'/'
				  			.$this->params['subject'].'/'
				  			.$this->params['book'].'/'.(int)substr($i, 0,2).'/'.(int)$task));

				  		// echo '</div>';
				  		$k++;
				  		$active = '';
				  		$color = '';

				  		if($k==12){
				  			echo '</div>';
				  			$k=0;
				  		}
			  	 		
				  	}
			  	if($k != 0){
			  	 echo '</div>';
			  	}

			  	if(!empty($tmp)){
			  		$this->controller->widget('NestedWidget', ['model'=>$tmp, 'view'=>'two','nested'=>(int)$i]);
			  	}

			  	?>

		  	</div>
		</div>
	</div>

<?php endforeach; ?>

</div>


