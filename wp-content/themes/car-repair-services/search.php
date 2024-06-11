<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Car_Repair_Services
 */

get_header(); ?>

<div id="pageContent" class="content-area">
	<div class="block">
		<div id="primary" class="container">
		<section class="error-404 not-found">
			<header class="blog-page-header">
			<?php if ( have_posts() ) : ?>
				<h1 class="text-center"><?php printf( esc_html__( 'Search Results for: %s', 'car-repair-services' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					<?php else : ?>
				<h1 class="text-centere"><?php esc_html__( 'Nothing Found', 'car-repair-services' ); ?></h1>
			<?php endif; ?>
			</header><!-- .page-header -->
		<?php
		if ( have_posts() ) :
			?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				$post_id = $post->ID;
				?>
				<div class="blog-post">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-teaser">
					<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn btn-border btn-invert"><span><?php esc_html_e( 'Read More', 'car-repair-services' ); ?></span></a>
				</div>
				<?php
			endwhile;


			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</section><!-- .error-404 -->
		</div><!-- #primary -->

	</div><!-- #block -->
</div><!-- #pageContent -->

<?php
get_footer();
