<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => EDD_TU_REMOTE_API_URL, // Site where EDD is hosted
		'item_name' => EDD_TU_ITEM_NAME, // Name of theme
		'theme_slug' => EDD_TU_THEME_SLUG, // Theme slug
		'version' => EDD_TU_VERSION, // The current version of this theme
		'author' => EDD_TU_AUTHOR, // The author of this theme
		'download_id' => EDD_TU_DOWNLOAD_ID, // Optional, used for generating a license renewal link
		'renew_url' => EDD_TU_RENEW_URL // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'sage' ),
		'enter-key' => __( 'Enter your theme license key.', 'sage' ),
		'license-key' => __( 'License Key', 'sage' ),
		'license-action' => __( 'License Action', 'sage' ),
		'deactivate-license' => __( 'Deactivate License', 'sage' ),
		'activate-license' => __( 'Activate License', 'sage' ),
		'status-unknown' => __( 'License status is unknown.', 'sage' ),
		'renew' => __( 'Renew?', 'sage' ),
		'unlimited' => __( 'unlimited', 'sage' ),
		'license-key-is-active' => __( 'License key is active.', 'sage' ),
		'expires%s' => __( 'Expires %s.', 'sage' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'sage' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'sage' ),
		'license-key-expired' => __( 'License key has expired.', 'sage' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'sage' ),
		'license-is-inactive' => __( 'License is inactive.', 'sage' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'sage' ),
		'site-is-inactive' => __( 'Site is inactive.', 'sage' ),
		'license-status-unknown' => __( 'License status is unknown.', 'sage' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'sage' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'sage' )
	)

);