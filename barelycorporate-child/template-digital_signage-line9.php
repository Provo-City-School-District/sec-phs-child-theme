<?php
	/* Template Name: Digital Signage Line 9 */
?>
<head>
	<!-- This line auto refreshes the page content= in seconds till the refresh -->
	<meta http-equiv="refresh" content="3600">
	<!-- these lines tell the browser to not cache the content of this page -->
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<!-- simple styling to remove scroll bars -->
	<style>
		iframe, video, img {
			overflow: hidden !important;
		}
		.container {
		  position: relative;
		  overflow: hidden;
		  width: 100%;
		  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
		}

		/* Then style the iframe to fit in the container div with full height and width */
		.responsive-iframe {
		  position: absolute;
		  top: 0;
		  left: 0;
		  bottom: 0;
		  right: 0;
		  width: 100%;
		  height: 100%;
		}
	</style>
</head>
<?php
	wp_reset_query();
	$the_query = new WP_Query( array(
		'post_type' => 'digital_signage',          // name of post type.
		'tax_query' => array(
			array(
				'taxonomy' => 'digital_sign_location',   // taxonomy name
				'field' => 'term_id',           // term_id, slug or name
				'terms' => 111,                  // term id, term slug or term name
			)
		)
	) );
	if($the_query->have_posts()) :
		while ($the_query->have_posts()) : $the_query->the_post();

			if(get_field('google_media')) {
				$url = get_field('google_media');
				$url = str_replace('/pub?', '/embed?', $url)
				?>
					<iframe src="<?php echo $url ?>" class="responsive-iframe"></iframe>
				<?php
			} elseif (get_field('video')){
				?>
				<video src="<?php the_field('video'); ?>" width="3820" height="2140" autoplay loop></video>
				<?php
			} else {
				?>
				<img src="<?php the_field('image'); ?>" width="3820" height="2140" alt="" />
				<?php
			}
		endwhile;
	else :
		echo '<p>No Content Found</p>';
	endif;
	wp_reset_query();
?>
