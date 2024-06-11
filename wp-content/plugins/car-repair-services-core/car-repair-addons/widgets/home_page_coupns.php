<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Widget_Base;

class HomePageCoupns extends Widget_Base {

	public function get_name() {
		return 'home_page_coupns';
	}

	public function get_title() {
		return __( 'Home Page Coupns', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return array( 'car-repair-services-core' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'crs_section_home_page_coupns',
			array(
				'label' => __( 'Home Page Coupns', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'top_title',
			array(
				'label'   => __( 'Top Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Coupons from',
			)
		);

		$this->add_control(
			'currency_symbol',
			array(
				'label'   => __( 'Currency Symbol', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '$',
			)
		);

		$this->add_control(
			'currency_price',
			array(
				'label'   => __( 'Currency Price', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '25',
			)
		);

		$this->add_control(
			'currency_text',
			array(
				'label'   => __( 'Currency Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'off',
			)
		);
		$this->add_control(
			'type',
			array(
				'label'   => __( 'Type', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Repairs!',
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Our Latest Specials',
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'   => __( 'Sub Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Any Servcie of $250 or More',
			)
		);

		$this->add_control(
			'link',
			array(
				'label'   => __( 'Link', 'car-repair-services-core' ),
				'type'    => Controls_Manager::URL,
				'default' =>
				array(
					'url'         => 'http://',
					'is_external' => '',
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings        = $this->get_settings();
		$top_title      = $settings['top_title'];
		$currency_symbol = $settings['currency_symbol'];
		$currency_price  = $settings['currency_price'];
		$currency_text   = $settings['currency_text'];
		$type     = $settings['type'];
		$title           = $settings['title'];
		$sub_title       = $settings['sub_title'];
		$link            = $settings['link']['url'];
		?>

		<div class="tt-box-custom01">
			<div class="promo01">
				<div class="promo01-header">
					<div class="text-01"><?php echo esc_html( $top_title ); ?></div>
					<div class="text-02"><span><?php echo esc_html( $currency_symbol ); ?></span> <?php echo esc_html( $currency_price ); ?> <?php echo esc_html( $currency_text ); ?></div>
					<div class="text-03"><?php echo esc_html( $type ); ?></div>
				</div>
				<div class="promo01-content">
					<div class="icon-separator">
						<i class="icon icon-1"></i>
					</div>
					<div class="text-01"><?php echo $title; ?></div>
					<div class="text-02"><?php echo $sub_title; ?></div>
					<a href="<?php echo esc_url( $link ); ?>" class="btn btn-border"><span><?php esc_html_e( 'See All Сoupons', 'car-repair-services-core' ); ?></span></a>
				</div>
			</div>
		</div>

		<?php
	}
}
