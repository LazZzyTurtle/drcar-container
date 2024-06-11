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

class ServiceGallery extends Widget_Base {

	public function get_name() {
		return 'service_gallery';
	}

	public function get_title() {
		return __( 'Service Gallery', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'service_section_gallery',
			array(
				'label' => __( 'Gallery', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Our Service <span class="color">Gallery</span>', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'These photos will help you learn more about our car service and services provided', 'car-repair-services-core' ),
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image',
			array(
				'label' => __( 'Image', 'car-repair-services-core' ),
				'type'  => Controls_Manager::MEDIA,
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
		$this->start_controls_section(
			'section_carousel_options',
			array(
				'label' => __( 'Carousel Settings', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'slides_to_show',
			array(
				'label'              => __( 'How many Slides to show?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 4,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'slides_to_scroll',
			array(
				'label'              => __( 'How many Slides to Scroll?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 1,
				'frontend_available' => true,
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'       => __( 'Autoplay Slides', 'car-repair-services-core' ),
				'description' => __( 'Slide will start automatically', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
			)
		);

		$this->add_control(
			'autoplay_speed',
			array(
				'label'              => __( 'Autoplay Speed', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 4000,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'arrows',
			array(
				'label'       => __( 'Enable Arrows', 'car-repair-services-core' ),
				'description' => __( 'Enable Arrows', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'off',
			)
		);

		$this->add_control(
			'dots',
			array(
				'label'       => __( 'Enable Dots', 'car-repair-services-core' ),
				'description' => __( 'Enable Dots', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
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

		$this->end_controls_section();
	}

	protected function render() {

		$settings         = $this->get_settings();
		$slides_to_show   = $settings['slides_to_show'];
		$slides_to_scroll = $settings['slides_to_scroll'];
		$autoplay_speed   = $settings['autoplay_speed'];

		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = 'true';
		} else {
			$autoplay = 'false';
		}
		if ( $settings['arrows'] == 'yes' ) {
			$arrows = 'true';
		} else {
			$arrows = 'false';
		}
		if ( $settings['dots'] == 'yes' ) {
			$dots = 'true';
		} else {
			$dots = 'false';
		}
		?>

		<div class="block">
			<div class="block-title">
				<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
				<div class="block-title__description">
				<?php echo wp_kses_post( $settings['title_2'] ); ?>
				</div>
			</div>
			<div class="js-slick-init service-gallery-carousel slick-style01" data-slick='{
				"slidesToShow": <?php echo $slides_to_show; ?>, 
				"slidesToScroll": <?php echo $slides_to_scroll; ?>,
				"dots": <?php echo $dots; ?>,
				"arrows": <?php echo $arrows; ?>,
				"autoplay": <?php echo $autoplay; ?>,
				"autoplaySpeed": <?php echo $autoplay_speed; ?>,
				"responsive":[{"breakpoint": 992,"settings":{"slidesToShow": 3}}, {"breakpoint": 576,"settings":{"slidesToShow": 2}}]}'>
			<?php
			if ( ! empty( $settings['item_list'] ) ) {
				foreach ( $settings['item_list'] as $item ) {
					$image     = ( $item['image']['id'] != '' ) ? wp_get_attachment_image( $item['image']['id'], 'full' ) : $item['image']['url'];
					$image_url = ( $item['image']['id'] != '' ) ? wp_get_attachment_image_url( $item['image']['id'], 'full' ) : $item['image']['url'];
					?>
						
				<div class="item">
					<a href="<?php echo esc_url( $image_url ); ?>" class="popup-img">
					<?php
					if ( wp_http_validate_url( $image ) ) {
						?>
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
							<?php
					} else {
						echo $image;
					}
					?>
					</a>
				</div>
					<?php
				}
			}
			?>			   
			</div>
		</div>
		<?php
	}
}
