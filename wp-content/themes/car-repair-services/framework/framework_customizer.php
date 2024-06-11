<?php

/*Customizer Code HERE*/

function car_repair_theme_customizer( $wp_customize ) {

    // Customizer Title Control
    class WP_Customize_Title_Control extends WP_Customize_Control {
        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
        }
        public function render_content() {
            ?><h3><?php echo esc_html( $this->label ); ?></h3><?php
        }
    }




    $wp_customize->add_panel( 'all_styling_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'title'          => esc_html__('Styling Settings', 'car-repair-services'),
        'description'    => esc_html__('All Styling Settings', 'car-repair-services'),
    ) );
    
    //common color

     // All Color Settings
    $wp_customize->add_section( 'car_common_color_section' , array(
        'title'      => esc_html__( 'Common Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    //preloader color
    $wp_customize->add_setting ( 'car_repair_services_colors[preloader_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[preloader_color]', array(
        'label'        => esc_html__( 'Preloader Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[body_color]', array (
        'default' => '#292929',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[body_color]', array(
        'label'        => esc_html__( 'Body text Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[theme_active_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[theme_active_color]', array(
        'label'        => esc_html__( 'Theme Active Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[theme_comon_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[theme_comon_bg_color]', array(
        'label'        => esc_html__( 'Theme Common Bg Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[theme_comon_text_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[theme_comon_text_color]', array(
        'label'        => esc_html__( 'Theme Common Text Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[theme_apoint_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[theme_apoint_bg_color]', array(
        'label'        => esc_html__( 'Theme Appointment Bg Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[theme_apoint_angle_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[theme_apoint_angle_color]', array(
        'label'        => esc_html__( 'Theme Appointment Angle Bg Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[comon_border_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[comon_border_color]', array(
        'label'        => esc_html__( 'Common Border Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );
    
     $wp_customize->add_setting ( 'car_repair_services_colors[services_icon_shadow]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[services_icon_shadow]', array(
        'label'        => esc_html__( 'Services Icon Shadow', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    //Link color
    $wp_customize->add_setting ( 'car_repair_services_colors[link_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[link_color]', array(
        'label'        => esc_html__( 'Link Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[link_hover_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[link_color_hover]', array(
        'label'        => esc_html__( 'link hover color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    //Link color
    $wp_customize->add_setting ( 'car_repair_services_colors[link_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[link_color]', array(
        'label'        => esc_html__( 'Link Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );
    
    //Link color hover

    $wp_customize->add_setting ( 'car_repair_services_colors[link_hover_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[link_hover_color]', array(
        'label'        => esc_html__( 'Link Hover Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );
    
    $wp_customize->add_setting ( 'car_repair_services_colors[heading_active_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[heading_active_color]', array(
        'label'        => esc_html__( 'Heading Active Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[heading_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[heading_color]', array(
        'label'        => esc_html__( 'Heading Black Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[heading2_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[heading2_color]', array(
        'label'        => esc_html__( 'Heading White Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[text_white_color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[text_white_color]', array(
        'label'        => esc_html__( 'Text White color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[white_icon-color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[white_icon-color]', array(
        'label'        => esc_html__( 'Icon Color White', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[icon-color]', array (
        'default' => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[icon-color]', array(
        'label'        => esc_html__( 'Icon Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    //Menu color
    
    $wp_customize->add_setting ( 'car_repair_services_colors[menu_link_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[menu_link_color]', array(
        'label'        => esc_html__( 'Menu Link Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[menu_link_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[menu_link_bg_color]', array(
        'label'        => esc_html__( 'Menu Border Color', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[search_button_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[search_button_bg_color]', array(
        'label'        => esc_html__( 'Search Button Hover', 'car-repair-services' ),
        'section'    => 'car_common_color_section',
        'priority'   => 18,
    ) ) );
     





 //Slider color
    $wp_customize->add_section( 'car_slider_color_section' , array(
        'title'      => esc_html__( 'Slider Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[slider_text_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[slider_text_color]', array(
        'label'        => esc_html__( 'Slider First Text Color', 'car-repair-services' ),
        'section'    => 'car_slider_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[slider_text2_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[slider_text2_color]', array(
        'label'        => esc_html__( 'Slider Big Text Color', 'car-repair-services' ),
        'section'    => 'car_slider_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[slider_navi_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[slider_navi_color]', array(
        'label'        => esc_html__( 'Slider Navigation Color', 'car-repair-services' ),
        'section'    => 'car_slider_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[slider_navi_hover_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[slider_navi_hover_color]', array(
        'label'        => esc_html__( 'Slider Navigation Hover Color', 'car-repair-services' ),
        'section'    => 'car_slider_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[slider_dot_hover_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[slider_dot_hover_color]', array(
        'label'        => esc_html__( 'Slider Bullet color', 'car-repair-services' ),
        'section'    => 'car_slider_color_section',
        'priority'   => 18,
    ) ) );


     //Button color
    $wp_customize->add_section( 'car_button_section' , array(
        'title'      => esc_html__( 'Button Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button_bg_color]', array(
        'label'        => esc_html__( 'Button Bg One Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button_text_color]', array (
        'default' => '#2c2c2c',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button_text_color]', array(
        'label'        => esc_html__( 'Button Text Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button_bg_hover_color]', array (
        'default' => '#2c2c2c',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button_bg_hover_color]', array(
        'label'        => esc_html__( 'Button Bg Hover Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button_hover_text_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button_hover_text_color]', array(
        'label'        => esc_html__( 'Button Hover Text Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button2_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button2_bg_color]', array(
        'label'        => esc_html__( 'Button Two Bg Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button2_text_color]', array (
        'default' => '#2c2c2c',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button2_text_color]', array(
        'label'        => esc_html__( 'Button Two Text Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );




    $wp_customize->add_setting ( 'car_repair_services_colors[button_border_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button_border_color]', array(
        'label'        => esc_html__( 'Button Border Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button_hv_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button_hv_color]', array(
        'label'        => esc_html__( 'Button Hover Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[button2_hover_text_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[button2_hover_text_color]', array(
        'label'        => esc_html__( 'Button Two Hover Text Color', 'car-repair-services' ),
        'section'    => 'car_button_section',
        'priority'   => 18,
    ) ) );


    //Pricing color
    $wp_customize->add_section( 'car_pricing_section' , array(
        'title'      => esc_html__( 'Pricing Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[pricing_bg_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[pricing_bg_color]', array(
        'label'        => esc_html__( 'Pricing Bg Color', 'car-repair-services' ),
        'section'    => 'car_pricing_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[pricing_border_color]', array (
        'default' => '#fff',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[pricing_border_color]', array(
        'label'        => esc_html__( 'Pricing Border Color', 'car-repair-services' ),
        'section'    => 'car_pricing_section',
        'priority'   => 18,
    ) ) );


     // Coupons
    $wp_customize->add_section( 'coupons_color_section' , array(
        'title'      => esc_html__( 'Coupons Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );


    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_title_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_title_color]', array(
        'label'        => esc_html__( 'Coupons Title', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_title_color2]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_title_color2]', array(
        'label'        => esc_html__( 'Coupons Title2', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_subtitle_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_subtitle_color]', array(
        'label'        => esc_html__( 'Coupons Subtitle', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_subtitle_color2]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_subtitle_color2]', array(
        'label'        => esc_html__( 'Coupons Subtitle 2', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[expire_date]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[expire_date]', array(
        'label'        => esc_html__( 'Expire Date', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[expire_date2]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[expire_date2]', array(
        'label'        => esc_html__( 'Expire Date 2', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[offer_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[offer_color]', array(
        'label'        => esc_html__( 'Offer Color', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[offer_color2]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[offer_color2]', array(
        'label'        => esc_html__( 'Offer Color 2', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_button_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_button_color]', array(
        'label'        => esc_html__( 'Coupons Button Color', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_button_text_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_button_text_color]', array(
        'label'        => esc_html__( 'Coupons Button Text Color', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_border_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_border_color]', array(
        'label'        => esc_html__( 'Button Border Color', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );
    
    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_border_color_2]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_border_color_2]', array(
        'label'        => esc_html__( 'Button Border Color 2', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[coupon_button_hover_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[coupon_button_hover_color]', array(
        'label'        => esc_html__( 'Coupons Button Hover Color', 'car-repair-services' ),
        'section'    => 'coupons_color_section',
        'priority'   => 18,
    ) ) );


     $wp_customize->add_setting ( 'car_repair_services_colors[cart_icon_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[cart_icon_color]', array(
        'label'        => esc_html__( 'Cart Icon Hover Color', 'car-repair-services' ),
        'section'    => 'woocommerce_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_section( 'auto_search_color_section' , array(
        'title'      => esc_html__( 'Auto Search Plugin Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[auto_search_icon_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[auto_search_icon_color]', array(
        'label'        => esc_html__( 'Auto Search Icon Color', 'car-repair-services' ),
        'section'    => 'auto_search_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[auto_search_button_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[auto_search_button_color]', array(
        'label'        => esc_html__( 'Auto Search Button Color', 'car-repair-services' ),
        'section'    => 'auto_search_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[auto_search_button_text_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[auto_search_button_text_color]', array(
        'label'        => esc_html__( 'Auto Search Button Text Color', 'car-repair-services' ),
        'section'    => 'auto_search_color_section',
        'priority'   => 18,
    ) ) );


    $wp_customize->add_setting ( 'car_repair_services_colors[auto_search_button_hover_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[auto_search_button_hover_color]', array(
        'label'        => esc_html__( 'Auto Search Button Color', 'car-repair-services' ),
        'section'    => 'auto_search_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[auto_search_button_text_hover_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[auto_search_button_text_hover_color]', array(
        'label'        => esc_html__( 'Auto Search Button Text Color', 'car-repair-services' ),
        'section'    => 'auto_search_color_section',
        'priority'   => 18,
    ) ) );





    // Shop
    $wp_customize->add_section( 'shop_color_section' , array(
        'title'      => esc_html__( 'Shop Color', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_button_bg_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_button_bg_color]', array(
        'label'        => esc_html__( 'Shop Button Bg Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );
    
    $wp_customize->add_setting ( 'car_repair_services_colors[shop_filter_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_filter_color]', array(
        'label'        => esc_html__( 'Shop filter Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_sale_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_sale_color]', array(
        'label'        => esc_html__( 'Shop Sale level Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_sale_text_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_sale_text_color]', array(
        'label'        => esc_html__( 'Shop Sale level Text Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_rateing_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_rateing_color]', array(
        'label'        => esc_html__( 'Shop Rating Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[cart_icon_color]', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[cart_icon_color]', array(
        'label'        => esc_html__( 'Cart Icon Hover Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_pagination_bg_color', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_pagination_bg_color]', array(
        'label'        => esc_html__( 'Shop Pagination Bg Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_pagination_text_color', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_pagination_text_color]', array(
        'label'        => esc_html__( 'Shop Pagination Text Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

    $wp_customize->add_setting ( 'car_repair_services_colors[shop_pagination_border_color', array (
        'default' => '#fede00',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_colors[shop_pagination_border_color]', array(
        'label'        => esc_html__( 'Shop Pagination Border Color', 'car-repair-services' ),
        'section'    => 'shop_color_section',
        'priority'   => 18,
    ) ) );

}
add_action( 'customize_register', 'car_repair_theme_customizer' );