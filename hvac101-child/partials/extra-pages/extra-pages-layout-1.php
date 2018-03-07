 <?php
if ($extra_pages_loop->have_posts()): 
$count=0;
?>
<div id="extra-pages" class="extra-pages-layout-1">
        
                <?php while($extra_pages_loop->have_posts()): $extra_pages_loop->the_post(); ?>
                  <div class="extra-page-wrapper extra-page-count-<?php echo $count; ?> extra-page-id-<?php echo the_ID(); ?>">
                      <div class="container">
                          <div class="row align-items-center">
                            <div class="col-md-6 image-col">
                               <img class="extra-page-image img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            </div>

                            <div class="col-md-6 content-col">
                                <h3 class="section_heading nopadding"><?php the_title(); ?></h3>
                                <p class="extra-page-text"><?php the_excerpt();?></p>
                                <a href="<?php the_permalink(); ?>" class="btn bg-primary-color text-light"><?php echo $extra_pages_raw_data[$count]['sub_fields'][0]['button-text'] ?></a>
                            </div>
                              

                          </div>
                      </div>
                  </div>
                    <?php 
                    $count++;
                    endwhile; 
                    wp_reset_postdata();
                    ?>
         
<?php endif; ?> 

