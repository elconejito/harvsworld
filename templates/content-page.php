<article <?php post_class(); ?>>
     <div class="entry-content">
          <?php the_content(); ?>
     </div>
</article>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>