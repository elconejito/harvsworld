<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Config\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Bug testing only. Not to be used on a production site!!
 */
function roots_wrap_info() {
	$format = '<h6>The %s template being used is: %s</h6>';
	// $main   = SageWrapping::$main_template;
	$main   = Wrapper\template_path();
	global $template;

	printf($format, 'Main', $main);
	printf($format, 'Base', $template);
	echo "<h6>is_single:".is_single()." is_page:".is_page()." is_archive:".is_archive()." is_category:".is_category()." ";
	echo "is_front_page:".is_front_page()." is_home:".is_home()."</h6>";
}
if (WP_ENV === 'development') {
	add_action('wp_footer', __NAMESPACE__ . '\\roots_wrap_info');
}