<?php
if ($service_loop->have_posts()): 
$count=0;
?>
<div id="our_services" class="our-service-layout-1">
    <h3 class="section_heading text-center text_normal"><?php echo get_option('home-service-title'); ?></h3>
        <div class="container">
      
            <div class="row text-center">
                <?php while($service_loop->have_posts()): $service_loop->the_post(); ?>
                   
                        <div class="d-flex align-items-stretch carder col-sm service-<?php echo $count; ?>">
                        <a href="<?php the_permalink(); ?>">
                            <div class="card-area">
                                <div class="card-image">
                                <img class="" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                </div>
                                </ioP>
                                <div class="card-body">
                                    <h4 class="card-title"><?php the_title(); ?></h4>
                                    <p class="card-text"><?php the_excerpt();?></p>
                                </div>
                            </div>
                            </a>
                        </div>
                        
                    <?php 
                    $count++;
                    endwhile; 
                    wp_reset_postdata();
                    ?>
            </div>
          
        </div>
    </div>
<?php endif; ?> 

