<?php
/**
 * Discovery Snapshot — standalone document viewing (no site chrome).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Extra body classes for document presentation.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function turborank_discovery_snapshot_document_body_class( $classes ) {
	if ( ! turborank_is_discovery_snapshot_page() ) {
		return $classes;
	}

	$classes[] = 'tr-dsnap-document-view';

	return $classes;
}
add_filter( 'body_class', 'turborank_discovery_snapshot_document_body_class', 20 );
