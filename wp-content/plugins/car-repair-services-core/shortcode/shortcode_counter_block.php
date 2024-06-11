<?php
add_shortcode( 'car_repair_counterbox_item', 'car_repair_counterbox_item_func' );
    function car_repair_counterbox_item_func ($atts, $content = null){

        extract(shortcode_atts(array(
            'title' => '',
            'icon' => '',
            'count_number' => '',
            'number_scrolling_speed' => '',
            'after_count_number' => '',
            'extra_class' => '',
        ), $atts )); 

            wp_enqueue_script('waypoints'); 
            wp_enqueue_script('jquery-countTo');
          

        ob_start();
        ?>
        <!-- product-total -->
        <div class="product-total-box <?php echo esc_attr($extra_class)?>">
            <div class="stat-box">
                <div>
                    <span class="number">
                        <span data-to="<?php if( $count_number != '' ){ echo esc_html( $count_number ); } ?>" 
                            <?php if( $number_scrolling_speed != '' ){ echo 'data-speed="'. intval( $number_scrolling_speed ) .'"'; } ?>><?php if( $content ){ echo $content; } ?>
                        </span>
                    </span>
                        <span class="icon <?php echo  apply_filters('replace_icon_html',$atts) ; ?>">
                        </span>
                </div>
                <div class="text">
                    <h5><?php if( $title != '' ){ echo esc_attr( $title ); } ?></h5>
                </div>
            </div>
            <!-- /product-total -->
        </div>
        <!-- /product-total-box -->
        <?php 
         $content = ob_get_clean();
         return $content;  
    }