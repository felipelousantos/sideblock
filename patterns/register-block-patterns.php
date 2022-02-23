<?php
/**
 * Block patterns
 *
 * @package sideblock
 * @since 1.0.0
 */

/**
 * Display a link to the privacy policy page, if one is published.

 * @since 1.0.0
 *
 * @return string Link to the privacy policy page, if one is published.
 */
function sideblock_privacy() {
	if ( get_the_privacy_policy_link() ) {
		return '<!-- wp:paragraph {"fontSize":"extra-small"} --><p class="has-extra-small-font-size">' . get_the_privacy_policy_link() . '</p><!-- /wp:paragraph -->';
	}
}

/**
 * Registers block patterns and block pattern categories.
 *
 * @since 1.0.0
 *
 * @return void
 */
function sideblock_register_block_patterns() {

	// Array of block pattern names.
	$block_patterns = array(
		'404',
		'footer-links',
		'columns-with-images',
	);

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( 'patterns/' . $block_pattern . '.php' );
		register_block_pattern(
			'sideblock/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'sideblock_register_block_patterns', 9 );
