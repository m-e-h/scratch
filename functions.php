<?php
/**
 * Scratch functions and definitions
 *
 * @package Scratch
 */

/* Get the template directory and make sure it has a trailing slash. */
$scratch_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and theme files. */
require_once( $scratch_dir . 'library/hybrid.php'        );
require_once( $scratch_dir . 'inc/custom-background.php' );
require_once( $scratch_dir . 'inc/custom-header.php'     );
require_once( $scratch_dir . 'inc/customizer.php'        );
require_once( $scratch_dir . 'inc/template-tags.php'     );
require_once( $scratch_dir . 'inc/theme.php'             );

/* Launch the Hybrid Core framework. */
new Hybrid();

/* Set up the theme early. */
add_action( 'after_setup_theme', 'scratch_setup', 5 );

/**
 * Theme defaults and support for various WordPress & framework features.
 */
function scratch_setup() {

	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );

	/* Breadcrumbs. */
	add_theme_support( 'breadcrumb-trail' );

	/* Nicer [gallery] shortcode implementation. */
	//add_theme_support( 'cleaner-gallery' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );

	/*  Post Thumbnails on posts and pages. */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	//add_theme_support( 'title-tag' );

	/* Theme layouts. */
	add_theme_support( 'theme-layouts', array(
			'1c'  	=> __( '1 Column', 'scratch' ),
			'2c-l' 	=> __( '2 Columns: Content / Sidebar', 'scratch' ),
			'2c-r' 	=> __( '2 Columns: Sidebar / Content', 'scratch' )
		),
		array( 'default' => is_rtl() ? '2c-r' :'2c-l' )
	);

	/* Post Formats. */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status',
		'video'
	) );
}

/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}
