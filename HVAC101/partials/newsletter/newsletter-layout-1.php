<?php 
$home_newsletter_shortcode=get_option('home-newsletter-shortcode');
$content=get_option('home-newsletter-content');
?>
<div class="newsletter-container newsletter-layout-1">
	<div class="container">
		<div class="row">

			<div class="col-md newsletter-content-wrapper text-center">
				<div>
					<h3 class="section_heading text-center nopadding"><?php echo get_option('home-newsletter-title'); ?></h3>
	    			<div class="newsletter-content"><?php echo $content; ?></div>
	    		</div>
	    		<?php  echo $home_newsletter_shortcode; ?>

	    	</div>
		</div>
	</div>
</div>