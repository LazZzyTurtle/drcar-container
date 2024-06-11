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

class Appointment_Schedule extends Widget_Base {


	public function get_name() {
		return 'appointment_schedule';
	}

	public function get_title() {
		return esc_html__( 'Appointment Schedule', 'car-repair-services-core' );
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
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'design_style',
			array(
				'label'   => __( 'Style', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'car-repair-services-core' ),
					'2' => __( 'Style 2', 'car-repair-services-core' ),
				),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background Image', 'car-repair-services-core' ),
				'types'    => array( 'classic' ),
				'selector' => '{{WRAPPER}} .block',
			)
		);
		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __( 'Schedule <span class="color">Your Appointment</span> Today', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'   => __( 'Title 2', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Your Automotive Repair & Maintenance Service Specialist', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'call',
			array(
				'label'   => __( 'Call', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Call: 1-800-123-4567', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'button_text',
			array(
				'label'   => __( 'Button Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Appointment',
			)
		);

		$this->add_control(
			'button_type',
			array(
				'label'   => __( 'Button Type', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'1' => __( 'Modal', 'car-repair-services-core' ),
					'2' => __( 'Link', 'car-repair-services-core' ),
				),
				'default' => '1',
			)
		);

		$this->add_control(
			'button_url',
			array(
				'label'     => __( 'Button URL', 'car-repair-services-core' ),
				'type'      => Controls_Manager::URL,
				'condition' => array(
					'button_type' => '2',
				),
			)
		);
		$this->add_control(
			'modal_id',
			array(
				'label'     => __( 'Button Modal Element Id', 'car-repair-services-core' ),
				'type'      => Controls_Manager::TEXT,
				'condition' => array(
					'button_type' => '1',
				),
			)
		);

		$this->add_control(
			'bg_text',
			array(
				'label'   => __( 'BG Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Schedule',
			)
		);

		$this->add_control(
			'image',
			array(
				'label'     => __( 'Image', 'car-repair-services-core' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => array(
					'active' => true,
				),
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'design_style' => '1',
				),
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label'   => __( 'Extra Class', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
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
				'selector' => '{{WRAPPER}} h2.h-lg',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subheading_typography',
				'label'    => __( 'Sub Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} h1+p.info, h2+p.info',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'number_typography',
				'label'    => __( 'Number Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} p.info + h2.h-phone',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		// to show on the fontend
		$settings    = $this->get_settings_for_display();
		$modal_id    = $settings['modal_id'];
		$bg_text     = $settings['bg_text'];
		$extra_class = $settings['extra_class'];

		if ( $settings['design_style'] == '1' ) {
			$image_url = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];

			?>

<div class="block <?php echo $extra_class; ?>">

  <div class="container position-relative">
	<div class="section__text-background text-color02 text-center text-background__center">
			<?php echo esc_html( $bg_text ); ?></div>
	<div class="row">
	  <div class="col-md-6">
		<div class="text-appointment">
		  <h2 class="h-lg"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
		  <p class="info"><?php echo wp_kses_post( $settings['title_2'] ); ?></p>
		  <h2 class="h-phone"><?php echo wp_kses_post( $settings['call'] ); ?></h2>
		  <div>

			<?php if ( isset( $settings['button_url']['url'] ) && $settings['button_url']['url'] ) { ?>
			<a class="btn btn-border btn-invert"
			  href="<?php echo esc_url( $settings['button_url']['url'] ); ?>"><span><?php echo wp_kses_post( $settings['button_text'] ); ?></span></a>
			<?php } else { ?>
			<a class="btn btn-border btn-invert" href="#" data-toggle="modal"
			  data-target="#<?php echo esc_html( $modal_id ); ?>"><span><?php echo wp_kses_post( $settings['button_text'] ); ?></span></a>
			<?php } ?>
		  </div>
		</div>
	  </div>
	  <div class="col-md-6">
		<div class="img-move animation animated fadeInRight" data-animation="fadeInRight" data-animation-delay="0s">
			<?php
			if ( wp_http_validate_url( $image_url ) ) {
				?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
					<?php
			} else {
				echo $image_url;
			}
			?>
		</div>
	  </div>
	</div>
  </div>
</div>
			<?php
		} elseif ( $settings['design_style'] == '2' ) {
			?>
			<?php
			if ( $settings['background_background'] ) {
				$bg_class  = 'block bg-custom-01 style-theme-01';
				$btn_class = 'btn btn-border btn-color02 btn-wide';
			} else {
				$bg_class  = 'block position-relative overflow-hidden';
				$btn_class = 'btn btn-border btn-invert btn-wide';
			}
			?>
<div class="<?php echo esc_attr( $bg_class ); ?> <?php echo $extra_class; ?>">
  <div class="section__text-background text-color02 text-center text-background__center">
			<?php echo esc_html( $bg_text ); ?></div>
  <div class="text-center">
	<h2 class="h-lg"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
	<p class="info"><?php echo wp_kses_post( $settings['title_2'] ); ?></p>
	<h2 class="h-phone"><?php echo wp_kses_post( $settings['call'] ); ?></h2>
	<div class="btn-inline">
			<?php if ( isset( $settings['button_url']['url'] ) && $settings['button_url']['url'] ) { ?>
	  <a class="<?php echo esc_attr( $btn_class ); ?>"
		href="<?php echo esc_url( $settings['button_url']['url'] ); ?>"><span><?php echo wp_kses_post( $settings['button_text'] ); ?></span></a>
	  <?php } else { ?>
	  <a class="<?php echo esc_attr( $btn_class ); ?>" href="#" data-toggle="modal"
		data-target="#<?php echo esc_attr( $modal_id ); ?>"><span><?php echo wp_kses_post( $settings['button_text'] ); ?></span></a>
	  <?php } ?>
	</div>
  </div>
</div>

			<?php
		}
	}
}
