<?php // MR CF7 Optimization - Settings Callbacks



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}


// callback: admin section
function mr_cf7_optimizations_callback_section_admin() {
	
	echo '<p>'. esc_html__('These settings enables you to optimize Contact Form 7 plugin', 'mr-cf7-optimizations') .'</p>';
	
}


// callback: CF7 CSS/JS unload field
function mr_cf7_optimizations_callback_field_checkbox_unload_js_css( $args ) {

  $remove_html = htmlspecialchars("<?php \n  if ( function_exists( 'wpcf7_enqueue_scripts' ) ) { \n    wpcf7_enqueue_scripts(); \n  } \n  if ( function_exists( 'wpcf7_enqueue_styles' ) ) { \n    wpcf7_enqueue_styles(); \n  } \n?>");

  // $add_br = nl2br($remove_html);
	
	$options = get_option( 'mr_cf7_optimizations_options', mr_cf7_optimizations_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="mr_cf7_optimizations_options_'. $id .'" name="mr_cf7_optimizations_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
  echo '<label for="mr_cf7_optimizations_options_'. $id .'">'. $label .'</label>';
  echo "<pre>";
  echo  $remove_html;
  echo "</pre>";
	
}

// callback: CF7 Other Fields field
function mr_cf7_optimizations_callback_field_checkbox( $args ) {
	
	$options = get_option( 'mr_cf7_optimizations_options', mr_cf7_optimizations_options_default() );
	
	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';
	
	$checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
	
	echo '<input id="mr_cf7_optimizations_options_'. $id .'" name="mr_cf7_optimizations_options['. $id .']" type="checkbox" value="1"'. $checked .'> ';
  echo '<label for="mr_cf7_optimizations_options_'. $id .'">'. $label .'</label>';
	
}