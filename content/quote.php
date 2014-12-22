<?php
/**
 * @package Scratch
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

<?php if ( is_single( get_the_ID() ) ) : ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

<?php else : // If not viewing a single post. ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

<?php endif; // End single post check. ?>

	<footer class="entry-footer">
	  <?php scratch_entry_meta(); ?>
	  <?php scratch_post_terms(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- .entry -->