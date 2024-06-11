
<div class="post-image">
    <?php 
        if( is_sticky() ){
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__( 'Sticky Post', 'car-repair-services' ) . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
    ?>
    <?php
    $link_title = get_post_meta(get_the_ID(), 'framework-link-title', true);
    $link = get_post_meta(get_the_ID(), 'framework-link', true);
    if($link){
    ?>
    <a href="<?php the_permalink()?>"><?php the_post_thumbnail('post-thumbnail')?></a>
    <div class="post-link-wrapper">
            <div class="vert-wrapper">
                <div class="vert"> <a href="<?php echo esc_url($link)?>" class="post-link"><?php echo esc_html($link_title);?></a> </div>
            </div>
    </div>
    <?php } ?>
</div>
    