<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}
$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';
if ( $theme != '1' ) {
	?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
	<?php
	$count = $product->get_review_count();
	if ( $count && wc_review_ratings_enabled() ) {
		/* translators: 1: reviews count 2: product name */
		$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'car-repair-services' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
		echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
	} else {
		esc_html_e( 'Reviews', 'car-repair-services' );
	}
	?>
		</h2>

	<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
		<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			echo '<nav class="woocommerce-pagination">';
			paginate_comments_links(
				apply_filters(
					'woocommerce_comment_pagination_args',
					array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'list',
					)
				)
			);
			echo '</nav>';
		endif;
		?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'car-repair-services' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form" class="contact-form form-default">
		<?php
		$commenter = wp_get_current_commenter();

		$comment_form = array(
			'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'car-repair-services' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'car-repair-services' ), get_the_title() ),
			'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'car-repair-services' ),
			'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
			'title_reply_after'   => '</span>',
			'comment_notes_after' => '',
			'fields'              => array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'car-repair-services' ) . ' <span class="required">*</span></label> ' .
												'<input id="author" placeholder="Name" class="input-custom input-full" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'car-repair-services' ) . ' <span class="required">*</span></label> ' .
												'<input id="email" placeholder="Email" class="input-custom input-full" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p>',
			),
			'label_submit'        => esc_html__( 'Submit', 'car-repair-services' ),
			'logged_in_as'        => '',
			'comment_field'       => '',
			'class_submit'        => 'btn btn-border btn-invert',
			'submit_button'       => '<button type="submit" name="%1$s" id="%2$s" class="%3$s">%4$s</button>',
		);

		$account_page_url = wc_get_page_permalink( 'myaccount' );
		if ( $account_page_url ) {
			/* translators: %s opening and closing link tags respectively */
			$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'car-repair-services' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
		}

		if ( wc_review_ratings_enabled() ) {
			$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'car-repair-services' ) . '</label><select name="rating" id="rating" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'car-repair-services' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'car-repair-services' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'car-repair-services' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'car-repair-services' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'car-repair-services' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'car-repair-services' ) . '</option>
						</select></div>';
		}

		$comment_form['comment_field'] .= '<p class="comment-form-comment form-group"><textarea placeholder="Comment" class="form-control input-full" name="comment" cols="45" rows="6" required></textarea></p>';

		comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
		?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'car-repair-services' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
	<?php
} else {
	?>
	<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
	<?php
	$count = $product->get_review_count();
	if ( $count && wc_review_ratings_enabled() ) {
		/* translators: 1: reviews count 2: product name */
		$reviews_title = sprintf( esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'car-repair-services' ) ), esc_html( $count ), '<span>' . get_the_title() . '</span>' );
		echo apply_filters( 'woocommerce_reviews_title', $reviews_title, $count, $product ); // WPCS: XSS ok.
	} else {
		esc_html_e( 'Reviews', 'car-repair-services' );
	}
	?>
		</h2>

	<?php if ( have_comments() ) : ?>

			<ol class="commentlist">
		<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
			echo '<nav class="woocommerce-pagination">';
			paginate_comments_links(
				apply_filters(
					'woocommerce_comment_pagination_args',
					array(
						'prev_text' => '&larr;',
						'next_text' => '&rarr;',
						'type'      => 'list',
					)
				)
			);
			echo '</nav>';
		endif;
		?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php esc_html_e( 'There are no reviews yet.', 'car-repair-services' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
		<?php
		$commenter = wp_get_current_commenter();

		$comment_form = array(
			'title_reply'         => have_comments() ? esc_html__( 'Add a review', 'car-repair-services' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'car-repair-services' ), get_the_title() ),
			'title_reply_to'      => esc_html__( 'Leave a Reply to %s', 'car-repair-services' ),
			'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
			'title_reply_after'   => '</span>',
			'comment_notes_after' => '',
			'fields'              => array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'car-repair-services' ) . ' <span class="required">*</span></label> ' .
												'<input id="author" placeholder="Name" class="input-custom input-full" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'car-repair-services' ) . ' <span class="required">*</span></label> ' .
												'<input id="email" placeholder="Email" class="input-custom input-full" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p>',
			),
			'label_submit'        => esc_html__( 'Submit', 'car-repair-services' ),
			'logged_in_as'        => '',
			'comment_field'       => '',
			'class_submit'        => 'alt btn btn-invert btn-lg',
			'submit_button'       => '<button type="submit" name="%1$s" id="%2$s" class="%3$s btn btn--ys">%4$s</button>',
		);

		$account_page_url = wc_get_page_permalink( 'myaccount' );
		if ( $account_page_url ) {
			/* translators: %s opening and closing link tags respectively */
			$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'car-repair-services' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
		}

		if ( wc_review_ratings_enabled() ) {
			$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'car-repair-services' ) . '</label><select name="rating" id="rating" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'car-repair-services' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'car-repair-services' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'car-repair-services' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'car-repair-services' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'car-repair-services' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'car-repair-services' ) . '</option>
						</select></div>';
		}

		$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'car-repair-services' ) . ' <span class="required">*</span></label><textarea placeholder="Comment" class="textarea-custom input-full" id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

		comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
		?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'car-repair-services' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
	<?php
}
