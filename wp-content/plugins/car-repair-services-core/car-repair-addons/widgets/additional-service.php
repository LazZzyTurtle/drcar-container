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

class Additional_Service extends Widget_Base {

	public function get_name() {
		return 'additional_service';
	}

	public function get_title() {
		return __( 'Additional Service', 'car-repair-services-core' );
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
			'bg_text',
			array(
				'label'       => __( 'BG Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Additional', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'subtitle',
			array(
				'label'       => __( 'Subtitle', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Below are some of the many auto repair services we offer:', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'image',
			array(
				'label'       => __( 'Image', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::MEDIA,
				'default'     => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
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
				'selector' => '{{WRAPPER}} .tt-col-50.tabs-layout01__bg01.content-center.tabs-layout01__bg-color .tabs-layout01__box p',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .tt-col-50.tabs-layout01__bg01.content-center.tabs-layout01__bg-color .tabs-layout01__box ul p',
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings  = $this->get_settings_for_display();
		$image_url = ( $settings['image']['id'] != '' ) ? wp_get_attachment_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image     = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		?>

		<div class="tabs-layout01">
			<div class="tt-col-50">
				<div class="img-bg-col bg-col-1" style="background-image: url(<?php echo esc_url( $image_url ); ?>)"></div>
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
			<div class="tt-col-50 tabs-layout01__bg01 content-center tabs-layout01__bg-color">
				<div class="tabs-layout01__box">
					<div class="tabs-layout01__caption"><?php echo esc_html( $settings['bg_text'] ); ?></div>
					<p>
					<?php echo wp_kses_post( $settings['subtitle'] ); ?>
					</p>
					<ul class="marker-list-sm-1 column-gap-2">
					<?php echo wp_kses_post( $settings['content'] ); ?>

					</ul>
					<a href="#" class="js-add-li btn-add btn-top"><?php echo esc_html( $settings['btn_text'] ); ?></a>
				</div>
			</div>
		</div>

		<?php
	}

}
