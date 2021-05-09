<?php

namespace Roots\Sage\Init;

use Roots\Sage\Assets;
use Roots\Sage\Update;

/**
 * Theme setup
 */
function setup() {
	// Make theme available for translation
	// Community translations can be found at https://github.com/roots/sage-translations
	load_theme_textdomain( 'sage', get_template_directory() . '/lang' );

	// Enable plugins to manage the document title
	// http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
	add_theme_support( 'title-tag' );

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus( [
		'primary_navigation' => __( 'Primary Navigation', 'sage' )
	] );

	// Add post formats
	// http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', [ 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ] );

	// Add HTML5 markup for captions
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list' ] );

	// Tell the TinyMCE editor to use a custom stylesheet
	// add_editor_style( Assets\asset_path( 'styles/editor-style.css' ) );

	// Add post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support( 'post-thumbnails' );
	
	/**
     * Add Custom Image Sizes
	 *
	 * True/False at the end of the function determines whether the image is scaled to fit (false) or cropped (true). True
	 * may also be substituted for an array with crop position, see docs for mre detail. If you change these sizes after
	 * uploading images use the Regenerate Thumbnails plugin (by Viper007Bond) to create new sizes.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_image_size/
	 *
     */
    add_image_size('featured', 540, 300, true);
    add_image_size('portfolio', 540, 350, true);
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );

/**
 * Register sidebars
 */
function widgets_init() {
	register_sidebar( [
		'name'          => __( 'Primary', 'sage' ),
		'id'            => 'sidebar-primary',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	] );
	register_sidebar( array(
		'name'          => __( 'Front Left', 'sage' ),
		'id'            => 'sidebar-home-left',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Front Right', 'sage' ),
		'id'            => 'sidebar-home-right',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'sage' ),
		'id'            => 'sidebar-footer-left',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Center', 'sage' ),
		'id'            => 'sidebar-footer-center',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'sage' ),
		'id'            => 'sidebar-footer-right',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<header><h3>',
		'after_title'   => '</h3></header>',
	) );
}

add_action( 'widgets_init', __NAMESPACE__ . '\\widgets_init' );