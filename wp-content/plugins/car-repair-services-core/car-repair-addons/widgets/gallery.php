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

class Gallery extends Widget_Base {

	public function get_name() {
		return 'crs_gallery';
	}

	public function get_title() {
		return __( 'Gallery', 'car-repair-services-core' );
	}

	public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return array( 'car-repair-services' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'crs_section_gallery',
			array(
				'label' => __( 'Gallery', 'car-repair-services-core' ),
			)
		);

		$this->add_control(
			'style',
			array(
				'label'   => __( 'Style Select', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'gallery',
				'options' => array(
					'gallery'             => __( 'Gallery', 'car-repair-services-core' ),
					'comparisons_gallery' => __( 'Сomparisons Gallery', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'showposts',
			array(
				'label'   => __( 'Number of Gallary', 'car-repair-services-core' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 10,
			)
		);

		$this->add_control(
			'orderby',
			array(
				'label'   => __( 'Order By', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'     => __( 'Date', 'car-repair-services-core' ),
					'ID'       => __( 'ID', 'car-repair-services-core' ),
					'title'    => __( 'Title', 'car-repair-services-core' ),
					'name'     => __( 'Name', 'car-repair-services-core' ),
					'modified' => __( 'Modified', 'car-repair-services-core' ),
					'rand'     => __( 'Rand', 'car-repair-services-core' ),
				),
			)
		);

		$this->add_control(
			'order',
			array(
				'label'   => __( 'Sort Order', 'car-repair-services-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => __( 'Descending', 'car-repair-services-core' ),
					'ASC'  => __( 'Ascending', 'car-repair-services-core' ),
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
				'name'      => 'heading_typography',
				'label'     => __( 'Heading Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .block-title .block-title__title',
				'condition' => array( 'style' => 'gallery' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'subheading_typography',
				'label'     => __( 'Sub Heading Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .block-title .block-title__description',
				'condition' => array( 'style' => 'gallery' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'      => 'item_title_typography',
				'label'     => __( 'Item Title Typography', 'car-repair-services-core' ),
				'selector'  => '{{WRAPPER}} .comparing-obj .comparing-obj__title',
				'condition' => array( 'style' => 'comparisons_gallery' ),
			)
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings  = $this->get_settings();
		$style     = $settings['style'];
		$showposts = $settings['showposts'];
		$orderby   = $settings['orderby'];
		$order     = $settings['order'];

		wp_enqueue_script( 'isotope-pkgd' );
		wp_enqueue_script( 'magnific-popup' );

		$args        = array(
			'posts_per_page' => $showposts,
			'post_type'      => 'gallery',
			'orderby'        => $orderby,
			'order'          => $order,
			'paged'          => 1,
			'no_found_rows'  => true,
		);
		$count_posts = wp_count_posts( 'gallery' )->publish;
		$test_query  = new \WP_Query( $args );

		$filter_content_class = '';
		?>
		<?php if ( $style == 'comparisons_gallery' ) { ?>
		<div class="block">
			<div class="container-fluid">
			<div class="custom-width-gallery">
				<div class="filters-by-category">
					<ul class="option-set" data-option-key="filter">
						<li><a href="#filter" data-option-value="*" class="selected"><?php echo wp_kses_post( __( 'All', 'car-repair-services-core' ) ); ?></a></li>
						<?php
						$taxonomy = 'gallery-cat';
						$terms    = get_terms(
							$taxonomy,
							array(
								'orderby' => $orderby,
								'order'   => $order,
							)
						);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							$filters = array( '' );
							foreach ( $terms as $term ) {
								$filters[] = $term->slug;
								
								echo '<li><a href="#filter" data-option-value=".' . $term->slug . '" class="">' . $term->name . '</a></li>';
							}
						}
						?>
					</ul>
				</div>
				<?php
				if ( $test_query->have_posts() ) :
					$rand   = rand( 000000, 999999 );
					$prefix = 'framework';
					echo '<div class="gallery gallery-isotope gallery-col-2' . $filter_content_class . '" id="gallery"> ';
					?>
					<input type="hidden" id="ga_per_page" value="<?php echo $showposts; ?>"/>
					<input type="hidden" id="grid_style" value="<?php echo $style; ?>"/>
					<input type="hidden" id="ga_total_tes" value="<?php echo $count_posts; ?> "/>
					<?php
					while ( $test_query->have_posts() ) :
						$test_query->the_post();
						$post_id      = get_the_ID();
						$terms        = get_the_terms( $post_id, 'gallery-cat' );
						$filter_class = '';
						if ( $terms && ! is_wp_error( $terms ) ) :
							$filter = array();
							foreach ( $terms as $term ) {
								$filter[] = $term->slug;
							}
							$filter_class = join( ' ', $filter );
						endif;

							$compar_before_gallery_image = get_post_meta( $post_id, "{$prefix}-compare-before-gallery", false );
							$compar_after_gallery_image  = get_post_meta( $post_id, "{$prefix}-compare-after-gallery", false );
						if ( ! empty( $compar_before_gallery_image ) && ! empty( $compar_after_gallery_image ) ) {
							?>
						<div class="gallery-item <?php echo esc_attr( $filter_class ); ?> bg-none">
							<div class="comparing-obj">
								<div class="js-comparing-img">
								<?php
								$compar_before_gallery_image = get_post_meta( $post_id, "{$prefix}-compare-before-gallery", false );
								if ( isset( $compar_before_gallery_image[0] ) && ! empty( $compar_before_gallery_image[0] ) ) {
									echo wp_get_attachment_image( $compar_before_gallery_image[0], 'full' );
								}
								$compar_after_gallery_image = get_post_meta( $post_id, "{$prefix}-compare-after-gallery", false );
								if ( isset( $compar_after_gallery_image[0] ) && ! empty( $compar_after_gallery_image[0] ) ) {
									echo wp_get_attachment_image( $compar_after_gallery_image[0], 'full' );
								}
								?>
								</div>
								<h6 class="comparing-obj__title"><?php the_title(); ?></h6>
							</div>
						</div>
							<?php
						}
					endwhile;
					echo '</div>';
					?>
					<?php if ( ( $count_posts > $showposts ) && $showposts != '-1' ) : ?>
				<div id="galleryPreload"></div>
				<div id="gallerymoreLoader" class="more-loader"><img src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" alt="img"></div>
				<div class="text-center">
				<a class="btn btn-border btn-wide btn-invert btn-top view-more-gallery" data-load="gallery-more-ajax.txt"><span><?php esc_html_e( 'More Photos', 'car-repair-services-core' ); ?></span></a>
				</div>
				<?php endif; ?>
					<?php
		endif;
				?>
		</div>
		</div>
	</div>
	 <?php } else { ?>
		<div class="block">
			<div class="container">
				<div class="filters-by-category">
					<ul class="option-set" data-option-key="filter">
						<li><a href="#filter" data-option-value="*" class="selected"><?php echo wp_kses_post( __( 'All', 'car-repair-services-core' ) ); ?></a></li>
						<?php
						$taxonomy = 'gallery-cat';
						$terms    = get_terms(
							$taxonomy,
							array(
								'orderby' => $orderby,
								'order'   => $order,
							)
						);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							$filters = array( '' );
							foreach ( $terms as $term ) {
								$filters[] = $term->slug;
								echo '<li><a href="#filter" data-option-value=".' . $term->slug . '" class="">' . $term->name . '</a></li>';
							}
						}
						?>
					</ul>
				</div>
				<?php
				if ( $test_query->have_posts() ) :
					$rand   = rand( 000000, 999999 );
					$prefix = 'framework';
					echo '<div class="gallery gallery-isotope gallery-col-4' . $filter_content_class . '" id="gallery"> ';
					?>
					<input type="hidden" id="ga_per_page" value="<?php echo $showposts; ?>"/>
					<input type="hidden" id="grid_style" value="<?php echo $style; ?>"/>
					<input type="hidden" id="ga_total_tes" value="<?php echo $count_posts; ?> "/>
					<?php
					while ( $test_query->have_posts() ) :
						$test_query->the_post();
						$post_id      = get_the_ID();
						$terms        = get_the_terms( $post_id, 'gallery-cat' );
						$filter_class = '';
						if ( $terms && ! is_wp_error( $terms ) ) :
							$filter = array();
							foreach ( $terms as $term ) {
								$filter[] = $term->slug;
							}
							$filter_class = join( ' ', $filter );
						endif;
						?>
						<div class="gallery-item <?php echo esc_attr( $filter_class ); ?>">
							<div class="gallery-item-image">
								<?php
								$gallery_image = get_post_meta( $post_id, "{$prefix}-gallery", false );
								if ( isset( $gallery_image[0] ) && ! empty( $gallery_image[0] ) ) {
									echo wp_get_attachment_image( $gallery_image[0], 'full' );
								} else {
									the_post_thumbnail( 'car_repair_service_gallery-thumbnail' );
								}
								$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
								?>
								<a class="hover" href="<?php echo esc_url( $image_url ); ?>">
									<span class="view"></span>
								</a>
							</div>
						</div>
						<?php
					endwhile;
					echo '</div>';
					?>
					<?php if ( ( $count_posts > $showposts ) && $showposts != '-1' ) : ?>
			<div id="galleryPreload"></div>
			<div id="gallerymoreLoader" class="more-loader"><img src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>ajax-loader.gif" alt="img"></div>
			<div class="text-center">
				<a class="btn btn-border btn-wide btn-invert btn-top view-more-gallery" data-load="gallery-more-ajax.txt"><span><?php esc_html_e( 'More Photos', 'car-repair-services-core' ); ?></span></a>
			</div>
			<?php endif; ?>
					<?php
		endif;
				echo '</div></div>';
	 }
	}
}
