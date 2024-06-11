<?php
$car_repair_services = car_repair_services_options();


$theme = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

if ( $theme != '1' ) {

	?>
	<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Car_Repair_Services
	 */
	?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
	   <?php
		if ( function_exists( 'has_site_icon' ) && has_site_icon() ) { // since 4.3.0
			wp_site_icon();
		} else {
			?>
			<?php if ( isset( $car_repair_services['car_repair_services-site-favicon']['url'] ) && ! empty( $car_repair_services['car_repair_services-site-favicon']['url'] ) ) { ?>
				<link rel="shortcut icon" href="<?php echo esc_url( $car_repair_services['car_repair_services-site-favicon']['url'] ); ?>" type="image/x-icon"/>
				<?php
			} else {
				?>
				<link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/images/favicon.ico" type="image/x-icon"/>
				<?php
			}
		}
		?>
	<?php wp_head(); ?>
	</head>
	<?php
	$header_type = '';
	if ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '1' ) {
		$header_type = 'layout-1';
	} elseif ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '2' ) {
		$header_type = 'layout-2';
	} elseif ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '3' ) {
		$header_type = 'layout-2 layout-3';
	}
	?>

	<body <?php body_class( $header_type ); ?>>
	<?php wp_body_open(); ?>
		<!-- mobile menu -->
		<nav class="panel-menu" id="mobile-menu">
			<ul>
			</ul>
			<div class="mm-navbtn-names">
				<div class="mm-closebtn"><?php esc_html_e( 'Close', 'car-repair-services' ); ?></div>
				<div class="mm-backbtn"><?php esc_html_e( 'Back', 'car-repair-services' ); ?></div>
			</div>
			
		</nav>
		<!-- Loader -->
	<?php
	do_action( 'car_repair_services_header_loader' );
	?>
		<!-- //Loader -->
	<?php

	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
		$header_type = isset( $car_repair_services['car_repair_services-header-type'] ) ? $car_repair_services['car_repair_services-header-type'] : '';
		if ( $header_type == '2' || $header_type == '3' ) {
			get_template_part( 'template-parts/header/header', '2' );
		} else {
			get_template_part( 'template-parts/header/header', '1' );
		}
	}
} else {
	?>
	<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Car_Repair_Services
	 */
	?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
		   <?php
			if ( function_exists( 'has_site_icon' ) && has_site_icon() ) { // since 4.3.0
				wp_site_icon();
			} else {
				?>
				<?php if ( isset( $car_repair_services['car_repair_services-site-favicon']['url'] ) && ! empty( $car_repair_services['car_repair_services-site-favicon']['url'] ) ) { ?>
					<link rel="shortcut icon" href="<?php echo esc_url( $car_repair_services['car_repair_services-site-favicon']['url'] ); ?>" type="image/x-icon"/>
					<?php
				} else {
					?>
					<link rel="shortcut icon" href="<?php echo get_theme_file_uri(); ?>/images/favicon.ico" type="image/x-icon"/>
					<?php
				}
			}
			?>
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-185719073-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-185719073-1');
</script>
		</head>
	<?php
	$header_type = '';
	if ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '1' ) {
		$header_type = 'layout-1';
	} elseif ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '2' ) {
		$header_type = 'layout-2';
	} elseif ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '3' ) {
		$header_type = 'layout-2 layout-3';
	}
	?>
	<body <?php body_class( $header_type ); ?>>
	<?php
	do_action( 'car_repair_services_header_loader' );
	?>
	<?php
	if ( isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '2' || isset( $car_repair_services['car_repair_services-header-type'] ) && $car_repair_services['car_repair_services-header-type'] == '3' ) {
		get_template_part( 'template-parts/header/header', '2' );
	} else {
		get_template_part( 'template-parts/header/header', '1' );
	}
}
