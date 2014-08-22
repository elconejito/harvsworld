<div class="container">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <article class="col-md-4">
            <h2>Coding &amp; Dev
                <br /><small>more in <a href="<?php echo esc_url( get_category_link( get_cat_ID('coding') ) ); ?>" title="Coding Category">Coding</a></small></h2>
            <?php if ( $frontPagePosts['coding']->have_posts() ) : $frontPagePosts['coding']->the_post(); ?>
                <header class="entry-header">
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php get_template_part('templates/entry-meta'); ?>
                </header>
                <div class="entry-content">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive'] ); ?>
                    <?php the_excerpt(); ?>
                </div>
                <footer class="entry-footer">
                    <?php _e( hw_get_post_categories() ); ?>
                    <?php _e( hw_get_post_tags() ); ?>
                </footer>
            <?php endif; ?>
        </article>
        <article class="col-md-4">
            <h2>Quick Hits
                <br /><small>more in <a href="<?php echo esc_url( get_category_link( get_cat_ID('quick-hits') ) ); ?>" title="Quick HitsCategory">Quick Hits</a></small></h2>
            <?php if ( $frontPagePosts['quick']->have_posts() ) : $frontPagePosts['quick']->the_post(); ?>
                <header class="entry-header">
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php get_template_part('templates/entry-meta'); ?>
                </header>
                <div class="entry-content">
                    <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive'] ); ?>
                    <?php the_excerpt(); ?>
                </div>
                <footer class="entry-footer">
                    <?php _e( hw_get_post_categories() ); ?>
                    <?php _e( hw_get_post_tags() ); ?>
                </footer>
            <?php endif; ?>
        </article>
        <div class="col-md-4">
            <!-- Twitter -->
            <h2>Tweets</h2>
            <a class="twitter-timeline" href="https://twitter.com/harveyramos" data-widget-id="331604685595222016" data-chrome="nofooter">Tweets by @harveyramos</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <h2>Latest Posts
                <br /><small>more in <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" title="the blog">the Blog</a></small></h2>
            <?php
            $latestPosts = $frontPagePosts['latest']->get_posts();

            if ( $latestPosts ) :
                foreach ( array_chunk($latestPosts, 2) as $row ) : ?>
            <div class="row">
                <?php foreach ( $row as $post ) : ?>
                    <article class="col-md-6">
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php get_template_part('templates/entry-meta'); ?>
                        </header>
                        <div class="entry-content">
                            <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive'] ); ?>
                            <?php the_excerpt(); ?>
                        </div>
                        <footer class="entry-footer">
                            <?php _e( hw_get_post_categories() ); ?>
                            <?php _e( hw_get_post_tags() ); ?>
                        </footer>
                    </article>
                <?php endforeach; ?>
            </div>

                <?php endforeach;
            endif; ?>
            <p>Read more in <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" title="the blog">the Blog</a></p>
        </div>
    </div><!-- .row -->
</div><!-- .container -->