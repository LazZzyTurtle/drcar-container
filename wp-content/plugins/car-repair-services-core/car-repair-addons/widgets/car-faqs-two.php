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

class Car_Faqs_Two extends Widget_Base {

	public function get_name() {
		return 'car_faq_two';
	}

	public function get_title() {
		return __( 'Car Faqs 2', 'car-repair-services-core' );
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
				'label' => __( 'FAQ List', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Auto Maintenance FAQs', 'car-repair-services-core' ),
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title_1',
			array(
				'label'       => __( 'Question', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);
		$repeater->add_control(
			'title_2',
			array(
				'label'       => __( 'Answere', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
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
						'title_1' => __( 'Q: How often should I get my oil changed?', 'car-repair-services-core' ),
						'title_2' => __( 'A: For a long time and sometimes still today, standard practice at many lube shops is to suggest oil changes every three months or 3,000 miles. In order to know when the best time to get your oil changed is, check the owner’s manual of your specific model for manufacturer-recommended intervals.', 'car-repair-services-core' ),
					),
				),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_form',
			array(
				'label' => __( 'Content Section', 'car-repair-services-core' ),
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

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Diagnostics,<br>Repairs &amp; Servicing', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'button_text',
			array(
				'label'   => __( 'Button Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Book an Appointment',
			)
		);
		$this->add_control(
			'action_link',
			array(
				'label'   => __( 'Button Link', 'car-repair-services-core' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url'         => 'http://',
					'is_external' => '',
				),
			)
		);

		$this->add_control(
			'content_1',
			array(
				'label'       => __( 'Select Service Banner', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::SELECT,
				'options'     => get_elementor_library(),
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
				'name'     => 'item_title_typography',
				'label'    => __( 'Faq Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .faq-accordion .faq__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Faq Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .faq-accordion .faq__item .faq__content',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$image               = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$button_text         = $settings['button_text'];
		$link                = $settings['action_link'];
		$url                 = $link['url'];
		$target              = $link['is_external'] ? 'target="_blank"' : '';
		$car_pluginElementor = \Elementor\Plugin::instance();
		?>
	<div class="block">
		<div class="container">
			<div class="row">

				<div class="col-md-6">
					<div class="block-title text-left">
						<h4 class="block-title__title"><?php echo $settings['title_1']; ?></h4>
					</div>
					<div class="faq-accordion">
					<?php
					if ( ! empty( $settings['item_list'] ) ) {
						$i = 1;
						foreach ( $settings['item_list'] as $key => $item ) {
							$isActive   = '';
							$isActive_1 = '';
							$coll       = 'collapsed';
							if ( $key == 0 ) {
								$isActive   = 'activate';
								$isActive_1 = 'active';
								$coll       = '';
							}
							?>
							<div class="faq__item 
							<?php
							if ( $isActive_1 == 'active' ) {
								echo 'active';}
							?>
							">
								<div class="faq__title">
									<?php echo wp_kses_post( $item['title_1'] ); ?>
									<div class="icon"></div>
								</div>
								<div class="faq__content">
								<?php echo wp_kses_post( $item['title_2'] ); ?>
								</div>
							</div>
							<?php
							$i++;
						}
					}
					?>
					 
					</div>
				</div>              
				<div class="divider-xl visible-sm visible-xs"></div>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="promo01-layout-right">
						<div class="promo01">
							<div class="image-box">
							<?php
							if ( wp_http_validate_url( $image ) ) {
								?>
									<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
								<?php
							} else {
								echo $image;
							}
							?>
							</div>
							<div class="pt-description pt-point-v-b pt-point-h-l">
								<div class="pt-description-wrapper">
									<div class="pt-title"><?php echo $settings['title']; ?></div>
									<?php
									if ( $url ) {
										?>
									<a href="<?php echo esc_url($url); ?>"
										<?php
										if ( ! ( empty( $target ) ) ) :
											?>
								target="<?php echo $target; ?>" 
											<?php
										endif;
										?>
													class="btn btn-border btn-color02"><span><?php echo esc_html( $settings['button_text'] ); ?></span></a>
									<?php } else { ?>
										<a class="btn btn-border btn-color02" href="#" data-toggle="modal" data-target="#appointmentForm"><span><?php echo esc_html( $button_text ); ?></span></a>
									<?php } ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="divider-xxl visible-xs visible-lg visible-md"></div>
				<div class="col-xs-12 col-sm-6 col-md-12 banner-col">
					<?php echo $car_pluginElementor->frontend->get_builder_content( $settings['content_1'] ); ?>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
}
