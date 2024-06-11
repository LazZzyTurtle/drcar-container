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

class About_Company extends Widget_Base {

	public function get_name() {
		return 'about_company';
	}

	public function get_title() {
		return __( 'About Company', 'car-repair-services-core' );
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
				'default'     => __( 'About Company', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'About Car Repair Services', 'car-repair-services-core' ),
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
			'url',
			array(
				'label' => __( 'URL', 'car-repair-services-core' ),
				'type'  => Controls_Manager::URL,
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
				'selector' => '{{WRAPPER}} .tabs-layout01__bg-color .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .tabs-layout01__box p',
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image    = ( $settings['image']['id'] != '' ) ? wp_get_attachment_url( $settings['image']['id'], 'full' ) : $settings['image']['url'];

		wp_enqueue_script( 'magnific-popup' );
		?>

		<div class="tabs-layout02 tabs-layout01__bg-color">
			<div class="tt-col-50 content-center">
				<div class="tabs-layout01__box">
					<div class="tabs-layout01__caption"><?php echo esc_html( $settings['bg_text'] ); ?></div>
					<div class="block-title text-left">
						<div class="block-title__title"><?php echo esc_html( $settings['title'] ); ?></div>
						<div class="title-separator"></div>
					</div>
					<?php echo wp_kses_post( $settings['content'] ); ?>
				</div>
			</div>
			<div class="tt-col-50 tt-col-img">
				<div class="img-bg-col bg-col-2 video-wrapper" style="background-image: url(<?php echo esc_url( $image ); ?>)">
					<a href="<?php echo esc_url( $settings['url']['url'] ); ?>" class="video-block__icon js-popup">
						<span class="icon">
							<svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 191.255 191.255" style="enable-background:new 0 0 191.255 191.255;" xml:space="preserve">
								<path d="M162.929,66.612c-2.814-1.754-6.514-0.896-8.267,1.917s-0.895,6.513,1.917,8.266c6.544,4.081,10.45,11.121,10.45,18.833
									s-3.906,14.752-10.45,18.833l-98.417,61.365c-6.943,4.329-15.359,4.542-22.512,0.573c-7.154-3.97-11.425-11.225-11.425-19.406
									V34.262c0-8.181,4.271-15.436,11.425-19.406c7.153-3.969,15.569-3.756,22.512,0.573l57.292,35.723
									c2.813,1.752,6.513,0.895,8.267-1.917c1.753-2.812,0.895-6.513-1.917-8.266L64.512,5.247c-10.696-6.669-23.661-7-34.685-0.883
									C18.806,10.48,12.226,21.657,12.226,34.262v122.73c0,12.605,6.58,23.782,17.602,29.898c5.25,2.913,10.939,4.364,16.616,4.364
									c6.241,0,12.467-1.754,18.068-5.247l98.417-61.365c10.082-6.287,16.101-17.133,16.101-29.015S173.011,72.899,162.929,66.612z"></path>
								<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
								<g></g><g></g><g></g><g></g><g></g>
							</svg>
						</span>
					</a>
				</div>
				<div class="video-block">
					<a href="<?php echo esc_url( $settings['url']['url'] ); ?>" class="video-block__icon js-popup">
						<span class="icon">
							<svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 191.255 191.255" style="enable-background:new 0 0 191.255 191.255;" xml:space="preserve">
								<path d="M162.929,66.612c-2.814-1.754-6.514-0.896-8.267,1.917s-0.895,6.513,1.917,8.266c6.544,4.081,10.45,11.121,10.45,18.833
									s-3.906,14.752-10.45,18.833l-98.417,61.365c-6.943,4.329-15.359,4.542-22.512,0.573c-7.154-3.97-11.425-11.225-11.425-19.406
									V34.262c0-8.181,4.271-15.436,11.425-19.406c7.153-3.969,15.569-3.756,22.512,0.573l57.292,35.723
									c2.813,1.752,6.513,0.895,8.267-1.917c1.753-2.812,0.895-6.513-1.917-8.266L64.512,5.247c-10.696-6.669-23.661-7-34.685-0.883
									C18.806,10.48,12.226,21.657,12.226,34.262v122.73c0,12.605,6.58,23.782,17.602,29.898c5.25,2.913,10.939,4.364,16.616,4.364
									c6.241,0,12.467-1.754,18.068-5.247l98.417-61.365c10.082-6.287,16.101-17.133,16.101-29.015S173.011,72.899,162.929,66.612z"></path>
								<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
							</svg>
						</span>
					</a>
					<img src="<?php echo esc_url( $image ); ?>" alt="">
				</div>
			</div>
		</div>
		<?php
	}

}
