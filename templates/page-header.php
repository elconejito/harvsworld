<div class="jumbotron" <?php hw_header_featured_background(); ?>>
    <header class="container page-header">
      <?php if ( is_front_page() ) : ?>
        <h1><?php echo get_bloginfo('name'); ?></h1>
        <p><?php echo get_bloginfo('description'); ?></p>
      <?php elseif ( is_home() ) : ?>
        <h1><?php echo roots_title(); ?></h1>
        <p>Beware. Ramblings below.</p>
      <?php elseif ( is_single() ) : ?>
        <h1><?php echo get_the_title(); ?></h1>
        <?php get_template_part('templates/entry-meta'); ?>
      <?php elseif ( is_page() ) : ?>
        <h1><?php echo get_the_title(); ?></h1>
      <?php elseif ( is_category() ) : ?>
        <h1><small>category</small><br /><?php single_cat_title(); ?></h1>
      <?php else : ?>
        <h1><?php echo get_the_title(); ?></h1>
        <p>no idea what</p>
      <?php endif; ?>
    </header>
</div>
