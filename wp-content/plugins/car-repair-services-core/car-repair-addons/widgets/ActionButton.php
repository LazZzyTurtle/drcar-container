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

class ActionButton extends Widget_Base {

	public function get_name() {
		return 'action_button';
	}

	public function get_title() {
		return __( 'Action Button', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_action_button',
			array(
				'label' => __( 'Action Button', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Button Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'APPOINTMENT',
			)
		);

		$this->add_control(
			'button_action',
			array(
				'label'   => __( 'Button Action', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'None', 'car-repair-services-core' ),
					'2' => __( 'Modal', 'car-repair-services-core' ),
					'3' => __( 'Pop Up', 'car-repair-services-core' ),
					'4' => __( 'Link', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'modal_id',
			array(
				'label'     => __( 'Modal Element Id', 'car-repair-services-core' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => array(
					'button_action' => '2',
				),
			)
		);

		$this->add_control(
			'popup_id',
			array(
				'label'     => __( 'Select contact form for Pop Up Id', 'car-repair-services-core' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => getContactFormId(),
				'condition' => array(
					'button_action' => '3',
				),
			)
		);

		$this->add_control(
			'call_action',
			array(
				'label'     => __( 'Action Button', 'car-repair-services-core' ),
				'type'      => Controls_Manager::URL,
				'condition' => array(
					'button_action' => '4',
				),
			)
		);

		$this->add_control(
			'popup_position',
			array(
				'label'   => __( 'Pop Up Location To Open', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'bottom',
				'options' => array(
					'bottom' => __( 'bottom', 'car-repair-services-core' ),
					'top'    => __( 'top', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label' => __( 'Extra Class', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings             = $this->get_settings();
		$button_action        = $settings['button_action'];
		$modal_id             = $settings['modal_id'];
		$popup_id             = $settings['popup_id'];
		$title                = $settings['title'];
		$extra_class          = $settings['extra_class'];
		$call_action          = $settings['call_action'];
		$popup_position_class = '';
		switch ( $settings['popup_position'] ) {
			case 'top':
				$popup_position_class = 'form-popup-top';
				break;
			case 'bottom':
				$popup_position_class = '';
				break;
			default:
				$popup_position_class = '';
		}
		if ( $button_action == '2' ) :
			?>
			<a class="btn btn-invert" href="#" data-toggle="modal" data-target="#<?php echo esc_html( $modal_id ); ?>"><span><?php echo esc_html( $title ); ?></span></a>
		<?php elseif ( $button_action == '3' ) : ?>
			<div class="form-popup-wrap">
				<a class="btn form-popup-link" href="#"><span><?php echo esc_html( $title ); ?></span></a>
				<div class="form-popup <?php echo esc_attr( $popup_position_class ); ?>">
					<div class="quote-form">
						<?php echo do_shortcode( '[contact-form-7 id="' . $popup_id . '"]' ); ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<a href="<?php echo esc_url($call_action['url']); ?>"  class="btn <?php echo esc_html( $extra_class ); ?>">
				<?php echo esc_html( $title ); ?>
			</a>
			<?php
		endif;
	}

	protected function content_template() {

	}

}
