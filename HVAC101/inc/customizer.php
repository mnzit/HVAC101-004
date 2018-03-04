<?php
/**
 * HVAC101 Theme Customizer
 *
 * @package HVAC101
 */

require get_template_directory() . '/inc/wp_easy_control.php';

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;
/**
 * Customize Control for Taxonomy Select
 */
class hvac101_Customize_Dropdown_Taxonomies_Control extends WP_Customize_Control {

  public $type = 'dropdown-taxonomies';

  public $taxonomy = '';


  public function __construct( $manager, $id, $args = array() ) {

    $hvaclite_taxonomy = 'category';
    if ( isset( $args['taxonomy'] ) ) {
      $taxonomy_exist = taxonomy_exists( esc_attr( $args['taxonomy'] ) );
      if ( true === $taxonomy_exist ) {
        $our_taxonomy = esc_attr( $args['taxonomy'] );
      }
    }
    $args['taxonomy'] = $hvaclite_taxonomy;
    $this->taxonomy = esc_attr( $hvaclite_taxonomy );

    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {

    $tax_args = array(
      'hierarchical' => 0,
      'taxonomy'     => $this->taxonomy,
    );
    $all_taxonomies = get_categories( $tax_args );

    ?>
    <label>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
         <select <?php echo $this->link(); ?>>
            <?php
              printf('<option value="%s" %s>%s</option>', '', selected($this->value(), '', false),__('Select', 'hvaclite') );
             ?>
            <?php if ( ! empty( $all_taxonomies ) ): ?>
              <?php foreach ( $all_taxonomies as $key => $tax ): ?>
                <?php
                  printf('<option value="%s" %s>%s</option>', $tax->term_id, selected($this->value(), $tax->term_id, false), $tax->name );
                 ?>
              <?php endforeach ?>
           <?php endif ?>
         </select>

    </label>
    <?php
  }

}



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hvac101_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
  



/*--------------------------------------------------------------
## Header panel 
--------------------------------------------------------------*/

$wp_customize->add_panel( 'header-panel', array(
  'title' => __( 'Header' ),
  'description' => 'Customize Your Website Header ', // Include html tags such as &lt;p>;.
  'priority' => 1, // Mixed with top-level-section hierarchy.
) );



$wp_customize->add_section( 'header-boxes' , array(
  'title' => 'Header Content Boxes',
  'panel' => 'header-panel',
) );



$wp_customize->add_setting( 'header-content-1', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'header-content-1', array(
    'label'                 =>  __( 'Enter Content for Header Box 1 ', 'hvac101' ),
    'section'               => 'header-boxes',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'header-content-1',
) );



$wp_customize->add_setting( 'header-content-2', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'header-content-2', array(
    'label'                 =>  __( 'Enter Content for Header Box 2', 'hvac101' ),
    'section'               => 'header-boxes',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'header-content-2',
) );



$wp_customize->add_setting( 'header-content-3', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'header-content-3', array(
    'label'                 =>  __( 'Enter Content for Header Box 3', 'hvac101' ),
    'section'               => 'header-boxes',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'header-content-3',
) );


/*--------------------------------------------------------------
## Header Panel Ends
--------------------------------------------------------------*/





/*--------------------------------------------------------------
## Home Page Panel Starts
--------------------------------------------------------------*/


$wp_customize->add_panel( 'homepage-panel', array(
  'title' => __( 'Home Page' ),
  'description' => 'Customize Your Home Page', // Include html tags such as &lt;p>;.
  'priority' => 2, // Mixed with top-level-section hierarchy.
) );


/*--------------------------------------------------------------
## Home Page Slider
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-slider-section' , array(
  'title' => 'Sliders',
  'panel' => 'homepage-panel',
) );


$wp_customize->add_setting( 'home-slider', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-slider', 
    array(
      'label' => __( 'Select Slider' ),
      'section' => 'home-slider-section',
      'sub_fields'=>array(
          array('id'=>1, 'name'=>'slider-align', 'label'=>'Alignment', 'type'=>'select', 'value'=>'left',
          'description'=>'Select alignment from here',
          'options'=>array(
            'left'=>'Left',
            'center'=>'Center',
            'right'=>'Right'
          )),
        )
    )
  )
);

/*--------------------------------------------------------------
## Home Page Slider Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Home Page About Us
--------------------------------------------------------------*/


$wp_customize->add_section( 'home-about-section' , array(
  'title' => 'About Us',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-about-section', 'enable-home-about', "Enable / Disable About us section?");
hvac101_show_title_field($wp_customize, 'home-about-section', 'home-about-title', "Title for About Us section", "Abous Us");


$wp_customize->add_setting( 'home-about', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-about', array(
    'label'                 =>  __( 'Select Page About Us Section', 'hvac101' ),
    'section'               => 'home-about-section',
    'type'                  => 'dropdown-pages',
    'allow_addition'    => true,
    'priority'              => 31,
    'settings' => 'home-about',
) );


hvac101_show_layout_option($wp_customize, 'home-about-section', 'home-about-layout', "Select layout for About Us section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page About Us Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Services
--------------------------------------------------------------*/


$wp_customize->add_section( 'home-services-section' , array(
  'title' => 'Services',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-services-section', 'enable-home-service', "Enable / Disable Home Servics section?");
hvac101_show_title_field($wp_customize, 'home-services-section', 'home-service-title', "Enter Heading for Our Services Section", "Our Services");


$wp_customize->add_setting( 'home-service', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-service', 
    array(
      'label' => __( 'Select Service' ),
      'section' => 'home-services-section',
      'sub_fields'=>array(
          array('id'=>1, 'name'=>'button-text', 'label'=>'Button Text', 'type'=>'text', 'value'=>'Click Here', 'description'=>'Enter Button Text')
        )
    )
  )
);

hvac101_show_layout_option($wp_customize, 'home-services-section', 'home-service-layout', "Select layout for Our Services section", 
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);


/*--------------------------------------------------------------
## Home Page Services Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Who We Serve
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-whoweserve-section' , array(
  'title' => 'Who We Serve',
  'panel' => 'homepage-panel',
) );

hvac101_show_enable_disable($wp_customize, 'home-whoweserve-section', 'enable-home-whoweserve', "Enable / Disable Home Who We Serve section?");
hvac101_show_title_field($wp_customize, 'home-whoweserve-section', 'home-whoweserve-title', "Enter Heading for Who We Serve Section", "Who We Serve");


$wp_customize->add_setting( 'home-who-we-serve', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-who-we-serve', 
    array(
      'label' => __( 'Select Who We Serve' ),
      'section' => 'home-whoweserve-section',
      'sub_fields'=>array(
          array('id'=>1, 'name'=>'button-text', 'label'=>'Button Text', 'type'=>'text', 'value'=>'Click Here', 'description'=>'Enter Button Text')
        )
    )
  )
);

hvac101_show_layout_option($wp_customize, 'home-whoweserve-section', 'home-who-we-serve-layout', "Select layout for Who We Serve section", 
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);


/*--------------------------------------------------------------
## Home Page who we serve Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Home Page Recent Posts
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-recent-post-section' , array(
  'title' => 'Recent Posts',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-recent-post-section', 'enable-home-recent-post', "Enable / Disable Home Recent Post section?");
hvac101_show_title_field($wp_customize, 'home-recent-post-section', 'home-recent-post-title', "Enter Heading for Recent Posts Section", "Recent Posts");



$wp_customize->add_setting( 'home-recent-posts', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-recent-posts', array(
    'label'                 =>  __( 'Select Category for Recent Posts', 'hvac101' ),
    'section'               => 'home-recent-post-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-recent-posts'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-recent-post-section', 'home-recent-post-layout', "Select layout for Recent Posts section", 
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Recent Posts Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Extra Pages
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-extra-pages-section' , array(
  'title' => 'Extra Page Contents',
  'panel' => 'homepage-panel',
) );

hvac101_show_enable_disable($wp_customize, 'home-extra-pages-section', 'enable-home-extra-pages', "Enable / Disable Extra page contents?");

$wp_customize->add_setting( 'home-extra-pages', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => '',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json
) );


$wp_customize->add_control(
  new WP_Easy_Control(
    $wp_customize, 
    'home-extra-pages', 
    array(
      'label' => __( 'Select Page' ),
      'section' => 'home-extra-pages-section',
      'sub_fields'=>array(
          array('id'=>1, 'name'=>'button-text', 'label'=>'Button Text', 'type'=>'text', 'value'=>'Click Here', 'description'=>'Enter Button Text')
        )
    )
  )
);

hvac101_show_layout_option($wp_customize, 'home-extra-pages-section', 'home-extra-pages-layout', "Select layout for Home Extra Pages section", 
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);


/*--------------------------------------------------------------
## Home Page Extra Pages Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Home Page Promotions
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-promotions-section' , array(
  'title' => 'Promotions',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-promotions-section', 'enable-home-promotions', "Enable / Disable Home page Promotions section?");
hvac101_show_title_field($wp_customize, 'home-promotions-section', 'home-promotions-title', "Enter Heading for Promotions Section", "Promotions");


$wp_customize->add_setting( 'home-promotions', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-promotions', array(
    'label'                 =>  __( 'Select Category for Promotions', 'hvac101' ),
    'section'               => 'home-promotions-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-promotions'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-promotions-section', 'home-promotions-layout', "Select layout for Promotions section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Promotions
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Testimonials
--------------------------------------------------------------*/


$wp_customize->add_section( 'home-testimonials-section' , array(
  'title' => 'Testimonials',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-testimonials-section', 'enable-home-testimonials', "Enable / Disable Home page Testimonials section?");
hvac101_show_title_field($wp_customize, 'home-testimonials-section', 'home-testimonials-title', "Enter Heading for Testimonials Section", "Testimonials");


$wp_customize->add_setting( 'home-testimonials', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-testimonials', array(
    'label'                 =>  __( 'Select Category for Testimonials', 'hvac101' ),
    'section'               => 'home-testimonials-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-testimonials'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-testimonials-section', 'home-testimonials-layout', "Select layout for Testimonials section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Testimonials Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Team
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-team-section' , array(
  'title' => 'Our Team',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-team-section', 'enable-home-team', "Enable / Disable Home page Team section?");
hvac101_show_title_field($wp_customize, 'home-team-section', 'home-team-title', "Enter Heading for Team Section", "Our Team");


$wp_customize->add_setting( 'home-team', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-team', array(
    'label'                 =>  __( 'Select Category for Our Team', 'hvac101' ),
    'section'               => 'home-team-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-team'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-team-section', 'home-team-layout', "Select layout for Our Team section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Team Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Home Page SEER Calculator 
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-seer-section' , array(
  'title' => 'SEER Calculator',
  'panel' => 'homepage-panel',
) );



hvac101_show_enable_disable($wp_customize, 'home-seer-section', 'enable-home-seer', "Enable / Disable Home page SEER Calculator section?");
hvac101_show_title_field($wp_customize, 'home-seer-section', 'home-seer-title', "Enter Heading for SEER Calculator Section", "SEER Calculator");



$wp_customize->add_setting( 'home-seer-page', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-seer-page', array(
    'label'                 =>  __( 'Select Page SEER Calculator Section', 'hvac101' ),
    'section'               => 'home-seer-section',
    'type'                  => 'dropdown-pages',
    'priority'              => 31,
    'settings' => 'home-seer-page',
) );


$wp_customize->add_setting( 'home-seer-content', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-seer-content', array(
    'label'                 =>  __( 'Enter content for SEER Calculator Section (with <iframe> tag if any)', 'hvac101' ),
    'section'               => 'home-seer-section',
    'type'                  => 'textarea',
    'priority'              => 32,
    'settings' => 'home-seer-content',
) );


hvac101_show_layout_option($wp_customize, 'home-seer-section', 'home-seer-layout', "Select layout for SEER Calculator section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page SEER Calculator Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Troubleshooter
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-troubleshooter-section' , array(
  'title' => 'HVAC Troubleshooter',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-troubleshooter-section', 'enable-home-troubleshooter', "Enable / Disable Home page HVAC Troubleshooter section?");
hvac101_show_title_field($wp_customize, 'home-troubleshooter-section', 'home-troubleshooter-title', "Enter Heading for HVAC Troubleshooter Section", "Troubleshoot Yourself");


$wp_customize->add_setting( 'home-troubleshooter-content', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-troubleshooter-conten t', array(
    'label'                 =>  __( 'Enter Content for HVAC Troubleshooter Section', 'hvac101' ),
    'section'               => 'home-troubleshooter-section',
    'type'                  => 'textarea',
    'default'               =>  '<h3>Troubleshoot Your Problem</h3>
  <h6>Every problem has a solution and we know how to find it!</h6>
  <div>
  <a href="#" type="button" class="btn btn-default">Try our troubleshooter</a>
    <span type="button" class="btn bg-info">OR</span>
    <a href="#" type="button" class="btn btn-default">Get a free second opinion</a>
  </div>',
    'priority' => 32,
    'settings' => 'home-troubleshooter-content',
) );


hvac101_show_layout_option($wp_customize, 'home-troubleshooter-section', 'home-troubleshooter-layout', "Select layout for HVAC Troubleshooter section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page HVAC Troubleshooter Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Home Page Featured Manufacturer
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-featured-manufacturer-section' , array(
  'title' => 'HVAC Featured Manufacturer',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-featured-manufacturer-section', 'enable-home-featured-manufacturer', "Enable / Disable Home page Featured Manufacturer section?");
hvac101_show_title_field($wp_customize, 'home-featured-manufacturer-section', 'home-featured-manufacturer-title', "Enter Heading for HVAC Featured Manufacturer Section", "Featured Manufacturer");


$wp_customize->add_setting( 'home-featured-manufacturer-image', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'home-featured-manufacturer-image',
           array(
               'label'      => __( 'Upload a Image', 'hvac101' ),
               'section'    => 'home-featured-manufacturer-section',
               'settings'   => 'home-featured-manufacturer-image',
               'context'    => 'Image for featured manufacturer' 
           )
       )
   );


$wp_customize->add_setting( 'home-featured-manufacturer-content', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'home-featured-manufacturer-content', array(
    'label'                 =>  __( 'Enter Content for HVAC Featured Manufacturer Section', 'hvac101' ),
    'section'               => 'home-featured-manufacturer-section',
    'type'                  => 'textarea',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'home-featured-manufacturer-content',
) );


hvac101_show_layout_option($wp_customize, 'home-featured-manufacturer-section', 'featured-manufacturer-layout', "Select layout for HVAC Featured Manufacturer section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
## Home Page Featured Manufacturer Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Brands
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-brands-section' , array(
  'title' => 'Brands',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-brands-section', 'enable-home-brands', "Enable / Disable Home page Brands we provide service section?");
hvac101_show_title_field($wp_customize, 'home-brands-section', 'home-brands-title', "Enter Heading for Brands we provide service Section", "Brands we service");


$wp_customize->add_setting( 'home-brands', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-brands', array(
    'label'                 =>  __( 'Select Category for Brands', 'hvac101' ),
    'section'               => 'home-brands-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-brands'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-brands-section', 'home-brands-layout', "Select layout for Promotions section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Brands ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Home Page Clients
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-clients-section' , array(
  'title' => 'Clients',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-clients-section', 'enable-home-clients', "Enable / Disable Home page Our Clients section?");
hvac101_show_title_field($wp_customize, 'home-clients-section', 'home-clients-title', "Enter Heading for Our Clients Section", "Our Satisfied Clients");

$wp_customize->add_setting( 'home-clients', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'default' => 0,
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control(new hvac101_Customize_Dropdown_Taxonomies_Control($wp_customize,'home-clients', array(
    'label'                 =>  __( 'Select Category for Our Clients', 'hvac101' ),
    'section'               => 'home-clients-section',
    'type'                  => 'dropdown-taxonomies',
    'settings' => 'home-clients'
  )
) );


hvac101_show_layout_option($wp_customize, 'home-clients-section', 'home-clients-layout', "Select layout for Promotions section",
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Home Page Clients ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Newsletter 
--------------------------------------------------------------*/

$wp_customize->add_section( 'home-newsletter-section' , array(
  'title' => 'Newsletter',
  'panel' => 'homepage-panel',
) );


hvac101_show_enable_disable($wp_customize, 'home-newsletter-section', 'enable-home-newsletter', "Enable / Disable Home page Newsletter section?");
hvac101_show_title_field($wp_customize, 'home-newsletter-section', 'home-newsletter-title', "Enter Heading for Newsletter Section", "Sign Up for Newsletter");



$wp_customize->add_setting( 'home-newsletter-shortcode', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'home-newsletter-shortcode', array(
    'label'                 =>  __( 'Enter Newsletter Form Shortcode', 'hvac101' ),
    'section'               => 'home-newsletter-section',
    'type'                  => 'text',
    'priority'              => 31,
    'settings' => 'home-newsletter-shortcode',
) );


$wp_customize->add_setting( 'home-newsletter-content', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-newsletter-content', array(
    'label'                 =>  __( 'Enter content for Newsletter Section', 'hvac101' ),
    'section'               => 'home-newsletter-section',
    'type'                  => 'textarea',
    'priority'              => 32,
    'settings' => 'home-newsletter-content',
) );

hvac101_show_layout_option($wp_customize, 'home-newsletter-section', 'home-newsletter-layout', "Select layout for Newsletter section", 
  array('1' => 'Layout 1', '2' => 'Layout 2')
);

/*--------------------------------------------------------------
##Newsletter Ends
--------------------------------------------------------------*/



/*--------------------------------------------------------------
## Service Areas
--------------------------------------------------------------*/



$wp_customize->add_section( 'home-service-areas-section' , array(
  'title' => 'Service Areas',
  'panel' => 'homepage-panel',
) );

hvac101_show_enable_disable($wp_customize, 'home-service-areas-section', 'enable-home-service-areas', "Enable / Disable Home page Service Areas section?");
hvac101_show_title_field($wp_customize, 'home-service-areas-section', 'home-service-areas-title', "Enter Heading for Service Areas Section", "Service Areas");


$wp_customize->add_setting( 'home-service-areas-image', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'home-service-areas-image',
           array(
               'label'      => __( 'Upload a Image', 'hvac101' ),
               'section'    => 'home-service-areas-section',
               'settings' => 'home-service-areas-image',
               'context'    => 'Image for Service Areas (Generally map)' 
           )
       )
   );


$wp_customize->add_setting( 'home-service-areas-content', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );

$wp_customize->add_control( 'home-service-areas-content', array(
    'label'                 =>  __( 'Enter content for Service Areas Section', 'hvac101' ),
    'section'               => 'home-service-areas-section',
    'type'                  => 'textarea',
    'priority'              => 32,
    'settings' => 'home-service-areas-content',
) );


hvac101_show_layout_option($wp_customize, 'home-service-areas-section', 'home-service-areas-layout', "Select layout for Service Areas section", 
  array('1' => 'Layout 1', '2' => 'Layout 2', '3' => 'Layout 3')
);

/*--------------------------------------------------------------
## Service Areas Ends
--------------------------------------------------------------*/




/*--------------------------------------------------------------
## Contact Details
--------------------------------------------------------------*/

$wp_customize->add_panel( 'contact-panel', array(
  'title' => __( 'Contact Details' ),
  'description' => 'Customize Your Conatct Details ', // Include html tags such as &lt;p>;.
  'priority' => 3, // Mixed with top-level-section hierarchy.
) );


$wp_customize->add_section( 'contact-section' , array(
  'title' => 'Address',
  'panel' => 'contact-panel',
) );



$wp_customize->add_setting( 'google-map', array(
  'type' => 'option', // or 'option'
  'capability' => 'edit_theme_options',
  'transport' => 'refresh', // or postMessage
  'sanitize_callback' => '',
  'sanitize_js_callback' => '', // Basically to_json.
) );


$wp_customize->add_control( 'google-map', array(
    'label'                 =>  __( "Enter URL for Google Map's iframe source ", 'hvac101' ),
    'section'               => 'contact-section',
    'type'                  => 'url',
    'default'               =>  '',
    'priority'              => 32,
    'settings' => 'google-map',
) );





/*--------------------------------------------------------------
## Social Profile
--------------------------------------------------------------*/

//Social Profile
$wp_customize->add_section(
  'social_profile',
  array(
        'title' => 'Social Media Profile',
        'panel'=> 'contact-panel',
        'description' => 'Add/ Edit links to your social media here',
        'priority' => 14,
  )
);

$social=array();

$social[]=array('social_facebook', array('label'=>"Facebook", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_twitter', array('label'=>"Twitter", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_youtube', array('label'=>"Youtube", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_gplus', array('label'=>"Google Plus", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_instagram', array('label'=>"Instagram", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_linkedin', array('label'=>"Linkedin", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_yelp', array('label'=>"Yelp", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_angieslist', array('label'=>"Angie's List", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_gbl', array('label'=>"Google Business Listing", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_bbb', array('label'=>"BBB", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom1', array('label'=>"Custom 1", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom2', array('label'=>"Custom 2", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom3', array('label'=>"Custom 3", 'section'=>'social_profile', 'type'=>"url" ));
$social[]=array('social_custom4', array('label'=>"Custom 4", 'section'=>'social_profile', 'type'=>"url" ));

foreach ($social as $soc) {
  $wp_customize->add_setting($soc[0], array('default' => '', 'type'=>'option'));
  $wp_customize->add_control($soc[0], $soc[1]);
  }



/*--------------------------------------------------------------
## Social Profile Ends
--------------------------------------------------------------*/

/*--------------------------------------------------------------
## Conatct Details Ends
--------------------------------------------------------------*/


/*--------------------------------------------------------------
## Color Options
--------------------------------------------------------------*/

 /** Remove Default Colors Section**/
 $wp_customize->remove_section( 'colors');


// Add a panel for colors customization
$wp_customize->add_panel( 'colors-panel',   
  array(
      'title' => __( 'Colors' ),
      'description' => 'Customize theme colors', // Include html tags such as &lt;p>;.
      'priority' => 10, // Mixed with top-level-section hierarchy.
    ) );

$generalcolors[] = array( 'slug'=>'primary_color',  'default' => '#eee', 'label' => 'Primary Color');
$generalcolors[] = array( 'slug'=>'secondary_color',  'default' => '#ddd', 'label' => 'Secondary Color');
$generalcolors[] = array( 'slug'=>'third_color',  'default' => '#ccc', 'label' => 'Third Color');


 $wp_customize->add_section( 'general-colors' , 
  array(
    'title' => 'General Color Settings',
    'panel' => 'colors-panel',
  ));


foreach ($generalcolors as $color) {

  if( !get_option($color['slug']) ) add_option($color['slug'], $color['default']);
  
  $wp_customize->add_setting( $color['slug'], array(
      'default'     => $color['default'],
         'type' => 'option', 
        'capability' =>  'edit_theme_options'
  ) );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          $color['slug'], 
          array(
          'label' => $color['label'], 
          'section' => 'general-colors',
          'settings' => $color['slug']
        )
      )
  );
}

$theme_component_colors[] = array( 'slug'=>'top_bar',  'default' => '#eee', 'label' => 'Top Bar Background');
$theme_component_colors[] = array( 'slug'=>'main_menu',  'default' => '#eee', 'label' => 'Main Menu Background');
$theme_component_colors[] = array( 'slug'=>'footer',  'default' => '#eee', 'label' => 'Footer Background');
$theme_component_colors[] = array( 'slug'=>'credits',  'default' => '#eee', 'label' => 'Footer Credits Background');
$theme_component_colors[] = array( 'slug'=>'heading_panel',  'default' => '#eee', 'label' => 'Page / Post Heading Panel Background');
$theme_component_colors[] = array( 'slug'=>'sidebar_header',  'default' => '#eee', 'label' => 'Sidebar Heading Background');
$theme_component_colors[] = array( 'slug'=>'sidebar_body',  'default' => '#eee', 'label' => 'Sidebar Body Background');


 $wp_customize->add_section( 'theme-colors',
  array(
    'title' => 'Theme Components Color Settings',
    'panel' => 'colors-panel',
  ));


foreach ($theme_component_colors as $color) {

  if( !get_option($color['slug']) ) add_option($color['slug'], $color['default']);
  
  $wp_customize->add_setting( $color['slug'], array(
      'default'     => $color['default'],
         'type' => 'option', 
        'capability' =>  'edit_theme_options'
  ) );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          $color['slug'], 
          array(
          'label' => $color['label'], 
          'section' => 'theme-colors',
          'settings' => $color['slug']
        )
      )
  );
}



$theme_typography_colors[] = array( 'slug'=>'headings_hp',  'default' => '#000', 'label' => 'Home Page Heading');
$theme_typography_colors[] = array( 'slug'=>'headings_hp_light',  'default' => '#ccc', 'label' => 'Home Page Heading Light');
$theme_typography_colors[] = array( 'slug'=>'headings_pp_content',  'default' => '#ccc', 'label' => 'Headings Page/Post Content');
$theme_typography_colors[] = array( 'slug'=>'links',  'default' => '#00f', 'label' => 'Link Color');
$theme_typography_colors[] = array( 'slug'=>'links_hover',  'default' => '#003', 'label' => 'Link Color (Hover)');
$theme_typography_colors[] = array( 'slug'=>'paragraph',  'default' => '#23282d', 'label' => 'Paragraphs');
$theme_typography_colors[] = array( 'slug'=>'sidebar_heading',  'default' => '#003', 'label' => 'Sidebar Heading');

$theme_typography_colors[] = array( 'slug'=>'menu_link_color',  'default' => '#ccc', 'label' => 'Main Menu Links');


$theme_typography_colors[] = array( 'slug'=>'text_normal',  'default' => '#23282d', 'label' => 'Text Color Default');
$theme_typography_colors[] = array( 'slug'=>'text_light',  'default' => '#ccc', 'label' => 'Text Color Light');



 $wp_customize->add_section( 'typography-colors',
  array(
    'title' => 'Theme Typography Color Settings',
    'panel' => 'colors-panel',
  ));

foreach ($theme_typography_colors as $color) {

  if( !get_option($color['slug']) ) add_option($color['slug'], $color['default']);
  
  $wp_customize->add_setting( $color['slug'], array(
      'default'     => $color['default'],
         'type' => 'option', 
        'capability' =>  'edit_theme_options'
  ) );

  $wp_customize->add_control(
      new WP_Customize_Color_Control(
          $wp_customize,
          $color['slug'], 
          array(
          'label' => $color['label'], 
          'section' => 'typography-colors',
          'settings' => $color['slug']
        )
      )
  );
}


/*--------------------------------------------------------------
## Color Options Ends
--------------------------------------------------------------*/


}
add_action( 'customize_register', 'hvac101_customize_register' );



/*--------------------------------------------------------------
## Special Functions
--------------------------------------------------------------*/


function hvac101_show_title_field($wp_customize, $section, $setting_control, $string, $default)
{

if( !get_option($setting_control) ) add_option($setting_control, $default);

$wp_customize->add_setting( $setting_control, array(
    'capability'    => 'edit_theme_options',
    'default'     => $default,
    'transport' => 'refresh', // or postMessage
    'type'=>'option'
) );

$wp_customize->add_control( $setting_control, array(
    'label'                 =>  __($string, 'hvac101' ),
    'section'               => $section,
    'type'                  => 'text',
    'priority'              => 2,
    'settings' => $setting_control,
) );

}

//Function for enabling or disabling a section $setting_control
function hvac101_show_enable_disable($wp_customize, $section, $setting_control, $string)
{

if( !get_option($setting_control) ) add_option($setting_control, false);

$wp_customize->add_setting( $setting_control, array(
    'capability'    => 'edit_theme_options',
    'default'     => false,
    'transport' => 'refresh', // or postMessage
    'type'=>'option'
) );

$wp_customize->add_control( $setting_control, array(
    'label'                 =>  __($string, 'hvac101' ),
    'section'               => $section,
    'type'                  => 'checkbox',
    'priority'              => 1,
    'settings' => $setting_control,
) );

}


function hvac101_show_layout_option($wp_customize, $section, $setting_control_name, $string, $options)
{


if( !get_option($setting_control_name) ) add_option($setting_control_name, reset($options));


$wp_customize->add_setting( $setting_control_name, array(
    'capability'    => 'edit_theme_options',
    'default'     => reset($options),
    'transport' => 'refresh', // or postMessage
    'type'=>'option'
) );

$wp_customize->add_control( $setting_control_name, array(
    'label'                 =>  __($string, 'hvac101' ),
    'section'               => $section,
    'type'                  => 'select',
    'choices'       => $options,
    'priority'              => 10,
    'settings' => $setting_control_name,
) );


}