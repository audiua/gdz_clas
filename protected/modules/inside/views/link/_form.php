<?php
/* @var $this LinkController */
/* @var $model Link */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'link-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'class'=>"form-horizontal",
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'from_url', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'from_url',array('size'=>60,'maxlength'=>255,'class'=>'col-md-8 col-lg-8 control-label') ); ?>
		<?php echo $form->error($model,'from_url'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'keyword_id', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->dropDownList($model,'keyword_id', Keyword::getAll(), array('class'=>'control-label col-md-2 col-lg-2') ); ?>
		<?php echo $form->error($model,'keyword_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'ankor', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'ankor',array('size'=>60,'maxlength'=>255,'class'=>'col-md-8 col-lg-8 control-label')); ?>
		<?php echo $form->error($model,'ankor'); ?>
	</div>

	<div class="clear"></div>
	<div class="form-group">
		<div class="col-md-offset-9 col-lg-offset-9 col-md-2 col-lg-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Обновити',array('class'=>'btn btn-success', )); ?>
			<?php echo CHtml::link('Вiдмiнити', '/inside/link',array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->