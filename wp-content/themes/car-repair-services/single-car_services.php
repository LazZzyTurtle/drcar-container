<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Car_Repair_Services
 */

get_header();

$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';


if ( isset( $car_repair_services['car_repair_services-single_services_custom_title'] ) && ! empty( $car_repair_services['car_repair_services-single_services_custom_title'] ) ) {
	$single_service_breadcum_title = $car_repair_services['car_repair_services-single_services_custom_title'];
} else {
	$single_service_breadcum_title = get_the_title();
}


if ( $theme != '1' ) {
	?>
	<?php
	$page_single_image_id = get_post_meta( get_the_ID(), 'framework-service-single-image' );

	$page_single_image_src = '';
	if ( ! empty( $page_single_image_id ) ) {
		$page_single_image     = wp_get_attachment_image_src( $page_single_image_id[0], 'full' );
		$page_single_image_src = $page_single_image[0];
	}

	?>
<div id="pageTitle">
	<div class="container">    
		<h1><?php echo esc_html( $single_service_breadcum_title ); ?></h1>
	<?php do_action( 'car_repair_services_breadcrumb' ); ?>
	</div>
</div>
<div id="pageContent">
	<div class="block">
		<div class="container"> 
			<div class="row service-single">
				<div class="col-12 col-sm-5 col-md-4">
					<div class="block-aside-wrapper">
					<?php dynamic_sidebar( 'service_sideber' ); ?>
					</div>
				</div>
				<div class="divider-lg hidden-lg hidden-md hidden-sm"></div>
				<div class="col-12 col-sm-7 col-md-8">
						<?php
						while ( have_posts() ) :
							the_post();
							$post_id = get_the_ID();
							?>
							<?php
							if ( $page_single_image_src ) {
								?>
									<img src="<?php echo esc_url( $page_single_image_src ); ?>" class="img-responsive" alt="<?php echo esc_html_e( 'Service', 'car-repair-services' ); ?>"/>
								<?php
							} else {
								echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'img-responsive' ) );
							}
							?>
								<div class="divider-lg"></div>
								<h1>
							<?php
							echo str_replace( '<br>', '', get_the_title() );
							?>
								</h1>
							<?php
							the_content();
							?>
							<?php

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
} else {

	$show_breadcrumb = 'on';
	?>
	<?php
	$page_icon          = get_post_meta( get_the_ID(), 'framework-service-icon', true );
	$page_head          = get_post_meta( get_the_ID(), 'framework-service-page-head', true );
	$page_sub_head      = get_post_meta( get_the_ID(), 'framework-service-page-sub-head', true );
	$page_icon_image_id = get_post_meta( get_the_ID(), 'framework-service-icon-image' );
	$page_icon_link     = get_post_meta( get_the_ID(), 'framework-service-page-icon-link', true );
	if ( $page_icon_link != '' ) {
		wp_enqueue_style( 'font-awesome-plugin', $page_icon_link, '', null );
	}
	$page_icon_image_src = '';
	if ( ! empty( $page_icon_image_id ) ) {
		$page_icon_image     = wp_get_attachment_image_src( $page_icon_image_id[0], array( 100, 100 ), false, array( 100, 100 ) );
		$page_icon_image_src = $page_icon_image[0];
	}

	?>
		<div id="pageTitle">
			<div class="container">
				<?php do_action( 'car_repair_services_breadcrumb' ); ?>
				<?php if ( isset( $car_repair_services_opt['bt_type'] ) && $car_repair_services_opt['bt_type'] == '1' ) { ?>
					<?php if ( $page_head != '' ) { ?>    
				<h1><?php echo esc_html( $page_head ); ?></h1>
						<?php
					}
				}
				?>
			</div>
		</div>
	<div id="pageContent">
	<?php if ( isset( $car_repair_services_opt['bt_type'] ) && $car_repair_services_opt['bt_type'] == '2' ) { ?>
		<?php if ( $page_head != '' ) { ?>    
				<div class="text-center">
				<h1><?php echo esc_html( $page_head ); ?></h1>
				</div>
			<?php
		}
	}
	?>
		<div class="block">
				<div class="container">
				<?php the_title( '<h2 class="h-lg text-center">', '</h2>' ); ?> 
					<p class="info text-center"><?php echo esc_html( $page_sub_head ); ?></p>
					<div class="service-icon">
						<div class="icon-wrapper">
						 <?php if ( $page_icon_image_src != '' ) { ?>
									<div class="fack_icon_div"><img src="<?php echo esc_url( $page_icon_image_src ); ?>" /></div>
						 <?php } else { ?>
						  <span><i class="icon <?php echo esc_attr( $page_icon ); ?>"></i></span>
						 <?php } ?> 
						</div>
					</div>
				</div>
			</div>
			<div class="container"> 
				<div class="row">
					<div class="col-sm-12">
						<div class="blog-post single single_pg_cont">
							<?php
							while ( have_posts() ) :
								the_post();

								?>
									<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post single' ); ?>>
										<div class="post-image">
											<div class="post-teaser">
								<?php
													the_content();
								?>
											</div>
										</div>
									</div>
								<?php

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
}
get_footer();
