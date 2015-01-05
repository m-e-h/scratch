<?php
/**
 * @package Scratch
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>
<span class="entry-format"><?php hybrid_post_format_link(); ?></span>
<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	  <?php scratch_entry_meta(); ?>
	  <?php scratch_post_terms(); ?>
	</footer><!-- .entry-footer -->

<?php else : // If not viewing a single post. ?>

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

<?php endif; // End single post check. ?>

</article><!-- .entry -->
