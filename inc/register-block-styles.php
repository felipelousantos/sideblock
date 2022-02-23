<?php
/**
 * Block styles.
 *
 * @package sideblock
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function sideblock_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'sideblock-flat-button',
			'label' => __( 'Flat button', 'sideblock' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'sideblock-shadow-button',
			'label' => __( 'Button with shadow', 'sideblock' ),
		)
	);
}
add_action( 'init', 'sideblock_register_block_styles' );
