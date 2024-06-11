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

class BannerServices extends Widget_Base {

	public function get_name() {
		return 'banner_services';
	}

	public function get_title() {
		return __( 'Banner Services', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title',
			array(
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_1',
			array(
				'label'   => __( 'Title 1', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '24 Hour</span> Breakdown Service', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'   => __( 'Title 2', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'To order a Breakdown Recovery Service now or if you require a quote, please contact us', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_3',
			array(
				'label'   => __( 'Title 3', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '1-800-123-4567', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_4',
			array(
				'label'   => __( 'Title 4', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => __( 'Whether you’re the driver of your own car or a rental, you’re covered 24/7, 365 days a year', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'icon',
			array(
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => array(
					'value' => 'icon icon-tow-truck',
					'library' => 'solid',
				),
			)
		);
		$this->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'car-repair-services-core' ),
				'type'    => Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'action_link',
			array(
				'label'   => __( 'Action Link', 'car-repair-services-core' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url'         => 'http://',
					'is_external' => '',
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
				'name'     => 'title1_typography',
				'label'    => __( 'Title 1 Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .banner-service .banner-text-1',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title2_typography',
				'label'    => __( 'Title 2 Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .banner-service .banner-text-2',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title3_typography',
				'label'    => __( 'Title 3 Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .banner-service .banner-text-3',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title4_typography',
				'label'    => __( 'Title 4 Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .banner-service .banner-text-4',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$url      = $settings['action_link']['url'];
		$image    = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full', '', array( 'class' => 'visible-sm visible-xs' ) ) : $settings['image']['url'];
		?>

		<a href="<?php esc_url( $url ); ?>" class="banner-service">
		<?php
		if ( wp_http_validate_url( $image ) ) {
			?>
					<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
				<?php
		} else {
			echo $image;
		}
		?>
			<div class="row-flex">
				<div class="col-left">
					<!-- <i class="icon icon-tow-truck"></i> -->
				<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<div class="col-center">
					<div class="banner-text-1"><?php echo $settings['title_1']; ?></div>
					<div class="banner-text-2"><?php echo $settings['title_2']; ?></div>
				</div>
				<div class="col-right">
					<div class="banner-text-3"><i class="icon icon-phone"></i><?php echo $settings['title_3']; ?></div>
					<div class="banner-text-4"><?php echo $settings['title_4']; ?></div>
				</div>
			</div>
		</a>

		<?php
	}
}
