<?php
$car_repair_services_opt = car_repair_services_options();
$footer_copyright        = isset( $car_repair_services_opt['car_repair_services-footer_copyright'] ) ? $car_repair_services_opt['car_repair_services-footer_copyright'] : esc_html__( '© 2012 Car Repair Services, All Rights Reserved', 'car-repair-services' );
?>
<div class = "page-footer">
	<div class = "footer-content">
		<?php
		if ( isset( $car_repair_services_opt['car_repair_services-footer-contact-info'] ) && ( $car_repair_services_opt['car_repair_services-footer-contact-info'] == 1 ) ) {
			?>
			<div class="footer-col-left">
				<div class="inside">
					<div class="footer-phone">
						<h2 class="h-phone"><?php esc_html_e( 'Call:', 'car-repair-services' ); ?> 
							<span class="number"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_phone'] ); ?></span></h2>
					</div>
					<?php if ( $car_repair_services_opt['car_repair_services-footer_contact_location'] != '' ) { ?>
					<div class="contact-info"><i class="icon icon-locate"></i><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_location'] ); ?>
					</div>
					<?php } ?>
					<?php if ( $car_repair_services_opt['car_repair_services-footer_contact_clock'] != '' ) { ?>
					<div class="contact-info"><i class="icon icon-clock"></i><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_clock'] ); ?>
					</div>
					<?php } ?>
					<?php if ( $car_repair_services_opt['car_repair_services-footer_email'] != '' ) { ?>
					<div class="contact-info"><i class="icon icon-email"></i>
						<a href="mailto:<?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_email'] ); ?>"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_email'] ); ?></a>
					</div>
					<?php } ?>
					<div class="social-links">
						<ul>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-facebook'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-facebook'] ) ) { ?>
								<li> 
									<a class="icon icon-facebook-logo"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-facebook'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-twitter'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-twitter'] ) ) { ?>
								<li> 
									<a class="icon icon-twitter-logo"   target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-twitter'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-google-plus'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-google-plus'] ) ) { ?>
								<li> 
									<a class="icon icon-google-plus-logo"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-google-plus'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-youtube'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-youtube'] ) ) { ?>
								<li> 
									<a class="icon icon-youtube"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-youtube'] ); ?>"><img src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>/youtube_play.png"/></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-instagram'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-instagram'] ) ) { ?>
								<li> 
									<a class="icon icon-instagram-logo"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-instagram'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-tumblr'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-tumblr'] ) ) { ?>
								<li> 
									<a class="icon icon-tumblr-logo"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-tumblr'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-behance'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-behance'] ) ) { ?>
								<li> 
									<a class="icon icon-behance-logo"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-behance'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-linkedin'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-linkedin'] ) ) { ?>
								<li> 
									<a class="icon icon-linkedin-logo"  target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-linkedin'] ); ?>"></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		<?php } ?>
		<!-- Google map -->
			<div class="footer-col-right">
				<?php
				$footer_map = ( isset( $car_repair_services_opt['car_repair_services-footer_map'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer_map'] ) ) ? 1 : 0;
				if ( $footer_map == 1 ) {
					if ( ( isset( $car_repair_services_opt['car_repair_services-footer_map_embed'] ) && $car_repair_services_opt['car_repair_services-footer_map_embed'] ) == 1 ) {
						echo sprintf( __( '%s', 'car-repair-services' ), $car_repair_services_opt['car_repair_services-footer_map_embed_code'] );
					} else {
						do_action( 'car_repair_services_after_footer' );
					}
				} else {
					if ( isset( $car_repair_services_opt['car_repair_services-footer_map_image']['url'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer_map_image']['url'] ) ) {
						?>
						<img src="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer_map_image']['url'] ); ?>"/>
						<?php
					}
				}
				?>
			</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="copyright"><?php echo wp_kses_post( $footer_copyright ); ?></div>
		</div>
	</div>			
	<!-- //Footer -->
	<div class="darkout-menu"></div>
</div>
