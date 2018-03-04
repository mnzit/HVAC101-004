<?php	
 $promotion = get_option('home-promotions'); 

$args = array(
 'post_type' => 'post',
 'posts_per_page' => 5,
 'paged' => 1,
 'cat' => $promotion
);

$promotions_loop = new WP_Query($args);
if ($promotions_loop->have_posts()): 
$count=0;
?>
<div id="offers_and_promotion_widget" class="promotions_widget">
    <div class="container">
          <div id="promotions_widget" class="owl-carousel owl-theme owl-ornament-style-2">

            <?php while($promotions_loop->have_posts()): $promotions_loop->the_post(); ?>

                    <div class="image promo-img"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>"></div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        </div>
         <div class="owls-controls promotion-widget-control owl-ornament-style-2">
            <div class="navi">
                <div class="dots"></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>