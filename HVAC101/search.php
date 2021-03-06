<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package HVAC101
 */

get_header(); ?>
<div class="page-inner-heading">
	<div class="container">
		<h1 class="page-main-title search-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'hvac101' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<?php custom_breadcrumbs(); ?>
	</div>
</div>

	<div class="container">
		<div class="row">
			<section id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) : ?>

					<?php /* <header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'hvac101' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header --> */ ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					//the_posts_navigation();
					hvac101_numeric_posts_nav();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>

				</main><!-- #main -->
			</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
