<!-- Carousel
================================================== -->
<div id="homeCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homeCarousel" data-slide-to="1"></li>
        <li data-target="#homeCarousel" data-slide-to="2"></li>
    </ol>
    <!-- carousel frame -->
    <div class="carousel-inner">
        <?php
        $slideClass = 'item active';
        $count = 0;
        if ( $latestPosts->have_posts() ) : while ( $latestPosts->have_posts() && $count < 3 ) : 
            $latestPosts->the_post();
            $do_not_duplicate[] = $post->ID;
        ?>
        <div class="<?php _e($slideClass); ?>">
            <div class="container">
                <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'large' ); ?>
                <div class="carousel-caption">
                    <h1><?php the_title(); ?></h1>
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn-lg btn-primary" href="<?php the_permalink(); ?>" role="button">Read More</a></p>
                </div>
            </div>
        </div>
        <?php
            $slideClass = 'item';
            $count++;
        endwhile; else:
        ?>
        <div class="<?php _e($slideClass); ?>">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Welcome to Harv's World.</h1>
                </div>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>
    <!-- carousel controls -->
    <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->