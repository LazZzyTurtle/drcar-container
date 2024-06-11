<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
$car_repair_services = car_repair_services_options();
$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';
if($theme != '1'){
?>
<div class="divider-lg"></div>
<div id="comments" class="comments">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments__title">
			<?php
			$comment_count = get_comments_number();
			if ( '1' === $comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'Comment (1)', 'car-repair-services' )

				);
			} else {
				printf( // WPCS: XSS OK.
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( ' Comments &ldquo;%2$s&rdquo;', 'Comments (%1$s)', $comment_count, 'comments title', 'car-repair-services' ) ),
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h3>

		<?php car_repair_comment_nav(); ?>

        	<?php
				$GLOBALS['ncc'] = 1;
				$args = array(  
					'style'=>'div', 
					'callback'   => 'car_repair_services_comments',
					'short_ping' => true,
				);
				wp_list_comments($args);
            ?>

		<?php car_repair_comment_nav(); ?>

	<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'car-repair-services' ); ?></p>
	<?php endif;?>

	</div><!-- .comments-area -->
	<div class="divider-lg"></div>
	<?php
    $user = wp_get_current_user();
    $user_identity = $user->display_name;
    $req = get_option( 'require_name_email' );
    $aria_req = $req ? " aria-required='true'" : '';

	$formargs = array(
		
	  'class_form'           => 'contact-form form-default',
	  'title_reply'       => esc_html__( 'Leave a Comment','car-repair-services' ),
	  'title_reply_before'   => '<h3>',
	  'title_reply_after'   => '</h3>',
	  'title_reply_to'    => esc_html__( 'Leave a Comment to %s','car-repair-services' ),
	  'cancel_reply_link' => esc_html__( 'Cancel Reply','car-repair-services' ),
	  'class_submit'      => 'btn btn-border btn-invert',
	  'label_submit'      => esc_html__( 'Leave a Comment','car-repair-services' ),
	  'submit_button'        => '<div><button type="submit" name="%1$s" id="%2$s" class="%3$s"><span>%4$s</span></button></div>',
	  'comment_field' =>  '<div class="row"><div class="col-sm-12"><div class="form-group"><textarea   class="form-control input-full" id="comment" name="comment" cols="45" rows="6" aria-required="true" placeholder="' . esc_attr__( 'Your Comment...', 'car-repair-services' ) .'">' .
	    '</textarea></div></div></div>',

	  'must_log_in' => '<div>' .
	    sprintf(
	      wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.','car-repair-services' ), array( 'a' => array( 'href' => array() ) )),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</div><br /><br />',

	  'logged_in_as' => '<div>' .
	    sprintf(
	    wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','car-repair-services' ), array( 'a' => array( 'href' => array() ) )),
	      esc_url(admin_url( 'profile.php' )),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</div><br /><br />',

	  'comment_notes_before' => '<p>' .
	    esc_html__( 'Your email address will not be published.','car-repair-services' ) . ( $req ? '<span class="required">*</span>' : '' ) .
	    '</p>',
		'comment_notes_after' => '',
	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<div class="row"><div class="col-lg-4"><div class="form-group"><input id="author"  class="form-control input-full" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . '  placeholder="' . esc_attr__( 'Your name', 'car-repair-services' ) .'" /></div></div>',

	    'email' =>
	      '<div class="col-lg-4"><div class="form-group"><input id="email" name="email"  class="form-control input-full" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' placeholder="' . esc_attr__( 'address@youremail.com', 'car-repair-services' ) .'" /></div></div>',

	    'url' =>
	      '<div class="col-lg-4"><div class="form-group"><input id="url" name="url" class="form-control input-full" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	      '" size="30" placeholder="' . esc_attr__( 'Website', 'car-repair-services' ) .'" /></div></div></div>'
	    )
	  ),
	);
	
	comment_form($formargs); 
}else{ ?>
	<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'car-repair-services' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
			?>
		</h2>

		<?php car_repair_comment_nav(); ?>

    	<ol class="commentlist comments">
        	<?php
                    $GLOBALS['ncc'] = 1;
                    $args = array( 'avatar_size' => 64, 'short_ping' => true, 'style'=>'' );
                    wp_list_comments($args);
                ?>
        </ol><!--.commentList -->

		<?php car_repair_comment_nav(); ?>

	<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'car-repair-services' ); ?></p>
	<?php endif;

    $user = wp_get_current_user();
    $user_identity = $user->display_name;
    $req = get_option( 'require_name_email' );
    $aria_req = $req ? " aria-required='true'" : '';

	$formargs = array(
		
	  'id_form'           => 'commentform',
	  'id_submit'         => 'submit',
	  'title_reply'       => esc_html__( 'Leave a Comment','car-repair-services' ),
	  'title_reply_to'    => esc_html__( 'Leave a Comment to %s','car-repair-services' ),
	  'cancel_reply_link' => esc_html__( 'Cancel Reply','car-repair-services' ),
	  'label_submit'      => esc_html__( 'Reply','car-repair-services' ),
	  'submit_button'     =>'<button type="submit" name="%1$s" id="%2$s" class="%3$s btn btn-main btn-sm  btn-top btn--ys">%4$s</button>',

	  'comment_field' =>  '<div class="form-group"><label for="comment"><strong>' . _x( 'Comment', 'noun', 'car-repair-services' ) . ( $req ? '<span class="required">*</span> ' : '' ) .
	    '</strong></label><textarea   class="textarea-custom" id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
	    '</textarea></div>',

	  'must_log_in' => '<div>' .
	    sprintf(
	      wp_kses(__( 'You must be <a href="%s">logged in</a> to post a comment.','car-repair-services' ), array( 'a' => array( 'href' => array() ) )),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</div><br /><br />',

	  'logged_in_as' => '<div>' .
	    sprintf(
	    wp_kses(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','car-repair-services' ), array( 'a' => array( 'href' => array() ) )),
	      esc_url(admin_url( 'profile.php' )),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</div><br /><br />',

	  'comment_notes_before' => '<p>' .
	    esc_html__( 'Your email address will not be published.','car-repair-services' ) . ( $req ? '<span class="required">*</span>' : '' ) .
	    '</p>',
		'comment_notes_after' => '',
	  'fields' => apply_filters( 'comment_form_default_fields', array(

	    'author' =>
	      '<div class="form-group"><label for="author"><strong>' . esc_html__( 'Name', 'car-repair-services' ) . ( $req ? '<span class="required">*</span> ' : '' ) . '</strong></label>'  .
	      '<input id="author"  class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	      '" size="30"' . $aria_req . ' /></div>',

	    'email' =>
	      '<div class="form-group"><label for="email"><strong>' . esc_html__( 'Email', 'car-repair-services' ) .
	      ( $req ? '<span class="required">*</span> ' : '' ) . '</strong></label>' .
	      '<input id="email" name="email"  class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	      '" size="30"' . $aria_req . ' /></div>',

	    'url' =>
	      '<div class="form-group"><label for="url"><strong>' .
	      esc_html__( 'Website', 'car-repair-services' ) . '</strong></label>' .
	      '<input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	      '" size="30" /></div>'
	    )
	  ),
	);
	
	comment_form($formargs); 
	 ?>

</div><!-- .comments-area -->
<?php
}
?>

