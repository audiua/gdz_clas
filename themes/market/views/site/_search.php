<?php  
	
	$path = 'images/gdz/'.$data->gdz_clas->clas->slug.'/'.$data->gdz_subject->subject->slug.'/'.$data->slug.'/book';

?>

<div class="middle-book-block">

<div class=""> <?php echo CHtml::image(Yii::app()->baseUrl . '/' . $path.'/'.$data->slug.'.'.$data->img, $data->author . ' '.$data->description, array('class'=>'img-middle-book thumbnail ')) ?> </div>
	<div class="">
		<div class="book-author"> <?php echo $data->author; ?></div>
		<div class="book-subject"> <?php echo $data->title; ?></div>
		<div class="book-clas"><?php echo $data->gdz_clas->clas->slug; ?> клас</div>
		<?php 
			if( !empty($data->properties) ){
				echo '<div class="desc">'.$data->properties.'</div>';
			}
		?>
		<div class="desc">
			<p><?php echo $data->description; ?></p>
		</div>

	</div>

	<div class="gdz-link">
		<?php echo CHtml::link( 'gdz', array('/gdz/'.$data->gdz_clas->clas->slug.'/'.$data->gdz_subject->subject->slug.'/'.$data->slug)); ?>
	</div>
	<div class="textbook-link">
		<?php echo CHtml::link( 'textbook', array('/textbook/'.$data->gdz_clas->clas->slug.'/'.$data->gdz_subject->subject->slug.'/'.$data->slug)); ?>
	</div>
					
</div>