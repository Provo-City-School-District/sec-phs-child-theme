<?php
/**
 * Template Name: Teacher Page
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
										<aside class="syllabus">
											<h2>Syllabi</h2>
											<?php echo do_shortcode('[wpb_childpages]'); ?>
										</aside>
										<?php the_content(); ?>
										<div class="clear"></div>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . themeblvd_get_local('pages').': ', 'after' => '</div>' ) ); ?>
										<?php edit_post_link( themeblvd_get_local( 'edit_page' ), '<span class="edit-link">', '</span>' ); ?>
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