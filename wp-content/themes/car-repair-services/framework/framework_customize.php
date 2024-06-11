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
    $wp_customize->add_section( 'car_repair_services_common_color_section' , array(
        'title'      => esc_html__( 'Common Colors', 'car-repair-services' ),
        'priority'   => 1,
        'panel'      => 'all_styling_panel'
    ) );

    //preloader color
    $wp_customize->add_setting ( 'car_repair_services_colors[preloader_color]', array (
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_services_colors[preloader_color]', array(
        'label'        => esc_html__( 'Preloader Color', 'car-repair-services' ),
        'section'    => 'car_repair_services_common_color_section',
        'priority'   => 18,
    ) ) );
    
    //Link color
    $wp_customize->add_setting ( 'car_repair_services_services_colors[link_color]', array (
        'default' => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'type' => 'theme_mod', 
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'car_repair_services_services_colors[link_color]', array(
        'label'        => esc_html__( 'Link Color', 'car-repair-services' ),
        'section'    => 'car_repair_services_common_color_section',
        'priority'   => 18,
    ) ) );


}
add_action( 'customize_register', 'car_repair_theme_customizer' );