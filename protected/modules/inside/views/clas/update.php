<?php
/* @var $this ClasController */
/* @var $model Clas */

$this->breadcrumbs=array(
	'Класи'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'homeLink'=>CHtml::link('Головна', '/inside/admin/index'),
    'inactiveLinkTemplate'=>'<noindex><span class="sim-link">{label} <span class="glyphicon glyphicon-chevron-down small"></span></span></noindex>',
));
?>

<h1>Update Clas <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>