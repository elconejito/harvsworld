<?php

namespace Roots\Sage\Config;

use Roots\Sage;

/**
 * Enable theme features
 */
// add_theme_support('soil-clean-up');         // Enable clean up from Soil
// add_theme_support('soil-relative-urls');    // Enable relative URLs from Soil
// add_theme_support('soil-nice-search');      // Enable nice search from Soil
add_theme_support('bootstrap-gallery');     // Enable Bootstrap's thumbnails component on [gallery]
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Configuration values
 */
if (!defined('GOOGLE_ANALYTICS_ID')) {
  // Format: UA-XXXXX-Y (Note: Universal Analytics only)
  define('GOOGLE_ANALYTICS_ID', 'UA-23022925-1');
}

if (!defined('WP_ENV')) {
  // Fallback if WP_ENV isn't defined in your WordPress config
  // Used in lib/assets.php to check for 'development' or 'production'
  define('WP_ENV', 'production');
}

/**
 * Define values for EDD theme update
 * Prefix is EDD_TU for Easy Digital Downloads Theme Update
 */
if (!defined('EDD_TU_REMOTE_API_URL'))
    define('EDD_TU_REMOTE_API_URL', 'https://littlerabbitstudios.com');

if (!defined('EDD_TU_ITEM_NAME'))
    define('EDD_TU_ITEM_NAME', 'HarvsWorld');

if (!defined('EDD_TU_THEME_SLUG'))
    define('EDD_TU_THEME_SLUG', 'harvsworld');

if (!defined('EDD_TU_VERSION'))
    define('EDD_TU_VERSION', '2.1.2');

if (!defined('EDD_TU_AUTHOR'))
    define('EDD_TU_AUTHOR', 'Harvey Ramos');

if (!defined('EDD_TU_DOWNLOAD_ID'))
    define('EDD_TU_DOWNLOAD_ID', '');

if (!defined('EDD_TU_RENEW_URL'))
    define('EDD_TU_RENEW_URL', '');

/**
 * Define which pages shouldn't have the sidebar
 */
function display_sidebar() {
  static $display;

  if (!isset($display)) {
    $conditionalCheck = new Sage\ConditionalTagCheck(
      /**
       * Any of these conditional tags that return true won't show the sidebar.
       * You can also specify your own custom function as long as it returns a boolean.
       *
       * To use a function that accepts arguments, use the following format:
       *
       * ['function_name', ['arg1', 'arg2']]
       *
       * Note: The second element must be an array even if there's only 1 argument.
       *
       * Examples:
       *
       * 'is_single'
       * 'is_archive'
       * ['is_page', ['about-me']]
       * ['is_tax', ['flavor', 'mild']]
       * ['is_page_template', ['about.php']]
       * ['is_post_type_archive', [['foo', 'bar', 'baz']]]
       *
       */
      [
        'is_404',
        'is_front_page'
      ]
    );

    $display = apply_filters('sage/display_sidebar', $conditionalCheck->result);
  }

  return $display;
}

/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) {
  $content_width = 1140;
}
