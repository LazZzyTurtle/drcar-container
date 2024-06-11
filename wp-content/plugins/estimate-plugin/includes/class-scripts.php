<?php
function estimate_scripts() {
	wp_enqueue_script( 'estimate-script', plugins_url() . '/estimate-plugin/js/custom.js', array( 'jquery' ), time() );
}
add_action( 'wp_enqueue_scripts', 'estimate_scripts' );
