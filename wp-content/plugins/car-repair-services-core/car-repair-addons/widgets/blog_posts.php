<?php
namespace CarRepairSerivces\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

class BlogPosts extends Widget_Base {

	public function get_name() {
		return 'crs_blog_posts';
	}

	public function get_title() {
		return __( 'Blog Posts', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-post';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_services',
			array(
				'label' => __( 'Services', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'layout',
			array(
				'label'   => __( 'Layout', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'card',
				'options' => array(
					'no'   => __( 'Default', 'car-repair-services-core' ),
					'card' => __( 'Card view', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'is_pagination',
			array(
				'label'   => __( 'Pagination', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => array(
					'no'         => __( 'No pagination or post navigation', 'car-repair-services-core' ),
					'navigation' => __( 'Post Navigation', 'car-repair-services-core' ),
					'ajax-load'  => __( 'Post Ajax load mote', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'extra_class',
			array(
				'label' => __( 'Extra Class', 'car-repair-services-core' ),
				'type'  => Controls_Manager::TEXT,
			)
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings      = $this->get_settings();
		$layout        = $settings['layout'];
		$is_pagination = $settings['is_pagination'];

		$pg_num = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
		$args   = array(
			'post_type'      => array( 'post' ),
			'post_status'    => array( 'publish' ),
			'nopaging'       => false,
			'paged'          => $pg_num,
			'posts_per_page' => get_option( 'posts_per_page' ),
			'orderby'        => 'ID',
			'order'          => 'DESC',
		);

		$query      = new \WP_Query( $args );
		$post_count = $query->found_posts;
		if ( $layout == 'card' ) {
			?>
			<div class="blog-isotope">
				<div class="post_loop_cont_wrap" style="height: 100%;">
					<?php
					// The Loop
					if ( $query->have_posts() ) {
						?>
						<div class="post_loop_cont" style="height: 100%;">
						<?php
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
								<div class="blog-post">
									<div class="post-image">
									<?php get_template_part( 'template-parts/media/content', get_post_format() ); ?>
									</div>
									<div class="post-content">
										<ul class="post-meta">
											<li class="author"><?php esc_html_e( 'by', 'car-repair-services-core' ); ?> <b><i><?php the_author(); ?></i></b></li>
											<li><i class="icon icon-clock"></i><span><?php echo get_the_date(); ?></span></li>
											<li><i class="icon icon-interface"></i><span><?php comments_number( __( '0', 'car-repair-services-core' ), __( '1', 'car-repair-services-core' ), __( '%', 'car-repair-services-core' ) ); ?></span></li>
										</ul>
										<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="post-author"><?php esc_html_e( 'by', 'car-repair-services-core' ); ?> <?php printf( __( '%s', 'car-repair-services-core' ), get_the_author() ); ?></div>
										<div class="post-teaser">
											<p><?php the_excerpt(); ?></p>
											<a href="<?php echo get_the_permalink(); ?>" class="btn"><?php echo __( 'Continue Reading', 'car-repair-services-core' ); ?> </a>
										</div>
									</div>
								</div>
								<?php
						}
						?>

						</div>

						<div class="clearfix"></div>
						<?php
						if ( $post_count > get_option( 'posts_per_page' ) ) {
							if ( $is_pagination == 'navigation' ) {
								previous_posts_link( '&laquo; Prev post' );
								next_posts_link( 'Next posts &raquo;', $query->max_num_pages );
							} elseif ( $is_pagination == 'ajax-load' ) {
								?>
								<div id="postPreload"></div>
								<div id="post_ajax_load"></div>
								<div class="text-center">
									<?php if ( 10 > get_option( 'posts_per_page' ) ) : ?>
										<a class="btn btn-default view-more-post ajax_load_post_btn blog-grid" data-post-count="<?php echo $post_count; ?>"  data-post_per_load="<?php echo get_option( 'posts_per_page' ); ?>">
											<?php esc_html_e( 'More Posts', 'car-repair-services-core' ); ?>
										</a>
									<?php endif; ?>
									<img class="ajax_load_post_img lazyLoad" src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" data-original="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" style="display: none;" />
								</div>
								<div class="divider"></div>
								<?php
							} else {
								echo '';
							}
						}
					} else {
						// no posts found
					}
					// Restore original Post Data
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php
		} else {
			if ( $query->have_posts() ) {
				?>
				<div class="post_loop_cont_wrap" style="height: auto;">
					<div class="post_loop_cont" style="height: 100%;">
						<?php
						while ( $query->have_posts() ) {
							$query->the_post();
							?>
							<div class="blog-post">
								<div class="post-image">
									<?php get_template_part( 'template-parts/media/content', get_post_format() ); ?>
								</div>
								<div class="post-content">
									<ul class="post-meta">
										<li class="post-message"><i class="icon icon-chat-bubble"></i><span> <?php comments_number( '0', '1', '%' ); ?></span></li>
										<li><?php echo get_the_date( 'd / m / Y' ); ?></li>
									</ul>
									<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="post-author"><?php esc_html_e( 'by', 'car-repair-services-core' ); ?> <?php printf( __( '%s', 'car-repair-services-core' ), get_the_author() ); ?></div>
									<div class="post-teaser">
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<div class="clearfix"></div>
					<?php
					if ( $is_pagination == 'navigation' ) {
						previous_posts_link( '&laquo; Prev post' );
						next_posts_link( 'Next posts &raquo;', $query->max_num_pages );
					} elseif ( $is_pagination == 'ajax-load' ) {
						?>
						<div id="postPreload"></div>
						<div id="post_ajax_load"></div>
						<div class="text-center"><a class="btn btn-default view-more-post ajax_load_post_btn" data-post_per_load="<?php echo get_option( 'posts_per_page' ); ?>" data-load="post-more-ajax-card.txt" ><?php esc_html_e( 'More Posts', 'car-repair-services-core' ); ?></a>
							<img class="ajax_load_post_img lazyLoad" src="#" data-original="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>/ajax-loader.gif" style="display: none;" />
						</div>
						<div class="divider"></div>
						<?php
					} else {
						echo '';
					}
					?>
					</div>
				<?php
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
			wp_reset_postdata();
		}
	}
}
