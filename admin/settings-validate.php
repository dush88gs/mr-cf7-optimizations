<?php // MR CF7 Optimization - Validate Settings


// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


// callback: validate options
function mr_cf7_optimizations_callback_validate_options( $input ) {
	
	// CF7 CSS/JS unload
	if ( ! isset( $input['load_css_js_on_cf7_pages_only'] ) ) {
		
		$input['load_css_js_on_cf7_pages_only'] = null;
		
	}
	
  $input['load_css_js_on_cf7_pages_only'] = ($input['load_css_js_on_cf7_pages_only'] == 1 ? 1 : 0);
  

	// CF7 prevent auto paragraps
	if ( ! isset( $input['prevent_cf7_auto_paragraphs'] ) ) {
		
		$input['prevent_cf7_auto_paragraphs'] = null;
		
	}
	
  $input['prevent_cf7_auto_paragraphs'] = ($input['prevent_cf7_auto_paragraphs'] == 1 ? 1 : 0);
  

	// Listo - sort lists alphabatically
	if ( ! isset( $input['listo_sort_lists_alphabatically'] ) ) {
		
		$input['listo_sort_lists_alphabatically'] = null;
		
	}
	
	$input['listo_sort_lists_alphabatically'] = ($input['listo_sort_lists_alphabatically'] == 1 ? 1 : 0);
	
	return $input;
	
}


