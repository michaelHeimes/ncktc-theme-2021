<?php
/*********************
Enqueue the proper CSS
if you use Sass.
*********************/
if( ! function_exists( 'reverie_enqueue_style' ) ) {
	function reverie_enqueue_style()
	{
		// foundation stylesheet
		wp_register_style( 'reverie-foundation-stylesheet', get_stylesheet_directory_uri() . '/css/app.css', array(), '' );

		// Register the main style
		wp_register_style( 'reverie-stylesheet', get_stylesheet_directory_uri() . '/css/style.css', array(), '84862977', 'all' );
		
		wp_enqueue_style( 'reverie-foundation-stylesheet' );
		wp_enqueue_style( 'reverie-stylesheet' );

		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css');
		wp_enqueue_style('printstylesheet', get_stylesheet_directory_uri() . '/css/print.css', array(), '', 'print' );

		// Slick Slider dependencies
		wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/bower_components/slick/slick.min.js', array('jquery') );
		wp_enqueue_script( 'slickjs-init', get_stylesheet_directory_uri(). '/js/site.js', array('slickjs'), '22374144' );
		wp_enqueue_style( 'ncktc-slick-css', get_template_directory_uri() . '/bower_components/slick/slick.css', '20171407' );
		wp_enqueue_style( 'ncktc-slick-theme-css', get_template_directory_uri() . '/bower_components/slick/slick-theme.css', '20127321' );
	}
}
add_action( 'wp_enqueue_scripts', 'reverie_enqueue_style' );
?>
