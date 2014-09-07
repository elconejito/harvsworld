<?php
/**
* Widget Classes
*/

class Category_Widget extends WP_Widget {
    
    /**
    * Widget creation and setup
    */
    public function __construct() {
        parent::__construct(
            'categories', // Base ID
            __('HW Category Widget', 'roots'), // Name
            array(
                'classname' => 'widget_categories',
                'description' => __( 'A Category Widget', 'roots' ),
            ) // Args
		);
    }
    
    /**
    * Outputs the content of the widget
    * 
    * @see WP_Widget::widget()
    *
    * @param array $args
    * @param array $instance
    */
    public function widget( $args, $instance ) {
        extract( $args );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Categories', 'roots' ) : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		
		$cat_args = array(
		    'orderby' => 'name',
		    'pad_counts' => '0',
		    'exclude' => get_category_by_slug('featured')->term_id
		);
        $categories = get_categories($cat_args);
        
        // start the UL, bootstrap style
        echo '<ul class="list-group">';
		// do we have anything to output?
		if ( $categories ) {
            // loop through and grab each category, putting them in groups according to parent
            $list = [];
		    foreach($categories as $category) {
                $class = 'list-group-item';
                if ( (is_category() && is_archive() && get_category(get_query_var('cat'))->slug == $category->slug) || (is_single() && in_category($category->cat_ID)) ) {
                    $class .= ' active';
                }
                $list[$category->category_parent][$category->cat_ID] = '<li class="'.$class.'"><span class="badge">' . $category->count . '</span><a href="' . get_category_link( $category->cat_ID ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a></li>';
            }
            // echo back the categories
            foreach ( $list[0] as $id => $item ) {
                echo $item;
                if ( is_array($list[$id]) ) {
                    echo '<li class="list-group-child"><ul class="list-group">';
                    foreach ( $list[$id] as $sub ) {
                        echo $sub;
                    }
                    echo '</ul></li>';
                }
            }
		} else {
		    echo '<li class="list-group-item">nothing to show</li>';
		}
		// close out the UL
		echo '</ul>';

		echo $after_widget;
    }
    
    /**
    * Outputs the options form on admin
    *
    * @param array $instance The widget options
    */
    public function form( $instance ) {
        echo '<p class="no-options-widget">' . __('There are no options for this widget.') . '</p>';
        return 'noform';
    }
    
    /**
    * Processing widget options on save
    *
    * @param array $new_instance The new options
    * @param array $old_instance The previous options
    */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}

class Recents_Widget extends WP_Widget {
    
    /**
    * Widget creation and setup
    */
    public function __construct() {
        parent::__construct(
            'recents', // Base ID
            __('HW Recents Widget', 'roots'), // Name
            array(
                'classname' => 'widget_recents',
                'description' => __( 'A Recent Posts Widget', 'roots' ),
            ) // Args
		);
		
		// triggered events, copied from WP Default Widgets
		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }
    
    /**
    * Outputs the content of the widget
    * 
    * @see WP_Widget::widget()
    *
    * @param array $args
    * @param array $instance
    */
    public function widget( $args, $instance ) {
        /**
         * check if the posts are in the cache
         */
        $cache = array();
        // if not preview, get the cache (if any)
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_recent_posts', 'widget' );
		}
		// if array not returned, then reset $cache to empty array
		if ( ! is_array( $cache ) ) {
			$cache = array();
		}
		// set widgetID is not already set
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}
		// does cache exist? if so echo it and bounce
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		
		/**
		 * start outputting widget to ob_* to print or cache later
		 */
		ob_start();
		extract( $args );
        
		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Recent Posts', 'roots' ) : $instance['title'], $instance, $this->id_base );
		// set number of posts to return. default to 5
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		
		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		$post_args = array(
		    'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		);
        $r = new WP_Query( $post_args );
		
        // start the UL, bootstrap style
        echo '<ul class="list-group">';
		// do we have anything to output?
		if ( $r->have_posts() ) {
		    while ( $r->have_posts() ) : $r->the_post(); ?>
		        <li class="list-group-item">
		            <a href="<?php the_permalink(); ?>" title="<?php ( get_the_title() ? the_title() : the_ID() ); ?>" ><?php ( get_the_title() ? the_title() : the_ID() ); ?></a>
		        </li>

            <?php endwhile;
            wp_reset_postdata();
		} else {
		    echo '<li class="list-group-item">nothing to show</li>';
		}
		// close out the UL
		echo '</ul>';

		echo $after_widget;
		
		// if preview, flush ob_*. otherwise cache it
		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
    }
    
    /**
    * Outputs the options form on admin
    *
    * @param array $instance The widget options
    */
    public function form( $instance ) {
        echo '<p class="no-options-widget">' . __('There are no options for this widget.') . '</p>';
        return 'noform';
    }

    /**
     * flush old posts
     */
    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }
    
    /**
    * Processing widget options on save
    *
    * @param array $new_instance The new options
    * @param array $old_instance The previous options
    */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}