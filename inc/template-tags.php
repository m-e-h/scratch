<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Scratch
 */


if ( ! function_exists( 'scratch_loop_meta' ) ) :
/**
 * Loop Title and Description
 */
function scratch_loop_meta() { ?>
<div <?php hybrid_attr( 'loop-meta' ); ?>>

	<div <?php hybrid_attr( 'wrap', 'loop-meta' ); ?>>

		<h1 <?php hybrid_attr( 'loop-title' ); ?>><?php hybrid_loop_title(); ?></h1>

		<?php if ( is_category() || is_tax() ) : ?>

			<?php hybrid_get_menu( 'sub-terms' ); ?>

		<?php endif; ?>

		<?php if ( ! is_paged() && $desc = hybrid_get_loop_description() ) : ?>

			<div <?php hybrid_attr( 'loop-description' ); ?>>
				<?php echo $desc; ?>
			</div><!-- .loop-description -->

		<?php endif; ?>

	</div>

</div><!-- .loop-meta -->
<?php }
endif;


if ( ! function_exists( 'scratch_loop_nav' ) ) :

function scratch_loop_nav() {

	if ( is_singular( 'post' ) ) :
		the_post_navigation( array(
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( '&larr;', 'scratch' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous article:', 'scratch' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'next_text' => '<span class="screen-reader-text">' . __( 'Next article:', 'scratch' ) . '</span>
				<span class="post-title">%title</span>
				<span class="meta-nav" aria-hidden="true">' . __( '&rarr;', 'scratch' ) . '</span> ',
		) );



	elseif ( is_home() || is_archive() || is_search() ) :
		the_posts_pagination( array(
			'prev_text'          => __( '<', 'scratch' ),
			'next_text'          => __( '>', 'scratch' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'scratch' ) . ' </span>',
		) );
	endif; // End nav-loop.

}
endif;


if ( ! function_exists( 'scratch_comments_nav' ) ) :
/**
 * Displays comment pagination.
 */
function scratch_comments_nav() {

if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : ?>

	<nav class="comments-nav" role="navigation" aria-labelledby="comments-nav-title">

		<h3 id="comments-nav-title" class="screen-reader-text"><?php _e( 'Comments Navigation', 'scratch' ); ?></h3>

		<?php previous_comments_link( _x( '&larr; Previous', 'comments navigation', 'scratch' ) ); ?>

		<span class="page-numbers"><?php
			// Translators: Comments page numbers. 1 is current page and 2 is total pages.
			printf( __( 'Page %1$s of %2$s', 'scratch' ), get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1, get_comment_pages_count() );
		?></span>

		<?php next_comments_link( _x( 'Next &rarr;', 'comments navigation', 'scratch' ) ); ?>

	</nav><!-- .comments-nav -->

	<?php

endif;
}
endif;


if ( ! function_exists( 'scratch_comments_error' ) ) :
/**
 * Displays when comments are closed.
 */
function scratch_comments_error() {

if ( pings_open() && ! comments_open() ) : ?>

	<p class="comments-closed pings-open">
		<?php
			// Translators: The two %s are placeholders for HTML. The order can't be changed.
			printf( __( 'Comments are closed, but %strackbacks%s and pingbacks are open.', 'scratch' ), '<a href="' . esc_url( get_trackback_url() ) . '">', '</a>' );
		?>
	</p><!-- .comments-closed .pings-open -->
	<?php

endif;

if ( ! comments_open() ) : ?>

	<p class="comments-closed">
		<?php _e( 'Comments are closed.', 'scratch' ); ?>
	</p><!-- .comments-closed -->

	<?php

endif;
}
endif;


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
