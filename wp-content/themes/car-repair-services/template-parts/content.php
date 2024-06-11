<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Car_Repair_Services
 */
$car_repair_services = car_repair_services_options();
$theme               = isset( $car_repair_services['theme_setting'] ) && $car_repair_services['theme_setting'] == '1';
if ( $theme != '1' ) {
	?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post single' ); ?>>
	<?php echo get_template_part( 'template-parts/media/content', get_post_format() ); ?>
</div>
<div class="post-content">
	<?php car_repair_services_posted_on(); ?>
	<a href="<?php the_permalink(); ?>"> <?php the_title( '<h3 class="post-title">', '</h3>' ); ?></a>
	<div class="post-author"><?php printf( esc_html__( '%s', 'car-repair-services' ), get_the_author() ); ?></div>
	<div class="post-teaser">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'car-repair-services' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);
	} else {
		if ( get_option( 'rss_use_excerpt' ) ) {
			echo '<p>' . the_excerpt() . '</p>';
			echo '<a href="' . get_the_permalink() . '" class="btn">' . esc_html__( 'Continue Reading', 'car-repair-services' ) . '</a>';
		} else {
			echo '<p>' . the_excerpt() . '</p>';
			echo '<a href="' . get_the_permalink() . '" class="btn gnfdhg">' . esc_html__( 'Continue Reading', 'car-repair-services' ) . '</a>';
		}
	}
	wp_link_pages(
		array(
			'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'car-repair-services' ) . '</span>',
			'after'       => '</div></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'car-repair-services' ) . ' </span>%',
			'separator'   => ', ',
		)
	);
	?>
	</div>
	<?php
	if ( is_single() ) {
		echo get_the_tag_list( '<ul class="tags-links tags-list"><li>', '</li><li>', '</li></ul>' );
	}
	?>
</div>
	<?php
} else {
	?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post single' ); ?>>
	<div class="post-image">
	<?php echo get_template_part( 'template-parts/media/content', get_post_format() ); ?>
</div>
<div class="post-content">
	<?php car_repair_services_posted_on(); ?>
	<a href="<?php the_permalink(); ?>"> <?php the_title( '<h3 class="post-title">', '</h3>' ); ?></a>
	<div class="post-author"><?php printf( esc_html__( '%s', 'car-repair-services' ), get_the_author() ); ?></div>
	<div class="post-teaser">
	<?php
	if ( is_single() ) {
		the_content(
			sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'car-repair-services' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);
	} else {
		if ( get_option( 'rss_use_excerpt' ) ) {
			echo '<p>' . the_excerpt() . '</p>';
			echo '<a href="' . get_the_permalink() . '" class="btn">' . esc_html__( 'Continue Reading', 'car-repair-services' ) . '</a>';
		} else {
			echo '<p>' . the_excerpt() . '</p>';
			echo '<a href="' . get_the_permalink() . '" class="btn gnfdhg">' . esc_html__( 'Continue Reading', 'car-repair-services' ) . '</a>';
		}
	}
	wp_link_pages(
		array(
			'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'car-repair-services' ) . '</span>',
			'after'       => '</div></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'car-repair-services' ) . ' </span>%',
			'separator'   => ', ',
		)
	);
	?>
	</div>
	<?php
	if ( is_single() ) {
		echo get_the_tag_list( '<ul class="tags-links tags-list"><li>', '</li><li>', '</li></ul>' );
	}
	?>
</div>
</div>
	<?php
}
