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

class How_It_Work extends Widget_Base {


	public $slick_default = array(
		'navigation' => true,
		'arrow'      => false,
	);

	public function get_name() {
		return 'electrician-brands-2';
	}

	public function get_title() {
		return __( 'How It Work', 'car-repair-services-core' );
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
				'name'      => 'background',
				'label'     => __( 'Background Image', 'car-repair-services-core' ),
				'types'     => array( 'classic' ),
				'selector'  => '{{WRAPPER}} .block.bg-2',
				'condition' => array( 'design_style' => '1' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'How It <span class="color">Works</span>', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Subtitle ', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'These few steps will help you understand how our service works', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXTAREA,
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Brand Title', 'textdomain' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'MAKE AN APPOINTMENT', 'car-repair-services-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_class', [
				'label' => esc_html__( 'Item Class', 'textdomain' ),
				'type' => Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'slider_image', [
				'label' => esc_html__( 'Item Image', 'textdomain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
								'url' => Utils::get_placeholder_image_src(),
				],
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'gallery_image',
			[
				'label' => esc_html__( 'Add Images for Gallery', 'textdomain' ),
				'type' => Controls_Manager::GALLERY,
			]
		);

		$this->add_control(
			'slider_list',
			[
				'label' => esc_html__( 'Brand List', 'textdomain' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'textdomain' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'textdomain' ),
					],
				],
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'title_typography',
				'label'     => __( 'Title Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .promo02 .promo02__img .promo02__title',
				'condition' => array( 'design_style' => '1' ),
			),
			array(
				'name'      => 'title2_typography',
				'label'     => __( 'Title Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .how-works-text',
				'condition' => array( 'design_style' => '2' ),
			)
		);
		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['design_style'] == '1' ) {
			?>
		<div class="block bg-2">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_1'] ); ?>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="promo02-wrapper">
					<div class="row js-promo02-carousel">
					<?php
					$i = 1;
					if ( ! empty( $settings['slider_list'] ) ) {
						foreach ( $settings['slider_list'] as  $item ) {
							$image_url = wp_get_attachment_image_url( $item['slider_image']['id'], '' );
							?>
							<div class="col-sm-6 col-w1500-3">
								<div class="promo02">
									<div class="promo02__marker"><?php echo $i; ?></div>
									<div class="promo02__content">
										<div class="promo02__img" data-bg="<?php echo esc_url( $image_url ); ?>">
											<div class="promo02__description">
												<h6 class="promo02__title">
												<?php echo $item['title']; ?>
												</h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							$i++;
						}
					}
					?>
					</div>
				</div>
			</div>
		</div>
			<?php
		} else {
			?>
		<div class="block">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_1'] ); ?>
					</div>
					<div class="title-separator"></div>
				</div>
				<div class="row" id="stepsAnimation">
			<?php
			$i = 1;
			if ( ! empty( $settings['slider_list'] ) ) {
				foreach ( $settings['slider_list'] as  $item ) {
					  $url    = '#';
					  $target = '';
					if ( ! empty( $item['action_link'] ) ) {
						$link   = $item['action_link'];
						$url    = $link['url'];
						$target = $link['is_external'] ? 'target="_blank"' : '';
					}
					$image_alt  = get_post_meta( $item['slider_image']['id'], '_wp_attachment_image_alt', true );
					$item_class = $item['item_class'];
					if ( ! empty( $item_class ) ) {
						$item_step = $item_class;
					} else {
						$item_step = 'step' . $i;
					}
					?>
					   <div class="col-xs-6 col-sm-3">
						<div class="how-works-circle">
							<div class="step <?php echo $item_step; ?>">
								<div class="step-inside-number">0<?php echo $i; ?></div>
								<div class="step-inside">
									<?php 
									if ( ! empty( $item['gallery_image'] ) ) {
										foreach ( $item['gallery_image'] as $image ) {
											echo '<img src="' . $image['url'] . '" alt="'. "Alt" . '">';
										}
									} else {
										?>
										<img src="<?php echo esc_url( $item['slider_image']['url'] ); ?>" alt="<?php echo esc_url( $image_alt ); ?>">
										<?php
									}
									?>
										
								</div>
							</div>
							<div class="how-works-text">
								<?php echo $item['title']; ?>
							</div>
						</div>
					</div>
					<?php
					  $i++;
				}
			}
			?>
				</div>
			</div>
		</div>
			<?php
		}
	}
}
