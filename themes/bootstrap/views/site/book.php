<div class="full-banner">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- my full ban top -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:728px;height:90px"
	     data-ad-client="ca-pub-9657826060070920"
	     data-ad-slot="9080670692"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>


<h1><?= $this->h1; ?></h1>

<?php $this->widget('OneBookWidget'); ?>


<div class="clear"></div>
<div class="separator"></div>


<div class="task">
	<div class="task-title lead">Розвязання: 
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
	</section>
</div>




<div class="clear"></div>
<div class="separator"></div>

<div id="ad1" class="full-banner">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- my полный баннер -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:728px;height:90px"
	     data-ad-client="ca-pub-9657826060070920"
	     data-ad-slot="2417505095"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>


<div class="lead">Виберіть <?php echo  $this->bookModel->pagination == 'page' ? 'сторінку:' : 'завдання:' ; ?></div>

<div class="task-block">
	<?php $this->widget('TaskWidget'); ?>
</div>

<div class="clear"></div>
<div class="separator"></div>

<div class="lead">Популярні збірники гдз: </div>
<div class="book-list">
	<?php $this->widget('RelativeBooksWidget', array('mode'=>'all')); ?>
</div>

<div class="lead">Схожі збірники гдз: </div>
<div class="book-list">
	<?php $this->widget('RelativeBooksWidget', array('mode'=>'clas')); ?>
</div>



	
