<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sideblock
 * @since 1.0.0
 */

/**
 * The theme version.
 *
 * @since 1.0.0
 */
define( 'SIDEBLOCK_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Add theme support.
 */
function sideblock_setup() {
	add_theme_support( 'wp-block-styles' );
	add_editor_style( './assets/css/style-shared.min.css' );

	/*
	 * Load additional block styles.
	 * See details on how to add more styles in the readme.txt.
	 */
	$styled_blocks = [ 'button', 'file', 'post-title', 'quote', 'search' ];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "sideblock-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.min.css" ),
			$args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.min.css" ),
		);
		// Replace the "core" prefix if you are styling blocks from plugins.
		wp_enqueue_block_style( "core/$block_name", $args );
	}
}
add_action( 'after_setup_theme', 'sideblock_setup' );

/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function sideblock_styles() {
	wp_enqueue_style(
		'sideblock-style',
		get_stylesheet_uri(),
		[],
		SIDEBLOCK_VERSION
	);
	wp_enqueue_style(
		'sideblock-shared-styles',
		get_theme_file_uri( 'assets/css/style-shared.min.css' ),
		[],
		SIDEBLOCK_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'sideblock_styles' );

// Block style examples.
require_once get_theme_file_path( 'inc/register-block-styles.php' );

// Block pattern and block category examples.
require_once get_theme_file_path( 'patterns/register-block-patterns.php' );
