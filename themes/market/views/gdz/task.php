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
							<?php $this->widget('TizerWidget', ['params'=>['mode'=>'vertical']]); ?>

						</div>
					</div>
				
				</div> <!-- col-md-2 -->

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no full-h part bg">
					<div class="full-h no task">
						
						<?php  if( isset($task) && !empty($task) ): ?>
								
						<!-- <div class="row no task-book"> -->
							<section id="inverted-contain">
							  <div class="buttons">
							    <button class="zoom-out"><span class="glyphicon glyphicon-zoom-out "></span></button>
							    <input type="range" class="zoom-range">
							    <button class="zoom-in"><span class="glyphicon glyphicon-zoom-in "></span></button>
							    <!-- <button class="reset"><span class="glyphicon glyphicon-remove"></span></button> -->
							  </div>
							  
							  <div class="panzoom-parent">
							  <?php echo  CHtml::image(Yii::app()->baseUrl . '/images/' . $task['path'],
									"{$this->param['clas']} клас {$this->subjectModel->title} {$this->bookModel->author} задание № {$this->param['task']}", 
									array('title'=>"задание № {$this->param['task']}", 'class'=>' task-img panzoom ', 'data-width'=>$task['width'] )); ?>
							    <!-- <img class="" src="http://blog.millermedeiros.com/wp-content/uploads/2010/04/awesome_tiger.svg" width="900" height="900"> -->
							  </div>
							  <style>
							    #inverted-contain .panzoom { width: 100%;  }
							  </style>
							  <script>
							    (function() {
							      var $section = $('#inverted-contain');
							      $section.find('.panzoom').panzoom({
							        $zoomIn: $section.find(".zoom-in"),
							        $zoomOut: $section.find(".zoom-out"),
							        $zoomRange: $section.find(".zoom-range"),
							        // $reset: $section.find(".reset"),
							        startTransform: 'scale(0.5)',
							        increment: 0.1,
							        minScale: 1,
							        contain: 'invert'
							      }).panzoom('zoom');
							    })();
							  </script>
							</section>

								
						<!-- </div> -->
					

					<?php endif; ?>

						<div class="row horizont-tizer">
							<?php // $this->widget('TizerWidget', ['params'=>['mode'=>'horizont']]); ?>
						</div>

						<?php $this->widget('TaskWidget'); ?>

						<h3>Похожі готові домашні завдання: </h3>
						<div class="populate">
							<?php  $this->widget('RelativeBooksWidget', ['mode'=>'clas']); ?>
						</div>

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
						<?php // $this->widget('TizerWidget', ['params'=>['mode'=>'vertical']]); ?>
					</div>
					
				</div> 
				
			</div>
		</div>
	</div>
</div>