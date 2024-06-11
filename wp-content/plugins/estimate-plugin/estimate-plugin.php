<?php
/*
  Plugin Name: Estimate Plugin
  Plugin URI: http://smartdatasoft.com/
  Description: Helping  Listing Plug In for the SmartDataSoft  theme.
  Author: SmartDataSoft Team
  Version: 3.5
  Author URI: http://smartdatasoft.com/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'CAR_REPAIR_SERVICE_THEME_URI' ) ) {
	define( 'CAR_REPAIR_SERVICE_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'CAR_REPAIR_SERVICES_THEME_URI' ) ) {
	define( 'CAR_REPAIR_SERVICES_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'ULTIMA_NAME' ) ) {
	define( 'ULTIMA_NAME', 'car-repair-services' );
}

define( 'ESTIMATE_PLUGIN_DIR', dirname( __FILE__ ) . '/' );


add_action( 'admin_enqueue_scripts', 'estimate_plugin_admin_enqueue' );


require_once ESTIMATE_PLUGIN_DIR . 'functions.php';
require_once ESTIMATE_PLUGIN_DIR . 'hooks.php';
require_once ESTIMATE_PLUGIN_DIR . 'function-tags.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/services-cpt.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/contact-cpt.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/service-estimate-admin-coloumn.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/contact-admin-coloumn.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/service-estimate-fields.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/contactclass.php';
require_once ESTIMATE_PLUGIN_DIR . 'includes/class-scripts.php';
require_once ESTIMATE_PLUGIN_DIR . 'search-form.php';
require_once ESTIMATE_PLUGIN_DIR . 'settings.php';



require_once ESTIMATE_PLUGIN_DIR . 'extensions/meta-box-columns/meta-box-columns.php';
require_once ESTIMATE_PLUGIN_DIR . 'extensions/meta-box-group/meta-box-group.php';
require_once ESTIMATE_PLUGIN_DIR . 'extensions/mb-term-meta/mb-term-meta.php';
require_once ESTIMATE_PLUGIN_DIR . 'extensions/mb-settings-page/mb-settings-page.php';
require_once ESTIMATE_PLUGIN_DIR . 'extensions/mb-frontend-submission/mb-frontend-submission.php';



function estimate_plugin_admin_enqueue( $hook ) {

	// laod custom post type js
	if ( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
		return;
	}
	wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . '/js/admin.js' );
}

remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'plugins_loaded', 'estimate_plugin_load_textdomain' );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function estimate_plugin_load_textdomain() {
	load_plugin_textdomain( 'estimate-plugin', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

function fotter_pop() {
	?>
  <div class="modal fade modalform-sm" id="fullServices">
	<div class="modal-dialog container">
	  <div class="modal-content">
		<div class="modal-header">
		  <h2><?php esc_html_e( 'Select Service', 'estimate-plugin' ); ?></h2>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close-cross"></i></button>
		</div>
		<div class="modal-body">
		  <div class="container-fluid">
			<form
			class="estimate_search" autocomplete="off"
			action="<?php echo home_url( 'estimateresult/result' ); ?>"
			method="GET"
			role="search">
			<div class="row service-modal-row">
			</div>
			<input id="mk" type="hidden" name="<?php echo esc_attr( 'make', 'estimate-plugin' ); ?>">
			<input id="md" type="hidden" name="<?php echo esc_attr( 'model', 'estimate-plugin' ); ?>">
			<input id="yr" type="hidden" name="<?php echo esc_attr( 'the_year', 'estimate-plugin' ); ?>">
			<div class="tt-item">
			  <input placeholder="State, Zip, Town" type="hidden" name="s">
			</div>
			<div class="modal-footer">
			  <button class="btn btn-border btn-invert" type="submit" id="estimatorSubmitModal"><span><?php esc_html_e( 'GET ESTIMATE', 'estimate-plugin' ); ?></span></button>
			</div>
		  </form>
		  </div>
		</div>
	  </div>
	</div>
  </div>

	<?php
}
add_action( 'wp_footer', 'fotter_pop', 100 );

add_action( 'init', 'estimate_checkbox_type' );
function estimate_checkbox_type() {
	 include_once ESTIMATE_PLUGIN_DIR . 'includes/checkbox-type.php';
}
