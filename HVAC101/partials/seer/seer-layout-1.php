<?php 
$content=get_theme_mod('home-seer-content');
$post = get_post($raw_data);
setup_postdata( $post );
?>
<div class="seer-calculator-container">
	<div class="container">
		<h3 class="section_heading text-center"><?php echo get_option('home-seer-title'); ?></h3>
		<div class="row align-items-center">
			<div class="col-md col-seer-contents seer-content">
		        
		        <?php the_content(); ?>

		    </div>
		    <div class="col-md">
		    	<div class="seer-content-wrapper text-left">
		    	<?php echo $content; ?>
		    </div>
		    </div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>