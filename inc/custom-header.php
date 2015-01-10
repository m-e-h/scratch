<?php
/**
 * @package Scratch
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses scratch_header_style()
 * @uses scratch_admin_header_style()
 * @uses scratch_admin_header_image()
 */

/* Call late so child themes can override. */
add_action( 'after_setup_theme', 'scratch_custom_header_setup', 15 );

/**
 * Adds support for the WordPress 'custom-header' theme feature and registers custom headers.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function scratch_custom_header_setup() {

	/* Adds support for WordPress' "custom-header" feature. */
	add_theme_support(
		'custom-header',
		array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 1220,
			'height'                 => 400,
			'flex-width'             => true,
			'flex-height'            => true,
			'default-text-color'     => 'fafafa',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => 'scratch_custom_header_wp_head',
		)
	);

	/* Registers default headers for the theme. */
	//register_default_headers();
}

/**
 * Callback function for outputting the custom header CSS to `wp_head`.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */


function scratch_custom_header_wp_head() {

	if ( !display_header_text() )
		return;

	$hex = get_header_textcolor();
	if ( empty( $hex ) )
		return;

	$style = '';

	$rgb = hybrid_hex_to_rgb( $hex );

	$style .= ".site-title, .site-title a, .site-footer a { color: #{$hex} }";

	$style .= ".site-description, .site-footer { color: rgba( {$rgb['r']}, {$rgb['g']}, {$rgb['b']}, 0.75 ); }";

	echo "\n" . '<style type="text/css" id="custom-header-css">' . trim( $style ) . '</style>' . "\n";
}
