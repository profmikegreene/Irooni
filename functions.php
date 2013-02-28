<?php
//////////////////////////////////////////
//General Wordpress functions
//////////////////////////////////////////

// Clean up the <head>
function removeHeadLinks() {
		remove_action('wp_head', 'rsd_link');
		remove_action('wp_head', 'wlwmanifest_link');
		remove_action('wp_head', 'wp_generator');
		remove_action('wp_head', 'feed_links', 2);
		remove_action('wp_head', 'index_rel_link');
		remove_action('wp_head', 'feed_links_extra', 3);
		remove_action('wp_head', 'start_post_rel_link', 10, 0);
		remove_action('wp_head', 'parent_post_rel_link', 10, 0);
		remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	}
	add_action('init', 'removeHeadLinks');
function removeAdminBarLinks() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'removeAdminBarLinks' );

if ( !current_user_can( 'edit_users' ) ) {
  add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
  add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');

function new_mail_from($old) {
 return 'webmaster@vccs.edu';
}
function new_mail_from_name($old) {
 return 'VCCS New Horizons Website';
}
function login_enqueue_scripts(){
	echo '<div class="background-cover"></div>';
			}
add_action( 'login_enqueue_scripts', 'login_enqueue_scripts' );

// Use your own external URL logo link
function wpc_url_login(){
	return "http://newhorizons.vccs.edu"; // your URL here
}
add_filter('login_headerurl', 'wpc_url_login');

//prevent bad login info from being displayed
add_filter('login_errors',create_function('$a', "return null;"));

if (function_exists('register_sidebar')) {
	register_sidebar( array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => __( 'These are widgets for the sidebar.','irooni' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar( array(
		'name' => 'Sidebar Promo',
		'id'   => 'sidebar-promo',
		'description'   => __( 'This is a promo for the site.','irooni' ),
		'before_widget' => '<aside id="%1$s" class="widget promo %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar( array(
	'name' => 'Homepage Twitter Conference Feed',
	'id'   => 'homepage-twitter-conf-feed',
	'description'   => __( 'This is the twitter hashtag for the site.','irooni' ),
	'before_widget' => '<aside id="%1$s" class="widget promo %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
	));
	register_sidebar( array(
	'name' => 'Homepage Photos',
	'id'   => 'homepage-photos',
	'description'   => __( 'These are conference photos for homepage.','irooni' ),
	'before_widget' => '<aside id="%1$s" class="widget promo %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
	));
	register_sidebar( array(
	'name' => 'Homepage Twitter Hashtag',
	'id'   => 'homepage-twitter-hashtag',
	'description'   => __( 'This is the twitter hashtag for the site.','irooni' ),
	'before_widget' => '<aside id="%1$s" class="widget promo %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
	));
}
add_action( 'init', 'register_sidebar' );

//Create sidebar nav menu
add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus( 
		array(
      'header-menu' => __( 'Header Menu' ),
      'sidebar-menu' => __( 'Sidebar Menu' )
    )
     );
}

add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

add_image_size( 'vendor-thumb', 150, 100 );
//////////////////////////////////////////
//Custom functions
//////////////////////////////////////////
// Load jQuery
function profmg_init() {
	if ( !is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script(
		'jquery',
		"http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js",
		false,
		'1.7.1',
		false);
		wp_enqueue_script('jquery');
	}
}
add_action ('init', 'profmg_init');

// function profmg_responsive_tables_js () {
// 	if ( is_page( 'session-grid' ) ){
// 		wp_register_script(
// 		'responsive-tables-js',
// 		get_template_directory_uri() . '/js/libs/responsive-tables.js',
// 		false,
// 		'1.0',
// 		true);
// 		wp_enqueue_script('responsive-tables-js');
// 	}
// }
// function profmg_responsive_tables_css () {
// 	if ( is_page( 'session-grid' ) ){
// 		wp_register_style(
// 				'responsive-tables-css',
// 				get_template_directory_uri() . '/css/responsive-tables.css',
// 				false,
// 				'1.0',
// 				'all');
// 				wp_enqueue_style('responsive-tables-css');
// 	}
// }
// add_action ('wp_enqueue_scripts', 'profmg_responsive_tables_js' );
// add_action ('wp_enqueue_scripts', 'profmg_responsive_tables_css' );



function profmg_breadcrumb() {
	if (!is_home()) {
	echo '<ul class="breadcrumbs">';
	echo '<li><a href="/">Home</a><span>\<span></li>', '<li><a href="',get_option('home'), '">';
	$siteName = str_replace( 'New Horizons ', 'NH', get_bloginfo('name') );
	$siteName = str_replace( '20', '', $siteName );
	echo $siteName;
	echo '</a><span>\<span></li>';
	
	if ( is_singular('post')) {
		echo '<li><a href="',get_option('home'), '/posts">Posts</a><span>\<span></li>', '<li><a class="current">', the_title(), '</a></li>';
	}
	elseif ( is_singular('sessions') ) {
		echo '<li><a href="',get_option('home'), '/sessions">Sessions</a><span>\<span></li>', '<li><a class="current">', the_title(), '</a></li>';
	}
	elseif (is_post_type_archive('sessions') )  {
		global $post;
		echo '<li><a class="current">', post_type_archive_title(), '</a></li>';
	}
	elseif (  is_tag() || is_category() ){
		echo '<li><a class="current">', single_term_title(), '</a></li>';
	}
	elseif (is_page()) {
	global $post;
	$parent = get_page($post->post_parent);
	$parentlink = get_permalink($parent->ID);
	$grandparent = get_page($parent->post_parent);
	$grandparentlink = get_permalink($grandparent->ID);
	
	if ($grandparent->ID != $post->ID) { //for pages 2 levels deep
		echo '<li><a href="'.$grandparentlink.'">'.$grandparent->post_title.'</a><span>\<span></li>';
		echo '<li><a href="'.$parentlink.'">'.$parent->post_title.'</a><span>\<span></li>';	
	}
	elseif ($parent->ID != $post->ID){ //for pages 1 level deep
		echo '<li><a href="'.$parentlink.'">'.$parent->post_title.'</a><span>\<span></li>';
	}
		
	echo '<li><a class="current">', the_title(), '</a></li>'; 
		
	}
	else {
		echo '<li>', bloginfo('name'), '<span>\<span></li>';
	}
}
else {echo '<li><a href="/">Home</a><span>\<span></li>', '<li><a href="',get_option('home'),'">', bloginfo('name'), '</a><span>\<span></li><li><a class="current">Posts</a></li>';}
echo '</ul>';
}
function profmg_get_slug() {
	global $wp_query;
	$postid = $wp_query->post->ID;
	$post_data = get_post($postid, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}
// custom admin login logo
function custom_login_logo() {
	echo '<link rel="stylesheet" href="/wp-content/themes/Irooni/css/wp-admin.css">';
}
add_action('login_head', 'custom_login_logo');

// add a favicon for your admin
function admin_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.ico" />';
}
add_action('admin_head', 'admin_favicon');

function customAdmin() {
    $url = get_settings('siteurl');
    $url = $url . '/wp-content/themes/Irooni/css/wp-admin.css';
    echo '<!-- custom admin css -->
          <link rel="stylesheet" type="text/css" href="' . $url . '" />
          <!-- /end custom adming css -->';
}
add_action('admin_head', 'customAdmin');

/* ==================================================================
*
*   homepage tag cloud
*
* -----------------------------------------------------------------*/
function profmg_tag_text_callback () {
	 return sprintf( _n('%s session', '%s sessions', $count), number_format_i18n( $count ) );
}

function profmg_tag_cloud( $args = '' ) {
	$defaults = array(
		'smallest' => 8, 'largest' => 22, 'unit' => 'pt', 'number' => 45,
		'format' => 'flat', 'separator' => "\n", 'orderby' => 'name', 'order' => 'ASC',
		'exclude' => '', 'include' => '', 'link' => 'view', 'taxonomy' => 'post_tag', 'echo' => true
	);
	$args = wp_parse_args( $args, $defaults );

	$tags = get_terms( $args['taxonomy'], array_merge( $args, array( 'orderby' => 'count', 'order' => 'DESC' ) ) ); // Always query top tags

	if ( empty( $tags ) || is_wp_error( $tags ) )
		return;

	foreach ( $tags as $key => $tag ) {
		if ( 'edit' == $args['link'] )
			$link = get_edit_tag_link( $tag->term_id, $tag->taxonomy );
		else
			$oldlink = get_term_link( intval($tag->term_id), $tag->taxonomy );
			$link = preg_replace('/blog/', '', $oldlink);
		if ( is_wp_error( $link ) )
			return false;

		$tags[ $key ]->link = $link;
		$tags[ $key ]->id = $tag->term_id;
	}

	$return = wp_generate_tag_cloud( $tags, $args ); // Here's where those top tags get sorted according to $args

	$return = apply_filters( 'wp_tag_cloud', $return, $args );

	if ( 'array' == $args['format'] || empty($args['echo']) )
		return $return;

	echo $return;
}
/* ==================================================================
*
*   Custom Post Type - Sessions
*
* -----------------------------------------------------------------*/
include "inc/custom-post-type-sessions.php";
?>