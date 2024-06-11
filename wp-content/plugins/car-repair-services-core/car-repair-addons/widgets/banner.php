<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Plugin;
use Elementor\Utils;
use Elementor\Widget_Base;
use Elementor\Group_Control_Typography;


class Banner extends Widget_Base {

	public function get_name() {
		return 'crs_banner';
	}

	public function get_title() {
		return __( 'Banner', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'heading_settings',
			array(
				'label' => __( 'Heading Title', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'       => __( 'Heading', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'What We Do', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'       => __( 'Sub Heading', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'We offer full service auto repair & maintenance', 'car-repair-services-core' ),
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'crs_content_settings',
			array(
				'label' => __( 'Content Settings', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'crs_banner_tabs_tab',
			array(
				'type'      => Controls_Manager::REPEATER,
				'seperator' => 'before',
				'default'   => array(
					array( 'tab_title' => __( 'Item', 'car-repair-services-core' ) ),
					array( 'tab_title' => __( 'Item', 'car-repair-services-core' ) ),
					array( 'tab_title' => __( 'Item', 'car-repair-services-core' ) ),
					array( 'tab_title' => __( 'Item', 'car-repair-services-core' ) ),
				),
				'fields'    => array(
					array(
						'name'    => 'tab_title',
						'label'   => __( 'Tab Title', 'car-repair-services-core' ),
						'type'    => Controls_Manager::TEXT,
						'default' => __( 'Tab Title', 'car-repair-services-core' ),
					),
					array(
						'name'    => 'background_type',
						'label'   => __( 'Background Type', 'car-repair-services-core' ),
						'type'    => Controls_Manager::SELECT,
						'default' => 'text',
						'options' => array(
							'text'  => __( 'Text & Image', 'car-repair-services-core' ),
							'image' => __( 'Only Image', 'car-repair-services-core' ),
						),
					),
					array(
						'name'        => 'title',
						'label'       => __( 'Title', 'car-repair-services-core' ),
						'label_block' => true,
						'type'        => Controls_Manager::TEXTAREA,
						'default'     => __( 'Preventative<br>Maintenance', 'car-repair-services-core' ),
						'condition'   => array(
							'background_type' => 'text',
						),
						'placeholder' => __( 'Title', 'car-repair-services-core' ),
					),
					array(
						'name'      => 'content',
						'label'     => __( 'Content', 'car-repair-services-core' ),
						'type'      => Controls_Manager::TEXTAREA,
						'default'   => __( 'The best way to minimize breakdowns is doing routine maintenance', 'car-repair-services-core' ),
						'condition' => array(
							'background_type' => 'text',
						),
					),
					array(
						'name'    => 'image',
						'label'   => __( 'Image', 'car-repair-services-core' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => array(
							'url' => Utils::get_placeholder_image_src(),
						),
					),
					array(
						'name'          => 'action_link',
						'label'         => __( 'Action Button', 'car-repair-services-core' ),
						'type'          => Controls_Manager::URL,'default'       => array(
							'url'         => '',
							'is_external' => '',
						),
						'show_external' => true, // Show the 'open in new tab' button.
					),
					array(
						'name'  => 'bg_text',
						'label' => __( 'Bg Text', 'car-repair-services-core' ),
						'type'  => Controls_Manager::TEXT,
					),
					array(
						'name'  => 'bg_text_class',
						'label' => __( 'Bg Text Class', 'car-repair-services-core' ),
						'type'  => Controls_Manager::TEXT,
					),
					array(
						'name'  => 'extra_class',
						'label' => __( 'Extra Class', 'car-repair-services-core' ),
						'type'  => Controls_Manager::TEXT,
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
				'selector' => '{{WRAPPER}} .services-block .caption h3',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .services-block .caption .text',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		?>
	<div class="block">
		<div class="container">
			<?php if ( ! empty( $settings['heading'] ) || ! empty( $settings['sub_heading'] ) ) { ?>
			<div class="block-title">
				<h2 class="block-title__title"><?php echo esc_html( $settings['heading'] ); ?></h2>
				<div class="block-title__description">
				<?php echo esc_html( $settings['sub_heading'] ); ?>
				</div>
				<div class="title-separator"></div>
			</div>
				<?php
			}
			?>
			<div class="services-block">
			<?php
			foreach ( $settings['crs_banner_tabs_tab'] as $tab ) {
					$image = wp_get_attachment_image( $tab['image']['id'], 'car-repair-services-thumbnail-carousel' );
				?>
				<div class="service <?php echo $tab['extra_class']; ?>">
					<?php
					if ( ! empty( $tab['background_type'] ) && $tab['background_type'] == 'image' ) {
						$link   = $tab['action_link'];
						$url    = $link['url'];
						$target = $link['is_external'] ? 'target="_blank"' : '';
						?>
						<a href="<?php echo esc_url( $url ); ?>" <?php echo $target; ?> class="image image-scale">
						<?php
						if ( wp_http_validate_url( $image ) ) {
							?>
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_html__( 'Alt', 'car-repair-core' ); ?>">
								<?php
						} else {
							echo $image;
						}
						?>
						</a>
						<?php
					} else {
						if ( ! empty( $tab['action_link'] ) ) {
						$link   = $tab['action_link'];
						$url    = $link['url'];
						$target = $link['is_external'] ? 'target="_blank"' : '';
						?>
						<div class="image">
						<a href="<?php echo esc_url( $url ); ?>" <?php echo $target; ?>>
						<?php }
						if ( wp_http_validate_url( $image ) ) {
							?>
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_html__( 'Alt', 'car-repair-service-core' ); ?>">
								<?php
						} else {
							echo $image;
						}
						?>
						</div>
						<div class="caption">
							<div class="services__text-background <?php echo esc_attr( $tab['bg_text_class'] ); ?>"><?php echo esc_html( $tab['bg_text'] ); ?></div>
							<div class="vert-wrap">
								<div class="vert">
									<h3><?php echo wp_kses_post( $tab['title'] ); ?></h3>
									<div class="text"><?php echo do_shortcode( $tab['content'] ); ?>
									</div>
								</div>
							</div>
						</div>
						<?php if ( ! empty( $tab['action_link'] ) ) { ?> </a> <?php } ?>
					<?php } ?>
				</div>
				<?php
			}
			?>
			</div>
		</div>
	</div>
		<?php
	}

	protected function content_template() {

	}
}
