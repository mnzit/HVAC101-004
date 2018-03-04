 <?php
if ($brands_loop->have_posts()): 
$count=0;
?>
<div id="brands-we-serve" class="brands-layout-1">
    <div class="container">
        <h3 class="section_heading text-center"><?php echo get_option('home-brands-title'); ?></h3>
            <div id="home-page-brands" class="owl-carousel owl-theme">

            <?php while($brands_loop->have_posts()): $brands_loop->the_post(); ?>

                <div class="brand-img"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>"></div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        
        </div>
    </div>
</div>
<?php endif; ?>