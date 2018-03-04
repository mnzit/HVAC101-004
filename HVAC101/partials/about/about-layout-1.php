<?php 
$post = get_post($raw_data);
setup_postdata( $post );
?>
<div class="about-layout-1">
<div class="container text-center">
	<h3 class="section_heading text-center"><?php echo get_option('home-about-title'); ?></h3>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="btn bg-primary-color text-light">Learn More</a>
</div>
<?php wp_reset_postdata(); ?>
</div>