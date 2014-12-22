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
	<span class="entry-format">
		<?php hybrid_post_format_link(); ?>
	</span>
	<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?>
	</span>
	<span class="entry-date">
		<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
	</span>
	<span class="comments-link">
		<?php comments_popup_link( false, false, false, false ); ?>
	</span>
	<?php edit_post_link( esc_html__( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>

	<?php
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
	?>
<?php }
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

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

