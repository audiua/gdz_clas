<div class="items">
<?php 
	

foreach( $this->model as $one): 

	$path = 'images/gdz/'.$one->clas->slug.'/'.$one->subject->slug.'/'.$one->slug.'/book';?>



	<div class="item col-lg-3 col-md-4 col-sm-4 col-xs-12"> 

		<?php

		echo CHtml::link(


		CHtml::image( 
			$one->getThumb(140,200,'resize'),
			// Yii::app()->baseUrl . '/' . $path.'/'.$one->img, 
			'ГДЗ - ' . $one->clas->slug . ' клас ' . $one->subject->title . ' ' .  $one->author, 
			array(
				'class'=>'', 
				'title'=>'ГДЗ - ' . $one->clas->slug . ' клас ' . $one->subject->title . ' ' .  $one->author,
				'width'=>'140',
				'heigth'=>'200'
			)
		), array( $one->clas->slug.'/'.$one->subject->slug.'/'.$one->slug) ); ?>


		<?= CHtml::link('<div>'.$one->author.' '.$one->title.' '.$one->clas->slug.' клас</div>', $one->clas->slug.'/'.$one->subject->slug.'/'.$one->slug); ?>
			<?php 
				if( !empty($one->properties) ){
					echo '<div class="desc">'.$one->properties.'</div>';
				}
			?>
	</div>

<?php endforeach; ?>
</div>



					




