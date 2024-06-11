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

class Car_Featured_Services extends Widget_Base {

	public function get_name() {
		return 'car_featured_services';
	}

	public function get_title() {
		return __( 'Featured Services', 'car-repair-services-core' );
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
				'label' => __( 'Title', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Our Featured Services', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'We offer full service auto repair & maintenance', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'bg_text',
			array(
				'label'       => __( 'BG Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Our Services', 'car-repair-services-core' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'right_section',
			array(
				'label' => __( 'Tab Section', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'car-repair-services-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title_1',
			array(
				'label'       => __( 'Title one', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);

		$repeater->add_control(
			'icon',
			array(
				'label' => __( 'Title two', 'car-repair-services-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'content',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXTAREA,
			)
		);

		$repeater->add_control(
			'position_left',
			array(
				'label'       => __( 'Icon Position Left', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'position_top',
			array(
				'label'       => __( 'Icon Position Top', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'modal',
			array(
				'label'       => __( 'Service Modal', 'citygovt-core' ),
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
						'title_1' => __( 'Diagnostics', 'car-repair-services-core' ),
						'icon'    => 'icon-diag',
						'content' => 'Nunc porttitor in tellus a rutrum. Curabitur in ante dui. Sed id erat eget libero egestas mollis et id dolor.',
					),
				),
			)
		);

		$this->add_control(
			'button_text',
			array(
				'label'   => __( 'Button Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'read more', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'btn_link',
			array(
				'label'         => __( 'Action Button', 'car-repair-services-core' ),
				'type'          => Controls_Manager::URL,
				'default'       => array(
					'url'         => '#',
					'is_external' => '',
				),
				'show_external' => true,
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
				'selector' => '{{WRAPPER}} .services-tabs .services-tabs-nav > li a span',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_content_typography',
				'label'    => __( 'Tab Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .services-tabs .services-tab-info p',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image    = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];

		$car_pluginElementor = \Elementor\Plugin::instance();
		?>
	<!-- Services Tabs -->
	<div class="block">
		<div class="container container-fluid-sm">
			<div class="block-title">
				<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
				<div class="block-title__description">
				<?php echo wp_kses_post( $settings['title_2'] ); ?>
				</div>
				<div class="title-separator"></div>
			</div>
		   <div class="overflow-hidden">
				<div class="services-tabs">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs services-tabs-nav" role="tablist">
					<?php
						$i = 1;
					if ( ! empty( $settings['item_list'] ) ) {
						foreach ( $settings['item_list'] as $key => $item ) {
							?>
						<li><a href="#" data-icon='icon<?php echo $i; ?>'><?php \Elementor\Icons_Manager::render_icon( $item['icon'], array( 'aria-hidden' => 'true' ) ); ?><span><?php echo wp_kses_post( $item['title_1'] ); ?></span></a></li>
							<?php
							$i++;
						}
					}
					?>
					</ul>
					<!-- Tab panes -->
					<div class="services-tabs-content">
						<div class="services-tabs-caption">
							<?php echo esc_html( $settings['bg_text'] ); ?>
						</div>
						<div class="services-tabs-content-bg-wrap">
							<div class="services-tabs-content-bg">
							<?php
							if ( wp_http_validate_url( $image ) ) {
								?>
									<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
								<?php
							} else {
								echo $image;
							}
							?>
								<div class="services-tabs-icons">
									<?php
									$i = 1;
									if ( ! empty( $settings['item_list'] ) ) {
										foreach ( $settings['item_list'] as $key => $item ) {
											?>
											<span class="services-tabs-icon icon<?php echo $i; ?>" style="left:<?php echo $item['position_left']; ?>;top:<?php echo $item['position_top']; ?>"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], array( 'aria-hidden' => 'true' ) ); ?></span>
											<?php
											$i++;
										}
									}
									?>
								</div>
							</div>
							<div class="services-tabs-modal">
									<div class="container">
									<?php
									$i = 1;
									if ( ! empty( $settings['item_list'] ) ) {
										foreach ( $settings['item_list'] as $key => $item ) {
											?>
									<div class="services-modal icon<?php echo $i; ?>">
										<div class="services-modal-wrapper">
											<div class="services-modal__close-wrapper">
												<button type="button" class="services-modal__close"></button>
											</div>
											<?php
											echo $car_pluginElementor->frontend->get_builder_content( $item['modal'] );
											?>
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
						<div class="services-tab-info">
							<?php
							$i = 1;
							if ( ! empty( $settings['item_list'] ) ) {
								foreach ( $settings['item_list'] as $key => $item ) {
									?>
									<p class="services-tabs-text icon<?php echo $i; ?>"><?php echo wp_kses_post( $item['content'] ); ?></p>
									<?php
									$i++;
								}
							}
							?>
						</div>
						<?php
						if ( ! empty( $settings['button_text'] ) ) {
							if ( ! empty( $settings['btn_link']['url'] ) ) {
								?>
							<div class="services-tab-button">
								<a class="btn btn-border btn-color02" href="<?php echo esc_url( $settings['btn_link']['url'] ); ?>"><span><?php echo esc_html( $settings['button_text'] ); ?></span></a>
							</div>
							<?php } else { ?>
							<div class="services-tab-button">
								<a class="btn btn-border btn-color02 js-tab-modal" href="#"><span><?php echo esc_html( $settings['button_text'] ); ?></span></a>
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
