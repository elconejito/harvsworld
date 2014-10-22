<?php
$zero = ( is_single() ? '' : '0 Comments' );
?>

<p class="entry-meta byline author vcard">
	<span>
    <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
    <?php if ( comments_open() || get_comments_number() ) :?><span class="comments-link"><?php comments_popup_link( __( $zero, 'roots' ), __( '1 Comment', 'roots' ), __( '% Comments', 'roots' ) ); ?></span><?php endif; ?>
	</span>
</p>
