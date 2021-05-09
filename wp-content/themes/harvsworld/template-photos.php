<?php
/*
Template Name: Photo Gallery Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
    <?php $page_children = get_pages( ['parent' => $post->ID] ); ?>
    <?php if ( $post->post_parent != 0 ) : $parent = get_post( $post->post_parent ); ?>
        <a href="<?php echo get_permalink($parent->ID); ?>" class="btn btn-default"><i class="fa fa-chevron-up"></i> up to <?php echo $parent->post_title; ?></a>
    <?php endif; ?>
    <?php if ( is_array($page_children) && count($page_children) > 0 ) : ?>
        <a href="#subgalleries" class="btn btn-default"><i class="fa fa-chevron-down"></i> more galleries</a>
    <?php endif; ?>
    <?php include(locate_template('templates/content-single-gallery.php')); ?>
<?php endwhile; ?>
