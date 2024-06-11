<?php
$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

if ( $theme != '1' ) {
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Car_Repair_Services
	 */

	get_header(); ?>
	<?php
	$show_breadcrumb = get_post_meta( get_the_ID(), 'framework_show_breadcrumb', true );
	$title_style     = get_post_meta( get_the_ID(), 'framework_page_title_style', true );

	$car_repair_services_opt = car_repair_get_options();
	$bt_type                 = '';
	if ( isset( $car_repair_services_opt['bt_type'] ) && $car_repair_services_opt['bt_type'] == '2' ) {
		$bt_type = 'page-title-wrapper';
	}
	$header_bg = get_the_post_thumbnail_url();
	?>
	 
	<?php
	$myvalue = get_the_title();
	$arr     = explode( ' ', trim( $myvalue ) );

	$push  = array_shift( $arr );
	$push1 = implode( ' ', $arr );

	?>
	<?php if ( ! is_front_page() && ( $show_breadcrumb != 'off' ) ) : ?>
		<?php if ( $header_bg ) { ?>
<div id="pageTitle" class="<?php echo esc_attr( $bt_type ); ?>" style="background-image:url(<?php echo esc_url( $header_bg ); ?>);">
		<?php } else { ?>
	<div id="pageTitle" class="<?php echo esc_attr( $bt_type ); ?>">
		<?php } ?>
	<div class="container">
		<!-- //Breadcrumbs Block -->
		<?php if ( $title_style == 'on' ) { ?>
		<h1><?php echo esc_html( $push ); ?>  <span class="color"><?php echo esc_html( $push1 ); ?></span></h1>
		<?php } else { ?>
			<h1><?php echo esc_html( get_the_title() ); ?></h1>
		<?php } ?>
		<!-- Breadcrumbs Block -->
		<?php if ( ! is_front_page() && ( $show_breadcrumb != 'off' ) ) : ?>
		<div class="breadcrumbs">
			<div class="breadcrumb">
			<?php do_action( 'car_repair_services_breadcrumb' ); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
	<?php endif; ?>

<div id="pageContent" class="content-area">
	<div id="primary" class="container">
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>
	</div><!-- #primary -->
</div><!-- #pageContent -->
	<?php
	get_footer();
} else {
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 *
	 * @link https://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package Car_Repair_Services
	 */

	get_header();
	?>
	<?php
	$show_breadcrumb = get_post_meta( get_the_ID(), 'framework_show_breadcrumb', true );
	$show_title      = get_post_meta( get_the_ID(), 'framework_show_page_title', true );
	?>
	 
	<div id="pageTitle">
	<?php if ( ! is_front_page() && ( $show_breadcrumb != 'off' ) ) : ?>
		<?php do_action( 'car_repair_services_breadcrumb' ); ?>
	<?php endif; ?>
	
	
	<?php if ( $car_repair_services_opt['bt_type'] != '2' ) { ?>
		<?php if ( $show_title != 'off' ) : ?>
			<?php if ( ! is_home() && ! is_front_page() ) : ?>
			
			<!-- .entry-header -->
			<header class="entry-header">
				<div class="container">
				<?php
				$myvalue = get_the_title();

				$arr   = explode( ' ', trim( $myvalue ) );
				$push  = array_shift( $arr );
				$push1 = implode( ' ', $arr );

				?>
			<h1><?php echo esc_html( $push ); ?> <span class="color"><?php echo esc_html( $push1 ); ?></span></h1>
				</div>
			</header>
			<!-- .entry-header -->
			<?php endif; ?>
		<?php endif; ?> 
	<?php } ?>
		   
	</div>
	<!-- #pageTitle -->
	
	<div id="pageContent" class="content-area">
	<?php if ( isset( $car_repair_services_opt['bt_type'] ) && $car_repair_services_opt['bt_type'] == '2' ) { ?>
		<?php if ( $show_title != 'off' ) : ?>
			<?php if ( ! is_home() && ! is_front_page() ) : ?>
			
			<!-- .entry-header -->
			<header class="entry-header">
				<?php
				$myvalue = get_the_title();

				$arr   = explode( ' ', trim( $myvalue ) );
				$push  = array_shift( $arr );
				$push1 = implode( ' ', $arr );

				?>
			<h1><?php echo esc_html( $push ); ?> <span class="color"><?php echo esc_html( $push1 ); ?></span></h1>
	
			</header>
			<!-- .entry-header -->   
			<?php endif; ?>
		<?php endif; ?> 
	<?php } ?>
		<div class="block">
			<div id="primary" class="container">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
	
			</div><!-- #primary -->
	
		</div><!-- #block -->
	</div><!-- #pageContent -->
	<?php
	get_footer();
}
