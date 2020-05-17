<?php // MR CF7 Optimization - Admin Menu



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// add sub-level administrative menu
function mr_cf7_optimizations_add_sublevel_menu() {
	
	/*
	
	add_submenu_page(
		string   $parent_slug,
		string   $page_title,
		string   $menu_title,
		string   $capability,
		string   $menu_slug, 
		callable $function = ''
	);
	
	*/
	
	add_submenu_page(
		'options-general.php',
		esc_html__('MR CF7 Optimization Settings', 'mr-cf7-optimizations'),
		esc_html__('MR CF7 Optimization', 'mr-cf7-optimizations'),
		'manage_options',
		'mr-cf7-optimizations',
		'mr_cf7_optimizations_display_settings_page'
	);
	
}
add_action( 'admin_menu', 'mr_cf7_optimizations_add_sublevel_menu' );


