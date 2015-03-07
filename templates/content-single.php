<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<?php get_template_part( 'templates/entry-meta' ); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages( [
				'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ),
				'after'  => '</p></nav>'
			] ); ?>
		</footer>
		<nav class="post-nav">
			<ul class="pager">
				<li class="previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></li>
				<li class="next"><?php next_post_link( '%link', '%title &rarr;' ); ?></li>
			</ul>
		</nav>
		<?php comments_template( '/templates/comments.php' ); ?>
	</article>
<?php endwhile; ?>
