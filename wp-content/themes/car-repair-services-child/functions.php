<?php
/**
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since 1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'car_repair_services_child_enqueue_styles' ) ) {
	// Add enqueue function to the desired action.
	add_action( 'wp_enqueue_scripts', 'car_repair_services_child_enqueue_styles' );
	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0
	 */

	function car_repair_services_child_enqueue_styles() {

		$parent_style = 'parent-style';
		$car_repair_services = car_repair_services_options();
		if(isset($car_repair_services['theme_setting'])){
			$theme = $car_repair_services['theme_setting'];
		}else{
			$theme = '';
		}
	
		if($theme != '2'){
		wp_enqueue_style($parent_style, get_parent_theme_file_uri() . '/style.css', array('bootstrap','js_composer_front'));
		}else{
			wp_enqueue_style($parent_style, get_parent_theme_file_uri() . '/style-2.css', array('bootstrap'));
		}
		wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style), wp_get_theme()->get('Version')
		);
	}

}