<?php
namespace Roots\Sage\Update;

/*
* EDD Updater
*/
function prefix_theme_updater() {
    require( get_template_directory() . '/lib/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\\prefix_theme_updater' );