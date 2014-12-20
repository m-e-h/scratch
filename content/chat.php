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

		<?php if ( has_excerpt() ) : ?>

			<div <?php hybrid_attr( 'entry-summary' ); ?>>
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		<?php endif; // End post excerpt check. ?>

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->

<?php else : // If not viewing a single post. ?>

	<header class="entry-header">
		<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div <?php hybrid_attr( 'entry-summary' ); ?>>
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

<?php endif; // End single post check. ?>

	<footer class="entry-footer">
		<?php hybrid_post_format_link(); ?>
		<span <?php hybrid_attr( 'entry-author' ); ?>><?php the_author_posts_link(); ?></span>
		<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
		<?php comments_popup_link( false, false, false, 'comments-link' ); ?>
		<?php edit_post_link(); ?>

		<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'sep' => ' ','before' => '<br />'	) ); ?>
		<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'sep' => ' ','before' => '<br />'	) ); ?>
	</footer><!-- .entry-footer -->

</article><!-- .entry -->