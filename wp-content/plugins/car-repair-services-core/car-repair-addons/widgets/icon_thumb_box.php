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

class IconThumbBox extends Widget_Base {

	public function get_name() {
		return 'crs-icon-thumb-box';
	}

	public function get_title() {
		return __( 'Icon Thumb Box', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'crs_content_settings',
			array(
				'label' => __( 'Content Settings', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( '100% Result Guarantee', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Sub Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => 'We offer full service auto repair &amp; maintenance',
			)
		);
		$this->add_control(
			'style',
			array(
				'label'   => __( 'Style', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => __( 'One', 'car-repair-services-core' ),
					'two' => __( 'Two', 'car-repair-services-core' ),
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'car-repair-services-core' ),
				'type' => Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'heading', [
				'label' => esc_html__( 'Heading', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Appointments' , 'car-repair-services-core' ),
			]
		);
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Perform a search to find a store near you that accepts online appointment requests' , 'car-repair-services-core' ),
			]
		);
		$repeater->add_control(
			'url', [
				'label' => esc_html__( 'URL', 'car-repair-services-core' ),
				'type' => Controls_Manager::URL,
			]
		);
		$repeater->add_control(
			'modal_id', [
				'label' => esc_html__( 'Modal Element ID', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => '#appointmentForm',
			]
		);
		$repeater->add_control(
			'extra_class', [
				'label' => esc_html__( 'Extra Class', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'crs_icon_box_tabs_tab',
			[
				'label' => esc_html__( 'Repeater List', 'car-repair-services-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
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
				'name'     => 'title_typography',
				'label'    => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .text-icon .title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Item Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .text-icon .text',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		?>


		<?php if ( $settings['style'] == 'two' ) { ?>
			<div class="row">
					<?php
					foreach ( $settings['crs_icon_box_tabs_tab'] as $tab ) {
						?>
						<div class="col-md-6">
							<?php if ( $tab['url']['url'] ) { ?>
								<a href="<?php echo esc_url( $tab['url']['url'] ); ?>" class="text-icon-sm">
							<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="<?php echo esc_url( $tab['modal_id'] ); ?>" class="text-icon-sm">
							<?php } ?>
								<div class="icon-wrapper"><span><i class="icon <?php echo esc_attr( $tab['icon']['value'] ); ?>"></i><span class="icon-hover"></span></span></div>
								<h4 class="title"><?php echo esc_html( $tab['heading'] ); ?></h4>
								<p>
								<?php echo wp_kses_post( $tab['description'] ); ?>
								</p>
							</a>
						</div>

						<?php
					}
					?>
			</div>
		<?php } else { ?>

		<div class="block">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_2'] ); ?>
					</div>
					<div class="title-separator"></div>
				</div>				
				<div class="text-icon-wrapper">
					<div class="row">
					<?php
					foreach ( $settings['crs_icon_box_tabs_tab'] as $tab ) {
						?>
						<div class="col-sm-4 col-md-4">
							<div class="text-icon <?php echo esc_attr( $tab['extra_class'] ); ?>">
								<div class="icon-wrapper"><span><i class="icon <?php echo esc_attr( $tab['icon']['value'] ); ?>"></i><span class="icon-hover"></span></span>
								</div>
								<h3 class="title"><?php echo esc_html( $tab['heading'] ); ?></h3>
								<p class="text"><?php echo wp_kses_post( $tab['description'] ); ?></p>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>		
		<?php
	}
}
