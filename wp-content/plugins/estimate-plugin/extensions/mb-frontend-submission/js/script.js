(function ( mbFrontendForm, window ) {
	// Set ajax URL for ajax actions.
	if ( ! window.ajaxurl ) {
		window.ajaxurl = mbFrontendForm.ajaxUrl;
	}
})( mbFrontendForm, window );
