<?php
/**
 * Discovery Snapshot report data, page detection, and duplication.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const TURBORANK_DISCOVERY_SNAPSHOT_META = 'turborank_discovery_snapshot';

/**
 * Page template slug for client Discovery Snapshot reports.
 *
 * @return string
 */
function turborank_discovery_snapshot_template_slug() {
	return 'page-discovery-snapshot';
}

/**
 * Whether the given page uses the Discovery Snapshot report template.
 *
 * @param WP_Post|int|null $post Post object or ID.
 * @return bool
 */
function turborank_is_discovery_snapshot_page( $post = null ) {
	$post = get_post( $post );
	if ( ! $post || 'page' !== $post->post_type ) {
		return false;
	}

	return turborank_discovery_snapshot_template_slug() === get_page_template_slug( $post );
}

/**
 * Default meta for a new report (illustrative sample).
 *
 * @return array<string, string>
 */
function turborank_discovery_snapshot_default_meta() {
	return array(
		'brand'        => '[Brand]',
		'report_date'  => '[Date]',
		'sample_label' => 'Sample report, illustrative data',
	);
}

/**
 * Stored report meta merged with defaults.
 *
 * @param int $post_id Post ID.
 * @return array<string, string>
 */
function turborank_get_discovery_snapshot_meta( $post_id = 0 ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	$stored  = get_post_meta( $post_id, TURBORANK_DISCOVERY_SNAPSHOT_META, true );
	$meta    = turborank_discovery_snapshot_default_meta();

	if ( is_array( $stored ) ) {
		$meta = array_merge( $meta, array_intersect_key( $stored, $meta ) );
	}

	return $meta;
}

/**
 * Replace bracket placeholders in report copy.
 *
 * @param string               $text Copy with [Brand], [Date], [N], etc.
 * @param array<string,string> $meta Report meta.
 * @return string
 */
function turborank_discovery_snapshot_replace_tokens( $text, $meta ) {
	$map = array(
		'[Brand]'       => $meta['brand'],
		'[Your brand]'  => $meta['brand'],
		'[your brand]'  => $meta['brand'],
		'[Date]'        => $meta['report_date'],
		'[date range]'  => $meta['report_date'],
	);

	return strtr( $text, $map );
}

/**
 * Echo escaped report copy with placeholders replaced.
 *
 * @param string               $text Copy.
 * @param array<string,string> $meta Report meta.
 */
function turborank_discovery_snapshot_echo( $text, $meta ) {
	echo esc_html( turborank_discovery_snapshot_replace_tokens( $text, $meta ) );
}

/**
 * Persist default meta when a page first uses the report template.
 *
 * @param int $post_id Post ID.
 */
function turborank_seed_discovery_snapshot_meta( $post_id ) {
	$post_id = (int) $post_id;
	if ( ! $post_id || get_post_meta( $post_id, TURBORANK_DISCOVERY_SNAPSHOT_META, true ) ) {
		return;
	}

	update_post_meta( $post_id, TURBORANK_DISCOVERY_SNAPSHOT_META, turborank_discovery_snapshot_default_meta() );
}

/**
 * Duplicate a Discovery Snapshot page (template + report meta).
 *
 * @param int $source_id Source page ID.
 * @return int|WP_Error New page ID or error.
 */
function turborank_duplicate_discovery_snapshot_page( $source_id ) {
	$source = get_post( $source_id );
	if ( ! $source || 'page' !== $source->post_type ) {
		return new WP_Error( 'invalid_source', __( 'Invalid page.', 'turborank' ) );
	}

	if ( ! turborank_is_discovery_snapshot_page( $source ) ) {
		return new WP_Error( 'wrong_template', __( 'This page is not a Discovery Snapshot report.', 'turborank' ) );
	}

	$new_id = wp_insert_post(
		array(
			'post_title'   => sprintf(
				/* translators: %s: source page title */
				__( '%s (Copy)', 'turborank' ),
				$source->post_title
			),
			'post_status'  => 'draft',
			'post_type'    => 'page',
			'post_content' => $source->post_content,
		),
		true
	);

	if ( is_wp_error( $new_id ) ) {
		return $new_id;
	}

	update_post_meta( $new_id, '_wp_page_template', turborank_discovery_snapshot_template_slug() );

	$meta = get_post_meta( $source_id, TURBORANK_DISCOVERY_SNAPSHOT_META, true );
	if ( ! is_array( $meta ) ) {
		$meta = turborank_discovery_snapshot_default_meta();
	}
	update_post_meta( $new_id, TURBORANK_DISCOVERY_SNAPSHOT_META, $meta );

	return (int) $new_id;
}

/**
 * Seed meta when the report template is assigned.
 *
 * @param int $post_id Post ID.
 */
function turborank_discovery_snapshot_maybe_seed_meta( $post_id ) {
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) ) {
		return;
	}

	if ( ! turborank_is_discovery_snapshot_page( $post_id ) ) {
		return;
	}

	turborank_seed_discovery_snapshot_meta( $post_id );
}
add_action( 'save_post_page', 'turborank_discovery_snapshot_maybe_seed_meta', 20 );

/**
 * Register report meta for the block editor REST API.
 */
function turborank_discovery_snapshot_register_meta() {
	register_post_meta(
		'page',
		TURBORANK_DISCOVERY_SNAPSHOT_META,
		array(
			'type'              => 'object',
			'single'              => true,
			'show_in_rest'        => array(
				'schema' => array(
					'type'       => 'object',
					'properties' => array(
						'brand'        => array( 'type' => 'string' ),
						'report_date'  => array( 'type' => 'string' ),
						'sample_label' => array( 'type' => 'string' ),
					),
				),
			),
			'auth_callback'       => function () {
				return current_user_can( 'edit_pages' );
			},
			'sanitize_callback'   => 'turborank_sanitize_discovery_snapshot_meta',
		)
	);
}
add_action( 'init', 'turborank_discovery_snapshot_register_meta' );

/**
 * Sanitize report meta from admin or REST.
 *
 * @param mixed $value Raw meta.
 * @return array<string, string>
 */
function turborank_sanitize_discovery_snapshot_meta( $value ) {
	$defaults = turborank_discovery_snapshot_default_meta();
	if ( ! is_array( $value ) ) {
		return $defaults;
	}

	return array(
		'brand'        => sanitize_text_field( $value['brand'] ?? $defaults['brand'] ),
		'report_date'  => sanitize_text_field( $value['report_date'] ?? $defaults['report_date'] ),
		'sample_label' => sanitize_text_field( $value['sample_label'] ?? $defaults['sample_label'] ),
	);
}
