<?php
/**
 * The main template file.
 *
 * @package Scratch
 */

get_header(); ?>

	<div id="primary" class="content-area">

	  <?php tha_content_before(); ?>

		<main <?php hybrid_attr( 'content' ); ?>>

		<?php tha_content_top(); ?>

		<?php if ( !is_front_page() && !is_singular() && !is_404() ) : ?>

			<?php scratch_loop_meta(); ?>

		<?php endif; // End check for multi-post page. ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>

				<?php
					if ( is_singular( 'post' ) ) :
    					scratch_loop_nav();
    				endif;
    				if ( is_singular() && ( comments_open() || get_comments_number() )) :
    					comments_template();
    				endif;
				?>

			<?php endwhile; // End loop. ?>

			<?php
  				if ( is_home() || is_archive() || is_search() ) :
  				scratch_loop_nav();
  				endif; // End nav-loop.
			?>

		<?php else : //If no content found. ?>

			<?php get_template_part( 'content/none' ); ?>

		<?php endif; // End check for posts. ?>

		<?php tha_content_bottom(); ?>

		</main><!-- #main -->

		<?php tha_content_after(); ?>

	</div><!-- #primary -->

<?php hybrid_get_sidebar( 'primary' ); ?>
<?php
get_footer();
