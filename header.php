<?php
/**
 * @package Scratch
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php wp_head(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'scratch' ); ?></a>

		<header <?php hybrid_attr( 'header' ); ?>>
			<div class="site-branding">
				<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><span></span></button>
				<?php hybrid_site_title(); ?>
				<?php hybrid_site_description(); ?>
			</div><!-- .site-branding -->
		</header><!-- #header -->

		<?php hybrid_get_menu( 'primary' ); // Loads the menu/primary.php template. ?>

		<div id="container" class="site-container">

		<?php hybrid_get_menu( 'breadcrumbs' ); // Loads the menu/breadcrumbs.php template. ?>
