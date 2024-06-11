<?php
class car_repair_services_color_scheme {
	public $is_custom = false;
	public $options = array();

	public function __construct() {
		self::customizer_options();
		add_action( 'customize_register', array( $this, 'customizer_register' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_js' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'color_scheme_template' ) );
	}

	public function customizer_options() {
        $path_color_schema = dirname(__FILE__) . '/color_schema/';
        $color_schemes = array();
        foreach (glob($path_color_schema . 'default.php') as $filename) {
            if (file_exists($filename)) {
                include ($filename);
            }
        }
        if(isset($color_schemes['default']['colors'])){
        	$tmp_color_schemes = $color_schemes['default']['colors'];
        	$options = array();
        	foreach ($tmp_color_schemes as $key => $value) {
        		$options[] = $key;
        	}
        	$this->options = $options;
        }
	}

    public function get_color_schemes() {
        $path_color_schema = dirname(__FILE__) . '/color_schema/';
        foreach (glob($path_color_schema . '*.php') as $filename) {
            if (file_exists($filename)) {
                include ($filename);
            }
        }
        return $color_schemes;
    }

	public function customizer_register( WP_Customize_Manager $wp_customize ) {
		

		$wp_customize->add_setting( 'color_scheme', array(
		    'default' => 'default',
		    //'transport' => 'postMessage',
		) );
		
	
        $car_repair_services_color_scheme = new car_repair_services_color_scheme();
        $color_schemes = $car_repair_services_color_scheme->get_color_schemes();
        $choices = array();
        foreach ($color_schemes as $color_scheme => $value) {
            $choices[$color_scheme] = $value['label'];
        }

		$wp_customize->add_control( 'color_scheme', array(
		    'label'   => __( 'Color scheme', 'entrepreneur' ),
		    'section' => 'car_common_color_section',
		    'type'    => 'select',
		    'choices' => $choices,
		) );


	}

	public function get_color_scheme() {
	    $color_schemes = $this->get_color_schemes();
	   // $color_scheme  = get_theme_mod( 'color_scheme' ); //car_repair_services_colors
	    $color_scheme  = get_theme_mod( 'car_repair_services_colors' );
	    $opt_color_scheme  = get_theme_mod( 'car_repair_services_colors' );
		$temp_color_scheme ='';
		if(isset($color_scheme ['color_scheme'])){
	    	$temp_color_scheme  = $color_scheme ['color_scheme'];
		}
	   
	    $color_scheme  = isset( $color_schemes[$temp_color_scheme] ) ? $temp_color_scheme : 'default';


	    if ( 'default' != $color_scheme ) {
	      $this->is_custom = true;
	    }
		if(isset($color_scheme ['color_scheme'])){
	    $colors = array_map( 'strtolower', $color_schemes[$color_scheme]['color_scheme'] );
	    return $colors;
		}
	}

	public function output_css() {
	    $colors = $this->get_color_scheme();
	
      
	}

	public function get_css( $colors ) {
	    $css = '
		';
    	return vsprintf( $css, $colors );
	}

	public function color_scheme_template() {
	    $colors = array( );
    ?>
	    <script type="text/html" id="tmpl-car-repair-services-color-scheme">
	      <?php echo $this->get_css( $colors ); ?>
	    </script>
	<?php
	}

	public function customize_js() {
	  wp_enqueue_script( 'car-repair-services-color-scheme', plugins_url() . '/car-repair-services-core/js/color-scheme.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '', true );
	  wp_localize_script( 'car-repair-services-color-scheme', 'CarRepairServicesColorScheme', $this->get_color_schemes() );
	  wp_localize_script( 'car-repair-services-color-scheme', 'colorSettings', $this->options );
	}


}

new car_repair_services_color_scheme;