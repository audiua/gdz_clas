<div class="items">
<?php foreach( $this->model as $one):?>

	<div class="item col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<?= CHtml::link('<div>'.$one->author.' '.$one->title.' '.$one->clas->slug.' клас</div>', $one->clas->slug.'/'.$one->subject->slug.'/'.$one->slug); ?>
	</div>

<?php endforeach; ?>
</div>



					




