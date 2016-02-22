<div class="row content">
	
	<div class="container-fluid full-h">
		
		<div class="app full-h">

			<div class="row no marg-h">

				<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 no full-h ">
					<div class="row no full-h">

						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 full-h ">

							<?php $this->widget('ClasNumbWidget'); ?>

						</div>

						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 full-h bg">
							<?php $this->widget('SubjectWidget'); ?>
						</div>

					</div>
				</div> <!-- col-md-2 -->

				<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2 no full-h part big bg">
					<div class="row no full-h">
						<div class="no row full-h">

							<?php $this->widget('BookWidget'); ?>

						</div>
					</div>
				
				</div> <!-- col-md-2 -->

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no full-h part bg">
					<div class="full-h no task">
						
						<?php  
							if( isset($task) && !empty($task) ):
								
								echo '<div class="row no task-book">';

								echo "{$this->param['clas']} клас {$this->subjectModel->title} {$this->bookModel->author} задание № {$this->param['task']}";
								echo  CHtml::image(Yii::app()->baseUrl . '/images/' . $task,
									"{$this->param['clas']} клас {$this->subjectModel->title} {$this->bookModel->author} задание № {$this->param['task']}", 
									array('title'=>"задание № {$this->param['task']}", 'class'=>'img-responsive task-img'));
							
								echo '</div>';
						?>

					<?php endif; ?>

						<?php $this->widget('TaskWidget'); ?>

						<!-- <div class="row no task-r">
							

							<?php  
								// if( isset($task) && !empty($task) ):
								// 	echo '<div class="row separator">';
								// 	echo 'Ссылка на книгу по формуле гугла';
								// 	echo '</div>';
								// endif;
							?>

						</div> -->

						

					</div>
					
				</div> <!-- col-md-5 -->

				<div class=" hidden-xs col-sm-2 col-md-2 col-lg-2 no full-h part reklama ">
					<div class="reklame-inner full-h part no bg">
						<a href="http://web-jewel.ru" target="_blank">Заработок в интернете</a>
					</div>
					
				</div> 
				
			</div>
		</div>
	</div>
</div>