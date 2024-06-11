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
use Elementor\Group_Control_Typography;


class Car_Question_Form extends \Elementor\Widget_Base {
	public function get_name() {
		return 'car_question_Form';
	}

	public function get_title() {
		return esc_html__( 'Car Question Form', 'car-repair-service-core' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}
	protected function register_controls() {

		$this->start_controls_section(
			'cotnact_content',
			array(
				'label' => esc_html__( 'Content', 'car-repair-service-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-service-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __('Have a Car Repair Question?','car-repair-service-core'
				),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'car-repair-service-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Get your automotive-related questions answered by a mechanic', 'car-repair-service-core' ),
			)
        );

		$this->add_control(
			'cf7',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'car-repair-service-core' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'electriciancore' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => get_contact_form_7_posts(),
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
				'selector' => '{{WRAPPER}} .block-title > :nth-child(1)',
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
		$settings = $this->get_settings_for_display();
		?>

        <div class="block">
			<div class="container">
			<div class="block-title">
				<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] );?></h2>
				<div class="block-title__description">
				<?php echo wp_kses_post( $settings['content'] );?>
				</div>
				<div class="title-separator"></div>
			</div>
			<?php
			if ( ! empty( $settings['cf7'] ) ) {
						echo do_shortcode( '[contact-form-7 id="' . $settings['cf7'] . '"]' );
			}
			?>
			</div>
		</div>
		<!-- Recalls Block -->
		<?php
	}
}
