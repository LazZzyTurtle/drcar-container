<?php
$car_repair_services_opt = car_repair_services_options();
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Car_Repair_Services
 */
$car_repair_services = car_repair_services_options();

$theme = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';
if ( $theme != '1' ) {
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
		$widgetized_footer = isset( $car_repair_services_opt['car_repair_services-widgetized_footer'] ) ? $car_repair_services_opt['car_repair_services-widgetized_footer'] : '0';
		if ( isset( $widgetized_footer ) && $widgetized_footer == '1' ) {
			get_template_part( 'template-parts/footer/footer', 'widget' );
		} else {
			$footer_type = isset( $car_repair_services_opt['car_repair_services-footer-type'] ) ? $car_repair_services_opt['car_repair_services-footer-type'] : '1';
			if ( $footer_type == '2' ) {
				get_template_part( 'template-parts/footer/footer', '2' );
			} else {
				get_template_part( 'template-parts/footer/footer', '1' );
			}
		}
		if ( isset( $car_repair_services_opt['car_repair_services-back_to_top'] ) && ( $car_repair_services_opt['car_repair_services-back_to_top'] == 1 ) ) { ?>
		<div class="back-to-top" style="bottom: 15px;">
			<a href="#top">
				<?php
				if ( isset( $car_repair_services_opt['car_repair_services-back_to_top_icon'] ) && $car_repair_services_opt['car_repair_services-back_to_top_icon'] ) {
					?>
				<span class="icon <?php echo esc_attr( $car_repair_services_opt['car_repair_services-back_to_top_icon'] ); ?>"></span>
				<?php } else { ?>
				<span class="icon icon-arrow_up"></span>
				<?php } ?>
			</a>
		</div>
			<?php
		}
	}
	$is_modal_enable = isset( $car_repair_services_opt['is_modal_enable'] ) ? $car_repair_services_opt['is_modal_enable'] : '0';
	if ( $is_modal_enable == 1 ) {
		get_template_part( 'template-parts/modal' );
	}
	get_template_part( 'template-parts/modal-coupon' );
	wp_footer();
	?>
</body>
</html>
	<?php
} else {
	$widgetized_footer = isset( $car_repair_services_opt['car_repair_services-widgetized_footer'] ) ? $car_repair_services_opt['car_repair_services-widgetized_footer'] : '0';
	if ( isset( $widgetized_footer ) && $widgetized_footer == '1' ) {
		get_template_part( 'template-parts/footer/footer', 'widget' );
	} else {
		if ( $car_repair_services_opt['car_repair_services-footer-type'] == '2' ) {
			get_template_part( 'template-parts/footer/footer', '2' );
		} else {
			get_template_part( 'template-parts/footer/footer', '1' );
		}
	}
	if ( isset( $car_repair_services_opt['car_repair_services-back_to_top'] ) && ( $car_repair_services_opt['car_repair_services-back_to_top'] == 1 ) ) {
		?>
		<div class="back-to-top" style="bottom: 15px;"><a href="#top">
		<?php
		if ( isset( $car_repair_services_opt['car_repair_services-back_to_top_icon'] ) && $car_repair_services_opt['car_repair_services-back_to_top_icon'] ) {
			?>
		<span class="icon <?php echo esc_attr( $car_repair_services_opt['car_repair_services-back_to_top_icon'] ); ?>"></span>
		<?php } else { ?>
			<span class="icon icon-transport"></span>
	   <?php } ?>
		</a></div>
		<?php
	}
	if ( $car_repair_services_opt['is_modal_enable'] == 1 ) {
		get_template_part( 'template-parts/modal' );
	}
	if ( $car_repair_services_opt['is_modal_enable_sm'] == 1 ) {
		get_template_part( 'template-parts/modal-sm' );
	}
	get_template_part( 'template-parts/modal-coupon' );
	wp_footer();
	?>
	</body>
	</html>
	<?php
}
