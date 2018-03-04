<?php 
$post = get_post($raw_data);
setup_postdata( $post );
?>
<div class="container<?php echo has_post_thumbnail()?'-fluid':''; ?> about-layout-2">
	<div class="row align-items-center">
		<?php if(has_post_thumbnail()): ?>
	    <div class="col-md-6 text-center">
	        <img class="img-fluid" src="<?php echo the_post_thumbnail_url(); ?>"/>
	    </div>
	<?php endif; ?>

	    <div class="<?php echo has_post_thumbnail()?'col-md-4 col-sm-12 text-left':'col-md-12 text-center'; ?> col-contents about-us-content">
	        <h3 class="section_heading"><?php echo get_option('home-about-title'); ?></h3>
	        <?php the_excerpt(); ?>
	        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
	    </div>
	</div>
</div>
<?php wp_reset_postdata(); ?>