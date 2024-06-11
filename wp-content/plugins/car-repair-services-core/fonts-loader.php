<?php
add_action( 'admin_enqueue_scripts', 'car_repair_services_core_admin_fonts_enqueue' );
function car_repair_services_core_admin_fonts_enqueue() {

	wp_enqueue_style( 'iconfont-style', get_template_directory_uri() . '/iconfont/style.css', '', null );
 

}


/* **************************************************************
 * Get Theme Font Icon
 * ************************************************************** */
if (!function_exists('car_repair_services_get_theme_font')) {
	function &car_repair_services_get_theme_font() {
		if (isset($GLOBALS['car_repair_services_theme_icons']) && is_array($GLOBALS['car_repair_services_theme_icons'])) {
			return $GLOBALS['car_repair_services_theme_icons'];
		}
		$GLOBALS['car_repair_services_theme_icons'] = apply_filters('car_repair_services_theme_icons', array(
			
			array('icon-arrow_up' => 'icon-arrow_up'),
			array('icon-arrow_down' => 'icon-arrow_down'),
			array('icon-star' => 'icon-star'),
			array('icon-calendar' => 'icon-calendar'),
			array('icon-calendar-page' => 'icon-calendar-page'),
			array('icon-oil' => 'icon-oil'),
			array('icon-balance' => 'icon-balance'),
			array('icon-power' => 'icon-power'),
			array('icon-car-wheel' => 'icon-car-wheel'),
			array('icon-disc-brake' => 'icon-disc-brake'),
			array('icon-check' => 'icon-check'),
			array('icon-close-cross' => 'icon-close-cross'),
			array('icon-clock' => 'icon-clock'),
			array('icon-locate' => 'icon-locate'),
			array('icon-favorite' => 'icon-favorite'),
			array('icon-interface' => 'icon-interface'),
			array('icon-lines-menu' => 'icon-lines-menu'),
			array('icon-rocket' => 'icon-rocket'),
			array('icon-people-1' => 'icon-people-1'),
			array('icon-people' => 'icon-people'),
			array('icon-transport' => 'icon-transport'),
			array('icon-people-2' => 'icon-people-2'),
			array('icon-people-3' => 'icon-people-3'),
			array('icon-settings' => 'icon-settings'),
			array('icon-shape' => 'icon-shape'),
			array('icon-squares' => 'icon-squares'),
			array('icon-technology' => 'icon-technology'),
			array('icon-tool' => 'icon-tool'),
			array('icon-diploma' => 'icon-diploma'),
			array('icon-transport-1' => 'icon-transport-1'),
			array('icon-mark' => 'icon-mark'),
			array('icon-web-settings' => 'icon-web-settings'),
			array('icon-arrow-left' => 'icon-arrow-left'),
			array('icon-arrow-right' => 'icon-arrow-right'),
			array('icon-arrows-2' => 'icon-arrows-2'),
			array('icon-behance-logo' => 'icon-behance-logo'),
			array('icon-facebook-logo' => 'icon-facebook-logo'),
			array('icon-google-plus-logo' => 'icon-google-plus-logo'),
			array('icon-instagram-logo' => 'icon-instagram-logo'),
			array('icon-linkedin-logo' => 'icon-linkedin-logo'),
			array('icon-tumblr-logo' => 'icon-tumblr-logo'),
			array('icon-twitter-logo' => 'icon-twitter-logo'),


		));

		return $GLOBALS['car_repair_services_theme_icons'];
	}
}

/* **************************************************************
 * Get Theme Font Icon
 * ************************************************************** */
if (!function_exists('car_repair_services_get_theme_font')) {
	function &car_repair_services_get_theme_font() {
		if (function_exists('car_repair_services_get_theme_font')) {
			return car_repair_services_get_theme_font();
		}
		$fonts = array();
		return $fonts;
	}
}


/* **************************************************************
 * Add theme icon
 * ************************************************************** */
if (!function_exists('car_repair_services_add_theme_icon')) {
	function car_repair_services_add_theme_icon($icons){
		$icons['Car Repair Services Icon'] = &car_repair_services_get_theme_font();
		return $icons;
	}
	add_filter('vc_iconpicker-type-carrepairservices','car_repair_services_add_theme_icon');
}