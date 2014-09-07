<article <?php post_class(); ?>>
    <div class="entry-content">
        <?php if ( $post->post_parent != 0 ) : $parent = get_post( $post->post_parent ); ?>
            <a href="<?php echo get_permalink($parent->ID); ?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-up"></span> up to <?php echo $parent->post_title; ?></a>
        <?php endif; ?>
        <?php the_content(); ?>
        <?php // echo hw_slick_gallery(); ?>

        <?php
        if ( is_array($page_children) && count($page_children) > 0 ) :
            foreach ( array_chunk($page_children, 3) as $row ) : ?>
                <div class="row posts-row">
                    <?php foreach ( $row as $post ) : setup_postdata( $post ); ?>
                        <article class="col-md-4 hentry">
                            <header class="entry-header">
                                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </header>
                            <div class="entry-content">
                                <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive featured'] ); ?></a>
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            <?php endforeach;
        endif;
        ?>
    </div>
    <footer class="entry-footer">
        <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
</article>
