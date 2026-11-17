<?php
/**
 * Insights hub page.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the Insights archive page.
 */
function turborank_render_insights_page() {
	$articles = turborank_insights_articles();
	$featured = null;
	$grid     = array();

	foreach ( $articles as $article ) {
		if ( ! empty( $article['featured'] ) ) {
			$featured = $article;
		} else {
			$grid[] = $article;
		}
	}

	if ( ! $featured ) {
		$featured = reset( $articles );
	}

	turborank_service_open( 'tr-insights tr-insights-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<div class="tr-insights-hero__intro">
		<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">Insights</span></p>
		<h1 class="tr-eyebrow">Insights</h1>
		<h2>Insights on how buyers <em class="tr-em">discover brands.</em></h2>
		<p class="tr-lead">Research, strategy and lessons from our work across AI answers, YouTube and search, written by the TurboRank team.</p>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-insights-feed', '#ffffff', '#121212', 'insights-list' );
	ob_start();
	?>
	<article class="tr-insight-featured">
		<?php echo turborank_insights_article_link_open( $featured['slug'], 'tr-insight-featured__media tr-insight-media-frame' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			<?php turborank_render_insight_card_image( turborank_insight_thumb_src( $featured['thumb'] ) ); ?>
		<?php echo turborank_insights_article_link_close(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<div class="tr-insight-featured__body">
			<p class="tr-insight-featured__labels"><span class="tr-insight-featured__label">Featured</span> <span class="tr-tag-accent"><?php echo esc_html( $featured['category'] ); ?></span></p>
			<?php if ( turborank_insights_presentation_mode() ) : ?>
				<h2><?php echo esc_html( $featured['title'] ); ?></h2>
			<?php else : ?>
				<h2><a href="<?php echo esc_url( turborank_insight_url( $featured['slug'] ) ); ?>"><?php echo esc_html( $featured['title'] ); ?></a></h2>
			<?php endif; ?>
			<p class="tr-insight-featured__excerpt"><?php echo esc_html( $featured['excerpt'] ); ?></p>
			<p class="tr-insight-featured__meta"><span class="tr-insight-featured__meta-text">By </span><a class="tr-insight-featured__author" href="<?php echo esc_url( turborank_insight_author_url() ); ?>"><?php echo esc_html( $featured['author'] ); ?></a><span class="tr-insight-featured__meta-text">, <?php echo esc_html( $featured['date'] ); ?></span></p>
			<?php if ( turborank_insights_presentation_mode() ) : ?>
				<p class="tr-insight-featured__cta"><span class="tr-insights-link">Read the article</span></p>
			<?php else : ?>
				<p class="tr-insight-featured__cta"><a class="tr-insights-link" href="<?php echo esc_url( turborank_insight_url( $featured['slug'] ) ); ?>">Read the article</a></p>
			<?php endif; ?>
		</div>
	</article>

	<div class="tr-insights-toolbar">
		<div class="tr-insights-filters" role="toolbar" aria-label="Filter articles">
			<button type="button" class="is-active" data-filter="all" aria-pressed="true">All</button>
			<button type="button" data-filter="ai-visibility" aria-pressed="false">AI Visibility</button>
			<button type="button" data-filter="youtube-seo" aria-pressed="false">YouTube SEO</button>
			<button type="button" data-filter="brand-authority" aria-pressed="false">Brand Authority</button>
			<button type="button" data-filter="growth-strategy" aria-pressed="false">Growth Strategy</button>
			<button type="button" data-filter="case-studies" aria-pressed="false">Case Studies</button>
		</div>
		<label class="tr-insights-search">
			<span class="screen-reader-text">Search articles</span>
			<input type="search" placeholder="Search articles" data-insight-search>
		</label>
	</div>

	<div class="tr-insights-grid">
		<?php
		foreach ( $grid as $article ) {
			echo turborank_insight_card( $article ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
	</div>

	<nav class="tr-insights-pagination tr-insights-pagination--preview" aria-label="Insights pagination">
		<span class="is-muted">Previous</span>
		<span class="is-current" aria-current="page">1</span>
		<span class="tr-insights-pagination__page">2</span>
		<span class="tr-insights-pagination__page">3</span>
		<span class="is-muted">…</span>
		<span class="tr-insights-pagination__page">12</span>
		<span class="is-muted">Next</span>
	</nav>

	<script>
	(function () {
		var toolbar = document.querySelector('.tr-insights-filters');
		var search = document.querySelector('[data-insight-search]');
		var cards = document.querySelectorAll('.tr-insight-card');
		if (!toolbar) {
			return;
		}
		var buttons = toolbar.querySelectorAll('button[data-filter]');
		var activeFilter = 'all';

		function applyFilters() {
			var query = search ? search.value.trim().toLowerCase() : '';
			cards.forEach(function (card) {
				var filter = card.getAttribute('data-filter') || '';
				var text = card.textContent.toLowerCase();
				var filterMatch = activeFilter === 'all' || filter === activeFilter;
				var searchMatch = !query || text.indexOf(query) !== -1;
				card.classList.toggle('is-hidden', !(filterMatch && searchMatch));
			});
		}

		buttons.forEach(function (button) {
			button.addEventListener('click', function () {
				activeFilter = button.dataset.filter;
				buttons.forEach(function (btn) {
					var active = btn === button;
					btn.classList.toggle('is-active', active);
					btn.setAttribute('aria-pressed', active ? 'true' : 'false');
				});
				applyFilters();
			});
		});

		if (search) {
			search.addEventListener('input', applyFilters);
		}
	}());
	</script>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_insights_video_cta();
}

/**
 * Shared video + assessment sections for Insights pages.
 */
function turborank_render_insights_video_cta() {
	turborank_service_open( 'tr-insights tr-insights-video tr-service tr-service-close tr-service-close--light', '#F9F9F7', '#121212' );
	ob_start();
	$shorts = turborank_insights_video_shorts();
	?>
	<div class="tr-close-inner">
		<div class="tr-close-grid tr-insights-video__grid">
			<div class="tr-close-heading">
				<h2>Prefer video?</h2>
				<p class="tr-close-lead">Short, practical videos from our team on AI discoverability, YouTube strategy and brand authority.</p>
				<div class="tr-insights-video__actions">
					<div class="wp-block-buttons tr-btn-row is-layout-flex wp-block-buttons-is-layout-flex">
						<div class="wp-block-button tr-btn-ghost"><a class="wp-block-button__link wp-element-button" href="https://www.youtube.com/results?search_query=TurboRank" target="_blank" rel="noreferrer">Watch on YouTube</a></div>
					</div>
				</div>
			</div>
			<div class="tr-insights-video__thumbs">
				<?php foreach ( $shorts as $short ) : ?>
					<div class="tr-insights-video__thumb tr-insights-video__thumb--static">
						<img src="<?php echo esc_url( $short['image'] ); ?>" alt="<?php echo esc_attr( $short['alt'] ); ?>" width="341" height="511" loading="lazy" decoding="async">
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-insights tr-insights-close tr-service tr-service-close',
			'theme'         => 'light',
			'bg'            => '#ffffff',
			'heading'       => 'Want to know where your brand shows up?',
			'lead'          => 'A free Discovery Session shows where buyers find you on YouTube, and where competitors win instead.',
			'button_href'   => turborank_discovery_session_url(),
		)
	);
}
