<?php

namespace Roots\Sage;

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>

    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>

    <?php get_template_part('templates/content-front-home'); ?>

    <?php get_template_part('templates/content-front-profile'); ?>

    <?php get_template_part('templates/content-front-posts'); ?>

    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
