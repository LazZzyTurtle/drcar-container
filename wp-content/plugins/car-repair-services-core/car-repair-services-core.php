<?php
/*
  Plugin Name: Car Repair Services Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the Car Repair Services theme.
  Author: SmartDataSoft
  Version: 4.9
  Author URI: http://smartdatasoft.com/
*/

if ( ! defined( 'CAR_REPAIR_SERVICE_THEME_URI' ) ) {
	define( 'CAR_REPAIR_SERVICE_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'CAR_REPAIR_SERVICES_THEME_URI' ) ) {
	define( 'CAR_REPAIR_SERVICES_THEME_URI', get_template_directory_uri() );
}
if ( ! defined( 'ULTIMA_NAME' ) ) {
	define( 'ULTIMA_NAME', 'car-repair-services' );
}

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
add_action( 'plugins_loaded', 'car_repair_services_core_load_textdomain' );
function car_repair_services_core_load_textdomain() {
	load_plugin_textdomain( 'car-repair-services-core', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'admin_enqueue_scripts', 'car_repair_services_core_admin_enqueue' );
function car_repair_services_core_admin_enqueue( $hook ) {
	wp_enqueue_style( 'iconfont-style', get_template_directory_uri() . '/iconfont/style.css', '', null );

	wp_enqueue_style( 'car-repair-services-admin-css', get_template_directory_uri() . '/css/admin.css', '', null );

	// laod custom post type js
	if ( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' ) {
		return;
	}
	wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . '/js/admin.js' );
}

/*
 ============================================================
 * Visual Composer shorrtcode config
 * ============================================================ */

define( 'CAR_REPAIR_PLUGIN_DIR', dirname( __FILE__ ) . '/' );

$classesDir = array(
	CAR_REPAIR_PLUGIN_DIR . 'shortcode/',
	CAR_REPAIR_PLUGIN_DIR . 'vc_element/',
);

function __autoloadShortCode() {
	global $classesDir;
	foreach ( $classesDir as $directory ) {

		foreach ( glob( $directory . '*.php' ) as $filename ) {
			if ( file_exists( $filename ) ) {
				include_once $filename;
			}
		}
	}
}

function __autoloadVcMap() {
	__autoloadShortCode();
}

add_action( 'vc_before_init', '__autoloadVcMap' );




register_activation_hook( __FILE__, 'insertSiteInfo' );

function insertSiteInfo() {
	 $not_required = get_option( 'car_repair_services_info_updated' );
	if ( $not_required != 1 ) {
		if ( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ) {
			return false;
		}

		$my_theme = wp_get_theme( 'car-repair-services' );
		if ( $my_theme->exists() ) {
			$themever  = $my_theme->get( 'Version' );
			$themename = $my_theme->get( 'Name' );
		} else {
			$themever  = '1.2';
			$themename = 'car-repair-services';
		}

		$url      = 'http://smartdatasoft.net/verify';
		$response = wp_remote_post(
			$url,
			array(
				'method'      => 'POST',
				'timeout'     => 45,
				'redirection' => 5,
				'blocking'    => true,
				'headers'     => array(),
				'body'        => array(
					'purchase_key' => 'null',
					'operation'    => 'insert_site',
					'domain'       => $_SERVER['HTTP_HOST'],
					'module'       => 'wp-car-repair-services',
					'version'      => $themever,
					'theme_name'   => $themename,
				),
				'cookies'     => array(),
			)
		);

		if ( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && $response['response']['code'] == 200 ) {
			// add a option record in options table.
			update_option( 'car_repair_services_info_updated', '1' );
		}
	}
}

$classesPostTypeDir = CAR_REPAIR_PLUGIN_DIR . 'post_type/';

function __autoloadPostType( $directory ) {
	foreach ( glob( $directory . '*.php' ) as $filename ) {
		if ( file_exists( $filename ) ) {
			include_once $filename;
		}
	}
}

__autoloadPostType( $classesPostTypeDir );



/*
 * widgets auto load
 */
$classesWidgetsDir = CAR_REPAIR_PLUGIN_DIR . 'widgets/';

function __autoloadWidgets( $directory ) {
	foreach ( glob( $directory . '*.php' ) as $filename ) {
		if ( file_exists( $filename ) ) {

			include_once $filename;
		}
	}
}

__autoloadWidgets( $classesWidgetsDir );

add_action( 'car_repair_services_after_footer', 'car_repair_services_after_footer_function' );

function car_repair_services_after_footer_function() {
	if ( ! function_exists( 'car_repair_services_options' ) ) {
		return;
	}
	$car_repair_services_option = car_repair_services_options();

	$gmap_latitude  = ( isset( $car_repair_services_option['car_repair_services-gmap_latitude'] ) && ! empty( $car_repair_services_option['car_repair_services-gmap_latitude'] ) ) ? $car_repair_services_option['car_repair_services-gmap_latitude'] : '';
	$gmap_longitude = ( isset( $car_repair_services_option['car_repair_services-gmap_longitude'] ) && ! empty( $car_repair_services_option['car_repair_services-gmap_longitude'] ) ) ? $car_repair_services_option['car_repair_services-gmap_longitude'] : '';
	$gmap_zoom      = ( isset( $car_repair_services_option['car_repair_services-gmap_zoom'] ) && ! empty( $car_repair_services_option['car_repair_services-gmap_zoom'] ) ) ? $car_repair_services_option['car_repair_services-gmap_zoom'] : '14';

	$gmap_marker = ( isset( $car_repair_services_option['car_repair_services-gmap_marker'] ) && ! empty( $car_repair_services_option['car_repair_services-gmap_marker'] ) ) ? $car_repair_services_option['car_repair_services-gmap_marker']['url'] : '';

	// footer_map
	$mapkey = '';
	if ( isset( $car_repair_services_option['car_repair_services-gmap_api_key'] ) && ! empty( $car_repair_services_option['car_repair_services-gmap_api_key'] ) ) {
		$mapkey .= '&key=' . $car_repair_services_option['car_repair_services-gmap_api_key'];
	}

	$map_custom_style = '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]';

	if ( isset( $car_repair_services_option['car_repair_services-map_style'] ) && ! empty( $car_repair_services_option['car_repair_services-map_style'] ) ) {
		$map_custom_style = $car_repair_services_option['car_repair_services-map_style'];
	}
	$array_map_data              = array();
	$array_map_data[0]['lat']    = $gmap_latitude;
	$array_map_data[0]['lng']    = $gmap_longitude;
	$array_map_data[1]['lat']    = $gmap_latitude;
	$array_map_data[1]['lng']    = $gmap_longitude;
	$array_map_data[1]['marker'] = $gmap_marker;
	$map_custom_style            = apply_filters( 'car_repair_services_map_custom_style', $map_custom_style );
	$array_map_data              = apply_filters( 'car_repair_services_map_lat_lng_marker', $array_map_data );
	?>

	<!-- map -->
	<div id="footer-map" class="footer-map"></div>
	<!-- /map -->
	<!-- Google map -->
	<script type="text/javascript">

		window.addEventListener("scroll", lazyLoadGoogleMap);
		function lazyLoadGoogleMap() {
			var js_script = document.createElement('script');
			js_script.type = "text/javascript";
			js_script.src = "//maps.google.com/maps/api/js?sensor=true&callback=init<?php echo $mapkey; ?>";
			js_script.async = true;
			document.getElementsByTagName('head')[0].appendChild(js_script);
			window.removeEventListener("scroll", lazyLoadGoogleMap);
		}

		function init() {

			var locations = [];
	<?php foreach ( $array_map_data as $item ) : ?>
				locations.push(['<?php echo json_encode( $item ); ?>'])
	<?php endforeach; ?>
			var mapOptions = {
				zoom: parseInt(<?php echo esc_html( $gmap_zoom ); ?>),
				center: new google.maps.LatLng(<?php echo esc_html( $array_map_data[0]['lat'] ); ?>, <?php echo esc_html( $array_map_data[0]['lng'] ); ?>),
				styles: <?php echo $map_custom_style; ?>
			};

			var mapElement = document.getElementById('footer-map');
			var map = new google.maps.Map(mapElement, mapOptions);
			for (count = 1; count < locations.length; count++) {
				var locations_obj=JSON.parse(locations[count]);
				if(locations_obj.lat !=''){
					var marker =new google.maps.Marker({
						position: new google.maps.LatLng(locations_obj.lat, locations_obj.lng),
						map: map,
						icon: locations_obj.marker
					});
				}
			}

		}

	</script>

	<?php
}

/*
 * fonts auto load
 */

require_once CAR_REPAIR_PLUGIN_DIR . 'fonts-loader.php';


/*
 * Gallery load
 */

require_once CAR_REPAIR_PLUGIN_DIR . '/lib/sds_cpt_gallery.php';
/*
 * sidebar load
 */
require_once CAR_REPAIR_PLUGIN_DIR . '/lib/sidebar_generator.php';

/*
 * Meta Box Configuration Post Meta Option
 */
require_once CAR_REPAIR_PLUGIN_DIR . '/lib/config.meta.box.php';


/*
 *  color schema
 */


require_once CAR_REPAIR_PLUGIN_DIR . 'color_schema.php';

function car_repair_services_add_fonts_family() {
	return array(
		array(
			'type'        => 'dropdown',
			'heading'     => __( 'Icon library', 'js_composer' ),
			'value'       => array(
				__( 'Car Repair Services Icon', 'js_composer' ) => 'carrepairservices',
				__( 'Font Awesome', 'js_composer' ) => 'fontawesome',
				__( 'Open Iconic', 'js_composer' )  => 'openiconic',
				__( 'Typicons', 'js_composer' )     => 'typicons',
				__( 'Entypo', 'js_composer' )       => 'entypo',
				__( 'Linecons', 'js_composer' )     => 'linecons',
				__( 'Mono Social', 'js_composer' )  => 'monosocial',
			),
			'param_name'  => 'icon_type',
			'description' => __( 'Select icon library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_fontawesome',
			'value'       => 'fa fa-info-circle',
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'fontawesome',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_openiconic',
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'openiconic',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'openiconic',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_typicons',
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'typicons',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'typicons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'       => 'iconpicker',
			'heading'    => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon_entypo',
			'settings'   => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'entypo',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => 'entypo',
			),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_linecons',
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'linecons',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'linecons',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon_monosocial',
			'value'       => 'vc-mono vc-mono-fivehundredpx',
			// default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'monosocial',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'monosocial',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			'type'        => 'iconpicker',
			'heading'     => __( 'Icon', 'js_composer' ),
			'param_name'  => 'icon',
			'value'       => 'icon-lightning',
			// default value to backend editor admin_label
			'settings'    => array(
				'emptyIcon'    => false,
				// default true, display an "EMPTY" icon?
				'type'         => 'carrepairservices',
				'iconsPerPage' => 4000,
			// default 100, how many icons per/page to display
			),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'carrepairservices',
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
	);
}

function car_repair_services_replace_icon_html( $atts ) {
	extract(
		shortcode_atts(
			array(
				'icon'             => '',
				'heading'          => '',
				'description'      => '',
				'icon_type'        => '',
				'type'             => 'carrepairservices',
				'icon_fontawesome' => '',
				'icon_openiconic'  => '',
				'icon_typicons'    => '',
				'icon_entypo'      => '',
				'icon_linecons'    => '',
				'icon_monosocial'  => '',
			),
			$atts
		)
	);
	if ( $icon_type == '' ) {
		$icon_type = $type;
	}
	if ( $icon_type != 'carrepairservices' && ! empty( $icon_type ) && function_exists( 'vc_icon_element_fonts_enqueue' ) ) {

		vc_icon_element_fonts_enqueue( $icon_type );
		if ( ${'icon_' . $icon_type} != '' ) {
			$icon = ${'icon_' . $icon_type};
		}
	}
	return $icon;
}

add_filter( 'replace_icon_html', 'car_repair_services_replace_icon_html' );

require_once CAR_REPAIR_PLUGIN_DIR . '/car-repair-addons/car-repair-addons.php';

function car_repair_get_cpt_sevices() {
	 $args = array(
		 'numberposts' => 8,
		 'post_type'   => 'cpt_sevices_template',
	 );

	 $cpt_sevices = get_posts( $args );
	 $templates   = array();

	 $i = 0;
	 if ( is_array( $cpt_sevices ) && ! empty( $cpt_sevices ) ) {
		 foreach ( $cpt_sevices as $single ) {
			 $templates[ $single->ID ] = $single->post_title;
			 $i++;
		 }
	 } else {
		 $templates[1] = esc_html__('No Service Post Template','car-repair-services-core');
	 }
	 return $templates;

}
require_once CAR_REPAIR_PLUGIN_DIR . '/share/social-share.php';



// Hook called when the plugin is activated.
add_action( 'plugins_loaded', 'car_repair_services_elem_cpt_support' );
function car_repair_services_elem_cpt_support() {
	$cpt_support = get_option( 'elementor_cpt_support' );

	if ( ! $cpt_support ) {
		// First check if the option is not available already in the database. It not then create the array with all default post types including yours and save the settings.
		$cpt_support = array( 'page', 'post', 'car_services' );
		update_option( 'elementor_cpt_support', $cpt_support );
	} elseif ( ! in_array( 'car_services', $cpt_support ) ) {
		// If the option is available then just append the array and update the settings.
		$cpt_support[] = 'car_services';
		update_option( 'elementor_cpt_support', $cpt_support );
	}
}

// add_action( 'wp_loaded', 'envato_theme_license_dashboard_remove_js_composser_hook_core', 99 );
function envato_theme_license_dashboard_remove_js_composser_hook_core() {
	global $wp_filter;
	if ( isset( $wp_filter['upgrader_pre_download'] ) ) {
		if ( isset( $wp_filter['upgrader_pre_download']->callbacks[10] ) ) {
			foreach ( $wp_filter['upgrader_pre_download']->callbacks[10] as $key => $value ) {
				if ( strpos( $key, 'preUpgradeFilter' ) !== false ) {
					remove_filter( 'upgrader_pre_download', $key, 10, $wp_filter['upgrader_pre_download']->callbacks[10][ $key ]['accepted_args'] );
					break;
				}
			}
		}
	}
}


// add support link to the WP Toolbar
function car_repair_services_toolbar_link($wp_admin_bar) {
    $args = array(
        'id' => 'support_link',
        'title' => esc_html__('Theme Support & Documentation links','car-repair-services-core'), 
        'href' => home_url() . '/wp-admin/admin.php?page=envato-theme-license-support', 
        'meta' => array(
            'class' => 'sp_link', 
            'title' => esc_html__('Support','car-repair-services-core')
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'car_repair_services_toolbar_link', 999);