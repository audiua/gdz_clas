<?php
/* @var $this KeywordController */
/* @var $model Keyword */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'keyword-form',
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
		<?php echo $form->labelEx($model,'keyword', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>60,'maxlength'=>255,'class'=>'col-md-8 col-lg-8 control-label')); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'url', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255,'class'=>'col-md-8 col-lg-8 control-label')); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'google_view', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'google_view',array('size'=>10,'maxlength'=>10,'class'=>'col-md-8 col-lg-8 control-label')); ?>
		<?php echo $form->error($model,'google_view'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'yandex_view', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->textField($model,'yandex_view',array('size'=>10,'maxlength'=>10,'class'=>'col-md-8 col-lg-8 control-label')); ?>
		<?php echo $form->error($model,'yandex_view'); ?>
	</div>

	<div class="clear"></div>
	<div class="form-group">
		<div class="col-md-offset-9 col-lg-offset-9 col-md-2 col-lg-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Обновити',array('class'=>'btn btn-success', )); ?>
			<?php echo CHtml::link('Вiдмiнити', '/inside/keyword/index',array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->