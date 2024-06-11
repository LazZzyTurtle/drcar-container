<div class="post-image content-gallery">
    <?php 
      if( is_sticky() ){
        echo '<div class="sticky_post_icon pull-right" title="' . esc_html__( 'Sticky Post', 'car-repair-services' ) . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
      }
    
    $gallery = get_post_meta(get_the_ID(), 'framework-gallery');
    if(!empty($gallery)){
    ?>
    <div class="post-carousel">
       <?php foreach($gallery as $single){
          $link = wp_get_attachment_url((int)$single);
          ?>
          <a href="<?php echo esc_url($link)?>">
            <?php echo wp_get_attachment_image($single, 'post-thumbnail')?>
          </a>
       <?php }?>
    </div>
    <?php } ?>
</div>
  