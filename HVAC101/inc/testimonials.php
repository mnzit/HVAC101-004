<?php
$testimonial_category = get_option('home-testimonials'); 
$args = array(
 'post_type' => 'post',
 'posts_per_page' => 5,
 'paged' => 1,
 'cat' => $testimonial_category
  );
$testimonials_loop = new WP_Query($args);
if ($testimonials_loop->have_posts()): 
$count=0;
?>
<div class="testimonials_widget">
          <div id="testimonials_widget" class="owl-carousel owl-theme owl-ornament-style-2">

            <?php while($testimonials_loop->have_posts()): $testimonials_loop->the_post(); ?>

                    <div class="testimonials-widget-single text-center">
                        <p class="card-text"><?php echo get_excerpt(200); ?></p>
                        <h4 class="card-title"><?php the_title();?></h4>
                    </div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        </div>
         <div class="owls-controls testimonials-widget-control owl-ornament-style-2">
            <div class="navi">
                <div class="dots"></div>
            </div>
        </div>
    </div>

<?php endif; ?>