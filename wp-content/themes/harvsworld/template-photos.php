<?php
/*
Template Name: Photo Gallery Template
*/
?>

<?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/page', 'header'); ?>
    <?php $page_children = get_pages( ['parent' => $post->ID] ); ?>
    <?php $page_parent = get_pages( ['parent' => $post->ID, 'hierarchical'=>0] ); ?>
    <?php include(locate_template('templates/content-single-gallery.php')); ?>
<?php endwhile; ?>
