<article <?php post_class('col-md-6'); ?>>
  <header>
    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-content">
	  <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive featured'] ); ?></a>
	  <?php the_excerpt(); ?>
  </div>
  <footer class="entry-footer">
    <?php _e( Roots\Sage\Content\hw_get_post_categories() ); ?>
    <?php _e( Roots\Sage\Content\hw_get_post_tags() ); ?>
  </footer>
</article>
