<?php
namespace CarRepairSerivces\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class contact_form_7 extends Widget_Base {

	public function get_name() {
		return 'crs-contact-form-7';
	}

	public function get_title() {
		return __( 'Contact From 7', 'car-repair-services-core' );
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
				'label' => __( 'Contact Form 7', 'car-repair-services-core' ), // section name for controler view
			)
		);

		$this->add_control(
			'cf7',
			array(
				'label'       => __( 'Select Contact Form', 'car-repair-services-core' ),
				'description' => __( 'Contact form 7', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'options'     => get_contact_form_7_posts(),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_redirect',
			array(
				'label' => __( 'After Submit Redirect Setting', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'cf7_redirect_page',
			array(
				'label'       => __( 'On Success Redirect To', 'void' ),
				'description' => __( 'Select a page which you want users to redirect to when the contact fom is submitted and is successful. Leave Blank to Disable', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'options'     => get_all_pages(),
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		// to show on the fontend
		static $v_veriable = 0;
		$settings          = $this->get_settings();
		if ( ! empty( $settings['cf7'] ) ) {
			echo '<div class="elementor-shortcode void-cf7-' . $v_veriable . '">';
			echo do_shortcode( '[contact-form-7 id="' . $settings['cf7'] . '"]' );
			echo '</div>';
		}
		if ( ! empty( $settings['cf7_redirect_page'] ) ) {
			?>
			<script>
				var theform = document.querySelector('.void-cf7-<?php echo $v_veriable; ?>');
				theform.addEventListener('wpcf7mailsent', function (event) {
					location = '<?php echo get_permalink( $settings['cf7_redirect_page'] ); ?>';
				}, false);
			</script>
			<?php
			$v_veriable++;
		}
	}
}
