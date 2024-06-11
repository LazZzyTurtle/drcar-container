
<div class="post-image">
    <?php 
        if( is_sticky() ){
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__( 'Sticky Post', 'car-repair-services' ) . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }

    $video_content = get_post_meta(get_the_ID(), 'framework-video-markup', true);
    if($video_content){
    ?>
    <div class="post-video">
        <?php echo get_post_meta(get_the_ID(), 'framework-video-markup', true); ?>
    </div>
    <?php   } ?>
</div>
    