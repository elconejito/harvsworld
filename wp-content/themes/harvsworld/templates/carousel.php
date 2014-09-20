<!-- Carousel
================================================== -->
<div id="homeCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $indicatorClass = 'active';
        for ( $i = 0; $i < count($frontPagePosts['featured']->posts); $i++) :
            ?>
        <li data-target="#homeCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $indicatorClass; ?>"></li>
            <?php
            $indicatorClass = '';
        endfor;
        ?>
    </ol>
    <!-- carousel frame -->
    <div class="carousel-inner">
        <?php
        $slideClass = 'item active';
        $count = 0;
        if ( $frontPagePosts['featured']->have_posts() ) : while ( $frontPagePosts['featured']->have_posts() ) :
            $frontPagePosts['featured']->the_post();
        ?>
        <div class="<?php _e($slideClass); ?>">
            <div class="container">
                <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'carousel' ); ?>
                <div class="carousel-caption">
                    <h3><?php the_title(); ?></h3>
                    <p><a class="btn btn-primary" href="<?php the_permalink(); ?>" role="button">Read More</a></p>
                </div>
            </div>
        </div>
        <?php
            $slideClass = 'item';
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
