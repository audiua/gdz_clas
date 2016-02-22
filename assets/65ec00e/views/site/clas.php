<h1><?= $this->h1; ?></h1>

<div class="description">
	<?= $this->clasModel->description; ?>
</div>
<div class="separator"></div>
<div class="separator"></div>
<div class="clearfix"></div>

<?php $this->widget('DataBookWidget', array('model'=>$books)); ?>
