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
		  <?php echo ($this->action->id != 'index') ? CHtml::link('ГДЗ Україна', '/', array('class'=>'navbar-brand')): '<span class="navbar-brand">ГДЗ Україна</span>' ?>
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

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-54716600-1', 'auto');
	  ga('send', 'pageview');

	</script>

	<!--LiveInternet counter--><script type="text/javascript"><!--
	new Image().src = "//counter.yadro.ru/hit?r"+
	escape(document.referrer)+((typeof(screen)=="undefined")?"":
	";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
	screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
	";"+Math.random();//--></script><!--/LiveInternet-->


	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
	    (function (d, w, c) {
	        (w[c] = w[c] || []).push(function() {
	            try {
	                w.yaCounter32396805 = new Ya.Metrika({
	                    id:32396805,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true,
	                    webvisor:true
	                });
	            } catch(e) { }
	        });

	        var n = d.getElementsByTagName("script")[0],
	            s = d.createElement("script"),
	            f = function () { n.parentNode.insertBefore(s, n); };
	        s.type = "text/javascript";
	        s.async = true;
	        s.src = "https://mc.yandex.ru/metrika/watch.js";

	        if (w.opera == "[object Opera]") {
	            d.addEventListener("DOMContentLoaded", f, false);
	        } else { f(); }
	    })(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/32396805" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->


	<!-- <script async src="<?php // echo Yii::app()->theme->baseUrl; ?>/js/less.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->

</div>
 