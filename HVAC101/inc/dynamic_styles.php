<?php 
function all_dynamic_css(){
	
	$custom_css='';

	/* General Color */
	$primary_color=get_option('primary_color');
	$secondary_color=get_option('secondary_color');
	$third_color=get_option('third_color');

	$custom_css.=".bg-primary-color{ background-color: $primary_color; } ";
	$custom_css.=".color-primary-color{ color: $primary_color; } ";
	$custom_css.=".hover-bg-primary-color:hover{ background-color: $primary_color; } ";

	$custom_css.=".bg-secondary-color{ background-color: $secondary_color; } ";
	$custom_css.=".color-secondary-color{ color: $secondary_color; } ";
	$custom_css.=".hover-bg-secondary-color:hover{ background-color: $secondary_color; } ";

	$custom_css.=".bg-third-color{ background-color: $third_color; } ";
	$custom_css.=".color-third-color{ color: $third_color; } ";
	$custom_css.=".hover-bg-third-color:hover{ background-color: $third_color; } ";


	$top_bar=get_option('top_bar');
	$main_menu=get_option('main_menu');
	$footer=get_option('footer');
	$credits=get_option('credits');
	$heading_panel=get_option('heading_panel');
	$sidebar_header=get_option('sidebar_header');
	$sidebar_body=get_option('sidebar_body');

	
	$custom_css.=".top-bar{ background-color: $top_bar; } ";

	$custom_css.="nav.main-menu{ background-color: $main_menu !important; } ";
	$custom_css.="nav.main-menu .dropdown-menu { background: $main_menu !important; } ";

	$custom_css.=".site-footer{ background-color: $footer; } ";
	$custom_css.=".footer-bar{ background-color: $credits; } ";	

	$custom_css.=".page-inner-heading{ background-color: $heading_panel; } ";

	$custom_css.=".widget-title.card-header{ background-color: $sidebar_header; } ";
	$custom_css.="section.widget.card{ background-color: $sidebar_body; border: 1px solid $sidebar_body; } ";


	$headings_hp = get_option('headings_hp');
	$headings_hp_light = get_option('headings_hp_light');
	$headings_pp_content = get_option('headings_pp_content');
	$links = get_option('links');
	$links_hover = get_option('links_hover');
	$paragraph = get_option('paragraph');
	$sidebar_heading = get_option('sidebar_heading');
	$menu_link_color = get_option('menu_link_color');
	$text_normal = get_option('text_normal');
	$text_light = get_option('text_light');

	$custom_css.="h3.section_heading{ color: $headings_hp; } ";
	$custom_css.="section.text-light h3.section_heading{ color: $headings_hp_light; } ";
	$custom_css.="article .entry-content h1, article .entry-content h2, article .entry-content h3, article .entry-content h4, article .entry-content h5, article .entry-content h6{ color: $headings_pp_content; } ";
	$custom_css.=".entry-title a{ color: $headings_pp_content; text-decoration: none;} ";

	$custom_css.="article .entry-content a{ color: $links; } ";
	$custom_css.="article .entry-content a:hover{ color: $links_hover; } ";
	$custom_css.="article .entry-content p{ color: $paragraph; } ";
	$custom_css.=".widget-title.card-header{ color: $sidebar_heading; } ";

	$custom_css.="nav.main-menu .menu-item a{ color: $menu_link_color !important; } ";
	

	$custom_css.=".text_normal{ color: $text_normal; } ";
	$custom_css.=".text_light{ color: $text_light; } ";

	



	$custom_css.='';


	return $custom_css;
}