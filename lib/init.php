<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/roots-translations
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Add post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  register_sidebar(array(
    'name'          => __('Front Page', 'roots'),
    'id'            => 'sidebar-front',
    'before_widget' => '<article class="col-md-4 widget %1$s %2$s">',
    'after_widget'  => '</article>',
    'before_title'  => '<div class="page-header"><h2>',
    'after_title'   => '</h2></div>',
  ));
  register_sidebar(array(
    'name'          => __('Footer 1', 'roots'),
    'id'            => 'sidebar-footer-left',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<div class="page-header"><h3>',
    'after_title'   => '</h3></div>',
  ));
  register_sidebar(array(
    'name'          => __('Footer 2', 'roots'),
    'id'            => 'sidebar-footer-center',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<div class="page-header"><h3>',
    'after_title'   => '</h3></div>',
  ));
  register_sidebar(array(
    'name'          => __('Footer 3', 'roots'),
    'id'            => 'sidebar-footer-right',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<div class="page-header"><h3>',
    'after_title'   => '</h3></div>',
  ));
}
add_action('widgets_init', 'roots_widgets_init');
