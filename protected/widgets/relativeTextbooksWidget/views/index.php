<div class="items">
<?php 
	

foreach( $this->model as $one): ?>



	<div class="item col-lg-3 col-md-4 col-sm-4 col-xs-12"> 

		<?php

		echo CHtml::link(


		CHtml::image( 
			$one->getThumb(140,200,'resize'),
			// Yii::app()->baseUrl . '/' . $path.'/'.$one->img, 
			'Підручник ' . $one->clas->name . ' клас ' . $one->subject->name . ' ' .  $one->author. ' ' .  $one->year .' рік', 
			array(
				'class'=>'', 
				'title'=>'Підручник ' . $one->clas->name . ' клас ' . $one->subject->name . ' ' .  $one->author, 
				'width'=>'140',
				'heigth'=>'200'
			)
		), array( '/textbook/'.$one->clas->slug.'/'.$one->subject->slug.'/'.$one->slug) ); ?>


		<?= CHtml::link('<div>'.$one->author.' '.$one->title.' '.$one->clas->slug.' клас</div>', '/textbook/'.$one->clas->slug.'/'.$one->subject->slug.'/'.$one->slug); ?>
			<?php 
				if( !empty($one->properties) ){
					echo '<div class="desc">'.$one->properties.'</div>';
				}
			?>
	</div>

<?php endforeach; ?>
</div>



					




