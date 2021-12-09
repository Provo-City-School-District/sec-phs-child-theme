<?php
/**
 * Template Name: Tiles
 */

get_header();
?>

	<div id="sidebar_layout" class="clearfix">
		<div class="sidebar_layout-inner">
			<div class="row grid-protection">

				<?php get_sidebar( 'left' ); ?>

				<!-- CONTENT (start) -->

				<div id="content" class="<?php echo themeblvd_get_column_class('content'); ?> clearfix" role="main">
					<div class="inner">
						<?php themeblvd_content_top(); ?>

						<?php while ( have_posts() ) : the_post(); ?>

								<div class="article-wrap">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php if( 'hide' != get_post_meta( get_the_id(), '_tb_title', true ) ) : ?>
										<header class="entry-header">
											<h1 class="entry-title"><?php the_title(); ?></h1>
										</header><!-- .entry-header -->
									<?php endif; ?>
									<div class="entry-content">
										
										<?php the_content(); ?>
										<div class="clear"></div>
											<section class="tiles-container">
									   			<?php if(get_field('square_1')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_1_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_1'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_2')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_2_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_2'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_3')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_3_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_3'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_4')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_4_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_4'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_5')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_5_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_5'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_6')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_6_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_6'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_7')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_7_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_7'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_8')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_8_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_8'); ?>
										   			</aside>
									   			<?php }	
									   			if(get_field('square_9')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_9_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_9'); ?>
										   			</aside>
									   			<?php }	
									   			 if(get_field('square_10')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_10_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_10'); ?>
										   			</aside>
									   			<?php }	
									   			 if(get_field('square_11')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_11_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_11'); ?>
										   			</aside>
									   			<?php }	 
										   			if(get_field('square_12')) { ?>
										   			<aside class="tile">
										   				<div class="featured-image">
										   						<img src="<?php the_field('square_12_photo'); ?>" alt="" />
										   				</div>
											   				<?php the_field('square_12'); ?>
										   			</aside>
									   			<?php }	?>
									   		</section><!-- tiles-container end -->
										<?php //wp_link_pages( array( 'before' => '<div class="page-link">' . themeblvd_get_local('pages').': ', 'after' => '</div>' ) ); ?>
										<?php //edit_post_link( themeblvd_get_local( 'edit_page' ), '<span class="edit-link">', '</span>' ); ?>
									</div><!-- .entry-content -->
								</article><!-- #post-<?php the_ID(); ?> -->
							</div><!-- .article-wrap (end) -->

							<?php themeblvd_page_footer(); ?>

							<?php if ( themeblvd_supports( 'comments', 'pages' ) ) : ?>
								<?php comments_template( '', true ); ?>
							<?php endif; ?>

						<?php endwhile; ?>

						<?php themeblvd_content_bottom(); ?>
					</div><!-- .inner (end) -->
				</div><!-- #content (end) -->

				<!-- CONTENT (end) -->

				<?php get_sidebar( 'right' ); ?>

			</div><!-- .grid-protection (end) -->
		</div><!-- .sidebar_layout-inner (end) -->
	</div><!-- .#sidebar_layout (end) -->

<?php get_footer(); ?>