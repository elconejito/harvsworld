<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
  <div id="home" class="para-section" <?php echo hw_home_featured_background(); ?>>
    <div class="container">
      <h1>home</h1>
    </div>
  </div>
  
  <?php get_template_part('templates/content-front-profile'); ?>
  
  <div id="social" class="para-section">
    <div class="container">
      <h1>social</h1>
    </div>
  </div>

  <?php get_template_part('templates/footer'); ?>

</body>
</html>
