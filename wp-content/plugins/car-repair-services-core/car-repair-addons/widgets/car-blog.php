<?php
namespace CarRepairSerivces\Widgets;

use Elementor\Group_Control_Background;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;


class Car_Blogs extends Widget_Base {


	public function get_name() {
		return 'car_blogs';
	}

	public function get_title() {
		return esc_html__( 'Blog', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-post';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	private function get_blog_categories() {
		$options  = array();
		$taxonomy = 'category';
		if ( ! empty( $taxonomy ) ) {
			$terms = get_terms(
				array(
					'parent'     => 0,
					'taxonomy'   => $taxonomy,
					'hide_empty' => false,
				)
			);
			if ( ! empty( $terms ) ) {
				foreach ( $terms as $term ) {
					if ( isset( $term ) ) {
						$options[''] = 'Select';
						if ( isset( $term->slug ) && isset( $term->name ) ) {
							$options[ $term->slug ] = $term->name;
						}
					}
				}
			}
		}
		return $options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_blogs',
			array(
				'label' => esc_html__( 'Blogs', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'title_1',
			array(
				'label'       => esc_html__( 'Title', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'News & Update', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'bg_text',
			array(
				'label'       => esc_html__( 'BG Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'News', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'bt_text',
			array(
				'label'       => esc_html__( 'Button Text', 'car-repair-services-core' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Read More', 'car-repair-services-core' ),
			)
		);
		$this->add_control(
			'category_id',
			array(
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => esc_html__( 'Category', 'car-repair-services-core' ),
				'options' => $this->get_blog_categories(),
			)
		);

		$this->add_control(
			'number',
			array(
				'label'   => esc_html__( 'Number of Post', 'car-repair-services-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 2,
			)
		);

		$this->add_control(
			'column',
			array(
				'label'   => esc_html__( 'Number of Column', 'car-repair-services-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => array(
					'col-xl-12' => esc_html__( '1', 'car-repair-services-core' ),
					'col-xl-6'  => esc_html__( '2', 'car-repair-services-core' ),
					'col-xl-4'  => esc_html__( '3', 'car-repair-services-core' ),
					'col-xl-3'  => esc_html__( '4', 'car-repair-services-core' ),
				),

			)
		);

		$this->add_control(
			'order_by',
			array(
				'label'   => esc_html__( 'Order By', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'          => esc_html__( 'Date', 'car-repair-services-core' ),
					'ID'            => esc_html__( 'ID', 'car-repair-services-core' ),
					'author'        => esc_html__( 'Author', 'car-repair-services-core' ),
					'title'         => esc_html__( 'Title', 'car-repair-services-core' ),
					'modified'      => esc_html__( 'Modified', 'car-repair-services-core' ),
					'rand'          => esc_html__( 'Random', 'car-repair-services-core' ),
					'comment_count' => esc_html__( 'Comment count', 'car-repair-services-core' ),
					'menu_order'    => esc_html__( 'Menu order', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'order',
			array(
				'label'   => esc_html__( 'Order', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'desc',
				'options' => array(
					'desc' => esc_html__( 'DESC', 'car-repair-services-core' ),
					'asc'  => esc_html__( 'ASC', 'car-repair-services-core' ),
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
				'name'     => 'heading_typography',
				'label'    => __( 'Heading Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .block-title .block-title__title',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'item_title_typography',
				'label'    => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector' => '{{WRAPPER}} .newslist .newslist__item .newslist__title',
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
		$settings       = $this->get_settings();
		$posts_per_page = $settings['number'];

		$title_1 = $settings['title_1'];
		$bg_text = $settings['bg_text'];
		$bt_text = $settings['bt_text'];

		$order_by = $settings['order_by'];
		$order    = $settings['order'];
		$pg_num   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args     = array(
			'post_type'      => array( 'post' ),
			'post_status'    => array( 'publish' ),
			'nopaging'       => false,
			'paged'          => $pg_num,
			'posts_per_page' => $posts_per_page,
			'category_name'  => $settings['category_id'],
			'orderby'        => $order_by,
			'order'          => $order,
		);

		$query = new \WP_Query( $args );

		?>

		<!-- Nes -->
		<div class="block">
			<div class="container">
				<div class="row custom-news-layout">
					<div class="tt-col-575 col-xs-6 col-sm-4 col-xl-4">
						<div class="newsbox-caption show767"><?php echo $bg_text; ?></div>
						<div class="block-title text-left">
							<h5 class="block-title__title"><?php echo $title_1; ?></h5>
							<div class="title-separator"></div>
						</div>
						<div class="newslist">
						<?php
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								global $post;
								?>
									
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="newslist__item">
									<div class="newslist__data"><?php echo get_the_date( 'd.m.Y' ); ?></div>
									<div class="newslist__title"><?php the_title(); ?></div>
									<div class="newslist__description">
										<?php the_excerpt(); ?>
									</div>
								</a>
								<?php
							}
							wp_reset_postdata();
						}
						?>
						</div>
					</div>
					<div class="divider-lg hidden-575"></div>
					<div class="tt-col-575 col-xs-6 col-sm-8 col-xl-8">
						<div class="newsbox-caption hide767"><?php echo $bg_text; ?></div>
						<div class="newsbox js-newsbox slick-arrow-t-r">
						<?php
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								global $post;
								?>
									
							<div>
								<div class="newsbox__item">
									<div class="newsbox__img">
										<?php the_post_thumbnail( 'car-repair-services-post-grid' ); ?>
									</div>
									<div class="newsbox-content">
										<div class="newsbox__data">
										<?php echo get_the_date( 'd.m.Y' ); ?> <span class="icon-marker"></span>
										</div>
										<div class="newsbox__title">
											<a href="<?php echo esc_url( get_permalink() ); ?>">
											<?php the_title(); ?>
											</a>
										</div>
										<a href="<?php echo esc_url( get_permalink() ); ?>" class="newsbox__link"><?php echo $bt_text; ?></a>
									</div>
								</div>
							</div>
								<?php
							}
							wp_reset_postdata();
						}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
	}

}
