<?php
namespace CarRepairSerivces\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Car_Brands extends Widget_Base {

	public $slick_default = array(
		'navigation' => true,
		'arrow'      => false,
	);

	public function get_name() {
		return 'car-brands';
	}

	public function get_title() {
		return __( 'Brands', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'Find here your vehicle', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'Find here your vehicle', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'slider_image',
			array(
				'label'   => __( 'Brand image', 'car-repair-services-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$repeater->add_control(
			'brand_url',
			array(
				'label'   => __( 'Brand Link', 'car-repair-services-core' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url' => '#',
				),
			)
		);

		$this->add_control(
			'slider_list',
			array(
				'label'  => __( 'Brand List', 'car-repair-services-core' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'       => __( 'Button Text', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'View All Makes', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'btn_text2',
			array(
				'label'       => __( 'Button Text 2', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'Show Less Makes', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'dis_btn',
			[
				'label' => esc_html__( 'Disable button', 'plugin-name' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'your-plugin' ),
				'label_off' => esc_html__( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
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
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="block">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo $settings['title']; ?></h2>
					<div class="block-title__description">
					<?php echo $settings['title_1']; ?>
					</div>
					<div class="title-separator"></div>
				</div>
				<div class="brands-grid">
					<?php
					if ( ! empty( $settings['slider_list'] ) ) {
						foreach ( $settings['slider_list'] as $item ) {
							$url    = '#';
							$target = '';
							$image  = ( $item['slider_image']['id'] != '' ) ? wp_get_attachment_image( $item['slider_image']['id'], 'full' ) : $item['slider_image']['url'];
							if ( ! empty( $item['brand_url']['url'] ) ) {
								$link   = $item['brand_url'];
								$url    = $link['url'];
								$target = $link['is_external'] ? 'target="_blank"' : '';
								$image  = ( $item['slider_image']['id'] != '' ) ? wp_get_attachment_image( $item['slider_image']['id'], 'full' ) : $item['slider_image']['url'];
								?>
							<a href="<?php echo esc_url( $url ); ?>" <?php echo $target; ?>>
								<?php
								if ( wp_http_validate_url( $image ) ) {
									?>
									<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
									<?php
								} else {
									echo $image;
								}
								?>
								
							</a>
						   <?php } else { ?>
								<?php
								if ( wp_http_validate_url( $image ) ) {
									?>
									<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
									<?php
								} 
								?>
						   <?php } ?>
							<?php
						}
					}
					?>
				</div>
				<div class="divider-lg"></div>
				<?php if ( 'yes' === $settings['dis_btn'] ) { ?>
				<div class="text-center">
					<a href="#" class="btn btn-border btn-invert view-all-brands js-view-all-brands active"><span>+  <?php echo esc_html( $settings['btn_text'] ); ?></span><span>-  <?php echo esc_html( $settings['btn_text2'] ); ?></span></a>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}
