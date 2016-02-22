<div class="panel-group" id="accordion">

		
	<?php 

		require_once(Yii::app()->basePath . '/helpers/sort.php');
		uksort($model,"mysort");

		$j=1; 
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

		$posSeparator = stripos($i,'_');
		$sectionName = substr($i,$posSeparator+1);
			
		if((int)$i == $taskSection){
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
			  	<h4 class="panel-title <?php echo $bold; ?>">
					<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $uniqId; ?>">

				  		<?php echo  $sectionName; $j++; ?>

					</a>
			  	</h4>
			</div>
			<div id="<?php echo $uniqId; ?>" class="panel-collapse collapse <?php echo $in; ?>">
			    <div class="panel-body">
			   
				  	<?php
				  	 	
				  	 	$k=0; 
				  	 	foreach( $one as $t => $task ){

				  	 		if(is_array($task)){
				  	 			$this->controller->widget('TabWidget',['model'=>$one,'params'=>$this->params, 'section'=>$i] );
				  	 			break;
				  	 		} else{
			  	 		  	 	if((int)$task == $taskActive && (int)$i == $taskSection){
			  	 					$active = 'task-active clas-color-active-'.$this->params['clas'];
			  	 				} else {
			  	 					$active = '';
			  	 				}

						  		if($k==0){
						  			echo '<div class="task-r">';
						  		}

						  		// echo '<div class="col-md-1 no task-one">';

						  		echo CHtml::link( '<div class="task-one task-one-'.$this->params['clas'].' ' .$active.' ">'.(int)$task.'</div>', array('/'.$this->params['clas'].'/'
						  			.$this->params['subject'].'/'
						  			.$this->params['book'].'/'.(int)substr($i, 0,2).'/'.(int)$task));

						  		// echo '</div>';
						  		$k++;
						  		$active = '';

						  		if($k==12){
						  			echo '</div>';
						  			$k=0;
						  		}
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


