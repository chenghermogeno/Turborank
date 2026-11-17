<?php
/**
 * Discovery Snapshot client report page (illustrative deliverable).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Content-width divider between report sections.
 *
 * @param string $position 'start' (default) or 'end' — closing rule for a bounded section band.
 */
function turborank_discovery_snapshot_section_rule( $position = 'start' ) {
	$class = 'tr-dsnap__section-hr';
	if ( 'end' === $position ) {
		$class .= ' tr-dsnap__section-hr--end';
	}
	echo '<hr class="' . esc_attr( $class ) . '" aria-hidden="true">';
}

/**
 * Render the Discovery Snapshot report for the current (or given) page.
 *
 * @param int|null $post_id Page ID.
 */
function turborank_render_discovery_snapshot_page( $post_id = null ) {
	$post_id = $post_id ? (int) $post_id : (int) get_the_ID();
	$meta    = turborank_get_discovery_snapshot_meta( $post_id );
	$logo    = esc_url( get_template_directory_uri() . '/assets/images/turborank-logo.png' );

	echo '<div class="tr-dsnap-document" role="document" aria-label="' . esc_attr__( 'Discovery Snapshot report', 'turborank' ) . '">';

	turborank_service_open( 'tr-dsnap tr-dsnap__topbar', '#0d0d0d', '#ffffff' );
	ob_start();
	?>
	<header class="tr-dsnap__report-head">
		<span class="tr-dsnap__logo"><img src="<?php echo esc_url( $logo ); ?>" alt="TurboRank" width="512" height="84"></span>
		<div class="tr-dsnap__prepared">
			<p class="tr-dsnap__prepared-line">
				<span class="tr-dsnap__prepared-label">Prepared for</span>
				<strong><?php turborank_discovery_snapshot_echo( '[Brand]', $meta ); ?></strong>
				<span class="tr-dsnap__prepared-date"><?php turborank_discovery_snapshot_echo( '[Date]', $meta ); ?></span>
			</p>
			<span class="tr-dsnap__sample-badge"><?php echo esc_html( $meta['sample_label'] ); ?></span>
		</div>
	</header>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-dsnap tr-dsnap__hero', '#ffffff', '#121418' );
	ob_start();
	?>
	<div class="tr-dsnap__intro">
		<h1 class="tr-dsnap__eyebrow">Discovery Snapshot</h1>
		<h2 class="tr-dsnap__title"><?php turborank_discovery_snapshot_echo( 'Where [Brand] stands when buyers search and watch', $meta ); ?></h2>
		<div class="tr-dsnap__lead">
			<p class="tr-dsnap__lead-line"><?php esc_html_e( 'We ran the searches your buyers use on YouTube and Google before they choose a brand. Here’s where your videos show up, who shows up instead, and your top 3 moves.', 'turborank' ); ?></p>
		</div>
	</div>

	<div class="tr-dsnap__summary">
		<article class="tr-dsnap__summary-card">
			<span><?php esc_html_e( 'YouTube visibility', 'turborank' ); ?></span>
			<strong>9 of 20</strong>
			<p><?php esc_html_e( 'buyer searches where you rank in the top 5', 'turborank' ); ?></p>
		</article>
		<article class="tr-dsnap__summary-card">
			<span><?php esc_html_e( 'Competitors', 'turborank' ); ?></span>
			<strong>14 of 20</strong>
			<p><?php esc_html_e( 'searches where a competitor ranks in the top 5', 'turborank' ); ?></p>
		</article>
		<article class="tr-dsnap__summary-card">
			<span><?php esc_html_e( 'Untapped library', 'turborank' ); ?></span>
			<strong><?php turborank_discovery_snapshot_echo( '[N]', $meta ); ?></strong>
			<p><?php esc_html_e( 'existing videos to reoptimize', 'turborank' ); ?></p>
		</article>
		<article class="tr-dsnap__summary-card is-dark">
			<span><?php esc_html_e( 'Missed buyer searches', 'turborank' ); ?></span>
			<strong>8</strong>
			<p><?php esc_html_e( 'where competitors rank and you don’t', 'turborank' ); ?></p>
		</article>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-dsnap tr-dsnap--section tr-dsnap--section-01', '#ffffff', '#121418' );
	ob_start();
	turborank_discovery_snapshot_section_rule();
	?>
	<div class="tr-dsnap__section-head">
		<div class="tr-dsnap__section-title">
			<span class="tr-dsnap__section-num" aria-hidden="true">01</span>
			<h2><?php esc_html_e( 'Your YouTube visibility', 'turborank' ); ?></h2>
		</div>
	</div>
	<div class="tr-dsnap__yt-grid">
		<article class="tr-dsnap__yt-card">
			<span class="tr-dsnap__yt-card-label"><?php esc_html_e( 'Strongest video', 'turborank' ); ?></span>
			<p class="tr-dsnap__yt-card-title"><strong>[Video title]</strong></p>
			<p class="tr-dsnap__yt-card-body"><?php esc_html_e( 'Ranks #2 on YouTube for “[buyer search]”', 'turborank' ); ?></p>
		</article>
		<article class="tr-dsnap__yt-card">
			<span class="tr-dsnap__yt-card-label"><?php esc_html_e( 'Biggest gap', 'turborank' ); ?></span>
			<p class="tr-dsnap__yt-card-title"><strong>“[High-intent buyer search]”</strong></p>
			<p class="tr-dsnap__yt-card-body"><?php esc_html_e( 'Three competitor videos rank in the top 5. You have no video that answers it.', 'turborank' ); ?></p>
		</article>
		<article class="tr-dsnap__yt-card">
			<span class="tr-dsnap__yt-card-label"><?php esc_html_e( 'Videos that aren’t working', 'turborank' ); ?></span>
			<p class="tr-dsnap__yt-card-title"><strong><?php turborank_discovery_snapshot_echo( '[N] existing videos', $meta ); ?></strong></p>
			<p class="tr-dsnap__yt-card-body"><?php esc_html_e( 'Answer buyer questions but are titled for your brand, not the search', 'turborank' ); ?></p>
		</article>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-dsnap tr-dsnap--section tr-dsnap--section-02', '#ffffff', '#121418' );
	ob_start();
	turborank_discovery_snapshot_section_rule();
	?>
	<div class="tr-dsnap__section-head">
		<div class="tr-dsnap__section-title">
			<span class="tr-dsnap__section-num" aria-hidden="true">02</span>
			<h2><?php esc_html_e( 'Who appears instead on YouTube', 'turborank' ); ?></h2>
		</div>
	</div>
	<div class="tr-dsnap__split tr-dsnap__split--yt">
		<div class="tr-dsnap__share-block">
			<div class="tr-dsnap__share-chart" role="img" aria-label="<?php esc_attr_e( 'YouTube top-5 visibility by brand', 'turborank' ); ?>">
				<div class="tr-dsnap__share-row">
					<div class="tr-dsnap__share-head">
						<span class="tr-dsnap__share-label"><?php esc_html_e( 'Competitor A', 'turborank' ); ?></span>
						<span class="tr-dsnap__share-pct">12 of 20</span>
					</div>
					<div class="tr-dsnap__share-bar"><span style="width:60%"></span></div>
				</div>
				<div class="tr-dsnap__share-row is-you">
					<div class="tr-dsnap__share-head">
						<span class="tr-dsnap__share-label"><?php turborank_discovery_snapshot_echo( '[Brand]', $meta ); ?></span>
						<span class="tr-dsnap__share-pct">9 of 20</span>
					</div>
					<div class="tr-dsnap__share-bar"><span style="width:45%"></span></div>
				</div>
				<div class="tr-dsnap__share-row">
					<div class="tr-dsnap__share-head">
						<span class="tr-dsnap__share-label"><?php esc_html_e( 'Competitor B', 'turborank' ); ?></span>
						<span class="tr-dsnap__share-pct">8 of 20</span>
					</div>
					<div class="tr-dsnap__share-bar"><span style="width:40%"></span></div>
				</div>
				<div class="tr-dsnap__share-row">
					<div class="tr-dsnap__share-head">
						<span class="tr-dsnap__share-label"><?php esc_html_e( 'Competitor C', 'turborank' ); ?></span>
						<span class="tr-dsnap__share-pct">4 of 20</span>
					</div>
					<div class="tr-dsnap__share-bar"><span style="width:20%"></span></div>
				</div>
			</div>
			<p class="tr-dsnap__section-note tr-dsnap__share-footnote"><?php esc_html_e( 'Buyer searches where each brand has a video in YouTube’s top 5.', 'turborank' ); ?></p>
		</div>
		<aside class="tr-dsnap__aside tr-dsnap__aside--missing">
			<h3><?php esc_html_e( 'Searches where you’re missing', 'turborank' ); ?></h3>
			<ul>
				<li>
					<strong><?php esc_html_e( '“Best [product] for [use case]”', 'turborank' ); ?></strong>
					<span><?php esc_html_e( 'Competitor A ranks #1 and #3. You have no video in the top 20.', 'turborank' ); ?></span>
				</li>
				<li>
					<strong><?php turborank_discovery_snapshot_echo( '“[Your brand] vs [Competitor A]”', $meta ); ?></strong>
					<span><?php esc_html_e( 'Competitor A’s comparison video ranks #1. Yours is a Short with no chapters.', 'turborank' ); ?></span>
				</li>
				<li>
					<strong><?php turborank_discovery_snapshot_echo( '“Is [your brand] worth it?”', $meta ); ?></strong>
					<span><?php esc_html_e( 'Third-party review videos rank. Your own review video sits on page 2.', 'turborank' ); ?></span>
				</li>
			</ul>
		</aside>
	</div>
	<?php turborank_discovery_snapshot_section_rule( 'end' ); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-dsnap tr-dsnap--section', '#ffffff', '#121418' );
	ob_start();
	turborank_discovery_snapshot_section_rule();
	?>
	<div class="tr-dsnap__section-head">
		<div class="tr-dsnap__section-title">
			<span class="tr-dsnap__section-num" aria-hidden="true">03</span>
			<h2><?php esc_html_e( 'Your top 3 moves, prepared for your brand and yours to keep', 'turborank' ); ?></h2>
		</div>
	</div>
	<ol class="tr-dsnap__opps">
		<li>
			<span class="tr-dsnap__opp-num">1</span>
			<div>
				<h3><?php esc_html_e( 'Own the “best [product] for [use case]” search', 'turborank' ); ?></h3>
				<p><?php esc_html_e( 'Retitle and repackage your strongest related video, and add chapters around the buyer question.', 'turborank' ); ?></p>
			</div>
		</li>
		<li>
			<span class="tr-dsnap__opp-num">2</span>
			<div>
				<h3><?php esc_html_e( 'Fix the videos that aren’t working', 'turborank' ); ?></h3>
				<p><?php turborank_discovery_snapshot_echo( 'Give [N] existing videos new titles and thumbnails aimed at the searches they already answer.', $meta ); ?></p>
			</div>
		</li>
		<li>
			<span class="tr-dsnap__opp-num">3</span>
			<div>
				<h3><?php esc_html_e( 'Fill the gap competitors own', 'turborank' ); ?></h3>
				<p><?php esc_html_e( 'Make one new video for “[high-intent buyer search]”, where three competitor videos rank and you have none.', 'turborank' ); ?></p>
			</div>
		</li>
	</ol>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-dsnap tr-dsnap__foot', '#121212', '#ffffff' );
	ob_start();
	turborank_discovery_snapshot_section_rule();
	?>
	<div class="tr-dsnap__foot-grid">
		<p class="tr-dsnap__method">
			<?php
			turborank_discovery_snapshot_echo(
				'[N] buyer searches on YouTube and Google, [date range].',
				$meta
			);
			?>
		</p>
		<div class="tr-dsnap__next">
			<p class="tr-dsnap__next-lead">
				<strong><?php esc_html_e( 'Next step:', 'turborank' ); ?></strong>
				<?php esc_html_e( 'walk through it with our team', 'turborank' ); ?>
			</p>
			<p class="tr-dsnap__next-links">
				<a class="tr-dsnap__foot-link" href="tel:5105215100">(510) 521-5100</a>
				<a class="tr-dsnap__foot-link" href="mailto:hello@turborank.co">hello@turborank.co</a>
			</p>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	echo '</div>';
}
