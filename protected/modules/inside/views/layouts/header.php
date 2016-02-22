<div class="header">


	<nav class="navbar navbar-default navbar-static-top " role="navigation">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <?php echo CHtml::link('Inside', '/inside/admin', array('class'=>'navbar-brand')); ?>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="<?php echo $this->id == 'clas' ? 'active' : '' ; ?>"><?php echo CHtml::link('Класи', '/inside/clas/'); ?></li>
			<li class="<?php echo $this->id == 'subject' ? 'active' : '' ; ?>"><?php echo CHtml::link('Предмети', '/inside/subject/'); ?></li>
			<li class="<?php echo $this->id == 'book' ? 'active' : '' ; ?>"><?php echo CHtml::link('Збірники', '/inside/book/'); ?></li>
			

			<li class="<?php echo $this->id == 'description' ? 'active' : '' ; ?>"><?php echo CHtml::link('Описи', '/inside/description'); ?></li>
			<li class="<?php echo $this->action->id == 'calendar' ? 'active' : '' ; ?>"><?php echo CHtml::link('Розклад', '/inside/admin/calendar'); ?></li>
	      
			<li class="dropdown <?php echo stripos($this->id, 'keyword') !== false ? 'active' : '' ; ?>">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SEO <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
			    <li> <?php echo CHtml::link('Keywords', '/inside/keyword'); ?></li>
			    <li class="divider"></li>
			    <li> <?php echo CHtml::link('Links', '/inside/link'); ?></li>
			  </ul>
			</li>



	      </ul>
	     
	      <ul class="nav navbar-nav navbar-right">
	        <!-- <li><a href="#">Link</a></li> -->
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo Yii::app()->user->role; ?> <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><?php echo CHtml::link('Сайт', '/',array('target'=>'_blanck')); ?></li>
	            <li><?php echo CHtml::link('Настройки', '/inside/setting'); ?></li>
	            <li class="divider"></li>
	            <li><?php echo CHtml::link('Выйти', '/site/logout'); ?></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>