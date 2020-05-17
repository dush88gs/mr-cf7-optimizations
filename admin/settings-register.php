<?php // MR CF7 Optimization - Register Settings



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// register plugin settings
function mr_cf7_optimizations_register_settings() {
	
	/*
	
	register_setting( 
		string   $option_group, 
		string   $option_name, 
		callable $sanitize_callback = ''
	);
	
	*/
	
	register_setting( 
		'mr_cf7_optimizations_options', 
		'mr_cf7_optimizations_options', 
		'mr_cf7_optimizations_callback_validate_options' 
	); 
	
	/*
	
	add_settings_section( 
		string   $id, 
		string   $title, 
		callable $callback, 
		string   $page
	);
	
	*/
	
	add_settings_section( 
		'mr_cf7_optimizations_section_admin', 
		esc_html__('Customize CF7 Optimization', 'mr-cf7-optimizations'), 
		'mr_cf7_optimizations_callback_section_admin', 
		'mr-cf7-optimizations'
	);
	
	/*
	
	add_settings_field(
    string   $id, 
		string   $title, 
		callable $callback, 
		string   $page, 
		string   $section = 'default', 
		array    $args = []
	);
	
	*/
	
	add_settings_field(
		'load_css_js_on_cf7_pages_only',
		esc_html__('CF7 CSS/JS unload', 'mr-cf7-optimizations'),
		'mr_cf7_optimizations_callback_field_checkbox_unload_js_css',
		'mr-cf7-optimizations', 
		'mr_cf7_optimizations_section_admin', 
    [ 'id' => 'load_css_js_on_cf7_pages_only', 'label' => __('Remove Contact Form 7\'s JS/CSS from all pages.<br><b>Note that you have to add the following code snippet into <u>very top</u> of your template file(s) where contact form 7 shortcode exist in order to contact form to be functioned correctly.</b>', 'mr-cf7-optimizations') ]
  );
  
	add_settings_field(
		'prevent_cf7_auto_paragraphs',
		esc_html__('CF7 prevent auto paragraps', 'mr-cf7-optimizations'),
		'mr_cf7_optimizations_callback_field_checkbox',
		'mr-cf7-optimizations', 
		'mr_cf7_optimizations_section_admin', 
		[ 'id' => 'prevent_cf7_auto_paragraphs', 'label' => esc_html__('Prevent contact forms adding paragraphs automatically when press "Enter" within form template', 'mr-cf7-optimizations') ]
  );
  
	add_settings_field(
		'listo_sort_lists_alphabatically',
		esc_html__('Listo - sort lists alphabatically', 'mr-cf7-optimizations'),
		'mr_cf7_optimizations_callback_field_checkbox',
		'mr-cf7-optimizations', 
		'mr_cf7_optimizations_section_admin', 
		[ 'id' => 'listo_sort_lists_alphabatically', 'label' => esc_html__('Sort lists alphabatically by label when using Listo plugin', 'mr-cf7-optimizations') ]
	);
    
} 
add_action( 'admin_init', 'mr_cf7_optimizations_register_settings' );


