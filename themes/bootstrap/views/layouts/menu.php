<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">

	<div class="navbar-header">
	  <!-- <a class="navbar-brand" href="/">ГДЗ Україна</a> -->
	  <?php echo ($this->action->id != 'index') ? CHtml::link('ГДЗ Україна', '/', array('class'=>'navbar-brand')): '<span class="navbar-brand">ГДЗ Україна</span>' ?>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
			
			<?php foreach( Clas::model()->findAll() as $clas ) : ?>

			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $clas->slug; ?> клас<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">

					<?php foreach( $clas->subject as $subject ) : ?>
					<li><a href="<?= $clas->slug . '/' . $subject->slug; ?>"><?= $subject->title; ?></a></li>
					<?php endforeach; ?>
				</ul>
			</li>

			<?php endforeach; ?>
			
	    </ul>
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<?php  
$this->widget('zii.widgets.CBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
    'tagName'=>'ol',
    'separator'=>' ',
    'homeLink'=>false,
    'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
    'htmlOptions'=>array ('class'=>'breadcrumb')
));
?>