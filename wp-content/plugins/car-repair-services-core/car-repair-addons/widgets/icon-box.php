<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;

class Car_IconBox extends Widget_Base {

	public function get_name() {
		return 'crs-icon-box';
	}

	public function get_title() {
		return __( 'Car Icon Box', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
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

		$repeater = new Repeater();

		$repeater->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'car-repair-services-core' ),
				'type' => Controls_Manager::ICONS,
			]
		);
		$repeater->add_control(
			'heading', [
				'label' => esc_html__( 'Heading 1st line', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'All Car Makes' , 'car-repair-services-core' ),
			]
		);
		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Description', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'We provide a variety of repair and maintenance services for all car makes and models, even for exotic and vintage ones.' , 'car-repair-services-core' ),
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
				'name'     => 'title_typography1',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography2',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__description',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .box01 .box01__content .box01__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .box01 .box01__content p',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		?>
		<div class="block">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_2'] ); ?>
					</div>
				</div>
				<div class="box01-listing">
					<div class="row">
					<?php
					foreach ( $settings['crs_icon_box_tabs_tab'] as $tab ) {
						?>
						<div class="col-sm-4">
							<div class="box01">
								<div class="box01__icon">
									<i class="icon <?php echo esc_attr( $tab['icon']['value'] ); ?>"></i>
								</div>
								<div class="box01__content">
									<h6 class="box01__title"><?php echo esc_html( $tab['heading'] ); ?></h6>
									<p>
									<?php echo esc_html( $tab['description'] ); ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>

			</div>
		</div>
		<?php
	}
}
