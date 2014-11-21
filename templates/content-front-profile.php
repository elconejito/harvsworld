<div id="profile" class="para-section dark">
	<h2 class="text-center">Profile</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<h3>About Me</h3>
				<p><?php $user = get_user_by( 'slug', 'harvey' ); the_author_meta('description', $user->ID); ?></p>
				<p><a href="about">more about Harvey...</a></p>
				<h3>Follow Me</h3>
				<ul class="list-inline">
					<li>
						<a href="https://twitter.com/harveyramos" target="_blank" title="Twitter">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/harvey.ramos" target="_blank" title="Facebook">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="http://instagram.com/elconejito75" target="_blank" title="Instagram">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://plus.google.com/+HarveyRamos/posts" target="_blank" title="Google+">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://github.com/elconejito" target="_blank" title="GitHub">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-github fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://www.linkedin.com/in/harveyramos" target="_blank" title="LinkedIn">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
					<li>
						<a href="https://www.youtube.com/user/elconejito75" target="_blank" title="YouTube">
							<span class="fa-stack fa-lg">
	                            <i class="fa fa-square fa-stack-2x"></i>
								<i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-7">
				<div class="thumbnail">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/harvey.png" class="img-responsive">
					<div class="caption">
						<p>On the left I'm comfortable in my native habitat. But I've been told I clean up real nice too.</p>
					</div>
				</div>
			</div>
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-6">
				<?php dynamic_sidebar('sidebar-home-left'); ?>
			</div>
			<div class="col-md-6">
				<?php dynamic_sidebar('sidebar-home-right'); ?>
			</div>
		</div><!-- /.row -->
	</div>
</div>