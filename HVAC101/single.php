<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HVAC101
 */

get_header(); ?>
<div class="page-inner-heading">
	<div class="container">
		<?php the_title( '<h1 class="page-main-title">', '</h1>' ); ?>
		<?php custom_breadcrumbs(); ?>
	</div>
</div>
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					//the_post_navigation();

					?>

					<div class="row">	

					<div class="col-6 text-left">
					<?php
					previous_post_link('%link', 'Previous');
					?>
					</div>
					<div class="col-6 text-right">
					<?php
					next_post_link('%link', 'Next');
					?>
					</div>

					</div>

					<?php

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
