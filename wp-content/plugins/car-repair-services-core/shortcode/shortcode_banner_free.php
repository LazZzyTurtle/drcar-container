<?php
function create_bannerfree_shortcode($atts,$content = Null) {
    // Attributes
    $atts = shortcode_atts(
            array(
        'image' => '',
        'title' => 'FREE!',
        'sub_title' => 'Winter & Summer Checks',
        'button_action' => '',
        'popup_id' => '54',
        'call_action' => '',
        'button_text' => 'Get Quote',
        'button_class' => 'btn-invert',
            ), $atts, 'banner_free'
    );
    // Attributes in var
    $image = $atts['image'];
    $title = $atts['title'];
    $sub_title = $atts['sub_title'];
    $button_action = $atts['button_action'];
    $popup_id = $atts['popup_id'];
    $call_action = $atts['call_action'];
    $button_text = $atts['button_text'];
    $button_class = $atts['button_class'];

    $attachement = wp_get_attachment_image_src((int) $image, array('470', '520'));


    ob_start();
    ?>
    <div class="banner-free">
        <img src="<?php
        if ($attachement != array()) {
            echo esc_url($attachement[0]);
        }
        ?>" alt="">
        <div class="banner-text">
            <div class="banner-text-header">
                <div class="banner-text-1"><?php echo $title; ?></div>
                <div class="banner-text-2"><?php echo $sub_title; ?></div>
            </div>
            <div class="banner-text-3">
                <p><?php echo $content; ?></p>
            </div>
            <div class="banner-text-btn">
                <div class="form-popup-wrap">
                    <?php
                    if ($button_action == '2') {
                        $href = vc_build_link($call_action);
                        if($href['title'] == ""){
                            $href['title'] = 'Get Quote';
                        }else{
                            $href['title'];
                        }
                        ?>
                        <a class="btn <?php echo $button_class;?> form-popup-link" href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>><span><?php echo $href['title'];?></span></a>
                        <?php }else {
                        ?>
                        <a class="btn <?php echo $button_class;?> form-popup-link" href="#"><span><?php echo $button_text;?></span></a>
                        <div class="form-popup">
                            <div class="quote-form">
                                <?php echo do_shortcode('[contact-form-7 id="' . $popup_id . '"]'); ?>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('banner_free', 'create_bannerfree_shortcode');
