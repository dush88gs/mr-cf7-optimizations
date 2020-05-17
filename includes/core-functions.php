<?php // MR CF7 Optimization - Core Functionality



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}

function mr_cf7_optimizations_unload_css_js() {
	
	$unload_css_js = false;
	
	$options = get_option( 'mr_cf7_optimizations_options', mr_cf7_optimizations_options_default() );
	
	if ( isset( $options['load_css_js_on_cf7_pages_only'] ) && ! empty( $options['load_css_js_on_cf7_pages_only'] ) ) {
		
		$unload_css_js = (bool) $options['load_css_js_on_cf7_pages_only'];
		
	}
	
	if ( $unload_css_js ) {

    add_filter( 'wpcf7_load_js', '__return_false' );
    add_filter( 'wpcf7_load_css', '__return_false' );

  }
	
}
add_action( 'init', 'mr_cf7_optimizations_unload_css_js' );


// CF7 prevent auto paragraps
function mr_cf7_optimizations_prevent_auto_para() {
	
	$prevent_auto_para = false;
	
	$options = get_option( 'mr_cf7_optimizations_options', mr_cf7_optimizations_options_default() );
	
	if ( isset( $options['prevent_cf7_auto_paragraphs'] ) && ! empty( $options['prevent_cf7_auto_paragraphs'] ) ) {
		
		$prevent_auto_para = (bool) $options['prevent_cf7_auto_paragraphs'];
		
	}
	
	if ( $prevent_auto_para ) {
		
    add_filter('wpcf7_autop_or_not', '__return_false' );
		
	}
	
}
add_action( 'init', 'mr_cf7_optimizations_prevent_auto_para' );


// Listo - sort lists alphabatically
function mr_cf7_optimizations_sort_lists_alphabatically() {
	
	$sort_lists_alpha = false;
	
	$options = get_option( 'mr_cf7_optimizations_options', mr_cf7_optimizations_options_default() );
	
	if ( isset( $options['listo_sort_lists_alphabatically'] ) && ! empty( $options['listo_sort_lists_alphabatically'] ) ) {
		
		$sort_lists_alpha = (bool) $options['listo_sort_lists_alphabatically'];
		
	}
	
	if ( $sort_lists_alpha ) {
		
		function sort_lists_by_label( $data, $options, $args ) {
      if ( ! $data )
          return $data;

      usort( $data, 'compare' );

      return $data;
    }
    function compare( $a, $b ) {
        if ( $a == $b )
            return 0;

        for ( $i = 0, $l = min( mb_strlen( $a ), mb_strlen( $b ) ); $i < $l; $i++ ) {
            $cmp = compare_char( mb_substr( $a, $i, 1 ), mb_substr( $b, $i, 1 ) );
            if ( $cmp != 0 ) {
                return $cmp;
            }
        }

        return (int) ( mb_strlen( $a ) > mb_strlen( $b ) );
    }
    function compare_char( $a, $b ) {
        $chars  = 'AÀÁÄÃÅBCÇDEÈÉÊËFGHIÌÍÎÏJKLMNOÒÓÔÖÕPQRSTUÙÚÛÜVWXYZ';
        $chars .= 'aàáäãåbcçdeèéêëfghiìíîïjklmnoòóôöõpqrstuùúûüvwxyz';

        $pos_a = mb_strpos( $chars, $a );
        $pos_b = mb_strpos( $chars, $b );

        if ( $pos_a === false )
            return (int) ( false !== $pos_b );

        return false === $pos_b ? -1 : ( $pos_a - $pos_b );
    }
    add_filter( 'wpcf7_form_tag_data_option', 'sort_lists_by_label', 11, 3 );
		
  }
	
}
add_action( 'init', 'mr_cf7_optimizations_sort_lists_alphabatically' );