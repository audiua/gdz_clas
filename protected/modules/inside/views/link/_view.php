<?php
/* @var $this LinkController */
/* @var $data Link */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_url')); ?>:</b>
	<?php echo CHtml::encode($data->from_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('on_url')); ?>:</b>
	<?php echo CHtml::encode($data->on_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keyword_id')); ?>:</b>
	<?php echo CHtml::encode($data->keyword_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_link')); ?>:</b>
	<?php echo CHtml::encode($data->check_link); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ankor')); ?>:</b>
	<?php echo CHtml::encode($data->ankor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('links_on_donor')); ?>:</b>
	<?php echo CHtml::encode($data->links_on_donor); ?>
	<br />

	*/ ?>

</div>