<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;


class Contact_Page extends Widget_Base {
	public function get_name() {
		return 'contact_page';
	}

	public function get_title() {
		return esc_html__( 'Contact Page', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-mail';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}
	protected function register_controls() {

		$this->start_controls_section(
			'contact_content',
			array(
				'label' => esc_html__( 'Widget Content', 'car-repair-services-core' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background', 'plugin-domain' ),
				'types'    => array( 'classic' ),
				'selector' => '{{WRAPPER}} .section-bg01',
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'       => __( 'Heading', 'car-repair-services-core' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => __(
					'Get In Touch!',
					'car-repair-services-core'
				),
			)
		);
		$this->add_control(
			'subheading',
			array(
				'label'   => __( 'Sub Heading', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Get your automotive-related questions answered by a mechanic', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'cf7',
			array(
				'label'       => esc_html__( 'Select Contact Form', 'car-repair-services-core' ),
				'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'electriciancore' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => false,
				'label_block' => 1,
				'options'     => get_contact_form_7_posts(),
			)
		);
		$this->add_control(
			'items',
			array(
				'type'      => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default'   => array(
					array( 'tab_title' => __( 'Item 1', 'car-repair-services-core' ) ),
				),
				'fields'    => array(
					array(
						'name'  => 'icon',
						'label' => __( 'Icon', 'car-repair-services-core' ),
						'type'  => Controls_Manager::ICONS,
					),
					array(
						'name'    => 'title',
						'label'   => __( 'Title', 'car-repair-services-core' ),
						'type'    => Controls_Manager::TEXT,
						'default' => __( 'Post Address', 'car-repair-services-core' ),
					),
					array(
						'name'    => 'content',
						'label'   => __( 'Conetnt', 'car-repair-services-core' ),
						'type'    => Controls_Manager::TEXTAREA,
						'default' => __( '2605 Caton Hill Road, Woodbridge,<br>VA 22192', 'car-repair-services-core' ),
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
				'name'     => 'title_typography1',
				'label'    => __( 'Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title > :nth-child(1)',
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
				'selector' => '{{WRAPPER}} .info02 .info02__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .info02 address',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		// to show on the fontend
		$settings = $this->get_settings_for_display();
		?>
		<div class="section-bg01">
			<div class="block">
				<div class="container no-gutters">
					<div class="row ">
						<div class="col-sm-5 col-md-4 col-sm-push-7 col-md-push-8">
							<div class="info02-wrapper">
							<?php
							foreach ( $settings['items'] as $item ) {
								?>
								<div class="info02">
									<div class="info02__icon"><span class="<?php echo wp_kses_post( $item['icon']['value'] ); ?>"></span></div>
									<h6 class="info02__title">
										<?php echo esc_html( $item['title'] ); ?>
									</h6>
									<address>
									<?php echo wp_kses_post( $item['content'] ); ?>
									</address>
								</div>
								<?php
							}
							?>
							</div>
						</div>
						<div class="divider-lg hidden-lg hidden-md hidden-sm"></div>
						<div class="col-sm-7 col-md-8 col-sm-pull-5 col-md-pull-4">
							<div class="box-wrapper">
								<div class="block-title text-left">
									<h2 class="block-title__title"><?php echo wp_kses_post( $settings['heading'] ); ?></h2>
									<div class="block-title__description">
									<?php echo wp_kses_post( $settings['subheading'] ); ?>
									</div>
									<div class="title-separator"></div>
								</div>
								<?php
								if ( ! empty( $settings['cf7'] ) ) {
									echo do_shortcode( '[contact-form-7 id="' . $settings['cf7'] . '"]' );
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
