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

class Testimonials_Two extends Widget_Base {

	public function get_name() {
		return 'crs_testimonials_two';
	}

	public function get_title() {
		return __( 'Testimonial Two', 'car-repair-services-core' );
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
			'title1',
			array(
				'label'       => __( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'default'     => __( 'Customer Reviews', 'car-repair-services-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
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
				'name'     => 'item_title_typography',
				'label'    => __( 'Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .testimonials02 .item .item__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .testimonials02 .item .item__description',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings    = $this->get_settings();
		$title       = $settings['title1'];
		$args        = array(
			'posts_per_page' => $settings['per_page'],
			'post_type'      => 'car-testimonial',
			'orderby'        => 'DESC',
			'paged'          => 1,
			'no_found_rows'  => true,
		);
		$count_posts = wp_count_posts( 'car-testimonial' )->publish;
		$query       = new \WP_Query( $args );
		$i           = 0;
		?>

		<div class="block">
			<div class="container position-relative no-gutters-mobile">
				<div class="testimonials02-extra-left">
					<div class="js-testimonials testimonials02">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						$post_id            = get_the_ID();
						$client_name        = get_post_meta( get_the_ID(), 'framework-client-name', true );
						$client_designation = get_post_meta( get_the_ID(), 'framework-client-designation', true );
						$client_ratting     = get_post_meta( get_the_ID(), 'framework-client-ratting', true );
						$meta_image         = get_post_meta( get_the_ID(), 'framework-testimonials-image', true );
						$meta_image         = wp_get_attachment_image( $meta_image, 'full' );
						$post_thumbnail     = wp_get_attachment_image( get_post_thumbnail_id( $post_id ) );
						?>
				  
				<div>
					<div class="item">
						<div class="item__img">
							<?php if ( $meta_image ) { ?>
								<?php echo $meta_image; ?>
							<?php } else { ?>
								<?php echo $post_thumbnail; ?>
							<?php } ?>
						</div>
						<div class="item__content">
							<div class="item__icon"></div>
							<div class="item__title"><?php echo esc_html( $title ); ?></div>
							<div class="item__rating rating<?php echo esc_attr( $client_ratting ); ?>">
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
								<i class="icon-star"></i>
							</div>
							<div class="item__description">
								<?php the_content(); ?>
								<div class="item__meta"><span class="base-color">– <?php echo esc_html( $client_name ); ?>,</span> <?php echo esc_html( $client_designation ); ?></div>
							</div>
						</div>
					</div>
				</div>
						<?php
				endwhile;
					?>
					</div>
				</div>
				<div class="testimonials02-slick-total">
					<div class="item">
						<div class="pt-slick-button">
							<button type="button" class="slick-arrow pt-slick-prev"></button>
							<button type="button" class="slick-arrow pt-slick-next"></button>
						</div>
					</div>
					<div class="item">
						<div class="pt-slick-quantity">
							<span class="account-number">1</span> /<span class="total">1</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
