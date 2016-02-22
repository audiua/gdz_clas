<?php
/* @var $this GdzBookController */
/* @var $model GdzBook */

$this->breadcrumbs=array(
	'Gdz Books'=>array('index'),
	'Create',
);

?>

<h1>Create Book</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>