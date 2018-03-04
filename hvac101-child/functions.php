<?php 

function hvac101_child_enqueue_styles() {

    $parent_style = 'hvac101-style';
    $style_dep=array('hvac101-fa-style', 'hvac101-owl-style', 'hvac101-wow-style', 'hvac101-style' );

    $script_dep=array('hvac101-js', 'hvac101-owl-script', 'hvac101-wow-script', 'hvac101-script' );

	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css');
  
    wp_enqueue_style( 'hvac101-child-style', get_stylesheet_directory_uri() . '/style.css', $style_dep );

    wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/script.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'hvac101_child_enqueue_styles' );


/**
 * Register our sidebars and widgetized areas.
 *
 */
function photo_gallery_widgets_init() {
	register_sidebar( array(
		'name'          => 'Home Page Photo Gallerey',
		'id'            => 'home_photo_gallery',
		'before_widget' => '<div class="home-photo-gallery">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="section_heading text-center text-light">',
		'after_title'   => '</h3>',
	) );

}

add_action( 'widgets_init', 'photo_gallery_widgets_init' );