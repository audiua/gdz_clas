<?php
/* @var $this DescriptionController */
/* @var $model Description */

$this->breadcrumbs=array(
	'Descriptions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Description', 'url'=>array('index')),
	array('label'=>'Create Description', 'url'=>array('create')),
	array('label'=>'View Description', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Description', 'url'=>array('admin')),
);
?>

<h1>Update Description <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>