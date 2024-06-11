<?php
function car_repair_services_post_title_block($thumb = false, $post_format_data = null){?>
    <div class="post_format_block post__title_block">

        <figure>
            <?php
            if ($thumb == true) {
                car_repair_services_post_thumbnail();
            }else{
                echo wp_kses_post($post_format_data);
            }
            ?>
        </figure>
    <?php if (!is_single()) { ?>
            <div class="pull-left">
                <time>
                    <span><?php echo get_the_date('j'); ?></span>
                    <?php echo get_the_date("M"); ?>
                </time>
            </div>	
            <div class="pull-left">
                <h2 class="post__title text-uppercase"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                <div class="post__meta">
                    <span class="post__meta__item">
                        <span class="autor"><?php esc_html_e('by', 'car-repair-services'); ?> <b><?php the_author() ?></b></span>
                    </span>										
                </div>
            </div>	
    <?php } ?>											
    </div>
    <?php
}

function car_repair_services_post_meta(){ ?>
    <div class="post__meta">								
        <span class="post__meta__item">
            <span class="icon icon-message"></span>
            <a href="<?php echo esc_url(comments_link()) ?>">
                <?php
                printf(_nx('(01) <span class="yourstore_hide_on_grid">Comment</span>', '(%1$s) <span class="yourstore_hide_on_grid">Comments</span>', get_comments_number(), 'comments title', 'car-repair-services'), number_format_i18n(get_comments_number()));

                ?>
            </a>
        </span>
        <span class="post__meta__item">
            <?php
                printf('<span class="icon icon-bookmark_border"></span>');
                echo '<span class="cat-links">'; // WPCS: XSS OK.
                the_category( ', ' );
                echo '</span>';
            ?>
        </span>
    </div>
    <?php
}

function car_repair_services_print_post_tags(){
    ?>
<div class="post__meta">
    <span class="post__meta__item">

        <?php
            $categories_list = wp_get_post_tags();
            if (!empty($categories_list)) {
                echo ('<span class="icon icon-bookmark_border"></span>');
                echo '<span class="cat-links">'; // WPCS: XSS OK.
                the_tags();
                echo '</span>';
            }
        ?>
    </span>
</div>
<?php
}