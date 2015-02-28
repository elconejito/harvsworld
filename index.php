<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php
	$contentType = 'list';
	if ( get_post_type() != 'post' ) {
		$contentType = get_post_type();
	} elseif ( get_post_format() != '' ) {
		$contentType = get_post_format();
	}
	echo get_post_format();
	get_template_part('templates/content',  $contentType);
	?>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>
