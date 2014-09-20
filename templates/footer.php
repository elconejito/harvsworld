<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php dynamic_sidebar('sidebar-footer-left'); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('sidebar-footer-center'); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('sidebar-footer-right'); ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <p>Copyright &copy; <?php echo date("Y"); ?> harvsworld.com. Powered by <a href="http://littlerabbitstudios.com">Little Rabbit Studios</a>.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
