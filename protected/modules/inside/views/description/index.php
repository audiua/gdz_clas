<?php
/* @var $this DescriptionController */
/* @var $model Description */

$this->breadcrumbs=array(
	'Descriptions'=>array('index'),
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
	$('#description-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="title">Manage Descriptions</div> <a class="btn btn-success" href="<?php echo $this->createUrl('create'); ?>" role="button"> + Створити</a>
<div class="clear"></div>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'description-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id' => array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px')
		),
		'owner',
		'action',
		'page_mode'=>array(
			'name'=>'page_mode',
			'value'=>'!empty($data->page_mode) ? $data->page_mode : "" ',
			'header'=>'Вид сторінки',
			'htmlOptions'=>array('width'=>'60px')
		),
		'clas_id'=>array(
			'name'=>'clas_id',
			'value'=>'!empty($data->clas) ? $data->clas->slug : "" ',
			'header'=>'Клас',
			'htmlOptions'=>array('width'=>'30px')
		),

		// 'category_id'=>array(
		// 	'name'=>'category_id',
		// 	'value'=>'!empty($data->category_id) ? $data->category->title : "" ',
		// 	'header'=>'category',
		// 	'htmlOptions'=>array('width'=>'30px')
		// ),

		'subject_id'=>array(
			'name'=>'subject_id',
			'value'=>'!empty($data->subject) ? $data->subject->slug : "" ',
			'header'=>'Предмет',
			'htmlOptions'=>array('width'=>'60px')
		),
		'update_time'=>array(
			'name'=>'update_time',
			'value'=>'Yii::app()->dateFormatter->format("yyyy/MM/dd HH:mm", $data->update_time)',
			'htmlOptions'=>array('width'=>'150px')
		),
		'description',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'10px')
		),
	),
)); ?>
