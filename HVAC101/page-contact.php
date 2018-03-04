<?php
/**
Template Name: Contact Us
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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
<?php if(get_option('google-map')): ?>
<div class="contact-page-full-map">
<iframe src="<?php echo get_option('google-map'); ?>" frameborder="0" style="border:0" width="100%" height="350px"></iframe>
</div>
<?php endif; ?>
	<div class="container page-template-page-full">
		<div class="row">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--  .row -->
	</div><!--  .container -->
<?php
get_footer();
