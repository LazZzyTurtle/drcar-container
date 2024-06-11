<?php
add_shortcode('car_repair_action_button', 'car_repair_action_button_func');

function car_repair_action_button_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => '',
        'button_action' => 'modal',
        'modal_id' => 'appointmentForm',
        'popup_id' => '54',
        'extra_class' => '',
        'call_action'=> '',
		'popup_position'=>'bottom',
                    ), $atts));
	$popup_position_class='';
    switch ($popup_position) {
    case "top":
        $popup_position_class = "form-popup-top";
        break;
    case "bottom":
            $popup_position_class = "";
        break;

    default:
         $popup_position_class = "";
     }
    ob_start();

    if ($button_action == '2'):
        ?>
        <a class="btn btn-invert" href="#" data-toggle="modal" data-target="#<?php echo esc_html($modal_id); ?>"><span><?php echo esc_html($title); ?></span></a>
    <?php elseif($button_action == '3'): ?>



        <div class="form-popup-wrap">
            <a class="btn <?php echo esc_attr($extra_class); ?> form-popup-link" href="#"><span><?php echo esc_html($title); ?></span></a>
            <div class="form-popup <?php echo esc_attr($popup_position_class)?>">
               <div class="quote-form">
                    <?php echo do_shortcode('[contact-form-7 id="' . $popup_id . '"]'); ?>
               </div>
            </div>
        </div>
    <?php else: ?>
       <?php  $href = vc_build_link( $call_action ) ;  ?>
                         <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?>  class="btn <?php echo esc_attr($extra_class); ?>" rel="<?php echo $href['rel'];?>"  >
            <?php echo esc_html($title); ?>
        </a>
    <?php endif; ?>
    <?php
    $content = ob_get_clean();
    return $content;
}
