
<div class="post-image">
    <?php 
        if( is_sticky() ){
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__( 'Sticky Post', 'car-repair-services' ) . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
    ?>
    <?php
    $audio_content = get_post_meta(get_the_ID(), 'framework-audio-markup', true);
    if($audio_content){
    ?>
    <div class="post-music">
            <?php echo wp_kses_post($audio_content);?>
    </div>
    <?php
    }
    ?>
</div>
    