<h1><?= $this->h1; ?></h1>

<?php foreach($model as $clas): ?>
<div class="">
	<?php echo CHtml::link( $clas->slug . ' клас', '/'.$clas->slug, array('class'=>'lead')); 

		foreach($clas->subject as $subject):?>
			<br><?php echo CHtml::link( $subject->title, '/'.$clas->slug.'/'.$subject->slug, array('class'=>'marg_left_one') ); ?>

			
			<?php foreach($subject->book as $book): ?>
				<br><?php echo CHtml::link( $book->author, '/'.$clas->slug.'/'.$subject->slug.'/'.$book->slug, array('class'=>'marg_left_two') ); ?>

			<?php endforeach; ?>


		<?php endforeach; ?>
</div>

<?php endforeach; ?>