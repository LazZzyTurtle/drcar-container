<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class Slickslider extends Widget_Base {

	public function get_name() {
		return 'csr_slickslider';
	}

	public function get_title() {
		return __( 'Slick Slider', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-posts-carousel';
	}

	public function get_script_depends() {
		return array( 'addons-slick', 'addons-custom' );
	}

	public function get_categories() {
		return array( 'car-repair-services-core' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'crs_content_settings',
			array(
				'label' => __( 'Content Settings', 'car-repair-services-core' ),
			)
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Image', 'car-repair-services-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);
		$repeater->add_control(
			'text_position',
			array(
				'label'   => __( 'Text Position', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'center' => __( 'Center', 'car-repair-services-core' ),
					'left'   => __( 'Left', 'car-repair-services-core' ),
					'right'  => __( 'Right', 'car-repair-services-core' ),
				),
			)
		);
		$repeater->add_control(
			'heading',
			array(
				'label' => esc_html__( 'heading', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'sub_heading',
			array(
				'label' => esc_html__( 'Sub Heading', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'sub_heading_2',
			array(
				'label' => esc_html__( 'Sub Heading Second', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'short_description',
			array(
				'label' => esc_html__( 'Short Description', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'button_text',
			array(
				'label' => esc_html__( 'Button Text', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'content',
			array(
				'label' => esc_html__( 'Details', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXTAREA,
			)
		);
		$repeater->add_control(
			'button_link',
			array(
				'label'         => esc_html__( 'Button Link', 'car-repair-services-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'car-repair-services-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				),

			)
		);
		$repeater->add_control(
			'animation_style',
			array(
				'label'   => __( 'Text Position', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'car-repair-services-core' ),
					'2' => __( 'Style 2', 'car-repair-services-core' ),
					'3' => __( 'Style 3', 'car-repair-services-core' ),
				),
			)
		);
		$this->add_control(
			'crs_slickslider_tabs_tab',
			array(
				'label'   => esc_html__( 'Repeater List', 'car-repair-services-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					),
				),
			)
		);

		$this->add_control(
			'arrow_bottom',
			array(
				'label'     => __( 'Show Arrow Bottom', 'plugin-domain' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			array(
				'label' => __( 'Slider Settings', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'autoplay',
			array(
				'label'       => __( 'Autoplay Slides', 'car-repair-services-core' ),
				'description' => __( 'Slide will start automatically', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'autoplay_speed',
			array(
				'label'              => __( 'Autoplay Speed', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 7000,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'arrows',
			array(
				'label'       => __( 'Enable Arrows', 'car-repair-services-core' ),
				'description' => __( 'Enable Arrows', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'dots',
			array(
				'label'       => __( 'Enable Dots', 'car-repair-services-core' ),
				'description' => __( 'Enable Dots', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'no',
			)
		);

		$this->add_control(
			'fade',
			array(
				'label'       => __( 'Enable Fading?', 'car-repair-services-core' ),
				'description' => __( 'Enable Fading?', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'pause_on_hover',
			array(
				'label'       => __( 'Pause on hover?', 'car-repair-services-core' ),
				'description' => __( 'Pause on hover?', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'pause_on_dots_hover',
			array(
				'label'       => __( 'Pause on dots hover?', 'car-repair-services-core' ),
				'description' => __( 'Pause on dots hover?', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'speed',
			array(
				'label'              => __( 'Speed', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 500,
				'frontend_available' => true,
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
				'name'     => 'content_typography3',
				'label'    => __( 'Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} #mainSlider .slide-content h4',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography2',
				'label'    => __( 'Sub Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} #mainSlider .slide-content h3',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} #mainSlider .slide-content p',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings();

		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = 'true';
		} else {
			$autoplay = 'false';
		}
		if ( $settings['arrows'] == 'yes' ) {
			$arrows = 'true';
		} else {
			$arrows = 'false';
		}
		if ( $settings['dots'] == 'yes' ) {
			$dots = 'true';
		} else {
			$dots = 'false';
		}
		if ( $settings['fade'] == 'yes' ) {
			$fade = 'true';
		} else {
			$fade = 'false';
		}

		if ( $settings['pause_on_hover'] == 'yes' ) {
			$pause_on_hover = 'true';
		} else {
			$pause_on_hover = 'false';
		}

		if ( $settings['pause_on_dots_hover'] == 'yes' ) {
			$pause_on_dots_hover = 'true';
		} else {
			$pause_on_dots_hover = 'false';
		}

		$atts = array(
			'autoplay'            => $autoplay,
			'autoplay_speed'      => $settings['autoplay_speed'],
			'arrows'              => $arrows,
			'dots'                => $dots,
			'fade'                => $fade,
			'speed'               => $settings['speed'],
			'pause_on_hover'      => $pause_on_hover,
			'pause_on_dots_hover' => $pause_on_dots_hover,
		);

		wp_localize_script( 'custom', 'ajax_slickslider', $atts );

		$speed          = $settings['speed'];
		$speed          = ! empty( $speed ) ? $speed : 700;
		$autoplay_speed = $settings['autoplay_speed'];
		$autoplay_speed = ! empty( $autoplay_speed ) ? $autoplay_speed : '';

		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = true;
		} else {
			$autoplay = false;
		}
		if ( $settings['arrows'] == 'yes' ) {
			$arrows = true;
		} else {
			$arrows = false;
		}
		if ( $settings['dots'] == 'yes' ) {
			$dots = true;
		} else {
			$dots = false;
		}
		if ( $settings['fade'] == 'yes' ) {
			$fade = true;
		} else {
			$fade = false;
		}

		if ( $settings['pause_on_hover'] == 'yes' ) {
			$pause_on_hover = true;
		} else {
			$pause_on_hover = false;
		}

		if ( $settings['pause_on_dots_hover'] == 'yes' ) {
			$pause_on_dots_hover = true;
		} else {
			$pause_on_dots_hover = false;
		}

		$changed_atts = array(
			'autoplay'            => $autoplay,
			'autoplay_speed'      => $autoplay_speed,
			'arrows'              => $arrows,
			'dots'                => $dots,
			'fade'                => $fade,
			'speed'               => $speed,
			'pause_on_hover'      => $pause_on_hover,
			'pause_on_dots_hover' => $pause_on_dots_hover,
		);
		?>
		<div id="mainSliderWrapper" data-slickslider='<?php echo wp_json_encode( $changed_atts ); ?>'>
			<div id="mainSlider">
					 <?php
						foreach ( $settings['crs_slickslider_tabs_tab'] as $tab ) {
							// $unqid = $tab['unqid'];
							$unqid             = uniqid();
							$image             = ( $tab['image']['id'] != '' ) ? wp_get_attachment_url( $tab['image']['id'], 'full' ) : $tab['image']['url'];
							$animation_style   = $tab['animation_style'];
							$heading           = $tab['heading'];
							$sub_heading       = $tab['sub_heading'];
							$sub_heading_2     = $tab['sub_heading_2'];
							$short_description = $tab['short_description'];
							$text_position     = $tab['text_position'];

							$unqid                      = $unqid . rand( 1, 999 );
							$heading_animation          = '';
							$sub_heading_animation      = '';
							$sub_heading_2_animation    = '';
							$short_description_animatio = '';

							$heading_delay_animation          = '';
							$sub_heading_delay_animation      = '';
							$sub_heading_2_delay_animation    = '';
							$short_description_delay_animatio = '';

							switch ( $animation_style ) {
								case '1':
									$heading_animation          = 'zoomIn';
									$sub_heading_animation      = 'scaleOut';
									$sub_heading_2_animation    = '';
									$short_description_animatio = 'fadeIn';
									// delay
									$heading_delay_animation          = '0.5s';
									$sub_heading_delay_animation      = '0.2';
									$sub_heading_2_delay_animation    = '';
									$short_description_delay_animatio = '0.9s';
									break;

								case '2':
									$heading_animation          = 'fadeInLeft';
									$sub_heading_animation      = 'flipInX';
									$sub_heading_2_animation    = 'flipInX';
									$short_description_animatio = 'fadeIn';
									// delay
									$heading_delay_animation          = '0.8s';
									$sub_heading_delay_animation      = '0.2s';
									$sub_heading_2_delay_animation    = '0.5s';
									$short_description_delay_animatio = '1.5s';
									break;

								case '3':
									$heading_animation          = 'zoomIn';
									$sub_heading_animation      = 'fadeInUp';
									$sub_heading_2_animation    = 'fadeInUp';
									$short_description_animatio = 'fadeIn';
									// delay
									$heading_delay_animation          = '0.8s';
									$sub_heading_delay_animation      = '0.2s';
									$sub_heading_2_delay_animation    = '0.5s';
									$short_description_delay_animatio = '1.2s';
									break;

								default:
									$heading_animation          = 'zoomIn';
									$sub_heading_animation      = 'scaleOut';
									$sub_heading_2_animation    = '';
									$short_description_animatio = 'fadeIn';
									// delay
									$heading_delay_animation          = '0.5s';
									$sub_heading_delay_animation      = '0.2';
									$sub_heading_2_delay_animation    = '';
									$short_description_delay_animatio = '0.9s';
							}
							?>

					<div class="slide" id="<?php echo esc_attr( $unqid ); ?>">
						<div class="img--holder"
							<?php
							if ( $image != array() ) {
								?>
							  style="background-image: url(<?php echo esc_url( $image ); ?>); min-height: 526px;" <?php } ?>></div>
						<div class="slide-content <?php echo esc_html( $text_position ); ?>">
							<div class="vert-wrap container">
								<div class="vert">
									<div class="container">
										<?php
										if ( $heading != '' ) {
											echo '<h4 data-animation="' . $heading_animation . '" data-animation-delay="' . $heading_delay_animation . '">' . $heading . '</h4>';
										}
										if ( $sub_heading != '' ) {
											echo '<h3 data-animation="' . $sub_heading_animation . '" data-animation-delay="' . $sub_heading_delay_animation . '">' . $sub_heading . '</h3>';
										}
										if ( $sub_heading_2 != '' ) {
											echo '<h3 data-animation="' . $sub_heading_2_animation . '" data-animation-delay="' . $sub_heading_2_delay_animation . '">' . $sub_heading_2 . '</h3>';
										}
										if ( $short_description != '' ) {
											echo '<p data-animation="' . $short_description_animatio . '" data-animation-delay="' . $short_description_delay_animatio . '">' . $short_description . '</p>';
										}

										if ( ! empty( $tab['button_text'] ) ) {
												if ( ! empty( $tab['button_link']['url'] ) ) {
													$this->add_link_attributes( 'button_link', $tab['button_link'] );
												}
											?>
										<a <?php echo $this->get_render_attribute_string( 'button_link' ); ?> data-animation="fadeIn" data-animation-delay="1.5s" class="banner-btn"><?php echo $tab['button_text']; ?></a>
											<?php
											$this->remove_render_attribute( 'button_link' );
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
			</div>
		<?php
		if ( ! empty( $settings['arrow_bottom'] ) ) {
			?>
			<div class="mainSlider-arrow-bottom">
				<i class="icon-triangle"></i>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}
}
