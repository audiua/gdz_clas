<h1><?= $this->h1; ?></h1>

<div class="description">
</div>
<div class="separator"></div>
<div class="separator"></div>
<div class="clearfix"></div>

<?php $this->widget('DataBookWidget', array('model'=>$books)); ?>
