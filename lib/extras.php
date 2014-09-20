<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more($more) {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');

/**
 * Manage output of wp_title()
 */
function roots_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'roots_wp_title', 10);

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

/**
 * Init my Widgets
 */
function hw_init_widgets() {
    register_widget( 'Category_Widget' );
    register_widget( 'Recents_Widget' );
}
add_action( 'widgets_init', 'hw_init_widgets');


/**
 * Bug testing only. Not to be used on a production site!!
 */
if (WP_ENV === 'development') {
    add_action('wp_footer', 'roots_wrap_info');
    function roots_wrap_info() {
        $format = '<h6>The %s template being used is: %s</h6>';
        $main   = Roots_Wrapping::$main_template;
        global $template;

        printf($format, 'Main', $main);
        printf($format, 'Base', $template);
    }
}