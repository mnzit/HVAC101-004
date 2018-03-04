<?php 
$service_areas_image=get_option('home-service-areas-image');
$content=get_option('home-service-areas-content');
?>
<div class="service-areas-container service-areas-layout-2">
	<img src="<?php echo $service_areas_image;?>" class="service-areas-bg" />
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 service-areas-content-wrapper bg-primary">
				<h3 class="section_heading text-left nopadding"><?php echo get_option('home-service-areas-title'); ?></h3>
				<?php  echo $content; ?>

				<?php 
	    		 $args = array(
	              'theme_location' => 'service-areas',
	              'depth'      => 1,
	              );

	            if (has_nav_menu('service-areas')) {
	              wp_nav_menu($args);
	            }
	            ?>

	    	</div>
		</div>
	</div>
</div>