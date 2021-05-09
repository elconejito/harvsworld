<?php $zero = ( is_single() ? 'Leave a Comment' : '0 Comments' ); ?>
<div class="entry-meta">
	<time class="updated" datetime="<?= get_the_time('c'); ?>"><?= get_the_date(); ?></time> <?= __('by', 'sage'); ?> <a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a><?php if ( comments_open() || get_comments_number() ) :?>, <span class="comments-link"><?php comments_popup_link( __( $zero, 'sage' ), __( '1 Comment', 'sage' ), __( '% Comments', 'sage' ) ); ?></span><?php endif; ?>
</div>
