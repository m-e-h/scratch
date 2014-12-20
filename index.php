<?php
/**
 * The main template file.
 *
 * @package Scratch
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main <?php hybrid_attr( 'content' ); ?>>

		<?php if ( !is_front_page() && !is_singular() && !is_404() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

		<?php endif; // End check for multi-post page. ?>

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php hybrid_get_content_template(); // Loads the content/*.php template. ?>

				<?php if ( is_singular() ) : ?>

					<?php comments_template( '', true ); // Loads the comments.php template. ?>

				<?php endif; // End check for single post. ?>

			<?php endwhile; // End loop. ?>

			<?php 
				if ( is_singular( 'post' ) ) :
					the_post_navigation();
				elseif ( is_home() || is_archive() || is_search() ) :
					the_posts_pagination();
				endif; // End nav-loop. 
			?>

		<?php else : //If no content found. ?>

			<?php get_template_part( 'content/none' ); ?>

		<?php endif; // End check for posts. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php hybrid_get_sidebar( 'primary' ); ?>
<?php get_footer(); ?>
