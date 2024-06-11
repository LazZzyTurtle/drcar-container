<?php
add_shortcode('car_repair_estimator_form', 'car_repair_estimator_form_func');
function car_repair_estimator_form_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => 'Car Repair Estimator',
        'sub_title' => 'Get a location-based car repair estimate',
        'form_id' => '1860',
        'estimator_form_select' => '1',
        'extra_class' => '',
                    ), $atts));

    ob_start();
    ?>
    <?php if($estimator_form_select == '2'){
       echo do_shortcode('[estimate_search]');
    }else{ ?>
    <div class="estimator-panel">
		<div class="form">
			<div class="container">
				<div class="col-title"><i class="icon-calcilate"></i><?php echo $title;?><div class="panel-toggle js-estimator-panel-toggle"><span><?php esc_html_e('CLICK','car-repair-services-core')?><i class="icon-pointer"></i></span><span><i class="icon-close-cross"></i></span></div></div>
				<div class="col-form">
                    <div class="estimator-form-label"><?php echo $sub_title;?></div>
                   
                    <?php echo do_shortcode('[contact-form-7 id="' . $form_id . '"]'); ?>
                   
				</div>
			</div>
		</div>
	</div>
    <?php } ?>
    <?php
    $content = ob_get_clean();
    return $content;
}




