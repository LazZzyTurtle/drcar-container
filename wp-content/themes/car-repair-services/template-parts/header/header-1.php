<!-- Header -->
<?php
$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';

if ( $theme != '1' ) {
	$car_repair_services = car_repair_services_options();
	if ( isset( $car_repair_services['car_repair_services-is_sticky_header'] ) && $car_repair_services['car_repair_services-is_sticky_header'] == 1 ) {
		?>
	<header class="page-header page-header-1 sticky">
		<?php } else { ?>
		<header class="page-header page-header-1">
		<?php } ?>
		<nav class="navbar" id="slide-nav">
			<div class="container">
				<?php
				if ( isset( $car_repair_services['car_repair_services-page-header-mobile'] ) && $car_repair_services['car_repair_services-page-header-mobile'] ) :
					?>
					<div class="header-info-mobile">
						<div class="header-info-mobile-inside">
							<?php
							if ( isset( $car_repair_services['car_repair_services-page-header-mobile-location'] ) && $car_repair_services['car_repair_services-page-header-mobile-location'] != '' ) {
								?>
							<p><i class="icon icon-locate"></i>
								<?php
									echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-location'] );
								?>
							</p>
							<?php } ?>
							<?php
							if ( isset( $car_repair_services['car_repair_services-page-header-mobile-phone'] ) && $car_repair_services['car_repair_services-page-header-mobile-phone'] != '' ) {
								?>
							<p><i class="icon icon-phone"></i>
								<?php
									echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-phone'] );
								?>
							</p>
							<?php } ?>
							<?php
							if ( isset( $car_repair_services['car_repair_services-page-header-mobile-email'] ) && $car_repair_services['car_repair_services-page-header-mobile-email'] != '' ) {
								?>
							<p><i class="icon icon-email"></i>
								<?php
								echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-email'] );
								?>
							</p>
							<?php } ?>
							<?php
							if ( isset( $car_repair_services['car_repair_services-page-header-mobile-hour'] ) && $car_repair_services['car_repair_services-page-header-mobile-hour'] != '' ) {
								?>
							<p><i class="icon icon-clock"></i>
								<?php echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-hour'] ); ?>
							</p>
							<?php } ?>
						</div>
					</div>
				<?php endif; ?>
				<div class="heade-mobile-top">
					<div class="header-info-toggle"><i class="icon-arrow_down js-info-toggle"></i></div>
					<?php
					if ( isset( $car_repair_services['car_repair_services-header-top-right-line-switch'] ) && $car_repair_services['car_repair_services-header-top-right-line-switch'] == 1 ) {
						?>
						<?php if ( isset( $car_repair_services['is_modal_enable'] ) && $car_repair_services['is_modal_enable'] == 1 || isset( $car_repair_services['is_modal_enable_sm'] ) && $car_repair_services['is_modal_enable_sm'] == 1 ) { ?>
							<a href="<?php echo esc_url( '#' ); ?>" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
								<?php
								if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
									echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
								}
								?>
							</a>
							<?php
						} else {
							$url = wp_kses_post( $car_repair_services['car_repair_services-appoinment-url'] );
							?>
							<a  class="appointment" href="<?php echo esc_url( $url ); ?>" ><i class="icon-shape icon"></i>
								<?php
								if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
									echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
								}
								?>
							</a>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="heade-mobile">
					<div class="col-left mr-auto">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php echo esc_url( $car_repair_services['car_repair_services-logo']['url'] ); ?>" alt="<?php esc_html_e( 'Logo', 'car-repair-services' ); ?>">
							</a>
						</div>
					</div>
					<div class="col-right">
						<div class="address">
						<?php echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-hour'] ); ?>
						</div>
						<?php
						if ( isset( $car_repair_services['car_repair_services-header-top-right-line-switch'] ) && $car_repair_services['car_repair_services-header-top-right-line-switch'] == 1 ) {
							?>
							<?php if ( isset( $car_repair_services['is_modal_enable'] ) && $car_repair_services['is_modal_enable'] == 1 || isset( $car_repair_services['is_modal_enable_sm'] ) && $car_repair_services['is_modal_enable_sm'] == 1 ) { ?>
							<a href="<?php echo esc_url( '#' ); ?>" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
								<?php
								if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
									echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
								}
								?>
							</a>
								<?php
							} else {
								$url = wp_kses_post( $car_repair_services['car_repair_services-appoinment-url'] );
								?>
							<a  class="appointment" href="<?php echo esc_url( $url ); ?>" ><i class="icon-shape icon"></i>
								<?php
								if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
									echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
								}
								?>
							</a>
							<?php } ?>
						<?php } ?>
						<?php
						if ( isset( $car_repair_services['car_repair_services-menu-search-button'] ) && $car_repair_services['car_repair_services-menu-search-button'] == 1 ) {
							get_template_part( 'searchform-top' );
						}
						?>
						<?php
						if ( isset( $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] ) && $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] == 1 ) {
							?>
							<!-- start mini  cart-->
							<?php if ( class_exists( 'WooCommerce' ) ) : ?>  
								<div class="header-cart">
									<?php
									$count = WC()->cart->cart_contents_count;
									?>
									<a class="cart-contents icon icon-shop-cart" href="<?php echo esc_js( 'javascript:void(0)' ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'car-repair-services' ); ?>">
									<?php
									if ( $count > 0 ) {
										?>
											<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
										<?php
									}
									?>
										</a>

									<div class="header-cart-dropdown">
										<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
									</div>
								</div>

							<?php endif; ?>
						<?php } ?>
						<button type="button" class="navbar-toggle" style="">
							<span></span>
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
				<div class="header-row">
					<?php if ( isset( $car_repair_services['car_repair_services-page-header-mobile'] ) && $car_repair_services['car_repair_services-page-header-mobile'] ) : ?>
						<div class="header-info-toggle"><i class="icon-arrow_down js-info-toggle"></i></div>
					<?php endif; ?>

					<?php if ( isset( $car_repair_services['car_repair_services-logo']['url'] ) && $car_repair_services['car_repair_services-logo']['url'] ) { ?>
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $car_repair_services['car_repair_services-logo']['url'] ); ?>" alt="<?php esc_html_e( 'Logo', 'car-repair-services' ); ?>">
							</a>
						</div>
					<?php } ?>

					<div class="header-right">
						
						<?php
						if ( isset( $car_repair_services['car_repair_services-header-right-content'] ) && $car_repair_services['car_repair_services-header-right-content'] == 1 ) {
							?>

							<div class="header-right-top">
								<div class="address">
									<?php
									if ( isset( $car_repair_services['car_repair_services-header-top-left-line2'] ) && $car_repair_services['car_repair_services-header-top-left-line2'] != '' ) {
										echo wp_kses_post( $car_repair_services['car_repair_services-header-top-left-line2'] );
									}
									?>
								</div>
								<?php
								if ( isset( $car_repair_services['car_repair_services-header-top-right-line-switch'] ) && $car_repair_services['car_repair_services-header-top-right-line-switch'] == 1 ) {
									?>
									<?php if ( isset( $car_repair_services['is_modal_enable'] ) && $car_repair_services['is_modal_enable'] == 1 || isset( $car_repair_services['is_modal_enable_sm'] ) && $car_repair_services['is_modal_enable_sm'] == 1 ) { ?>
										<a href="<?php echo esc_url( '#' ); ?>" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
											<?php
											if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
												echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
											}
											?>
										</a>
										<?php
									} else {
										$url = wp_kses_post( $car_repair_services['car_repair_services-appoinment-url'] );
										?>
										<a  class="appointment" href="<?php echo esc_url( $url ); ?>" ><i class="icon-shape icon"></i>
											<?php
											if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
												echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
											}
											?>
										</a>
									<?php } ?>
								<?php } ?>
								<button type="button" class="navbar-toggle"><i class="icon icon-lines-menu"></i></button>
							</div>
							<div class="header-right-bottom">
								<div class="header-phone">
									<?php
									if ( isset( $car_repair_services['car_repair_services-header-bottom-line'] ) && $car_repair_services['car_repair_services-header-bottom-line'] != '' ) {
										echo '<span class="text">' . wp_kses_post( $car_repair_services['car_repair_services-header-bottom-line'] ) . '</span>';
									}
									?>
									<?php
									if ( isset( $car_repair_services['car_repair_services-header-cell-no'] ) && $car_repair_services['car_repair_services-header-cell-no'] != '' ) {
										echo '<span class="phone-number">' . wp_kses_post( $car_repair_services['car_repair_services-header-cell-no'] ) . '</span>';
									}
									?>
								</div>
								<?php
								if ( isset( $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] ) && $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] == 1 ) {
									?>
									<!-- start mini  cart-->
									<?php if ( class_exists( 'WooCommerce' ) ) : ?>  
										<div class="header-cart">
											<?php
											$count = WC()->cart->cart_contents_count;
											?>
											<a class="cart-contents icon icon-shop-cart" href="<?php echo esc_js( 'javascript:void(0)' ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'car-repair-services' ); ?>">
											<?php
											if ( $count > 0 ) {
												?>
													<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
												<?php
											}
											?>
												</a>

											<div class="header-cart-dropdown">
												<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
											</div>
										</div>

									<?php endif; ?>
								<?php } ?>
								<!--stop mini cart-->
							</div>

						<?php } ?>
					</div>
				</div>
				<div id="slidemenu">
					<div class="row">
						<div class="col-md-11">
							<div class="close-menu"><i class="icon-close-cross"></i></div>
							<?php
							if ( has_nav_menu( 'primary' ) ) {
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'menu_class'     => 'nav navbar-nav',
										'container'      => 'ul',
										'walker'         => new Walker_Car_Repair_Services_Menu(), // use our custom walker
									)
								);
							} else {
								wp_nav_menu(
									array(
										'menu_class' => 'nav navbar-nav',
										'container'  => 'ul',
										'walker'     => new Walker_Car_Repair_Services_Menu(), // use our custom walker
									)
								);
							}
							?>
						</div>
						<?php if ( isset( $car_repair_services['car_repair_services-menu-search-button'] ) && $car_repair_services['car_repair_services-menu-search-button'] == 1 ) { ?>
							<div class="col-md-1">
								<?php get_template_part( 'searchform-top' ); ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<!-- // Header -->
	<?php
} else {

	$car_repair_services = car_repair_services_options();
	if ( isset( $car_repair_services['car_repair_services-is_sticky_header'] ) && $car_repair_services['car_repair_services-is_sticky_header'] == 1 ) {
		?>
		<header class="page-header page-header-1 sticky">
		<?php } else { ?>
			<header class="page-header page-header-1">
			<?php } ?>
			<nav class="navbar" id="slide-nav">
				<div class="container">
					<?php
					if ( isset( $car_repair_services['car_repair_services-page-header-mobile'] ) && $car_repair_services['car_repair_services-page-header-mobile'] ) :
						?>
						<div class="header-info-mobile">
							<div class="header-info-mobile-inside">
								<?php
								if ( isset( $car_repair_services['car_repair_services-page-header-mobile-location'] ) && $car_repair_services['car_repair_services-page-header-mobile-location'] != '' ) {
									?>
								<p><i class="icon icon-locate"></i>
									<?php
										echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-location'] );
									?>
								</p>
								<?php } ?>
								<?php
								if ( isset( $car_repair_services['car_repair_services-page-header-mobile-phone'] ) && $car_repair_services['car_repair_services-page-header-mobile-phone'] != '' ) {
									?>
								<p><i class="icon icon-phone"></i>
									<?php
										echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-phone'] );
									?>
								</p>
								<?php } ?>
								<?php
								if ( isset( $car_repair_services['car_repair_services-page-header-mobile-email'] ) && $car_repair_services['car_repair_services-page-header-mobile-email'] != '' ) {
									?>
								<p><i class="icon icon-email"></i>
									<?php
									echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-email'] );
									?>
								</p>
								<?php } ?>
								<?php
								if ( isset( $car_repair_services['car_repair_services-page-header-mobile-hour'] ) && $car_repair_services['car_repair_services-page-header-mobile-hour'] != '' ) {
									?>
								<p><i class="icon icon-clock"></i>
									<?php
										echo wp_kses_post( $car_repair_services['car_repair_services-page-header-mobile-hour'] );
									?>
								</p>
								<?php } ?>
							</div>
						</div>
					<?php endif; ?>
	
					<div class="header-row">
	
						<?php if ( isset( $car_repair_services['car_repair_services-page-header-mobile'] ) && $car_repair_services['car_repair_services-page-header-mobile'] ) : ?>
							<div class="header-info-toggle"><i class="icon-arrow_down js-info-toggle"></i></div>
						<?php endif; ?>
	
						<?php if ( isset( $car_repair_services['car_repair_services-logo']['url'] ) && $car_repair_services['car_repair_services-logo']['url'] ) { ?>
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $car_repair_services['car_repair_services-logo']['url'] ); ?>" alt="<?php esc_html_e( 'Logo', 'car-repair-services' ); ?>">
								</a>
							</div>
						<?php } ?>
	
						<div class="header-right">
	
							<button type="button" class="navbar-toggle"><i class="icon icon-lines-menu"></i></button>
	
							<?php
							if ( isset( $car_repair_services['car_repair_services-header-right-content'] ) && $car_repair_services['car_repair_services-header-right-content'] == 1 ) {
								?>
	
								<div class="header-right-top">
									<div class="address">
										<?php
										if ( isset( $car_repair_services['car_repair_services-header-top-left-line2'] ) && $car_repair_services['car_repair_services-header-top-left-line2'] != '' ) {
											echo wp_kses_post( $car_repair_services['car_repair_services-header-top-left-line2'] );
										}
										?>
	
									</div>
									<?php
									if ( isset( $car_repair_services['car_repair_services-header-top-right-line-switch'] ) && $car_repair_services['car_repair_services-header-top-right-line-switch'] == 1 ) {
										?>
										<?php if ( isset( $car_repair_services['is_modal_enable'] ) && $car_repair_services['is_modal_enable'] == 1 || isset( $car_repair_services['is_modal_enable_sm'] ) && $car_repair_services['is_modal_enable_sm'] == 1 ) { ?>
											<a href="<?php echo esc_url( '#' ); ?>" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
												<?php
												if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
													echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
												}
												?>
											</a>
											<?php
										} else {
											$url = wp_kses_post( $car_repair_services['car_repair_services-appoinment-url'] );
											?>
	
											<a  class="appointment" href="<?php echo esc_url( $url ); ?>" ><i class="icon-shape icon"></i>
												<?php
												if ( isset( $car_repair_services['car_repair_services-header-top-right-line'] ) && $car_repair_services['car_repair_services-header-top-right-line'] != '' ) {
													echo '<span>' . wp_kses_post( $car_repair_services['car_repair_services-header-top-right-line'] ) . '</span>';
												}
												?>
											</a>
	
										<?php } ?>
	
	
									<?php } ?>
	
								</div>
								<div class="header-right-bottom">
									<div class="header-phone">
										<?php
										if ( isset( $car_repair_services['car_repair_services-header-bottom-line'] ) && $car_repair_services['car_repair_services-header-bottom-line'] != '' ) {
											echo '<span class="text">' . wp_kses_post( $car_repair_services['car_repair_services-header-bottom-line'] ) . '</span>';
										}
										?>
										<?php
										if ( isset( $car_repair_services['car_repair_services-header-cell-no'] ) && $car_repair_services['car_repair_services-header-cell-no'] != '' ) {
											echo '<span class="phone-number">' . wp_kses_post( $car_repair_services['car_repair_services-header-cell-no'] ) . '</span>';
										}
										?>
									</div>
									<?php
									if ( isset( $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] ) && $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] == 1 ) {
										?>
										<!-- start mini  cart-->
										<?php if ( class_exists( 'WooCommerce' ) ) : ?>  
											<div class="header-cart">
												<?php
												$count = WC()->cart->cart_contents_count;
												?>
												<a class="cart-contents icon icon-shop-cart" href="<?php echo esc_js( 'javascript:void(0)' ); ?>" title="<?php esc_html_e( 'View your shopping cart', 'car-repair-services' ); ?>">
												<?php
												if ( $count > 0 ) {
													?>
														<span class="badge cart-contents-count"><?php echo esc_html( $count ); ?></span>
													<?php
												}
												?>
													</a>
	
												<div class="header-cart-dropdown">
													<?php get_template_part( 'woocommerce/cart/mini', 'cart' ); ?>
												</div>
											</div>
	
										<?php endif; ?>
									<?php } ?>
									<!--stop mini cart-->
								</div>
	
							<?php } ?>
						</div>
					</div>
					<div id="slidemenu">
						<div class="row">
							<div class="col-md-11">
								<div class="close-menu"><i class="icon-close-cross"></i></div>
								<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_class' => 'nav navbar-nav',
											'container'  => 'ul',
											'walker'     => new Walker_Car_Repair_Services_Menu(), // use our custom walker
										)
									);
								} else {
									wp_nav_menu(
										array(
											'menu_class' => 'nav navbar-nav',
											'container'  => 'ul',
											'walker'     => new Walker_Car_Repair_Services_Menu(), // use our custom walker
										)
									);
								}
								?>
							</div>
							<?php if ( isset( $car_repair_services['car_repair_services-menu-search-button'] ) && $car_repair_services['car_repair_services-menu-search-button'] == 1 ) { ?>
								<div class="col-md-1">
									<div class="search-container">
										<?php get_search_form(); ?>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<!-- // Header -->
	<?php
}
