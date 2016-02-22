<div class="logo">
	<a href="/">
		<div class="logo-img">
			<img src="/images/strupko.png" alt="">
		</div>
		<div class="logo-title">SHKOLYAR.INFO</div>
		<div class="logo-description">шкільний інформаційний портал</div>
	</a>

	 <!-- <div class="black"></div>
	 <div class="red"></div>
	 <div class="black"></div> -->
</div>

<div class="footer-menu">
	<ul>
		<li><?php  echo CHtml::link('Про нас', array('/about'), array('rel'=>'nofollow', 'class'=>Yii::app()->request->requestUri=='/about'?'active':'')); ?></li>
		<li><?php  echo CHtml::link('Правовласникам', array('/rightholder'), array('rel'=>'nofollow', 'class'=>Yii::app()->request->requestUri=='/rightholder'?'active':'')); ?></li>
		<li><?php  echo CHtml::link('Контакти', array('/contacts'), array('rel'=>'nofollow', 'class'=>Yii::app()->request->requestUri=='/contacts'?'active':'')); ?></li>
		<li><?php  echo CHtml::link('sitemap.xml', array('/sitemap.xml'), array('rel'=>'nofollow', 'target'=>'_blank')); ?></li>

	</ul>
</div>


<div class="scroll_up">
    <div id="toTop"> <span class="blue glyphicon glyphicon-chevron-up"></span> Наверх </div>
</div>

<!-- Small modal -->
<div class="modal fade" id="fb-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    	<div class="modal-header">
    		<div class="modal-title" id="myModalLabel">Нажимай «Нравится» и отримуй усе необхідне для навчання у школі в соціальних мережах <span class="shkolyar blue">Facebook</span> і <span class="shkolyar blue">Vkontakte</span>:</div>
      	</div>

      	<div class="fb-like-widget">
      		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fshkolyar.info.page&amp;width=300&amp;height=290&amp;colorscheme=light&amp;show_faces=false&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:290px;" allowTransparency="true"></iframe>
      	</div>
    	
    	<div class="vk-like-widget">
	    	<!-- Put this script tag to the <head> of your page -->
			<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

			<script type="text/javascript">
			  VK.init({apiId: 4750024, onlyWidgets: true});
			</script>

			<!-- Put this div tag to the place, where the Like block will be -->
			<div id="vk_like"></div>
			<script type="text/javascript">
			VK.Widgets.Like("vk_like", {type: "button"});
			</script>
    	</div>

		<div class="clear"></div>

    	<div class="modal-footer">
    		<button type="button" class="btn btn-default" data-dismiss="modal">Мені вже подобається <span>SHKOLYAR.INFO</span></button>
      </div>
    </div>
  </div>
</div>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54716600-2', 'auto');
  ga('send', 'pageview');

</script>
