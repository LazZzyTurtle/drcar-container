<?php
 class Car_Repair_ServicesSlickSlider  extends WPBakeryShortCode{

    public function __construct()
    {
        add_shortcode( 'car_repair_slick_slider', array($this, 'car_repair_slick_slider_func'));
        add_shortcode( 'car_repair_slick_slider_item', array($this, 'car_repair_slick_slider_item_func'));
    }



   public function car_repair_slick_slider_func ($atts, $content = null){
        extract(shortcode_atts(array(
            'navigation_type' => 0,
            'extra_class' => '',
        ), $atts));


        $changed_atts = shortcode_atts(array(
            'autoplay' => 'true',
            'autoplay_speed' => '3000',
            'arrows' => 'true',
            'dots' => 'false',
            'fade' => 'true',
            'speed' => '500',
            'pause_on_hover' => 'true',
            'pause_on_dots_hover' => 'true'
        ), $atts);



        wp_localize_script( 'custom', 'ajax_slickslider', $changed_atts);


            ob_start();
            ?>

        <!-- Slider -->
        <div id="mainSliderWrapper">
            <div id="mainSlider" class="slider-wrapper theme-default <?php if( $extra_class != '' ){ echo esc_attr($extra_class); } ?>">



                    <?php echo do_shortcode($content); ?>


                </div>
            </div>

          <?php
        $output = ob_get_clean();
      return $output;
    }



   public function car_repair_slick_slider_item_func ($atts, $content = null){
        extract(shortcode_atts(array(
            'image' => '',
            'text_position'=>'center',
            'heading' => '',
            'sub_heading' => '',
            'sub_heading_2' => '',
            'short_description' => '',
            'extra_class' => '',
            'animation_style'=>'1',
            'unqid' => '',
            'slider_button' => '',
			'btn_title'=>'',
			'btn_button_action'=>'',
			'modal_id'=>'',
			'call_action'=>'',

        ), $atts ));


        $unqid = $unqid . rand(1, 999);
        $attachement = wp_get_attachment_image_src((int) $image, 'full');

        $heading_animation ='';
        $sub_heading_animation ='';
        $sub_heading_2_animation ='';
        $short_description_animatio =  '';


        $heading_delay_animation ='';
        $sub_heading_delay_animation ='';
        $sub_heading_2_delay_animation ='';
        $short_description_delay_animatio =  '';

        //now we assing anmation style wise animation in different element

        switch ($animation_style) {
            case "1":
                    $heading_animation ='zoomIn';
                    $sub_heading_animation ='scaleOut';
                    $sub_heading_2_animation ='';
                    $short_description_animatio =  'fadeIn';
                    //delay
                    $heading_delay_animation ='0.5s';
                    $sub_heading_delay_animation ='0.2';
                    $sub_heading_2_delay_animation ='';
                    $short_description_delay_animatio =  '0.9s';

                break;
            case "2":
                    $heading_animation ='fadeInLeft';
                    $sub_heading_animation ='flipInX';
                    $sub_heading_2_animation ='flipInX';
                    $short_description_animatio =  'fadeIn';
                    //delay
                    $heading_delay_animation ='0.8s';
                    $sub_heading_delay_animation ='0.2s';
                    $sub_heading_2_delay_animation ='0.5s';
                    $short_description_delay_animatio =  '1.5s';
                break;
            case "3":
                    $heading_animation ='zoomIn';
                    $sub_heading_animation ='fadeInUp';
                    $sub_heading_2_animation ='fadeInUp';
                    $short_description_animatio =  'fadeIn';
                    //delay
                    $heading_delay_animation ='0.8s';
                    $sub_heading_delay_animation ='0.2s';
                    $sub_heading_2_delay_animation ='0.5s';
                    $short_description_delay_animatio =  '1.2s';
                break;
            default:
                    $heading_animation ='zoomIn';
                    $sub_heading_animation ='scaleOut';
                    $sub_heading_2_animation ='';
                    $short_description_animatio =  'fadeIn';
                    //delay
                    $heading_delay_animation ='0.5s';
                    $sub_heading_delay_animation ='0.2';
                    $sub_heading_2_delay_animation ='';
                    $short_description_delay_animatio =  '0.9s';

        }


        ob_start();
        ?>


                <div class="slide <?php if( $extra_class != '' ){ echo esc_attr($extra_class); } ?>" id="<?php echo esc_html( $unqid ); ?>">
                    <div class="img--holder"  <?php if( $attachement != array() ){ ?>  style="background-image: url(<?php echo esc_url( $attachement[0] ); ?>);" <?php } ?>></div>
                    <div class="slide-content <?php echo esc_html($text_position);?>">
                        <div class="vert-wrap container">
                            <div class="vert">
                                <div class="container">
                                   <?php
                            if( $heading != '' ){ echo '  <h4 data-animation="'. $heading_animation .'" data-animation-delay="'. $heading_delay_animation .'">'. $heading .'</h4>'; }
                                      if( $sub_heading != '' ){ echo '<h3 data-animation="'. $sub_heading_animation .'" data-animation-delay="'. $sub_heading_delay_animation .'">'. $sub_heading .'</h3>'; }
                                       if( $sub_heading_2 != '' ){ echo '<h3 data-animation="'. $sub_heading_2_animation .'" data-animation-delay="'. $sub_heading_2_delay_animation .'">'. $sub_heading_2 .'</h3>'; }
                                       if( $short_description != '' ){ echo '<p class="hidden-xs" data-animation="'. $short_description_animatio .'" data-animation-delay="'. $short_description_delay_animatio .'">'. $short_description .'</p>'; }
									   if($btn_title != ''){
										    if ($btn_button_action == '2'){
											?>
											<a class="btn btn-invert" href="#" data-toggle="modal" data-target="#<?php echo esc_html($modal_id); ?>"><span><?php echo esc_html($btn_title); ?></span></a>
                                            <?php
											}
											if ($btn_button_action == '3'){
											?>
											<?php  $href = vc_build_link( $call_action ) ;  ?>
                                            <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?>  class="btn btn-invert <?php echo esc_html($extra_class); ?>" rel="<?php echo $href['rel'];?>"  >
                                			<?php echo esc_html($btn_title); ?>
                            				</a>
                                            <?php
											}
										   
									   }
									 
									   
                                       ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
        return ob_get_clean();
    }
}

    new Car_Repair_ServicesSlickSlider();