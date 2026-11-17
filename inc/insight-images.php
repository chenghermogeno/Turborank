<?php
/**
 * Fixed aspect ratio for Insights card / hero imagery (900×515).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** @var int Insight grid card, featured, and article hero width in pixels. */
define( 'TURBORANK_INSIGHT_CARD_WIDTH', 900 );

/** @var int Insight grid card, featured, and article hero height in pixels. */
define( 'TURBORANK_INSIGHT_CARD_HEIGHT', 515 );

/**
 * Registered size slug for hard-cropped insight thumbnails.
 *
 * @return string
 */
function turborank_insight_card_image_size() {
	return 'turborank-insight-card';
}

/**
 * Register theme image sizes used by Insights layouts.
 */
function turborank_register_insight_image_sizes() {
	add_image_size(
		turborank_insight_card_image_size(),
		TURBORANK_INSIGHT_CARD_WIDTH,
		TURBORANK_INSIGHT_CARD_HEIGHT,
		true
	);
}
add_action( 'after_setup_theme', 'turborank_register_insight_image_sizes', 11 );

/**
 * Human-readable size label in the Media Library.
 *
 * @param string[] $sizes Size slug => label.
 * @return string[]
 */
function turborank_insight_image_size_names( $sizes ) {
	$sizes[ turborank_insight_card_image_size() ] = sprintf(
		/* translators: 1: width, 2: height */
		__( 'TurboRank Insight card (%1$d×%2$d)', 'turborank' ),
		TURBORANK_INSIGHT_CARD_WIDTH,
		TURBORANK_INSIGHT_CARD_HEIGHT
	);
	return $sizes;
}
add_filter( 'image_size_names_choose', 'turborank_insight_image_size_names' );

/**
 * Default attributes for images inside the insight media frame.
 *
 * @return array<string, int|string>
 */
function turborank_insight_card_image_attrs() {
	return array(
		'width'    => TURBORANK_INSIGHT_CARD_WIDTH,
		'height'   => TURBORANK_INSIGHT_CARD_HEIGHT,
		'loading'  => 'lazy',
		'decoding' => 'async',
	);
}

/**
 * Image URL for a Media Library attachment at the insight card size.
 *
 * @param int $attachment_id Attachment ID.
 * @return string Empty when not an image.
 */
function turborank_insight_attachment_src( $attachment_id ) {
	$attachment_id = absint( $attachment_id );
	if ( ! $attachment_id || ! wp_attachment_is_image( $attachment_id ) ) {
		return '';
	}

	$src = wp_get_attachment_image_src( $attachment_id, turborank_insight_card_image_size() );
	if ( ! $src || empty( $src[0] ) ) {
		$src = wp_get_attachment_image_src( $attachment_id, 'full' );
	}

	return ( $src && ! empty( $src[0] ) ) ? (string) $src[0] : '';
}

/**
 * Render a cropped insight card image inside the fixed frame.
 *
 * @param string $src  Image URL.
 * @param string $alt  Alt text.
 * @param array<string, string> $extra Extra HTML attributes.
 */
function turborank_render_insight_card_image( $src, $alt = '', $extra = array() ) {
	if ( ! $src ) {
		return;
	}

	$attrs = array_merge(
		turborank_insight_card_image_attrs(),
		array(
			'src' => $src,
			'alt' => $alt,
		),
		$extra
	);

	$out = '<img';
	foreach ( $attrs as $key => $value ) {
		if ( '' === (string) $value && 'alt' !== $key ) {
			continue;
		}
		$out .= ' ' . esc_attr( $key ) . '="' . esc_attr( (string) $value ) . '"';
	}
	$out .= '>';

	// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
	echo $out;
}
