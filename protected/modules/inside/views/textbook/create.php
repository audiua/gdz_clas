<?php
/* @var $this TextbookController */
/* @var $model Textbook */

$this->breadcrumbs=array(
	'Textbooks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Textbook', 'url'=>array('index')),
	array('label'=>'Manage Textbook', 'url'=>array('admin')),
);
?>

<h1>Create Textbook</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>