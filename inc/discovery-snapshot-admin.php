<?php
/**
 * Discovery Snapshot report — admin meta box and duplication.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Meta box for report fields and duplication.
 */
function turborank_discovery_snapshot_register_meta_box() {
	add_meta_box(
		'turborank_discovery_snapshot',
		__( 'Discovery Snapshot report', 'turborank' ),
		'turborank_discovery_snapshot_meta_box_render',
		'page',
		'side',
		'high'
	);
}
add_action( 'add_meta_boxes', 'turborank_discovery_snapshot_register_meta_box' );

/**
 * @param WP_Post $post Current page.
 */
function turborank_discovery_snapshot_meta_box_render( $post ) {
	wp_nonce_field( 'turborank_discovery_snapshot_save', 'turborank_discovery_snapshot_nonce' );

	$uses_template = turborank_is_discovery_snapshot_page( $post );
	$meta          = turborank_get_discovery_snapshot_meta( $post->ID );

	if ( ! $uses_template ) {
		echo '<p>' . esc_html__( 'Choose the “Discovery Snapshot document” page template. The page renders as a standalone report (no site navigation or footer), suitable for opening in a new window for clients.', 'turborank' ) . '</p>';
	} else {
		echo '<p class="description">' . esc_html__( 'Standalone document view — no site header or footer. Share the public URL or open in a new tab for client review.', 'turborank' ) . '</p>';
	}

	echo '<p><label for="turborank_dsnap_brand"><strong>' . esc_html__( 'Brand name', 'turborank' ) . '</strong></label><br>';
	echo '<input type="text" class="widefat" id="turborank_dsnap_brand" name="turborank_dsnap_brand" value="' . esc_attr( $meta['brand'] ) . '"></p>';

	echo '<p><label for="turborank_dsnap_date"><strong>' . esc_html__( 'Report date', 'turborank' ) . '</strong></label><br>';
	echo '<input type="text" class="widefat" id="turborank_dsnap_date" name="turborank_dsnap_date" value="' . esc_attr( $meta['report_date'] ) . '"></p>';

	echo '<p><label for="turborank_dsnap_sample"><strong>' . esc_html__( 'Sample label', 'turborank' ) . '</strong></label><br>';
	echo '<input type="text" class="widefat" id="turborank_dsnap_sample" name="turborank_dsnap_sample" value="' . esc_attr( $meta['sample_label'] ) . '"></p>';

	if ( $uses_template && current_user_can( 'edit_pages' ) ) {
		$duplicate_url = wp_nonce_url(
			admin_url( 'admin-post.php?action=turborank_duplicate_discovery_snapshot&post=' . (int) $post->ID ),
			'turborank_duplicate_discovery_snapshot_' . (int) $post->ID
		);
		echo '<p><a class="button button-secondary" href="' . esc_url( $duplicate_url ) . '">' . esc_html__( 'Duplicate report', 'turborank' ) . '</a></p>';
		echo '<p class="description">' . esc_html__( 'Creates a draft copy with the same template and report fields.', 'turborank' ) . '</p>';
	}
}

/**
 * Save report meta from the classic editor meta box.
 *
 * @param int $post_id Post ID.
 */
function turborank_discovery_snapshot_save_meta_box( $post_id ) {
	if ( ! isset( $_POST['turborank_discovery_snapshot_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['turborank_discovery_snapshot_nonce'] ) ), 'turborank_discovery_snapshot_save' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	if ( wp_is_post_autosave( $post_id ) || wp_is_post_revision( $post_id ) ) {
		return;
	}

	$meta = turborank_sanitize_discovery_snapshot_meta(
		array(
			'brand'        => isset( $_POST['turborank_dsnap_brand'] ) ? wp_unslash( $_POST['turborank_dsnap_brand'] ) : '',
			'report_date'  => isset( $_POST['turborank_dsnap_date'] ) ? wp_unslash( $_POST['turborank_dsnap_date'] ) : '',
			'sample_label' => isset( $_POST['turborank_dsnap_sample'] ) ? wp_unslash( $_POST['turborank_dsnap_sample'] ) : '',
		)
	);

	update_post_meta( $post_id, TURBORANK_DISCOVERY_SNAPSHOT_META, $meta );
}
add_action( 'save_post_page', 'turborank_discovery_snapshot_save_meta_box' );

/**
 * Handle “Duplicate report” from the meta box.
 */
function turborank_discovery_snapshot_handle_duplicate() {
	if ( ! isset( $_GET['post'] ) ) {
		wp_die( esc_html__( 'Missing page.', 'turborank' ) );
	}

	$post_id = (int) $_GET['post'];
	check_admin_referer( 'turborank_duplicate_discovery_snapshot_' . $post_id );

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		wp_die( esc_html__( 'You cannot duplicate this report.', 'turborank' ) );
	}

	$new_id = turborank_duplicate_discovery_snapshot_page( $post_id );
	if ( is_wp_error( $new_id ) ) {
		wp_die( esc_html( $new_id->get_error_message() ) );
	}

	wp_safe_redirect( admin_url( 'post.php?post=' . $new_id . '&action=edit&turborank_dsnap_duplicated=1' ) );
	exit;
}
add_action( 'admin_post_turborank_duplicate_discovery_snapshot', 'turborank_discovery_snapshot_handle_duplicate' );

/**
 * Row action to duplicate a report from Pages list.
 *
 * @param array<string,string> $actions Row actions.
 * @param WP_Post              $post    Page.
 * @return array<string,string>
 */
function turborank_discovery_snapshot_row_actions( $actions, $post ) {
	if ( 'page' !== $post->post_type || ! turborank_is_discovery_snapshot_page( $post ) ) {
		return $actions;
	}

	if ( ! current_user_can( 'edit_page', $post->ID ) ) {
		return $actions;
	}

	$url = wp_nonce_url(
		admin_url( 'admin-post.php?action=turborank_duplicate_discovery_snapshot&post=' . (int) $post->ID ),
		'turborank_duplicate_discovery_snapshot_' . (int) $post->ID
	);

	$actions['turborank_duplicate_dsnap'] = '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Duplicate report', 'turborank' ) . '</a>';

	return $actions;
}
add_filter( 'page_row_actions', 'turborank_discovery_snapshot_row_actions', 10, 2 );

/**
 * Copy report meta when third-party duplicate plugins clone a page.
 *
 * @param array<int,string> $meta_keys Meta keys to copy.
 * @return array<int,string>
 */
function turborank_discovery_snapshot_duplicate_post_meta_keys( $meta_keys ) {
	$meta_keys[] = TURBORANK_DISCOVERY_SNAPSHOT_META;
	return $meta_keys;
}
add_filter( 'duplicate_post_meta_keys_filter', 'turborank_discovery_snapshot_duplicate_post_meta_keys' );
