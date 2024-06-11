<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Car_Repair_Services
 */

global $car_repair_services_opt;
get_header(); 
?>
<div id="pageTitle">
<?php do_action('car_repair_services_breadcrumb'); ?>
	
	<?php if ( is_home() && ! is_front_page() ){ ?>
	<header class="entry-header">
		<h1 class="text-center">
			<?php echo single_post_title(); ?>
		</h1>
	</header>
	<?php } ?> 
</div>

<div id="pageContent" class="content-area">
    <div class="block">
		<div class="container">
		    
			<?php if( isset($car_repair_services_opt['car_repair_services_blog_type_style']) && $car_repair_services_opt['car_repair_services_blog_type_style'] == '3' ){ ?>

				<?php if ( is_active_sidebar( 'left_sideber' ) ){ ?>
                    <div class="col-md-9 column-center">
                <?php }else{ ?>
                    <div class="col-md-12 column-center">
                <?php } ?>

					<div class="blog-isotope">
					
						<?php
						if ( have_posts() ) :
						?><div class="post_loop_cont_wrap"><?php 
							if ( is_home() && ! is_front_page() ) : ?>
							<?php
							endif;
							?>
							<div class="post_loop_cont">
							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/media/content', get_post_format() );

							endwhile;
							?>
							</div>
							<div class="clearfix"></div>
							<?php 
							
								the_posts_pagination();
							?></div><?php 
						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					
					</div> 
				

				</div> 

				<?php get_sidebar();?>


			<?php } else{ ?>
			<div class="row">

				<div class="col-md-8 column-center">
								
			<header class="blog-page-header">
				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
					the_archive_description( '<div class="archive-description decor color">', '</div>' );
				?>
			</header><!-- .page-header -->

					<?php 
					if ( have_posts() ) :
						?>
						<div class="post_loop_cont_wrap">
						<?php 
						if ( is_home() && ! is_front_page() ) : ?>
						<?php
						endif;
						?>

						<div class="post_loop_cont">
						<?php 
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							?>

							<div class="blog-post">
							<?php 
								
								get_template_part( 'template-parts/media/content', get_post_format() );
							?>
								<ul class="post-meta">
                                    <li class="author"><?php esc_html_e('by', 'car-repair-services')?> <b><i><?php the_author();?></i></b></li>
                                    <li><i class="icon icon-clock"></i><span><?php echo get_the_date()?></span></li>
                                    <li><i class="icon icon-interface"></i><span><?php comments_number( '' , esc_html__('1', 'car-repair-services'), esc_html__('%', 'car-repair-services') ); ?></span></li>
                                </ul>
								<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="post-teaser">
									<?php the_excerpt(); ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="btn btn-default btn-blue"><?php esc_html_e( 'Read more', 'car-repair-services' ); ?></a>
							</div>
							<?php 

						endwhile;
						?>
						</div>
						<div class="clearfix"></div>
						<?php 
						
							the_posts_pagination();
						?></div><?php 
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				
				</div>
				<?php get_sidebar();?>
			</div>
			<?php } ?>
		</div>

    </div><!-- #block -->
</div><!-- #pageContent -->		
	
<?php
get_footer();