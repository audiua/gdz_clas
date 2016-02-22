<?php $uniqIdNestedAc = 't' . uniqid(); ?>
<div class="panel-group" id="<?php echo $uniqIdNestedAc; ?>">

<?php 

	if(isset($this->params['task'])){
		$taskActive = $this->params['task'];
	} else {
		$taskActive = 0;
	}

	if(isset($this->params['paragraph'])){
		$taskSection = $this->params['paragraph'];
	} else {
		$taskSection = 0;
	}
	// $taskActive = 0;
	
	if(isset($this->params['section'])){
		$section = $this->params['section'];
	} else {
		$section = 0;
	}

	if(isset($this->params['nested'])){
		$nested = $this->params['nested'];
	} else {
		$nested = 0;
	}
	



	foreach( $model as $i => $one ): 

		// echo $i;


	$posSeparator = stripos($i,'_');
	$sectionName = substr($i,$posSeparator+1);
		
	if((int)$i == $taskSection && $section == $nested){
		$this->controller->pageTitle .= ', параграф '.(int)$i . ', завдання '.$this->params['task'];
		$in = 'in';
		$bold = 'bold clas-color-'.$this->params['clas'];
	} else {
		$in = '';
		$bold = '';
	}

	$uniqId = 'g'.uniqid();
?>
	<div class="panel panel-default">
		<div class="panel-heading inner">
		  	<h4 class="panel-title <?php echo $bold; ?>">
				<a class="inner-title" data-toggle="collapse" data-parent="#<?php echo $uniqIdNestedAc; ?>" href="#<?php echo $uniqId; ?>">


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

		  	 			if((int)$task == $taskActive && (int)$i == $taskSection ){
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
				  			.$this->params['book'].'/'. $this->params['nested'] .'/'.(int)substr($i, 0,2).'/'.(int)$task));

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



			  	?>





				

		  	</div>
		</div>
	</div>

<?php endforeach; ?>

</div>