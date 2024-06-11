<?php
namespace CarRepairSerivces;

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.2.0
 */
class CarAddonsPlugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var CarAddonsPlugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return CarAddonsPlugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		// wp_enqueue_script( 'addons-slick', plugins_url( '/assets/js/slick.min.js', __FILE__ ), array( 'jquery' ), false, true );
		wp_enqueue_script( 'addons-custom', plugins_url( '/assets/js/addons-custom.js', __FILE__ ), array( 'jquery' ), time(), true );
		wp_enqueue_script( 'team-carousel', plugins_url( '/assets/js/team-carousel.js', __FILE__ ), array( 'jquery' ), time(), true );
		wp_enqueue_script( 'service-gallery', plugins_url( '/assets/js/service-gallery.js', __FILE__ ), array( 'jquery' ), time(), true );
		// wp_register_script('main-slider', plugins_url('/assets/js/main-slider.js', __FILE__), ['jquery'], false, true);
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once __DIR__ . '/widgets/slickslider.php';
		require_once __DIR__ . '/widgets/banner_under_slider.php';
		require_once __DIR__ . '/widgets/banner.php';
		require_once __DIR__ . '/widgets/banner-services.php';
		require_once __DIR__ . '/widgets/our-services.php';
		require_once __DIR__ . '/widgets/about-us.php';
		require_once __DIR__ . '/widgets/how-it-works.php';
		require_once __DIR__ . '/widgets/icon_thumb_box.php';
		require_once __DIR__ . '/widgets/testimonials.php';
		require_once __DIR__ . '/widgets/testimonials-1.php';
		require_once __DIR__ . '/widgets/safety_recalls.php';
		require_once __DIR__ . '/widgets/accordian.php';
		require_once __DIR__ . '/widgets/ActionButton.php';
		require_once __DIR__ . '/widgets/contact_form_7.php';
		require_once __DIR__ . '/widgets/counter_block.php';
		require_once __DIR__ . '/widgets/gallery.php';
		require_once __DIR__ . '/widgets/home_page_coupns.php';
		require_once __DIR__ . '/widgets/services.php';
		require_once __DIR__ . '/widgets/team_carousel.php';
		require_once __DIR__ . '/widgets/schedule_appointment.php';
		require_once __DIR__ . '/widgets/about-us-1.php';
		require_once __DIR__ . '/widgets/car-price-table.php';
		require_once __DIR__ . '/widgets/car-contact-page.php';
		require_once __DIR__ . '/widgets/car_featured_services.php';
		require_once __DIR__ . '/widgets/expert-service.php';
		require_once __DIR__ . '/widgets/car-faqs-two.php';
		require_once __DIR__ . '/widgets/car-price-slider.php';
		require_once __DIR__ . '/widgets/car-brands.php';
		require_once __DIR__ . '/widgets/car-estimate-form.php';
		require_once __DIR__ . '/widgets/icon-box.php';
		require_once __DIR__ . '/widgets/advantages-our-services.php';
		require_once __DIR__ . '/widgets/service-gallery.php';
		require_once __DIR__ . '/widgets/coupons-carousel.php';
		require_once __DIR__ . '/widgets/car-question-form.php';
		require_once __DIR__ . '/widgets/service-modal.php';
		require_once __DIR__ . '/widgets/additional-service.php';
		require_once __DIR__ . '/widgets/our-advantage.php';
		require_once __DIR__ . '/widgets/about-company.php';
		require_once __DIR__ . '/widgets/car-blog.php';

	}

	/**
	 * Register Widgets
	 *
	 * Register widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Slickslider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\BannerUnderSlider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Our_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\BannerServices() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\About_Us() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\How_It_Work() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\IconThumbBox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Testimonials() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Safety_Recalls() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Appointment_Schedule() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\About_Us_One() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Price() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Contact_Page() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Featured_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Expert_Service_Sec() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Testimonials_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Faqs_Two() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Price_Slider() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Brands() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Estimate_Form() );

		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Accordian() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Banner() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\CounterBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\HomePageCoupns() );

		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Services() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TeamCarousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_IconBox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Advantages_Our_Services() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ServiceGallery() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\CouponsCarousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Question_Form() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ServiceModal() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Additional_Service() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Our_Advantage() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\About_Company() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Car_Blogs() );

	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		// Register widget scripts
		// add_action( 'wp_footer', array( $this, 'widget_scripts' ) );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );
		// add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'widget_scripts' ) );
		// Register widgets
		add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
		
	}

}

// Instantiate Plugin Class
CarAddonsPlugin::instance();
