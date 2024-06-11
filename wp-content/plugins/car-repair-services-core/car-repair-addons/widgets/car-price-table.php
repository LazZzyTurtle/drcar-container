<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class Car_Price extends Widget_Base {

	public function get_name() {
		return 'car_price_tbl';
	}

	public function get_title() {
		return __( 'Price Table', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'title_section',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => __( 'Low Overhead Means Savings for You', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => __( 'We are able to negotiate better prices from the auto parts vendors', 'car-repair-services-core' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'table_1_section',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'service',
			array(
				'label'       => __( 'Service', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);
		$repeater->add_control(
			'time',
			array(
				'label'       => __( 'Time', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);
		$repeater->add_control(
			'price',
			array(
				'label'       => __( 'Average Price', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'item_list',
			array(
				'label'   => __( 'Item List', 'car-repair-services-core' ),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'service' => __( 'Alternator Repair', 'car-repair-services-core' ),
						'time'    => '1 hour',
						'price'   => '$63.00 - $72.00',
					),

				),
			)
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="block">
			<div class="container">
				<div class="block-title">
					<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
					<div class="block-title__description">
					<?php echo wp_kses_post( $settings['title_2'] ); ?>
					</div>
					<div class="title-separator"></div>
				</div>
				<div class="table-01-wrapper">
					<table class="table-01">
						<thead>
							<tr>
								<th><?php echo esc_html__( 'Your Car Service', 'car-repair-services-core' ); ?></th>
								<th><?php echo esc_html__( 'Time', 'car-repair-services-core' ); ?></th>
								<th><?php echo esc_html__( 'Cost Range', 'car-repair-services-core' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ( ! empty( $settings['item_list'] ) ) {
								foreach ( $settings['item_list'] as $item ) {
									?>
									<tr>
										<td><?php echo esc_html( $item['service'] ); ?></td>
										<td><?php echo esc_html( $item['time'] ); ?></td>
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
