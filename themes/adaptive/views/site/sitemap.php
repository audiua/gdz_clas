<h1><?= $this->h1; ?></h1>


<div class="">
	<?php

		foreach($clas->subject as $subject):?>
			<br><?php echo CHtml::link( $subject->title, '/'.$clas->slug.'/'.$subject->slug, array('class'=>'marg_left_one') ); ?>

			
			<?php foreach($subject->book as $book): ?>
				<br><?php echo CHtml::link( $book->author, '/'.$clas->slug.'/'.$subject->slug.'/'.$book->slug, array('class'=>'marg_left_two') ); ?>

			<?php endforeach; ?>


		<?php endforeach; ?>
</div>



<div class="">Підручники</div>

<div class="">
	<?php

		foreach($clasT->getSubject() as $subject):?>
			<br><?php echo CHtml::link( $subject->name, '/textbook/'.$clasT->slug.'/'.$subject->slug, array('class'=>'marg_left_one') ); ?>

			
			<?php foreach($subject->getBook($clasT->slug) as $book): ?>
				<br><?php echo CHtml::link( $book->author, '/textbook/'.$clasT->slug.'/'.$subject->slug.'/'.$book->slug, array('class'=>'marg_left_two') ); ?>

			<?php endforeach; ?>


		<?php endforeach; ?>
</div>
