<?php
/*
Plugin Name:  MR CF7 Optimization
Description:  Adds optimizations for Contact Form 7 and Listo plugins
Plugin URI:   https://github.com/dush88gs
Author:       Dushan Maduranga
Version:      1.0
Text Domain:  mr-cf7-optimizations
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

function mr_cf7_optimizations_cf7_is_plugin_active( $plugin ) {
  return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
}

// load text domain
// function mr_cf7_optimizations_load_textdomain() {

// 	load_plugin_textdomain( 'mr-cf7-optimizations', false, plugin_dir_path( __FILE__ ) . 'languages/' );

// }
// add_action( 'plugins_loaded', 'mr_cf7_optimizations_load_textdomain' );

if(mr_cf7_optimizations_cf7_is_plugin_active('contact-form-7/wp-contact-form-7.php')){

  // include plugin dependencies: admin only
  if ( is_admin() ) {

    require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
    require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';

  }



  // include plugin dependencies: admin and public
  require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';



  // default plugin options
  function mr_cf7_optimizations_options_default() {

    return array(
      'load_css_js_on_cf7_pages_only' => false,
      'prevent_cf7_auto_paragraphs' => false,
      'listo_sort_lists_alphabatically'   => false
    );

  }

  // Add settings link on plugins page next to deactivate link
  function mr_cf7_optimizations_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
      admin_url( 'options-general.php?page=mr-cf7-optimizations' ) .
      '">' . __('Settings') . '</a>';
    return $links;
  }
  add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'mr_cf7_optimizations_add_plugin_page_settings_link');

} else {
  add_action('admin_notices', 'mr_cf7_optimizations_active_cf7' );
	
	function mr_cf7_optimizations_active_cf7() {

    deactivate_plugins( plugin_basename( __FILE__ ) ); 
	
		echo '<div class="error"><p><strong>Warning: </strong>MR CF7 Optimization plugin requires <a href="' . get_admin_url() . 'plugin-install.php?tab=plugin-information&plugin=contact-form-7&TB_iframe=true&width=772&height=558">Contact Form 7</a> plugin to be installed and activated.</p></div>';
	
	}
}


