<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class CounterBlock extends Widget_Base {

	public $slick_default = array(
		'navigation' => true,
		'arrow'      => false,
	);

	public function get_name() {
		return 'CounterBlock';
	}

	public function get_title() {
		return __( 'Counter Block', 'car-repair-serivce-core' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'car-repair-serivce-core' ),
			)
		);
		$this->add_control(
			'design_style',
			array(
				'label'   => __( 'Style', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'Style 1', 'car-repair-services-core' ),
					'2' => __( 'Style 2', 'car-repair-services-core' ),
				),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-serivce-core' ),
				'label_block' => true,
				'default'     => __( 'The Car Repair Statistics', 'car-repair-serivce-core' ),
				'type'        => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'title_2',
			array(
				'label'       => __( 'Title', 'car-repair-serivce-core' ),
				'label_block' => true,
				'default'     => __( "Auto repair technical statistics you must to know. Whether you're coming in for a routine inspection, oil change or a repair service, we promise that you will be completely satisfied with our work.", 'car-repair-serivce-core' ),
				'type'        => Controls_Manager::TEXTAREA,
			)
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'background',
				'label'    => __( 'Background Image', 'car-repair-services-core' ),
				'types'    => array( 'classic' ),
				'selector' => '{{WRAPPER}} .box02-wrapper01',
			)
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'YEARS OF EXPERIENCE', 'car-repair-services-core' ),
			)
		);
		$repeater->add_control(
			'icon',
			array(
				'label'       => __( 'Icon', 'car-repair-services-core' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
			)
		);
		$repeater->add_control(
			'count_number',
			array(
				'label'   => __( 'Counter Value', 'car-repair-services-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
			)
		);
		$repeater->add_control(
			'count_text',
			array(
				'label'   => __( 'Counter Text', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '10',
			)
		);
		$repeater->add_control(
			'number_scrolling_speed',
			array(
				'label'   => __( 'Speed', 'car-repair-services-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4000,
			)
		);
		$repeater->add_control(
			'after_count_number',
			array(
				'label' => __( 'After Counter Number', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$repeater->add_control(
			'another_count_number',
			array(
				'label' => __( 'Another Counter Number', 'car-repair-services-core' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		$repeater->add_control(
			'count_text_2',
			array(
				'label'      => __( 'Counter Text Two', 'car-repair-services-core' ),
				'type'       => Controls_Manager::TEXT,
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'another_count_number',
							'operator' => '==',
							'value'    => 'yes',
						),
					),
				),
			)
		);
		$repeater->add_control(
			'count_number_2',
			array(
				'label'      => __( 'Counter Value Two', 'car-repair-services-core' ),
				'type'       => Controls_Manager::NUMBER,
				'default'    => 10,
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'another_count_number',
							'operator' => '==',
							'value'    => 'yes',
						),
					),
				),
			)
		);
		$repeater->add_control(
			'after_count_number_2',
			array(
				'label'      => __( 'After Counter Number Two', 'car-repair-services-core' ),
				'type'       => Controls_Manager::TEXT,
				'conditions' => array(
					'terms' => array(
						array(
							'name'     => 'another_count_number',
							'operator' => '==',
							'value'    => 'yes',
						),
					),
				),
			)
		);
		$this->add_control(
			'slider_list',
			array(
				'label'  => __( 'Item List', 'car-repair-serivce-core' ),
				'type'   => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'right_content',
			array(
				'label' => __( 'Right Content', 'car-repair-serivce-core' ),
			)
		);
		$this->add_control(
			'image',
			array(
				'label' => __( 'Image', 'car-repair-services-core' ),
				'type'  => Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'url',
			array(
				'label' => __( 'URL', 'car-repair-serivce-core' ),
				'type'  => Controls_Manager::URL,
			)
		);
		$this->add_control(
			'button_class',
			array(
				'label'       => __( 'Button Class', 'car-repair-serivce-core' ),
				'label_block' => true,
				'default'     => __( 'js-popup', 'car-repair-serivce-core' ),
				'type'        => Controls_Manager::TEXT,
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
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'title_typography',
				'label'     => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .stat-box02 .stat-box02__title > *',
				'condition' => array( 'design_style' => '1' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'number_typography',
				'label'     => __( 'Item Number Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .stat-box02 .stat-box02__value .count',
				'condition' => array( 'design_style' => '1' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'title2_typography',
				'label'     => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .start-box02 .start-box02__text',
				'condition' => array( 'design_style' => '2' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'number2_typography',
				'label'     => __( 'Item Number Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .start-box02 .start-box02__number',
				'condition' => array( 'design_style' => '2' ),
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'jquery-countTo' );
		wp_enqueue_script( 'magnific-popup' );

		$image_url = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];

		$button_class = $settings['button_class'];
		?>

		<?php if ( $settings['design_style'] == '2' ) { ?>
		<div class="block box02-wrapper01 block__nomargin">
			<div class="container">
				<div class="row" id="counterBlock">
					<?php
					if ( ! empty( $settings['slider_list'] ) ) {
						foreach ( $settings['slider_list'] as  $item ) {
							$title                  = $item['title'];
							$count_number           = $item['count_number'];
							$count_text             = $item['count_text'];
							$number_scrolling_speed = $item['number_scrolling_speed'];
							$after_count_number     = $item['after_count_number'];
							$count_text_2           = $item['count_text_2'];
							$count_number_2         = $item['count_number_2'];
							$after_count_number_2   = $item['after_count_number_2'];
							$another_count_number   = $item['another_count_number'];

							?>
					<div class="col-xs-12 col-sm-6 col-lg-3">
						<div class="start-box02">
							<div class="start-box02__number">
								<span class="number">
									<span class="count" data-to="<?php echo esc_attr( $count_number ); ?>" data-speed="<?php echo esc_attr( $number_scrolling_speed ); ?>"><?php echo esc_html( $count_text ); ?></span><?php echo $after_count_number; ?>
									<?php if ( $another_count_number == 'yes' ) { ?>
										<span class="count" data-to="<?php echo esc_attr( $count_number_2 ); ?>" data-speed="<?php echo esc_attr( $number_scrolling_speed ); ?>"><?php echo esc_html( $count_text_2 ); ?></span><?php echo $after_count_number_2; ?>
									<?php } ?>
								</span>
							</div>
							<div class="start-box02__text">
								<?php echo wp_kses_post( $title ); ?>
							</div>
						</div>
					</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	<?php } else { ?>
			<div class="block">
				<div class="container">
					<div class="row text-center-tablet" id="counterBlock">
						<div class="col-lg-6">
							<div class="block-title text-left block-title__small-indent">
								<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
							</div>
							<p>
							<?php echo wp_kses_post( $settings['title_2'] ); ?>
							</p>
							<div class="row stat-box02-wrapper" id="counterBlock">
							<?php
							$i = 1;
							if ( ! empty( $settings['slider_list'] ) ) {
								foreach ( $settings['slider_list'] as  $item ) {
									$title                  = $item['title'];
									$count_number           = $item['count_number'];
									$count_text             = $item['count_text'];
									$number_scrolling_speed = $item['number_scrolling_speed'];
									$after_count_number     = $item['after_count_number'];
									$count_text_2           = $item['count_text_2'];
									$count_number_2         = $item['count_number_2'];
									$after_count_number_2   = $item['after_count_number_2'];
									$another_count_number   = $item['another_count_number'];

									?>
									<div class="col-sm-6">
										<div class="stat-box02">
											<div class="stat-box02__value"><span class="number">
												<span class="count" data-to="<?php echo esc_attr( $count_number ); ?>" data-speed="<?php echo esc_attr( $number_scrolling_speed ); ?>"><?php echo esc_html( $count_text ); ?></span><?php echo $after_count_number; ?>
												<?php if ( $another_count_number == 'yes' ) { ?>
												<span class="count" data-to="<?php echo esc_attr( $count_number_2 ); ?>" data-speed="<?php echo esc_attr( $number_scrolling_speed ); ?>"><?php echo esc_html( $count_text_2 ); ?></span><?php echo $after_count_number_2; ?>
												<?php } ?>
											</span></div>
											<div class="stat-box02__title">
												<h5><?php echo $title; ?></h5>
											</div>
										</div>
									</div>
									<?php
									$i++;
								}
							}
							?>
							</div>
						</div>
						<div class="divider-lg hidden-lg"></div>
						<div class="col-lg-6">
							<div class="video-block">
								<a href="<?php echo esc_url( $settings['url']['url'] ); ?>" class="video-block__icon <?php echo $button_class; ?>">
									<span class="icon">
										<svg version="1.1" id="Capa_1" x="0px" y="0px"
											viewBox="0 0 191.255 191.255" style="enable-background:new 0 0 191.255 191.255;" xml:space="preserve">
											<path d="M162.929,66.612c-2.814-1.754-6.514-0.896-8.267,1.917s-0.895,6.513,1.917,8.266c6.544,4.081,10.45,11.121,10.45,18.833
												s-3.906,14.752-10.45,18.833l-98.417,61.365c-6.943,4.329-15.359,4.542-22.512,0.573c-7.154-3.97-11.425-11.225-11.425-19.406
												V34.262c0-8.181,4.271-15.436,11.425-19.406c7.153-3.969,15.569-3.756,22.512,0.573l57.292,35.723
												c2.813,1.752,6.513,0.895,8.267-1.917c1.753-2.812,0.895-6.513-1.917-8.266L64.512,5.247c-10.696-6.669-23.661-7-34.685-0.883
												C18.806,10.48,12.226,21.657,12.226,34.262v122.73c0,12.605,6.58,23.782,17.602,29.898c5.25,2.913,10.939,4.364,16.616,4.364
												c6.241,0,12.467-1.754,18.068-5.247l98.417-61.365c10.082-6.287,16.101-17.133,16.101-29.015S173.011,72.899,162.929,66.612z"/>
											<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
											<g></g><g></g><g></g><g></g>
										</svg>
									</span>
								</a>
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
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php
	}
}
