<?php
/*
 * print css with cheking value is empty or not
 *
 */

function car_repair_services_print_css( $props = '', $values = array(), $vkey = '', $pre_fix = '', $post_fix = '' ) {
	if ( isset( $values[ $vkey ] ) && ! empty( $values[ $vkey ] ) ) {
		print wp_kses_post( $props . ':' . $pre_fix . $values[ $vkey ] . $post_fix . ";\n" );
	}
}

function car_repair_services_color_brightness( $colourstr, $steps, $darken = false ) {
	$colourstr = str_replace( '#', '', $colourstr );
	$rhex      = substr( $colourstr, 0, 2 );
	$ghex      = substr( $colourstr, 2, 2 );
	$bhex      = substr( $colourstr, 4, 2 );

	$r = hexdec( $rhex );
	$g = hexdec( $ghex );
	$b = hexdec( $bhex );

	if ( $darken ) {
		$steps = $steps * -1;
	}

	$r = max( 0, min( 255, $r + $steps ) );
	$g = max( 0, min( 255, $g + $steps ) );
	$b = max( 0, min( 255, $b + $steps ) );

	$hex  = '#';
	$hex .= str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
	$hex .= str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
	$hex .= str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );

	return $hex;
}

function car_repair_services_get_custom_styles() {
	global $car_repair_services_opt;
	$redix_opt_prefix = 'car_repair_services';

	$car_repair_services_colors = get_theme_mod( 'car_repair_services_colors', array() );
	$car_repair_services_css    = get_theme_mod( 'car_repair_services_css', array() );

	ob_start();
	?>
	body{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-body_typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-body_typography' ], 'font-weight' );
	car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-body_typography' ], 'font-size' );
	car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-body_typography' ], 'line-height' );
	car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-body_typography' ], 'color' );
	?>
	}

	<?php if ( isset( $car_repair_services_opt[ $redix_opt_prefix . '-header_background_top' ] ) && isset( $car_repair_services_opt[ $redix_opt_prefix . '-header_background_top' ]['rgba'] ) ) { ?>
		header.page-header-1 .header-right .address::after {
		border-color: transparent <?php echo esc_attr( $car_repair_services_opt[ $redix_opt_prefix . '-header_background_top' ]['rgba'] ); ?> transparent transparent;
		}
	<?php } ?>

	<?php if ( isset( $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ] ) ) { ?>
		@media (min-width: 992px){
		header.page-header-1 .navbar-nav > li > a,
		header.page-header-2 .navbar-nav > li > a{
		<?php
		car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ], 'font-family' );
		car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ], 'font-weight' );
		car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ], 'font-size' );
		car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ], 'line-height' );
		car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ], 'color' );
		car_repair_services_print_css( 'font-style', $car_repair_services_opt[ $redix_opt_prefix . '-menu_typography' ], 'font-style' );
		car_repair_services_print_css( 'color', $car_repair_services_colors, 'menu_link_color' );
		?>
		}
		}
	<?php } ?>

	<?php if ( isset( $car_repair_services_opt[ $redix_opt_prefix . '-header-type' ] ) && $car_repair_services_opt[ $redix_opt_prefix . '-header-type' ] == '1' && is_array( $car_repair_services_opt[ $redix_opt_prefix . '-header_background_image' ] ) && $car_repair_services_opt[ $redix_opt_prefix . '-header_background_image' ]['url'] != '' ) : ?>
		header .header-row {
		background: rgba(0, 0, 0, 0) url("<?php echo esc_url( $car_repair_services_opt[ $redix_opt_prefix . '-header_background_image' ]['url'] ); ?>") repeat scroll 0 0;
		}
		<?php
	endif;
	if ( isset( $car_repair_services_opt[ $redix_opt_prefix . '-header-transparent' ] ) && ( $car_repair_services_opt[ $redix_opt_prefix . '-header-transparent' ] == 1 ) ) :
		?>
		/*--------   2.2 Header          --------*/
		body.home header.page-header {
		position: absolute;
		background: none;
		}
		body:not(.home) {
		background: url(<?php echo esc_url( $car_repair_services_opt[ $redix_opt_prefix . '-other_background_image' ]['url'] ); ?>) no-repeat center 0 !important;
		}
		@media (max-width: 991px){
		#pageTitle {
		background: url(<?php echo esc_url( $car_repair_services_opt[ $redix_opt_prefix . '-other_background_image' ]['url'] ); ?>) repeat 0;
		background-size: cover;
		}
		}
		body:not(.home) #pageContent {
		padding-top: 100px;
		}
		<?php
	endif;
	?>
	h1{
	<?php
	$heading_1_typography = isset( $car_repair_services_opt[ $redix_opt_prefix . '-heading-1-typography' ] ) ? $car_repair_services_opt[ $redix_opt_prefix . '-heading-1-typography' ] : '';

	car_repair_services_print_css( 'font-family', $heading_1_typography, 'font-family' );
	car_repair_services_print_css( 'font-weight', $heading_1_typography, 'font-weight' );
	car_repair_services_print_css( 'font-size', $heading_1_typography, 'font-size' );
	car_repair_services_print_css( 'line-height', $heading_1_typography, 'line-height' );
	car_repair_services_print_css( 'color', $heading_1_typography, 'color' );
	?>
	}
	h2{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-heading-2-typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-heading-2-typography' ], 'font-weight' );
	car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-heading-2-typography' ], 'font-size' );
	car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-heading-2-typography' ], 'line-height' );
	car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-heading-2-typography' ], 'color' );
	?>
	}
	h3{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-heading-3-typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-heading-3-typography' ], 'font-weight' );
	car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-heading-3-typography' ], 'font-size' );
	car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-heading-3-typography' ], 'line-height' );
	car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-heading-3-typography' ], 'color' );
	?>
	}
	h4{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-heading-4-typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-heading-4-typography' ], 'font-weight' );
	car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-heading-4-typography' ], 'font-size' );
	car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-heading-4-typography' ], 'line-height' );
	car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-heading-4-typography' ], 'color' );
	?>
	}
	h5{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-heading-5-typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-heading-5-typography' ], 'font-weight' );
	car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-heading-5-typography' ], 'font-size' );
	car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-heading-5-typography' ], 'line-height' );
	car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-heading-5-typography' ], 'color' );
	?>
	}
	h6{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-heading-6-typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-heading-6-typography' ], 'font-weight' );
	car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-heading-6-typography' ], 'font-size' );
	car_repair_services_print_css( 'line-height', $car_repair_services_opt[ $redix_opt_prefix . '-heading-6-typography' ], 'line-height' );
	car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-heading-6-typography' ], 'color' );
	?>
	}
	a{ <?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'lnk_color' ); ?> }
	a:hover{ <?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'lnk_color_hover' ); ?> }
	.car_repair_services_wc_products_tab.vc_tta.vc_tta-style-classic .vc_tta-tab a{ <?php car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-body_typography' ], 'font-family' ); ?> }
	.widget-title, .title-contact-info, .widgettitle{
	<?php car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-widget_title_typography' ], 'font-family' ); ?>
	<?php car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-widget_title_typography' ], 'font-weight' ); ?>
	<?php car_repair_services_print_css( 'font-size', $car_repair_services_opt[ $redix_opt_prefix . '-widget_title_typography' ], 'font-size' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_opt[ $redix_opt_prefix . '-widget_title_typography' ], 'color' ); ?>
	}

	body{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'body_color' ); ?>
	}


	/*anchor*/

	dl, dd, a{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'link_color' ); ?>
	}

	a:hover,h1 a:hover, h2 a:hover,.column-right .side-block ul li a:hover{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'link_hover_color' ); ?>
	}

	/*heading*/
	.loader-circle-2{
	<?php car_repair_services_print_css( 'border-right-color', $car_repair_services_colors, 'preloader_color' ); ?>
	}
	.loader .line:nth-child(6),.loader .subline:nth-child(11){
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'preloader_color' ); ?>
	}
	.loader .needle:before{
	<?php if ( isset( $car_repair_services_colors['preloader_color'] ) ) : ?>
		border-color: transparent <?php echo esc_attr( $car_repair_services_colors['preloader_color'] ); ?> transparent transparent;
	<?php endif; ?>
	}


	h1, h2.h-lg,.modal-header a:hover{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'heading_color' ); ?>
	}
	.block.bg-1 h1, .block.bg-2 h1, .block.bg-3 h1, .block.bg-1 h2, .block.bg-2 h2, .block.bg-3 h2, .block.bg-1 h3, .block.bg-2 h3, .block.bg-3 h3, .black-bg-color h2.h-lg,
	.banner-under-slider h2, .banner-under-slider h3, 
	.banner-under-slider h4,.block.bg-dark h1, .block.bg-dark h2, .block.bg-dark h3,
	.page-footer .footer-phone, .page-footer .footer-phone h2{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'heading2_color' ); ?>
	}
	.nav-pills > li.active > a, .nav-pills > li.active > a:focus, 
	.nav-pills > li.active > a:hover,.page-numbers.current{
	<?php car_repair_services_print_css( 'border', $car_repair_services_colors, 'comon_border_color', '1px solid', '' ); ?>
	}
	.side-block{
	<?php car_repair_services_print_css( 'border-bottom', $car_repair_services_colors, 'comon_border_color', '1px solid', '' ); ?>
	}
	.vc_toggle,.divider-line{
	<?php car_repair_services_print_css( 'border-top', $car_repair_services_colors, 'comon_border_color', '1px solid', '' ); ?>
	}
	.promo-banner{
	<?php car_repair_services_print_css( 'border', $car_repair_services_colors, 'comon_border_color', '2px dotted', '' ); ?>
	}
	.quote-simple {
	<?php car_repair_services_print_css( 'border-left', $car_repair_services_colors, 'comon_border_color', '4px solid', '' ); ?>
	}

	.color, a.color, a.color:hover, a.color:focus,
	.filters-by-category ul li a:hover, 
	.filters-by-category ul li a.selected,
	.blog-post .post-meta li i.icon,
	#appointmentForm.modal .modal-dialog .modal-header .close,
	.slick-prev:hover:before, .slick-next:hover:before,.reply a{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'heading_active_color', '', '!important' ); ?>
	}

	.block.bg-1, .block.bg-2, .block.bg-3, 
	block.bg-1 a, .block.bg-2 a, .block.bg-3 a,.banner-under-slider,
	.services-angle-text h5,header .header-phone,header .header-right .address{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'text_white_color' ); ?>
	}
	.text-icon .icon-wrapper > span i{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'white_icon-color' ); ?>
	}
	.vertical-tab-menu .list-group > a i.icon,
	.stat-box .icon,.contact-info > .icon,.social-links ul li a,
	.category-list > li:after,.services-block-alt .services-link,.promo-banner .icon-lg,.page-footer .contact-info .icon,
	.page-footer .social-links ul li a,.breadcrumbs .breadcrumb a:hover,
	.marker-list-sm > li:after,.link a,
	.post-preview .post-title a:hover{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'icon-color' ); ?>
	}

	@media (max-width: 991px) {  
	#slide-nav #slidemenu .close-menu,
	header.page-header .navbar-toggle {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'icon-color' ); ?>
	}  
	}

	a:hover,h1 a:hover, h2 a:hover,.column-right .side-block ul li a:hover{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'link_hover_color' ); ?>
	}
	/*heading*/
	h1, h2, h3, h4, h5, h6 ,h1 a, h2 a, h3 a, h4 a, h5 a, h6 a{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'heading_color' ); ?>
	}

	h1 b, h2 b,h3 b,h3 b{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'heading_span_color' ); ?>
	}
	@media (min-width: 992px){
	header.page-header-1 .navbar-nav > li.current-menu-item a, 
	header.page-header-1 .navbar-nav > li:hover a,
	header.page-header-1 .navbar-nav > li > a:after{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'menu_link_bg_color' ); ?>
	}
	}

	.back-to-top a,
	.services-block .image,
	.services-angle-text .number,
	.text-icon .icon-wrapper > span,
	.nav-pills > li.active > a,
	.nav-pills > li.active > a:focus, 
	.nav-pills > li.active > a:hover,
	.vc_toggle_square .vc_toggle_icon, 
	.vc_toggle_square.panel-heading1.vc_toggle_icon,
	.testimonials-item,td#today,
	.page-numbers.current,
	.service-icon .icon-wrapper span,
	.services-block-alt .image i,.image-scale-color:after,.text-icon-sm .icon-wrapper > span,
	.woocommerce #slide-nav #slidemenu.slide-active .search-container button.button,
	.woocommerce .search-container button.button:hover,.service-icon .icon-wrapper .fack_icon_div,.services-block-alt .image .fack_icon_div,



	.calendar_wrap td#today{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_comon_bg_color', '', '!important' ); ?>
	}

	<?php if ( isset( $car_repair_services_colors['theme_comon_bg_color'] ) ) { ?>
		body .services-block-alt .image i,.services-block-alt .image .fack_icon_div {
		<?php print wp_kses_post( '-webkit-box-shadow: 0 0 0 20px ' . $car_repair_services_colors['theme_comon_bg_color'] . ";\n" ); ?>
		<?php print wp_kses_post( '-moz-box-shadow: 0 0 0 20px ' . $car_repair_services_colors['theme_comon_bg_color'] . ";\n" ); ?>
		<?php print wp_kses_post( 'box-shadow: 0 0 0 20px ' . $car_repair_services_colors['theme_comon_bg_color'] . ";\n" ); ?>
	}
	.services-block-alt .image:hover i ,.services-block-alt .image:hover .fack_icon_div{
		<?php print wp_kses_post( '-webkit-box-shadow: 0 0 0 0px ' . $car_repair_services_colors['theme_comon_bg_color'] . ";\n" ); ?>
		<?php print wp_kses_post( '-moz-box-shadow: 0 0 0 0px ' . $car_repair_services_colors['theme_comon_bg_color'] . ";\n" ); ?>
		<?php print wp_kses_post( 'box-shadow: 0 0 0 0px ' . $car_repair_services_colors['theme_comon_bg_color'] . ";\n" ); ?>
	}
	
	@media (max-width: 991px) {
	.header-info-mobile {
		<?php
		car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_comon_bg_color', '' );
		?>
	} } 
		
	<?php } ?>

	header.page-header .appointment,header.page-header .appointment:after,.modal-header .appointment:after{
	<?php
	if ( isset( $car_repair_services_colors['theme_apoint_angle_color'] ) ) :
		?>
		border-color: transparent <?php echo esc_attr( $car_repair_services_colors['theme_apoint_angle_color'] ); ?> transparent transparent;
	<?php endif; ?>
	}

	.input-custom:hover, 
	.input-custom:focus, 
	.input-custom.focus,
	.table .cell-marker,
	.coupon-print-inside{
	<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'theme_apoint_angle_color' ); ?>
	}
	header.page-header .appointment,.modal-header .appointment,.table .cell-marker{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_apoint_bg_color' ); ?>
	}

	.color, a.color, a.color:hover, a.color:focus,
	.services-block .service.dark h2, .services-block .service.dark h3, 
	.services-block .service.dark h4,header.page-header-1 .header-phone .phone-number .code,
	.marker-list > li:after,header.page-header-1 .header-right .address span,
	.testimonials-item .inside .rating,.services-block-alt .caption .title,
	.testimonial-card:after,.icon-star:before,
	blockquote::before{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_comon_text_color' ); ?>
	}
	.page-footer .footer-phone .number {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_comon_text_color' ); ?>
	}

	/*Menu Color*/
	@media (min-width: 992px){
	.navbar-nav > li.current-menu-item a,
	.navbar-nav > li:hover a,
	.navbar-nav > li > a:after,
	header.page-header-1 .navbar-nav > li.current-menu-item a, 
	header.page-header-1 .navbar-nav > li:hover a,
	header.page-header-1 .navbar-nav > li > a:after
	{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'menu_link_bg_color' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'menu_link_color' ); ?>
	}
	}

	/*Slider Color*/

	#mainSlider .slide-content h4,
	#mainSlider .slide-content p{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'slider_text_color' ); ?>
	}
	#mainSlider .slide-content h4{
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-slider_h4_title_typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-slider_h4_title_typography' ], 'font-weight' );
	?>
	}

	#mainSlider .slide-content h3{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'slider_text2_color' ); ?>
	<?php
	car_repair_services_print_css( 'font-family', $car_repair_services_opt[ $redix_opt_prefix . '-slider_h3_title_typography' ], 'font-family' );
	car_repair_services_print_css( 'font-weight', $car_repair_services_opt[ $redix_opt_prefix . '-slider_h3_title_typography' ], 'font-weight' );
	?>
	}
	#mainSlider .slick-prev:before,
	#mainSlider .slick-next:before{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'slider_navi_color' ); ?>
	}
	#mainSlider .slick-prev:hover:before, 
	#mainSlider .slick-next:hover:before{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'slider_navi_hover_color' ); ?>
	}
	.slick-dots li.slick-active button, 
	.slick-dots li.slick-active button:hover{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'slider_dot_hover_color' ); ?>
	}

	/*Button*/



	.btn:before, .btn:after,.column-right .widget_search button:hover,input[type="submit"]:hover,
	.tags-list li a:hover,.search-container:hover .button,.tagcloud a:hover{
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'button_hv_color' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button2_hover_text_color' ); ?>
	}
	.btn.btn-lg.btn-invert,.view-more-testimonial:hover{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button2_bg_color', '', '!important' ); ?>

	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button2_text_color', '', '' ); ?>
	}
	.btn-invert,
	.btn-lg.btn-invert.view-more-testimonial{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button_bg_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button_text_color', '', '!important' ); ?>
	}
	.blog-post a.more-link:before, .blog-post a.more-link:after {
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button_bg_color', '', '!important' ); ?>
	}
	.btn.btn-border{
	<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'button_border_color', ' ', '!important' ); ?>
	}


	.btn:hover, .btn.active, .btn:active, .btn.focus, .btn:focus{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button_hv_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button2_hover_text_color', '', '!important' ); ?>
	}
	.btn-invert:hover, .btn-invert.active, .btn-invert:active, .btn-invert.focus, .btn-invert:focus{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button_bg_hover_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button_hover_text_color', '', '!important' ); ?>
	}
	.btn::before, .btn::after {
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button_hv_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button2_hover_text_color', '', '!important' ); ?>
	}

	.btn.btn-invert::before, .btn.btn-invert::after {
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'button_bg_hover_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button_hover_text_color', '', '!important' ); ?>
	}

	.btn.btn-lg.btn-full.false-submit {
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'auto_search_button_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'auto_search_button_text_color', '', '!important' ); ?>
	}

	.btn.btn-lg.btn-full.false-submit:hover {
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'auto_search_button_hover_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'auto_search_button_text_hover_color', '', '!important' ); ?>
	}
	.btn.btn-lg.btn-full.false-submit span{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'auto_search_button_text_color', '', '!important' ); ?>
	}
	.btn.btn-lg.btn-full.false-submit:hover span {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'auto_search_button_text_hover_color', '', '!important' ); ?>
	}

	.btn::before, .btn::after, .column-right .widget_search button:hover, input[type="submit"]:hover, .tags-list li a:hover,
	#slide-nav #slidemenu.slide-active .search-container .button, .search-container:hover .button, .tagcloud a:hover {
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'search_button_bg_color', '', '!important' ); ?>
	}
	@media (max-width: 991px) {
	.header-info-toggle [class*='icon-']:hover {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'button_hv_color', '', '!important' ); ?>
	}
	}
	.coupon-text4 {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'coupon_title_color' ); ?>
	}
	.coupon-text5 {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'coupon_subtitle_color' ); ?>
	}
	.coupon .coupon-all::after {
	<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'coupon_button_color', '', ' transparent transparent' ); ?>
	}
	.coupon .coupon-all {
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'coupon_button_color' ); ?>
	}
	.coupon-print-inside{
	<?php car_repair_services_print_css( 'border', $car_repair_services_colors, 'coupon_border_color', '1px solid ' ); ?>
	}
	.coupon .coupon-all {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'coupon_button_text_color' ); ?>
	}
	.coupon-text2{
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'red_text_color' ); ?>
	}
	.coupon .coupon-all:hover::after {
	<?php car_repair_services_print_css( 'border-top-color', $car_repair_services_colors, 'coupon_button_hover_color' ); ?>
	}
	.coupon .coupon-all:hover {
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'coupon_button_hover_color' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'coupon_button_text_hover_color' ); ?>
	}

	header .header-cart:hover a.icon, header .header-cart.opened a.icon {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'cart_icon_color', '', '!important' ); ?>
	}
	.woocommerce .widget_price_filter .ui-slider .ui-slider-range {
	<?php car_repair_services_print_css( ' background-color', $car_repair_services_colors, 'shop_filter_color' ); ?>
	}
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	<?php car_repair_services_print_css( ' background-color', $car_repair_services_colors, 'shop_filter_color' ); ?>
	}
	.woocommerce span.onsale,header .header-cart .badge{
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'shop_sale_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'shop_sale_text_color', '', '!important' ); ?>
	}
	.woocommerce-page .btn,
	.woocommerce-page .btn.btn-lg{
	<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'shop_button_bg_color', '', '!important' ); ?>
	}
	.woocommerce .star-rating span::before ,.woocommerce .comment-form p.stars a,.woocommerce-tabs .tabs.wc-tabs li.active a {
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'shop_rateing_color', '', '!important' ); ?>
	}
	.wc-tabs > li > a::after{
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'shop_pagination_bg_color', '', '!important' ); ?>
	}
	.woocommerce-pagination .page-numbers .page-numbers.current,
	.woocommerce nav.woocommerce-pagination ul li a:focus, 
	body.woocommerce nav.woocommerce-pagination ul li a:hover, 
	.woocommerce nav.woocommerce-pagination ul li span.current{
	<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'shop_pagination_bg_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'shop_pagination_text_color', '', '!important' ); ?>
	<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'shop_pagination_border_color', '', '!important' ); ?>
	}
	.filters-row .page-numbers .current{
	background-color:transparent !important;
	color:#fede00;
	}

	header.page-header-2 a.appointment:after {
	<?php
	if ( isset( $car_repair_services_colors['theme_apoint_angle_color'] ) ) :
		?>
		border-color: transparent <?php echo esc_attr( $car_repair_services_colors['theme_apoint_angle_color'] ); ?> transparent transparent;
	<?php endif; ?>
	}
	<?php
	if ( isset( $car_repair_services_colors['theme_apoint_angle_color'] ) ) :
		?>
		header.page-header-2 a.appointment {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_apoint_bg_color' ); ?>
		}
	<?php endif; ?>
	<?php if ( isset( $car_repair_services_colors['theme_active_color'] ) ) { ?>
		header.page-header-2 .header-topline [class*='icon'] {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}
		body.layout-2 h1:after, body.layout-2 h2.h-lg:after {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}
		@media (min-width: 992px){
		header.page-header-2 .navbar-nav > li.current-menu-item > a:after, header.page-header-2 .navbar-nav > li:hover > a:after {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}
		}
		header.page-header-2 .search-container:hover .button {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}

		#mainSlider .banner-btn, #mainSlider .banner-btn:focus{
		border: 2px solid <?php echo esc_attr( $car_repair_services_colors['theme_active_color'] ); ?>;       
		}
		.services-tabs .services-tabs-icons > span.active {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>    
		}
		.base-color {
		<?php
		car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color', ' ', '!important' );
		?>
		}
		.btn:not([data-action]).btn-border {
		<?php
		car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'theme_active_color', ' ', '!important' );
		?>
		}
		.services-tabs .services-tab-info:after {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		.icons-tabs .nav-tabs > li.active > a [class*='icon-'], .icons-tabs .nav-tabs > li > a:hover [class*='icon-'] {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		.icons-tabs .nav-tabs > li > a::after {
		<?php car_repair_services_print_css( 'background', $car_repair_services_colors, 'theme_active_color' ); ?>      
		}
		.marker-list-sm-1 > li:after {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>  
		}
		.how-works-number {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>   
		}

		.banner-free .banner-text-1 { 
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>     
		}
		.banner-free .banner-text-1:after {
		border-color: <?php echo esc_attr( $car_repair_services_colors['theme_active_color'] ); ?> transparent transparent transparent;
		}
		.pricing-box-header {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>    
		}
		.text-icon-hor2 .icon-wrapper2 {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		#appointmentForm.modalform-sm .wpcf7-submit.btn {
		<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		body .textarea-custom:hover, 
		body .textarea-custom:focus, 
		body .input-custom:hover, 
		body .input-custom.focus, 
		body .wpcf7-form-control.wpcf7-textarea:hover, 
		body .wpcf7-form-control.wpcf7-textarea:focus {
		<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'theme_active_color', ' ', '!important' ); ?> 
		}
		.bootstrap-datetimepicker-widget table td.active, 
		.bootstrap-datetimepicker-widget table td.active:hover {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color', ' ', '!important' ); ?> 
		}
		div.wpcf7-validation-errors, div.wpcf7-acceptance-missing {
		<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}
		@media (min-width: 992px){
		header.page-header-2 .navbar-nav .dropdown-menu {
		<?php car_repair_services_print_css( 'border-bottom-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}
		}
		.pricing-box-footer .mark-icon {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		@media (max-width: 991px){
		header.page-header-2 .navbar-toggle:hover {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		}


		.filters-row .page-numbers .current {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		.estimator-panel .col-title [class*='icon'] {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		.service-grid-item:hover .service-grid-item-title {
		<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		.service-grid-item-title:after {
		border-color: transparent transparent <?php echo esc_attr( $car_repair_services_colors['theme_active_color'] ); ?> transparent;
		}
		@media (max-width: 767px){
		.estimator-panel .panel-toggle {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}
		}  
		.car-faq-text .vc_toggle_title:hover h4 {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?> 
		}header.page-header-2 .header-phone:hover {
		<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}


		<!-- Custom-color fix -->
		.btn:not([data-action]).btn-border {
			<?php car_repair_services_print_css( 'border-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}.social-links ul li a {
			<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}.gallery-item .hover .view:before {
			<?php car_repair_services_print_css( 'border-bottom-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}@media (max-width: 991px){
		header .heade-mobile .navbar-toggle:hover span {
			<?php car_repair_services_print_css( 'background-color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}}@media (max-width: 991px){
		.header-info-toggle [class*='icon-']:hover {
			<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}}#appointmentForm.modal .modal-dialog .modal-header .close {
			<?php car_repair_services_print_css( 'color', $car_repair_services_colors, 'theme_active_color' ); ?>
		}
		


	<?php } ?>
	.btn-invert:before, .btn-invert:after {
	background-color: #2c2c2c !important;
	}

	<?php
	if ( isset( $car_repair_services_opt['extra_css'] ) ) {
		echo sprintf( __( '%s', 'car-repair-services' ), $car_repair_services_opt['extra_css'] );
	}

	$car_repair_services_custom_css = ob_get_clean();

	return $car_repair_services_custom_css;
}
