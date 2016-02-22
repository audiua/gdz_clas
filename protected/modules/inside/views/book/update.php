<?php
/* @var $this GdzBookController */
/* @var $model GdzBook */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);
?>

<h1>Update Book <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>