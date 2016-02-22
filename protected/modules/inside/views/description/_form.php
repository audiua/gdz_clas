<?php
/* @var $this DescriptionController */
/* @var $model Description */
/* @var $form CActiveForm */
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'description-form',
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
		<?php echo $form->labelEx($model,'description', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		
		<div class="col-md-9 col-lg-9">
			<?php $this->widget('ImperaviRedactorWidget', array(
			    // You can either use it for model attribute
			    'model' => $model,
			    'attribute' => 'description',

				// 'selector' => '#redactor',

			    // or just for input field
			    // 'name' => 'Knowall_text',

			    // Some options, see http://imperavi.com/redactor/docs/
			    'options' => array(
			    	'buttons'=>array(
	                    'html','html', 'formatting', '|', 'bold', 'italic', 'deleted', '|',
	                    'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
	                    'image', 'link'
	                ),
	          //       'pastePlainText' => true,
			        'lang' => 'ru',
			        'toolbar' => true,
			        'iframe' => true,
			        'css' => 'wym.css',
			        'imageGetJson' => Yii::app()->createAbsoluteUrl('/ajax/description/imageGetJson'),
			        'imageUpload' => Yii::app()->createAbsoluteUrl('/ajax/description/imageUpload'),
			        // 'clipboardUploadUrl' => Yii::app()->createAbsoluteUrl('/ajax/description/imageUpload'),
			        // 'fileUpload' => Yii::app()->createAbsoluteUrl('/ajax/description/fileUpload'),

			    ),
			)); ?>
		</div>
		
		<?php echo $form->error($model,'description'); ?>
	</div>




	<div class="form-group">
		<?php echo $form->labelEx($model,'owner', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->dropDownList($model,'owner',Helper::getOwner(), array('class'=>'col-md-4 col-lg-4 control-label')); ?>
		<?php echo $form->error($model,'owner'); ?>
	
		<?php echo $form->labelEx($model,'action', array('class'=>"col-md-1 col-lg-1 control-label")); ?>
		<?php echo $form->dropDownList($model,'action',Helper::getAction(), array('class'=>'col-md-4 col-lg-4 control-label')); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'clas_id', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->dropDownList($model,'clas_id',Clas::getAll(),array('class'=>'col-md-4 col-lg-4 control-label','empty' => '')); ?>
		<?php echo $form->error($model,'clas_id'); ?>

		<?php echo $form->labelEx($model,'subject_id', array('class'=>"col-md-1 col-lg-1 control-label")); ?>
		<?php echo $form->dropDownList($model,'subject_id',Subject::getAll(),array('class'=>'col-md-4 col-lg-4 control-label','empty' => '')); ?>
		<?php echo $form->error($model,'subject_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'category_id', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		<?php echo $form->dropDownList($model,'category_id',array(),array('class'=>'col-md-2 col-lg-2 control-label','empty' => '')); ?>
		<?php echo $form->error($model,'category_id'); ?>

		<?php echo $form->labelEx($model,'page_mode', array('class'=>"col-md-1 col-lg-1 control-label")); ?>
		<?php echo $form->dropDownList($model,'page_mode',Helper::getPageMode(), array('class'=>'col-md-2 col-lg-2 control-label')); ?>
		<?php echo $form->error($model,'page_mode'); ?>
	
		
		<?php echo $form->labelEx($model,'block_id', array('class'=>"col-md-1 col-lg-1 control-label")); ?>
		<?php echo $form->textField($model,'block_id',array('size'=>60,'maxlength'=>255,'class'=>'col-md-2 col-lg-2 control-label')); ?>
		<?php echo $form->error($model,'block_id'); ?>
	</div>

	<div class="clear"></div>
	<div class="form-group">
		<div class="col-md-offset-9 col-lg-offset-9 col-md-2 col-lg-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Обновити',array('class'=>'btn btn-success', )); ?>
			<?php echo CHtml::link('Вiдмiнити', '/inside/gdzBook/index',array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

