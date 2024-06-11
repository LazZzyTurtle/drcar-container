<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class ServiceModal extends Widget_Base {

	public function get_name() {
		return 'service_modal';
	}

	public function get_title() {
		return __( 'Service Modal', 'car-repair-services-core' );
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
				'label' => __( 'Left Content', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Diagnostics', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => __( 'Content', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::WYSIWYG,
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'       => __( 'Button Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Appointment', 'car-repair-services-core' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'right_content',
			array(
				'label' => __( 'Right Content', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Pricing', 'car-repair-services-core' ),
			)
		);

		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'service_name',
			array(
				'label'       => __( 'Service Name', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'price',
			array(
				'label'       => __( 'Price', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'item_list',
			array(
				'label'   => __( 'Item List', 'car-repair-services-core' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'service_name' => __( 'Engine Complete 6-cylinder', 'car-repair-services-core' ),
						'price'        => '$229.99',
					),
				),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

	   
			<div class="row">
				<div class="col-md-6">
					<h6 class="services-modal__title-large"><?php echo esc_html( $settings['title'] ); ?></h6>
					<?php echo wp_kses_post( $settings['content'] ); ?>
					<a class="btn btn-top btn-border btn-invert btn-wide" href="#" data-toggle="modal" data-target="#appointmentForm"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
				</div>
				<div class="divider-lg visible-sm visible-xs"></div>
				<div class="col-md-6">
					<h6 class="services-modal__title-small"><?php echo esc_html( $settings['title_2'] ); ?></h6>
					<div class="services-modal__table">
						<table>
							<tbody>
							<?php
							if ( ! empty( $settings['item_list'] ) ) {
								foreach ( $settings['item_list'] as $key => $item ) {
									?>
																			
								<tr>
									<td><?php echo esc_html( $item['service_name'] ); ?></td>
									<td><?php echo esc_html( $item['price'] ); ?></td>
								</tr>
									<?php
								}
							}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	 

		<?php
	}
}
