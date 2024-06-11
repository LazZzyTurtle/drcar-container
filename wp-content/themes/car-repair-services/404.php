<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Car_Repair_Services
 */

get_header(); ?>
	<div id="pageContent" class="content-area">
    <div class="block">
        <div id="primary" class="container">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="blog-page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'car-repair-services' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'car-repair-services' ); ?></p>

					<?php
						get_search_form();
					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
        </div><!-- #primary -->

    </div><!-- #block -->
</div><!-- #pageContent -->
<?php
get_footer();