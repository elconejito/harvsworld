<?php
use Roots\Sage\Titles;
use Roots\Sage\Gallery;
?>
<div <?php Gallery\hw_header_featured_background(); ?>>
	<header class="container page-header">
		<?php if ( is_front_page() ) : ?>
			<h1><?php echo get_bloginfo('name'); ?></h1>
			<p><?php echo get_bloginfo('description'); ?></p>
		<?php elseif ( is_home() ) : ?>
			<h1><?= Titles\title(); ?></h1>
			<p>Beware. Ramblings below.</p>
		<?php elseif ( is_single() ) : ?>
			<h1><?= Titles\title(); ?></h1>
		<?php elseif ( is_page() ) : ?>
			<h1><?= Titles\title(); ?></h1>
		<?php elseif ( is_category() ) : ?>
			<h1><?php single_cat_title(); ?><br /><small>category</small></h1>
		<?php else : ?>
			<h1><?= Titles\title(); ?></h1>
			<p>no idea what</p>
		<?php endif; ?>
	</header>
</div>
