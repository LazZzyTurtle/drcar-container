<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Car_Repair_Services
 */

get_header(); ?>
<?php 
$car_repair_services = car_repair_services_options();

$theme = isset($car_repair_services['theme_setting']) && $car_repair_services['theme_setting'] == '1';
if($theme != '1'){
$show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_breadcrumb', true);
$car_repair_services_opt = car_repair_get_options();
$bt_type = '';
if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '2' ){ 
    $bt_type = 'page-title-wrapper';
}
?> 
<div id="pageTitle" class="<?php echo esc_attr($bt_type);?>">
<?php if( isset($car_repair_services_opt['enable_blog_title']) && $car_repair_services_opt['enable_blog_title'] == '1' ){ ?>
	<?php
	$myvalue = get_the_title();

	$arr = explode(' ',trim($myvalue));
	$push=array_shift( $arr);
	$push1 = implode(' ', $arr);
	?>
	<h1><?php echo esc_html($push); ?> <span class="color"><?php echo esc_html($push1); ?></span></h1>
	<?php } ?> 
	<div class="breadcrumbs">
		<div class="breadcrumb">
			<?php do_action('car_repair_services_breadcrumb'); ?>
		</div>
	</div>
</div>
<!-- #pageTitle -->

    <div id="pageContent">
		<div class="container">
			<div class="row">
			<?php if ( is_active_sidebar( 'left_sideber' ) ){ ?>
                    <div class="col-md-7 col-lg-8 column-center">
                <?php }else{ ?>
                    <div class="col-md-12 col-lg-12 column-center">
                <?php } ?>
				<?php
						while ( have_posts() ) : the_post();

							?>
					<div class="blog-post single single_pg_cont">
					


								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							
										<?php get_template_part( 'template-parts/media/content', get_post_format() ); ?>
										<?php car_repair_services_posted_on() ;?>
										
										<?php the_title( '<h3 class="post-title">', '</h3>' ); ?>
										<div class="post-text">
											<?php 
													the_content( sprintf(
														/* translators: %s: Name of current post. */
														wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'car-repair-services' ), array( 'span' => array( 'class' => array() ) ) ),
														the_title( '<span class="screen-reader-text">"', '"</span>', false )
													) );
													wp_link_pages( array(
														'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'car-repair-services' ) . '</span>',
														'after'       => '</div></div>',
														'link_before' => '<span>',
														'link_after'  => '</span>',
														'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'car-repair-services' ) . ' </span>%',
														'separator'   => ', ',
													) );

											?>
										</div>
										
										<div class="single-content-footer">
										<?php 
										 car_repair_services_tag_list();
										 car_repair_services_social_share();
										?>
										</div>
							
								</div>
								<?php 
									
							endwhile; // End of the loop.
						?>
					</div>
					<?php 
					car_repair_services_posts_nav(); 
					car_repair_services_author_box();
					?>
					<?php 
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
<?php
}else{

	$show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_breadcrumb', true);
	$show_title = get_post_meta(get_the_ID(), 'framework_show_page_title', true);
	?> 
	<div id="pageTitle">
		<?php if (!is_front_page() && ( $show_breadcrumb != 'off') ) : ?>
			<?php do_action('car_repair_services_breadcrumb'); ?>
		<?php endif;?>
	
	
		<?php if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '1' ){ ?>
		<?php if($show_title != 'off') : ?>
			<?php if ( !is_home() && ! is_front_page() ) : ?>
			<!-- .entry-header -->
			<header class="entry-header">
			<?php
			$myvalue = get_the_title();
	
			$arr = explode(' ',trim($myvalue));
			$push=array_shift( $arr);
			$push1 = implode(' ', $arr);
			 
			?>
			<h1><?php echo esc_html($push); ?> <span class="color"><?php echo esc_html($push1); ?></span></h1>
	
			</header>
			<!-- .entry-header -->
	
			<?php endif;?>
		<?php endif;?> 
		<?php } ?>
		  
	</div>
	<!-- #pageTitle -->
	
		<div id="pageContent">
		<?php if( isset($car_repair_services_opt['bt_type']) && $car_repair_services_opt['bt_type'] == '2' ){ ?>
		<?php if($show_title != 'off') : ?>
			<?php if ( !is_home() && ! is_front_page() ) : ?>
			<!-- .entry-header -->
			<header class="entry-header">
			<?php
			$myvalue = get_the_title();
	
			$arr = explode(' ',trim($myvalue));
			$push=array_shift( $arr);
			$push1 = implode(' ', $arr);
			
			?>
			<h1><?php echo esc_html($push); ?> <span class="color"><?php echo esc_html($push1); ?></span></h1>
	
			</header>
			<!-- .entry-header -->
	
			<?php endif;?>
		<?php endif;?> 
			<?php } ?>
			<div class="container">
				<div class="row">
				<?php if ( is_active_sidebar( 'left_sideber' ) ){ ?>
						<div class="col-md-9 column-center primary with-sidebar-blog">
					<?php }else{ ?>
						<div class="col-md-12 column-center primary">
					<?php } ?>
						<div class="blog-post single single_pg_cont">
						
							<?php
								while ( have_posts() ) : the_post();
	
									?>
	
									<div id="post-<?php the_ID(); ?>" <?php post_class('blog-post single'); ?>>
	
										<div class="post-image">
											<?php get_template_part( 'template-parts/media/content', get_post_format() ); ?>
											<?php car_repair_services_posted_on() ;?>
											
											<?php the_title( '<h3 class="post-title">', '</h3>' ); ?>
											<div class="post-teaser">
												<?php 
														the_content( sprintf(
															/* translators: %s: Name of current post. */
															wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'car-repair-services' ), array( 'span' => array( 'class' => array() ) ) ),
															the_title( '<span class="screen-reader-text">"', '"</span>', false )
														) );
														wp_link_pages( array(
															'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'car-repair-services' ) . '</span>',
															'after'       => '</div></div>',
															'link_before' => '<span>',
															'link_after'  => '</span>',
															'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'car-repair-services' ) . ' </span>%',
															'separator'   => ', ',
														) );
	
												?>
											</div>
											<?php  car_repair_services_entry_footer() ?>
										</div>
									</div>
									<?php 
										
									echo '<div class="divider-line"></div>';
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
	
								endwhile; // End of the loop.
							?>
						
							<div id="postPreload"></div>
							<div class="divider divider-lg"></div>
						</div>
					</div>
					<?php get_sidebar();?>
				</div>
			</div>
		</div>
<?php
}
get_footer();