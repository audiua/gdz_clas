<?php
/* @var $this TextbookController */
/* @var $model Textbook */

$this->breadcrumbs=array(
	'Textbooks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Textbook', 'url'=>array('index')),
	array('label'=>'Create Textbook', 'url'=>array('create')),
	array('label'=>'Update Textbook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Textbook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Textbook', 'url'=>array('admin')),
);
?>

<h1>View Textbook #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'clas_id',
		'subject_id',
		'author',
		'year',
		'properties',
		'lang',
		'edition',
		'isbn',
		'format',
		'slug',
		'create_time',
		'update_time',
		'active',
		'publish_date',
	),
)); ?>
