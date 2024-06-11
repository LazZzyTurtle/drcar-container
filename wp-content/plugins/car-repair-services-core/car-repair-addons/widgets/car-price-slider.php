<?php
namespace CarRepairSerivces\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Car_Price_Slider extends Widget_Base {

	public function get_name() {
		return 'car_price_slider';
	}

	public function get_title() {
		return __( 'Car Price Slider', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	public function get_script_depends() {
		return array( 'pricing-packages' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background Image', 'car-repair-services-core' ),
				'types'    => array( 'classic' ),
				'selector' => '{{WRAPPER}} .custom-bg-4',
			)
		);
		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Our Pricing Plans', 'car-repair-services-core' ),
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Fixed price car servicing packages', 'car-repair-services-core' ),
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'car-repair-services-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'title_1',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);
		$repeater->add_control(
			'price',
			array(
				'label'       => __( 'Price', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'content',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXTAREA,
			)
		);

		$repeater->add_control(
			'button_text',
			array(
				'label'       => __( 'Button Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => 'More Info',
			)
		);
		$repeater->add_control(
			'button_url',
			array(
				'label'       => __( 'Button URL', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::URL,
			)
		);
		$repeater->add_control(
			'is_active',
			array(
				'label' => __( 'Active', 'car-repair-services-core' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$this->add_control(
			'item_list',
			array(
				'label'   => __( 'Item List', 'car-repair-services-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'title_1' => __( 'Engine Coolant Inspection & Service', 'car-repair-services-core' ),
						'price'   => __( '$59<sup>99</sup>', 'car-repair-services-core' ),
						'content' => __( 'Drain & Replace with up to 1 Gallon of Antifreeze, Inspect all hoses, fittings and water pump.', 'car-repair-services-core' ),
					),
				),
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
				'name'     => 'heading_typography',
				'label'    => __( 'Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subheading_typography',
				'label'    => __( 'Sub Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__description',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_title_typography',
				'label'    => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .pricing-box02 .pricing-box02__title',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="block custom-bg-4">
			<div class="container">
				<div class="block-title">
					<h5 class="block-title__title"><?php echo wp_kses_post( $settings['title_1'] ); ?></h5>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_2'] ); ?>
					</div>
				</div>
				<div class="js-pricing-carousel row">
					<?php
					if ( ! empty( $settings['item_list'] ) ) {
						foreach ( $settings['item_list'] as $key => $item ) {

							$is_active = '';
							if ( $item['is_active'] == 'yes' ) {
								$is_active = 'item-active';
							}

							$image = ( $item['image']['id'] != '' ) ? wp_get_attachment_image( $item['image']['id'], 'full' ) : $item['image']['url'];
							?>
					<div class="pricing-box02 col-md-4 <?php echo $is_active; ?>">
						<div class="pricing-box02__title"><?php echo wp_kses_post( $item['title_1'] ); ?></div>
						<div class="pricing-box02__price"><?php echo wp_kses_post( $item['price'] ); ?></div>
						<div class="pricing-box02__img">
							<?php
							if ( wp_http_validate_url( $image ) ) {
								?>
									<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
								<?php
							} else {
								echo $image;
							}
							?>
						</div>
						<div class="pricing-box02__description">
							<?php echo wp_kses_post( $item['content'] ); ?>
						</div>
						<?php if( ! empty( $item['button_text'] ) ){ ?>
						<a href="<?php echo esc_url( $item['button_url']['url'] ); ?>" class="btn btn-border btn-invert"><span><?php echo esc_html( $item['button_text'] ); ?></span></a>
						<?php }	?>
					</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>

		<?php
	}
}
