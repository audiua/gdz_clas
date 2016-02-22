<?php
/* @var $this TextbookController */
/* @var $model Textbook */

$this->breadcrumbs=array(
	'Textbooks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Textbook', 'url'=>array('index')),
	array('label'=>'Create Textbook', 'url'=>array('create')),
	array('label'=>'View Textbook', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Textbook', 'url'=>array('admin')),
);
?>

<h1>Update Textbook <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>