<!-- Header -->
<?php
$car_repair_services = car_repair_services_options();
$header_cell_no = $car_repair_services['car_repair_services-header-cell-no'];

if (isset($car_repair_services['car_repair_services-is_sticky_header']) && $car_repair_services['car_repair_services-is_sticky_header'] == 1) {
    ?>
    <header class="page-header-2 sticky">
    <?php } else { ?>
        <header class="page-header-2">
        <?php } ?>
        <div class="header-info-mobile">
        <div class="header-info-mobile-inside">
            <?php
            if (isset($car_repair_services['car_repair_services-page-header-mobile-location']) && $car_repair_services['car_repair_services-page-header-mobile-location'] != '') {
            ?>
            <p><i class="icon icon-locate"></i>
                <?php
                    echo wp_kses_post($car_repair_services['car_repair_services-page-header-mobile-location']);
                ?>
            </p>
            <?php } ?>
            <?php
            if (isset($car_repair_services['car_repair_services-page-header-mobile-phone']) && $car_repair_services['car_repair_services-page-header-mobile-phone'] != '') { 
            ?>
            <p><i class="icon icon-phone"></i>
                <?php
                    echo wp_kses_post($car_repair_services['car_repair_services-page-header-mobile-phone']);
                ?>
            </p>
            <?php } ?>
            <?php 
                if (isset($car_repair_services['car_repair_services-page-header-mobile-email']) && $car_repair_services['car_repair_services-page-header-mobile-email'] != '') {
            ?>
            <p><i class="icon icon-email"></i>
                <?php
                    echo wp_kses_post($car_repair_services['car_repair_services-page-header-mobile-email']);
                ?>
            </p>
            <?php } ?>
            <?php
            if (isset($car_repair_services['car_repair_services-page-header-mobile-hour']) && $car_repair_services['car_repair_services-page-header-mobile-hour'] != '') {
            ?>
            <p><i class="icon icon-clock"></i>
                <?php
                    echo wp_kses_post($car_repair_services['car_repair_services-page-header-mobile-hour']);
                ?>
            </p>
            <?php } ?>
        </div>
        </div>

        <div class="header-topline">
            <?php if (isset($car_repair_services['car_repair_services-page-header-mobile']) && $car_repair_services['car_repair_services-page-header-mobile']): ?>
            <div class="header-info-toggle"><i class="icon-arrow_down js-info-toggle"></i></div>
            <?php endif; ?>

            <div class="header-right-top">
                <?php
                if (isset($car_repair_services['car_repair_services-header-top-right-line-switch']) && $car_repair_services['car_repair_services-header-top-right-line-switch'] == 1) {
                    ?>
                    <?php if (isset($car_repair_services['is_modal_enable']) && $car_repair_services['is_modal_enable'] == 1 || isset($car_repair_services['is_modal_enable_sm']) && $car_repair_services['is_modal_enable_sm'] == 1) { ?>
                        <a href="<?php echo esc_url("#")?>" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
                            <?php
                            if (isset($car_repair_services['car_repair_services-header-top-right-line']) && $car_repair_services['car_repair_services-header-top-right-line'] != '') {
                                echo '<span>' . wp_kses_post($car_repair_services['car_repair_services-header-top-right-line']) . '</span>';
                            }
                            ?>
                        </a>
                        <?php
                    } else {
                        $url = wp_kses_post($car_repair_services['car_repair_services-appoinment-url']);
                        ?>
                        <a class="appointment" href="<?php echo esc_url($url); ?>" ><i class="icon-shape icon"></i>
                            <?php
                            if (isset($car_repair_services['car_repair_services-header-top-right-line']) && $car_repair_services['car_repair_services-header-top-right-line'] != '') {
                                echo '<span>' . wp_kses_post($car_repair_services['car_repair_services-header-top-right-line']) . '</span>';
                            }
                            ?>
                        </a>
                    <?php } ?>
                <?php } ?>
            </div>

			<div class="container">
				<div class="row-flex">
                <?php if (isset($car_repair_services['car_repair_services-header-bottom-line']) && $car_repair_services['car_repair_services-header-bottom-line'] && $car_repair_services['car_repair_services-header-top-left-line2'] != '') { ?>
					<div class="col-left"><i class="icon icon-clock"></i><?php echo wp_kses_post($car_repair_services['car_repair_services-header-top-left-line2']); ?></div>
                <?php } ?>
					<div class="col-center"><i class="icon icon-phone"></i><span class="hidden-md"><?php echo esc_html($car_repair_services['car_repair_services-header-bottom-line']);?></span> <a href="tel:<?php echo esc_attr($header_cell_no); ?>" class="header-phone"><?php echo esc_html($header_cell_no); ?></a></div>

                    <?php
                    if (isset($car_repair_services['car_repair_services-page-header-mobile-location']) && $car_repair_services['car_repair_services-page-header-mobile-location'] != '') {
                    ?>
					<div class="col-right"><i class="icon icon-locate"></i><?php  echo wp_kses_post($car_repair_services['car_repair_services-page-header-mobile-location']); ?></div>
                    <?php } ?>
				</div>
			</div>

        </div>

        <nav class="navbar" id="slide-nav">
            <div class="container">
                <div class="header-row">
                    <?php if (isset($car_repair_services['car_repair_services-logo']['url']) && $car_repair_services['car_repair_services-logo']['url']) { ?>
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                <img src="<?php echo esc_url($car_repair_services['car_repair_services-logo']['url']) ?>" alt="<?php esc_html_e('Logo', 'car-repair-services') ?>">
                            </a>
                        </div>
                    <?php } ?>

                    <div id="slidemenu">
                        <div class="close-menu"><i class="icon-close-cross"></i></div>
                        <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'nav navbar-nav',
                                        'container' => 'ul',
                                        'walker' => new Walker_Car_Repair_Services_Menu() //use our custom walker
                                    )
                            );
                        }else{
                            wp_nav_menu(
                                array(
                                    'menu_class' => 'nav navbar-nav',
                                    'container' => 'ul',
                                    'walker' => new Walker_Car_Repair_Services_Menu() //use our custom walker
                                )
                            );     
                        }
                        ?>
                    </div>
                    <div class="header-row-right">
                        <?php if (isset($car_repair_services['car_repair_services-menu-search-button']) && $car_repair_services['car_repair_services-menu-search-button'] == 1) { ?>
                        <div class="search-container-wrap">
                        <?php get_template_part('searchform-top'); ?>
                        </div>
                        <?php } ?>
                        <?php
                        if (isset($car_repair_services['car_repair_services-header-top-right-cart-icon-switch']) && $car_repair_services['car_repair_services-header-top-right-cart-icon-switch'] == 1) {
                            ?>
                            <!-- start mini  cart-->
                            <?php if (class_exists('WooCommerce')) : ?>  
                                <div class="header-cart">
                                    <?php
                                    $count = WC()->cart->cart_contents_count;
                                    ?><a class="cart-contents icon icon-shop-cart" href="<?php echo esc_js('javascript:void(0)')?>"><?php
                                    if ($count > 0) {
                                        ?>
                                            <span class="badge cart-contents-count"><?php echo esc_html($count); ?></span>
                                            <?php
                                        }
                                        ?></a>
                                    <div class="header-cart-dropdown">
                                        <?php get_template_part('woocommerce/cart/mini', 'cart'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                        <button type="button" class="navbar-toggle"><i class="icon icon-mobile_menu"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </header>
