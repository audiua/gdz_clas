<?php
/* @var $this SubjectController */
/* @var $model Subject */
/* @var $form CActiveForm */
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subject-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('role'=>'form'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'description', array('class'=>"col-md-2 col-lg-2 control-label")); ?>
		
		<div class="col-md-9 col-lg-9">
			<?php
			$this->widget('ImperaviRedactorWidget', array(
			    // You can either use it for model attribute
			    'model' => $model,
			    'attribute' => 'description',
				// 'selector' => '.col-md-10 col-lg-10',

			    // or just for input field
			    // 'name' => 'Knowall_text',

			    // Some options, see http://imperavi.com/redactor/docs/
			    'options' => array(
			    	'buttons'=>array(
	                    'html','html','formatting', '|', 'bold', 'italic', 'deleted', '|',
	                    'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
	                    'image', 'video', 'link', '|'
	                ),
			        'lang' => 'ru',
			        'toolbar' => true,
			        'iframe' => true,
			        'css' => 'wym.css',
			        'imageGetJson' => Yii::app()->createAbsoluteUrl('/ajax/writing/imageGetJson'),
			        'imageUpload' => Yii::app()->createAbsoluteUrl('/ajax/writing/imageUpload'),
			        'clipboardUploadUrl' => Yii::app()->createAbsoluteUrl('/ajax/writing/imageUpload'),
			        'fileUpload' => Yii::app()->createAbsoluteUrl('/ajax/writing/fileUpload'),

			    ),
			)); 
			?>
		</div>
		
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="form-group col-lg-6">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	<div class="form-group col-lg-6">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>255, 'class'=>'form-control')); ?>
	</div>

	

	<div class="form-group col-lg-3">
		<?php echo $form->labelEx($model,'create_time'); ?>

		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'attribute' => 'create_time',
		    'value'=>$model->create_time,
		    'htmlOptions' => array(
		    	'defaultDate'=>$model->create_time,
		        
		    ),
		));
		?>

		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="form-group col-lg-3">
		<?php echo $form->labelEx($model,'update_time'); ?>

		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		    'model' => $model,
		    'attribute' => 'update_time',
		    'value'=>$model->update_time,
		    'htmlOptions' => array(
		    	'defaultDate'=>$model->update_time,
		        
		    ),
		));
		?>
		
		<?php echo $form->error($model,'update_time'); ?>
	</div>

	<div class="clear"></div>
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Створити' : 'Обновити',array('class'=>'btn btn-success')); ?>
		<?php echo CHtml::link('Вiдмiнити', '/inside/subject/index',array('class'=>'btn btn-default')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->