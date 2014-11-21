<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  
  <?php get_template_part('templates/content-front-home'); ?>
  
  <?php get_template_part('templates/content-front-profile'); ?>
  
  <?php get_template_part('templates/content-front-social'); ?>
  
  <div id="social" class="para-section">
    <div class="container">
      <h1>social</h1>
    </div>
  </div>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
