<?php // MR CF7 Optimization - Settings Page



// disable direct file access
if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
	
}



// display the plugin settings page
function mr_cf7_optimizations_display_settings_page() {
	
	// check if user is allowed access
	if ( ! current_user_can( 'manage_options' ) ) return;
	
	?>
	
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			
			<?php
			
			// output security fields
			settings_fields( 'mr_cf7_optimizations_options' );
			
			// output setting sections
			do_settings_sections( 'mr-cf7-optimizations' );
			
			// submit button
			submit_button();
			
			?>
			
		</form>
	</div>
	
	<?php
	
}


