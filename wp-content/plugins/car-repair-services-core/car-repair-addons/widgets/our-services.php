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

class Our_Services extends Widget_Base {

	public function get_name() {
		return 'our_services';
	}

	public function get_title() {
		return __( 'Our Services', 'car-repair-services-core' );
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
				'label' => __( 'Section', 'car-repair-services-core' ),
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background Image', 'car-repair-services-core' ),
				'types'    => array( 'classic' ),
				'selector' => '{{WRAPPER}} .block',
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => __( 'Title 1', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Repair Services That <span class="color">We Offer</span>', 'car-repair-services-core' ),
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title 2', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __( 'Below are some of the many auto repair services we offer:', 'car-repair-services-core' ),
				'placeholder' => __( 'Type your title here', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'bg_text',
			array(
				'label'       => __( 'BG TEXT', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Services', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'btn_text',
			array(
				'label'       => __( 'Button TEXT', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Book an Appointment', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'btn_link',
			array(
				'label'       => __( 'Button Link', 'car-repair-services-core' ),
				'type'        => Controls_Manager::URL,
				'description' => __( '<strong>Using this field will disable the pop up form</strong>', 'car-repair-services-core'),
				'placeholder'   => esc_html__( 'https://your-link.com', 'car-repair-services-core-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => '',
					'nofollow'    => '',
				),
			)
		);
		$this->add_control(
			'extra_class',
			array(
				'label'       => __( 'Extra Class', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'bg-1', 'car-repair-services-core' ),
			)
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'extra_class',
			array(
				'label'       => __( 'Extra Class', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,

			)
		);

		$repeater->add_control(
			'content',
			array(
				'label'       => __( 'Content', 'car-repair-services-core' ),
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
						'extra_class' => '',

					),
					array(
						'extra_class' => 'view-more-mobile view-more-tablet',

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
				'name'     => 'title_typography',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} p',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
	
		

		if ( $settings['background_background'] ) {
			$bg_class    = 'block bg-1';
			$btn_class   = 'btn btn-top btn-border hide-onlymobile';
			$btn_class_2 = 'btn btn-top btn-border show-onlymobile';
		} else {
			$bg_class    = 'block';
			$btn_class   = 'btn btn-top btn-border hide-onlymobile btn-invert';
			$btn_class_2 = 'btn btn-top btn-border show-onlymobile btn-invert';
		}
		?>
		<div class="<?php echo esc_attr( $bg_class ); ?>">
		  <div class="container position-relative">
			<div class="section__text-background text-color01"><?php echo esc_html( $settings['bg_text'] ); ?></div>
			 <div class="row" id="slideMobile">
				<div class="col-sm-6 col-md-4">
					<div class="block-title text-left">
						<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title_1'] ); ?></h2>
						<div class="title-separator"></div>
					</div>
					<p>
					<?php echo wp_kses_post( $settings['title_2'] ); ?>
					</p>
					<?php if(!empty($settings["btn_link"]["url"])){ 
							$btn_link = $settings["btn_link"]["url"];
							$btn_link_external = $settings["btn_link"]["is_external"] ? 'target="_blank"' : '';
							$btn_link_nofollow = $settings["btn_link"]["nofollow"] ? 'rel="nofollow"' : '';
					?>
						<a href="<?php echo esc_url($btn_link); ?>" <?php echo $btn_link_external; ?> <?php echo $btn_link_nofollow; ?> class="<?php echo esc_attr( $btn_class ); ?>"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
					<?php }else{ ?>
					<a href="#" data-toggle="modal" data-target="#appointmentForm" class="<?php echo esc_attr( $btn_class ); ?>"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
					<?php } ?>
				</div>
				<?php
				if ( ! empty( $settings['item_list'] ) ) {
					foreach ( $settings['item_list'] as $item ) {
						?>
						<div class="col-sm-6 col-md-4 <?php echo esc_attr( $item['extra_class'] ); ?>">
						   <ul class="marker-list">
							<?php echo wp_kses_post( $item['content'] ); ?>
							</ul>
							<a href="#" class="js-add-points show-tablet btn-add btn-top"><?php echo esc_html__( '+ More Services', 'car-repair-services-core' ); ?></a><br>
							<a href="#" data-toggle="modal" data-target="#appointmentForm" class="<?php echo esc_attr( $btn_class_2 ); ?>"><span><?php echo esc_html( $settings['btn_text'] ); ?></span></a>
					</div>
						<?php
					}
				}
				?>
		</div>
	</div>
</div>
		<?php
	}

}
