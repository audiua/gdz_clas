<?php 

$path = 'images/gdz/'.$data->clas->slug.'/'.$data->subject->slug.'/'.$data->slug.'/book'; ?>



<div class="col-xs-3 one-book"> 

	<?php

	echo CHtml::link(


	CHtml::image( 
		// $data->getThumb(165,250,'crop'),
		Yii::app()->baseUrl . '/' . $path.'/'.$data->img, 
		'ГДЗ - ' . $data->clas->slug . ' клас ' . $data->subject->title . ' ' .  $data->author, 
		array(
			'class'=>'', 
			'title'=>'ГДЗ - ' . $data->clas->slug . ' клас ' . $data->subject->title . ' ' .  $data->author
		)
	), array( $data->clas->slug.'/'.$data->subject->slug.'/'.$data->slug) ); ?>

	<div class="">
		<div class="book-author"> <?php echo $data->author; ?></div>
		<div class="book-subject"> <?php echo $data->title; ?></div>
		<div class="book-clas"><?php echo $data->clas->slug; ?> клас</div>
		<?php 
			if( !empty($data->properties) ){
				echo '<div class="desc">'.$data->properties.'</div>';
			}
		?>

	</div>
</div>

					
