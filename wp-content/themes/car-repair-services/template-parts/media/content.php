<div class="post-image">
    <?php 
        if( is_sticky() ){
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__( 'Sticky Post', 'car-repair-services' ) . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
    ?>
    <a href="<?php the_permalink(); ?>">
    <?php echo get_the_post_thumbnail( get_the_ID() ); ?>
    </a>
</div>
    