<?php
/* @var $this KeywordController */
/* @var $model Keyword */

$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	'Manage',
);

?>

<div class="title">Manage Keywords</div> <a class="btn btn-success" href="<?php echo $this->createUrl('create'); ?>" role="button"> + Створити</a>
<div class="clear"></div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'keyword-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	// 'rowCssClassExpression' => '( $data["google_view"] < 10 && $data["yandex_view"]) ? "grey" : "" )',
	'columns'=>array(
		'id' => array(
			'name'=>'id',
			'value'=>'$data->id',
			'htmlOptions'=>array('width'=>'30px')
		),
		'keyword',
		'google_view' => array(
			'name'=>'google_view',
			'value'=>'$data->google_view',
			'htmlOptions'=>array('width'=>'50px')
		),
		'yandex_view' => array(
			'name'=>'yandex_view',
			'value'=>'$data->yandex_view',
			'htmlOptions'=>array('width'=>'50px')
		),
		'url',
		'check_keyword' => array(
			'name'=>'check_keyword',
			'value'=>'$data->check_keyword',
			'htmlOptions'=>array('width'=>'30px')
		),
		'links_count' => array(
			'name'=>'links_count',
			'value'=>'count($data->link)',
			'htmlOptions'=>array('width'=>'30px')
		),
		'google_position'=>array(
			'name'=>'google_position',
			'value'=>'( $data->last[1]->google_position > $data->last[0]->google_position ) ? $data->last[0]->google_position . "<sup style=\"color:green\">+".($data->last[1]->google_position - $data->last[0]->google_position)."&uarr;</sup>" : $data->last[0]->google_position . "<sup style=\"color:red\">".($data->last[1]->google_position - $data->last[0]->google_position)."&darr; </sup>" ',
			'htmlOptions'=>array('width'=>'50px'),
			'type'=>'raw'
		),
		'yandex_position'=>array(
			'name'=>'yandex_position',
			'value'=>'( $data->last[1]->yandex_position > $data->last[0]->yandex_position ) ? $data->last[0]->yandex_position . "<sup style=\"color:green\">+".($data->last[1]->yandex_position - $data->last[0]->yandex_position)."&uarr;</sup>" : $data->last[0]->yandex_position . "<sup style=\"color:red\">".($data->last[1]->yandex_position - $data->last[0]->yandex_position)."&darr; </sup>" ',
			'htmlOptions'=>array('width'=>'50px'),
			'type'=>'raw'
		),

		'create_time'=>array(
			'name'=>'create_time',
			'value'=>'Yii::app()->dateFormatter->format(\'yyyy-MM-dd H:mm\', $data->last[0]->create_time)',
		),
		// 'update_time'=>array(
		// 	'name'=>'update_time',
		// 	'value'=>'Yii::app()->dateFormatter->format(\'yyyy-MM-dd H:mm\', $data->update_time)'
		// ),
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>'80px')
		),
	),
)); ?>
