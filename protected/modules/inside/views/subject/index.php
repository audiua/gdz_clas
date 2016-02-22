<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs=array(
	'Subjects'=>array('index'),
	'Manage',
);

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'homeLink'=>CHtml::link('Головна', '/inside/admin/index'),
    'inactiveLinkTemplate'=>'<noindex><span class="sim-link">{label} <span class="glyphicon glyphicon-chevron-down small"></span></span></noindex>',
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subject-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="title">Manage Subjects</div> <a class="btn btn-success" href="<?php echo $this->createUrl('create'); ?>" role="button"> + Створити</a>
<div class="clear"></div>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php if(Yii::app()->user->hasFlash('KNOWALL_FLASH')):?>
    <div class="alert alert-success" role="alert">
	    <button type="button" class="close" data-dismiss="alert">
		    <span aria-hidden="true">&times;</span>
		    <span class="sr-only">Close</span>
	    </button>
    	<?php echo Yii::app()->user->getFlash('KNOWALL_FLASH'); ?>
    </div>
        
<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'subject-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px')
		),
		'class_id'=>array(
			'name'=>'class_id',
			'value'=>'$data->clas->slug',
			'header'=>'Клас',
			'htmlOptions'=>array('width'=>'30px')
		),
		'title',
		'slug',
		'description',
		'create_time'=>array(
			'name'=>'create_time',
			'value'=>'Yii::app()->dateFormatter->format(\'yyyy/MM/dd HH:mm\', $data->create_time)',
		),
		'update_time'=>array(
			'name'=>'update_time',
			'value'=>'Yii::app()->dateFormatter->format(\'yyyy/MM/dd HH:mm\', $data->update_time)'
		),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'80px')
		),
	),
)); ?>
