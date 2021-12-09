<?php
/**
 * Template Name: Syllabus Page
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
						<div class="article-wrap">
							<article class="page type-page status-publish">
								<header class="entry-header">
									<h1><?php the_title(); ?></h1>
								</header>
								<h2>Course Description/Overview/Welcome Statement</h2>
				   					<?php the_field('course_description'); ?>
						   		<h2>Learning Expectations</h2>
						   			<?php the_field('learning_expectations'); ?>

						   		<h2>Assessment of Progress</h2>
						   			<?php the_field('assessment_of_progress'); ?>

						   		<h2>Course Materials</h2>
						   			<?php the_field('course_materials'); ?>

						   		<h2>Classroom Procedures</h2>
						   			<?php the_field('classroom_procedures'); ?>

						   		<h2>Calendar of Due Dates for Major Assignments</h2>
						   			<?php the_field('calendar_of_due'); ?>

						   		<h2>Progress Reports and Report Cards</h2>
						   			<?php the_field('progress_reports'); ?>

						   		<h2>Connecting Home to School</h2>
						   			<?php the_field('connecting_home_to_school'); ?>

						   		<h2>Personal Statement and other items (optional)</h2>
						   			<?php the_field('personal_statement_and_other_items'); ?>
					
					   		</article>
					   	</div>				
					</div><!-- .inner (end) -->
				</div><!-- #content (end) -->

				<!-- CONTENT (end) -->

				<?php get_sidebar( 'right' ); ?>

			</div><!-- .grid-protection (end) -->
		</div><!-- .sidebar_layout-inner (end) -->
	</div><!-- .#sidebar_layout (end) -->

<?php get_footer(); ?>