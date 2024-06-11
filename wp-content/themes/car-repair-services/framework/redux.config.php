<?php
if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'car_repair_services_opt';

$theme      = wp_get_theme(); // For use with some settings. Not necessary.
$opt_prefix = 'car_repair_services';

$args = array(
	// TYPICAL -> Change these values as you need/desire
	'opt_name'                  => $opt_name,
	// This is where your data is stored in the database and also becomes your global variable name.
	'display_name'              => $theme->get( 'Name' ),
	// Name that appears at the top of your panel
	'display_version'           => $theme->get( 'Version' ),
	// Version that appears at the top of your panel
	'menu_type'                 => 'menu',
	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
	'allow_sub_menu'            => true,
	// Show the sections below the admin menu item or not
	'menu_title'                => esc_html__( 'Car Repair Services Options', 'car-repair-services' ),
	'page_title'                => esc_html__( 'Car Repair Services Options', 'car-repair-services' ),
	// You will need to generate a Google API key to use this feature.
	// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
	'google_api_key'            => '',
	// Set it you want google fonts to update weekly. A google_api_key value is required.
	'google_update_weekly'      => false,
	// Must be defined to add google fonts to the typography module
	'disable_google_fonts_link' => true,
	'async_typography'          => false,
	// Use a asynchronous font on the front end or font string
	'admin_bar'                 => true,
	// Show the panel pages on the admin bar
	'admin_bar_icon'            => 'dashicons-portfolio',
	// Choose an icon for the admin bar menu
	'admin_bar_priority'        => 50,
	// Choose an priority for the admin bar menu
	'global_variable'           => '',
	// Set a different name for your global variable other than the opt_name
	'dev_mode'                  => false,
	// Show the time the page took to load, etc
	'update_notice'             => true,
	// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
	'customizer'                => false,
	// OPTIONAL -> Give you extra features
	'page_priority'             => null,
	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_parent'               => 'themes.php',
	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
	'page_permissions'          => 'manage_options',
	// Permissions needed to access the options panel.
	'menu_icon'                 => '',
	// Specify a custom URL to an icon
	'last_tab'                  => '',
	// Force your panel to always open to a specific tab (by id)
	'page_icon'                 => 'icon-themes',
	// Icon displayed in the admin panel next to your menu_title
	'page_slug'                 => '',
	// Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
	'save_defaults'             => true,
	// On load save the defaults to DB before user clicks save or not
	'default_show'              => false,
	// If true, shows the default value next to each field that is not the default value.
	'default_mark'              => '',
	// What to print by the field's title if the value shown is default. Suggested: *
	'show_import_export'        => true,
	// Shows the Import/Export panel when not used as a field.
	// CAREFUL -> These options are for advanced use only
	'transient_time'            => 60 * MINUTE_IN_SECONDS,
	'output'                    => true,
	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
	'output_tag'                => true,
	// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	'database'                  => '',
	// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'use_cdn'                   => true,
	// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
	// HINTS
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),
);


Redux::setArgs( $opt_name, $args );

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Theme Setting', 'car-repair-services' ),
		'id'               => 'theme_settings',
		'desc'             => esc_html__( 'Theme Settings for your site', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-website-alt',
		'fields'           => array(
			array(
				'id'      => 'theme_setting',
				'type'    => 'radio',
				'title'   => esc_html__( 'Select Your Theme', 'car-repair-services' ),
				'default' => true,
				'options' => array(
					'1' => 'VC',
					'2' => 'Elementor',
				),
				'default' => '1',
			),

		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Header Settings', 'car-repair-services' ),
		'id'               => 'header_settings',
		'desc'             => esc_html__( 'All header settings', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-website',
		'fields'           => array(
			array(
				'id'       => $opt_prefix . '-header-type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Header Design', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Select Header', 'car-repair-services' ),
				'options'  => array(
					'1' => 'Default',
					'2' => 'Header 2',
					'3' => 'Layout 3 (this is for VC version only)',
				),
			),
			array(
				'id'       => 'bt_type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Breadcrumbs And Title Design', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Select Breadcrumbs And Title Design', 'car-repair-services' ),
				'options'  => array(
					'1' => 'Design 1',
					'2' => 'Design 2',
				),
				'default'  => '1',
			),
			array(
				'id'       => $opt_prefix . '-header-transparent',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Transparent Header', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable site Transparent Header', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-is_sticky_header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Header Sticky', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable Header Sticky', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-logo',
				'type'     => 'media',
				'url'      => true,
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Add/Upload logo using the WordPress native uploader', 'car-repair-services' ),
				'title'    => esc_html__( 'Site Logo', 'car-repair-services' ),
				'default'  => array(
					'url' => esc_url( CAR_REPAIR_SERVICES_THEME_URI . '/images/logo.png' ),
				),
			),
			array(
				'id'        => $opt_prefix . '-logo_size',
				'type'      => 'slider',
				'title'     => __('Logo Size', 'car-repair-services'),
				'subtitle'  => __('Set the logo size using the slider.', 'car-repair-services'),
				'desc'      => __('Min: 0, max: 500, step: 1', 'car-repair-services'),
				"default"   => 0,
				"min"       => 0,
				"step"      => 1,
				"max"       => 500,
				'display_value' => 'text'
			),
			array(
				'id'        => $opt_prefix . '-res_logo_size',
				'type'      => 'slider',
				'title'     => __('Responsive Logo Size', 'car-repair-services'),
				'subtitle'  => __('Set the logo size using the slider.', 'car-repair-services'),
				'desc'      => __('Min: 0, max: 500, step: 1', 'car-repair-services'),
				"default"   => 0,
				"min"       => 0,
				"step"      => 1,
				"max"       => 500,
				'display_value' => 'text'
			),
			array(
				'id'       => $opt_prefix . '-header_background_image',
				'type'     => 'media',
				'url'      => true,
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Add/Upload Image for header background', 'car-repair-services' ),
				'title'    => esc_html__( 'Home Header Top Background', 'car-repair-services' ),
				'default'  => array(
					'url' => esc_url( CAR_REPAIR_SERVICES_THEME_URI . '/images/grey-bg.png' ),
				),
			),
			array(
				'id'       => $opt_prefix . '-other_background_image',
				'type'     => 'media',
				'url'      => true,
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Add/Upload Image for Other(not home) page background', 'car-repair-services' ),
				'title'    => esc_html__( 'Page Header Background', 'car-repair-services' ),
				'default'  => array(
					'url' => esc_url( CAR_REPAIR_SERVICES_THEME_URI . '/images/header-photo-bg.jpg' ),
				),
			),
			array(
				'id'       => $opt_prefix . '-site-preloader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display preloader before page load', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable site preloader', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-site-preloader-timeout',
				'type'    => 'text',
				'title'   => 'Preloader Timeout',
				'default' => '500',
			),
			array(
				'id'       => $opt_prefix . '-site-preloader-image',
				'type'     => 'media',
				'url'      => true,
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Add/Upload preloader using the WordPress native uploader', 'car-repair-services' ),
				'title'    => esc_html__( 'Site Preloader', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-site-favicon',
				'type'     => 'media',
				'url'      => true,
				'title'    => esc_html__( 'Favicon URL', 'car-repair-services' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Set favicon for your theme', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Upload favicon for the theme', 'car-repair-services' ),
				'default'  => esc_url( CAR_REPAIR_SERVICES_THEME_URI . '/images/favicon.ico' ),
			),
			array(
				'id'       => 'Header',
				'type'     => 'section',
				'title'    => esc_html__( 'Header Content', 'car-repair-services' ),
				'subtitle' => esc_html__( 'With the "section" field you can create indented option sections.', 'car-repair-services' ),
				'indent'   => true,
			),
			array(
				'id'       => $opt_prefix . '-page-header-mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Header Top Mobile', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or disable header mobile content', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-page-header-mobile-location',
				'type'    => 'editor',
				'title'   => esc_html__( 'Page Header location', 'car-repair-services' ),
				'default' => '3261 Anmoore Road Brooklyn, NY 11230',
			),
			array(
				'id'      => $opt_prefix . '-page-header-mobile-phone',
				'type'    => 'editor',
				'title'   => esc_html__( 'Page Header Phone', 'car-repair-services' ),
				'default' => '800-123-4567, Fax: 718-724-3312',
			),
			array(
				'id'      => $opt_prefix . '-page-header-mobile-email',
				'type'    => 'editor',
				'title'   => esc_html__( 'Page Header Email', 'car-repair-services' ),
				'default' => 'officeone@youremail.com',
			),
			array(
				'id'      => $opt_prefix . '-page-header-mobile-hour',
				'type'    => 'editor',
				'title'   => esc_html__( 'Page Header Hour', 'car-repair-services' ),
				'default' => 'Mon-Fri: 9:00 am – 5:00',
			),
			array(
				'id'       => $opt_prefix . '-header-right-content',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display header Right text', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or disable header Right text', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-header-top-left-line2',
				'type'    => 'editor',
				'title'   => 'Header Right address 1st line',
				'default' => 'Monday-Saturday <span class="custom-color">7:00AM - 6:00PM</span>',
			),
			array(
				'id'       => $opt_prefix . '-header-top-right-line-switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Header Right Button line', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or disable header right button line', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-header-top-right-line',
				'type'    => 'text',
				'title'   => 'Header Right Button line',
				'default' => 'Appointment',
			),
			array(
				'id'       => $opt_prefix . '-appoinment-url',
				'type'     => 'text',
				'title'    => esc_html__( 'Appoinment- URL Validated', 'car-repair-services' ),
				'subtitle' => esc_html__( 'This must be a URL.', 'car-repair-services' ),
				'desc'     => esc_html__( 'This is URL will work only modal option is disable from modal setting.', 'car-repair-services' ),
				'validate' => 'url',
				'default'  => esc_url( 'http://mysite.com' ),
			),
			array(
				'id'      => $opt_prefix . '-header-bottom-line',
				'type'    => 'text',
				'title'   => 'Header right 1st line',
				'default' => 'SCHEDULE YOUR APPOINTMENT TODAY',
			),
			array(
				'id'      => $opt_prefix . '-header-cell-no',
				'type'    => 'editor',
				'title'   => 'Header Cell No',
				'default' => '1-<span class="code">800</span>-123-4567',
			),
			array(
				'id'       => $opt_prefix . '-header-top-right-cart-icon-switch',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Header Cart Icon', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or disable header cart icon', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-menu-search-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Display Menu Search Button', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or disable menu search button', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'   => 'section-info',
				'type' => 'info',
				'desc' => esc_html__( 'And now you can add more fields below and outside of the indent.', 'car-repair-services' ),
			),
		),
	)
);



Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Blog Settings', 'car-repair-services' ),
		'id'               => 'blog_settings',
		'desc'             => esc_html__( 'Blog Settings for index page', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-website-alt',
		'fields'           => array(
			array(
				'id'       => 'enable_blog_title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Blog Title', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable blog title', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'required'    => array( 'theme_setting', '=', '1' ),
				'id'       => $opt_prefix . '_blog_type_style',
				'type'     => 'radio',
				'title'    => esc_html__( 'Blog Design', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Select Blog Design', 'car-repair-services' ),
				'options'  => array(
					'1' => 'Design 1',
					'2' => 'Design 2',
					'3' => 'Design 3',
				),
				'default'  => '1',
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Typography', 'car-repair-services' ),
		'id'               => 'fonts_settings',
		'desc'             => esc_html__( 'Typography', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-font',
		'fields'           => array(
			array(
				'id'       => 'enable_typography',
				'type'     => 'switch',
				'title'    => esc_html__( 'Typography', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable Typography', 'car-repair-services' ),
				'default'  => true,
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-body_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'Body Typography', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select body font family, size, line height, color and weight.', 'car-repair-services' ),
				'text-align' => false,
				'subsets'    => false,
				'default'    => array(
					'font-family' => 'Muli',
					'google'      => true,
					'font-size'   => '16px',
					'line-height' => '22px',
				),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-menu_typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'Menu Typography', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select menu font family, size, line height, color and weight.', 'car-repair-services' ),
				'text-align' => false,
				'subsets'    => false,
				'default'    => array(
					'color' => '#2e2e2e',
				),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-1-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H1 Font', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'car-repair-services' ),
				'google'     => true,
				'text-align' => false,
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-2-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H2 Font', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'car-repair-services' ),
				'google'     => true,
				'text-align' => false,
				'default'    => array(
					'color'       => '#000',
					'font-size'   => '36px',
					'font-family' => 'Muli',
					'font-weight' => '500',
					'line-height' => '40px',
				),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-3-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H3 Font', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'car-repair-services' ),
				'google'     => true,
				'text-align' => false,
				'default'    => array(
					'color'       => '#000',
					'font-size'   => '30px',
					'font-family' => 'Muli',
					'font-weight' => '500',
					'line-height' => '40px',
				),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-4-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H4 Font', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'car-repair-services' ),
				'google'     => true,
				'text-align' => false,
				'default'    => array(
					'color'       => '#000',
					'font-size'   => '26px',
					'font-family' => 'Muli',
					'font-weight' => '500',
					'line-height' => '40px',
				),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-5-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H5 Font', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'car-repair-services' ),
				'google'     => true,
				'text-align' => false,
				'default'    => array(
					'color'       => '#000',
					'font-size'   => '22px',
					'font-family' => 'Muli',
					'font-weight' => '500',
					'line-height' => '40px',
				),
			),
			array(
				'required'   => array( 'enable_typography', '=', '1' ),
				'id'         => $opt_prefix . '-heading-6-typography',
				'type'       => 'typography',
				'title'      => esc_html__( 'H6 Font', 'car-repair-services' ),
				'subtitle'   => esc_html__( 'Select heading font family and weight.', 'car-repair-services' ),
				'google'     => true,
				'text-align' => false,
				'default'    => array(
					'color'       => '#000',
					'font-size'   => '18px',
					'font-family' => 'Muli',
					'font-weight' => '500',
					'line-height' => '40px',
				),
			),
			array(
				'required'    => array( 'enable_typography', '=', '1' ),
				'id'          => $opt_prefix . '-widget_title_typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Widget Title', 'car-repair-services' ),
				'subtitle'    => esc_html__( 'Widget title typography settings', 'car-repair-services' ),
				'text-align'  => false,
				'line-height' => false,
				'subsets'     => false,
				'default'     => array(
					'color'       => '#000',
					'font-weight' => '100',
					'font-family' => 'Muli',
					'google'      => true,
					'font-size'   => '24px',
				),
			),
			array(
				'required'    => array( 'enable_typography', '=', '1' ),
				'id'          => $opt_prefix . '-slider_h3_title_typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Slider H3 Title', 'car-repair-services' ),
				'subtitle'    => esc_html__( 'Slider H3 title typography settings', 'car-repair-services' ),
				'text-align'  => false,
				'line-height' => false,
				'color'       => false,
				'subsets'     => false,
				'default'     => array(
					'font-weight' => '400',
					'font-family' => 'Muli',
					'google'      => true,
					'font-size'   => '90px',
				),
			),
			array(
				'required'    => array( 'enable_typography', '=', '1' ),
				'id'          => $opt_prefix . '-slider_h4_title_typography',
				'type'        => 'typography',
				'title'       => esc_html__( 'Slider H4 Title', 'car-repair-services' ),
				'subtitle'    => esc_html__( 'Slider H4 title typography settings', 'car-repair-services' ),
				'text-align'  => false,
				'line-height' => false,
				'color'       => false,
				'subsets'     => false,
				'default'     => array(
					'font-weight' => '100',
					'font-family' => 'Muli',
					'google'      => true,
					'font-size'   => '44px',
				),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Footer Settings', 'car-repair-services' ),
		'id'               => 'footer_settings',
		'desc'             => esc_html__( 'These are really basic fields!', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-share',
		'fields'           => array(
			array(
				'id'       => $opt_prefix . '-footer-type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Footer Design', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Select Footer', 'car-repair-services' ),
				'options'  => array(
					'1' => 'Default',
					'2' => 'Footer 2',
				),
				'default'  => '1',
			),
			array(
				'id'       => $opt_prefix . '-widgetized_footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Widgetized Footer', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable to Widgetized Footer To add Custom Footer content', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-wid_footer_style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Widgetized Footer Styles', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'car-repair-services' ),
				'options'  => array(
					'1' => array(
						'alt' => '1 Column',
						'img' => esc_url( CAR_REPAIR_SERVICES_IMG_URL . 'admin/customizer/footer/footer-style-1.png' ),
					),
					'2' => array(
						'alt' => '2 Column Left',
						'img' => esc_url( CAR_REPAIR_SERVICES_IMG_URL . 'admin/customizer/footer/footer-style-2.png' ),
					),
					'3' => array(
						'alt' => '2 Column Right',
						'img' => esc_url( CAR_REPAIR_SERVICES_IMG_URL . 'admin/customizer/footer/footer-style-3.png' ),
					),
					'4' => array(
						'alt' => '3 Column Middle',
						'img' => esc_url( CAR_REPAIR_SERVICES_IMG_URL . 'admin/customizer/footer/footer-style-4.png' ),
					),

				),
				'default'  => '1',
				'required' => array( 'car_repair_services-widgetized_footer', '=', 1 ),
			),

			array(
				'id'       => $opt_prefix . '-back_to_top',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Back To Top', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable to Show Back To Top In Footer', 'car-repair-services' ),
				'default'  => true,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-back_to_top_icon',
				'type'    => 'text',
				'title'   => esc_html__( 'Back to Top Icon', 'car-repair-services' ),
				'default' => 'icon-transport',
			),
			array(
				'id'       => $opt_prefix . '-footer_h1st',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Upper Title', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Upper Description title', 'car-repair-services' ),
				'default'  => esc_html__( 'Contact Info', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-footer_h2nd',
				'type'     => 'text',
				'title'    => esc_html__( 'Footer Lower Title', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Lower description title', 'car-repair-services' ),
				'default'  => esc_html__( 'Opening Hours', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-footer_copyright',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Copyright', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Copyright Text', 'car-repair-services' ),
				'default'  => esc_html__( '&copy; 2017 Car Repair Services, All Rights Reserved', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-footer_email',
				'type'    => 'text',
				'title'   => esc_html__( 'Page Footer Email', 'car-repair-services' ),
				'default' => 'officeone@youremail.com',
			),
			array(
				'id'       => $opt_prefix . '-footer_map',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Contact Map In Footer', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable Show Contact Map In Footer', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-footer_map_embed',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Embed Map', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable Embed Map', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-footer_map_embed_code',
				'required' => array( $opt_prefix . '-footer_map_embed', '=', '1' ),
				'type'     => 'textarea',
				'title'    => esc_html__( 'Map Embeb Code', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Please visit https://www.google.com/maps for embed code', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-gmap_api_key',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Map Api Key', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Set Google Map Api Key', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-gmap_latitude',
				'type'     => 'text',
				'title'    => esc_html__( 'latitude', 'car-repair-services' ),
				'subtitle' => esc_html__( 'The latitude  to center the map ', 'car-repair-services' ),
				'default'  => '37.36274700000004',
			),
			array(
				'id'       => $opt_prefix . '-gmap_longitude',
				'type'     => 'text',
				'title'    => esc_html__( 'longitude', 'car-repair-services' ),
				'subtitle' => esc_html__( 'The longitude  to center the map ', 'car-repair-services' ),
				'default'  => '-122.03525300000001',
			),
			array(
				'id'       => $opt_prefix . '-gmap_zoom',
				'type'     => 'text',
				'title'    => esc_html__( 'Zoom', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Zoom of the map ', 'car-repair-services' ),
				'default'  => 14,
			),
			array(
				'id'       => $opt_prefix . '-gmap_marker',
				'type'     => 'media',
				'url'      => true,
				'compiler' => 'true',
				'desc'     => esc_html__( 'Google Map Marker.', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Add/Upload mobile logo using the WordPress native uploader', 'car-repair-services' ),
				'title'    => esc_html__( 'Map Marker', 'car-repair-services' ),
				'default'  => array(
					'url' => esc_url( CAR_REPAIR_SERVICES_IMG_URL . 'map-marker.png' ),
				),
			),
			array(
				'id'       => $opt_prefix . '-enable_map_style',
				'type'     => 'switch',
				'title'    => esc_html__( 'Customize Map Style', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable if you like to customize the style of Google Map', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-map_style',
				'required' => array( $opt_prefix . '-enable_map_style', '=', '1' ),
				'type'     => 'textarea',
				'title'    => esc_html__( 'Map Style', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Please visit snazzymaps.com for more styles', 'car-repair-services' ),
				'default'  => '[{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]',
			),
			array(
				'id'       => $opt_prefix . '-footer_map_image',
				'type'     => 'media',
				'url'      => true,
				'compiler' => 'true',
				'desc'     => esc_html__( 'Please Disable Footer Map Before Set Map Image', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Add/Upload mobile logo using the WordPress native uploader', 'car-repair-services' ),
				'title'    => esc_html__( 'Footer Map Image', 'car-repair-services' ),
			),
			array(
				'id'       => $opt_prefix . '-footer-contact-info',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Contact Information In Footer', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable Contact Information In Footer', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'      => $opt_prefix . '-footer_contact_phone',
				'type'    => 'text',
				'title'   => esc_html__( 'Contact Phone No', 'car-repair-services' ),
				'default' => '1-800-1234567',
			),
			array(
				'id'      => $opt_prefix . '-footer_contact_location',
				'type'    => 'text',
				'title'   => esc_html__( 'Contact Phone Location', 'car-repair-services' ),
				'default' => '2605 Caton Hill Road, Woodbridge,
						',
			),
			array(
				'id'      => $opt_prefix . '-footer_contact_clock',
				'type'    => 'text',
				'title'   => esc_html__( 'Contact Phone Clock', 'car-repair-services' ),
				'default' => 'Monday-Saturday <span class="color">7:00AM - 6:00PM</span>
						<br> Sunday Closed',
			),
			array(
				'id'      => $opt_prefix . '-footer-facebook',
				'type'    => 'text',
				'title'   => esc_html__( 'Facebook URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-twitter',
				'type'    => 'text',
				'title'   => esc_html__( 'Twitter URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-youtube',
				'type'    => 'text',
				'title'   => esc_html__( 'Youtube URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-google-plus',
				'type'    => 'text',
				'title'   => esc_html__( 'Google Plus URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-instagram',
				'type'    => 'text',
				'title'   => esc_html__( 'Instagram URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-tumblr',
				'type'    => 'text',
				'title'   => esc_html__( 'Tumblr URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-behance',
				'type'    => 'text',
				'title'   => esc_html__( 'Behance URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
			array(
				'id'      => $opt_prefix . '-footer-linkedin',
				'type'    => 'text',
				'title'   => esc_html__( 'Linkedin URL', 'car-repair-services' ),
				'default' => esc_url( '#' ),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Modal Settings', 'car-repair-services' ),
		'id'               => 'modal_settings',
		'desc'             => esc_html__( 'modal for email subscription', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-website-alt',
		'fields'           => array(
			array(
				'id'       => 'is_modal_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'modal', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable modal on site', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => 'modal_title',
				'type'     => 'text',
				'title'    => esc_html__( 'modal Title', 'car-repair-services' ),
				'subtitle' => esc_html__( 'modal title which one will be shown at top of modal', 'car-repair-services' ),
				'default'  => '<h2>Schedule <span class="color">Auto Service</span></h2>',
			),
			array(
				'id'       => 'modal_content',
				'type'     => 'editor',
				'title'    => esc_html__( 'modal content', 'car-repair-services' ),
				'subtitle' => esc_html__( 'It will be shown at just below title', 'car-repair-services' ),
				'default'  => 'mailing list to receive updates on new arrivals, offers and other discount information.',
			),
			array(
				'id'       => 'modal_nomore_text',
				'type'     => 'text',
				'title'    => esc_html__( 'Don\'t show it again', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Don\'t show it again checkbox title', 'car-repair-services' ),
				'default'  => 'Don\'t show it again',
			),
			array(
				'id'       => 'modal_mc_form',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Appointment Form', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Appointment Form Murkup', 'car-repair-services' ),
			),
			array(
				'id'       => 'modal_date_format',
				'type'     => 'text',
				'title'    => esc_html__( 'Date Format', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Form Datepicker Format', 'car-repair-services' ),
				'default'  => 'DD/MM/YYYY',
			),
			array(
				'id'       => 'modal_bg_img',
				'type'     => 'background',
				'title'    => esc_html__( 'modal Background Image', 'car-repair-services' ),
				'subtitle' => esc_html__( 'modal backgrund settings', 'car-repair-services' ),
				'default'  => array(
					'background-color' => '#ffffff',
				),
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Modal SM Settings', 'car-repair-services' ),
		'id'               => 'modal2_settings',
		'desc'             => esc_html__( 'modal 2 for email subscription', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-website-alt',
		'fields'           => array(
			array(
				'id'       => 'is_modal_enable_sm',
				'type'     => 'switch',
				'title'    => esc_html__( 'modal sm', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable modal on site', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
			array(
				'id'       => 'modal_title_sm',
				'type'     => 'text',
				'title'    => esc_html__( 'modal sm Title', 'car-repair-services' ),
				'subtitle' => esc_html__( 'modal sm title which one will be shown at top of modal', 'car-repair-services' ),
				'default'  => '<h2>Schedule <span class="color">Auto Service</span></h2>',
			),
			array(
				'id'       => 'modal_content_sm',
				'type'     => 'editor',
				'title'    => esc_html__( 'modal sm content', 'car-repair-services' ),
				'subtitle' => esc_html__( 'It will be shown at just below title', 'car-repair-services' ),
				'default'  => 'mailing list to receive updates on new arrivals, offers and other discount information.',
			),
			array(
				'id'       => 'modal_mc_form_sm',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Appointment Form', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Appointment Form Murkup', 'car-repair-services' ),
			),
		),
	)
);


Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Extra Settings', 'car-repair-services' ),
		'id'               => 'extra_settings',
		'desc'             => esc_html__( 'These are really basic fields!', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-share',
		'fields'           => array(
			array(
				'id'       => $opt_prefix . '-slug_postype_car_repair_services',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom Post Type Car Repair Services', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Car Repair Service Slug Name', 'car-repair-services' ),
				'desc'     => 'You might have to flush your permalinks after you performed this action Settings=> Permalink Settings',
			),
			array(
				'id'       => $opt_prefix . '-slug_postype_services_archive',
				'type'     => 'text',
				'title'    => esc_html__( 'Car Repair Services Archive Page Name', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Change Car Repair Service Page Name', 'car-repair-services' ),
				'default'  => '',
			),
			array(
				'id'       => $opt_prefix . '-single_services_custom_title',
				'type'     => 'text',
				'title'    => esc_html__( 'Car Repair Single Service Title', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Change Car Repair Single Service Title', 'car-repair-services' ),
				'default'  => '',
			),
			array(
				'id'    => $opt_prefix . '-js_for_calender_lang',
				'type'  => 'text',
				'title' => esc_html__( 'Add Custom Moment language js file.', 'car-repair-services' ),
				'desc'  => 'Add Custom Moment language js file, you can find in <a target="_blank" href="https://github.com/moment/moment/tree/develop/locale">https://github.com/moment/moment/tree/develop/locale</a>',
			),
			array(
				'id'       => 'extra_css',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Extra CSS', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Extra CSS just after theme styles', 'car-repair-services' ),
				'mode'     => 'css',
			),
		),
	)
);

Redux::setSection(
	$opt_name,
	array(
		'title'            => esc_html__( 'Product Reviews Settings', 'car-repair-services' ),
		'id'               => 'product_reviews_settings',
		'desc'             => esc_html__( 'These are really basic fields!', 'car-repair-services' ),
		'customizer_width' => '400px',
		'icon'             => 'el el-share',
		'fields'           => array(
			array(
				'id'       => 'product_reviews_enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Product Reviews', 'car-repair-services' ),
				'subtitle' => esc_html__( 'Enable or Disable Product Reviews', 'car-repair-services' ),
				'default'  => false,
				'on'       => esc_html__( 'Enable', 'car-repair-services' ),
				'off'      => esc_html__( 'Disable', 'car-repair-services' ),
			),
		),
	)
);
