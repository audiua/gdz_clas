<?php
/* @var $this SettingController */
/* @var $data Setting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('field')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->field), array('view', 'id'=>$data->field)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />


</div>