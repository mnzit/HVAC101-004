 <?php
if ($promotions_loop->have_posts()): 
$count=0;
?>
<div id="offers_and_promotion" class="promotions-layout-3">
    <div class="container">
        <h3 class="section_heading text-center"><?php echo get_option('home-promotions-title'); ?></h3>
            <div id="home-page-promotions" class="owl-carousel owl-theme owl-ornaments-default">

            <?php while($promotions_loop->have_posts()): $promotions_loop->the_post(); ?>

                <div class="promo-img"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>"></div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        
        </div>
    </div>
</div>
<?php endif; ?>