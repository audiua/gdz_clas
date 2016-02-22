<?php
/* @var $this TextbookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Textbooks',
);

$this->menu=array(
	array('label'=>'Create Textbook', 'url'=>array('create')),
	array('label'=>'Manage Textbook', 'url'=>array('admin')),
);
?>

<h1>Textbooks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
