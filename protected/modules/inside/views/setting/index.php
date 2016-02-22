<h1>Settings</h1>

<?php if(Yii::app()->user->hasFlash('Setting_FLASH')):?>
    <div class="alert alert-success" role="alert">
	    <button type="button" class="close" data-dismiss="alert">
		    <span aria-hidden="true">&times;</span>
		    <span class="sr-only">Close</span>
	    </button>
    	<?php echo Yii::app()->user->getFlash('Setting_FLASH'); ?>
    </div>
<?php endif; ?>

<div class="form">
	
<form id="setting-form" class="form-horizontal" action="/inside/setting/update" method="post" role="form">

	
<?php foreach($setting as $one): ?>
	<div class="form-group">
	<label class="col-md-2 col-lg-2 control-label" for="Setting_<?php echo $one->field; ?>"><?php echo $one->field; ?></label>
	<input class="col-md-8 col-lg-8 control-label" id="Setting_<?php echo $one->field; ?>" type="text" name="Setting[<?php echo $one->field; ?>]" value='<?php echo $one->value; ?>' maxlength="255" size="<?php echo $one->field == 'cookie_token' ? '100' : '' ;?>" >
	</div>
<?php endforeach; ?>

<div class="clear"></div>
<div class="form-group">
	<div class="col-md-offset-9 col-lg-offset-9 col-md-2 col-lg-2">
		<button class="btn btn-success">Зберегти</button>
	</div>
</div>
</form>


</div>

