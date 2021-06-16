<?php
/*
Author: Daron Spence / Shane Schroll
URL: https://weare502.com
*/

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

/*
2. lib/enqueue-style.php
    - enqueue Foundation and Reverie CSS
*/
require_once('lib/enqueue-style.php');

/*
3. lib/foundation.php
	- add pagination
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*
5. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
// require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
 **********************/
if( ! function_exists( 'reverie_theme_support' ) ) {
    function reverie_theme_support() {
        // Add language supports.
        load_theme_textdomain('reverie', get_template_directory() . '/lang');

        // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
        add_theme_support('post-thumbnails');
        // set_post_thumbnail_size(150, 150, false);
        add_image_size('fd-lrg', 1024, 99999);
        add_image_size('fd-med', 768, 99999);
        add_image_size('fd-sm', 320, 9999);
        add_image_size('fd-sq', 325, 325, true);
        add_image_size('staff', 250, 250, true);

        // rss thingy
        add_theme_support('automatic-feed-links');

        // Add post formats support. http://codex.wordpress.org/Post_Formats
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

        // Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
        add_theme_support('menus');
        register_nav_menus(array(
            'primary' => __('Primary Navigation', 'reverie'),
            'additional' => __('Additional Navigation', 'reverie'),
            'utility' => __('Utility Navigation', 'reverie'),
            'footer' => __('Footer Box Navigation', 'reverie')
        ));

        // Add custom background support
        add_theme_support( 'custom-background',
            array(
                'default-image' => '',  // background image default
                'default-color' => '', // background color default (dont add the #)
                'wp-head-callback' => '_custom_background_cb',
                'admin-head-callback' => '',
                'admin-preview-callback' => ''
            )
		);
		
		

		acf_add_options_page(array(
			'page_title' 	=> 'Theme Options',
			'menu_title'	=> 'Theme Options',
			'menu_slug' 	=> 'theme-options',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Home-Pre-Footer CTA',
			'menu_title'	=> 'Home-Pre-Footer CTA',
			'menu_slug' 	=> 'home-pre-footer-cta',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-options',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Program-Pre-Footer CTA',
			'menu_title'	=> 'Program-Pre-Footer CTA',
			'menu_slug' 	=> 'program-pre-footer-cta',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-options',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Footer Disclaimer Message',
			'menu_title'	=> 'Footer Disclaimer',
			'menu_slug' 	=> 'footer-disclaimer',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-options',
			'redirect'		=> false
		));

		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Notification Bar',
			'menu_title'	=> 'Notification Bar Options',
			'menu_slug' 	=> 'notification-bar-ops',
			'capability'	=> 'edit_posts',
			'parent_slug'	=> 'theme-options',
			'redirect'		=> false
		));
    }
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// Import custom post types
function register_cpts() {
	include_once('custom-post-types/post-type-go.php');
}
add_action( 'init', 'register_cpts' );

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Sidebar',
        'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
    	'id' => 'Footer',
        'before_widget' => '<div class="large-3 medium-6 columns"><article id="%1$s" class="panel widget %2$s">',
        'after_widget' => '</article></div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

// return entry meta information for posts, used by multiple loops, you can override this function by defining them first in your child theme's functions.php file
if ( ! function_exists( 'reverie_entry_meta' ) ) {
    function reverie_entry_meta() {
        echo '<span class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .', </a></span>';
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. get_the_time('F jS, Y') .'</time>';
    }
};


// add filter for gform tabindex (for form 79) - dual forms on New Students
// keeps the tab-index from skipping to the form next to it
add_filter( 'gform_tabindex_79', 'change_tabindex', 79, 2 );
function change_tabindex( $tabindex, $form ) {
    return 32;
}

// disable the "skip to toolbar" accessibility shortcut - causes issues with gforms tabindex
function fix_tab_index() {
    echo "<script>jQuery( '.screen-reader-shortcut' ).remove();</script>";
}
add_action( 'wp_after_admin_bar_render', 'fix_tab_index' );

//////////////////////
// Change Dashicons //
//////////////////////
function add_menu_icons_script() {
?>
 
<script type="text/javascript">
jQuery( document ).ready(function( $ ) {
    $('#menu-posts-faculty .dashicons-before').removeClass('dashicons-admin-post').addClass('dashicons-groups');
    $('#menu-posts-programs .dashicons-before').removeClass('dashicons-admin-post').addClass('dashicons-book-alt');
    $('#menu-posts-courses .dashicons-before').removeClass('dashicons-admin-post').addClass('dashicons-edit');
    $('#menu-posts-notf_notifications .dashicons-before').removeClass('dashicons-admin-post').addClass('dashicons-megaphone').css('opacity',1);
    $('#menu-posts-food_menus .dashicons-before').removeClass('dashicons-admin-post').addClass('dashicons-star-filled');
    // dashicons-star-filled
});
</script>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_script' );


//////////////////////////////////////
// Custom Post Object Title & Sort //
////////////////////////////////////

function my_post_object_result( $result, $object, $field, $post ){
    // add post type to each result
    $code = get_field('course_code', $object->ID);
    $result = $code . ' : ' . $result;
    return $result;
}

add_filter('acf/fields/post_object/result/key=field_53bb05c921412', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53b5c6cd3a130', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53b5c70e3a132', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53b5c72d3a134', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53b5c7803a136', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53b31f09da9e8', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53b31fe1da9eb', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53f763214d4d5', 'my_post_object_result', 10, 4);
add_filter('acf/fields/post_object/result/key=field_53fb6edde371c', 'my_post_object_result', 10, 4);

function my_post_object_query( $args, $field, $post ){
    // Change Sort Order to Course Code
    $args['meta_key'] = 'course_code';
    $args['orderby'] = 'meta_value';
 
    return $args;
}

add_filter('acf/fields/post_object/query/key=field_53bb05c921412', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53b5c6cd3a130', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53b5c70e3a132', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53b5c72d3a134', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53b5c7803a136', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53b31f09da9e8', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53b31fe1da9eb', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53f763214d4d5', 'my_post_object_query', 10, 3);
add_filter('acf/fields/post_object/query/key=field_53fb6edde371c', 'my_post_object_query', 10, 3);


///////////////////////////////////////
// Register New Menus for Templates //
/////////////////////////////////////
register_nav_menus( array(
        'new-students' => 'New Students',
        'current-students' => 'Current Students',
        'alumni' => 'Alumni',
        'foundation' => 'Foundation',
        'financial-aid' => 'Financial Aid',
        'online-classes' => 'Online Classes',
        'individual-courses' => 'Individual Courses',
        //'footer-box-menu' => 'Footer Box Links'
    )
);


/////////////////////////////////////////
// Custom Excerpt More Text           //
///////////////////////////////////////
function custom_excerpt_more( $more ) {
    return '<a href="'.  get_permalink( get_the_ID() ) . '" title="Read More">...</a>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// add filter to be able to hide field labels
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

function hide_stuff_not_admin(){
if ( current_user_can( 'manage_options' ) ) { /* do nothing */ } else {
        echo '<style>#toplevel_page_metaslider, #revisionsdiv, #wordpress-https, #wpseo_meta, #tagsdiv-event-tags { display: none !important; }</style>';
    }
}
add_action('admin_head', 'hide_stuff_not_admin');

function training_link(){
    if ( is_user_logged_in() ) : ?>

    <script type="text/javascript">
        jQuery( document ).ready(function( $ ) {
            $('#adminmenu').append('<li style="left: -33px;" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-generic"><a href="/nck-training" target="_blank" class="wp-has-submenu wp-not-current-submenu menu-top menu-icon-generic"><div class="wp-menu-image dashicons-before dashicons-lightbulb"></div><div class="wp-menu-name">TRAINING DOCUMENTS</div></a></li>');
        });
    </script>

    <?php endif;
}
add_action('admin_head', 'training_link');

//////////////////////////////
// Orderby Last Name       //
////////////////////////////
/*
* Uses the posts_orderby filter to split the title and sort the posts by the last word in post_title
*/

function posts_orderby_lastname ($orderby_statement) 
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}


// Add custom taxonomies and custom post types counts to dashboard
add_action( 'dashboard_glance_items', 'my_add_cpt_to_dashboard' );

function my_add_cpt_to_dashboard() {
  $showTaxonomies = 1;
  // Custom taxonomies counts
  if ($showTaxonomies) {
    $taxonomies = get_taxonomies( array( '_builtin' => false ), 'objects' );
    foreach ( $taxonomies as $taxonomy ) {
      $num_terms  = wp_count_terms( $taxonomy->name );
      $num = number_format_i18n( $num_terms );
      $text = _n( $taxonomy->labels->singular_name, $taxonomy->labels->name, $num_terms );
      $associated_post_type = $taxonomy->object_type;
      if ( current_user_can( 'manage_categories' ) ) {
        $output = '<a href="edit-tags.php?taxonomy=' . $taxonomy->name . '&post_type=' . $associated_post_type[0] . '">' . $num . ' ' . $text .'</a>';
      }
      echo '<li class="taxonomy-count">' . $output . ' </li>';
    }
  }
  // Custom post types counts
  $post_types = get_post_types( array( '_builtin' => false ), 'objects' );
  foreach ( $post_types as $post_type ) {
    if($post_type->show_in_menu==false) {
      continue;
    }
    $num_posts = wp_count_posts( $post_type->name );
    $num = number_format_i18n( $num_posts->publish );
    $text = _n( $post_type->labels->singular_name, $post_type->labels->name, $num_posts->publish );
    if ( current_user_can( 'edit_posts' ) ) {
        $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';
    }
    // pending items count
    // if ( $num_posts->pending > 0 ) {
    //     $num = number_format_i18n( $num_posts->pending );
    //     $text = _n( $post_type->labels->singular_name . ' pending', $post_type->labels->name . ' pending', $num_posts->pending );
    //     if ( current_user_can( 'edit_posts' ) ) {
    //         $output .= '<a class="waiting" href="edit.php?post_status=pending&post_type=' . $post_type->name . '">' . $num . ' pending</a>';
    //     }
    // }
    echo '<li class="page-count ' . $post_type->name . '-count">' . $output . '</td>';
  }
}
function admin_glance_icons(){?>
    <style type="text/css">/* food_menus careers programs courses featured_students */
         .notf_notifications-count a:before { content: "\f488" !important; }
         .faculty-count a:before { content: "\f307" !important; }
         .food_menus-count a:before { content: "\f155" !important; }
         .careers-count a:before { content: "\f109" !important; }
         .programs-count a:before { content: "\f331" !important; }
         .courses-count a:before { content: "\f464" !important; }
         .featured_students-count a:before { content: "\f483" !important; }
         .event-count a:before, .event-recurring-count a:before { content: "\f145" !important; }
         .location-count a:before { content: "\f173"!important; }
    </style>
<?php } 
add_action('admin_head', 'admin_glance_icons');
///////////////////////////////////
// Add Landing Page             //
/////////////////////////////////
function admin_script(){?>
    <script type="text/javascript">
    	(function($){
			$(function() {
			    $('#page_template').change(function() {
			        $('#landing_page').toggle($(this).val() == 'page-landing.php');
			    }).change();
			});
		})(jQuery);
    </script>
    <style>
    	img{max-width: 100%;}
    </style>
<?php } 
add_action('admin_head', 'admin_script');
require_once("meta-box-class/my-meta-box-class.php");
if (is_admin()){
  $config = array(
    'id'             => 'landing_page',
    'title'          => 'Landing Page',
    'pages'          => array('page'),
    'context'        => 'normal',
    'priority'       => 'high',
    'fields'         => array(),
    'local_images'   => false,
    'use_with_theme' => true
);

$my_meta =  new AT_Meta_Box($config);
$my_meta->addImage('header_bg',array('name'=> 'Header Background '));
$my_meta->addWysiwyg('header_txt',array('name'=> 'Header Text'));
$my_meta->addText('header_gf_txt',array('name'=> 'Header Form Heading'));
$my_meta->addText('header_gf',array('name'=> 'Header Gravity Forms Shortcode '));
$my_meta->addText('blue_one_head',array('name'=> 'Blue First Heading'));
$my_meta->addImage('blue_one_ico',array('name'=> 'Blue First Icon (icon width: 85px, height: 75px)'));
$my_meta->addWysiwyg('blue_one_txt',array('name'=> 'Blue First Content'));
$my_meta->addText('blue_two_head',array('name'=> 'Blue Second Heading'));
$my_meta->addImage('blue_two_ico',array('name'=> 'Blue Second Icon (icon width: 85px, height: 75px)'));
$my_meta->addWysiwyg('blue_two_txt',array('name'=> 'Blue Second Content'));
$my_meta->addText('blue_three_head',array('name'=> 'Blue Third Heading'));
$my_meta->addImage('blue_three_ico',array('name'=> 'Blue Third Icon (icon width: 85px, height: 75px)'));
$my_meta->addWysiwyg('blue_three_txt',array('name'=> 'Blue Third Content'));
$my_meta->addText('blue_four_head',array('name'=> 'Blue Fourth Heading'));
$my_meta->addImage('blue_four_ico',array('name'=> 'Blue Fourth Icon (icon width: 85px, height: 75px)'));
$my_meta->addWysiwyg('blue_four_txt',array('name'=> 'Blue Fourth Content'));
$my_meta->addText('top_one_head',array('name'=> 'Top Program First Heading'));
$my_meta->addWysiwyg('top_one_txt',array('name'=> 'Top Program First Content'));
$my_meta->addText('top_one_salary',array('name'=> 'Top Program First Salary'));
$my_meta->addText('top_two_head',array('name'=> 'Top Program Second Heading'));
$my_meta->addWysiwyg('top_two_txt',array('name'=> 'Top Program Second Content'));
$my_meta->addText('top_two_salary',array('name'=> 'Top Program Second Salary'));
$my_meta->addText('top_three_head',array('name'=> 'Top Program Third Heading'));
$my_meta->addWysiwyg('top_three_txt',array('name'=> 'Top Program Third Content'));
$my_meta->addText('top_three_salary',array('name'=> 'Top Program Third Salary'));
$my_meta->addText('top_four_head',array('name'=> 'Top Program Fourth Heading'));
$my_meta->addWysiwyg('top_four_txt',array('name'=> 'Top Program Fourth Content'));
$my_meta->addText('top_four_salary',array('name'=> 'Top Program Fourth Salary'));
$my_meta->addText('top_five_head',array('name'=> 'Top Program Fifth Heading'));
$my_meta->addWysiwyg('top_five_txt',array('name'=> 'Top Program Fifth Content'));
$my_meta->addText('top_five_salary',array('name'=> 'Top Program Fifth Salary'));
$my_meta->addWysiwyg('call_action_txt',array('name'=> 'Call to Action Text'));
$my_meta->addText('blue_bottom_one_head',array('name'=> 'Bottom Blue First Heading'));
$my_meta->addImage('blue_bottom_one_ico',array('name'=> 'Bottom Blue First Icon (icon width: 90px, height: 70px)'));
$my_meta->addText('blue_bottom_one_link',array('name'=> 'Bottom Blue First Link (If no link, leave blank)'));
$my_meta->addText('blue_bottom_one_txt',array('name'=> 'Bottom Blue First Content'));
$my_meta->addText('blue_bottom_two_head',array('name'=> 'Bottom Blue Second Heading'));
$my_meta->addImage('blue_bottom_two_ico',array('name'=> 'Bottom Blue Second Icon (icon width: 90px, height: 70px)'));
$my_meta->addText('blue_bottom_two_link',array('name'=> 'Bottom Blue Second Link (If no link, leave blank)'));
$my_meta->addText('blue_bottom_two_txt',array('name'=> 'Bottom Blue Second Content'));
$my_meta->addText('blue_bottom_three_head',array('name'=> 'Bottom Blue Third Heading'));
$my_meta->addImage('blue_bottom_three_ico',array('name'=> 'Bottom Blue Third Icon (icon width: 90px, height: 70px)'));
$my_meta->addText('blue_bottom_three_link',array('name'=> 'Bottom Blue third Link (If no link, leave blank)'));
$my_meta->addText('blue_bottom_three_txt',array('name'=> 'Bottom Blue Third Content'));
$my_meta->addText('footer_copyright',array('name'=> 'Footer Copyright'));
$my_meta->addWysiwyg('footer_links',array('name'=> 'Footer Links'));
$my_meta->Finish();
};



/**
 * Patch to prevent black PDF backgrounds.
 *
 * https://core.trac.wordpress.org/ticket/45982
 */
require_once ABSPATH . 'wp-includes/class-wp-image-editor.php';
require_once ABSPATH . 'wp-includes/class-wp-image-editor-imagick.php';

// phpcs:ignore PSR1.Classes.ClassDeclaration.MissingNamespace
final class ExtendedWpImageEditorImagick extends WP_Image_Editor_Imagick
{
    /**
     * Add properties to the image produced by Ghostscript to prevent black PDF backgrounds.
     *
     * @return true|WP_error
     */
    // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    protected function pdf_load_source()
    {
        $loaded = parent::pdf_load_source();

        try {
            $this->image->setImageAlphaChannel(Imagick::ALPHACHANNEL_REMOVE);
            $this->image->setBackgroundColor('#ffffff');
        } catch (Exception $exception) {
            error_log($exception->getMessage());
        }

        return $loaded;
    }
}
include_once 'fragments/functions-block.php';
/**
 * Filters the list of image editing library classes to prevent black PDF backgrounds.
 *
 * @param array $editors
 * @return array
 */
add_filter('wp_image_editors', function (array $editors): array {
    array_unshift($editors, ExtendedWpImageEditorImagick::class);

    return $editors;
});

function ccgfeb2021_scripts() {
wp_enqueue_style( 'style-css', get_stylesheet_directory_uri() . '/style.css' );
wp_enqueue_style( 'ccg-css', get_stylesheet_directory_uri() . '/ccg.css' );
}
add_action( 'wp_enqueue_scripts', 'ccgfeb2021_scripts' );


wp_enqueue_style( 'owl-slider-css', get_template_directory_uri() . '/owl/owl.carousel.min.css' ); 
wp_enqueue_style( 'owl-slider-css-default', get_template_directory_uri() . '/owl/owl.theme.default.min.css');
wp_enqueue_script( 'owl-slider-js', get_template_directory_uri() . '/owl/owl.carousel.min.js', array('jquery') );
?>
