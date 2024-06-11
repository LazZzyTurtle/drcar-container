<?php
function create_servicesbanner2_shortcode($atts, $content = null) {
    extract(shortcode_atts(
            array(
        'image' => '',
        'icon_class' => '',
        'content1' => '',
        'contact' => '',
        'contact_info' => '',
        'url' => '#',
            ), $atts
    ));
    $attachement = wp_get_attachment_image_src((int) $image, array('459', '508'));
    ob_start();
    ?>
    <div class="divider-xxl visible-lg visible-md"></div>
    <a href="<?php echo esc_url($url);?>" class="banner-service">
        <img src="<?php
        if ($attachement != array()) {
            echo esc_url($attachement[0]);
        }
        ?>" alt="" class="visible-sm visible-xs">
        <div class="row-flex">
            <div class="col-left">
                <i class="<?php echo $icon_class; ?>"></i>
            </div>
            <div class="col-center">
                <div class="banner-text-1"><?php echo $content; ?></div>
                <div class="banner-text-2"><?php echo $content1; ?></div>
            </div>
            <div class="col-right">
                <div class="banner-text-3"><i class="icon icon-phone"></i><?php echo $contact; ?></div>
                <div class="banner-text-4"><?php echo $contact_info; ?></div>
            </div>
        </div>
    </a>

    <?php
    return ob_get_clean();
}

add_shortcode('services_banner_2', 'create_servicesbanner2_shortcode');