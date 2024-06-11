<?php
function create_icontab_shortcode($atts)
{
    //Attributes
    $atts = shortcode_atts(
        array(
            'tabs' => '',
            'image' => '',
            'extra_class' => '',
        ),
        $atts,
        'icon_tab'
    );

    $extra_class = $atts['extra_class'];
    $tabs = $atts['tabs'];
    $image = $atts['image'];
    $attachement = wp_get_attachment_image_src((int) $image, array('1920', '566'));
    $tab = vc_param_group_parse_atts($tabs);
    ob_start();
?>

<div class="block <?php echo $extra_class; ?>">
  <div class="icons-tabs">
    <ul class="nav nav-tabs">
      <?php
                $i = 1;
                $unit_id = rand();
                if (!empty($tab)) {
                    foreach ($tab as $key => $item) {
                ?>
      <li class="<?php if ($key == 0) echo 'active'; ?>">
        <a href="#tab<?php echo $unit_id . $i; ?>" data-toggle="tab">
          <i class="<?php echo $item['services_icon']; ?>"></i>
          <span><?php echo $item['title']; ?></span>
        </a>
      </li>
      <?php
                        $i++;
                    }
                }
                ?>
    </ul>
    <div class="tab-content-bg">
      <div class="container">
        <div class="tab-content">
          <?php
                        $i = 1;
                        if (!empty($tab)) {
                            foreach ($tab as $key => $item) {
                        ?>
          <div class="tab-pane <?php if ($key == 0) echo 'active'; ?>" id="tab<?php echo $unit_id . $i; ?>">
            <?php
                                    if ($item['select_content'] == '1') {
                                        if (isset($item['custom_html']))
                                            echo $item['custom_html'];
                                    } else {
                                        if (isset($item['post_id'])) {
                                            $post = get_post((int) $item['post_id']);
                                            if (isset($post->post_content))
                                                echo $post->post_content;
                                        }
                                    }
                                    ?>
          </div>
          <?php
                                $i++;
                            }
                        }
                        ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    $url = '';
    if ($attachement != array()) {
        $url = esc_url($attachement[0]);

    ?>
<style>
.icons-tabs .tab-content-bg {
  background: url(<?php echo $url; ?>) no-repeat center center;
  background-size: cover;
}
</style>
<?php
    }
    return ob_get_clean();
}

add_shortcode('icon_tab', 'create_icontab_shortcode');