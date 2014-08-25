<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php dynamic_sidebar('sidebar-footer-1'); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('sidebar-footer-2'); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('sidebar-footer-3'); ?>
      </div>
    </div>
    <div class="row">
      <p>Copyright &copy; <?php echo date("Y"); ?> harvsworld.com. Powered by Little Rabbit Studios.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
