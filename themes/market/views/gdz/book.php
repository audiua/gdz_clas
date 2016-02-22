<?php  
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'homeLink'=>CHtml::link('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', Yii::app()->homeUrl),
    'inactiveLinkTemplate'=>'<noindex><span class="sim-link">{label} <span class="glyphicon glyphicon-chevron-down"></span></span></noindex>',
));
?>

<?php $this->widget('BreadcrumbsWidget'); ?>

<h1><?php echo $this->h1; ?></h1>


<div class="info"></div>
<div class="book-list">
	<div class="big-book-block">
	<?php $this->widget('OneBookWidget', array('model'=>$this->bookModel)); ?>

		<!-- <div class=""><img class="img-middle-book thumbnail" src="http://placehold.it/150x200" alt=""> </div>
  		<div class="">
  			<div class="book-author">author</div>
  			<div class="book-subject">subject</div>
  			<div class="book-clas">clas</div>
  			<div class="desc">
  				<p>Book Book Book Book Book Book Book Book Book Book
  				Book Book Book Book Book</p>
  			</div>

  		</div>
		<div class="textbook-link">
			<a href="#">textbook</a>
		</div> -->
					
	</div>
	
</div>

<div class="clear"></div>
<div class="separator task-separator"></div>

<div class="task">
	<div class="task-title info">Розвязання: 
	</div>
	<section id="inverted-contain">
		<div class="loading"></div>
        <div class="darking"></div>
		  <div class="buttons">
		    <button class="zoom-out"><span class="glyphicon glyphicon-zoom-out "></span></button>
		    <input type="range" class="zoom-range">
		    <button class="zoom-in"><span class="glyphicon glyphicon-zoom-in "></span></button>
		    <button class="reset"><span class="glyphicon glyphicon-remove"></span></button>
		  </div>
	  
		  <div class="panzoom-parent"></div>
		  <span class="b-left"><span class="glyphicon glyphicon-arrow-left big" aria-hidden="true"></span></span>	
		  <span class="b-right"><span class="glyphicon glyphicon-arrow-right big" aria-hidden="true"></span></span>
		  <style>
		    #inverted-contain .panzoom { width: 100%; height: 100%;  }
		  </style>
		 <!--  <script>
		    (function() {
		      var $section = $('#inverted-contain');
		      $section.find('.panzoom').panzoom({
		        $zoomIn: $section.find(".zoom-in"),
		        $zoomOut: $section.find(".zoom-out"),
		        $zoomRange: $section.find(".zoom-range"),
		        $reset: $section.find(".reset"),
		        startTransform: 'scale(0.9)',
	            increment: 0.1,
	            minScale: 1,
	            contain: 'invert'
		      }).panzoom('zoom');
		    })();
		  </script> -->
	 
	</section>
</div>




<div class="clear"></div>
<div class="separator"></div>
<div class="info">Виберіть <?php echo  $this->bookModel->pagination == 'page' ? 'сторінку' : 'завдання' ; ?></div>
<div class="task-block">
	<?php $this->widget('TaskWidget'); ?>
</div>
