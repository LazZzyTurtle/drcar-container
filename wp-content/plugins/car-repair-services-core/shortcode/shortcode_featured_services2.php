<?php
function featuredservices2_shortcode($atts, $content = null ) {
    // Attributes
    $atts = shortcode_atts(
            array(
        'title' => 'Our Featured Services',
        'sub_title' => 'We offer full service auto repair & maintenance',
        'extra_class' => '',
            ), $atts, 'featured_services2'
    );
    // Attributes in var
    $title = $atts['title'];
    $sub_title = $atts['sub_title'];
    $extra_class = $atts['extra_class'];
    ?>
    <?php
    $output = '<div class="block '.$extra_class.'">'
            . '<div class="text-center">'
            . '<h2 class="h-lg">' . $title . '</h2>'
            . '<p class="info">' . $sub_title . '</p>'
            . '</div>'
            . '<div class="service-grid">';
    $output .= do_shortcode($content);
    $output .= '</div></div>';
    return $output;
    ?>
    <?php
}

add_shortcode('featured_services2', 'featuredservices2_shortcode');


function featuredservices2_shortcode_item($atts, $content = null) {
    // Attributes
    $atts = shortcode_atts(
            array(
        'title' => 'Diagnostics',
        'image' => '',
        'url' => '',
        'extra_class' => '',
            ), $atts, 'featured_services2_item'
    );
    // Attributes in var
    $title = $atts['title'];
    $image = $atts['image'];
    $url = $atts['url'];
    $extra_class = $atts['extra_class'];
    $attachement = wp_get_attachment_image_src((int) $image, array('270', '200'));
    ob_start();
    ?>
        <div class="service-grid-item <?php echo $extra_class;?>">
            <div class="service-grid-item-image">
                <img src="<?php echo esc_url($attachement[0]);?>" alt="">
            </div>
            <a <?php if($url != ""){ ?>href="<?php echo esc_url($url);?>"<?php } ?> class="service-grid-item-title">
                <?php echo esc_attr($title);?> <i class="icon-arrow-right"></i>
            </a>
        </div>


    <?php
    return ob_get_clean();
}

add_shortcode('featured_services2_item', 'featuredservices2_shortcode_item');