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

class About_Us_One extends Widget_Base {

	public function get_name() {
		return 'about_us_1';
	}

	public function get_title() {
		return __( 'About Us 1', 'car-repair-services-core' );
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
				'label' => __( 'Content', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'About <span class="color">Us</span>', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'       => __( 'Content', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::WYSIWYG,
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => __( 'Image', 'car-repair-services-core' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => array(
					'active' => true,
				),
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'bottom_content_section',
			array(
				'label' => __( 'Bottom Content', 'car-repair-services-core' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'car-repair-services-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mission Statement' , 'car-repair-services-core' ),
			]
		);

		$repeater->add_control(
			'description', [
				'label' => esc_html__( 'Content', 'car-repair-services-core' ),
				'type' => Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Repeater List', 'car-repair-services-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'car-repair-services-core' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'car-repair-services-core' ),
					],
				]
			]
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
				'selector' => '{{WRAPPER}} .wrapper-parallax-left02 p',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_title_typography',
				'label'    => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .subtitle',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_content_typography',
				'label'    => __( 'Item Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} p',
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings  = $this->get_settings_for_display();
		$image_url = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		?>

		<div class="block">
			<div class="container no-indent">
				<div class="wrapper-parallax-left02">
					<div class="col-img">
						<?php
						if ( wp_http_validate_url( $image_url ) ) {
							?>
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
								<?php
						} else {
							echo $image_url;
						}
						?>
					</div>
					<div class="col-description">
						<div class="block-title text-left">
							<h3 class="block-title__title">
							<?php echo wp_kses_post( $settings['title'] ); ?>
							</h3>
							<div class="title-separator"></div>
						</div>
						<?php echo wp_kses_post( $settings['content'] ); ?>
					</div>
				</div>
				<div class="divider-md"></div>
				<div class="row">
				<?php
				foreach ( $settings['items'] as $key => $value ) {
					?>
					<div class="col-md-4">
						<h6 class="subtitle"><?php echo $value['title']; ?></h6>
						<?php echo $value['description']; ?>
					</div>
					<?php if ( ( $key !== count( $settings['items'] ) - 1 ) ) { ?>
					<div class="divider-md hidden-lg hidden-md"></div>
					<?php } ?>
					<?php
				}
				?>
				</div>
			</div>
		</div>
		<?php
	}
}
