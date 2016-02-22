<?php
/* @var $this DescriptionController */
/* @var $model Description */

$this->breadcrumbs=array(
	'Descriptions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Description', 'url'=>array('index')),
	array('label'=>'Manage Description', 'url'=>array('admin')),
);
?>

<h1>Create Description</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>