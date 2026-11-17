<?php
/**
 * Discovery Snapshot block — front-end render.
 *
 * @package TurboRank
 *
 * @var array<string, mixed> $attributes Block attributes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo turborank_render_discovery_snapshot_card( $attributes ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
