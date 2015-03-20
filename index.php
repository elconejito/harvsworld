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

<nav class="post-nav">
	<ul class="pager">
		<li class="previous"><?php next_posts_link('&laquo; Older Posts'); ?></li>
		<li class="next"><?php previous_posts_link('Newer Posts &raquo;'); ?></li>
	</ul>
</nav>
