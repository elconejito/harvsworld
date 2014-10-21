<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <!-- <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header> -->
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer class="entry-footer">
      <?php _e( hw_get_post_categories() ); ?>
      <?php _e( hw_get_post_tags() ); ?>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <nav class="post-nav">
      <ul class="pager">
        <li class="previous"><?php previous_post_link('%link', '&larr; %title'); ?></li>
        <li class="next"><?php next_post_link('%link', '%title &rarr;'); ?></li>
      </ul>
    </nav>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
