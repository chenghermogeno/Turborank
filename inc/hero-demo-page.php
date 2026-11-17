<?php
/**
 * Homepage hero mockup demo pages (cream light theme).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared copy and links for hero mockups.
 *
 * @return array<string, string>
 */
function turborank_hero_demo_shared() {
	return array(
		'body'          => 'TurboRank helps established brands grow through AI discovery, YouTube and community authority. We have worked on YouTube since 2007, and we turn buyer questions into useful videos, clearer content and credible participation, with leads and sales guiding the plan.',
		'cta_primary'   => 'Get your free Snapshot',
		'cta_secondary' => 'Talk with us',
		'fine'          => 'A focused YouTube review and a look at what AI says about your category, presented in a 30-minute Discovery Briefing. No charge and no obligation.',
		'primary_url'   => turborank_discovery_snapshot_url(),
		'secondary_url' => turborank_contact_url( 'message' ),
		'query'         => 'Which standing desk is best for a small office?',
	);
}

/**
 * Inline red-outline icons used in headlines.
 *
 * @param string $type search|play|chat
 */
function turborank_hero_demo_icon( $type ) {
	$icons = array(
		'search' => '<svg class="tr-hero-demo__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="2"/><path d="M15.5 15.5 21 21" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
		'play'   => '<svg class="tr-hero-demo__icon tr-hero-demo__icon--play" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M8 5v14l13-8-13-6z" fill="currentColor"/></svg>',
		'chat'   => '<svg class="tr-hero-demo__icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 6a3 3 0 0 1 3-3h8a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3h-5.2L7 19v-5H8a3 3 0 0 1-3-3V6z" fill="none" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
	);
	echo isset( $icons[ $type ] ) ? $icons[ $type ] : '';
}

/**
 * Source-type icons for Hero Demo 2 panel cards.
 *
 * @param string $type video|thread|page
 */
function turborank_hero_demo_source_icon( $type ) {
	$icons = array(
		'video'  => '<svg class="tr-hero-demo__source-svg tr-hero-demo__source-svg--video" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M8 6v12l12-7-12-5z" fill="currentColor"/></svg>',
		'thread' => '<svg class="tr-hero-demo__source-svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path d="M5 6.5A3.5 3.5 0 0 1 8.5 3h7A3.5 3.5 0 0 1 19 6.5v4.6a3.5 3.5 0 0 1-3.5 3.5h-4.1L7 19.5v-4.9h-1A3.5 3.5 0 0 1 5 11.1V6.5z" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linejoin="round"/></svg>',
		'page'   => '<svg class="tr-hero-demo__source-svg" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><rect x="5.5" y="3.5" width="13" height="17" rx="2" fill="none" stroke="currentColor" stroke-width="1.75"/><path d="M8.5 8.5h7M8.5 12h7M8.5 15.5h4.5" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"/></svg>',
	);
	echo isset( $icons[ $type ] ) ? $icons[ $type ] : '';
}

/**
 * CTA row used across variants.
 *
 * @param array<string, string> $shared Shared strings.
 */
function turborank_hero_demo_render_cta( $shared ) {
	?>
	<div class="tr-hero-demo__actions">
		<a class="tr-hero-demo__btn tr-hero-demo__btn--primary" href="<?php echo esc_url( $shared['primary_url'] ); ?>"><?php echo esc_html( $shared['cta_primary'] ); ?></a>
		<a class="tr-hero-demo__btn tr-hero-demo__btn--text" href="<?php echo esc_url( $shared['secondary_url'] ); ?>"><?php echo esc_html( $shared['cta_secondary'] ); ?></a>
	</div>
	<p class="tr-hero-demo__fine"><?php echo esc_html( $shared['fine'] ); ?></p>
	<?php
}

/**
 * Trust logo marquee band (shared across hero demo variants).
 */
function turborank_hero_demo_render_trust_marquee() {
	?>
	<div class="tr-hero-trust alignfull">
		<?php turborank_render_trust_logo_marquee(); ?>
	</div>
	<?php
}

/**
 * Hero Demo 1 — Search / Watch / Ask card stack.
 */
function turborank_render_hero_demo_1() {
	$shared = turborank_hero_demo_shared();
	$query  = esc_html( $shared['query'] );

	turborank_service_open( 'tr-hero-demo tr-hero-demo--v1', '#f6f1e7', '#1a1a1a' );
	ob_start();
	?>
	<div class="tr-hero-demo__layout tr-hero-demo__layout--split">
		<div class="tr-hero-demo__copy">
			<h1 class="tr-hero-demo__title tr-hero-demo__title--stacked">
				<span class="tr-hero-demo__title-line">Be where your next</span>
				<span class="tr-hero-demo__title-line">
					<span class="tr-hero-demo__title-phrase">
						<span class="tr-hero-demo__title-text">customers</span>
						<span class="tr-hero-demo__title-word"><?php turborank_hero_demo_icon( 'search' ); ?> search,</span>
					</span>
				</span>
				<span class="tr-hero-demo__title-line">
					<span class="tr-hero-demo__title-phrase">
						<span class="tr-hero-demo__title-word"><?php turborank_hero_demo_icon( 'play' ); ?> watch</span>
						<span class="tr-hero-demo__title-text">and</span>
						<span class="tr-hero-demo__title-word"><?php turborank_hero_demo_icon( 'chat' ); ?> ask</span>
					</span>
				</span>
			</h1>
			<p class="tr-hero-demo__lead"><?php echo esc_html( $shared['body'] ); ?></p>
			<?php turborank_hero_demo_render_cta( $shared ); ?>
		</div>
		<div class="tr-hero-demo__visual tr-hero-demo__stack" aria-hidden="true">
			<article class="tr-hero-demo__card tr-hero-demo__card--search">
				<p class="tr-hero-demo__card-label">Search</p>
				<div class="tr-hero-demo__search-bar">
					<svg class="tr-hero-demo__search-icon" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6.5" fill="none" stroke="currentColor" stroke-width="2"/><path d="M15.5 15.5 21 21" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
					<span class="tr-hero-demo__query-line"><?php echo $query; ?></span>
				</div>
				<p class="tr-hero-demo__card-foot">Finds a comparison page</p>
			</article>
			<article class="tr-hero-demo__card tr-hero-demo__card--watch">
				<div class="tr-hero-demo__watch-row">
					<span class="tr-hero-demo__thumb">
						<svg class="tr-hero-demo__thumb-play" viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path d="M8 5v14l13-8-13-6z" fill="#fff"/></svg>
					</span>
					<div class="tr-hero-demo__watch-copy">
						<p class="tr-hero-demo__card-label">Watch</p>
						<p class="tr-hero-demo__watch-title tr-hero-demo__query-line"><?php echo $query; ?></p>
					</div>
				</div>
				<p class="tr-hero-demo__card-foot">Finds a demonstration video</p>
			</article>
			<article class="tr-hero-demo__card tr-hero-demo__card--ask">
				<p class="tr-hero-demo__card-label">Ask</p>
				<div class="tr-hero-demo__ask-top">
					<div class="tr-hero-demo__ask-bubble tr-hero-demo__query-line"><?php echo $query; ?></div>
				</div>
				<div class="tr-hero-demo__skeleton tr-hero-demo__skeleton--compact" aria-hidden="true"><span></span><span></span></div>
				<div class="tr-hero-demo__sources-row">
					<span class="tr-hero-demo__sources-label">Sources:</span>
					<div class="tr-hero-demo__tags"><span>Video</span><span>Community thread</span></div>
				</div>
				<p class="tr-hero-demo__card-foot">Finds an AI answer that cites a video and a community thread</p>
			</article>
			<p class="tr-hero-demo__stack-cap">One question, three places buyers look. <span class="tr-hero-demo__illus">Illustrative</span></p>
		</div>
	</div>
	<?php turborank_hero_demo_render_trust_marquee(); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Hero Demo 2 — AI cites sources illustration.
 */
function turborank_render_hero_demo_2() {
	$shared = turborank_hero_demo_shared();
	$query  = esc_html( $shared['query'] );

	turborank_service_open( 'tr-hero-demo tr-hero-demo--v2', '#f6f1e7', '#1a1a1a' );
	ob_start();
	?>
	<div class="tr-hero-demo__layout tr-hero-demo__layout--split">
		<div class="tr-hero-demo__copy">
			<h1 class="tr-hero-demo__title">When buyers ask AI about your category, be part of the answer</h1>
			<p class="tr-hero-demo__lead"><?php echo esc_html( $shared['body'] ); ?></p>
			<?php turborank_hero_demo_render_cta( $shared ); ?>
		</div>
		<figure class="tr-hero-demo__panel tr-hero-demo__panel--ai">
			<div class="tr-hero-demo__panel-card">
			<div class="tr-hero-demo__panel-block">
				<p class="tr-hero-demo__panel-kicker tr-hero-demo__panel-kicker--accent">A buyer asks</p>
				<p class="tr-hero-demo__panel-quote">&ldquo;<?php echo $query; ?>&rdquo;</p>
			</div>
			<div class="tr-hero-demo__panel-block">
				<p class="tr-hero-demo__panel-kicker">The assistant answers</p>
				<div class="tr-hero-demo__skeleton tr-hero-demo__skeleton--light tr-hero-demo__skeleton--v2" aria-hidden="true"><span></span><span></span><span></span></div>
			</div>
			<div class="tr-hero-demo__panel-block">
				<p class="tr-hero-demo__panel-kicker tr-hero-demo__panel-kicker--accent">And cites its sources</p>
				<ul class="tr-hero-demo__sources tr-hero-demo__sources--grid" role="list">
					<li>
						<span class="tr-hero-demo__source-ico" aria-hidden="true"><?php turborank_hero_demo_source_icon( 'video' ); ?></span>
						<span class="tr-hero-demo__source-body">
							<strong class="tr-hero-demo__source-label">A video</strong>
							<span class="tr-hero-demo__source-desc">A demonstration that answers the question</span>
						</span>
					</li>
					<li>
						<span class="tr-hero-demo__source-ico" aria-hidden="true"><?php turborank_hero_demo_source_icon( 'thread' ); ?></span>
						<span class="tr-hero-demo__source-body">
							<strong class="tr-hero-demo__source-label">A community thread</strong>
							<span class="tr-hero-demo__source-desc">Owners comparing their experience</span>
						</span>
					</li>
					<li>
						<span class="tr-hero-demo__source-ico" aria-hidden="true"><?php turborank_hero_demo_source_icon( 'page' ); ?></span>
						<span class="tr-hero-demo__source-body">
							<strong class="tr-hero-demo__source-label">A brand page</strong>
							<span class="tr-hero-demo__source-desc">A clear product explanation</span>
						</span>
					</li>
				</ul>
			</div>
			</div>
			<figcaption class="tr-hero-demo__panel-cap tr-hero-demo__panel-cap--below">
				<span class="tr-hero-demo__panel-cap-lead">These are the sources we help you earn.</span>
				<span class="tr-hero-demo__illus">Illustrative</span>
			</figcaption>
		</figure>
	</div>
	<?php turborank_hero_demo_render_trust_marquee(); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Hero Demo 3 — Founder video spotlight.
 */
function turborank_render_hero_demo_3() {
	$shared = turborank_hero_demo_shared();

	turborank_service_open( 'tr-hero-demo tr-hero-demo--v3', '#f6f1e7', '#1a1a1a' );
	ob_start();
	?>
	<div class="tr-hero-demo__layout tr-hero-demo__layout--split">
		<div class="tr-hero-demo__copy">
			<h1 class="tr-hero-demo__title">Be where your next customers search, watch and ask</h1>
			<p class="tr-hero-demo__lead"><?php echo esc_html( $shared['body'] ); ?></p>
			<?php turborank_hero_demo_render_cta( $shared ); ?>
		</div>
		<div class="tr-hero-demo__video-wrap">
			<div class="tr-hero-demo__video" role="img" aria-label="Video preview placeholder">
				<p class="tr-hero-demo__video-tag">[PLACEHOLDER: muted loop of Matthew on camera]</p>
				<button type="button" class="tr-hero-demo__video-play" tabindex="-1" aria-hidden="true"><span>▶</span></button>
				<div class="tr-hero-demo__video-meta">
					<p class="tr-hero-demo__video-title">How buyers find brands now</p>
					<p class="tr-hero-demo__video-by">Matthew Pearce, Co-founder</p>
					<p class="tr-hero-demo__video-time">1:20, captioned</p>
				</div>
			</div>
			<p class="tr-hero-demo__yt-badge"><span class="tr-hero-demo__yt-line" aria-hidden="true"></span>On YouTube since 2007</p>
		</div>
	</div>
	<?php turborank_hero_demo_render_trust_marquee(); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Hero Demo 4 — Full-width headline, split body and CTA.
 */
function turborank_render_hero_demo_4() {
	$shared = turborank_hero_demo_shared();

	turborank_service_open( 'tr-hero-demo tr-hero-demo--v4', '#f6f1e7', '#1a1a1a' );
	ob_start();
	?>
	<div class="tr-hero-demo__layout tr-hero-demo__layout--stacked">
		<h1 class="tr-hero-demo__title tr-hero-demo__title--full">
			<span class="tr-hero-demo__title-line">Be where your next</span>
			<span class="tr-hero-demo__title-line tr-hero-demo__title-line--phrase">
				<span class="tr-hero-demo__title-text">customers</span>
				<span class="tr-hero-demo__title-word"><?php turborank_hero_demo_icon( 'search' ); ?> search,</span>
				<span class="tr-hero-demo__title-word"><?php turborank_hero_demo_icon( 'play' ); ?> watch</span>
			</span>
			<span class="tr-hero-demo__title-line tr-hero-demo__title-line--phrase">
				<span class="tr-hero-demo__title-text">and</span>
				<span class="tr-hero-demo__title-word"><?php turborank_hero_demo_icon( 'chat' ); ?> ask</span>
			</span>
		</h1>
		<hr class="tr-hero-demo__rule" aria-hidden="true">
		<div class="tr-hero-demo__lower">
			<p class="tr-hero-demo__lead tr-hero-demo__lead--only"><?php echo esc_html( $shared['body'] ); ?></p>
			<div class="tr-hero-demo__cta-col">
				<?php turborank_hero_demo_render_cta( $shared ); ?>
			</div>
		</div>
	</div>
	<?php turborank_hero_demo_render_trust_marquee(); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Ensure published pages exist for each hero demo.
 */
function turborank_ensure_hero_demo_pages() {
	if ( is_admin() && ! wp_doing_ajax() ) {
		return;
	}

	$demos = array(
		array(
			'slug'     => 'hero-demo-1',
			'title'    => 'Hero Demo 1',
			'template' => 'page-hero-demo-1',
		),
		array(
			'slug'     => 'hero-demo-2',
			'title'    => 'Hero Demo 2',
			'template' => 'page-hero-demo-2',
		),
		array(
			'slug'     => 'hero-demo-3',
			'title'    => 'Hero Demo 3',
			'template' => 'page-hero-demo-3',
		),
		array(
			'slug'     => 'hero-demo-4',
			'title'    => 'Hero Demo 4',
			'template' => 'page-hero-demo-4',
		),
	);

	foreach ( $demos as $demo ) {
		$page = get_page_by_path( $demo['slug'] );
		if ( $page instanceof WP_Post ) {
			if ( $demo['template'] !== get_page_template_slug( $page ) ) {
				update_post_meta( (int) $page->ID, '_wp_page_template', $demo['template'] );
			}
			continue;
		}

		wp_insert_post(
			array(
				'post_title'   => $demo['title'],
				'post_name'    => $demo['slug'],
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);

		$new_page = get_page_by_path( $demo['slug'] );
		if ( $new_page instanceof WP_Post ) {
			update_post_meta( (int) $new_page->ID, '_wp_page_template', $demo['template'] );
		}
	}
}
add_action( 'init', 'turborank_ensure_hero_demo_pages', 26 );