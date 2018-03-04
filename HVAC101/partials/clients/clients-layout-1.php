 <?php
if ($clients_loop->have_posts()): 
$count=0;
?>
<div id="our-clients" class="clients-layout-1">
    <div class="container">
        <h3 class="section_heading text-center"><?php echo get_option('home-clients-title'); ?></h3>
            <div id="home-page-clients" class="owl-carousel owl-theme">

            <?php while($clients_loop->have_posts()): $clients_loop->the_post(); ?>

                <div class="client-img"><img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title(); ?>"></div>

        <?php 
        $count++;
        endwhile; 
        wp_reset_postdata();
        ?>
        
        </div>
    </div>
</div>
<?php endif; ?>