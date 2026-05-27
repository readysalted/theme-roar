<?php
// ---- Disable editor ---- //
add_filter('use_block_editor_for_post', '__return_false');

// ---- Content Width ---- //
if ( ! isset( $content_width ) )
$content_width = 1000;


// --------------------------------------------------------------------------------------------------------------------------//
// --------------------------------- Change Footer link to go to TVW and remove WP link  ------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

function remove_footer_admin () { echo '<span id="footer-thankyou">Developed by <a href="http://www.teamvalleyweb.co.uk" target="_blank">Team Valley Web</a></span>'; } 
add_filter('admin_footer_text', 'remove_footer_admin');


// --------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------- Add Welcome message to Dashboard  ----------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

add_action('wp_dashboard_setup', 'tvwthemebase_dashboard_widgets');
 
function tvwthemebase_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Welcome to your Dashboard', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p> Welcome to your dashboard, to start editing your site use the menu on the left.</p><p> If you get stuck or wish to report an issue with your site please email info@teamvalleyweb.co.uk</p>';
}

// --------------------------------------------------------------------------------------------------------------------------//
// ------------------------------------------------------ Basic Customisation -----------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

// ------------- Custom Menus
// Useage =   <?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ? >

function register_tvwthemebase_menus() {
  register_nav_menus(
    array(
      'top-menu' => __( 'Main Menu' ),
      'service-menu' => __( 'Service Menu' ),
      'sectors-menu' => __( 'Sectors Menu' ),
      'footer-menu-1' => __( 'Footer Menu 1' ),
      'footer-menu-2' => __( 'Footer Menu 2' ),
      'footer-menu-3' => __( 'Footer Menu 3' ),
      'mobile-menu' => __( 'Mobile Menu' ),
      'legal-menu' => __( 'Legal Menu' ),
    )
  );
}
add_action( 'init', 'register_tvwthemebase_menus' );

// ------- Default Image sizes

update_option( 'thumbnail_size_w', 300 );
update_option( 'thumbnail_size_h', 300 );

update_option( 'medium_size_w', 600 );
update_option( 'medium_size_h', 600 );

update_option( 'large_size_w', 1200 );
update_option( 'large_size_h', 768 );

// ------------- Featured Images 
// Useage =   <?php the_post_thumbnail('gallery-img'); ? >

add_theme_support( 'post-thumbnails' );
add_image_size( 'image-slider', 300, 300, array( 'center', 'center' ) );
add_image_size( 'standard-horizontal', 783, 586, array( 'center', 'center' ) );
add_image_size( 'large-horizontal', 1932, 1086, array( 'center', 'center' ) );
add_image_size( 'large-portrait', 918, 1580, array( 'center', 'center' ) );
add_image_size( 'standard-square', 768, 768, array( 'center', 'center' ) ); 
add_image_size( 'large-square', 942, 942, array( 'center', 'center' ) ); 

//add_image_size( 'full-width-blog', 960, 540, array( 'center', 'center' ) ); 
//add_image_size( 'case-single', 900, 610, array( 'center', 'center' ) ); 
//add_image_size( 'three-two', 768, 512, array( 'center', 'center' ) ); 
//add_image_size( 'four-three', 768, 577, array( 'center', 'center' ) );
//add_image_size( 'four-threeeight', 768, 730, array( 'center', 'center' ) );


// ------------- Remove medium-large image
function shapeSpace_customize_image_sizes($sizes) {
	unset($sizes['medium_large']); // 768px
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'shapeSpace_customize_image_sizes');



////-------------- Disable SrcSet on images

function disable_wp_responsive_images() {
	return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');



// ------------- Widget Area
// Useage =  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-1') ) :  endif; ? >

/* function tvwthemebase_widgets_init() {
    
    register_sidebar( array(
        'name' => 'Sidebar',
        'id' => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'tvwthemebase_widgets_init' );
*/

// ------------- Set default image link type to none
function tvwthemebase_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'tvwthemebase_imagelink_setup', 10);


// ------------- Set default gallery link type to Media file
function tvwthemebase_gallery_default_type_set_link( $settings ) {
    $settings['galleryDefaults']['link'] = 'file';
    return $settings;
}
add_filter( 'media_view_settings', 'tvwthemebase_gallery_default_type_set_link');




// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------------------- Lazy Loading Function  ----------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

function filter_lazyload($content) {
    return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'preg_lazyload', $content);
}
add_filter('the_content', 'filter_lazyload');
add_filter( 'post_gallery', 'filter_lazyload', 10, 3 );

function preg_lazyload($img_match) {
 
    $img_replace = $img_match[1] . 'src="' . get_stylesheet_directory_uri() . '/assets/images/loading.png" data-src' . substr($img_match[2], 3) . $img_match[3];
 
    $img_replace = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $img_replace);
 
    $img_replace .= '<noscript>' . $img_match[0] . '</noscript>';
    return $img_replace;
}


// --------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------------- Messing with Excerpt Length  ---------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//


// -------------Excerpt Length
function custom_excerpt_length( $length ) {
  return 17;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 ); 

// -------------Excerpt remove more [...]
function new_excerpt_more( $more ) {
  return ' ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// -------------Read More Excerpt 
function excerpt_read_more_link($output) {
 global $post;
 return $output . '<a href="'. get_permalink($post->ID) . '" class="readmore"> Read More  &raquo;</a>';
}
add_filter('the_excerpt', 'excerpt_read_more_link');  

// ------------- Trim excerpt by words
function string_limit_words($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}


// --------------------------------------------------------------------------------------------------------------------------//
// ----------------------------------------- Extending the Conditional Function ---------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

// ------------- Check if page is Child 
// Useage =   <?php if ( is_child( '10' )) { Do something }  ? >
/*
function is_child($pageID) { 
	global $post; 
	if( is_page() && ($post->post_parent==$pageID) ) {
               return true;
	} else { 
               return false; 
	}
}

// -------------  Page Tree
// Useage =   	<?php if ( is_tree( '90' ) ) { Do something } ? >

function is_tree($pid) {
	global $post;
	$ancestors = get_post_ancestors($post->$pid);
	$root = count($ancestors) - 1;
	$parent = $ancestors[$root];
	if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors))) {
		return true;
	} else {
		return false;
	}
}
*/

// --------------------------------------------------------------------------------------------------------------------------//
// ----------------------------- Custom Scripting to Move JavaScript from the Head to the Footer ----------------------------//
// --------------------------------------------------------------------------------------------------------------------------//


function tvwthemebase_scripts() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/assets/js/main.min.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'tvwthemebase_scripts' );



function remove_head_scripts() {
    global $post;
    
    
    wp_dequeue_style('select2');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style');
    wp_deregister_script('regenerator-runtime');
    wp_deregister_script('wp-mediaelement');
    wp_deregister_style('wp-mediaelement');


    remove_action('wp_head', 'wp_print_scripts'); 
    remove_action('wp_head', 'wp_print_head_scripts', 9); 
    remove_action('wp_head', 'wp_enqueue_scripts', 1);

    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5); 
    

} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );


function tvw_wpcf7_recaptcha_fix()
{
    if (!is_admin()) {
        global $wp_scripts;
        foreach ($wp_scripts->registered as $key => $item) {
            if ($key === 'wpcf7-recaptcha') {
                $item->deps = array_diff($item->deps, ['wp-polyfill']);
                $wp_scripts->registered[$key] = $item;
            }
        }
    }
}

add_action('wp_enqueue_scripts', 'tvw_wpcf7_recaptcha_fix', PHP_INT_MAX);



// --------------------------------------------------------------------------------------------------------------------------//
// ------------------------------------------ Deregister Plugin Scripts & Styling -------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//


// -------------Remove Contact Form 7 Styles
function deregister_wpcf7_styles() {
	wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_print_styles', 'deregister_wpcf7_styles', 100 );




// ------------------- Remove default Gallery style

add_filter( 'use_default_gallery_style', '__return_false' );

//-------- Remove Emoji Script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// --------------------------------------------------------------------------------------------------------------------------//
// ------------------------------------------ Disable Comments within WP  ---------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

require get_template_directory() . '/assets/inc/disable-comments.php';

add_action( 'admin_init', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

function my_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );



// --------------------------------------------------------------------------------------------------------------------------//
// ------------------------------------- Remove Some of the Default Wordpress Things  ---------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

// ------------- Remove  Version Number from Header
function tvwthemebase_remove_version() {
    return '';
}
add_filter('the_generator', 'tvwthemebase_remove_version');


// -------------  Remove excess classes from menus, but keep the current classes
  function wp_nav_menu_remove($var) {
     return is_array($var) ? array_intersect($var, array('current-menu-item', 'current-menu-parent', 'current_page_item')) : '';
  }
  //add_filter('page_css_class', 'wp_nav_menu_remove', 100, 1);
  //add_filter('nav_menu_item_id', 'wp_nav_menu_remove', 100, 1);
  //add_filter('nav_menu_css_class', 'wp_nav_menu_remove', 100, 1);


// ------------- Remove IDs from custom menu items
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
	function clear_nav_menu_item_id($id, $item, $args) {
   	return "";
}

// ------------- Stop images from having p tags
function filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// ------------- Remove excess header mess
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'wlwmanifest_link');

// ------------- Force Dashboard one column
function tvwthemebase_dashboard_columns() {
    add_screen_option(
        'layout_columns',
        array(
            'max'     => 2,
            'default' => 1
        )
    );
}
add_action( 'admin_head-index.php', 'tvwthemebase_dashboard_columns' );

// ------------- Remove all the dashboard boxes

function tvwthemebase_remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'tvwthemebase_remove_dashboard_meta' );
remove_action('welcome_panel', 'wp_welcome_panel');


// Remove Yoast SEO Dashboard Widget
function remove_wpseo_dashboard_overview() {
remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
}
add_action('wp_dashboard_setup', 'remove_wpseo_dashboard_overview' );

// IMG TAG
add_filter('wp_img_tag_add_auto_sizes', '__return_false');

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------------------- Load WP Dashicons   -------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

// https://developer.wordpress.org/resource/dashicons/ 

add_action( 'wp_enqueue_scripts', 'tvwthemebase_load_dashicons' );
function tvwthemebase_load_dashicons() {
    wp_enqueue_style( 'dashicons' );
}

// --------------------------------------------------------------------------------------------------------------------------//
// -------------------------------------------  Styling Login  --------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

// ------------- Custom admin logo
// logo should be no bigger than 80px*80px

function tvwthemebase_login_logo() {
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_bloginfo('template_directory') . '/assets/images/admin-logo.png)  !important; } </style>';
}
add_action('login_head',  'tvwthemebase_login_logo');


// ------------- Set link back to website instead of Wordpress

function tvwthemebase_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'tvwthemebase_login_logo_url' );


// ------------- Set title for link

function tvwthemebase_login_logo_url_title() {
    return 'Go back to website';
}
add_filter( 'login_headertitle', 'tvwthemebase_login_logo_url_title' );


// ------------- Remove WP logo from admin bar

function tvwthemebase_admin_bar_remove() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
}
add_action('wp_before_admin_bar_render', 'tvwthemebase_admin_bar_remove', 0);




// --------------------------------------------------------------------------------------------------------------------------//
// -----------------------------------------  Fancybox Group Items ----------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

add_filter( 'post_gallery', 'wpse_gallery_shortcode', 10, 3 );

function wpse_gallery_shortcode( $output, $attr, $instance ) {
    remove_filter( 'post_gallery', 'wpse_gallery_shortcode', 10, 3 );
    $gallery_html = gallery_shortcode( $attr );
    $dom = new \DOMDocument();
    $libxml_previous_state = libxml_use_internal_errors( true );
    $dom->loadHTML( mb_convert_encoding( $gallery_html, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    libxml_use_internal_errors( $libxml_previous_state );
    $xpath = new \DOMXpath( $dom );
    $gallery_icons = $xpath->query( "//*[contains(concat(' ', normalize-space(@class), ' '), ' gallery-icon ')]" );

    // Iterate over the the gallery icons.
    foreach ( $gallery_icons as $gallery_icon ) {
        $gallery_icon_child_node_link = $xpath->query( "//a", $gallery_icon );
        foreach ( $gallery_icon_child_node_link as $node_link ) {
            $gallery_icon_data_fancy_box = $dom->createAttribute( 'data-fancybox' );
            $gallery_icon_data_fancy_box->value = 'group';

            $node_link->appendChild( $gallery_icon_data_fancy_box );                
        }
    }
    $gallery_html = $dom->saveHTML();   
    add_filter( 'post_gallery', 'wpse_gallery_shortcode', 10, 3 );
    return $gallery_html;
}



// --------------------------------------------------------------------------------------------------------------------------//
// -------------------------------  Hide ACF menu item from the admin menu  -------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//
function remove_acf_menu()
{
    // provide a list of usernames who can edit custom field definitions here
    $admins = array( 
        'teamvalleyweb',
    );
    $current_user = wp_get_current_user();
    if( !in_array( $current_user->user_login, $admins ) )
    {
        remove_menu_page('edit.php?post_type=acf-field-group');
        remove_submenu_page('themes.php', 'themes.php');
    }
}
add_action( 'admin_menu', 'remove_acf_menu', 999 );

add_filter('acf/settings/show_admin', 'my_acf_show_admin');
function my_acf_show_admin( $show ) {
    $admins = array( 
        'teamvalleyweb',
    );
    $current_user = wp_get_current_user();
    if( in_array( $current_user->user_login, $admins ) )
    {
         return current_user_can('manage_options');
    }   
};

function my_acf_settings_capability( $path ) {
 $admins = array( 
        'teamvalleyweb',
    );
    $current_user = wp_get_current_user();
    if( in_array( $current_user->user_login, $admins ) )
    {
    return 'administrator';
    }

}
add_filter('acf/settings/capability', 'my_acf_settings_capability');


// ----------------- Allow editors to mess with menus 
function add_theme_caps(){
    global $pagenow;
      // gets the author role
      $role = get_role('editor');
      $role->add_cap('edit_theme_options');
}
add_action( 'admin_head', 'add_theme_caps' );

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  Options Pages  ------------------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'menu_title'	=> 'Website Settings',
		'menu_slug' 	=> 'theme-general-settings'
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Company Details',
		'menu_title'	=> 'Company Details',
		'parent_slug'	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header Banner',
        'menu_title'    => 'Header Banner',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Hero Content',
        'menu_title'    => 'Hero Content',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Rating text',
        'menu_title'    => 'Rating text',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Brand Slider',
        'menu_title'    => 'Brand Slider',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Testimonials',
        'menu_title'    => 'Testimonials',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Generic CTA',
        'menu_title'    => 'Generic CTA',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer Content',
        'menu_title'    => 'Footer Content',
        'parent_slug'   => 'theme-general-settings',
    ));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media Links',
		'menu_title'	=> 'Social Media Links',
		'parent_slug'	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
		'page_title' 	=> 'Analytics Code',
		'menu_title'	=> 'Analytics Code',
		'parent_slug'	=> 'theme-general-settings',
	));  
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Cookies Popup',
		'menu_title'	=> 'Cookies Popup',
		'parent_slug'	=> 'theme-general-settings',
	));  
}


function wpb_mce_buttons_2($buttons) {
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

    // Define the style_formats array

    $style_formats = array(  
        /*
        * Each array child is a format with it's own settings
        * Notice that each array has title, block, classes, and wrapper arguments
        * Title is the label which will be visible in Formats menu
        * Block defines whether it is a span, div, selector, or inline style
        * Classes allows you to define CSS classes
        * Wrapper whether or not to add a new block-level element around any selected elements
        */
        array(  
            'title' => 'Large Heading',  
            'block' => 'span',  
            'classes' => 'intro-heading',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Medium Heading',  
            'block' => 'span',  
            'classes' => 'medium-heading',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Small Heading',  
            'block' => 'span',  
            'classes' => 'the-small-heading',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Credit Heading',  
            'block' => 'span',  
            'classes' => 'small-heading',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Button',  
            'block' => 'span',  
            'classes' => 'content-btn',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Alt Button',  
            'block' => 'span',  
            'classes' => 'content-alt-btn',
            'wrapper' => true,
        ),
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

// shove YOAST settings panel in editor to bottom
add_filter('wpseo_metabox_prio', function () {
    return 'low';
});

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  Google API Key  ------------------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

add_filter('acf/settings/google_api_key', function () {
    return get_field( "contact_google_maps_api_key", "options" );
});

// AIzaSyBSAxo-3g8QpiS1-VKMdpP0o6YKEpJTS8Y&

add_filter('wpcf7_autop_or_not', '__return_false');

function formatSizeUnits($bytes)
{
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }
        return $bytes;
}

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  REMOVE HEALTH  ------------------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

add_action( 'wp_dashboard_setup', 'remove_site_health_widget' );
function remove_site_health_widget() {
        global $wp_meta_boxes;
        unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health'] );
}

add_action( 'admin_menu', 'remove_site_health_submenu', 999 );
function remove_site_health_submenu() {
        $page = remove_submenu_page( 'tools.php', 'site-health.php' );
}

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  READING TIME ------------------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

//READING TIME
function get_reading_time() {
    $post_content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $post_content ) );
    $reading_time = ceil( $word_count / 200 ); // Average 200 WPM

    return $reading_time . ' minute read'; 
}

add_filter( 'wp_speculation_rules_configuration', '__return_null' ); 

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  Populate Resource form --------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

add_action('wp_enqueue_scripts', function() {
    if (is_singular('resource')) { // Optional: Replace with specific conditional if needed
        global $post;
        $acf_download_url = get_field('download_file', $post->ID);

        wp_enqueue_script('populate-hidden-field', get_template_directory_uri() . '/assets/js/populate-hidden.js', ['jquery'], null, true);
        wp_localize_script('populate-hidden-field', 'acfVars', [
            'downloadUrl' => esc_url($acf_download_url)
        ]);
    }
});

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  SVG Allow------------------------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' ); 

// --------------------------------------------------------------------------------------------------------------------------//
// ---------------------------------  11 Blogs 1st Page ------------------------------------------------------------------------//
// --------------------------------------------------------------------------------------------------------------------------//

function custom_posts_per_page_and_offset( $query ) {
    // Only modify main query on the blog homepage and frontend
    if ( $query->is_main_query() && !is_admin() && $query->is_home() ) {
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        if ( $paged === 1 ) {
            // First page: show 11 posts
            $query->set( 'posts_per_page', 11 );
        } else {
            // Page 2 and beyond
            $query->set( 'posts_per_page', 12 );

            // Adjust the offset to account for the first page showing only 11
            $offset = 11 + ( ( $paged - 2 ) * 12 );
            $query->set( 'offset', $offset );
        }
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page_and_offset' );

add_action('wp_footer', 'quick_test_script');

function quick_test_script(){
	?>

<script>
function adjustFirstSectionMargin(buffer = 60) {
  const header = document.querySelector('header.main-header');
  const firstSection = document.querySelector('main > section:first-of-type');

  if (!header || !firstSection) return;

  const headerHeight = header.offsetHeight;

  firstSection.style.marginTop = `${headerHeight + buffer}px`;
}

// Run on load
window.addEventListener('load', () => {
  adjustFirstSectionMargin();
});

// Optional: recalculate on resize
window.addEventListener('resize', () => {
  adjustFirstSectionMargin();
});
</script>

<?php
}