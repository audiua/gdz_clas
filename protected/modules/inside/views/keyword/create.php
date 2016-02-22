<?php
/* @var $this KeywordController */
/* @var $model Keyword */

$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Create',
);

?>

<h1>Create Keyword</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>