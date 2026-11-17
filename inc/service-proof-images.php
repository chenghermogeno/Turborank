<?php
/**
 * Editable citation screenshots for service page “Documented … citations” blocks.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Page templates that expose the proof screenshot meta box.
 *
 * @return string[]
 */
function turborank_proof_image_page_templates() {
	return array(
		'page-youtube-discovery.html',
		'page-brand-authority.html',
	);
}

/**
 * Whether a page uses a service template with proof screenshots.
 *
 * @param WP_Post|int|null $post Post object or ID.
 * @return bool
 */
function turborank_proof_images_applies_to_page( $post = null ) {
	$post = get_post( $post );
	if ( ! $post || 'page' !== $post->post_type ) {
		return false;
	}

	return in_array( get_page_template_slug( $post ), turborank_proof_image_page_templates(), true );
}

/**
 * Stored attachment IDs for the current (or given) service page.
 *
 * @param int $post_id Post ID.
 * @return int[] Three attachment IDs (0 = placeholder).
 */
function turborank_get_proof_image_ids( $post_id = 0 ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	$stored  = get_post_meta( $post_id, 'turborank_proof_images', true );
	$ids     = array( 0, 0, 0 );

	if ( is_array( $stored ) ) {
		foreach ( array( 0, 1, 2 ) as $i ) {
			$ids[ $i ] = isset( $stored[ $i ] ) ? absint( $stored[ $i ] ) : 0;
		}
	}

	return $ids;
}

/**
 * Render screenshot area for one citation card.
 *
 * @param int    $index            Zero-based card index (0–2).
 * @param string $placeholder_text Shown when no image is uploaded.
 */
function turborank_render_proof_shot( $index, $placeholder_text = '' ) {
	$index         = (int) $index;
	$ids           = turborank_get_proof_image_ids();
	$attachment_id = isset( $ids[ $index ] ) ? (int) $ids[ $index ] : 0;

	if ( $attachment_id && wp_attachment_is_image( $attachment_id ) ) {
		echo wp_get_attachment_image(
			$attachment_id,
			'large',
			false,
			array(
				'class'   => 'tr-proof-card__img',
				'loading' => 'lazy',
				'alt'     => '',
			)
		);
		return;
	}

	echo '<span class="tr-proof-card__shot-placeholder">' . esc_html( $placeholder_text ) . '</span>';
}

/**
 * Register meta box on service pages.
 */
function turborank_proof_images_register_meta_box() {
	add_meta_box(
		'turborank_proof_images',
		__( 'Documented citations — screenshots', 'turborank' ),
		'turborank_proof_images_meta_box_render',
		'page',
		'normal',
		'default'
	);
}
add_action( 'add_meta_boxes', 'turborank_proof_images_register_meta_box' );

/**
 * Meta box output.
 *
 * @param WP_Post $post Current post.
 */
function turborank_proof_images_meta_box_render( $post ) {
	if ( ! turborank_proof_images_applies_to_page( $post ) ) {
		echo '<p>' . esc_html__( 'Assign a YouTube Discovery or Brand Authority template to edit citation screenshots here.', 'turborank' ) . '</p>';
		return;
	}

	wp_nonce_field( 'turborank_proof_images_save', 'turborank_proof_images_nonce' );

	$ids = turborank_get_proof_image_ids( $post->ID );
	?>
	<p class="description">
		<?php esc_html_e( 'Uploads appear in the “Documented citations” section on the front of this page. Leave empty to show the placeholder until images are ready.', 'turborank' ); ?>
	</p>
	<div class="turborank-proof-images">
		<?php foreach ( array( 0, 1, 2 ) as $i ) : ?>
			<?php
			$attachment_id = $ids[ $i ];
			$preview       = '';
			if ( $attachment_id && wp_attachment_is_image( $attachment_id ) ) {
				$preview = wp_get_attachment_image( $attachment_id, 'medium', false, array( 'style' => 'max-width:100%;height:auto;display:block;' ) );
			}
			?>
			<div class="turborank-proof-image-field" style="margin:0 0 1.25rem;padding-bottom:1.25rem;border-bottom:1px solid #dcdcde;">
				<p style="margin:0 0 0.5rem;"><strong><?php echo esc_html( sprintf( /* translators: citation card number */ __( 'Citation %d screenshot', 'turborank' ), $i + 1 ) ); ?></strong></p>
				<input type="hidden" class="turborank-proof-image-id" name="turborank_proof_images[<?php echo (int) $i; ?>]" value="<?php echo esc_attr( (string) $attachment_id ); ?>" />
				<div class="turborank-proof-image-preview" style="margin-bottom:0.5rem;max-width:320px;"><?php echo $preview; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<button type="button" class="button turborank-proof-upload"><?php esc_html_e( 'Select or upload image', 'turborank' ); ?></button>
				<button type="button" class="button turborank-proof-remove" <?php echo $attachment_id ? '' : 'style="display:none"'; ?>><?php esc_html_e( 'Remove', 'turborank' ); ?></button>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Persist screenshot attachment IDs.
 *
 * @param int $post_id Post ID.
 */
function turborank_proof_images_save_post( $post_id ) {
	if ( ! isset( $_POST['turborank_proof_images_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['turborank_proof_images_nonce'] ) ), 'turborank_proof_images_save' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	if ( ! turborank_proof_images_applies_to_page( $post_id ) ) {
		return;
	}

	$raw = isset( $_POST['turborank_proof_images'] ) ? wp_unslash( $_POST['turborank_proof_images'] ) : array();
	if ( ! is_array( $raw ) ) {
		$raw = array();
	}

	$ids = array();
	foreach ( array( 0, 1, 2 ) as $i ) {
		$ids[ $i ] = isset( $raw[ $i ] ) ? absint( $raw[ $i ] ) : 0;
	}

	update_post_meta( $post_id, 'turborank_proof_images', $ids );
}
add_action( 'save_post_page', 'turborank_proof_images_save_post' );

/**
 * Admin media uploader for proof screenshots.
 *
 * @param string $hook Current admin screen hook.
 */
function turborank_proof_images_admin_assets( $hook ) {
	if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		return;
	}

	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! $screen || 'page' !== $screen->post_type ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'turborank-proof-images-admin',
		get_template_directory_uri() . '/assets/js/proof-images-admin.js',
		array( 'jquery' ),
		TURBORANK_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'turborank_proof_images_admin_assets' );
