<?php
/**
 * Car-repair-services Services functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package car-repair-services
 */
if ( ! defined( 'CAR_REPAIR_SERVICES_THEME_URI' ) ) {
	define( 'CAR_REPAIR_SERVICES_THEME_URI', get_template_directory_uri() );
}
define( 'CAR_REPAIR_SERVICES_THEME_DIR', get_template_directory() );
define( 'CAR_REPAIR_SERVICES_CSS_URL', get_template_directory_uri() . '/css' );
define( 'CAR_REPAIR_SERVICES_JS_URL', get_template_directory_uri() . '/js' );
define( 'CAR_REPAIR_SERVICES_FONTS_URL', get_template_directory_uri() . '/fonts/font-awesome/css' );
define( 'CAR_REPAIR_SERVICES_IMG_URL', CAR_REPAIR_SERVICES_THEME_URI . '/images/' );
define( 'CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY', CAR_REPAIR_SERVICES_THEME_DIR . '/framework/' );
define( 'CAR_REPAIR_SERVICES_INC_DIRECTORY', CAR_REPAIR_SERVICES_THEME_DIR . '/inc/' );
define( 'CAR_REPAIR_SERVICES_VC_MAP', CAR_REPAIR_SERVICES_THEME_DIR . '/vc_element/' );

/*
default config variable
*/
$fonts_areas = array(
	'car_repair_services-body_typography',
	'car_repair_services-menu_typography',
	'car_repair_services-heading-1-typography',
	'car_repair_services-heading-2-typography',
	'car_repair_services-heading-3-typography',
	'car_repair_services-heading-4-typography',
	'car_repair_services-heading-5-typography',
	'car_repair_services-heading-6-typography',
	'car_repair_services-widget_title_typography',
);

/*
 * plugin.php has to load to know which plugin is active
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';

require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . 'plugin-list.php';

/*
 * Enable support TGM features.
 */
require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . 'class-tgm-plugin-activation.php';


/*
 * Load Theme Customizer.
 */
require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . 'framework_customizer.php';

/*
 * Redux framework configuration
 */

require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . 'redux.config.php';

/*
 * Enable support TGM configuration.
 */
require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . 'config.tgm.php';

require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . '/dashboard/class-dashboard.php';

/*
 * Load Menu Walker
 */

require_once CAR_REPAIR_SERVICES_FREAMWORK_DIRECTORY . 'nav_menu_walker.php';

/**
 * Implement the post meta.
 */
require get_template_directory() . '/inc/post_meta.php';


/**
 * Custom template tags for this theme.
 */
function template_tags_function() {
	 $car_repair_services = car_repair_services_options();
	$theme                = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';
	if ( $theme != '1' ) {
		include get_template_directory() . '/inc/template-tags-2.php';
	} else {
		include get_template_directory() . '/inc/template-tags.php';
	}
}

add_action( 'after_setup_theme', 'template_tags_function' );




/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


if ( ! function_exists( 'car_repair_services_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function car_repair_services_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Pool Services, use a find and replace
		* to change 'car-repair-services' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'car-repair-services', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'car-repair-services' ),
			)
		);
		/*
		* Enable support for custom-background.
		*/
		$defaults = array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => true,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $defaults );

		$defaults = array(
			'default-color'          => '',
			'default-image'          => '',
			'default-repeat'         => '',
			'default-position-x'     => '',
			'default-attachment'     => '',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		/*
		* Enable support for Post Formats.
		*/
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'gallery',
				'audio',
				'video',
				'link',
				'quote',
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		add_theme_support( 'responsive-embeds' );

		// Add custom thumb size
		set_post_thumbnail_size( 870, 491, false );
		add_image_size( 'car-repair-services-post-grid', 370, 411, true );
		add_image_size( 'car-repair-services-sidebar-post-img', 92, 85, true );
		add_image_size( 'car-repair-services-thumbnail-carousel', 390, 390, true );
		add_image_size( 'car-repair-services-thumbnail', 357, 242, true );
		add_image_size( 'car-repair-services-coupon', 570, 310, true );
		add_image_size( 'car-repair-services-gallery-thumbnail', 370, 370, true );
		add_image_size( 'car-repair-services-testimonial', 653, 235, true );
		add_image_size( 'car-repair-services-testimonial-2', 178, 179, true );
		add_image_size( 'car-repair-services-testimonial-grid', 63, 63, true );
		add_image_size( 'framework-service-icon-image', 63, 63, true );
	}
endif;
add_action( 'after_setup_theme', 'car_repair_services_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function car_repair_services_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'car_repair_services_content_width', 640 );
}
add_action( 'after_setup_theme', 'car_repair_services_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function car_repair_services_widgets_init() {
	$car_repair_services = car_repair_services_options();

	$theme = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'car-repair-services' ),
			'id'            => 'left_sideber',
			'description'   => esc_html__( 'Blog sidebar area', 'car-repair-services' ),
			'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
	if ( $theme != '1' ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Service Sidebar', 'car-repair-services' ),
				'id'            => 'service_sideber',
				'description'   => esc_html__( 'Service sidebar area', 'car-repair-services' ),
				'before_widget' => '<div class="%2$s widget block-aside" id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="block-aside__title">',
				'after_title'   => '</h4>',
			)
		);
	} else {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Contact Us', 'car-repair-services' ),
				'id'            => 'contact_us_sideber',
				'description'   => esc_html__( 'Contact Us area', 'car-repair-services' ),
				'before_widget' => '<div class="%2$s widget" id="%1$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="title-aside">',
				'after_title'   => '</h4>',
			)
		);
	}

	// add by tanvir

	register_sidebar(
		array(
			'name'          => esc_html__( 'Woo Shop Sidebar', 'car-repair-services' ),
			'id'            => 'woo_shop_sideber',
			'description'   => esc_html__( 'Shop sidebar area', 'car-repair-services' ),
			'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
	// end add by tanvir

	$car_repair_services_opt = car_repair_services_options();
	$widgetized_footer       = isset( $car_repair_services_opt['car_repair_services-widgetized_footer'] ) ? $car_repair_services_opt['car_repair_services-widgetized_footer'] : '0';
	if ( isset( $widgetized_footer ) && $widgetized_footer == '1' ) {
		$wid_footer_coloumn_num = $car_repair_services_opt['car_repair_services-wid_footer_style'];
	}

	if ( $widgetized_footer == 1 ) {
		for ( $i = 1; $i <= $wid_footer_coloumn_num; $i++ ) {
			register_sidebar(
				array(
					'name'          => esc_html__( 'Footer Column ' . $i, 'car-repair-services' ),
					'id'            => 'footer_col_' . $i,
					'description'   => esc_html__( 'Footer Column ' . $i, 'car-repair-services' ),
					'before_widget' => '<div class="%2$s side-block widget" id="%1$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h4 class="text-left ">',
					'after_title'   => '</h4>',
				)
			);
		}
	}
}

// add by tanvir

add_filter( 'loop_shop_columns', 'loop_columns' );
if ( ! function_exists( 'loop_columns' ) ) {
	function loop_columns() {
		if ( is_product() ) {
			return 4;
		} else {
			return 3;
		}

	}
}
if ( ! function_exists( 'woocommerce_get_sidebar' ) ) {
	function woocommerce_get_sidebar() {
		if ( is_product() ) {
		} else {
			dynamic_sidebar( 'woo_shop_sideber' );
		}

	}
}
if ( ! function_exists( 'woocommerce_pagination' ) ) {

	function woocommerce_pagination( $a = false ) {
		if ( ! $a ) {
			wc_get_template( 'loop/pagination.php' );
		} else {
			wc_get_template( 'loop/pagination-top.php' );
		}
	}
}

// end add by tanvir
add_action( 'widgets_init', 'car_repair_services_widgets_init' );

if ( ! function_exists( 'car_repair_service_get_options' ) ) {
	function car_repair_service_get_options() {
		global $car_repair_services_opt;
		return $car_repair_services_opt;
	}
}

function car_repair_services_options() {
	global $car_repair_services_opt;
	return $car_repair_services_opt;
}

/**
 * return redux options
 */
if ( ! function_exists( 'car_repair_get_options' ) ) {
	function car_repair_get_options() {
		global $car_repair_services_opt;
		return $car_repair_services_opt;
	}
}

/**
 * Enqueue scripts and styles.
 */

function car_repair_services_front_init_js_var() {
	global $yith_wcwl, $post, $product;

	wp_localize_script( 'car-repair-services-custom', 'THEMEURL', array( 'url' => CAR_REPAIR_SERVICES_THEME_URI ) );
	wp_localize_script( 'car-repair-services-custom', 'IMAGEURL', array( 'url' => CAR_REPAIR_SERVICES_THEME_URI . '/images' ) );
	wp_localize_script( 'car-repair-services-custom', 'CSSURL', array( 'url' => CAR_REPAIR_SERVICES_THEME_URI . '/css' ) );
}
add_action( 'wp_enqueue_scripts', 'car_repair_services_front_init_js_var', 1001 );


function car_repair_services_scripts_styles() {
	 wp_enqueue_style( 'car-repair-services-google-fonts', car_repair_services_add_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'car_repair_services_scripts_styles' );

function car_repair_services_add_google_font() {
	$car_repair_services_opt = car_repair_services_options();
	$enable_typography       = isset( $car_repair_services_opt['enable_typography'] ) ? $car_repair_services_opt['enable_typography'] : '0';

	global $fonts_areas;
	// Load styles
	if ( $enable_typography != '1' ) {
		$protocol   = is_ssl() ? 'https' : 'http';
		$subsets    = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
		$variants   = ':300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$query_args = array(
			'family' => 'Roboto|Poppins' . $variants,
			'family' => 'Roboto' . $variants . '%7CPoppins' . $variants,
			'subset' => $subsets,
		);
		$font_url   = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );
		return $font_url;

	} else {

		$font_families = array();
		foreach ( $fonts_areas as $option ) {

			if ( isset( $car_repair_services_opt[ $option ]['font-family'] )
				&& $car_repair_services_opt[ $option ]['font-family']
			) {
				$font_families[] = $car_repair_services_opt[ $option ]['font-family'];
				if ( isset( $car_repair_services_opt[ $option ]['subsets'] ) && $car_repair_services_opt[ $option ]['subsets'] != '' ) {
					$font_subsets[] = $car_repair_services_opt[ $option ]['subsets'];
				}
				if ( isset( $car_repair_services_opt[ $option ]['font-weight'] ) && $car_repair_services_opt[ $option ]['font-weight'] != '' ) {
					$font_variants[] = $car_repair_services_opt[ $option ]['font-weight'];
				}
			}
		}
		$font_families = array_unique( $font_families );
		if ( ! empty( $font_families ) ) {
			$protocol = is_ssl() ? 'https:' : 'http:';

			if ( ! empty( $font_variants ) ) {
				$variants = ':' . implode( ',', $font_variants );
			} else {
				$variants = '';
			}
			if ( ! empty( $font_subsets ) ) {
				$subsets = implode( ',', $font_subsets );
			} else {
				$subsets = '';
			}

			if ( ! empty( $font_families ) ) {
				$font_families = implode( '|', $font_families );
			}
			if ( $subsets != '' ) {
				$query_args = array(
					'family' => urlencode( $font_families . $variants ),
					'subset' => urlencode( $subsets ),
				);
			} else {
				$query_args = array(
					'family' => urlencode( $font_families . $variants ),
				);
			}

			$font_url = add_query_arg( $query_args, $protocol . '//fonts.googleapis.com/css' );
			return $font_url;
		}
	}
}

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'car_repair_services_scripts', 10000 );

function car_repair_services_scripts() {
	$car_repair_services = car_repair_services_options();

	$theme = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

	/*
	===============================================================
	* CSS Files
	* --------------------------------------------------------------- */

	/* BOOTSTRAP  ------------------------- */

	wp_enqueue_style( 'bootstrap', CAR_REPAIR_SERVICES_CSS_URL . '/plugins/bootstrap.min.css', '', null );
	wp_enqueue_style( 'bootstrap-submenu', CAR_REPAIR_SERVICES_CSS_URL . '/plugins/bootstrap-submenu.css', '', null );
	wp_enqueue_style( 'animate', CAR_REPAIR_SERVICES_CSS_URL . '/plugins/animate.min.css', '', null );
	wp_enqueue_style( 'slick', CAR_REPAIR_SERVICES_CSS_URL . '/plugins/slick.css', '', null );

	wp_enqueue_style( 'bootstrap-datetimepicker', CAR_REPAIR_SERVICES_CSS_URL . '/plugins/bootstrap-datetimepicker.css', '', null );
	wp_enqueue_style( 'iconfont-style', CAR_REPAIR_SERVICES_THEME_URI . '/iconfont/style.css', '', null );
	wp_enqueue_style( 'magnific-popup', CAR_REPAIR_SERVICES_THEME_URI . '/css/plugins/magnific-popup.css', '', null );
	wp_enqueue_style( 'scrolling-tabs', CAR_REPAIR_SERVICES_THEME_URI . '/css/plugins/jquery.scrolling-tabs.css', '', null );
	wp_enqueue_style( 'twentytwenty', CAR_REPAIR_SERVICES_THEME_URI . '/css/plugins/twentytwenty.css', '', null );
	wp_enqueue_style( 'perfect-scrollbar', CAR_REPAIR_SERVICES_THEME_URI . '/css/plugins/perfect-scrollbar.css', '', null );
	wp_enqueue_style( 'nouislider', CAR_REPAIR_SERVICES_THEME_URI . '/css/plugins/nouislider.css', '', null );

	if ( $theme != '1' ) {
		wp_enqueue_style( 'shopcss', CAR_REPAIR_SERVICES_THEME_URI . '/css/shop-2.css', '', time(), null );
		wp_enqueue_style( 'car-repair-services-style', CAR_REPAIR_SERVICES_THEME_URI . '/style-2.css', '', time(), null );
		include_once CAR_REPAIR_SERVICES_THEME_DIR . '/css/custom_style-2.php';
		wp_enqueue_style( 'car-repair-services-wp-default-norm', CAR_REPAIR_SERVICES_CSS_URL . '/wp-default-norm-2.css', '', null );
	} else {
		wp_enqueue_style( 'shopcss', CAR_REPAIR_SERVICES_THEME_URI . '/css/shop.css', '', null );
		wp_enqueue_style( 'car-repair-services-style', get_stylesheet_uri() );
		include_once CAR_REPAIR_SERVICES_THEME_DIR . '/css/custom_style.php';
		wp_enqueue_style( 'car-repair-services-wp-default-norm', CAR_REPAIR_SERVICES_CSS_URL . '/wp-default-norm.css', '', null );
	}

	$car_repair_services_custom_inline_style = '';

	if ( function_exists( 'car_repair_services_get_custom_styles' ) ) {
		$car_repair_services_custom_inline_style = car_repair_services_get_custom_styles();
	}

	wp_add_inline_style( 'car-repair-services-style', $car_repair_services_custom_inline_style );

	/*
	===============================================================
	* JS Files
	* --------------------------------------------------------------- */

	wp_enqueue_script( 'bootstrap', CAR_REPAIR_SERVICES_JS_URL . '/plugins/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'slick', CAR_REPAIR_SERVICES_JS_URL . '/plugins/slick.min.js', array( 'jquery' ), '', true );

	// wp_enqueue_script( 'jquery-form', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.form.js', array( 'jquery' ), '', true );
	$car_repair_services_opt = car_repair_services_options();

	wp_enqueue_script( 'moment', CAR_REPAIR_SERVICES_JS_URL . '/plugins/moment.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap-datetimepicker', CAR_REPAIR_SERVICES_JS_URL . '/plugins/bootstrap-datetimepicker.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'jquery-countTo', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.countTo.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'magnific-popup', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'imagesloaded-pkg', CAR_REPAIR_SERVICES_JS_URL . '/plugins/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );
	wp_register_script( 'isotope-pkgd', CAR_REPAIR_SERVICES_JS_URL . '/plugins/isotope.pkgd.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'scrolling-tabs', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.scrolling-tabs.min.js', array( 'jquery' ), '', true );

	wp_enqueue_script( 'jquery-ui-spinner', false, array( 'jquery' ) );

	wp_register_script( 'waypoints', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.waypoints.min.js', array( 'jquery' ), '', true );

	if ( isset( $car_repair_services_opt['car_repair_services-js_for_calender_lang'] ) && $car_repair_services_opt['car_repair_services-js_for_calender_lang'] != '' ) {
		wp_enqueue_script( 'forms-lang', $car_repair_services_opt['car_repair_services-js_for_calender_lang'], array( 'jquery' ), '', true );
	}
	wp_enqueue_script( 'forms', CAR_REPAIR_SERVICES_JS_URL . '/forms.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-event-move', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.event.move.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-twentytwenty', CAR_REPAIR_SERVICES_JS_URL . '/plugins/jquery.twentytwenty.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'perfect-scrollbar', CAR_REPAIR_SERVICES_JS_URL . '/plugins/perfect-scrollbar.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'nouislider-js', CAR_REPAIR_SERVICES_JS_URL . '/plugins/nouislider.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'panelmenu', CAR_REPAIR_SERVICES_JS_URL . '/plugins/panelmenu.js', array( 'jquery' ), '', true );

	$datetimearray = array(
		'today'           => esc_html__( 'Go to today', 'car-repair-services' ),
		'clear'           => esc_html__( 'Clear selection', 'car-repair-services' ),
		'close'           => esc_html__( 'Close the picker', 'car-repair-services' ),
		'selectMonth'     => esc_html__( 'Select Month', 'car-repair-services' ),
		'prevMonth'       => esc_html__( 'Previous Month', 'car-repair-services' ),
		'nextMonth'       => esc_html__( 'Next Month', 'car-repair-services' ),
		'selectYear'      => esc_html__( 'Select Year', 'car-repair-services' ),
		'prevYear'        => esc_html__( 'Previous Year', 'car-repair-services' ),
		'nextYear'        => esc_html__( 'Next Year', 'car-repair-services' ),
		'selectDecade'    => esc_html__( 'Select Decade', 'car-repair-services' ),
		'prevDecade'      => esc_html__( 'Previous Decade', 'car-repair-services' ),
		'nextDecade'      => esc_html__( 'Next Decade', 'car-repair-services' ),
		'prevCentury'     => esc_html__( 'Previous Century', 'car-repair-services' ),
		'nextCentury'     => esc_html__( 'Next Century', 'car-repair-services' ),
		'pickHour'        => esc_html__( 'Pick Hour', 'car-repair-services' ),
		'incrementHour'   => esc_html__( 'Increment Hour', 'car-repair-services' ),
		'decrementHour'   => esc_html__( 'Decrement Hour', 'car-repair-services' ),
		'pickMinute'      => esc_html__( 'Pick Minute', 'car-repair-services' ),
		'incrementMinute' => esc_html__( 'Increment Minute', 'car-repair-services' ),
		'decrementMinute' => esc_html__( 'Decrement Minute', 'car-repair-services' ),
		'pickSecond'      => esc_html__( 'Pick Second', 'car-repair-services' ),
		'incrementSecond' => esc_html__( 'Increment Second', 'car-repair-services' ),
		'decrementSecond' => esc_html__( 'Decrement Second', 'car-repair-services' ),
		'togglePeriod'    => esc_html__( 'Toggle Period', 'car-repair-services' ),
		'selectTime'      => esc_html__( 'Select Time', 'car-repair-services' ),
	);
	$datetimearray = apply_filters( 'car_repair_services_date_time_picker_tooltip_object', $datetimearray );
	wp_localize_script( 'forms', 'tooltip_object', $datetimearray );
	$modal_date_format = isset( $car_repair_services_opt['modal_date_format'] ) ? $car_repair_services_opt['modal_date_format'] : '';
	wp_localize_script( 'forms', 'form_option', array( 'date_format' => $modal_date_format ) );

	if ( $theme != '1' ) {
		wp_enqueue_script( 'custom', CAR_REPAIR_SERVICES_JS_URL . '/custom-2.js', array( 'jquery', 'jquery-ui-spinner', 'isotope-pkgd' ), time(), true );
	} else {
		wp_enqueue_script( 'custom', CAR_REPAIR_SERVICES_JS_URL . '/custom.js', array( 'jquery', 'jquery-ui-spinner', 'isotope-pkgd' ), time(), true );
	}
	$site_preloader_timeout = isset( $car_repair_services_opt['car_repair_services-site-preloader-timeout'] ) ? $car_repair_services_opt['car_repair_services-site-preloader-timeout'] : '';
	wp_localize_script(
		'custom',
		'ajax_object',
		array(
			'ajax_nonce_cart'        => wp_create_nonce( 'remove_cart' ),
			'ajax_nonce_post'        => wp_create_nonce( 'more_post' ),
			'ajax_nonce_coupon'      => wp_create_nonce( 'coupon_popup' ),
			'ajax_nonce_testimonial' => wp_create_nonce( 'testimonial_more' ),
			'ajax_nonce_gallery'     => wp_create_nonce( 'gallery_more' ),
			'ajax_url'               => esc_url( admin_url( 'admin-ajax.php' ) ),
			'loader_img'             => CAR_REPAIR_SERVICES_IMG_URL . 'ajax-loader.gif',
			'site_preloader_timeout' => $site_preloader_timeout,
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function car_add_editor_styles() {
	add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'car_add_editor_styles' );


function car_repair_services_add_google_font_admin() {
	wp_enqueue_style( 'car-repair-services-google-fonts-admin', car_repair_services_build_google_font(), array(), null );
}
add_action( 'admin_enqueue_scripts', 'car_repair_services_add_google_font_admin' );

function car_repair_services_build_google_font() {
	$protocol   = is_ssl() ? 'https:' : 'http:';
	$subsets    = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
	$query_args = array(
		'family' => urlencode( 'Muli:400,500,600,700' ),
	);
	$font_url   = add_query_arg( $query_args, $protocol . '//fonts.googleapis.com/css' );
	return $font_url;
}
function car_slug_scripts_styles() {
	wp_enqueue_style( 'car-theme-block-styles', get_theme_file_uri( 'css/all-block.css' ), false, '1.0', 'all' );
}
add_action( 'admin_enqueue_scripts', 'car_slug_scripts_styles' );

function car_repair_services_admin_enqueue() {
	wp_enqueue_script( 'car-repair-services-custom-admin', get_template_directory_uri() . '/js/admin.js' );
}
add_action( 'admin_enqueue_scripts', 'car_repair_services_admin_enqueue' );

add_action( 'car_repair_services_breadcrumb', 'car_repair_services_breadcrumb' );
function car_repair_services_breadcrumb() {
	 global $post, $car_repair_services_opt;

	if ( ! isset( $post->ID ) ) {
		return false;
	}

	$theme = isset( $car_repair_services_opt['theme_setting'] ) && $car_repair_services_opt['theme_setting'] == '1';

	if ( $theme != '1' ) {
		if ( ! is_front_page() || is_home() ) {
			if ( ( isset( $post->post_type ) && is_page() ) || is_search() || is_home() || is_single() || is_archive() || is_category() ) {
				$show_breadcrumb = 'on';
				if ( $show_breadcrumb == 'on' || ! $show_breadcrumb ) {
					?>
					<div class="breadcrumbs">
						<div class="breadcrumb">
							<?php
							if ( function_exists( 'yoast_breadcrumb' ) ) {
								yoast_breadcrumb( '', '' );
							}
							?>
						</div>
					</div>
					<?php
				}
			}
		}
	} else {
		if ( ! is_front_page() || is_home() ) {
			if ( ( isset( $post->post_type ) && is_page() ) || is_search() || is_home() || is_single() || is_archive() || is_category() ) {
				$show_breadcrumb = 'on';
				if ( $show_breadcrumb == 'on' || ! $show_breadcrumb ) {
					?>
					<div class="container">
						<div class="breadcrumbs">
						<?php
						if ( function_exists( 'yoast_breadcrumb' ) ) {
							yoast_breadcrumb( '', '' );
						}
						?>
						</div>
					</div>
					<?php
				}
			}
		}
	}
}

if ( ! function_exists( 'car_repair_comment_nav' ) ) :

	function car_repair_comment_nav() {
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			?>
			<nav class="navigation comment-navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'car-repair-services' ); ?></h2>
				<div class="nav-links">
					<?php
					if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'car-repair-services' ) ) ) :
						printf( '<div class="nav-previous">%s</div>', $prev_link );
					endif;

					if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'car-repair-services' ) ) ) :
						printf( '<div class="nav-next">%s</div>', $next_link );
					endif;
					?>
				</div><!-- .nav-links -->
			</nav><!-- .comment-navigation -->
			<?php
		endif;
	}
endif;

add_action( 'car_repair_services_header_loader', 'car_repair_services_header_loader_function' );

if ( ! function_exists( 'car_repair_services_header_loader_function' ) ) {
	function car_repair_services_header_loader_function() {
		$car_repair_services = car_repair_services_options();

		if ( isset( $car_repair_services['car_repair_services-site-preloader'] ) && $car_repair_services['car_repair_services-site-preloader'] ) {
			if ( isset( $car_repair_services['car_repair_services-site-preloader-image'] ) && $car_repair_services['car_repair_services-site-preloader-image']['url'] != '' ) {
				?>
				<div id="loader-wrapper">
					<div class="loader custom-loader">
						<img src="<?php echo esc_url( $car_repair_services['car_repair_services-site-preloader-image']['url'] ); ?>">
					</div>
				</div>
				<?php
			} else {
				?>
				<div id="loader-wrapper">
					<div class="loader">
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
						<div class="line"></div>
						<div class="subline"></div>
						<div class="subline"></div>
						<div class="subline"></div>
						<div class="subline"></div>
						<div class="subline"></div>
						<div class="loader-circle-1">
							<div class="loader-circle-2"></div>
						</div>
						<div class="needle"></div>
						<div class="loading"><?php esc_html_e( 'Loading', 'car-repair-services' ); ?></div>
					</div>
				</div>
				<?php
			}
		}
	}
}

/*
 * ****************************************************************
 * Ajax Posts loading
 * ***************************************************************** */

function car_repair_services_testimonial_more_post_ajax() {
	 check_ajax_referer( 'testimonial_more', 'security' );
	// WP_Query arguments
	$args  = array(
		'posts_per_page' => sanitize_text_field( $_POST['post_per_page'] ),
		'post_type'      => 'car-testimonial',
		'orderby'        => 'DESC',
		'paged'          => sanitize_text_field( $_POST['paged'] ),
		'no_found_rows'  => true,
	);
	$style = sanitize_text_field( $_POST['grid_style'] );
	// The Query
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			global $post;
			$post->style = $style;
			get_template_part( 'template-parts/testimonial' );
		}
	} else {
		// no posts found
	}
	// Restore original Post Data
	wp_reset_postdata();
	die();
}
add_action( 'wp_ajax_testimonial_more_post_ajax', 'car_repair_services_testimonial_more_post_ajax' );
add_action( 'wp_ajax_nopriv_testimonial_more_post_ajax', 'car_repair_services_testimonial_more_post_ajax' );

function car_repair_services_gallery_more_post_ajax() {
	 check_ajax_referer( 'gallery_more', 'security' );
	// WP_Query arguments
	$args  = array(
		'posts_per_page' => sanitize_text_field( $_POST['post_per_page'] ),
		'post_type'      => 'gallery',
		'orderby'        => 'DESC',
		'paged'          => sanitize_text_field( $_POST['paged'] ),
		'no_found_rows'  => true,
	);
	$style = sanitize_text_field( $_POST['grid_style'] );
	// The Query
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			global $post;
			$post->style = $style;
			get_template_part( 'template-parts/gallery' );
		}
	} else {
		// no posts found
	}
	// Restore original Post Data
	wp_reset_postdata();
	die();
}
add_action( 'wp_ajax_gallery_more_post_ajax', 'car_repair_services_gallery_more_post_ajax' );
add_action( 'wp_ajax_nopriv_gallery_more_post_ajax', 'car_repair_services_gallery_more_post_ajax' );

function car_repair_services_coupon_popup_ajax() {
	check_ajax_referer( 'coupon_popup', 'security' );
	$post_id             = sanitize_text_field( $_POST['post_id'] );
	$coupon_top_left     = get_post_meta( $post_id, 'framework-coupon-top-left', true );
	$coupon_top_right    = get_post_meta( $post_id, 'framework-coupon-top-right', true );
	$coupon_bottom_left  = get_post_meta( $post_id, 'framework-coupon-bottom-left', true );
	$coupon_bottom_right = get_post_meta( $post_id, 'framework-coupon-bottom-right', true );
	?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?php echo esc_html__( 'Coupon', 'car-repair-services' ); ?></h4>
				</div>
				<div class="modal-body" id="modal-coupon">
					<div>
						<div class="coupon-print">
							<div class="coupon-print-inside">
								<div class="coupon-print-row-top">
									<div class="coupon-print-col-left">
										<i><?php echo esc_html( $coupon_top_left ); ?> </i>
									</div>
									<div class="coupon-print-col-right">
										<div class="contact-info"><i class="icon icon-locate"></i>
										 <?php echo esc_html( $coupon_top_right ); ?>
										</div>
									</div>
								</div>
								<?php echo get_the_post_thumbnail( $post_id, 'car-repair-services-coupon', array( 'class' => 'img-responsive-inline' ) ); ?>
								<div class="coupon-print-row-bot">
									<div class="coupon-print-col-left">
										<?php echo esc_html( $coupon_bottom_left ); ?>
									</div>
									<div class="coupon-print-col-right text-right">
										<?php echo esc_html( $coupon_bottom_right ); ?>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</div>
				<div class="modal-footer">
					<button type="button" id="btn_save_close" class="btn btn-default" data-dismiss="modal"><?php echo esc_html__( 'Close', 'car-repair-services' ); ?></button>
					<button id="btn_save_and_close" type="button" class="btn btn-primary"><?php echo esc_html__( 'Print', 'car-repair-services' ); ?> </button>
				</div>
			</div>
		</div>
	</div>
	<?php
	exit();
}
add_action( 'wp_ajax_coupon_popup_ajax', 'car_repair_services_coupon_popup_ajax' );
add_action( 'wp_ajax_nopriv_coupon_popup_ajax', 'car_repair_services_coupon_popup_ajax' );

function woocommerce_template_loop_product_title() {
	echo '<h3 class="woocommerce-loop-product__title">' . get_the_title() . '</h3>';
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
		woocommerce_upsell_display( 4, 4 ); // Display 4 products in rows of 4
	}
}

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_cart_collaterals', 'woocommerce_output_cross_sell_display', 15 );

if ( ! function_exists( 'woocommerce_output_cross_sell_display' ) ) {
	function woocommerce_output_cross_sell_display() {
		woocommerce_cross_sell_display( 2, 2 ); // Display 4 products in rows of 4
	}
}
function woocommerce_remove_action() {
	$car_repair_services = car_repair_services_options();
	$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';
	if ( $theme != '1' ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	}
}
add_action( 'after_setup_theme', 'woocommerce_remove_action' );

add_action( 'after_setup_theme', 'car_repair_services_view_product_design' );
function car_repair_services_view_product_design() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

function woocommerce_template_loop_add_to_cart( $args = array() ) {
	 global $product;

	if ( $product ) {
		$defaults = array(
			'quantity' => 1,
			'class'    => implode(
				' ',
				array_filter(
					array(
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
					)
				)
			),
		);

		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

		wc_get_template( 'loop/add-to-cart.php', $args );
	}
}

function car_repair_services_add_to_cart_fragment( $fragments ) {
	ob_start();
	$count = WC()->cart->cart_contents_count;
	?>
	<a class="cart-contents icon icon-shop-cart" href="<?php echo esc_js( 'javascript:void(0)' ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'car-repair-services' ); ?>">
	<?php
	if ( $count > 0 ) {
		?>
		<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
		<?php
	}
	?>
	</a>
	<?php
	$fragments['a.cart-contents'] = ob_get_clean();
	$output                       = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'car_repair_services_add_to_cart_fragment' );
add_filter( 'woocommerce_add_to_cart_fragments', 'car_repair_services_add_to_cart_fragment_details' );

function car_repair_services_add_to_cart_fragment_details( $fragments ) {
	ob_start();
	?>
	<div class="header-cart-dropdown">
	<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
	</div>
	<?php
	$fragments['div.header-cart-dropdown'] = ob_get_clean();
	$output                                = ob_get_clean();
	return $fragments;

}

function woocommerce_widget_shopping_cart_button_view_cart() {
	echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-md btn-invert btn-full wc-forward"><span>' . esc_html__( 'View cart', 'car-repair-services' ) . '</span></a>';
}

function woocommerce_widget_shopping_cart_proceed_to_checkout() {
	echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="btn btn-md btn-invert btn-full checkout wc-forward"><span>' . esc_html__( 'Checkout', 'car-repair-services' ) . '</span></a>';
}

function car_repair_services_remove_item_from_cart() {
	$cart         = WC()->instance()->cart;
	$id           = sanitize_text_field( $_POST['product_id'] );
	$cart_id      = $cart->generate_cart_id( $id );
	$cart_item_id = $cart->find_product_in_cart( $cart_id );
	$array        = array();
	if ( $cart_item_id ) {
		$cart->set_quantity( $cart_item_id, 0 );
		WC_AJAX::get_refreshed_fragments();
	} else {
		$array['error'] = true;
		echo json_encode( $array );

	}

	exit();
}
add_action( 'wp_ajax_remove_item_from_cart', 'car_repair_services_remove_item_from_cart' );
add_action( 'wp_ajax_nopriv_remove_item_from_cart', 'car_repair_services_remove_item_from_cart' );


if ( ! function_exists( 'car_repair_services_loop_shop_per_page' ) ) {
	function car_repair_services_loop_shop_per_page( $cols ) {
		$cols = 9;
		return $cols;
	}
}

add_filter( 'loop_shop_per_page', 'car_repair_services_loop_shop_per_page', 20 );
// Display Update car Added success massage.
add_filter( 'wc_add_to_cart_message_html', 'car_repair_services_wc_add_to_cart_message_html_func', 10, 2 );
function car_repair_services_wc_add_to_cart_message_html_func( $message, $product_id ) {
	$message = preg_replace( '#<a.*?>([^>]*)</a>#i', '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-invert wc-forward"><span>' . esc_html__( 'View cart', 'car-repair-services' ) . '</span></a>', $message );
	return $message;
}

// Display Update car Added Error massage.
add_filter( 'woocommerce_add_error', 'car_repair_services_add_error' );
function car_repair_services_add_error( $error ) {
	$error = preg_replace( '#<a.*?>([^>]*)</a>#i', '<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn btn-invert wc-forward"><span>' . esc_html__( 'View cart', 'car-repair-services' ) . '</span></a>', $error );
	return $error;
}

function car_repair_services_more_post_ajax() {
	 check_ajax_referer( 'more_post', 'security' );
	if ( isset( $_POST['pageNumber'] ) ) {
		$pageNumber = sanitize_text_field( $_POST['pageNumber'] );
	} else {
		$pageNumber = '';
	};
	if ( isset( $_POST['post_per_load'] ) ) {
		$posts_per_page = sanitize_text_field( $_POST['post_per_load'] );
	} else {
		$posts_per_page = '';
	};
	// WP_Query arguments
	$args = array(
		'post_type'      => array( 'post' ),
		'post_status'    => array( 'publish' ),
		'nopaging'       => false,
		'paged'          => $pageNumber,
		'posts_per_page' => $posts_per_page,
	);

	// The Query
	$query      = new WP_Query( $args );
	$post_count = $query->found_posts;
	$nextPost   = '';

	if ( ceil( $post_count / $posts_per_page ) == $pageNumber || $post_count == 0 ) {
		$nextPost = 'blank';
	}

	ob_start();
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part( 'template-parts/content', get_post_format() );
		}
	} else {
		// no posts found
	}
	$output      = ob_get_clean();
	$resultArray = array(
		'html'  => $output,
		'count' => $nextPost,
	);
	echo json_encode( $resultArray );
	// Restore original Post Data
	wp_reset_postdata();
	die();
}
add_action( 'wp_ajax_car_repair_services_more_post_ajax', 'car_repair_services_more_post_ajax' );
add_action( 'wp_ajax_nopriv_car_repair_services_more_post_ajax', 'car_repair_services_more_post_ajax' );

function car_repair_services_add_editor_styles() {
	add_editor_style( CAR_REPAIR_SERVICES_CSS_URL . '/editor-style.css' );
}
add_action( 'admin_init', 'car_repair_services_add_editor_styles' );

function car_repair_services_mime_types( $mimes ) {
	 $mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'car_repair_services_mime_types' );

function car_repair_services_the_content_more_link( $more ) {
	global $post;
	$car_repair_services = car_repair_services_options();
	if ( isset( $car_repair_services['car_repair_services_blog_type_style'] ) && $car_repair_services['car_repair_services_blog_type_style'] == '2' ) {
		return ' <a class="btn btn-border" href="' . get_permalink( $post->ID ) . '">' . esc_html__( 'Continue Reading', 'car-repair-services' ) . '</a>';
	} else {
		return ' <a class="more-link" href="' . get_permalink( $post->ID ) . '">' . esc_html__( 'Continue Reading', 'car-repair-services' ) . '</a>';
	}
}
add_filter( 'the_content_more_link', 'car_repair_services_the_content_more_link' );

add_action( 'vc_before_init', 'car_repair_services_vcsetsstheme' );
function car_repair_services_vcsetsstheme() {
	vc_set_as_theme();
}

// comment field change function
add_filter( 'comment_form_fields', 'car_repair_services_move_comment_field_to_bottom' );
function car_repair_services_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	unset( $fields['cookies'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

if ( ! function_exists( 'car_repair_service_archive_to_custom_archive' ) ) {
	function car_repair_service_archive_to_custom_archive() {
		$car_repair_services = car_repair_services_options();
		if ( isset( $car_repair_services['car_repair_services-slug_postype_services_archive'] ) && ! empty( $car_repair_services['car_repair_services-slug_postype_services_archive'] ) ) {

			if ( is_post_type_archive( 'car_services' ) ) {
				wp_redirect( home_url( '/' . $car_repair_services['car_repair_services-slug_postype_services_archive'] . '/' ), 301 );
				exit();
			}
		}
	}
}
add_action( 'template_redirect', 'car_repair_service_archive_to_custom_archive' );

if ( ! function_exists( 'car_repair_service_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */

	function car_repair_service_register_elementor_locations( $elementor_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'car_repair_service_theme_register_elementor_locations', array( true ), '2.0', 'car_repair_service_register_elementor_locations' );
		if ( apply_filters( 'car_repair_service_register_elementor_locations', $hook_result ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'car_repair_service_register_elementor_locations' );
