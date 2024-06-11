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

class Services extends Widget_Base {

	public function get_name() {
		return 'crs_services';
	}

	public function get_title() {
		return __( 'Services', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'crs_section_services',
			array(
				'label' => __( 'Services', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'limit_per_tab',
			array(
				'label'   => __( 'Posts Per Tab', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 6,
			)
		);

		$this->add_control(
			'per_page',
			array(
				'label'   => __( 'Posts Per Page', 'car-repair-services-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 18,
			)
		);

		$this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Posts per column', 'car-repair-services-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  => esc_html__( '2', 'car-repair-services-core' ),
					'3' => esc_html__( '3', 'car-repair-services-core' ),
					'4' => esc_html__( '4', 'car-repair-services-core' ),
					'6' => esc_html__( '6', 'car-repair-services-core' ),
				],
			]
		);

		$this->add_control(
			'pagination',
			array(
				'label'   => __( 'Pagination', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 1,
				'options' => array(
					1 => __( 'Yes', 'car-repair-services-core' ),
					0 => __( 'No', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'html_tag',
			array(
				'label'   => esc_html__( 'Html Tag', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'h1'   => esc_html__( 'H1', 'car-repair-services-core' ),
					'h2'   => esc_html__( 'H2', 'car-repair-services-core' ),
					'h3'   => esc_html__( 'H3', 'car-repair-services-core' ),
					'h4'   => esc_html__( 'H4', 'car-repair-services-core' ),
					'h5'   => esc_html__( 'H5', 'car-repair-services-core' ),
					'h6'   => esc_html__( 'H6', 'car-repair-services-core' ),
					'div'  => esc_html__( 'div', 'car-repair-services-core' ),
					'span' => esc_html__( 'span', 'car-repair-services-core' ),
					'p'    => esc_html__( 'p', 'car-repair-services-core' ),
				),
				'default' => 'h3',

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
				'selector' => '{{WRAPPER}} .services-block-alt .caption .title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Content Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .services-block-alt .caption .text',
			)
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings();
		$html_tag = $settings['html_tag'];
		$orderby  = 'DESC';
		$args     = array(
			'posts_per_page' => $settings['per_page'],
			'post_type'      => 'car_services',
			'orderby'        => $orderby,
			'no_found_rows'  => true,
		);

		$query         = new \WP_Query( $args );
		$rand          = rand( 000000, 999999 );
		$loop          = 1;
		$limit_per_tab = (int) $settings['limit_per_tab'];
		$pagination    = $settings['pagination'];
		$columns       = $settings['columns'];

		?>
		<div class="block">
			<div class="container no-indent">
				<div class="tab-services hide-mobile">
					<div class="tab-content">
						<div class="row services-alt tab-pane fade in active" id="services<?php echo esc_attr( $loop ); ?>">
							<?php
							if ( $query->have_posts() ) {
								$totalfound = $query->post_count;
								while ( $query->have_posts() ) :
									$query->the_post();
									$post_id         = get_the_ID();
									$page_icon       = get_post_meta( get_the_ID(), 'framework-service-icon', true );
									$page_sub_head   = get_post_meta( get_the_ID(), 'framework-service-page-sub-head', true );
									$page_icon_image = get_post_meta( get_the_ID(), 'framework-service-icon-image', true );
									?>
									<div class="col-xs-6 col-sm-6 col-md-<?php echo 12/$columns; ?>">
										<div class="services-block-alt">
											<div class="image">
												<a href="<?php the_permalink(); ?>" class="image-scale-color">
												<?php echo get_the_post_thumbnail( $post_id, 'car-repair-services-thumbnail' ); ?>
												</a>
												<?php if ( empty( $page_icon_image ) ) { ?>
												<i class="icon <?php echo esc_attr( $page_icon ); ?>"></i>
												<?php } else { ?>
												<i class="icon"><?php echo wp_get_attachment_image( $page_icon_image ); ?></i>
												<?php } ?>
											</div>
											<div class="caption">
												<<?php echo $html_tag; ?> class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $html_tag; ?>>
												<div class="text">
												<?php echo $page_sub_head; ?>
												</div>
											</div>
										</div>
									</div>
									<?php
									if ( $loop % $limit_per_tab == 0 && $pagination == 1 && $loop < $totalfound ) {
										$index = (int) ( $loop / $limit_per_tab ) + 1;
										echo '</div><div class="row services-alt tab-pane fade in" id="services' . esc_attr( $index ) . '">';
									}
									$loop++;
								endwhile;
							}
							?>
						</div>
					</div>
					<?php
					if ( $pagination == 1 ) :
						$total_pages = ceil( $totalfound / $limit_per_tab );
						if ( $total_pages > 1 ) {
							?>
							<ul class="nav nav-pills">
								<?php
								for ( $ii = 1; $ii <= $total_pages; $ii++ ) {
									$nav_active = '';
									if ( $ii == 1 ) {
										$nav_active = 'active';
									}
									?>
									<li class="<?php echo esc_attr( $nav_active ); ?>">
										<a data-toggle="pill" href="#services<?php echo esc_attr( $ii ); ?>"><?php echo esc_html( $ii ); ?></a>
									</li>
								<?php } ?>
							</ul>
							<?php
						}
					endif;
					?>
				</div>
				<div class="tab-services show-mobile">
				  
						<div class="row services-alt">
							<?php
							if ( $query->have_posts() ) {
								$totalfound = $query->post_count;
								while ( $query->have_posts() ) :
									$query->the_post();
									$post_id         = get_the_ID();
									$page_icon       = get_post_meta( get_the_ID(), 'framework-service-icon', true );
									$page_sub_head   = get_post_meta( get_the_ID(), 'framework-service-page-sub-head', true );
									$page_icon_image = get_post_meta( get_the_ID(), 'framework-service-icon-image', true );
									?>
									<div class="col-xs-6 col-sm-6 col-md-4">
										<div class="services-block-alt">
											<div class="image">
												<a href="<?php the_permalink(); ?>" class="image-scale-color">
												<?php echo get_the_post_thumbnail( $post_id, 'car-repair-services-thumbnail' ); ?>
												</a>
												<?php if ( empty( $page_icon_image ) ) { ?>
												<i class="icon <?php echo esc_attr( $page_icon ); ?>"></i>
												<?php } else { ?>
												<i class="icon"><?php echo wp_get_attachment_image( $page_icon_image ); ?></i>
												<?php } ?>
											</div>
											<div class="caption">
												<<?php echo $html_tag; ?> class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></<?php echo $html_tag; ?>>
												<div class="text">
												<?php echo $page_sub_head; ?>
												</div>
											</div>
										</div>
									</div>
									<?php
									if ( $loop % $limit_per_tab == 0 && $pagination == 1 && $loop < $totalfound ) {
										$index = (int) ( $loop / $limit_per_tab ) + 1;
										echo '</div><div class="row services-alt tab-pane fade in" id="services' . esc_attr( $index ) . '">';
									}
									$loop++;
								endwhile;
							}
							?>
						</div>
					</div>
			
			</div>
		</div>
		<?php
	}
}

?>
