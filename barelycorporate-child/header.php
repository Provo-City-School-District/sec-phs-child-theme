<?php
/**
 * The Header for our theme.
 *
 * WARNING: This template file is a core part of the
 * Theme Blvd WordPress Framework. It is advised
 * that any edits to the way this file displays its
 * content be done with via hooks, filters, and
 * template parts.
 *
 * @author		Jason Bobich
 * @copyright	Copyright (c) Jason Bobich
 * @package 	Theme Blvd WordPress Framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-35123419-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		
		  gtag('config', 'UA-35123419-1');
		</script>
		
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/framework/assets/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
if (has_post_thumbnail()) {
?>
<meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>" />	
<?php
} else {
?>
<meta property="og:image" content="https://provohigh.provo.edu/wp-content/uploads/2018/08/phs-slider.jpg" />
<?php
}
?>
<?php wp_head(); ?>
<link rel="shortcut icon" href="https://provohigh.provo.edu/wp-content/img/favicon.ico" />
 <script src="https://provohigh.provo.edu/wp-content/themes/barelycorporate-child/scripts.js" type="text/javascript"></script>
<?php //athletics redirect
	if( is_page('662')) { ?>
		<meta http-equiv="refresh" content="5;url=https://provobulldogathletics.com">
<?php } ?>
</head>
<body <?php body_class(); ?>>
<?php themeblvd_before(); ?>
<div id="wrapper">
	<div id="container">

		<?php themeblvd_header_before(); ?>

		<!-- HEADER (start) -->

		<div id="top">
			<header id="branding" role="banner">
				<div class="content">
					<?php
					/**
					 * Display header elements.
					 */
					themeblvd_header_top();
					themeblvd_header_above();
					themeblvd_header_content();
					themeblvd_header_menu();
					?>
				</div><!-- .content (end) -->
			</header><!-- #branding (end) -->
		</div><!-- #top (end) -->
		<?php
			//checks for the counseling/scholorship page or a child of that page and then changes the fax number to give the counseling office specific fax number.
			if( is_page(430) || 430 == $post->post_parent) { ?>
				<p class="contactinfo">1199 N. Lakeshore Dr. Provo, Utah 84601 <span><strong>Phone:</strong> (801)-373 6550 <strong>Counseling Fax:</strong> (801) 370-4617</span></p>
			<?php	
			} else { ?>
				<p class="contactinfo">1199 N. Lakeshore Dr. Provo, Utah 84601 <span><strong>Phone:</strong> (801)-373 6550 <strong>Fax:</strong> (801) 374-4880</span></p>	
			<?php	
			}
		?>
		
		<!-- HEADER (end) -->

		<?php
		// After header
		themeblvd_header_after();

		// Featured area (above)
		if ( themeblvd_config( 'featured' ) ) {
			themeblvd_featured_start();
			themeblvd_featured();
			themeblvd_featured_end();
		}

		// Start main area
		themeblvd_main_start();
		themeblvd_main_top();

		// Breadcrumbs
		themeblvd_breadcrumbs();

		// Before sidebar+content layout
		themeblvd_before_layout();
