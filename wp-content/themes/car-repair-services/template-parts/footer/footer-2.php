<!-- Footer -->
<?php
$car_repair_services_opt = car_repair_services_options();

$car_repair_services = car_repair_services_options();

$theme = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

	$car_repair_services_opt = car_repair_services_options();
	 $footer_map             = ( isset( $car_repair_services_opt['car_repair_services-footer_map'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer_map'] ) ) ? 1 : 0;

if ( $theme != '1' ) {
	?>
<div class="page-footer page-footer-2"
	<?php
		if ( $footer_map == 0 ) {
			?>
			 style="background-image:url(<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer_map_image']['url'] ); ?>)" <?php } ?>>

	<div class="footer-section02">
		<?php
		$footer_map = ( isset( $car_repair_services_opt['car_repair_services-footer_map'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer_map'] ) ) ? 1 : 0;
		if ( $footer_map == 1 ) :
			if ( ( isset( $car_repair_services_opt['car_repair_services-footer_map_embed'] ) && $car_repair_services_opt['car_repair_services-footer_map_embed'] ) == 1 ) {
				?>
				<div id="footer-map" class="footer-map"><?php echo sprintf( __( '%s', 'car-repair-services' ), $car_repair_services_opt['car_repair_services-footer_map_embed_code'] ); ?></div>
				<?php
			} else {
					do_action( 'car_repair_services_after_footer' );
			}
		endif;
		?>
		<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-contact-info'] ) && ( $car_repair_services_opt['car_repair_services-footer-contact-info'] == 1 ) ) { ?>
		<div class="container container-tablet-md container-tablet-nogutter">
			<div class="footer-section02__box01">
				<?php if ( isset( $car_repair_services_opt['car_repair_services-footer_h1st'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer_h1st'] ) ) { ?>
				<div class="footer-section02__title"><?php echo esc_html( $car_repair_services_opt['car_repair_services-footer_h1st'] ); ?></div>
				<?php } ?>
				<address class="contact-info-item">
					<div class="item-icon">
						<i class="icon icon-locate"></i>
					</div>
					<div class="item-description">
					<?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_location'] ); ?>
					</div>
				</address>
				<address class="contact-info-item">
					<div class="item-icon">
						<i class="icon icon-phone"></i>
					</div>
					<div class="item-description">
					<?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_phone'] ); ?>
					</div>
				</address>
				<address class="contact-info-item">
					<div class="item-icon">
						<i class="icon icon-email"></i>
					</div>
					<div class="item-description">
						<a href="mailto:<?php echo esc_attr( $car_repair_services_opt['car_repair_services-footer_email'] ); ?>"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_email'] ); ?></a>
					</div>
				</address>
				<?php if ( isset( $car_repair_services_opt['car_repair_services-footer_h2nd'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer_h2nd'] ) ) { ?>
				<div class="footer-section02__title"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_h2nd'] ); ?></div>
				<?php } ?>
				<address class="contact-info-item">
					<div class="item-icon">
						<i class="icon icon-clock"></i>
					</div>
					<div class="item-description">
					<?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_clock'] ); ?>
					</div>
				</address>
			</div>
		</div>
		<?php } ?>
	</div>
	<div class="footer-section03">
		<div class="container container-tablet-md">
			<div class="copyright"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_copyright'] ); ?></div>
			<div class="footer-bottom-right">
				<div class="social-links">
					<ul>
						<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-facebook'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-facebook'] ) ) { ?>
							<li> 
								<a class="icon icon-facebook-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-facebook'] ); ?>"></a>
							</li>
						<?php } ?>

						<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-twitter'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-twitter'] ) ) { ?>
							<li> 
								<a class="icon icon-twitter-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-twitter'] ); ?>"></a>
							</li>
						<?php } ?>

						<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-instagram'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-instagram'] ) ) { ?>
							<li> 
								<a class="icon icon-instagram-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-instagram'] ); ?>"></a>
							</li>
						<?php } ?>

						<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-google-plus'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-google-plus'] ) ) { ?>
							<li> 
								<a class="icon icon-google-plus-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-google-plus'] ); ?>"></a>
							</li>
						<?php } ?>
						<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-youtube'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-youtube'] ) ) { ?>
								<li> 
									<a class="icon icon-youtube" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-youtube'] ); ?>">
									<img src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>/youtube_play.png"/></a>
								</li>
						<?php } ?>
						<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-tumblr'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-tumblr'] ) ) { ?>
								<li> 
									<a class="icon icon-tumblr-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-tumblr'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-behance'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-behance'] ) ) { ?>
								<li> 
									<a class="icon icon-behance-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-behance'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-linkedin'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-linkedin'] ) ) { ?>
								<li> 
									<a class="icon icon-linkedin-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-linkedin'] ); ?>"></a>
								</li>
							<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
} else {
	?>
	<!-- Footer -->
	
	<div class="page-footer page-footer-2">
		<div class="footer-content"
	<?php
		if ( $footer_map == 0 ) {
			?>
			 style="background-image:url(<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer_map_image']['url'] ); ?>)" <?php } ?>>
		<?php
		if ( isset( $car_repair_services_opt['car_repair_services-footer-contact-info'] ) && ( $car_repair_services_opt['car_repair_services-footer-contact-info'] == 1 ) ) {
			?>
			<div class="container">
				<div class="footer-col-left">
					<div class="inside">
						<h5><?php esc_html_e( 'Contact Info', 'car-repair-services' ); ?></h5>
						<?php if ( $car_repair_services_opt['car_repair_services-footer_contact_location'] != '' ) { ?>
						<div class="contact-info"><i class="icon icon-locate"></i><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_location'] ); ?>
						</div>
						<?php } ?>
						<?php if ( $car_repair_services_opt['car_repair_services-footer_contact_phone'] != '' ) { ?>
						<div class="contact-info"><i class="icon icon-phone"></i>
							<a href="tel:<?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_phone'] ); ?>"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_phone'] ); ?></a>
						</div>
						<?php } ?>
						<?php if ( $car_repair_services_opt['car_repair_services-footer_email'] != '' ) { ?>
						<div class="contact-info"><i class="icon icon-email"></i><a href="mailto:<?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_email'] ); ?>"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_email'] ); ?></a>
						</div>
						<?php } ?>
						<div class="contact-info-divider"></div>
						<h5><?php esc_html_e( 'OPENING HOURS', 'car-repair-services' ); ?></h5>
						<?php if ( $car_repair_services_opt['car_repair_services-footer_contact_clock'] != '' ) { ?>
						<div class="contact-info"><i class="icon icon-clock"></i><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_contact_clock'] ); ?>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php

			if ( $footer_map == 1 ) :
				if ( ( isset( $car_repair_services_opt['car_repair_services-footer_map_embed'] ) && $car_repair_services_opt['car_repair_services-footer_map_embed'] ) == 1 ) {
					?>
					   <div class="footer-map"><?php echo sprintf( __( '%s', 'car-repair-services' ), $car_repair_services_opt['car_repair_services-footer_map_embed_code'] ); ?></div>
					<?php
				} else {
					 do_action( 'car_repair_services_after_footer' );
				}
		  endif;
			?>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="copyright"><?php echo wp_kses_post( $car_repair_services_opt['car_repair_services-footer_copyright'] ); ?></div>
				<div class="footer-bottom-right">
					<div class="social-links">
						<ul>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-facebook'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-facebook'] ) ) { ?>
								<li> 
									<a class="icon icon-facebook-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-facebook'] ); ?>"></a>
								</li>
							<?php } ?>
	
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-twitter'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-twitter'] ) ) { ?>
								<li> 
									<a class="icon icon-twitter-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-twitter'] ); ?>"></a>
								</li>
							<?php } ?>
	
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-instagram'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-instagram'] ) ) { ?>
								<li> 
									<a class="icon icon-instagram-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-instagram'] ); ?>"></a>
								</li>
							<?php } ?>
	
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-google-plus'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-google-plus'] ) ) { ?>
								<li> 
									<a class="icon icon-google-plus-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-google-plus'] ); ?>"></a>
								</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-youtube'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-youtube'] ) ) { ?>
									<li> 
										<a class="icon icon-youtube" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-youtube'] ); ?>"></a>
									</li>
							<?php } ?>
							<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-tumblr'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-tumblr'] ) ) { ?>
									<li> 
										<a class="icon icon-tumblr-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-tumblr'] ); ?>"></a>
									</li>
								<?php } ?>
								<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-behance'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-behance'] ) ) { ?>
									<li> 
										<a class="icon icon-behance-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-behance'] ); ?>"></a>
									</li>
								<?php } ?>
								<?php if ( isset( $car_repair_services_opt['car_repair_services-footer-linkedin'] ) && ! empty( $car_repair_services_opt['car_repair_services-footer-linkedin'] ) ) { ?>
									<li> 
										<a class="icon icon-linkedin-logo" target="_blank" href="<?php echo esc_url( $car_repair_services_opt['car_repair_services-footer-linkedin'] ); ?>"></a>
									</li>
								<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
