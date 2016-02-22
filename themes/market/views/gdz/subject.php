<?php  
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'homeLink'=>CHtml::link('<span class="glyphicon glyphicon-home" aria-hidden="true"></span>', Yii::app()->homeUrl),
    'inactiveLinkTemplate'=>'<noindex><span class="sim-link">{label} <span class="glyphicon glyphicon-chevron-down small"></span></span></noindex>',
));
?>
<div class="detail-breadcrumbs">
<nav class="navbar navbar-default clas-menu" role="navigation">
  <div class="container-fluid clas-menu">
	<!-- Brand and toggle get grouped for better mobile display -->
	<!-- <div class="navbar-header">
	  <a class="navbar-brand" href="#">back</a>
	</div> -->

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	  
	  <ul class="nav navbar-nav">


		<li class="active"><a href="#">5</a></li>
		<li><a href="#">6</a></li>
		<li><a href="#">7</a></li>
		<li><a href="#">8</a></li>
		<li><a href="#">9</a></li>
		<li><a href="#">10</a></li>
		<li><a href="#">11</a></li>
		
	  </ul>
	  
	  
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<nav class="navbar navbar-default clas-menu" role="navigation">
  <div class="container-fluid clas-menu">
	<!-- Brand and toggle get grouped for better mobile display -->
	<!-- <div class="navbar-header">
	  <a class="navbar-brand" href="#">back</a>
	</div> -->

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

	

	  <ul class="nav navbar-nav">
		<li ><a href="#">Математика</a></li>
		<li><a href="#">Физика</a></li>
		<li><a href="#">Химия</a></li>
		<li><a href="#">Укринский язык</a></li>
		<li><a href="#">Русский язык</a></li>
		<li><a href="#">Геграфия</a></li>
		<li class="active"><a href="#">Биология</a></li>
		
	  </ul>
	  
	  
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</div>
<h1><?php echo $this->h1; ?></h1>

<div class="description">
  <?php  echo $this->subjectModel->description; ?>
</div>

<div class="info">Збірники ГДЗ</div> 
<?php $this->widget('DataBookWidget', array('model'=>$books)); ?>


<?php //$this->widget('BookWidget', array('model'=>$this->subjectModel->gdz_book)); ?>



  
