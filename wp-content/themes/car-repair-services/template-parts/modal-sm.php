<?php
$car_option = car_repair_services_options();
if ( isset( $car_option['is_modal_enable_sm'] ) && $car_option['is_modal_enable_sm'] == 1 ) {
	?>
	<div class="modal fade modalform-sm in" id="appointmentForm">
		<div class="modal-dialog container">
			<div class="modal-content">
				<div class="modal-header"><a href="<?php echo esc_url( '#' ); ?>" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
					<?php
					if ( isset( $car_option['car_repair_services-header-top-right-line'] ) && $car_option['car_repair_services-header-top-right-line'] != '' ) {
						echo '<span>' . esc_html( $car_option['car_repair_services-header-top-right-line'] ) . '</span>';
					}
					?>
					</a>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close-cross"></i></button>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<?php echo wp_kses_post( $car_option['modal_title_sm'] ); ?>
						<?php echo wp_kses_post( $car_option['modal_content_sm'] ); ?>
						<?php echo do_shortcode( $car_option['modal_mc_form_sm'] ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}






