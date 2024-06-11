<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package car_repair_services
 */

if ( ! function_exists( 'car_repair_services_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function car_repair_services_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	global $post;
	$user_avatar = get_avatar( $post->post_author, 63 );
	$byline = sprintf(
		esc_html__( '%s', 'car-repair-services' ),
		'<span class="author__img">' . wp_kses_post( $user_avatar ) . '</span><span class="author__text">' . esc_html( get_the_author() ) . '</span>'
	);

	if ( get_comments_number( get_the_ID() ) == 0 ) {
		$comments_count =  '<span>'.get_comments_number( get_the_ID() ) . '</span>'. __(' comments','car-repair-services').'';
	} elseif ( get_comments_number( get_the_ID() ) > 1 ) {
		$comments_count = '<span>'. get_comments_number( get_the_ID() ) . '</span>'. __(' comments','car-repair-services').'';
	} else {
		$comments_count = '<span>'.get_comments_number( get_the_ID() ) . '</span>'. __(' comment','car-repair-services').'';
	}
	$comments_count = sprintf( esc_html( '%s' ), $comments_count );

	echo '<ul class="post-meta">';
	echo '<li class="author">' . $byline . '</li>';
	echo '<li><span class="posted-on">' . $time_string . '</span></li>'; // WPCS: XSS OK.
	echo '<li>'. $comments_count .'</li>';
	echo '</ul>';

}
endif;




if ( ! function_exists( 'car_repair_services_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function car_repair_services_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'car-repair-services' ) );
		if ( $categories_list && car_repair_services_categorized_blog() ) {
			printf( '<span class="cat-links pull-left">' . esc_html__( 'Posted in : %1$s', 'car-repair-services' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'car-repair-services' ) );
		if ( $tags_list ) {
			printf( '<div class="col-auto"><div class="tags-list pull-left">' . esc_html__( '%1$s', 'car-repair-services' ) . '</div></div>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'car-repair-services' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'car-repair-services' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'car_repair_services_tag_list' ) ) :
function car_repair_services_tag_list() {
	$tags_list = get_the_tag_list( '', esc_html__( ' ', 'car-repair-services' ) );
	if ( $tags_list ) {
		printf( '<div class="col-auto"><div class="tags-list pull-left">' . esc_html__( '%1$s', 'car-repair-services' ) . '</div></div>', $tags_list ); // WPCS: XSS OK.
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function car_repair_services_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'car_repair_services_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'car_repair_services_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so car_repair_services_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so car_repair_services_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in car_repair_services_categorized_blog.
 */
function car_repair_services_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'car_repair_services_categories' );
}
add_action( 'edit_category', 'car_repair_services_category_transient_flusher' );
add_action( 'save_post',     'car_repair_services_category_transient_flusher' );



function car_repair_services_posts_nav() { 
	$total = wp_count_posts()->publish;
	if($total > 1){
?>
	<div class="single-nav-post">
		<?php
			the_post_navigation(array(
			'prev_text' => '<div class="btn-prev nav-post-btn image-scale"><div class="nav-post__content"><div class="nav-post__tag">' . esc_html__('Previous', 'car-repair-services') .'</div><h6 class="nav-post__title">' . esc_html__('%title', 'car-repair-services') .'</h6></div></div>',

			'next_text' =>  '<div class="btn-next nav-post-btn image-scale"><div class="nav-post__content"><div class="nav-post__tag">' . esc_html__('Next', 'car-repair-services') .'</div><h6 class="nav-post__title">'.esc_html__('%title', 'car-repair-services') .'</h6></div></div>',
			'screen_reader_text' =>  esc_html__( '&nbsp;','car-repair-services' ),
		));
		?>
	</div>

<?php
	}
}



function car_repair_services_author_box() { 
	global $post;
	$display_name = get_the_author_meta('display_name', $post->post_author);
	$facebook          = get_the_author_meta( 'facebook', $post->post_author );
	$twitter          = get_the_author_meta( 'twitter', $post->post_author );
	$instagram          = get_the_author_meta( 'instagram', $post->post_author );
	$user_description = get_the_author_meta('user_description', $post->post_author);
	$user_avatar = get_avatar($post->post_author, 175);
	if(!empty($user_description)){
	?>
	<div class="divider-lg"></div>
	<div class="box-info">
		<div class="box-info__img">
		<?php echo wp_kses_post($user_avatar); ?>
		</div>
		<div class="box-info__content">
			<h6 class="box-info__title"><?php echo wp_kses_post(ucfirst($display_name)); ?></h6>
			<p>
			<?php echo wp_kses_post($user_description); ?>
			</p>
			<ul class="social-icon">
				<?php if($facebook){?>
				<li><a class="icon icon-59439" href="<?php echo esc_url($facebook);?>"></a></li>
				<?php } ?>
				<?php if($twitter){?>
				<li><a class="icon icon-8800" href="<?php echo esc_url($twitter);?>"></a></li>
				<?php } ?>
				<?php if($instagram){?>
				<li><a class="icon icon-733614" href="<?php echo esc_url($instagram);?>"></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<?php 
	}
}


if ( ! function_exists( 'car_repair_services_comments' ) ) {

	function car_repair_services_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		extract( $args, EXTR_SKIP );
	
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
		} else {
			$tag       = 'li';
		}
		$comment_class = empty( $args['has_children'] ) ? '' : 'parent';
		?>

			<<?php echo esc_attr( $tag ); ?> <?php comment_class( 'comment ' . $comment_class . ' ' ); ?> id="comment-<?php comment_ID(); ?>">
				<?php if ( $comment->comment_type != 'trackback' && $comment->comment_type != 'pingback' ) { ?>
				<div class="userpic"><?php print get_avatar( $comment, 115, null, null ); ?></div>
				<?php } ?>
				<div class="text">
					<div class="meta"><b><?php echo get_comment_author_link(); ?></b> 
					<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'reply_text' => esc_html__( 'Reply', 'car-repair-services' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
								)
							)
						);
					?>
					</div>
					<div class="date"><span><?php echo get_comment_date( 'd F Y' ); ?></span></div>
					<?php comment_text(); ?>
				</div>
		
		<?php
	}
}