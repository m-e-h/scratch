<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Scratch
 */


if ( ! function_exists( 'scratch_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function scratch_entry_meta() {  ?>
	<div class="entry-byline">
	<span class="entry-format"><?php hybrid_post_format_link(); ?></span>
	<?php hybrid_post_author(); ?>
	<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
  <?php if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', '_s' ), __( '1 Comment', '_s' ), __( '% Comments', '_s' ) );
		echo '</span>';
	} ?>
	</div>
	<?php
	edit_post_link( esc_html__( 'Edit', 'scratch' ), '<span class="edit-link">', '</span>' );
}
endif;


if ( ! function_exists( 'scratch_post_terms' ) ) :
/**
 * Loop Title and Description
 */
function scratch_post_terms() {
		hybrid_post_terms( array(
			'taxonomy'	=> 'category',
			'sep' 		=> ' ',
			'before' 	=> '<br />'
			) );
		hybrid_post_terms( array(
			'taxonomy' 	=> 'post_tag',
			'sep' 		=> ' ',
			'before' 	=> '<br />'
			) );
}
endif;


if ( ! function_exists( 'scratch_loop_meta' ) ) :
/**
 * Loop Title and Description
 */
function scratch_loop_meta() { ?>
<div <?php hybrid_attr( 'loop-meta' ); ?>>

	<h1 <?php hybrid_attr( 'loop-title' ); ?>><?php hybrid_loop_title(); ?></h1>

	<?php if ( !is_paged() && $desc = hybrid_get_loop_description() ) : // Check if we're on page/1. ?>

		<div <?php hybrid_attr( 'loop-description' ); ?>>
			<?php echo $desc; ?>
		</div><!-- .loop-description -->

	<?php endif; // End paged check. ?>

</div><!-- .loop-meta -->
<?php }
endif;


