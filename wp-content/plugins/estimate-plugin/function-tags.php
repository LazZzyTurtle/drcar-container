<?php
function estimate_template_path() {
	return apply_filters( 'estimate_template_path', 'estimate/' );
}

function estimate_get_part( $part ) {
	if ( ! $part ) {
		return;
	}
	//echo $part ;
	// Look within passed path within the theme - this is priority.
	$template = locate_template( [
		trailingslashit( estimate_template_path() ) . $part,
		$part,
	] );
	
	// Get template from plugin directory
	if ( ! $template ) {
		$dirs = apply_filters( 'estimate_template_directory', [
			ESTIMATE_PLUGIN_DIR . 'templates/',
		] );
		
		foreach ( $dirs as $dir ) {
			if ( file_exists( trailingslashit( $dir ) . $part ) ) {
				$template = $dir . $part;
			}
		}
	}

	if ( $template ) {
		include( $template );
	}
}

function estimate_LoopPage() {
	estimate_get_part( 'estimate-page.php' );
}

function estimate_serviceLoop() {
	estimate_get_part( 'estimate-table.php' );
}


