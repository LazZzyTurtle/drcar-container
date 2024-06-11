<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;

class CouponsCarousel extends Widget_Base {

	public function get_name() {
		return 'coupons_carousel';
	}

	public function get_title() {
		return __( 'Coupons Carousel', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'crs_section_coupns',
			array(
				'label' => __( 'Coupns', 'car-repair-services-core' ),
			)
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'date',
			array(
				'label'   => __( 'date', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Expires: 11/26/2019',
			)
		);

		$repeater->add_control(
			'currency_symbol',
			array(
				'label'   => __( 'Currency Symbol', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '$',
			)
		);

		$repeater->add_control(
			'currency_price',
			array(
				'label'   => __( 'Currency Price', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '25',
			)
		);

		$repeater->add_control(
			'currency_text',
			array(
				'label'   => __( 'Currency Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'off',
			)
		);
		$repeater->add_control(
			'type',
			array(
				'label'   => __( 'Type', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Repairs!',
			)
		);

		$repeater->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Our Latest Specials',
			)
		);

		$repeater->add_control(
			'sub_title',
			array(
				'label'   => __( 'Sub Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Any Servcie of $250 or More',
			)
		);

		$repeater->add_control(
			'featured',
			array(
				'label' => __( 'Featured', 'car-repair-services-core' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'item_list',
			array(
				'label'  => __( 'Item List', 'car-repair-services-core' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_carousel_options',
			array(
				'label' => __( 'Carousel Settings', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'slides_to_show',
			array(
				'label'              => __( 'How many Slides to show?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 3,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'slides_to_scroll',
			array(
				'label'              => __( 'How many Slides to Scroll?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 1,
				'frontend_available' => true,
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'       => __( 'Autoplay Slides', 'car-repair-services-core' ),
				'description' => __( 'Slide will start automatically', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'autoplay_speed',
			array(
				'label'              => __( 'Autoplay Speed', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 4000,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'arrows',
			array(
				'label'       => __( 'Enable Arrows', 'car-repair-services-core' ),
				'description' => __( 'Enable Arrows', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'off',
			)
		);

		$this->add_control(
			'dots',
			array(
				'label'       => __( 'Enable Dots', 'car-repair-services-core' ),
				'description' => __( 'Enable Dots', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();

		$slides_to_show   = $settings['slides_to_show'];
		$slides_to_scroll = $settings['slides_to_scroll'];
		$autoplay_speed   = $settings['autoplay_speed'];

		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = 'true';
		} else {
			$autoplay = 'false';
		}
		if ( $settings['arrows'] == 'yes' ) {
			$arrows = 'true';
		} else {
			$arrows = 'false';
		}
		if ( $settings['dots'] == 'yes' ) {
			$dots = 'true';
		} else {
			$dots = 'false';
		}

		?>
		<div class="block">
			<div class="container">
				<div class="wrapper-extra-01">
					<div class="js-slick-init slick-style01"  data-slick='{
						"slidesToShow": <?php echo $slides_to_show; ?>, 
						"slidesToScroll": <?php echo $slides_to_scroll; ?>,
						"dots": <?php echo $dots; ?>,
						"arrows": <?php echo $arrows; ?>,
						"autoplay": <?php echo $autoplay; ?>,
						"autoplaySpeed": <?php echo $autoplay_speed; ?>,
						"responsive":[{"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 576,"settings":{"slidesToShow": 1}}]}'>
		<?php
		if ( ! empty( $settings['item_list'] ) ) {
			foreach ( $settings['item_list'] as $item ) {
				$date            = $item['date'];
				$currency_symbol = $item['currency_symbol'];
				$currency_price  = $item['currency_price'];
				$currency_text   = $item['currency_text'];
				$type            = $item['type'];
				$title           = $item['title'];
				$sub_title       = $item['sub_title'];
				$featured        = $item['featured'];
				if ( $featured ) {
					$featured  = 'promo01';
					$btn_class = 'btn btn-border print-promo print-ele-link';
				} else {
					$featured  = 'promo01 colors-cheme-02';
					$btn_class = 'btn btn-border print-promo btn-invert print-ele-link';
				}
				?>
		<div class="item">
			<div class="<?php echo esc_attr( $featured ); ?>">
				<div class="promo01-header">
					<div class="text-01"><?php echo esc_html( $date ); ?></div>
					<div class="text-02"><span><?php echo esc_html( $currency_symbol ); ?></span> <?php echo esc_html( $currency_price ); ?> <?php echo esc_html( $currency_text ); ?></div>
					<div class="text-03"><?php echo esc_html( $type ); ?></div>
				</div>
				<div class="promo01-content">
					<div class="icon-separator">
						<i class="icon icon-1"></i>
					</div>
					<div class="text-01"><?php echo $title; ?></div>
					<div class="text-02"><?php echo $sub_title; ?></div>
					<a href="javascript:void(0)"  id="coupon_id" class="<?php echo esc_attr( $btn_class ); ?>"><span><?php echo esc_html__( 'Print Coupon', 'car-repair-services-core' ); ?></span></a>
				</div>
			</div>
		</div>
				<?php
			}
		}
		?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
