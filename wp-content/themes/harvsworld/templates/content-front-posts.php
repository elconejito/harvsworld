<?php
$frontPagePosts = Roots\Sage\Content\hw_home_posts();
if ( $frontPagePosts['latest']->have_posts() ) : ?>

<div id="profile" class="para-section light">
	<h2 class="text-center">Latest Posts
		<br /><small>more in <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Blog' ) ) ); ?>" title="the blog">the Blog</a></small></h2>
	<div class="container">
		<div class="main">
			<?php foreach ( array_chunk($frontPagePosts['latest']->get_posts(), 2) as $row ) : ?>
			<div class="row">
				<?php
				foreach ( $row as $post ) :
					setup_postdata( $post );
					get_template_part('templates/content-grid');
				endforeach;
				?>
			</div><!-- /.row -->
			<?php endforeach; ?>
		</div><!-- /.main -->
	</div><!-- /.container -->
</div><!-- /.para-section.light -->
<?php
endif;