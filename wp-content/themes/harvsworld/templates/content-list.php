<article <?php post_class(); ?>>
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part( 'templates/entry-meta' ); ?>
	</header>
	<div class="row">
		<?php if ( '' != get_the_post_thumbnail() ) : $summaryColClass = 'col-md-9'; ?>
			<div class="col-md-3">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail', [ 'class' => 'img-responsive featured' ] ); ?></a>
			</div>
		<?php else : $summaryColClass = 'col-md-12'; endif; ?>
		<div class="entry-content <?php echo $summaryColClass; ?>">
			<?php the_excerpt(); ?>
		</div>
	</div>
	<footer class="entry-footer">
		<?php _e( Roots\Sage\Content\hw_get_post_categories() ); ?>
		<?php _e( Roots\Sage\Content\hw_get_post_tags() ); ?>
	</footer>
</article>
