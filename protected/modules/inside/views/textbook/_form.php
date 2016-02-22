<?php
/* @var $this TextbookController */
/* @var $model Textbook */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'textbook-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'clas_id'); ?>
		<?php echo $form->textField($model,'clas_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'clas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_id'); ?>
		<?php echo $form->textField($model,'subject_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'properties'); ?>
		<?php echo $form->textArea($model,'properties',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'properties'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lang'); ?>
		<?php echo $form->textField($model,'lang',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'lang'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edition'); ?>
		<?php echo $form->textField($model,'edition',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'edition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isbn'); ?>
		<?php echo $form->textField($model,'isbn',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'format'); ?>
		<?php echo $form->textField($model,'format',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'format'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publish_date'); ?>
		<?php echo $form->textField($model,'publish_date',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'publish_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->