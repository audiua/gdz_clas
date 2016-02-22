<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>
<div class="login-form">
	<h1>Авторизація</h1>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
		'htmlOptions'=>array(
			'class'=>"form-horizontal",
		),
	)); ?>

		<div class="form-group">

			<div class="input-group">
				<span class="input-group-addon">
					<span class="glyphicon  glyphicon-user"></span>
				</span>
				<?php echo $form->textField($model,'username',array('maxlength'=>255, 'placeholder'=>'your login', 'class'=>'form-control')); ?>
				<span class="input-group-addon">*</span>
			</div>
			
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="form-group">

			<div class="input-group">
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-lock"></span>
				</span>
				<?php echo $form->passwordField($model,'password',array('maxlength'=>255, 'placeholder'=>'password', 'class'=>'form-control')); ?>
				<span class="input-group-addon">*</span>
			</div>
			
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="form-group">
			<div class="checkbox">
				<label>
					<?php echo $form->checkBox($model,'rememberMe'); ?>Запам'ятати мене
				</label>
			</div>
		</div>
	
		<div class="clear"></div>
		<div class="form-group">
			<?php echo CHtml::submitButton('Увійти',array('class'=>'btn btn-success full-width' )); ?>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>
