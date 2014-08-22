<?php
$zero = ( is_single() ? 'Leave a comment' : '0 Comments' );
?>

<p class="entry-meta byline author vcard">
    <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time> <?php echo __('by', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a>
    - <?php if ( comments_open() || get_comments_number() ) :?><span class="comments-link"><?php comments_popup_link( __( $zero, 'roots' ), __( '1 Comment', 'roots' ), __( '% Comments', 'roots' ) ); ?></span><?php endif; ?>
</p>
