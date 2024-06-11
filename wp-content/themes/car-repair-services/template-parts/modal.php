<?php
$car_option = car_repair_services_options();
if ( isset( $car_option['is_modal_enable'] ) && $car_option['is_modal_enable'] == 1 ) { ?>
<div class="modal fade" id="appointmentForm">
	<div class="modal-dialog container">
		<div class="modal-content">
			<div class="modal-header"><a href="#" class="appointment" data-toggle="modal" data-target="#appointmentForm"><i class="icon-shape icon"></i>
			<?php
			if ( isset( $car_option['car_repair_services-header-top-right-line'] ) && $car_option['car_repair_services-header-top-right-line'] != '' ) {
				echo '<span>' . esc_html( $car_option['car_repair_services-header-top-right-line'] ) . '</span>';
			}
			?>
			</a>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="icon-close"></i></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<h2 class="modal-title-main"><?php echo wp_kses_post( $car_option['modal_title'] ); ?></h2>
					<?php echo wp_kses_post( $car_option['modal_content'] ); ?>
					<div class="divider divider-sm"></div>
					<?php echo do_shortcode( $car_option['modal_mc_form'] ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php
}
