<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-md-6">
            <h2>Coding &amp; Development</h2>
        </div>
        <div class="col-md-6">
            <h2>Quick Hits</h2>
        </div>
        <div class="col-md-12">
            <h2>Latest</h2>
            <?php
            $latestPosts = array_slice($latestPosts->get_posts(), 3);
            
            if ( $latestPosts ) : 
                foreach ( array_chunk($latestPosts, 2) as $row ) : ?>
            <div class="row">
                <?php foreach ( $row as $post ) : if ( in_array( $post->ID, $do_not_duplicate ) ) continue; ?>
                    <div class="col-md-6">
                        <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'thumbnail' ); ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php the_excerpt(); ?>
                    </div>
                <?php endforeach; ?>
            </div>

                <?php endforeach;
            endif; ?>
        </div>
    </div><!-- .row -->
</div><!-- .container -->