<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Car_Repair_Services
 */

?>

<div  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Block -->
	<div class="offset-sm">
	<?php
	the_content();

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'car-repair-services' ),
		'after'  => '</div>',
	) );
	?>
	</div>
	<!-- //Block -->
</div>