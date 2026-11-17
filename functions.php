<?php
/**
 * TurboRank theme functions.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TURBORANK_VERSION', '1.11.88' );

/**
 * URL for the Discovery Session landing page.
 *
 * @return string
 */
function turborank_discovery_session_url() {
	$page = get_page_by_path( 'discovery-session' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		return get_permalink( $page );
	}

	return home_url( '/discovery-session/' );
}

/**
 * URL for the Discovery Snapshot sample report page.
 *
 * @return string
 */
function turborank_discovery_snapshot_url() {
	$page = get_page_by_path( 'discovery-snapshot' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		return get_permalink( $page );
	}

	return home_url( '/discovery-snapshot/' );
}

/**
 * Contact page URL, optionally opening a tab (snapshot|message).
 *
 * @param string $form Tab to select: snapshot, message, or empty for default.
 * @return string
 */
function turborank_contact_url( $form = '' ) {
	$page = get_page_by_path( 'contact' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		$url = get_permalink( $page );
	} else {
		$url = home_url( '/contact/' );
	}

	$form = sanitize_key( $form );
	if ( in_array( $form, array( 'snapshot', 'message' ), true ) ) {
		return $url . '#' . $form;
	}

	return $url;
}

/**
 * URL for the featured webinar registration / live watch page.
 *
 * @return string
 */
function turborank_webinar_live_url() {
	$page = get_page_by_path( 'webinar/webinar-live' );
	if ( $page instanceof WP_Post && 'publish' === $page->post_status ) {
		return get_permalink( $page );
	}

	return home_url( '/webinar/webinar-live/' );
}

/**
 * Whether the current view is the webinar registration / live watch page.
 *
 * @return bool
 */
function turborank_is_webinar_live_page() {
	if ( ! is_page() ) {
		return false;
	}
	if ( is_page( 'webinar-live' ) ) {
		return true;
	}
	$path = get_page_uri( get_queried_object_id() );
	return ( is_string( $path ) && 'webinar/webinar-live' === $path );
}

require_once get_template_directory() . '/inc/service-pages.php';
require_once get_template_directory() . '/inc/service-proof-images.php';
require_once get_template_directory() . '/inc/discovery-snapshot-block.php';
require_once get_template_directory() . '/inc/discovery-snapshot-data.php';
require_once get_template_directory() . '/inc/discovery-snapshot-page.php';
require_once get_template_directory() . '/inc/discovery-snapshot-admin.php';
require_once get_template_directory() . '/inc/discovery-snapshot-document.php';
require_once get_template_directory() . '/inc/about-page.php';
require_once get_template_directory() . '/inc/trust-logos.php';
require_once get_template_directory() . '/inc/results-page.php';
require_once get_template_directory() . '/inc/insight-images.php';
require_once get_template_directory() . '/inc/insights-content.php';
require_once get_template_directory() . '/inc/insights-page.php';
require_once get_template_directory() . '/inc/insight-article-page.php';
require_once get_template_directory() . '/inc/blog-longform-page.php';
require_once get_template_directory() . '/inc/author-page.php';
require_once get_template_directory() . '/inc/faq-page.php';
require_once get_template_directory() . '/inc/contact-page.php';
require_once get_template_directory() . '/inc/discovery-session-page.php';
require_once get_template_directory() . '/inc/video-hub-page.php';
require_once get_template_directory() . '/inc/hero-demo-page.php';

/**
 * Enqueue theme styles and fonts.
 */
function turborank_enqueue_assets() {
	wp_enqueue_style(
		'turborank-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,500;0,8..60,600;0,8..60,700;1,8..60,400;1,8..60,500;1,8..60,600&display=swap',
		array(),
		null
	);

	wp_enqueue_style(
		'turborank-homepage',
		get_template_directory_uri() . '/assets/css/homepage.css',
		array(),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-service',
		get_template_directory_uri() . '/assets/css/service.css',
		array( 'turborank-homepage' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-about',
		get_template_directory_uri() . '/assets/css/about.css',
		array( 'turborank-homepage' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-results',
		get_template_directory_uri() . '/assets/css/results.css',
		array( 'turborank-homepage' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-insights',
		get_template_directory_uri() . '/assets/css/insights.css',
		array( 'turborank-homepage', 'turborank-service' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-faq',
		get_template_directory_uri() . '/assets/css/faq.css',
		array( 'turborank-homepage' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-contact',
		get_template_directory_uri() . '/assets/css/contact.css',
		array( 'turborank-homepage', 'turborank-service' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-discovery-snapshot',
		get_template_directory_uri() . '/assets/css/discovery-snapshot.css',
		array( 'turborank-homepage' ),
		TURBORANK_VERSION
	);

	wp_enqueue_style(
		'turborank-discovery-session',
		get_template_directory_uri() . '/assets/css/discovery-session.css',
		array( 'turborank-homepage', 'turborank-service' ),
		TURBORANK_VERSION
	);

	if ( is_page( array( 'hero-demo-1', 'hero-demo-2', 'hero-demo-3', 'hero-demo-4' ) ) ) {
		wp_enqueue_style(
			'turborank-hero-demo',
			get_template_directory_uri() . '/assets/css/hero-demo.css',
			array( 'turborank-homepage' ),
			TURBORANK_VERSION
		);
	}

	if ( is_page( array( 'podcast', 'webinar', 'webinar-live', 'video-gallery' ) ) || turborank_is_webinar_live_page() ) {
		$video_hub_deps = array( 'turborank-homepage', 'turborank-service', 'turborank-insights' );
		if ( is_page( array( 'podcast', 'video-gallery' ) ) ) {
			$video_hub_deps[] = 'turborank-results';
		}
		wp_enqueue_style(
			'turborank-video-hub',
			get_template_directory_uri() . '/assets/css/video-hub.css',
			$video_hub_deps,
			TURBORANK_VERSION
		);
	}

	if ( turborank_is_webinar_live_page() ) {
		wp_enqueue_script(
			'turborank-webinar-countdown',
			get_template_directory_uri() . '/assets/js/webinar-countdown.js',
			array(),
			TURBORANK_VERSION,
			true
		);
	}

	if ( is_singular() ) {
		$post_id      = get_queried_object_id();
		$tpl          = $post_id ? get_page_template_slug( $post_id ) : '';
		$use_longform = is_string( $tpl ) && ( false !== strpos( $tpl, 'blog-longform' ) || false !== strpos( $tpl, 'insight-longform' ) );

		if ( $use_longform ) {
			wp_enqueue_style(
				'turborank-blog-longform',
				get_template_directory_uri() . '/assets/css/blog-longform.css',
				array( 'turborank-homepage', 'turborank-faq', 'turborank-service', 'turborank-insights' ),
				TURBORANK_VERSION
			);
		}
	}

	if ( ! is_admin() ) {
		wp_enqueue_script(
			'turborank-site-chrome',
			get_template_directory_uri() . '/assets/js/site-chrome.js',
			array(),
			TURBORANK_VERSION,
			true
		);

		wp_enqueue_script(
			'turborank-trust-logos-client',
			get_template_directory_uri() . '/assets/js/trust-logos-client.js',
			array(),
			TURBORANK_VERSION,
			true
		);

		wp_enqueue_script(
			'turborank-trust-logo-marquee',
			get_template_directory_uri() . '/assets/js/trust-logo-marquee.js',
			array(),
			TURBORANK_VERSION,
			true
		);

		if ( is_page( 'discovery-session' ) ) {
			wp_enqueue_script(
				'turborank-discovery-session-booking',
				get_template_directory_uri() . '/assets/js/discovery-session-booking.js',
				array(),
				TURBORANK_VERSION,
				true
			);
		}

		if ( is_page( 'contact-2' ) ) {
			wp_enqueue_script(
				'turborank-contact-calendly-mock',
				get_template_directory_uri() . '/assets/js/contact-calendly-mock.js',
				array(),
				TURBORANK_VERSION,
				true
			);
		}

		if ( is_page( 'contact' ) ) {
			wp_enqueue_script(
				'turborank-contact-tabs',
				get_template_directory_uri() . '/assets/js/contact-tabs.js',
				array(),
				TURBORANK_VERSION,
				true
			);
		}

		if ( is_page( 'podcast' ) ) {
			wp_enqueue_script(
				'turborank-podcast-episode-modal',
				get_template_directory_uri() . '/assets/js/podcast-episode-modal.js',
				array(),
				TURBORANK_VERSION,
				true
			);
		}

		if ( is_page( 'video-gallery' ) ) {
			wp_enqueue_script(
				'turborank-shorts-deck-inline',
				get_template_directory_uri() . '/assets/js/shorts-deck-inline.js',
				array(),
				TURBORANK_VERSION,
				true
			);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'turborank_enqueue_assets' );
add_action( 'enqueue_block_editor_assets', 'turborank_enqueue_assets' );

/**
 * Rent attention homepage band — force white over block inline cream + warm token.
 */
function turborank_rent_attention_section_styles() {
	if ( ! is_front_page() && ! is_admin() ) {
		return;
	}

	$css = '.wp-block-group.tr-rent-attention.alignfull.has-background{background:#fff!important;background-color:#fff!important;}';
	wp_add_inline_style( 'turborank-homepage', $css );
}
add_action( 'wp_enqueue_scripts', 'turborank_rent_attention_section_styles', 20 );
add_action( 'enqueue_block_editor_assets', 'turborank_rent_attention_section_styles', 20 );

/**
 * One-time: clear pattern cache and fix DB copies of Rent attention background.
 */
function turborank_sync_rent_attention_white_bg() {
	if ( get_option( 'turborank_rent_attention_white_v1' ) ) {
		return;
	}

	$theme = wp_get_theme( 'turborank' );
	if ( $theme->exists() ) {
		$theme->delete_pattern_cache();
	}

	$posts = get_posts(
		array(
			'post_type'      => array( 'wp_template', 'wp_template_part', 'wp_block' ),
			'posts_per_page' => -1,
			'post_status'    => 'any',
			's'              => 'tr-rent-attention',
		)
	);

	foreach ( $posts as $post ) {
		if ( ! $post instanceof WP_Post || false === strpos( $post->post_content, 'tr-rent-attention' ) ) {
			continue;
		}
		$updated = $post->post_content;
		$updated = preg_replace(
			'/(className":"tr-rent-attention"[^}]*"background":")#f6f1e7(")/',
			'${1}#ffffff${2}',
			$updated
		);
		$updated = str_replace(
			array( 'tr-rent-attention alignfull has-text-color has-background" style="color:#121212;background-color:#f6f1e7', 'tr-rent-attention alignfull has-background" style="background-color:#f6f1e7' ),
			array( 'tr-rent-attention alignfull has-text-color has-background" style="color:#121212;background-color:#ffffff', 'tr-rent-attention alignfull has-background" style="background-color:#ffffff' ),
			$updated
		);
		if ( $updated !== $post->post_content ) {
			wp_update_post(
				array(
					'ID'           => (int) $post->ID,
					'post_content' => $updated,
				)
			);
		}
	}

	update_option( 'turborank_rent_attention_white_v1', 1 );
}
add_action( 'init', 'turborank_sync_rent_attention_white_bg', 30 );

/**
 * Theme supports.
 */
function turborank_setup() {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'style.css' );
	add_editor_style( 'assets/css/homepage.css' );
	add_editor_style( 'assets/css/service.css' );
	add_editor_style( 'assets/css/about.css' );
	add_editor_style( 'assets/css/results.css' );
	add_editor_style( 'assets/css/insights.css' );
	add_editor_style( 'assets/css/faq.css' );
	add_editor_style( 'assets/css/contact.css' );
	add_editor_style( 'assets/css/discovery-snapshot.css' );
	add_editor_style( 'assets/css/discovery-session.css' );
	add_editor_style( 'assets/css/video-hub.css' );
	add_editor_style( 'assets/css/blog-longform.css' );
	add_editor_style( 'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Source+Serif+4:ital,opsz,wght@0,8..60,400;0,8..60,500;0,8..60,600;0,8..60,700;1,8..60,400;1,8..60,500;1,8..60,600&display=swap' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'turborank' ),
			'footer'  => __( 'Footer', 'turborank' ),
		)
	);
}
add_action( 'after_setup_theme', 'turborank_setup' );

/**
 * Register pattern category.
 */
function turborank_pattern_categories() {
	register_block_pattern_category(
		'turborank',
		array( 'label' => __( 'TurboRank', 'turborank' ) )
	);
}
add_action( 'init', 'turborank_pattern_categories' );

/**
 * Whether the current page is part of Insights.
 *
 * @return bool
 */
function turborank_is_insights_section() {
	if ( ! is_page() ) {
		return false;
	}

	$post = get_queried_object();
	if ( ! $post instanceof WP_Post ) {
		return false;
	}

	if ( 'insights' === $post->post_name ) {
		return true;
	}

	if ( in_array( $post->post_name, array( 'matthew-pearce', 'mary-ann-bautista' ), true ) ) {
		return true;
	}

	if ( turborank_get_insight_article( $post->post_name ) ) {
		return true;
	}

	$insights = get_page_by_path( 'insights' );
	if ( $insights && (int) $post->post_parent === (int) $insights->ID ) {
		return true;
	}

	return false;
}

/**
 * Mark marketing pages so the header link can show as current.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function turborank_body_class( $classes ) {
	if ( is_page( 'about' ) ) {
		$classes[] = 'tr-is-about';
	}
	if ( is_page( 'case-studies' ) ) {
		$classes[] = 'tr-is-results';
	}
	if ( turborank_is_insights_section() ) {
		$classes[] = 'tr-is-insights';
	}
	if ( is_page( 'faq' ) ) {
		$classes[] = 'tr-is-faq';
	}
	if ( is_page( 'contact' ) || is_page( 'contact-2' ) ) {
		$classes[] = 'tr-is-contact';
	}
	if ( is_page( 'discovery-session' ) ) {
		$classes[] = 'tr-is-discovery-session';
	}
	if ( is_page( array( 'hero-demo-1', 'hero-demo-2', 'hero-demo-3', 'hero-demo-4' ) ) ) {
		$classes[] = 'tr-is-hero-demo';
	}
	if ( is_page( 'ai-discovery' ) ) {
		$classes[] = 'tr-is-ai-discovery';
	}
	if ( is_page( 'youtube-discovery' ) ) {
		$classes[] = 'tr-is-youtube-discovery';
	}
	if ( is_page( 'brand-authority' ) ) {
		$classes[] = 'tr-is-brand-authority';
	}
	if ( is_page( array( 'podcast', 'webinar', 'webinar-live', 'video-gallery' ) ) || turborank_is_webinar_live_page() ) {
		$classes[] = 'tr-is-video-hub';
	}
	if ( turborank_is_discovery_snapshot_page() ) {
		$classes[] = 'tr-is-discovery-snapshot';
	}
	$mary_ann_page = get_queried_object();
	if ( $mary_ann_page instanceof WP_Post && 'mary-ann-bautista' === $mary_ann_page->post_name && 'page' === $mary_ann_page->post_type ) {
		$classes[] = 'tr-is-author-mary-ann';
	}
	if ( is_singular() ) {
		$post_id = get_queried_object_id();
		$tpl     = $post_id ? get_page_template_slug( $post_id ) : '';
		if ( is_string( $tpl ) && false !== strpos( $tpl, 'blog-longform' ) ) {
			$classes[] = 'tr-is-blog-longform';
		}
		if ( is_string( $tpl ) && false !== strpos( $tpl, 'insight-longform' ) ) {
			$classes[] = 'tr-is-blog-longform';
			$classes[] = 'tr-is-insight-longform';
		}
	}
	return $classes;
}
add_filter( 'body_class', 'turborank_body_class' );

/**
 * Permanent redirect from legacy /results/ to /case-studies/.
 */
function turborank_redirect_legacy_results_url() {
	if ( is_admin() || wp_doing_ajax() || ( function_exists( 'wp_is_json_request' ) && wp_is_json_request() ) ) {
		return;
	}

	if ( ! is_404() ) {
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	$path        = wp_parse_url( $request_uri, PHP_URL_PATH );
	if ( ! is_string( $path ) ) {
		return;
	}

	$path = trim( $path, '/' );
	if ( 'results' !== $path ) {
		return;
	}

	wp_safe_redirect( home_url( '/case-studies/' ), 301 );
	exit;
}
add_action( 'template_redirect', 'turborank_redirect_legacy_results_url', 1 );

/**
 * Retired Shorts landing page — send visitors to the video gallery deck.
 */
function turborank_redirect_legacy_shorts_url() {
	if ( is_admin() || wp_doing_ajax() || ( function_exists( 'wp_is_json_request' ) && wp_is_json_request() ) ) {
		return;
	}

	$request_uri = isset( $_SERVER['REQUEST_URI'] ) ? (string) wp_unslash( $_SERVER['REQUEST_URI'] ) : '';
	$path        = wp_parse_url( $request_uri, PHP_URL_PATH );
	if ( ! is_string( $path ) ) {
		return;
	}

	$path = trim( $path, '/' );
	if ( 'shorts' !== $path ) {
		return;
	}

	wp_safe_redirect( home_url( '/video-gallery/' ), 301 );
	exit;
}
add_action( 'template_redirect', 'turborank_redirect_legacy_shorts_url', 1 );

/**
 * Floating control to return to the top of the page.
 */
function turborank_render_back_to_top() {
	if ( function_exists( 'turborank_is_discovery_snapshot_page' ) && turborank_is_discovery_snapshot_page() ) {
		return;
	}
	?>
	<button type="button" class="tr-back-to-top" id="tr-back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'turborank' ); ?>" hidden>
		<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
			<path d="M12 5.5 6 11.5l1.4 1.4L11 9.3V18h2V9.3l3.6 3.6L18 11.5 12 5.5z" />
		</svg>
	</button>
	<?php
}
add_action( 'wp_footer', 'turborank_render_back_to_top' );

/**
 * Undo the short-lived post-content front page migration (v1.7.1).
 *
 * Marketing pages are theme-driven during setup; editable pages will use a
 * shared approach later (post-content templates, not live pattern references).
 */
function turborank_revert_editable_front_page_migration() {
	if ( 1 !== (int) get_option( 'turborank_front_page_setup', 0 ) ) {
		return;
	}

	$templates = get_posts(
		array(
			'post_type'      => 'wp_template',
			'name'           => 'front-page',
			'posts_per_page' => 5,
			'post_status'    => array( 'publish', 'draft', 'trash' ),
		)
	);

	foreach ( $templates as $template ) {
		$content = (string) $template->post_content;
		if ( false !== strpos( $content, 'wp:post-content' ) && false === strpos( $content, 'turborank/homepage' ) ) {
			wp_delete_post( (int) $template->ID, true );
		}
	}

	update_option( 'turborank_front_page_setup', 2 );
}
add_action( 'init', 'turborank_revert_editable_front_page_migration', 20 );
