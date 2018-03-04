<?php 
$home_newsletter_shortcode=get_option('home-newsletter-shortcode');
$content=get_option('home-newsletter-content');
?>
<div class="newsletter-container newsletter-layout-2">
	<div class="container">
		<div class="row">
			<div class="col col-md-6 newsletter-content-wrapper">
					<h3 class="section_heading text-right nopadding"><?php echo get_option('home-newsletter-title'); ?></h3>
	    			<div class="newsletter-content text-right"><?php echo $content; ?></div>
	    	</div>
	    	<div class="col col-md-6">
	    		<?php  echo $home_newsletter_shortcode; ?>
	    	</div>
		</div>
	</div>
</div>