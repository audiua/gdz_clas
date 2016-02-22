<?php $helper = new AdminHelper; ?>
<div class="admin-content">
	<div class="cache">
		cache - 
		<span class="cache-size">
			<?php echo $helper->sizeFormat( $helper->sizeDir( Yii::app()->basePath.'/runtime/cache/' ) ); ?>
		</span>
	
		<a href="#" id="clearCache" class="btn btn-default">clear cache</a>
	</div>

	<div class="assets">
		assets - 
		<span class="assets-size">
			<?php echo $helper->sizeFormat( $helper->sizeDir( Yii::app()->assetManager->basePath ) ); ?>
		</span>
	
		<a href="#" id="clearAssets" class="btn btn-default">clear assets</a>
	</div>

</div>

<script>
	
$('#clearCache').click(function(e){
	e.preventDefault();

	$.post('/ajax/admin/clearCache', {'cashe':'clear'}, function(responce){
	        if(responce.success){
	            $('.cache-size').text('0 bytes');
	        }
	    }, 'json');
});

$('#clearAssets').click(function(e){
	e.preventDefault();

	$.post('/ajax/admin/clearAssets', {'assets':'clear'}, function(responce){
		console.log(responce);
	        if(responce.success){
	            $('.assets-size').text('0 bytes');
	        }
	    }, 'json');
});

</script>