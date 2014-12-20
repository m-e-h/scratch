<?php
/**
 * Register menus, sidebars, scripts and styles.
 *
 * @package Scratch
 */

/* Register custom image sizes. */
add_action( 'init', 'scratch_image_sizes', 5 );

/* Register custom menus. */
add_action( 'init', 'scratch_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'scratch_sidebars', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'scratch_scripts', 5 );

/* Add custom styles. */
add_action( 'wp_enqueue_scripts', 'scratch_styles', 5 );


function scratch_image_sizes() {
	set_post_thumbnail_size( 150, 150, true );
}

function scratch_menus() {
	register_nav_menu( 'primary', _x( 'Primary', 'nav menu location', 'scratch' ) );
}

function scratch_sidebars() {
	hybrid_register_sidebar( array(
		'id'          => 'primary',
		'name'        => _x( 'Primary', 'sidebar', 'scratch' ),
		'description' => __( 'The Primary sidebar.', 'scratch' )
	) );

	hybrid_register_sidebar( array(
		'id'          => 'subsidiary',
		'name'        => _x( 'Subsidiary', 'sidebar', 'scratch' ),
		'description' => __( 'Typically located in the footer.', 'scratch' )
	) );
}

function scratch_scripts() {

	$suffix = hybrid_get_min_suffix();

	wp_enqueue_script( 'scratch-navigation', trailingslashit( get_template_directory_uri() ) . 'js/navigation.js', array(), null, true );
}

function scratch_styles() {
	$suffix = hybrid_get_min_suffix();

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

	wp_enqueue_style( 'scratch-fonts', '//fonts.googleapis.com/css?family=RobotoDraft:regular,bold,italic,thin,light,bolditalic,black,medium' );

	if ( is_child_theme() )
		wp_enqueue_style( 'parent', trailingslashit( get_template_directory_uri() ) . "style{$suffix}.css" );

	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
