<div id="profile" class="para-section light">
	<h2 class="text-center">Latest Posts
		<br /><small>more in <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" title="the blog">the Blog</a></small></h2>
	<div class="container">
		<div class="main">
		<?php $frontPagePosts = hw_home_posts(); if ( $frontPagePosts['latest']->have_posts() ) : foreach ( array_chunk($frontPagePosts['latest']->get_posts(), 2) as $row ) : ?>
			<div class="row">
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
			</div><!-- .row.posts-row -->

		<?php endforeach; endif; ?>
		</div>
	</div>
</div>