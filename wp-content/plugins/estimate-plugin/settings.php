<?php
class Settings {
	public function __construct() {
		add_filter( 'mb_settings_pages', [ $this, 'register_settings_pages' ] );
		add_filter( 'rwmb_meta_boxes', 	 [ $this, 'register_settings_fields'] );
	}

	public function register_settings_pages( $settings_pages ) {
		$settings_pages['service_estmts'] = [
			'id'          => 'service_estimates',
			'option_name' => 'service_estimate_options',
			'menu_title'  => __( 'Settings', 'carleader-listings' ),
			'parent'      => 'edit.php?post_type=service-estimate',
			'tabs'        => [
				'general'    => __( 'General', 'carleader-listings' ),
				'contact'    => __( 'Conact Settings', 'carleader-listings' ),
			],
		];
		return $settings_pages;
	}

	public function register_settings_fields( $meta_boxes ) {
		$files = glob( __DIR__ . '/settings/*.php' );
		foreach ( $files as $file ) {
			$meta_boxes[] = include $file;
		}

		return $meta_boxes;
	}

	
}
new Settings();