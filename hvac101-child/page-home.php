<?php
/**
Template Name: Home Page
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

<div id="primary" class="home-content-area">
	<section class="section-home-page-slider">

		<?php 
			$raw_data=json_decode(get_option('home-slider'), true );

			$raw_data = super_unique($raw_data, 'mainValue');
			$home_sliders=array();
			foreach ($raw_data as $data):
				$home_sliders[]=$data['mainValue'];
			endforeach;
			
			$args = array(
              'post_type' => 'page',
              'post__in' => $home_sliders,
              'orderby' =>'post__in',
              'posts_per_page' => -1,
            );

			$loop = new WP_Query($args);

			set_query_var( 'loop', $loop );
			set_query_var( 'raw_data', $raw_data );

			get_template_part( 'partials/slider/slider', 'layout-1' ); 

			?>
	</section>

	<?php if(get_option('enable-home-about')): ?>

	<section class="home-section section-home-page-about bg-primary-color">
		<?php
			$raw_data=get_option('home-about');
			//$loop = get_post($raw_data);
			//set_query_var( 'loop', $loop );
			set_query_var( 'raw_data', $raw_data );
												
			$about_layout=1; //default layout
			if(get_option('home-about-layout')!=''):
				$about_layout=get_option('home-about-layout');
			endif;

			get_template_part( 'partials/about/about', 'layout-'.$about_layout );

		?>
	</section>

	<?php endif; ?>

	<?php if(get_option('enable-home-service')): ?>

	<section class="home-section section-home-page-services">

		<?php 
			$service_raw_data=json_decode(get_option('home-service'), true );

			$service_raw_data = super_unique($service_raw_data, 'mainValue');
			$home_services=array();
			foreach ($service_raw_data as $data):
				$home_services[]=$data['mainValue'];
			endforeach;
			
			$args = array(
              'post_type' => 'page',
              'post__in' => $home_services,
              'orderby' =>'post__in',
              'posts_per_page' => -1,

            );

			$service_loop = new WP_Query($args);

			set_query_var( 'service_loop', $service_loop );
			set_query_var( 'service_raw_data', $service_raw_data );


			$service_layout=1; //default layout
			if(get_option('home-service-layout')!=''):
				$service_layout=get_option('home-service-layout');
			endif;

			get_template_part( 'partials/service/service', 'layout-'.$service_layout );

			?>
	</section>


	<?php endif; ?>

	<?php if(get_option('enable-home-extra-pages')): ?>

<section class="home-section section-home-page-extra-pages">

	<?php 
		$extra_pages_raw_data=json_decode(get_option('home-extra-pages'), true );

		$extra_pages_raw_data = super_unique($extra_pages_raw_data, 'mainValue');
		$home_services=array();
		foreach ($extra_pages_raw_data as $data):
			$home_services[]=$data['mainValue'];
		endforeach;
		
		$args = array(
													'post_type' => 'page',
													'post__in' => $home_services,
													'orderby' =>'post__in',
													'posts_per_page' => -1,
											);

		$extra_pages_loop = new WP_Query($args);

		set_query_var( 'extra_pages_loop', $extra_pages_loop );
		set_query_var( 'extra_pages_raw_data', $extra_pages_raw_data );


		$extra_pages_layout=1; //default layout
		if(get_option('home-extra-pages-layout')!=''):
			$extra_pages_layout=get_option('home-extra-pages-layout');
		endif;

		get_template_part( 'partials/extra-pages/extra-pages', 'layout-'.$extra_pages_layout );

		?>
</section>


<?php endif; ?>
	<?php if(get_option('enable-home-seer')): ?>
	<section class="home-section section-home-page-seer text_default">
		<?php
			$raw_data=get_option('home-seer-page');

			set_query_var( 'raw_data', $raw_data );

			$seer_layout=1; //default layout
			if(get_option('home-seer-layout')!=''):
				$seer_layout=get_option('home-seer-layout');
			endif;

			get_template_part( 'partials/seer/seer', 'layout-'.$seer_layout );
		?>

	</section>

	<?php endif; ?>


	<?php if(get_option('enable-home-troubleshooter')): ?>
	<section class="home-section section-home-page-troubleshooter">
		<?php
			$troubleshooter_layout=1; //default layout
			if(get_option('home-troubleshooter-layout')!=''):
				$troubleshooter_layout=get_option('home-troubleshooter-layout');
			endif;

			get_template_part( 'partials/troubleshooter/troubleshooter', 'layout-'.$troubleshooter_layout );

		?>
	</section>

	<?php endif; ?>

	<?php if(get_option('enable-home-recent-post')): ?>

	<section class="home-section section-home-page-recent-posts">

		<?php 
		$recent_posts_raw_data = get_option('home-recent-posts'); 
		
		$args = array(
		'post_type' => 'post',
         'posts_per_page' => 6,
	     'paged' => 1,
	     'cat' => $recent_posts_raw_data,
        );

		$recent_posts_loop = new WP_Query($args);

		set_query_var( 'recent_posts_loop', $recent_posts_loop );
		set_query_var( 'recent_posts_raw_data', $recent_posts_raw_data );


		$recent_posts_layout=1; //default layout
		if(get_option('home-recent-post-layout')!=''):
			$recent_posts_layout=get_option('home-recent-post-layout');
		endif;

		get_template_part( 'partials/recent-posts/recent-posts', 'layout-'.$recent_posts_layout );

		?>

	</section>

	<?php endif; ?>
	<?php if(get_option('enable-home-promotions')==1): ?>

	<section class="home-section section-home-page-promotions">

		<?php 
		$promotions_raw_data = get_option('home-promotions'); 
		
		$args = array(
		 'post_type' => 'post',
         'posts_per_page' => -1,
	     'paged' => 1,
	     'cat' => $promotions_raw_data,
        );

		$promotions_loop = new WP_Query($args);

		set_query_var( 'promotions_loop', $promotions_loop );
		set_query_var( 'promotions_raw_data', $promotions_raw_data );


		$promotions_layout=1; //default layout
		if(get_option('home-promotions-layout')!=''):
			$promotions_layout=get_option('home-promotions-layout');
		endif;

		get_template_part( 'partials/promotions/promotions', 'layout-'.$promotions_layout );

		?>

	</section>

	<?php endif; ?>
	
	<?php if(get_option('enable-home-team')): ?>

	<section class="home-section section-home-page-team">

		<?php 
		$team_raw_data = get_option('home-team'); 
		
		$args = array(
		'post_type' => 'post',
	     'posts_per_page' => -1,
	     'paged' => 1,
	     'cat' => $team_raw_data,
	    );

		$team_loop = new WP_Query($args);

		set_query_var( 'team_loop', $team_loop );
		set_query_var( 'team_raw_data', $team_raw_data );


		$team_layout=1; //default layout
		if(get_option('home-team-layout')!=''):
			$team_layout=get_option('home-team-layout');
		endif;

		get_template_part( 'partials/team/team', 'layout-'.$team_layout );

		?>

	</section>

	<?php endif; ?>


	<?php if(get_option('enable-home-testimonials')): ?>

	<section class="home-section section-home-page-testimonials">

		<?php 
		$testimonials_raw_data = get_option('home-testimonials'); 
		
		$args = array(
		'post_type' => 'post',
	     'posts_per_page' => -1,
	     'paged' => 1,
	     'cat' => $testimonials_raw_data,
	    );

		$testimonials_loop = new WP_Query($args);

		set_query_var( 'testimonials_loop', $testimonials_loop );
		set_query_var( 'testimonials_raw_data', $testimonials_raw_data );

		$testimonials_layout=1; //default layout
		if(get_option('home-testimonials-layout')!=''):
			$testimonials_layout=get_option('home-testimonials-layout');
		endif;

		get_template_part( 'partials/testimonials/testimonials', 'layout-'.$testimonials_layout );

		?>

	</section>

	<?php endif; ?>

	<?php if(get_option('enable-home-featured-manufacturer')): ?>

	<section class="home-section section-home-page-featured-manufacturer">
		<?php
			$featured_manufacturer_layout=1; //default layout
			if(get_option('featured-manufacturer-layout')!=''):
				$featured_manufacturer_layout=get_option('featured-manufacturer-layout');
			endif;

			 get_template_part( 'partials/manufacturer/featured-manufacturer', 'layout-'.$featured_manufacturer_layout );
		
		?>
	</section>

	<?php endif; ?>
	<?php if(get_option('enable-home-newsletter')): ?>

	<section class="home-section section-home-page-newsletter text_light">
		<?php
			$newsletter_layout=1; //default layout
			if(get_option('home-newsletter-layout')!=''):
				$newsletter_layout=get_option('home-newsletter-layout');
			endif;

			 get_template_part( 'partials/newsletter/newsletter', 'layout-'.$newsletter_layout );
		
		?>
	</section>

	<?php endif; ?>


	
	<?php if(get_option('enable-home-service-areas')): ?>

	<section class="home-section section-home-page-service-areas">
		<?php
			$newsletter_layout=1; //default layout
			if(get_option('home-service-areas-layout')!=''):
				$service_areas_layout=get_option('home-service-areas-layout');
			endif;

			 get_template_part( 'partials/service-areas/service-areas', 'layout-'.$service_areas_layout );
		
		?>
	</section>
	<?php endif; ?>


	<?php if(get_option('enable-home-brands')==1): ?>

	<section class="home-section section-home-page-brands">

		<?php 
		$brands_raw_data = get_option('home-brands'); 
		
		$args = array(
		 'post_type' => 'post',
         'cat' => $brands_raw_data,
         'posts_per_page' => -1,
        );

		$brands_loop = new WP_Query($args);

		set_query_var( 'brands_loop', $brands_loop );
		set_query_var( 'brands_raw_data', $brands_raw_data );


		$brands_layout=1; //default layout
		if(get_option('home-brands-layout')!=''):
			$brands_layout=get_option('home-brands-layout');
		endif;

		get_template_part( 'partials/brands/brands', 'layout-'.$brands_layout );
		?>
		</section>
	<?php endif; ?>


	<?php if(get_option('enable-home-clients')==1): ?>

	<section class="home-section section-home-page-clients">

		<?php 
		$clients_raw_data = get_option('home-clients'); 
		
		$args = array(
		 'post_type' => 'post',
         'cat' => $clients_raw_data,
         'posts_per_page' => -1,

        );

		$clients_loop = new WP_Query($args);

		set_query_var( 'clients_loop', $clients_loop );
		set_query_var( 'clients_raw_data', $clients_raw_data );


		$clients_layout=1; //default layout
		if(get_option('home-clients-layout')!=''):
			$clients_layout=get_option('home-clients-layout');
		endif;

		get_template_part( 'partials/clients/clients', 'layout-'.$clients_layout );
		?>
		</section>
	<?php endif; ?>

</div><!-- #primary -->
	
<?php
get_footer();
