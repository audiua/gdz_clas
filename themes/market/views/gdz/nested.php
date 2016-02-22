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

				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no full-h part big bg">
					<div class="row no full-h">
						<div class="no row full-h">

							<?php $this->widget('BookWidget'); ?>

						</div>
					</div>
				
				</div> <!-- col-md-2 -->

				<div class="col-xs-6 col-sm-5 col-md-5 col-lg-5 no full-h part bg">
					<div class="full-h no task">
						
						<?php  
							if( isset($task) && !empty($task) ):
								
								echo '<div class="row no task-book">';

									echo "{$this->params['clas']}клас {$this->params['subject']} {$this->params['book']} задание № {$this->params['task']}";

									echo  CHtml::image(Yii::app()->baseUrl . '/images/' . $task,'Завдання Т', array('title'=>'Delete', 'class'=>'img-responsive'));
								
								echo '</div>';
								

							else:
						?>

						<?php $this->widget('BookWidget',['one'=>true]); ?>

						<!-- <div class="row no task-book">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="col-md-4 no img">
									<img src="http://placehold.it/110x150" alt="">
								</div>
								<div class="col-md-8 no desc">
									<p><span class="bold">Автор</span>: Пушкин Ф.Ф.</p>
									<p><span class="bold">Год</span>: 2010</p>
									<p><span class="bold">Описание</span>: Учебник по математике для 5 класа</p>
									<p><span class="bold">Страна</span>: Украина</p>
								</div>

							</div>
							<div class="col-md-1"></div>
							
						</div> -->
					<?php endif; ?>

						<?php $this->widget('TaskWidget'); ?>
						<div class="row no task-r"></div>

						<?php  
							if( isset($task) && !empty($task) ):
								echo '<div class="row no task-book">';
								echo 'Ссылка на книгу по формуле гугла';
								echo '</div>';
							endif;
						?>

					</div>
					
				</div> <!-- col-md-5 -->

				<div class=" hidden-xs col-sm-2 col-md-2 col-lg-2 no full-h part reklama ">
					<div class="reklame-inner full-h part no bg">
					
					</div>
					
				</div> 
				
			</div>
		</div>
	</div>
</div>