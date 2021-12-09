<?php
/*-------------------------------------------------------*/
/* Run Theme Blvd framework (required)
/*-------------------------------------------------------*/
require_once( get_template_directory() . '/framework/themeblvd.php' );
/*-------------------------------------------------------*/
/* Start Child Theme
/*-------------------------------------------------------*/
add_action('wp_logout','go_home');
function go_home(){
  wp_redirect( "https://provohigh.provo.edu" );
  exit();
}
// Your actions and filters go here ...
function my_module_caps( $module_caps ) {
	 // Slider Manager
    $module_caps['sliders'] = 'edit_sliders';
    return $module_caps;
	}
add_filter( 'themeblvd_admin_module_caps', 'my_module_caps' );
//Remove the text color selector
function myplugin_tinymce_buttons($buttons)
 {
	//Remove the text color selector
	$remove = array('forecolor');

	return array_diff($buttons,$remove);
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');
/*-------------------------------------------------------*/
/* shortcode to list child pages [wpb_childpages]
/*-------------------------------------------------------*/

function wpb_list_child_pages() { 
global $post; 
if ( is_page() && $post->post_parent )
	//$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
//else
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
if ( $childpages ) {
	$string = '<ul>' . $childpages . '</ul>';
}
return $string;
}
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//================================Display Modified Date on Dashboard for Posts===================================

// Register Modified Date Column for both posts & pages
function modified_column_register( $columns ) {
	$columns['Modified'] = __( 'Modified Date', 'show_modified_date_in_admin_lists' );
	return $columns;
}
add_filter( 'manage_posts_columns', 'modified_column_register' );
add_filter( 'manage_pages_columns', 'modified_column_register' );

function modified_column_display( $column_name, $post_id ) {
	switch ( $column_name ) {
	case 'Modified':
		global $post; 
	       	echo '<p class="mod-date">';
	       	echo '<em>'.get_the_modified_date().' '.get_the_modified_time().'</em><br />';
			echo '<small>' . esc_html__( 'by ', 'show_modified_date_in_admin_lists' ) . '<strong>'.get_the_modified_author().'<strong></small>';
			echo '</p>';
		break; // end all case breaks
	}
}
add_action( 'manage_posts_custom_column', 'modified_column_display', 10, 2 );
add_action( 'manage_pages_custom_column', 'modified_column_display', 10, 2 );

function modified_column_register_sortable( $columns ) {
	$columns['Modified'] = 'modified';
	return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'modified_column_register_sortable' );
add_filter( 'manage_edit-page_sortable_columns', 'modified_column_register_sortable' );
 /*==========================================================================================
 Editor Changes
 ============================================================================================*/
 //turn on paste_as_text by default
 function change_paste_as_text($mceInit, $editor_id){
 	//NB this has no effect on the browser's right-click context menu's paste!
 	$mceInit['paste_as_text'] = true;
 	return $mceInit;
 }
 add_filter('tiny_mce_before_init', 'change_paste_as_text', 1, 2);
/*-------------------------------------------------------*/
/* Shortcode for Legacy Calendar [legacy_calendar]
/*-------------------------------------------------------*/

function google_legacy_calendar() { 
	echo '<iframe src="https://calendar.google.com/calendar/embed?height=800&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=America%2FDenver&amp;src=cGhzcHVwc0BnbWFpbC5jb20&amp;color=%237986CB" style="border-width:0" width="900" height="800" frameborder="0" scrolling="no"></iframe>';
}
add_shortcode('legacy_calendar', 'google_legacy_calendar');
/*-------------------------------------------------------*/
/* Shortcode to list child pages for menu pages
	[list_child_pages_menu_item]
/*-------------------------------------------------------*/
function list_child_pages_menu_item() {
	?>
		<ul>
		<?php
			global $id;
			wp_list_pages( array(
				'title_li'    => '',
				'child_of'    => $id,
				'show_date'   => 'modified',
				'date_format' => $date_format
			) );
		?>
		</ul>
	<?php
}
add_shortcode( 'list_child_pages_menu_item', 'list_child_pages_menu_item' );
/*-------------------------------------------------------*/
/* Global ADA blurb
	[ada_blurb]
/*-------------------------------------------------------*/

function ada_blurb() {
		// create a new cURL resource
		$globalfooter = curl_init();
		// set URL and other appropriate options
		curl_setopt($globalfooter, CURLOPT_URL, 'https://globalassets.provo.edu/globalpages/ada-footer.php');
		curl_setopt($globalfooter, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		echo '<h3 class="widget-title">Equal Opportunity Statement</h3>';
		curl_exec($globalfooter);
		// close cURL resource, and free up system resources
		curl_close($globalfooter);
}
add_shortcode( 'ada_blurb', 'ada_blurb' );

/*-------------------------------------------------------*/
/* Add Length Column to the Wordpress Dashboard
/*-------------------------------------------------------*/
//For Posts

	//Add the Length column, next to the Title column:

add_filter('manage_post_posts_columns', function ( $columns ) 
{
    $_columns = [];

    foreach( (array) $columns as $key => $label )
    {
        $_columns[$key] = $label; 
        if( 'title' === $key )
            $_columns['wpse_post_content_length'] = __( 'Length' );     
    }
    return $_columns;
} );

	//Fill that column with the post content length values:

add_action( 'manage_post_posts_custom_column', function ( $column_name, $post_id ) 
{
    if ( $column_name == 'wpse_post_content_length')
        echo mb_strlen( get_post( $post_id )->post_content );

}, 10, 2 );

	//Make our Length column orderable:

add_filter( 'manage_edit-post_sortable_columns', function ( $columns ) 
{
  $columns['wpse_post_content_length'] = 'wpse_post_content_length';
  return $columns;
} );
	//Finally we implement the ordering through the posts_orderby filter:

add_filter( 'posts_orderby', function( $orderby, \WP_Query $q )
{
    $_orderby = $q->get( 'orderby' );
    $_order   = $q->get( 'order' );

    if( 
           is_admin() 
        && $q->is_main_query() 
        && 'wpse_post_content_length' === $_orderby 
        && in_array( strtolower( $_order ), [ 'asc', 'desc' ] )
    ) {
        global $wpdb;
        $orderby = " LENGTH( {$wpdb->posts}.post_content ) " . $_order . " ";
    }
    return $orderby;
}, 10, 2 );

//For Pages

	//Add the Length column, next to the Title column:

add_filter('manage_page_posts_columns', function ( $columns ) 
{
    $_columns = [];

    foreach( (array) $columns as $key => $label )
    {
        $_columns[$key] = $label; 
        if( 'title' === $key )
            $_columns['wpse_post_content_length'] = __( 'Length' );     
    }
    return $_columns;
} );

	//Fill that column with the post content length values:

add_action( 'manage_page_posts_custom_column', function ( $column_name, $post_id ) 
{
    if ( $column_name == 'wpse_post_content_length')
        echo mb_strlen( get_post( $post_id )->post_content );

}, 10, 2 );

	//Make our Length column orderable:

add_filter( 'manage_edit-page_sortable_columns', function ( $columns ) 
{
  $columns['wpse_post_content_length'] = 'wpse_post_content_length';
  return $columns;
} );
	//Finally we implement the ordering through the posts_orderby filter:

add_filter( 'posts_orderby', function( $orderby, \WP_Query $q )
{
    $_orderby = $q->get( 'orderby' );
    $_order   = $q->get( 'order' );

    if( 
           is_admin() 
        && $q->is_main_query() 
        && 'wpse_post_content_length' === $_orderby 
        && in_array( strtolower( $_order ), [ 'asc', 'desc' ] )
    ) {
        global $wpdb;
        $orderby = " LENGTH( {$wpdb->posts}.post_content ) " . $_order . " ";
    }
    return $orderby;
}, 10, 2 );
//Notes

//If you want to target other post types, than we just have to modify the
//manage_post_posts_columns         -> manage_{POST_TYPE}_posts_columns
//manage_post_posts_custom_column   -> manage_{POST_TYPE}_posts_custom_column
//manage_edit-post_sortable_columns -> manage_edit-{POST_TYPE}_sortable_columns
//where POST_TYPE is the wanted post type.

//[directory url=""]
function directory_func($atts) {
	$category = shortcode_atts( array(
		'url' => 'something',
		//'bar' => 'something else',
	), $atts );
	$directory_url = "{$category['url']}";
	return file_get_contents($directory_url);
}
add_shortcode( 'directory', 'directory_func' );