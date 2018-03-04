<?php 
$featured_manufacturer_image=get_option('home-featured-manufacturer-image');
$content=get_option('home-featured-manufacturer-content');
?>
<div class="featured-manufacturer-container featured-manufacturer-layout-1">
	<div class="container">

		<h3 class="section_heading text-center"><?php echo get_option('home-featured-manufacturer-title'); ?></h3>

		<div class="row">

			<div class="col-md manufacturer-content-wrapper text-center">
				
	    		<img src="<?php  echo $featured_manufacturer_image; ?>"/>


	    	</div>

	    	<div class="col-md"><?php echo $content; ?></div>
		</div>
	</div>
</div>