<div class="footer">
	
	<nav class="navbar navbar-default" role="navigation">
	  <div class="container">
		<div class="navbar-header">
			<button tupe="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-footer">
				<span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		  <?php echo ($this->action->id != 'index') ? CHtml::link('ГДЗ '.Yii::app()->params['clas'].' клас Україна', '/', array('class'=>'navbar-brand')): '<span class="navbar-brand">ГДЗ '.Yii::app()->params['clas'].' клас Україна</span>' ?>
		</div>

	    <div class="collapse navbar-collapse" id="menu-footer">
	      <ul class="nav navbar-nav navbar-right">
	        <li>
				<?php  echo CHtml::link('Контакти', array('/site/page?view=contacts'), array('rel'=>'nofollow')); ?>
	        </li>
	        <li>
				<?php  echo CHtml::link('Правовласникам', array('/site/page?view=rightholder'), array('rel'=>'nofollow')); ?>
	        </li>
	        <li>
				<?php  echo CHtml::link('Рекламодавцям', array('/site/page?view=advertiser'), array('rel'=>'nofollow')); ?>
	        </li>
	        <li>
				<?php  echo CHtml::link('Правила та Угоди', array('/site/page?view=rules'), array('rel'=>'nofollow')); ?>
	        </li>
	        <li>
				<?php  echo CHtml::link('Карта сайта', array('/sitemap'), array('rel'=>'nofollow', 'target'=>'_blank')); ?>
	        </li>
	        <li>
				<?php  echo CHtml::link('sitemap.xml', array('/sitemap.xml'), array('rel'=>'nofollow', 'target'=>'_blank')); ?>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
 