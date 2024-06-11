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

class Testimonials extends Widget_Base {

	public function get_name() {
		return 'crs_testimonials';
	}

	public function get_title() {
		return __( 'Testimonial', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-testimonial';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_testimonial',
			array(
				'label' => __( 'Testimonial', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'What <span class="color">Our Clients</span> Say', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'subtitle',
			array(
				'label'       => __( 'Subtitle', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( "Here's what our customers have to say about Car Repair Service", 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'bg_text',
			array(
				'label'       => __( 'BG Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Testimonial', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'style',
			array(
				'label'   => __( 'Style', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'slider',
				'options' => array(
					'slider' => __( 'Slider', 'car-repair-services-core' ),
					'grid'   => __( 'Grid', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'per_page',
			array(
				'label'   => __( 'Per Page', 'car-repair-services-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 8,
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label' => __( 'Extra Class', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'bg_select',
			array(
				'label'   => __( 'Bg Select', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'dark',
				'options' => array(
					'dark'  => __( 'Dark', 'car-repair-services-core' ),
					'light' => __( 'Light', 'car-repair-services-core' ),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			array(
				'label' => __( 'Slider Settings', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'slides_to_show',
			array(
				'label'              => __( 'How many Slides to show?', 'car-repair-services-core' ),
				'type'               => Controls_Manager::NUMBER,
				'default'            => 1,
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
			'infinite',
			array(
				'label'       => __( 'Infinite Loop', 'car-repair-services-core' ),
				'description' => __( 'Infinite Loop', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'yes',
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
				'default'            => 2500,
				'frontend_available' => true,
			)
		);

		$this->add_control(
			'arrows',
			array(
				'label'       => __( 'Enable Arrows', 'car-repair-services-core' ),
				'description' => __( 'Enable Arrows', 'car-repair-services-core' ),
				'type'        => Controls_Manager::SWITCHER,
				'default'     => 'no',
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

		$this->add_control(
			'fade',
			array(
				'label'       => __( 'Enable Fading?', 'car-repair-services-core' ),
				'description' => __( 'Enable Fading?', 'car-repair-services-core' ),
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
				'name'     => 'content_typography',
				'label'    => __( 'Item Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .section-blog.section-blog__color02 .item .item__description p',
			)
		);
		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();
		$style    = $settings['style'];
		$per_page = $settings['per_page'];

		if ( $settings['infinite'] == 'yes' ) {
			$infinite = 'true';
		} else {
			$infinite = 'false';
		}
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
		if ( $settings['fade'] == 'yes' ) {
			$fade = 'true';
		} else {
			$fade = 'false';
		}

		$attr = array(
			'slides_to_show'   => $settings['slides_to_show'],
			'slides_to_scroll' => $settings['slides_to_scroll'],
			'infinite'         => $infinite,
			'autoplay'         => $autoplay,
			'autoplay_speed'   => $settings['autoplay_speed'],
			'arrows'           => $arrows,
			'dots'             => $dots,
			'fade'             => $fade,
		);

		wp_enqueue_script( 'isotope-pkgd' );
		wp_localize_script( 'custom', 'ajax_testiomonial', $attr );

		$slides_to_show   = $settings['slides_to_show'];
		$slides_to_scroll = $settings['slides_to_scroll'];
		$autoplay_speed   = $settings['autoplay_speed'];
		$slides_to_show   = ! empty( $slides_to_show ) ? $slides_to_show : 1;
		$slides_to_scroll = ! empty( $slides_to_scroll ) ? $slides_to_scroll : 1;
		$autoplay_speed   = ! empty( $autoplay_speed ) ? $autoplay_speed : 2500;

		if ( $settings['infinite'] == 'yes' ) {
			$infinite = true;
		} else {
			$infinite = false;
		}

		if ( $settings['autoplay'] == 'yes' ) {
			$autoplay = true;
		} else {
			$autoplay = false;
		}
		if ( $settings['arrows'] == 'yes' ) {
			$arrows = true;
		} else {
			$arrows = false;
		}
		if ( $settings['dots'] == 'yes' ) {
			$dots = true;
		} else {
			$dots = false;
		}
		if ( $settings['fade'] == 'yes' ) {
			$fade = true;
		} else {
			$fade = false;
		}

		$changed_atts = array(
			'slides_to_show'   => $slides_to_show,
			'slides_to_scroll' => $slides_to_scroll,
			'infinite'         => $infinite,
			'autoplay'         => $autoplay,
			'autoplay_speed'   => $autoplay_speed,
			'arrows'           => $arrows,
			'dots'             => $dots,
			'fade'             => $fade,
		);

		$extra_class = $settings['extra_class'];
		$args        = array(
			'posts_per_page' => $per_page,
			'post_type'      => 'car-testimonial',
			'orderby'        => 'DESC',
			'paged'          => 1,
			'no_found_rows'  => true,
		);
		$count_posts = wp_count_posts( 'car-testimonial' )->publish;

		$query = new \WP_Query( $args );

		if ( $style == 'slider' ) {

			if ( $settings['bg_select'] == 'light' ) {
				$wrapper_class = 'block overflow-hidden';
				$section_class = 'section-blog no-inner';
				$bg_text_class = 'section__text-background text-background__top text-center text-color02';
			} else {
				$wrapper_class = 'block section-bg-wrapper';
				$section_class = 'section-blog section-blog__color02';
				$bg_text_class = 'section__text-background text-background__top text-center text-color01';
			}

			?>
			<div class="<?php echo esc_attr( $wrapper_class ); ?> <?php echo esc_attr( $extra_class ); ?>">
				<div class="container-fluid position-relative">
					<div class="<?php echo esc_attr( $section_class ); ?>">
						<div class="<?php echo esc_attr( $bg_text_class ); ?>"><?php echo esc_html( $settings['bg_text'] ); ?></div>
						<div class="testimonials-carousel" data-testimonialslider='<?php echo wp_json_encode( $changed_atts ); ?>'>
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$post_id            = get_the_ID();
				$client_name        = get_post_meta( get_the_ID(), 'framework-client-name', true );
				$client_designation = get_post_meta( get_the_ID(), 'framework-client-designation', true );
				$image              = wp_get_attachment_image( get_post_thumbnail_id( $post_id ), 'car-repair-services-testimonial-2' );
				?>
									<div class="item text-center">
										<div class="item__img">
				<?php
				if ( wp_http_validate_url( $image ) ) {
					?>
												<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr__( 'Alt', 'car-repair-service-core' ); ?>">
					<?php
				} else {
					echo $image;
				}
				?>
											<span class="icon"></span>
										</div>
										<div class="item__description">
				<?php the_content(); ?>
										</div>
				<?php if ( $client_name ) { ?>
										<div class="item__autor"><span class="color"><?php echo esc_html( $client_name ); ?></span> <?php echo esc_html( $client_designation ); ?></div>
				<?php } ?>
									</div>
			<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
			<?php
		} else {
			?>
		<div class="block <?php echo esc_attr( $extra_class ); ?>">
			<div class="block-title">
				<h2 class="block-title__title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
				<div class="block-title__description">
			<?php echo wp_kses_post( $settings['subtitle'] ); ?>
				</div>
				<div class="title-separator"></div>
			</div>
			<div class="container">
				<div id="main-div" class="testimonial-wrapper blog-isotope">
				<input type="hidden" id="per_page" value="<?php echo $settings['per_page']; ?>"/>
				<input type="hidden" id="grid_style" value="<?php echo $settings['style']; ?>"/>
				<input type="hidden" id="total_tes" value="<?php echo $count_posts; ?> "/>
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				$totalfound         = $query->post_count;
				$post_id            = get_the_ID();
				$client_name        = get_post_meta( get_the_ID(), 'framework-client-name', true );
				$client_designation = get_post_meta( get_the_ID(), 'framework-client-designation', true );
				$image              = wp_get_attachment_image( get_post_thumbnail_id( $post_id ), 'car-repair-services-testimonial-grid' );
				?>
						<div class="col-item">
							<div class="testimonial-item">
								<div class="testimonial-item__content">
				 <?php the_content(); ?>
								</div>
								<div class="testimonial-item__footer">
									<div class="testimonial__img">
				<?php
				if ( wp_http_validate_url( $image ) ) {
					?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_html__( 'Alt', 'car-repair-service-core' ); ?>">
					<?php
				} else {
					echo $image;
				}
				?>
									</div>
									<div class="testimonial__description">
				<?php echo esc_html( $client_name ); ?>
										<span><?php echo esc_html( $client_designation ); ?></span>
									</div>
								</div>
							</div>
						</div>
				<?php
			endwhile;
			?>
				</div>
			<?php if ( ( $count_posts > $per_page ) ) : ?>
				<div id="testimonialPreload"></div>
				<div id="moreLoader" class="more-loader"><img src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" alt="img"></div>
				<div class="text-center"><a class="btn btn-border btn-invert btn-more-top btn-wide view-more-testimonial" data-load="testimonial-more-ajax.txt"><span><?php echo esc_html__( 'More Testimonials', 'car-repair-services-core' ); ?></span></a></div>
			<?php endif; ?>
			</div>
		</div>
			<?php
		}
	}
}
