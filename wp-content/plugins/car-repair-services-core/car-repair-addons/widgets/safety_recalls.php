<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Safety_Recalls extends \Elementor\Widget_Base {
	public function get_name() {
		return 'safety_recalls';
	}

	public function get_title() {
		return esc_html__( 'Safety Recalls', 'car-repair-services-core' );
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
				'label' => esc_html__( 'Content', 'car-repair-services-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __('Safety <span class="color">&amp;</span> Recalls'),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Are there any recalls on your car? Find out!', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'cf7',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'car-repair-services-core' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'electriciancore' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => get_contact_form_7_posts(),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		// to show on the fontend
		$settings = $this->get_settings_for_display();
		?>
		<!-- Recalls Block -->
		<div class="block bg-dark full-block pad-sm">
			<div class="container">
				<div class="text-center">
					<h2 class="h-lg">
					<?php
					echo wp_kses_post( $settings['title_1'] );
					?>
					</h2>
					<p class="info">
					<?php
					echo wp_kses_post( $settings['content'] );
					?>
					</p>
				</div>
				<?php
				if ( ! empty( $settings['cf7'] ) ) {
							echo do_shortcode( '[contact-form-7 id="' . $settings['cf7'] . '"]' );
				}
				?>
			</div>
		</div>
		<?php
	}
}
