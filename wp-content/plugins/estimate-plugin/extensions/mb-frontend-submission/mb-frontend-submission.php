<?php
/**
 * Plugin Name: MB Frontend Submission
 * Plugin URI: https://metabox.io/plugins/mb-frontend-submission
 * Description: Submit posts and custom fields in the frontend.
 * Version: 1.3.4
 * Author: MetaBox.io
 * Author URI: https://metabox.io
 * License: GPL2+
 * Text Domain: mb-frontend-submission
 * Domain Path: /languages/
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

// Prevent loading this file directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'mb_frontend_submission_load' ) ) {
	/**
	 * Hook to 'init' with priority 10 to make sure all meta boxes are registered.
	 */
	add_action( 'init', 'mb_frontend_submission_load', 20 );

	/**
	 * Load plugin files after Meta Box is loaded
	 */
	function mb_frontend_submission_load() {
		if ( ! defined( 'RWMB_VER' ) || class_exists( 'MB_Frontend_Form' ) ) {
			return;
		}

		define( 'MB_FRONTEND_SUBMISSION_DIR', dirname( __FILE__ ) );
		list( , $url ) = RWMB_Loader::get_path( MB_FRONTEND_SUBMISSION_DIR );
		define( 'MB_FRONTEND_SUBMISSION_URL', $url );

		load_plugin_textdomain( 'mb-frontend-submission', false, basename( MB_FRONTEND_SUBMISSION_DIR ) . '/languages' );

		require_once MB_FRONTEND_SUBMISSION_DIR . '/inc/interface-mb-frontend-object-model.php';
		require_once MB_FRONTEND_SUBMISSION_DIR . '/inc/class-mb-frontend-post.php';
		require_once MB_FRONTEND_SUBMISSION_DIR . '/inc/class-mb-frontend-form.php';
		require_once MB_FRONTEND_SUBMISSION_DIR . '/inc/class-mb-frontend-form-shortcode.php';

		require_once MB_FRONTEND_SUBMISSION_DIR . '/vendor/GaryJones/Gamajo-Template-Loader/class-gamajo-template-loader.php';
		require_once MB_FRONTEND_SUBMISSION_DIR . '/inc/class-mb-frontend-template-loader.php';

		require_once MB_FRONTEND_SUBMISSION_DIR . '/inc/class-mb-frontend-helpers.php';

		$shortcode = new MB_Frontend_Form_Shortcode();
		$shortcode->init();
	}
}
