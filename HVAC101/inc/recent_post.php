<?php 
	$blog_category = get_option('home-recent-posts'); 

	$wp_query = null;
	$args = array(
				'cat'  => $blog_category,
				'posts_per_page' => 5,
				);
	$wp_query = new WP_Query( $args );

	while ($wp_query->have_posts() ) : $wp_query->the_post(); ?>
     <ul>
	     <li class="row">
	     	<?php if($thumbnail_checkbox): ?>
			     <div class="col-3">
			     	<a href="<?php the_permalink()?>"> <?php if($thumbnail_checkbox) the_post_thumbnail(); ?></a>
			     </div>
			     <?php endif; ?>
			  <?php if($thumbnail_checkbox): ?>
			  	<div class="col-9">
			  <?php else: ?>
				<div class="col-12">
			  <?php endif; ?>
	     
	     	<a href="<?php the_permalink()?>"><?php the_title();?> <small><?php echo($date_checkbox)?get_the_date():''; ?></small> </a>
	     </li>
     </ul>
<?php 
endwhile;
wp_reset_postdata();