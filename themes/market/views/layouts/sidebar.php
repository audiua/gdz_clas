<!-- <div class="sidebar-block">
	<div class="direct">
		<img class='big_adsance' src="/images/big.jpeg"> 
	</div>
</div> -->

<div class="sidebar-block">
	<div class="info">Соц. мережі</div>
	<noindex>
		<div role="tabpanel">

		  <!-- Nav tabs -->
		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#vk" aria-controls="vk" role="tab" data-toggle="tab">vk</a></li>
		    <li role="presentation"><a href="#fb" aria-controls="fb" role="tab" data-toggle="tab">fb</a></li>
		    <li role="presentation"><a href="#ok" aria-controls="ok" role="tab" data-toggle="tab">ok</a></li>
		    <li role="presentation"><a href="#tw" aria-controls="tw" role="tab" data-toggle="tab">tw</a></li>
		  </ul>

		  <!-- Tab panes -->
		  <div class="tab-content">
		    <div role="tabpanel" class="tab-pane active" id="vk">
				<script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>

				<!-- VK Widget -->
				<div id="vk_groups"></div>
				<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode: 0, width: "300", height: "150", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 81422422);
				</script>
		    </div>
		    <div role="tabpanel" class="tab-pane" id="fb">
	    		<div class="facebook-group">
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fshkolyar.info.page&amp;width=300&amp;height=200&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:200px;" allowTransparency="true"></iframe>
				</div>
		    </div>

		    <div role="tabpanel" class="tab-pane" id="ok">
	    		<div id="ok_group_widget"></div>
	    		<script>
	    		!function (d, id, did, st) {
	    		  var js = d.createElement("script");
	    		  js.src = "http://connect.ok.ru/connect.js";
	    		  js.onload = js.onreadystatechange = function () {
	    		  if (!this.readyState || this.readyState == "loaded" || this.readyState == "complete") {
	    		    if (!this.executed) {
	    		      this.executed = true;
	    		      setTimeout(function () {
	    		        OK.CONNECT.insertGroupWidget(id,did,st);
	    		      }, 0);
	    		    }
	    		  }}
	    		  d.documentElement.appendChild(js);
	    		}(document,"ok_group_widget","52467133907131","{width:305,height:230}");
	    		</script>
		    </div>

		    <div role="tabpanel" class="tab-pane" id="tw">
	            <a rel="nofollow" class="twitter-timeline"  href="https://twitter.com/shkolyar_info" data-widget-id="553267900979896320">Твіти @shkolyar_info</a>
	            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	          
		    </div>

		  </div>

		</div>
	</noindex>

</div>

<div class="separator"></div>
<div class="clear"></div>

<div class="sidebar-block">
	<div class="menu">
		<div class="info">Навігація</div>

		<?php if( $this->id == 'gdz' || $this->id == 'textbook' ):  ?>
			<?php $this->widget('BookSidebarMenuWidget'); ?>
		<?php elseif($this->id == 'knowall') : ?>
			<?php $this->widget('KnowallSidebarMenuWidget'); ?>
		<?php elseif($this->id == 'library') : ?>
			<?php $this->widget('LibrarySidebarMenuWidget'); ?>
		<?php elseif($this->id == 'writing') : ?>
			<?php $this->widget('WritingSidebarMenuWidget'); ?>
		<?php else: ?>
			<?php $this->widget('SidebarMenuWidget'); ?>
		<?php endif; ?>
		
	</div>

	<!-- <img src="/images/b_l.png">  -->

	
</div>

<div class="separator"></div>
<div class="clear"></div>



<!-- <div class="separator"></div>
<div class="clear"></div> -->

<!-- <div class="sidebar-block">
	<h3>Соц. мережі</h3>
	<script type="text/javascript" src="//vk.com/js/api/openapi.js?115"></script>

	<div id="vk_groups"></div>
	<script type="text/javascript">
		VK.Widgets.Group("vk_groups", {mode: 0, width: "300", height: "150", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 81422422);
	</script>
</div> -->


<!-- <div class="sidebar-block"> -->

	<!-- <h3>Популярні за добу</h3> -->
	<?php // $this->widget('RelativeGdzWidget'); ?>

	<!-- <a href="http://TeaserNet.com/?owner_id=183605"><img src="http://teasernet.com/images/tnet/nets/1/200x200-2.gif "></a> -->
<!-- </div> -->
<!-- <div class="sidebar-block">
	<div class="tizer">
		<h3>tizer</h3>
	</div>
</div> -->




