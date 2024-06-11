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

class Car_Estimate_Form extends Widget_Base {

	public function get_name() {
		return 'crs-estimate-form';
	}

	public function get_title() {
		return __( 'Estimate From', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Estimate', 'car-repair-services-core' ), // section name for controler view
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Car Repair Estimator', 'car-repair-service-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Get a location-based car repair estimate', 'car-repair-service-core' ),
			)
		);
		$this->add_control(
			'estimator_form_select',
			array(
				'label'       => __( 'Estimator Form Select', 'car-repair-service-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'default'     => '1',
				'options'     => array(
					'1' => __( 'Load From Contact Form 7', 'car-repair-services-core' ),
					'2' => __( 'Load From Estimator Form Plugin', 'car-repair-services-core' ),
				),
			)
		);
		$this->add_control(
			'cf7',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'uaquescore' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'uaquescore' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => get_contact_form_7_posts(),
				'conditions'  => array(
					'terms' => array(
						array(
							'name'     => 'estimator_form_select',
							'operator' => '==',
							'value'    => '1',
						),
					),
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'right_content',
			array(
				'label' => __( 'Right Content', 'car-repair-serivce-core' ),
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
			'url',
			array(
				'label' => __( 'URL', 'car-repair-serivce-core' ),
				'type'  => Controls_Manager::URL,
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
		$this->end_controls_section();

	}

	protected function render() {
		// to show on the fontend
		$settings = $this->get_settings();

		?>
		<div class="bg-dark-custom">
			<div id="anchoring-link01" class="block bg-dark full-block pad-sm">
				<div class="container">
					<div class="tablet-bg">
						<div class="block-title">
							<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
							<div class="block-title__description">
							<?php echo wp_kses_post( $settings['title_2'] ); ?>
							</div>
						</div>
						<?php
						if ( $settings['estimator_form_select'] == '2' ) {
							echo do_shortcode( '[estimate_search_form]' );
						} else {
							if ( ! empty( $settings['cf7'] ) ) {

								echo do_shortcode( '[contact-form-7 id="' . $settings['cf7'] . '"]' );

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
