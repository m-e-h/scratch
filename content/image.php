<?php
/**
 * @package Scratch
 */
?>

<article <?php hybrid_attr( 'post' ); ?>>

<?php if ( is_single( get_the_ID() ) ) : ?>

	<header class="entry-header">
		<h1 <?php hybrid_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h1>
	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-content' ); ?>>
		<?php get_the_image(); ?>
		<?php the_content(); ?>
		<?php wp_link_pages(); ?>
	</div><!-- .entry-content -->

<?php else : // If not viewing a single post. ?>

	<header class="entry-header">
		<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-summary' ); ?>>
		<?php get_the_image(); ?>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

<?php endif; // End single post check. ?>

	<footer class="entry-footer">
	  <?php scratch_entry_meta(); ?>
	  <?php scratch_post_terms(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- .entry -->