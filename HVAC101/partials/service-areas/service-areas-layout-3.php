<?php 
$service_areas_image=get_option('home-service-areas-image');
$content=get_option('home-service-areas-content');
?>
<div class="service-areas-container service-areas-layout-3">
	
	<div class="container">
		<h3 class="section_heading text-center nopadding text-light"><?php echo get_option('home-service-areas-title'); ?></h3>
		
		<div class="row">

			<div class="col-md">
				
				<div class="service-areas-content-wrapper text-center bg-secondary-color">
	
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


	    	<div class="col-md map-col">
	    		<img src="<?php echo $service_areas_image;?>" class="service-areas-image" />
	    	</div>
		</div>
	</div>
</div>