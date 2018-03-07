<?php 
$post = get_post($raw_data);
setup_postdata( $post );
?>

<div class="container<?php echo has_post_thumbnail()?'-fluid':''; ?> about-layout-2 text_light">
	<img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>">
	<div class="container">
		<div class="row">
			<div class="col-10 col-contents about-us-content">
				<?php the_excerpt(); ?>
			</div>
			<div class="col-2">
			<a href="<?php the_permalink(); ?>" class="btn text-light">Contact Us</a>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>
