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


class BannerUnderSlider extends Widget_Base {


	public function get_name() {
		return 'banner_under_slider';
	}

	public function get_title() {
		return __( 'Banner Under Slider', 'car-repair-services-core' );
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
				'label' => __( 'Banner Under Slider', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'   => __( 'Title 1', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'After Hours', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_2',
			array(
				'label'   => __( 'Title 2', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Drop-OFF', 'car-repair-services-core' ),
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
			'action_link',
			array(
				'label'   => __( 'Action Button', 'car-repair-services-core' ),
				'type'    => Controls_Manager::URL,
				'default' => array(
					'url'         => 'http://',
					'is_external' => '',
				),
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'   => __( 'Action Button Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Get Estimate', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'content',
			array(
				'label'   => __( 'Content', 'car-repair-services-core' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => __( 'We realize that you lead a busy life, so we have made it easy for you to drop off your vehicle 24/7.', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label' => __( 'Add Extra Class', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
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
				'selector' => '{{WRAPPER}} .promo-01 .promo-01__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .promo-01 .promo-01__description',
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$link     = $settings['action_link'];
		$url      = $link['url'];
		$target   = $link['is_external'] ? 'target="_blank"' : '';
		?>

		<div class="block block-wrapper-01 <?php echo $settings['extra_class']; ?>">
			<div class="container container-tablet-md">
				<div class="promo-01">
					<div class="promo-01__col-left">
						<div class="promo-01__title">
							<div class="text-01"><?php echo esc_html( $settings['title_1'] ); ?></div>
							<div class="text-02"><?php echo esc_html( $settings['title_2'] ); ?></div>
						</div>
					</div>
					<div class="promo-01__col-center">
						<div class="promo-01__description">
		<?php echo $settings['content']; ?>
						</div>
						<div class="promo-01__img"><img src="<?php echo esc_url_raw( $settings['image']['url'] ); ?>" alt=""></div>
					</div>
					<div class="promo-01__col-right">
							<?php
							if ( $url ) {
								?>
							<a href="<?php echo esc_url( $url ); ?>"
								<?php
								if ( ! ( empty( $target ) ) ) :
									?>
					target="<?php echo $target; ?>" 
									<?php
								endif;
								?>
											class="btn btn-border"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
							<?php } else { ?>
											<a href="#anchoring-link01" class="btn btn-border anchoring-link"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
