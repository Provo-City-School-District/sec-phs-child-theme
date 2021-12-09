<?php
/**
 * The template for displaying the footer.
 *
 * WARNING: This template file is a core part of the
 * Theme Blvd WordPress Framework. It is advised
 * that any edits to the way this file displays its
 * content be done with via hooks, filters, and
 * template parts.
 *
 * @author		Jason Bobich
 * @copyright	Copyright (c) Jason Bobich
 * @link		http://jasonbobich.com
 * @link		http://themeblvd.com
 * @package 	Theme Blvd WordPress Framework
 */

		// End main area
		themeblvd_main_bottom();
		themeblvd_main_end();

		// Featured area (below)
		if ( themeblvd_config( 'featured_below' ) ) {
			themeblvd_featured_below_start();
			themeblvd_featured_below();
			themeblvd_featured_below_end();
		}

		themeblvd_footer_before();
		?>

		<!-- FOOTER (start) -->

		<div id="bottom">
			<footer id="colophon" role="contentinfo">
				<div class="colophon-inner">
					<?php
					/**
					 * Display footer elements.
					 */
					themeblvd_footer_above();
					themeblvd_footer_content();
					themeblvd_footer_sub_content();
					themeblvd_footer_below();
					?>
				</div><!-- .content (end) -->
			</footer><!-- #colophon (end) -->
		</div><!-- #bottom (end) -->

		<!-- FOOTER (end) -->

		<?php themeblvd_footer_after(); ?>

	</div><!-- #container (end) -->
</div><!-- #wrapper (end) -->
<?php themeblvd_after(); ?>
<?php wp_footer(); ?>
<script type="text/javascript" src="//customer.cludo.com/scripts/bundles/search-script.min.js"></script>
		<script>
		var CludoSearch;
		(function () {
		    var cludoSettings = {
		        customerId: 10000352,
		        engineId: 10000520,
		        searchUrl: 'https://provohigh.provo.edu/search-results/',
		        language: 'en',
		        searchInputs: ['cludo-search-form'],
		        template: 'StandardInlineImages',
		        type: 'inline',
		        initFacets: { "Category": ["Provo High"] }
		    };
		CludoSearch= new Cludo(cludoSettings);
		CludoSearch.init();
		})();
		</script>
		<!--[if lte IE 9]>
		<script src="https://api.cludo.com/scripts/xdomain.js" slave="https://api.cludo.com/proxy.html" type="text/javascript"></script>
		<![endif]-->

</body>
</html>