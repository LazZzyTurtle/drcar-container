<?php
 add_shortcode( 'car_repair_services_icon_box', 'car_repair_services_icon_carousel_func' );
    function car_repair_services_icon_carousel_func ($atts, $content = null){

        extract(shortcode_atts(array(
            'extra_class' => '',
            ), $atts));

        $changed_atts = shortcode_atts(array(
            'slides_to_show' => '3',
            'slides_to_scroll' => 'true',
            'infinite' => 'true',
            'dots' => 'true',
            'arrows' => 'true',
        ), $atts);

        wp_localize_script( 'custom', 'ajax_icon_box', $changed_atts);

        ob_start();
        $output = '';
        $output .= '<div class="row text-icon-carousel '. $extra_class .'">';
            $output .=  do_shortcode($content);
        $output .= '</div>';
        echo  $output;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    add_shortcode( 'car_repair_services_icon_box_items', 'car_repair_services_icon_carousel_items_func' );
    function car_repair_services_icon_carousel_items_func ($atts, $content = null)
    {
     extract(shortcode_atts(array(
            'icon' => '',
            'heading' => '',
            'description' => '',
            'extra_class' => '',
            'icon_size'=> '',
            'button_action' => 'modal',
            'modal_id' => 'appointmentForm',
            'popup_id' => '54',
            'call_action'=>'',
            ), $atts));
     
            $href = vc_build_link($call_action);


        ob_start()
    ?>
    <div class="col-sm-4 col-md-4">
        <div class="text-icon<?php if(isset($icon_size)&&!empty($icon_size)) echo "-". esc_attr($icon_size); ?>
         <?php if($button_action=='3') echo 'form-popup-wrap';?> ">
                <?php  if($button_action=='2'): ?>
                    <a class="icon-wrapper " href="#" data-toggle="modal" data-target="#<?php echo esc_html($modal_id);?>">
                         <?php elseif($button_action=='3'): ?>
                              <a href="#" class="icon-wrapper form-popup-link">
                         <?php elseif($button_action=='4'): ?>
                         <a class="icon-wrapper" href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?> rel="<?php echo $href['rel'];?>"  >
                         <?php else: ?>
                        <div class="icon-wrapper">
                <?php endif;?>
                        <span>
                             <i class="icon <?php echo apply_filters('replace_icon_html',$atts) ; ?>"></i>
                             <span class="icon-hover"></span>
                        </span>
                        <?php  if($button_action=='2'): ?>
                        </a>
                        <?php elseif($button_action=='3'): ?>
                        </a>
                        <?php elseif($button_action=='4'): ?>
                        </a>
                        <?php else: ?>
                            </div>
                        <?php endif;?>
                    <?php  if($button_action=='3'): ?>
                    <div class="form-popup">
                     	<div class="quote-form">
                         <?php  echo do_shortcode('[contact-form-7 id="'.$popup_id.'"]');  ?>
                         </div>
                        
                    </div>
                    <?php endif;?>

                <h3 class="title" style="height: 30px;"><?php echo esc_html($heading); ?></h3>
                <?php if($description!=''){ ?>
                <p class="text"><?php echo esc_html($description); ?></p>
                <?php } ?>
         </div>
    </div>


    <?php
    $content = ob_get_clean();
    return $content;
    }