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

class Accordian extends Widget_Base {

	public function get_name() {
		return 'crs_accordian';
	}

	public function get_title() {
		return __( 'Accordions', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-accordion';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_settings',
			array(
				'label' => __( 'Content Settings', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'accordian_tabs_tab',
			array(
				'type'      => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default'   => array(
					array( 'tab_title' => __( 'Item 1', 'car-repair-services-core' ) ),
					array( 'tab_title' => __( 'Item 2', 'car-repair-services-core' ) ),
					array( 'tab_title' => __( 'Item 3', 'car-repair-services-core' ) ),
					array( 'tab_title' => __( 'Item 4', 'car-repair-services-core' ) ),
				),
				'fields'    => array(
					array(
						'name'    => 'title',
						'label'   => __( 'Title', 'car-repair-services-core' ),
						'type'    => Controls_Manager::TEXTAREA,
						'default' => __( 'I have a new car; do I need to take it to a dealership for maintenance in order to keep my warranty valid?', 'car-repair-services-core' ),
					),
					array(
						'name'    => 'description',
						'label'   => __( 'Description', 'car-repair-services-core' ),
						'type'    => Controls_Manager::WYSIWYG,
						'default' => __( 'No! Forget all about that old myth. As long as you follow the specifications given by the manufacturer (which can be found in your handy owner’s manual), your warranty is valid. At Car Repair Service, we always follow the manufacturer’s maintenance schedule. We’ll make sure your warranty remains valid and your car remains happy - for many miles to come!', 'car-repair-services-core' ),
					),
				),
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
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .faq-accordion .faq__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .faq-accordion .faq__item .faq__content',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		?>
			<div class="faq-accordion">
			<?php
				$i = 1;
			foreach ( $settings['accordian_tabs_tab'] as $tab ) {
				?>
				<div class="faq__item">
					<div class="faq__title">
				<?php echo esc_html( $tab['title'] ); ?>
						<div class="icon"></div>
					</div>
					<div class="faq__content">
					<?php echo $tab['description']; ?>
					</div>
				</div>
				<?php
				$i++;
			}
			?>
			</div>
		<?php
	}

	protected function content_template() {

	}
}
