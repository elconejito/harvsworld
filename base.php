<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div class="jumbotron">
      <header class="container page-header">
        <?php if ( is_front_page() ) : ?>
          <h1><?php echo get_bloginfo('name'); ?></h1>
          <p><?php echo get_bloginfo('description'); ?></p>
        <?php elseif ( is_home() ) : ?>
          <h1>Blog</h1>
          <p>Beware. Ramblings below.</p>
        <?php elseif ( is_single() ) : ?>
          <h1><?php echo get_the_title(); ?></h1>
          <?php get_template_part('templates/entry-meta'); ?>
        <?php elseif ( is_page() ) : ?>
          <h1><?php echo get_the_title(); ?></h1>
          <p>is page</p>
        <?php elseif ( is_category ) : ?>
          <h1><small>category</small><br /><?php single_cat_title(); ?></h1>
        <?php else : ?>
          <h1><?php echo get_the_title(); ?></h1>
          <p>no idea what</p>
        <?php endif; ?>
      </header>
  </div>
  
  <div class="wrap container" role="document">
    <div class="content row">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
