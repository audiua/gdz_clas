<?php
/* @var $this GdzBookController */
/* @var $model GdzBook */

$this->breadcrumbs=array(
	'Books'=>array('index'),
	$model->title,
);


?>

<h1>View Book #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'author',
		'clas_id',
		'subject_id',
		'slug',
		'img',
		'description',
		'year',
		'properties',
		'pagination',
		'create_time',
		'update_time',
		'public_time',
		'lang',
		'public',
		'edition',
		'info',
	),
)); ?>
