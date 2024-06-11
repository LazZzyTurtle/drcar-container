<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Plugin;
use Elementor\Group_Control_Typography;

class About_Us extends Widget_Base {

	public function get_name() {
		return 'about_us';
	}

	public function get_title() {
		return __( 'About Us', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'car-repair-services-core' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'image',
			array(
				'label' => __( 'Image', 'car-repair-services-core' ),
				'type'  => Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'tablet_image',
			array(
				'label' => __( 'Image For Tablet', 'car-repair-services-core' ),
				'type'  => Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __(
					'Quality Service and
                Customer <span class="color">Satisfaction!</span>',
					'car-repair-services-core'
				),
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Sub Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => 'Our service facility is independently owned and operated providing full-service repair and maintenance services. We use the latest diagnostic equipment to guarantee your vehicle is repaired or serviced properly and in a timely fashion. We are a member of Professional Auto Service, an elite performance network, where independent service facilities share common goals of being world-class automotive service centers.',
			)
		);
		$this->add_control(
			'content',
			array(
				'label'       => __( 'Content', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
			)
		);
		$this->add_control(
			'coupon',
			array(
				'label'       => __( 'Coupon', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => get_elementor_library(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'text_style_section',
			array(
				'label' => __( 'Text Style', 'car-repair-services-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_title_typography',
				'label'    => __( 'Sub Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} p',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .wrapper-parallax-left .col-description',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings            = $this->get_settings_for_display();
		$car_pluginElementor = Plugin::instance();

		$image_url    = ( $settings['image']['id'] != '' ) ? wp_get_attachment_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$tablet_image = ( $settings['tablet_image']['id'] != '' ) ? wp_get_attachment_image( $settings['tablet_image']['id'], 'full' ) : $settings['tablet_image']['url'];

		?>
		<div class="block">
			<div class="container container-tablet-md no-indent">
				<div class="wrapper-parallax-left">
					<div class="col-img">
						<div class="parallax-img">
							<img src="<?php echo esc_url( $image_url ); ?>" class="js-init-parallax" data-orientation="up" data-overflow="false" data-scale="1.4" alt="">
						</div>
						<div class="img-tablet">
								<?php
								if ( wp_http_validate_url( $tablet_image ) ) {
									?>
									<img src="<?php echo esc_url( $tablet_image ); ?>" alt="<?php esc_html__( 'Alt', 'car-repair-service-core' ); ?>">
									<?php
								} else {
									echo $tablet_image;
								}
								?>
						</div>
						<?php
							echo $car_pluginElementor->frontend->get_builder_content( $settings['coupon'] );
						?>
					</div>
					<div class="col-description">
						<div class="block-title text-left">
							<h3 class="block-title__title">
							<?php echo wp_kses_post( $settings['title'] ); ?>
							</h3>
							<div class="title-separator"></div>
						</div>
						<p>
						<?php echo wp_kses_post( $settings['title_2'] ); ?>
						</p>
						<?php echo wp_kses_post( $settings['content'] ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
