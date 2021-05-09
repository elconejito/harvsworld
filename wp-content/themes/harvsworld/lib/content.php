<?php

namespace Roots\Sage\Content;

use Roots\Sage\Config;
use Roots\Sage\Wrapper;
use WP_Query;

/**
 * @param array $args
 * @return WP_Query
 */
function hw_latest_posts($args = array()) {
	$args = array_merge(
		[
			'posts_per_page' => 7,
			'order' => 'DESC',
			'orderby' => 'date'
		],
		$args
	);
	return new WP_Query( $args );
}

/**
 * Get the posts needed to complete the home page
 *
 * @return array
 */
function hw_home_posts() {
	$sections = [
		'featured' => [],
		'coding' => [],
		'quick' => [],
		'latest' => [],
	];

	$idFeatured = get_cat_ID( 'featured' );
	$idCoding = get_cat_ID( 'coding' );
	$idQuickHits = get_cat_ID( 'quick-hits' );

	// get the posts for featured section
	$args = [
		'category_name' => 'featured',
		'posts_per_page' => 3,
	];
	$sections['featured'] = hw_latest_posts($args);

	// get the post for coding
	$args = [
		'category_name' => 'coding',
		'posts_per_page' => 1,
		'category__not_in' => [ $idQuickHits ]
	];
	$sections['coding'] = hw_latest_posts($args);

	// get the post for quickhits
	$args = [
		'category_name' => 'quick-hits',
		'posts_per_page' => 1,
		'category__not_in' => [ $idFeatured, $idCoding ]
	];
	$sections['quick'] = hw_latest_posts($args);

	// get the post for latest section
	$args = [
		'category_name' => '',
		'posts_per_page' => 4
	];
	$sections['latest'] = hw_latest_posts($args);

	return $sections;
}

/**
 * Output the tags for a given post.
 * Taken from Genesis
 *
 * @param $args
 * @return mixed|void
 */
function hw_get_post_tags( $args = array() ) {
	$args = array_merge(
		[
			'after'  => '',
			'before' => __( 'Tagged With: ', 'roots' ),
			'sep'    => ', ',
		],
		$args
	);

	$tags = get_the_tag_list( $args['before'], trim( $args['sep'] ) . ' ', $args['after'] );
	//* Do nothing if no tags
	if ( ! $tags ) return '';

	return '<span class="tags">' . $tags . '</span>';
}

/**
 * Output the categories for a given post.
 * Taken from Genesis
 *
 * @param $args
 * @return mixed|void
 */
function hw_get_post_categories( $args = array() ) {
	$args = array_merge(
		[
			'after'  => '',
			'before' => __( 'Filed Under: ', 'roots' ),
			'sep'    => ', ',
		],
		$args
	);

	$cats = get_the_category_list( trim( $args['sep'] ) . ' ' );
	//* Do nothing if no tags
	if ( ! $cats ) return '';

	return '<span class="categories">' . $args['before'] . $cats . $args['after'] . '</span>';
}