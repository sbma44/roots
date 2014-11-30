<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer');?>
      
	  <section class="widget">
	  	<form  action="//feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=manifestdensitynet', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
	  		<h3>Subscribe via Email</h3>
	  		<div class="input-group">
	  			<input type="text" class="form-control" name="email" placeholder="Email Address">
	  			<span class="input-group-btn"><input type="submit" class="btn btn-default" value="Subscribe" /></span>
	  		</div>
  			<input type="hidden" value="manifestdensitynet" name="uri"/>
  			<input type="hidden" name="loc" value="en_US"/>	  			
	  	</form>
	  </section>

    </div>
  </div>
</footer>

<?php wp_footer(); ?>
