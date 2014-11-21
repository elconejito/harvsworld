<div id="profile" class="para-section dark">
	<h2 class="text-center">Profile</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h3>About Me</h3>
				<p><?php $user = get_user_by( 'slug', 'harvey' ); the_author_meta('description', $user->ID); ?></p>
				<p><a href="about">more...</a></p>
			</div>
			<div class="col-md-6">
				<img src="#" class="img-responsive">
			</div>
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-5">
				<?php dynamic_sidebar('sidebar-home-left'); ?>
			</div>
			<div class="col-md-7">
				<?php dynamic_sidebar('sidebar-home-right'); ?>
			</div>
		</div><!-- /.row -->
	</div>
</div>