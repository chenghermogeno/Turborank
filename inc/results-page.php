<?php
/**
 * Results page markup, from the TurboRank website mockup.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the Results page pattern.
 */
function turborank_render_results_page() {
	turborank_service_open( 'tr-results tr-results-hero', '#f6f1e7', '#121212' );
	ob_start();
	?>
	<div class="tr-results-hero__intro">
		<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">Results</span></p>
		<h1 class="tr-eyebrow">Case studies</h1>
		<h2>How established brands got found by <em class="tr-em">more of the right&nbsp;buyers.</em></h2>
		<p class="tr-lead">Client names are anonymized. Each result shows what we did, what changed and the period it was measured&nbsp;over.</p>
	</div>
	<div class="tr-results-stats-block">
		<p class="tr-results-hero__kat-claim">
			<span class="tr-kat-claim-badge tr-kat-claim-badge--results-hero"><?php esc_html_e( 'Kat claims: each number now shows its period', 'turborank' ); ?></span>
		</p>
		<div class="tr-results-stats">
			<div class="tr-results-stat">
				<strong>40,000+</strong>
				<span class="tr-results-stat__label">YouTube subscribers for one&nbsp;brand, up from about&nbsp;2,700</span>
				<span class="tr-results-stat__period">Pet Technology&nbsp;Brand · Aug 2023 to&nbsp;June&nbsp;2026</span>
			</div>
			<div class="tr-results-stat">
				<strong>73%</strong>
				<span class="tr-results-stat__label">More Google Search traffic to one brand’s YouTube&nbsp;channel</span>
				<span class="tr-results-stat__period">Pet Technology&nbsp;Brand ·&nbsp;2025</span>
			</div>
			<div class="tr-results-stat">
				<strong>256</strong>
				<span class="tr-results-stat__label">AI citations of optimized review videos in a single&nbsp;month</span>
				<span class="tr-results-stat__period">Pet Technology Creator&nbsp;Program · June&nbsp;2026</span>
			</div>
		</div>
		<p class="tr-results-stats__disclaimer">[Client OK pending on every result on this page]</p>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-results tr-results-catalog', '#ffffff', '#121212', 'studies' );
	ob_start();
	?>
	<div class="tr-results-filters" role="toolbar" aria-label="Filter case studies">
		<button type="button" class="is-active" data-filter="all" aria-pressed="true">All</button>
		<button type="button" data-filter="youtube-discovery" aria-pressed="false">YouTube Discovery</button>
		<button type="button" data-filter="brand-authority" aria-pressed="false">Brand Authority</button>
		<button type="button" data-filter="ai-discovery" aria-pressed="false">AI Discovery</button>
	</div>

	<article class="tr-results-featured tr-results-featured--light tr-results-featured--gradient-border" data-filters="youtube-discovery brand-authority">
		<div class="tr-results-featured-grid">
			<div class="tr-results-featured__main">
				<div class="tr-results-tags">
					<span>Featured</span>
					<span class="tr-tag-accent">YouTube Discovery</span>
					<span class="tr-tag-accent">Brand Authority</span>
					<span class="tr-kat-claim-badge tr-kat-claim-badge--results-tags"><?php esc_html_e( 'Kat claims', 'turborank' ); ?></span>
				</div>
				<div class="tr-results-featured__story">
					<h2><span class="tr-results-featured__title-line">Pet Technology</span><span class="tr-results-featured__title-line">Brand</span></h2>
					<p class="tr-results-featured__meta">Aug 2023 to June 2026 · [Client OK pending]</p>
					<p class="tr-results-featured__lead">A long-term client in a crowded category, with us since 2023.</p>
					<p class="tr-results-featured__label"><strong>What we did</strong></p>
					<ul>
						<li>Channel strategy</li>
						<li>Buyer-search research</li>
						<li>Reoptimization of existing videos</li>
						<li>Creator review videos</li>
					</ul>
					<p class="tr-results-featured__note">The brand’s own product launches also contributed.</p>
				</div>
			</div>
			<div class="tr-results-metrics">
				<div class="tr-results-metric"><strong>2,700 → 40,118</strong><span>YouTube subscribers, Aug 2023 to June 2026</span></div>
				<div class="tr-results-metric"><strong>+70.9%</strong><span>Subscribers in 2025</span></div>
				<div class="tr-results-metric"><strong>+73%</strong><span>Google Search traffic to the channel in 2025</span></div>
				<div class="tr-results-metric"><strong>+42.5%</strong><span>YouTube Search traffic in 2025, with 500+ search keywords sending views</span></div>
				<div class="tr-results-metric"><strong>450,635</strong><span>Views from Google Search, Aug 2023 to Jan 2026, about 23 times all prior years</span></div>
				<div class="tr-results-metric"><strong>48,082</strong><span>Views from videos we optimized in June 2026, with 847 watch hours</span></div>
				<div class="tr-results-metrics__foot">
					<div class="tr-results-featured-ai">
						<p class="tr-results-featured-ai__kicker">AI result · Pet Technology Creator Program · June 2026</p>
						<p class="tr-results-featured-ai__text">Review videos we optimized were cited by AI platforms 256 times, up 40% from 183 in May.</p>
					</div>
				</div>
			</div>
		</div>
	</article>

	<article class="tr-results-featured tr-results-featured--light" data-filters="youtube-discovery">
		<div class="tr-results-featured-grid">
			<div class="tr-results-featured__main">
				<div class="tr-results-tags">
					<span class="tr-tag-accent">YouTube Discovery</span>
					<span class="tr-kat-claim-badge tr-kat-claim-badge--results-tags"><?php esc_html_e( 'Kat claims', 'turborank' ); ?></span>
				</div>
				<div class="tr-results-featured__story">
					<h2><span class="tr-results-featured__title-line">Water Filtration</span><span class="tr-results-featured__title-line">Brand</span></h2>
					<p class="tr-results-featured__meta">Oct 2025 to Sept 2026 · [Client OK pending]</p>
					<p class="tr-results-featured__lead">A current client. The work started with the videos they already had.</p>
					<p class="tr-results-featured__label"><strong>What we did</strong></p>
					<ul>
						<li>Reoptimization of existing videos</li>
						<li>[Matthew to confirm the rest of the list]</li>
					</ul>
				</div>
			</div>
			<div class="tr-results-metrics">
				<div class="tr-results-metric"><strong class="is-accent">+105%</strong><span>Organic views in our first 12 weeks, Oct 2025 to Jan 2026, against the 12 weeks before</span></div>
				<div class="tr-results-metric"><strong>+432%</strong><span>Google Search views in the same 12 weeks, with Shorts views up 392%</span></div>
				<div class="tr-results-metric"><strong>+57%</strong><span>Daily Search views on 42 reoptimized videos, Q3 2026</span></div>
				<div class="tr-results-metric"><strong>11.65%</strong><span>Search click-through on those videos, against 6.94% channel-wide, Q3 2026</span></div>
				<div class="tr-results-metric"><strong>+28.8%</strong><span>Total views, Q3 2026 against Q2 2026 [Kat to confirm total or organic]</span></div>
				<div class="tr-results-metric"><strong>+74%</strong><span>YouTube Shop product clicks, August to September 2026, with impressions up 21%</span></div>
			</div>
		</div>
	</article>

	<div class="tr-results-pending-stack">
		<article class="tr-results-featured tr-results-featured--light tr-results-featured--pending" data-filters="">
			<div class="tr-results-featured-grid">
				<div class="tr-results-featured__main">
					<div class="tr-results-tags">
						<span class="tr-tag-accent">[Service]</span>
					</div>
					<div class="tr-results-featured__story">
						<h2>Adult Health &amp; Wellness Company</h2>
						<p class="tr-results-featured__meta">[Measurement period]</p>
						<p class="tr-results-featured__placeholder">[What we did]</p>
					</div>
				</div>
				<div class="tr-results-pending-panel" aria-label="Result pending approval">[Result pending approval]</div>
			</div>
		</article>

		<article class="tr-results-featured tr-results-featured--light tr-results-featured--pending" data-filters="">
			<div class="tr-results-featured-grid">
				<div class="tr-results-featured__main">
					<div class="tr-results-tags">
						<span class="tr-tag-accent">[Service]</span>
					</div>
					<div class="tr-results-featured__story">
						<h2>Mattress &amp; Sleep Products Company</h2>
						<p class="tr-results-featured__meta">[Measurement period]</p>
						<p class="tr-results-featured__placeholder">[What we did]</p>
					</div>
				</div>
				<div class="tr-results-pending-panel" aria-label="Result pending approval">[Result pending approval]</div>
			</div>
		</article>

		<article class="tr-results-featured tr-results-featured--light tr-results-featured--pending" data-filters="">
			<div class="tr-results-featured-grid">
				<div class="tr-results-featured__main">
					<div class="tr-results-tags">
						<span class="tr-tag-accent">[Service]</span>
					</div>
					<div class="tr-results-featured__story">
						<h2>Online Creator Marketplace</h2>
						<p class="tr-results-featured__meta">[Measurement period]</p>
						<p class="tr-results-featured__placeholder">[What we did]</p>
					</div>
				</div>
				<div class="tr-results-pending-panel" aria-label="Result pending approval">[Result pending approval]</div>
			</div>
		</article>
	</div>

	<script>
	(function () {
		var toolbar = document.querySelector('.tr-results-filters');
		if (!toolbar) {
			return;
		}
		var buttons = toolbar.querySelectorAll('button[data-filter]');
		var items = document.querySelectorAll('[data-filters]');

		function applyFilter(filter) {
			buttons.forEach(function (button) {
				var active = button.dataset.filter === filter;
				button.classList.toggle('is-active', active);
				button.setAttribute('aria-pressed', active ? 'true' : 'false');
			});

			items.forEach(function (item) {
				if (filter === 'all') {
					item.classList.remove('is-hidden');
					return;
				}
				var tags = (item.getAttribute('data-filters') || '').split(/\s+/);
				item.classList.toggle('is-hidden', tags.indexOf(filter) === -1);
			});
		}

		buttons.forEach(function (button) {
			button.addEventListener('click', function () {
				applyFilter(button.dataset.filter);
			});
		});
	}());
	</script>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-results tr-results-ai tr-service tr-service-close', '#ffffff', '#121212' );
	ob_start();
	?>
	<div class="tr-close-inner">
		<div class="tr-close-grid tr-results-ai__grid">
			<div class="tr-close-heading tr-results-ai__intro">
				<h2 class="tr-results-ai__title">
					<span class="tr-results-ai__title-text">What about AI Discovery results?</span>
					<span class="tr-kat-claim-badge tr-kat-claim-badge--results-ai-title"><?php esc_html_e( 'Kat claim', 'turborank' ); ?></span>
				</h2>
				<p class="tr-close-lead">No one controls AI answers, and we don’t pretend to. We publish documented examples as clients approve them, each showing the program, the period and what was counted.</p>
				<div class="tr-results-ai__actions">
					<div class="wp-block-buttons tr-btn-row is-layout-flex wp-block-buttons-is-layout-flex">
						<div class="wp-block-button tr-btn-ghost"><a class="wp-block-button__link wp-element-button" href="/ai-discovery/#measure">How we measure AI visibility</a></div>
					</div>
				</div>
			</div>
			<article class="tr-results-ai-card" aria-label="Example AI visibility result">
				<p class="tr-results-ai-card__kicker">AI visibility</p>
				<h3 class="tr-results-ai-card__program">Pet Technology Creator Program</h3>
				<p class="tr-results-ai-card__period">June 2026 · [Client OK pending]</p>
				<p class="tr-results-ai-card__metric">256</p>
				<p class="tr-results-ai-card__detail">times AI platforms cited review videos we optimized, up 40% from 183 in May.</p>
				<p class="tr-results-ai-card__footnote">Counted by an outside AI visibility tool. A citation count, not Citation Share.</p>
			</article>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-results tr-results-close tr-service tr-service-close',
			'theme'         => 'light',
			'bg'            => '#ffffff',
			'heading'       => 'See what a result like this<br><span class="tr-close-h2__line">could look like for your brand.</span>',
			'lead'          => 'Start with a free Discovery Session: where buyers find you on YouTube, where competitors win instead, and your top 3 moves.',
		)
	);
}
