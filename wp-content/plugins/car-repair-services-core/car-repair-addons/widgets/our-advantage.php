<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Repeater;
use Elementor\Group_Control_Background;

class Our_Advantage extends Widget_Base {

	public function get_name() {
		return 'our_advantage';
	}

	public function get_title() {
		return __( 'Our Advantage', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tab_section',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background Image', 'car-repair-services-core' ),
				'types'    => array( 'classic' ),
				'selector' => '{{WRAPPER}} .tabs-layout01__bg02',
			)
		);
		$this->add_control(
			'bg_text',
			array(
				'label'       => __( 'BG Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Advantages', 'car-repair-services-core' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'We Make It Easy', 'car-repair-services-core' ),
			)
		);

		$repeater->add_control(
			'content',
			array(
				'label'       => __( 'Content', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Get a quote and book a service online 24/7. Our mechanics will come to your home or office, even on evenings and weekends.', 'car-repair-services-core' ),
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
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="tabs-layout01 tabs-layout01__bg-color tabs-layout01__bg02">
			<div class="container">
				<div class="tt-col-100 content-center">
					<div class="tabs-layout02__box">
						<div class="tabs-layout01__caption"><?php echo esc_html( $settings['bg_text'] ); ?></div>
						<div class="row box-custom01-wrapper">
						<?php
						if ( ! empty( $settings['item_list'] ) ) {

							foreach ( $settings['item_list'] as $key => $item ) {

								?>
							<div class="col-sm-6">
								<div class="box-custom01">
									<div class="box-custom01__icon">
										<span class="icon icon-ok"></span>
									</div>
									<div class="box-custom01__content">
										<h6 class="box-custom01__title"><?php echo esc_html( $item['title'] ); ?></h6>
										<p>
										<?php echo wp_kses_post( $item['content'] ); ?>
										</p>
									</div>
								</div>
							</div>
								<?php
							}
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}

}
