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

class Expert_Service_Sec extends Widget_Base {

	public function get_name() {
		return 'expert_service';
	}

	public function get_title() {
		return __( 'Expert Service', 'car-repair-services-core' );
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
				'label' => __( 'Title', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'We Provide Expert Service', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'subtitle',
			array(
				'label'       => __( 'Subtitle', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'We aim to earn your trust and have a long term relationship with you', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'       => __( 'Button Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '+ More Services', 'car-repair-services-core' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tab_section',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
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
			'title_1',
			array(
				'label'       => __( 'Tab Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);

		$repeater->add_control(
			'content',
			array(
				'label'       => __( 'Content', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => get_elementor_library(),
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

						'icon'    => 'icon-gear',
						'title_1' => __( 'Additional Services', 'car-repair-services-core' ),
					),
					array(
						'icon'    => 'icon-raketa',
						'title_1' => __( 'Our Advantages', 'car-repair-services-core' ),
					),
					array(
						'icon'    => 'icon-wrech1',
						'title_1' => __( 'About Company', 'car-repair-services-core' ),
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
				'name'     => 'item_title_typography',
				'label'    => __( 'Tab Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .icons-tabs .nav-tabs a span',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings            = $this->get_settings_for_display();
		$car_pluginElementor = \Elementor\Plugin::instance();

		?>
		<div class="block">
			<div class="block-title">
				<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
				<div class="block-title__description">
				<?php echo wp_kses_post( $settings['subtitle'] ); ?>
				</div>
				<div class="title-separator"></div>
			</div>
			<div class="overflow-hidden">
				<div class="icons-tabs">
					<ul class="nav nav-tabs">
						<?php
						if ( ! empty( $settings['item_list'] ) ) {
							$i = 1;
							foreach ( $settings['item_list'] as $key => $item ) {
								$active = '';
								if ( $i == 1 ) {
									$active = 'active';
								}
								?>
							<li class="<?php echo $active; ?>">
								<a href="#tab<?php echo $i; ?>" data-toggle="tab"><i class="<?php echo esc_attr( $item['icon']['value'] ); ?>"></i><span><?php echo $item['title_1']; ?></span></a>
							</li>
								<?php
								$i++;
							}
						}
						?>
					</ul>
			  
					<div class="tab-content tab-pane-nomargin">
					<?php
					if ( ! empty( $settings['item_list'] ) ) {
						$i = 1;
						foreach ( $settings['item_list'] as $key => $item ) {
							$active = '';
							if ( $key == 0 ) {
								$active = 'active';
							}
							?>
							<div class="tab-pane <?php echo $active; ?>" id="tab<?php echo $i; ?>">
								<?php
									echo $car_pluginElementor->frontend->get_builder_content( $item['content'] );
								?>
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
	}

}
