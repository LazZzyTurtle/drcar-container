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

class Advantages_Our_Services extends Widget_Base {

	public function get_name() {
		return 'advantages_our_services';
	}

	public function get_title() {
		return __( 'Advantages Our Services', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			array(
				'label' => __( 'Section', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Advantages <br> of <span class="color">Our Service</span>', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Auto servicing your car is an essential task that should not be ignored or forgotten.', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'bg_text',
			array(
				'label'       => __( 'BG TEXT', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Advantages', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'       => __( 'Button TEXT', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Get a Quote', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'btn_link',
			array(
				'label'       => __( 'Button Link', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Get a Quote', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label'       => __( 'Extra Class', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'icon',
			array(
				'label' => __( 'Icon', 'car-repair-services-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);
		$repeater->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Customer-Oriented Service', 'car-repair-services-core' ),

			)
		);
		$repeater->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'We value the service we provide and our loyal returning customers can always expect some appreciation from us, like a future service discount or a', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'item_list',
			array(
				'label'  => __( 'Item List', 'car-repair-services-core' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
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
				'selector' => '{{WRAPPER}} .services-title .services-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subheading_typography',
				'label'    => __( 'Sub Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} p',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
			<div class="block position-relative overflow-hidden">
				<div class="container-fluid no-gutters">
					<div class="services-item-wrapper">
						<div class="section__text-background text-color03 text-center"><?php echo esc_html( $settings['bg_text'] ); ?></div>
						<div class="services-item">
							<div class="services-title">
								<h2 class="services-title__title"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
								<div class="title-separator"></div>
							</div>
							<p>
							<?php
							echo wp_kses_post( $settings['title_2'] );
									$btn_link = $settings['btn_link'];
							?>
							</p>
							<?php if ( empty( $btn_link ) ) { ?>
							<a href="#" data-toggle="modal" data-target="#appointmentForm" class="btn btn-border btn-top"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
							<?php } else { ?>
								<a href="<?php echo esc_url( "$btn_link" ); ?>"  class="btn btn-border btn-top"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
							<?php } ?>
						</div>
						<?php
						if ( ! empty( $settings['item_list'] ) ) {
							$i = 0;
							foreach ( $settings['item_list'] as $item ) {
								$i++;
								?>
											
						<div class="services-item services-bg-0<?php echo esc_attr( $i ); ?>">
							<div class="services-box">
								<div class="services-box__icon">
									<span class="<?php echo wp_kses_post( $item['icon']['value'] ); ?>"></span>
								</div>
								<h6 class="services-box__title">
								<?php echo esc_html( $item['title'] ); ?>
								</h6>
								<p>
								<?php echo wp_kses_post( $item['content'] ); ?>
								</p>
							</div>
						</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>

		<?php
	}

}
