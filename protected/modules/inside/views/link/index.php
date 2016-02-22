<?php
/* @var $this LinkController */
/* @var $model Link */

$this->breadcrumbs=array(
	'Links'=>array('index'),
	'Manage',
);

?>

<div class="title">Manage Links</div> <a class="btn btn-success" href="<?php echo $this->createUrl('create'); ?>" role="button"> + Створити</a>
<div class="clear"></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'link-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'from_url'=>array(
			'name'=>'from_url',
			'value'=>' CHtml::link($data->from_url,$data->from_url, array("target"=>"_blank", "class"=>"link"))',
			'type'=>'raw'
		),
		'on_url'=>array(
			'name'=>'on_url',
			'value'=>' CHtml::link(Yii::app()->createAbsoluteUrl($data->keyword->url),$data->keyword->url, array("target"=>"_blank", "class"=>"link"))',
			'type'=>'raw'
		),
		'keyword_id'=>array(
			'name'=>'keyword_id',
			'value'=>' CHtml::link($data->keyword->keyword, array("/inside/keyword/view/".$data->keyword->id), array("target"=>"_blank", "class"=>"link"))',
			'type'=>'raw'
		),
		'ankor',
		'check_link'=>array(
			'name'=>'check_link',
			'value'=>'($data->check_link)?"<span style=\"color:green\" class=\"glyphicon glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>":"<span style=\"color:red\" class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>"',
			'type'=>'raw',
			'htmlOptions'=>array('width'=>'30px')
		),
		'check_time'=>array(
			'name'=>'check_time',
			'value'=>'Yii::app()->dateFormatter->format(\'yyyy/MM/dd HH:mm\', $data->check_time)',
		),
		'links_on_donor',
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'80px')
		),
	),
)); ?>
