<div class="container">
    <!-- Three columns of text below the carousel -->
    <div class="row posts-row">
        <article class="col-md-4 widget">
            <div class="page-header">
                <h2>Coding &amp; Dev
                    <br /><small>more in <a href="<?php echo esc_url( get_category_link( get_cat_ID('coding') ) ); ?>" title="Coding Category">Coding</a></small></h2>
            </div>
            <?php if ( $frontPagePosts['coding']->have_posts() ) : $frontPagePosts['coding']->the_post(); ?>
                <header class="entry-header">
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php get_template_part('templates/entry-meta'); ?>
                </header>
                <div class="entry-content">
                    <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive featured'] ); ?></a>
                    <?php the_excerpt(); ?>
                </div>
                <footer class="entry-footer">
                    <?php _e( hw_get_post_categories() ); ?>
                    <?php _e( hw_get_post_tags() ); ?>
                </footer>
            <?php endif; ?>
        </article>
        <article class="col-md-4 widget">
            <div class="page-header">
                <h2>Quick Hits
                    <br /><small>more in <a href="<?php echo esc_url( get_category_link( get_cat_ID('quick hits') ) ); ?>" title="Quick HitsCategory">Quick Hits</a></small></h2>
            </div>
            <?php if ( $frontPagePosts['quick']->have_posts() ) : $frontPagePosts['quick']->the_post(); ?>
                <header class="entry-header">
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php get_template_part('templates/entry-meta'); ?>
                </header>
                <div class="entry-content">
                    <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive featured'] ); ?></a>
                    <?php the_excerpt(); ?>
                </div>
                <footer class="entry-footer">
                    <?php _e( hw_get_post_categories() ); ?>
                    <?php _e( hw_get_post_tags() ); ?>
                </footer>
            <?php endif; ?>
        </article>
        <?php dynamic_sidebar('sidebar-front'); ?>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Latest Posts
                    <br /><small>more in <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" title="the blog">the Blog</a></small></h2>
            </div>
            <?php
            if ( $frontPagePosts['latest']->have_posts() ) :
                foreach ( array_chunk($frontPagePosts['latest']->get_posts(), 2) as $row ) : ?>
            <div class="row posts-row">
                <?php foreach ( $row as $post ) : setup_postdata( $post ); ?>
                    <article class="col-md-6 hentry">
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php get_template_part('templates/entry-meta'); ?>
                        </header>
                        <div class="entry-content">
                            <a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'featured', [ 'class' => 'img-responsive featured'] ); ?></a>
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