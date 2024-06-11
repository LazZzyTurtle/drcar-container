<?php

if ( class_exists( 'RWMB_Field' ) ) {
    class RWMB_Checkbox_Field extends RWMB_Field {
        public static function html( $meta, $field ) {
            $url = service_estimate_options('terms_link_url');
            return sprintf(
            	'<div class="form-group">
					<input type="%s" id="%s" required>
					<label for="%s">Please accept <a href="%s">terms and conditions</a></label>
				</div>',
                $field['type'],
                $field['id'],
                $field['id'],
                $url
            );
        }
    }
    new RWMB_Checkbox_Field();
}