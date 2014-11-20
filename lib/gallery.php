<?php
/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * The number of columns must be a factor of 12.
 *
 * @link http://getbootstrap.com/components/#thumbnails
 */
function roots_gallery($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => '',
    'icontag'    => '',
    'captiontag' => '',
    'columns'    => 4,
    'size'       => 'thumbnail',
    'include'    => '',
    'exclude'    => '',
    'link'       => ''
  ), $attr));

  $id = intval($id);
  $columns = (12 % $columns == 0) ? $columns: 4;
  $grid = sprintf('col-sm-%1$s col-lg-%1$s', 12/$columns);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }

  $unique = (get_query_var('page')) ? $instance . '-p' . get_query_var('page'): $instance;
  $output = '<div class="gallery gallery-' . $id . '-' . $unique . '">';

  $i = 0;
  foreach ($attachments as $id => $attachment) {
    switch($link) {
      case 'file':
        $image = wp_get_attachment_link($id, $size, false, false);
        break;
      case 'none':
        $image = wp_get_attachment_image($id, $size, false, array('class' => 'thumbnail img-thumbnail'));
        break;
      default:
        $image = wp_get_attachment_link($id, $size, true, false);
        break;
    }
    $image = str_replace('<a class="thumbnail img-thumbnail"', '<a class="slick thumbnail img-thumbnail" data-toggle="modal" data-target=".modal" data-remote="false" data-goto="'.$i.'" ', $image);
    $output .= ($i % $columns == 0) ? '<div class="row gallery-row">': '';
    $output .= '<div class="' . $grid .'">' . $image;

    if (trim($attachment->post_excerpt)) {
      $output .= '<div class="caption hidden">' . wptexturize($attachment->post_excerpt) . '</div>';
    }

    $output .= '</div>';
    $i++;
    $output .= ($i % $columns == 0) ? '</div>' : '';
  }

  $output .= ($i % $columns != 0 ) ? '</div>' : '';
  $output .= '</div>';

  return $output;
}

function hw_bootstrap_gallery($attr) {
    // if this is a feed, gtfo
    if (is_feed())
        return '';

    $post = get_post();

    if (!empty($attr['ids'])) {
        if (empty($attr['orderby'])) {
            $attr['orderby'] = 'post__in';
        }
        $attr['include'] = $attr['ids'];
    }

    $output = apply_filters('post_gallery', '', $attr);

    if ($output != '') {
        return $output;
    }

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby']) {
            unset($attr['orderby']);
        }
    }

    $indicatorsClass = '';
    if ( !empty($attr['indicator']) )
        if ( $attr['indicator'] == 'thumbs' )
            $indicatorsClass = 'carousel-thumbnails';

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => '',
        'icontag'    => '',
        'captiontag' => '',
        'columns'    => 4,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr));

    $id = intval($id);

    if ($order === 'RAND') {
        $orderby = 'none';
    }

    if (!empty($include)) {
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif (!empty($exclude)) {
        $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    } else {
        $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
    }

    if (empty($attachments)) {
        return '';
    }

    // this ID is to give each carousel a unique ID for targeting by controls.
    $targetID = 'carousel-'.$id.'-'.rand(0, 100);

    // Build the framework for the slides
    // The Outer Container
    $outerStart = '<div id="'.$targetID.'" class="carousel slide" data-ride="carousel" data-interval="">';
    $outerEnd = '</div>';
    // The Indicators
    $indicatorsStart = '<!-- Indicators --><ol class="carousel-indicators '.$indicatorsClass.'">';
    $indicatorsEnd = '</ol><!-- /.carousel-indicators -->';
    // The Slides
    $slidesStart = '<!-- Wrapper for slides --><div class="carousel-inner">';
    $slidesEnd = '</div><!-- /.carousel-inner -->';
    // The Controls
    $controlsStart = '<!-- Controls -->';
    $controlsEnd = '';

    // Build next/prev buttons
    $prev = '<a class="left carousel-control" href="#'.$targetID.'" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
    $next = '<a class="right carousel-control" href="#'.$targetID.'" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';

    $i = 0;
    $slides = '';
    $slideNav = '';
    foreach ($attachments as $id => $attachment) {
        $isActive = ( $i === 0 ? 'active':'' );
        // open the div for each item
        $slides .= '<div class="item '.$isActive.'">';
        if ( $indicatorsClass == 'carousel-thumbnails' ) {
            $url = wp_get_attachment_image_src($id, 'thumbnail');
            $slideNav .= '<li data-target="#' . $targetID . '" data-slide-to="' . $i . '" class="' . $isActive . '"><img src="'.$url[0].'" class="img-responsive"/></li>';
        } else {
            $slideNav .= '<li data-target="#' . $targetID . '" data-slide-to="' . $i . '" class="' . $isActive . '"></li>';
        }

        // get the info of the main image. wp_get_attachment_image_src returns an array or url, width, height
        $url = wp_get_attachment_image_src($id, 'carousel');

        // custom <img> for Slick slider using lazy load
        // use the regular thumbnail image for the carousel at the bottom
        $slides .= '<img data-original="'.$url[0].'" width="'.$url[1].'" height="'.$url[2].'" class="lazy img-responsive"/>';
        // $outputNav .= wp_get_attachment_image($id, 'thumbnail', false, array('class' => 'img-thumbnail'));

        if ( trim($attachment->post_excerpt) ) {
            $slides .= '<div class="carousel-caption">'.wptexturize($attachment->post_excerpt).'</div>';
        }

        $slides .= '</div><!-- /.item -->';
        $i++;
    }

    // Put all the pieces together
    $return = $outerStart . $indicatorsStart . $slideNav . $indicatorsEnd . $slidesStart . $slides . $slidesEnd . $controlsStart . $prev . $next . $controlsEnd . $outerEnd;

    return $return;

}

if (current_theme_supports('bootstrap-gallery')) {
    remove_shortcode('gallery');
    add_shortcode('gallery', 'hw_bootstrap_gallery');
    add_filter('use_default_gallery_style', '__return_null');
}

function hw_header_featured_background() {
	if ( '' != get_the_post_thumbnail() && is_single() ) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		echo 'class="jumbotron jumbo-image" style="background-image: url('.$image_url[0].');" ';
	} else {
	  echo 'class="jumbotron" ';
	}
}

function hw_home_featured_background() {
	if ( '' != get_the_post_thumbnail() && is_front_page() ) {
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		echo ' style="background-image: url('.$image_url[0].');" ';
	}
}

/**
 * Add class="thumbnail img-thumbnail" to attachment items
 */
function roots_attachment_link_class($html) {
  $postid = get_the_ID();
  $html = str_replace('<a', '<a class="thumbnail img-thumbnail"', $html);
  return $html;
}
add_filter('wp_get_attachment_link', 'roots_attachment_link_class', 10, 1);
