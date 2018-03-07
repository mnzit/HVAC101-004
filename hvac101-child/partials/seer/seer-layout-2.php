<?php 
$content=get_option('home-seer-content');
$post = get_post($raw_data);
setup_postdata( $post );
?>
<div class="seer-calculator-container">
	<div class="container">
		
		<div class="row ">
		<div class="col-md col-seer-contents seer-content">
			<h3 class="section_heading text-left"><?php echo get_option('home-seer-title'); ?></h3>
		        <?php the_content(); ?>
				<a href="<?php the_permalink(); ?>" class="btn bg-primary-color text-light">Learn More</a>
		    </div>
			 <div class="col-md">
		    	<div class="seer-content-wrapper text-right">
		    		<?php echo $content; ?>
					
		    	</div>
		    </div>

			
		   
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>