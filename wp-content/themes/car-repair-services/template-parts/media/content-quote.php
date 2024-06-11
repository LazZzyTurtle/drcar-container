
<div class="post-image">
    <?php 
        if( is_sticky() ){
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__( 'Sticky Post', 'car-repair-services' ) . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
    ?>
    <a href="<?php the_permalink()?>"><?php the_post_thumbnail('post-thumbnail')?></a>
        <div class="quote">
            <?php
            $quote = get_post_meta(get_the_ID(), 'framework-quote', true);
            if($quote){
            ?>
            <div class="quote-author"><?php echo get_post_meta(get_the_ID(), 'framework-quote-author', true); ?></div>
            <p><?php echo esc_html($quote); ?></p>
            <?php
            }
            ?>
        </div>
    </a>
</div>
