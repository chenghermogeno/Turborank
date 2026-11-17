<?php
/**
 * Podcast, webinar, video gallery, and Shorts marketing pages (mock layouts).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shared closing CTA for video hub pages.
 */
function turborank_render_video_hub_close() {
	turborank_render_close_cta(
		array(
			'section_class' => 'tr-service tr-service-close tr-video-hub-close',
			'theme'         => 'light',
			'bg'            => turborank_section_warm_color(),
			'heading'       => 'Ready to grow<br>where buyers search?',
			'lead'          => 'Book a Discovery Session to see how TurboRank fits your brand.',
		)
	);
}

/**
 * Podcast page — episode list + featured player mock.
 */
function turborank_render_podcast_page() {
	$img = get_template_directory_uri() . '/assets/images/research-card-youtube.jpg';

	turborank_service_open( 'tr-video-hub tr-video-hub--podcast tr-video-hub-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">Lorem ipsum</span></p>
	<div class="tr-video-hub-hero__grid">
		<div class="tr-video-hub-hero__copy">
			<p class="tr-eyebrow">Lorem ipsum</p>
			<h1>Lorem ipsum dolor<br><em class="tr-em">sit amet consectetur</em></h1>
			<p class="tr-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
		</div>
		<div class="tr-video-hub-mock tr-video-hub-mock--player" aria-hidden="true">
			<div class="tr-video-hub-mock__chrome">
				<span class="tr-video-hub-mock__dot"></span><span class="tr-video-hub-mock__dot"></span><span class="tr-video-hub-mock__dot"></span>
			</div>
			<div class="tr-video-hub-mock__art" style="--tr-mock-art:url(<?php echo esc_url( $img ); ?>)">
				<span class="tr-video-hub-mock__wave"></span>
			</div>
			<p class="tr-video-hub-mock__title">Lorem ipsum · dolor sit amet</p>
			<div class="tr-video-hub-mock__progress"><span class="tr-video-hub-mock__bar"></span></div>
			<div class="tr-video-hub-mock__controls">
				<span class="tr-video-hub-mock__btn">&#9664;&#9664;</span>
				<span class="tr-video-hub-mock__btn tr-video-hub-mock__btn--play">&#9654;</span>
				<span class="tr-video-hub-mock__btn">&#9654;&#9654;</span>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-video-hub tr-video-hub--podcast tr-video-hub-body', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-results-filters" role="toolbar" aria-label="<?php esc_attr_e( 'Filter episodes', 'turborank' ); ?>">
		<button type="button" class="is-active" data-filter="all" aria-pressed="true"><?php esc_html_e( 'All', 'turborank' ); ?></button>
		<button type="button" data-filter="youtube-discovery" aria-pressed="false"><?php esc_html_e( 'YouTube Discovery', 'turborank' ); ?></button>
		<button type="button" data-filter="brand-authority" aria-pressed="false"><?php esc_html_e( 'Brand Authority', 'turborank' ); ?></button>
		<button type="button" data-filter="ai-discovery" aria-pressed="false"><?php esc_html_e( 'AI Discovery', 'turborank' ); ?></button>
	</div>
	<?php
	$eps = array(
		array(
			'title'    => 'Lorem ipsum dolor sit amet, consectetur adipiscing',
			'meta'     => 'Lorem 23 · 38 min · Mar 4',
			'date'     => 'Mar 4, 2026',
			'duration' => '38 min',
			'desc'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Placeholder copy until the real episode embed is connected.',
			'filters'  => 'youtube-discovery brand-authority',
		),
		array(
			'title'    => 'Ut enim ad minim veniam, quis nostrud exercitation',
			'meta'     => 'Lorem 22 · 41 min · Feb 25',
			'date'     => 'Feb 25, 2026',
			'duration' => '41 min',
			'desc'     => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Short mock description for the episode modal.',
			'filters'  => 'youtube-discovery',
		),
		array(
			'title'    => 'Duis aute irure dolor in reprehenderit in voluptate',
			'meta'     => 'Lorem · 22 min · Feb 18',
			'date'     => 'Feb 18, 2026',
			'duration' => '22 min',
			'desc'     => 'Ut enim ad minim veniam, quis nostrud ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			'filters'  => 'brand-authority ai-discovery',
		),
		array(
			'title'    => 'Excepteur sint occaecat cupidatat non proident',
			'meta'     => 'Lorem 19 · 36 min · Jan 28',
			'date'     => 'Jan 28, 2026',
			'duration' => '36 min',
			'desc'     => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
			'filters'  => 'ai-discovery',
		),
		array(
			'title'    => 'Sunt in culpa qui officia deserunt mollit anim',
			'meta'     => 'Lorem 18 · 44 min · Jan 21',
			'date'     => 'Jan 21, 2026',
			'duration' => '44 min',
			'desc'     => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
			'filters'  => 'youtube-discovery brand-authority',
		),
		array(
			'title'    => 'Nemo enim ipsam voluptatem quia voluptas sit',
			'meta'     => 'Lorem 17 · 33 min · Jan 14',
			'date'     => 'Jan 14, 2026',
			'duration' => '33 min',
			'desc'     => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit. Mock summary text for the player area.',
			'filters'  => 'brand-authority',
		),
	);
	?>
	<ul class="tr-video-hub-episodes">
		<?php
		foreach ( $eps as $ep ) :
			?>
		<li class="tr-video-hub-episode" data-filters="<?php echo esc_attr( $ep['filters'] ); ?>">
			<div class="tr-video-hub-episode__thumb tr-video-hub-episode__thumb--placeholder" aria-hidden="true">
				<span class="tr-video-hub-episode__thumb-label">Image here</span>
			</div>
			<div class="tr-video-hub-episode__body">
				<h3><?php echo esc_html( $ep['title'] ); ?></h3>
				<p class="tr-video-hub-episode__meta"><?php echo esc_html( $ep['meta'] ); ?></p>
			</div>
			<button
				type="button"
				class="tr-video-hub-episode__play"
				data-episode-title="<?php echo esc_attr( $ep['title'] ); ?>"
				data-episode-date="<?php echo esc_attr( $ep['date'] ); ?>"
				data-episode-duration="<?php echo esc_attr( $ep['duration'] ); ?>"
				data-episode-description="<?php echo esc_attr( $ep['desc'] ); ?>"
				aria-label="<?php echo esc_attr( sprintf( __( 'Open episode: %s', 'turborank' ), $ep['title'] ) ); ?>"
			><span aria-hidden="true">&#9654;</span></button>
		</li>
			<?php
		endforeach;
		?>
	</ul>
	<nav class="tr-insights-pagination tr-insights-pagination--preview" aria-label="<?php esc_attr_e( 'Episodes pagination', 'turborank' ); ?>">
		<span class="is-muted"><?php esc_html_e( 'Previous', 'turborank' ); ?></span>
		<span class="is-current" aria-current="page">1</span>
		<span class="tr-insights-pagination__page">2</span>
		<span class="tr-insights-pagination__page">3</span>
		<span class="is-muted">…</span>
		<span class="tr-insights-pagination__page">12</span>
		<span class="is-muted"><?php esc_html_e( 'Next', 'turborank' ); ?></span>
	</nav>
	<div id="tr-podcast-episode-modal" class="tr-podcast-modal" hidden>
		<div class="tr-podcast-modal__backdrop" data-tr-podcast-modal-close tabindex="-1" aria-hidden="true"></div>
		<div
			class="tr-podcast-modal__panel"
			role="dialog"
			aria-modal="true"
			aria-labelledby="tr-podcast-modal-title"
			aria-describedby="tr-podcast-modal-desc"
		>
			<button type="button" class="tr-podcast-modal__close" data-tr-podcast-modal-close aria-label="<?php esc_attr_e( 'Close episode', 'turborank' ); ?>">
				<span aria-hidden="true">&times;</span>
			</button>
			<div class="tr-podcast-modal__video" aria-hidden="true">
				<span class="tr-podcast-modal__video-label"><?php esc_html_e( 'Video / embed goes here', 'turborank' ); ?></span>
			</div>
			<div class="tr-podcast-modal__content">
				<h2 id="tr-podcast-modal-title" class="tr-podcast-modal__title"></h2>
				<p class="tr-podcast-modal__meta">
					<span id="tr-podcast-modal-date" class="tr-podcast-modal__date"></span>
					<span class="tr-podcast-modal__meta-sep" aria-hidden="true">·</span>
					<span id="tr-podcast-modal-duration" class="tr-podcast-modal__duration"></span>
				</p>
				<p id="tr-podcast-modal-desc" class="tr-podcast-modal__description"></p>
			</div>
		</div>
	</div>
	<script>
	(function () {
		var root = document.querySelector('.tr-video-hub--podcast.tr-video-hub-body');
		if (!root) {
			return;
		}
		var toolbar = root.querySelector('.tr-results-filters');
		if (!toolbar) {
			return;
		}
		var buttons = toolbar.querySelectorAll('button[data-filter]');
		var items = root.querySelectorAll('.tr-video-hub-episode[data-filters]');

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

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-service tr-service-close tr-video-hub-close tr-video-hub-close--mist',
			'theme'         => 'light',
			'bg'            => turborank_section_mist_color(),
			'heading'       => 'Ready to grow<br>where buyers search?',
			'lead'          => 'Book a Discovery Session to see how TurboRank fits your brand.',
		)
	);
}

/**
 * Webinar page — upcoming vs on-demand split.
 */
function turborank_render_webinar_page() {
	$img = get_template_directory_uri() . '/assets/images/research-card-ai.jpg';

	turborank_service_open( 'tr-video-hub tr-video-hub--webinar tr-video-hub-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">Webinars</span></p>
	<div class="tr-video-hub-hero__grid tr-video-hub-hero__grid--webinar">
		<div class="tr-video-hub-hero__copy">
			<p class="tr-eyebrow">Live &amp; on-demand</p>
			<h1>Webinars for<br><em class="tr-em">discovery leaders</em></h1>
			<p class="tr-lead">Deep dives on AI visibility, YouTube strategy, and practical workflows your team can use the next day.</p>
		</div>
		<div class="tr-video-hub-mock tr-video-hub-mock--calendar" aria-hidden="true">
			<p class="tr-video-hub-mock__cal-title">March 2026</p>
			<div class="tr-video-hub-mock__cal-grid">
				<?php for ( $d = 1; $d <= 28; $d++ ) : ?>
				<span class="tr-video-hub-mock__cal-cell<?php echo 14 === $d ? ' is-highlight' : ''; ?>"><?php echo esc_html( (string) $d ); ?></span>
				<?php endfor; ?>
			</div>
			<p class="tr-video-hub-mock__cal-note">Next live · Thu 14th · 10am PT</p>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-video-hub tr-video-hub--webinar tr-video-hub-body', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-video-hub-cols">
		<section class="tr-video-hub-col" aria-labelledby="tr-webinar-upcoming">
			<h2 id="tr-webinar-upcoming" class="tr-video-hub-section-title">Upcoming</h2>
			<article class="tr-video-hub-card tr-video-hub-card--webinar">
				<div class="tr-video-hub-card__date-thumb" aria-hidden="true">
					<span class="tr-video-hub-card__date-thumb-month">Mar</span>
					<span class="tr-video-hub-card__date-thumb-day">14</span>
				</div>
				<div class="tr-video-hub-card__webinar-head">
					<p class="tr-video-hub-card__badge">Live webinar</p>
					<h3>Discovery Share in practice</h3>
					<p class="tr-video-hub-card__meta">Mar 14 · 10:00 AM PT · 45 min + Q&amp;A</p>
				</div>
				<div class="tr-video-hub-card__webinar-foot">
					<p class="tr-video-hub-card__excerpt">A walkthrough of how we measure AI mentions and citations — and what to change first on your site.</p>
					<a class="tr-video-hub-faux-btn" href="<?php echo esc_url( turborank_webinar_live_url() ); ?>">Register</a>
				</div>
			</article>
		</section>
		<section class="tr-video-hub-col" aria-labelledby="tr-webinar-ondemand">
			<h2 id="tr-webinar-ondemand" class="tr-video-hub-section-title">On demand</h2>
			<ul class="tr-video-hub-stack">
				<li class="tr-video-hub-stack__item">
					<span class="tr-video-hub-stack__thumb" style="background-image:url(<?php echo esc_url( $img ); ?>)"></span>
					<div>
						<h3>Lorem ipsum dolor sit amet</h3>
						<p class="tr-video-hub-card__meta">Consectetur adipiscing elit · 52 min</p>
					</div>
					<span class="tr-video-hub-stack__cta">Watch</span>
				</li>
				<li class="tr-video-hub-stack__item">
					<span class="tr-video-hub-stack__thumb" style="background-image:url(<?php echo esc_url( $img ); ?>)"></span>
					<div>
						<h3>Sed do eiusmod tempor incididunt</h3>
						<p class="tr-video-hub-card__meta">Ut labore et dolore magna · 48 min</p>
					</div>
					<span class="tr-video-hub-stack__cta">Watch</span>
				</li>
			</ul>
		</section>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-service tr-service-close tr-video-hub-close tr-video-hub-close--mist',
			'theme'         => 'light',
			'bg'            => turborank_section_mist_color(),
			'heading'       => 'Ready to grow<br>where buyers search?',
			'lead'          => 'Book a Discovery Session to see how TurboRank fits your brand.',
		)
	);
}

/**
 * Single webinar — registration / live: hero + stream + related.
 */
function turborank_render_webinar_live_page() {
	$img           = get_template_directory_uri() . '/assets/images/research-card-ai.jpg';
	$hub_page      = get_page_by_path( 'webinar' );
	$hub_url       = ( $hub_page instanceof WP_Post && 'publish' === $hub_page->post_status )
		? get_permalink( $hub_page )
		: home_url( '/webinar/' );
	$countdown_iso = '2026-03-14T17:00:00Z';

	turborank_service_open( 'tr-video-hub tr-video-hub--webinar-live tr-video-hub-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;/&nbsp; <a href="<?php echo esc_url( $hub_url ); ?>">Webinars</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">Live session</span></p>
	<div class="tr-video-hub-hero__grid tr-video-hub-hero__grid--webinar-live">
		<div class="tr-video-hub-hero__copy">
			<p class="tr-eyebrow">Live webinar</p>
			<h1>Discovery Share in<br><em class="tr-em">practice</em></h1>
			<p class="tr-lead">A walkthrough of how we measure AI mentions and citations — and what to change first on your site.</p>
			<div class="tr-webinar-live-speaker">
				<span class="tr-webinar-live-speaker__avatar" style="background-image:url(<?php echo esc_url( $img ); ?>)"></span>
				<div class="tr-webinar-live-speaker__body">
					<p class="tr-webinar-live-speaker__label">Speaker</p>
					<p class="tr-webinar-live-speaker__name">Matthew Pearce</p>
					<p class="tr-webinar-live-speaker__role">Head of Discovery Insights · TurboRank</p>
				</div>
			</div>
		</div>
		<div class="tr-webinar-live-countdown" data-tr-countdown="<?php echo esc_attr( $countdown_iso ); ?>" role="timer" aria-live="polite">
			<p class="tr-webinar-live-countdown__label">Starts in</p>
			<div class="tr-webinar-live-countdown__grid">
				<div class="tr-webinar-live-countdown__unit">
					<span class="tr-webinar-live-countdown__value" data-tr-cd="days">—</span>
					<span class="tr-webinar-live-countdown__unit-label">Days</span>
				</div>
				<div class="tr-webinar-live-countdown__unit">
					<span class="tr-webinar-live-countdown__value" data-tr-cd="hours">—</span>
					<span class="tr-webinar-live-countdown__unit-label">Hours</span>
				</div>
				<div class="tr-webinar-live-countdown__unit">
					<span class="tr-webinar-live-countdown__value" data-tr-cd="minutes">—</span>
					<span class="tr-webinar-live-countdown__unit-label">Mins</span>
				</div>
				<div class="tr-webinar-live-countdown__unit">
					<span class="tr-webinar-live-countdown__value" data-tr-cd="seconds">—</span>
					<span class="tr-webinar-live-countdown__unit-label">Secs</span>
				</div>
			</div>
			<p class="tr-webinar-live-countdown__meta">Mar 14 · 10:00 AM PT · 45 min + Q&amp;A</p>
			<p class="tr-webinar-live-countdown__register-wrap" hidden>
				<a class="tr-video-hub-faux-btn tr-webinar-live-countdown__register" href="#tr-webinar-live-stream"><?php esc_html_e( 'Register now', 'turborank' ); ?></a>
			</p>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-video-hub tr-video-hub--webinar-live tr-video-hub-body tr-webinar-live-stream-section', turborank_section_mist_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-webinar-live-stream-block">
		<div id="tr-webinar-live-stream" class="tr-webinar-live-stream-frame" role="region" aria-label="<?php esc_attr_e( 'Webinar video stream', 'turborank' ); ?>">
			<div class="tr-webinar-live-stream-frame__mock" style="background-image:url(<?php echo esc_url( $img ); ?>)">
				<span class="tr-webinar-live-stream-frame__play" aria-hidden="true">&#9654;</span>
			</div>
		</div>
		<p class="tr-webinar-live-stream-section__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-video-hub tr-video-hub--webinar-live tr-video-hub-body tr-webinar-live-more', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<h2 class="tr-video-hub-section-title">Lorem ipsum</h2>
	<div class="tr-webinar-more-grid" role="list">
		<?php
		$more_cards = array(
			array(
				'title' => 'Lorem ipsum dolor sit amet',
				'meta'  => 'Consectetur adipiscing elit · 45 min',
			),
			array(
				'title' => 'Sed do eiusmod tempor incididunt',
				'meta'  => 'Ut labore et dolore magna · 38 min',
			),
			array(
				'title' => 'Duis aute irure dolor',
				'meta'  => 'In reprehenderit in voluptate · 52 min',
			),
			array(
				'title' => 'Excepteur sint occaecat',
				'meta'  => 'Cupidatat non proident · 41 min',
			),
		);
		foreach ( $more_cards as $more ) :
			?>
		<article class="tr-webinar-more-card" role="listitem">
			<div class="tr-webinar-more-card__thumb" aria-hidden="true"></div>
			<div class="tr-webinar-more-card__body">
				<h3><?php echo esc_html( $more['title'] ); ?></h3>
				<p class="tr-video-hub-card__meta"><?php echo esc_html( $more['meta'] ); ?></p>
			</div>
			<a class="tr-webinar-more-card__cta" href="<?php echo esc_url( $hub_url ); ?>"><?php esc_html_e( 'Lorem ipsum', 'turborank' ); ?></a>
		</article>
			<?php
		endforeach;
		?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_video_hub_close();
}

/**
 * Markup for the swipeable Shorts deck (coverflow + phone cards). No outer section wrapper.
 *
 * @param array<int, array<string, mixed>> $videos Video rows from turborank_service_videos().
 */
function turborank_render_shorts_coverflow_deck( $videos ) {
	$videos_count = count( $videos );
	?>
	<div class="tr-video-hub-hero__deck-wrap">
		<div class="tr-video-hub-shorts-coverflow tr-video-hub-shorts-coverflow--hero">
			<div class="tr-video-hub-shorts-coverflow__frame" role="group" aria-label="<?php esc_attr_e( 'Shorts carousel', 'turborank' ); ?>">
				<button
					type="button"
					class="tr-video-hub-shorts-coverflow__arrow tr-video-hub-shorts-coverflow__arrow--prev"
					data-tr-shorts-scroll="prev"
					aria-label="<?php esc_attr_e( 'Previous Short', 'turborank' ); ?>"
					disabled
				>
					<span aria-hidden="true">&#10094;</span>
				</button>
				<div class="tr-video-hub-shorts-coverflow__viewport" tabindex="0" aria-label="<?php esc_attr_e( 'Swipe or drag to browse Shorts', 'turborank' ); ?>">
				<div class="tr-video-hub-shorts-coverflow__track" role="list">
					<?php
					foreach ( $videos as $index => $video ) :
						$deck_is_center = ( 0 === $index );
						$full_title     = ! empty( $video['full_title'] ) ? $video['full_title'] : $video['title'];
						$yid            = ! empty( $video['youtube_id'] ) ? $video['youtube_id'] : '';
						$thumb          = $yid ? turborank_service_video_thumb_url( $video ) : '';
						?>
					<article class="tr-video-hub-short-phone<?php echo $deck_is_center ? ' is-center' : ''; ?>" role="listitem" data-tr-deck-index="<?php echo esc_attr( (string) $index ); ?>">
							<div class="tr-video-hub-short-phone__screen">
								<?php if ( $thumb ) : ?>
								<img class="tr-video-hub-short-phone__poster" src="<?php echo esc_url( $thumb ); ?>" alt="" width="360" height="640" loading="lazy" decoding="async" />
								<?php endif; ?>
								<div class="tr-video-hub-short-phone__embed" hidden></div>
								<?php if ( $yid ) : ?>
								<button
									type="button"
									class="tr-video-hub-short-phone__play js-tr-shorts-deck-play"
									data-youtube-id="<?php echo esc_attr( $yid ); ?>"
									data-video-title="<?php echo esc_attr( $full_title ); ?>"
									aria-label="<?php echo esc_attr( sprintf( __( 'Play %s', 'turborank' ), $full_title ) ); ?>"
								>
									<span class="screen-reader-text">
										<?php
										echo esc_html(
											sprintf(
												/* translators: %s: video title */
												__( 'Play %s', 'turborank' ),
												$full_title
											)
										);
										?>
									</span>
									<span class="tr-video-hub-short-phone__play-icon" aria-hidden="true">&#9654;</span>
								</button>
								<?php endif; ?>
							</div>
					</article>
					<?php endforeach; ?>
				</div>
				</div>
				<button
					type="button"
					class="tr-video-hub-shorts-coverflow__arrow tr-video-hub-shorts-coverflow__arrow--next"
					data-tr-shorts-scroll="next"
					aria-label="<?php esc_attr_e( 'Next Short', 'turborank' ); ?>"
				>
					<span aria-hidden="true">&#10095;</span>
				</button>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Inline script: drag-scroll and center highlighting for every Shorts coverflow on the page.
 */
function turborank_print_shorts_coverflow_init_script() {
	?>
	<script>
	(function () {
		function initShortsDeck(rail) {
			if (!rail || rail.dataset.trShortsDeckInit === '1') {
				return;
			}
			rail.dataset.trShortsDeckInit = '1';

			var frame = rail.closest('.tr-video-hub-shorts-coverflow__frame');
			var track = rail.querySelector('.tr-video-hub-shorts-coverflow__track');
			var btnPrev = frame ? frame.querySelector('[data-tr-shorts-scroll="prev"]') : null;
			var btnNext = frame ? frame.querySelector('[data-tr-shorts-scroll="next"]') : null;

			if (!rail.id) {
				rail.id = 'tr-shorts-viewport-' + Math.random().toString(36).slice(2, 10);
			}
			if (btnPrev) {
				btnPrev.setAttribute('aria-controls', rail.id);
			}
			if (btnNext) {
				btnNext.setAttribute('aria-controls', rail.id);
			}

			if (!track) {
				return;
			}

			function getCards() {
				return track.querySelectorAll('.tr-video-hub-short-phone');
			}

			function updateCenterHighlight() {
				var list = getCards();
				var n = list.length;
				if (!n) {
					return;
				}
				var idx = nearestIndex();
				list.forEach(function (card, i) {
					card.classList.toggle('is-center', i === idx);
				});
			}

			var centerScrollTimer = null;
			function scheduleCenterHighlight() {
				window.clearTimeout(centerScrollTimer);
				centerScrollTimer = window.setTimeout(updateCenterHighlight, 100);
			}

			function scrollLeftToCard(card, smooth) {
				if (!card) {
					return;
				}
				var r = rail.getBoundingClientRect();
				var c = card.getBoundingClientRect();
				/* scrollLeft that aligns this card’s left edge with the viewport’s left */
				var left = rail.scrollLeft + (c.left - r.left);
				if (smooth) {
					rail.scrollTo({ left: left, behavior: 'smooth' });
				} else {
					rail.scrollLeft = left;
				}
			}

			function targetScrollForCard(card) {
				if (!card) {
					return 0;
				}
				var r = rail.getBoundingClientRect();
				var c = card.getBoundingClientRect();
				return rail.scrollLeft + (c.left - r.left);
			}

			function nearestIndex() {
				var list = getCards();
				var n = list.length;
				if (!n) {
					return 0;
				}
				var sl = rail.scrollLeft;
				var best = 0;
				var bestDist = Infinity;
				for (var i = 0; i < n; i++) {
					var card = list[i];
					var target = targetScrollForCard(card);
					var d = Math.abs(sl - target);
					if (d < bestDist) {
						bestDist = d;
						best = i;
					}
				}
				return best;
			}

			function scrollToIndex(index, smooth) {
				var list = getCards();
				var n = list.length;
				if (!n) {
					return;
				}
				var i = Math.max(0, Math.min(n - 1, index));
				scrollLeftToCard(list[i], smooth);
			}

			function updateArrows() {
				if (!btnPrev || !btnNext) {
					return;
				}
				var list = getCards();
				var n = list.length;
				var maxScroll = Math.max(0, rail.scrollWidth - rail.clientWidth);
				if (n <= 1 || maxScroll < 2) {
					btnPrev.disabled = true;
					btnNext.disabled = true;
					btnPrev.setAttribute('aria-disabled', 'true');
					btnNext.setAttribute('aria-disabled', 'true');
					return;
				}
				var idx = nearestIndex();
				btnPrev.disabled = idx <= 0;
				btnNext.disabled = idx >= n - 1;
				if (rail.scrollLeft <= 1) {
					btnPrev.disabled = true;
				}
				if (rail.scrollLeft >= maxScroll - 1) {
					btnNext.disabled = true;
				}
				btnPrev.setAttribute('aria-disabled', btnPrev.disabled ? 'true' : 'false');
				btnNext.setAttribute('aria-disabled', btnNext.disabled ? 'true' : 'false');
			}

			if (btnPrev) {
				btnPrev.addEventListener('click', function () {
					var i = nearestIndex();
					scrollToIndex(i - 1, true);
				});
			}
			if (btnNext) {
				btnNext.addEventListener('click', function () {
					var i = nearestIndex();
					scrollToIndex(i + 1, true);
				});
			}

			rail.addEventListener('scroll', function () {
				updateArrows();
				scheduleCenterHighlight();
			});
			if ('onscrollend' in rail) {
				rail.addEventListener('scrollend', updateCenterHighlight);
			}
			window.addEventListener('resize', function () {
				window.setTimeout(updateArrows, 0);
			});

			var dragStartX = 0;
			var dragStartScroll = 0;
			var dragging = false;
			var dragPointerId = null;

			function endDeckDrag(e) {
				if (!dragging || e.pointerId !== dragPointerId) {
					return;
				}
				dragging = false;
				dragPointerId = null;
				rail.classList.remove('is-dragging', 'is-drag-scroll');
				try {
					rail.releasePointerCapture(e.pointerId);
				} catch (err) {
					/* ignore */
				}
				updateArrows();
				updateCenterHighlight();
			}

			rail.addEventListener('pointerdown', function (e) {
				if (e.button !== undefined && e.button !== 0) {
					return;
				}
				if (e.target.closest && e.target.closest('a, button, .js-tr-shorts-deck-play, .tr-video-hub-shorts-coverflow__arrow, iframe')) {
					return;
				}
				dragging = true;
				dragPointerId = e.pointerId;
				dragStartX = e.clientX;
				dragStartScroll = rail.scrollLeft;
				rail.classList.add('is-dragging');
				try {
					rail.setPointerCapture(e.pointerId);
				} catch (err2) {
					/* ignore */
				}
			});

			rail.addEventListener('pointermove', function (e) {
				if (!dragging || e.pointerId !== dragPointerId) {
					return;
				}
				var dx = e.clientX - dragStartX;
				if (Math.abs(dx) > 4) {
					rail.classList.add('is-drag-scroll');
				}
				rail.scrollLeft = dragStartScroll - dx;
				updateArrows();
			});

			rail.addEventListener('pointerup', endDeckDrag);
			rail.addEventListener('pointercancel', endDeckDrag);

			rail.addEventListener('keydown', function (e) {
				var i = nearestIndex();
				if (e.key === 'ArrowLeft') {
					e.preventDefault();
					scrollToIndex(i - 1, true);
				} else if (e.key === 'ArrowRight') {
					e.preventDefault();
					scrollToIndex(i + 1, true);
				}
			});

			window.setTimeout(function () {
				updateArrows();
				updateCenterHighlight();
			}, 0);
		}

		document.querySelectorAll('.tr-video-hub-shorts-coverflow--hero .tr-video-hub-shorts-coverflow__viewport').forEach(initShortsDeck);
	}());
	</script>
	<?php
}

/**
 * Shorts hero: swipeable YouTube Shorts deck (Shorts page).
 *
 * @param string $breadcrumb_trail Visible crumb label after Home.
 */
function turborank_render_shorts_hero_section( $breadcrumb_trail = 'Shorts' ) {
	$videos = turborank_service_videos();

	turborank_service_open( 'tr-video-hub tr-video-hub--shorts tr-video-hub-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><?php echo esc_html( $breadcrumb_trail ); ?></span></p>
	<div class="tr-video-hub-hero__grid tr-video-hub-hero__grid--shorts">
		<div class="tr-video-hub-hero__copy">
			<p class="tr-eyebrow">Shorts</p>
			<h1>Swipe <em class="tr-em">the deck</em></h1>
			<p class="tr-lead"><?php esc_html_e( 'Swipe through the same TurboRank Shorts we feature on AI Discovery — tap play to watch.', 'turborank' ); ?></p>
			<p class="tr-video-hub-hero__meta"><span class="tr-video-hub-pill">AI Discovery picks</span><span class="tr-video-hub-pill tr-video-hub-pill--ghost">9:16 Shorts</span></p>
		</div>
		<?php turborank_render_shorts_coverflow_deck( $videos ); ?>
	</div>
	<?php turborank_print_shorts_coverflow_init_script(); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Video gallery — filterable grid of mock players plus Shorts swipe deck.
 */
function turborank_render_video_gallery_page() {
	$items = array(
		array(
			'title'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
			'tag'     => 'Lorem',
			'filters' => 'youtube-discovery brand-authority',
		),
		array(
			'title'   => 'Sed do eiusmod tempor incididunt ut labore et dolore magna',
			'tag'     => 'Ipsum',
			'filters' => 'youtube-discovery',
		),
		array(
			'title'   => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco',
			'tag'     => 'Dolor',
			'filters' => 'brand-authority ai-discovery',
		),
		array(
			'title'   => 'Duis aute irure dolor in reprehenderit in voluptate velit esse',
			'tag'     => 'Sit',
			'filters' => 'ai-discovery',
		),
		array(
			'title'   => 'Excepteur sint occaecat cupidatat non proident sunt in culpa',
			'tag'     => 'Amet',
			'filters' => 'youtube-discovery brand-authority',
		),
		array(
			'title'   => 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut',
			'tag'     => 'Consectetur',
			'filters' => 'brand-authority',
		),
		array(
			'title'   => 'At vero eos et accusamus et iusto odio dignissimos ducimus',
			'tag'     => 'Adipisci',
			'filters' => 'youtube-discovery ai-discovery',
		),
		array(
			'title'   => 'Qui blanditiis praesentium voluptatum deleniti atque corrupti',
			'tag'     => 'Velit',
			'filters' => 'ai-discovery',
		),
		array(
			'title'   => 'Quos dolores et quas molestias excepturi sint occaecati',
			'tag'     => 'Magnam',
			'filters' => 'youtube-discovery brand-authority',
		),
	);

	turborank_service_open( 'tr-video-hub tr-video-hub--gallery tr-video-hub-hero tr-video-hub-hero--homepage', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">Video gallery</span></p>
	<div class="tr-video-hub-hero__center">
		<p class="tr-eyebrow">Lorem ipsum</p>
		<h1>Lorem ipsum <em class="tr-em">dolor sit amet</em></h1>
		<p class="tr-lead tr-video-hub-hero__narrow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-video-hub tr-video-hub--gallery tr-video-hub-body', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-results-filters" role="toolbar" aria-label="<?php esc_attr_e( 'Filter videos', 'turborank' ); ?>">
		<button type="button" class="is-active" data-filter="all" aria-pressed="true"><?php esc_html_e( 'All', 'turborank' ); ?></button>
		<button type="button" data-filter="youtube-discovery" aria-pressed="false"><?php esc_html_e( 'YouTube Discovery', 'turborank' ); ?></button>
		<button type="button" data-filter="brand-authority" aria-pressed="false"><?php esc_html_e( 'Brand Authority', 'turborank' ); ?></button>
		<button type="button" data-filter="ai-discovery" aria-pressed="false"><?php esc_html_e( 'AI Discovery', 'turborank' ); ?></button>
	</div>
	<div class="tr-video-hub-gallery">
		<?php foreach ( $items as $item ) : ?>
		<article class="tr-video-hub-tile" data-filters="<?php echo esc_attr( $item['filters'] ); ?>">
			<div class="tr-video-hub-tile__frame" aria-hidden="true">
				<span class="tr-video-hub-tile__play">&#9654;</span>
			</div>
			<p class="tr-video-hub-tile__tag"><?php echo esc_html( $item['tag'] ); ?></p>
			<h3 class="tr-video-hub-tile__title"><?php echo esc_html( $item['title'] ); ?></h3>
		</article>
		<?php endforeach; ?>
	</div>
	<nav class="tr-insights-pagination tr-video-hub-gallery-pagination" data-tr-gallery-pagination aria-label="<?php esc_attr_e( 'Video gallery pagination', 'turborank' ); ?>" hidden>
		<button type="button" class="tr-video-hub-gallery-pagination__prev" data-tr-gallery-page="prev" disabled>
			<?php esc_html_e( 'Previous', 'turborank' ); ?>
		</button>
		<span class="tr-video-hub-gallery-pagination__pages" data-tr-gallery-page-list role="group" aria-label="<?php esc_attr_e( 'Pages', 'turborank' ); ?>"></span>
		<button type="button" class="tr-video-hub-gallery-pagination__next" data-tr-gallery-page="next" disabled>
			<?php esc_html_e( 'Next', 'turborank' ); ?>
		</button>
	</nav>
	<script>
	(function () {
		var root = document.querySelector('.tr-video-hub--gallery.tr-video-hub-body');
		if (!root) {
			return;
		}
		var toolbar = root.querySelector('.tr-results-filters');
		var buttons = toolbar ? toolbar.querySelectorAll('button[data-filter]') : [];
		var tiles = root.querySelectorAll('.tr-video-hub-gallery .tr-video-hub-tile[data-filters]');
		var nav = root.querySelector('[data-tr-gallery-pagination]');
		var btnPrev = nav ? nav.querySelector('[data-tr-gallery-page="prev"]') : null;
		var btnNext = nav ? nav.querySelector('[data-tr-gallery-page="next"]') : null;
		var pageList = nav ? nav.querySelector('[data-tr-gallery-page-list]') : null;
		if (!buttons.length || !tiles.length || !nav || !btnPrev || !btnNext || !pageList) {
			return;
		}

		/* Show full grid in one view (e.g. 3×3 on wide screens). */
		var perPage = 9;
		var currentPage = 1;

		function applyFilter(filter) {
			currentPage = 1;
			buttons.forEach(function (button) {
				var isAct = button.dataset.filter === filter;
				button.classList.toggle('is-active', isAct);
				button.setAttribute('aria-pressed', isAct ? 'true' : 'false');
			});
			tiles.forEach(function (tile) {
				if (filter === 'all') {
					tile.classList.remove('is-hidden');
					return;
				}
				var tags = (tile.getAttribute('data-filters') || '').split(/\s+/);
				tile.classList.toggle('is-hidden', tags.indexOf(filter) === -1);
			});
			updatePagination();
		}

		function visibleTiles() {
			return Array.prototype.filter.call(tiles, function (tile) {
				return !tile.classList.contains('is-hidden');
			});
		}

		function updatePagination() {
			var list = visibleTiles();
			var total = list.length;
			var totalPages = total === 0 ? 1 : Math.ceil(total / perPage);
			if (currentPage > totalPages) {
				currentPage = totalPages;
			}
			if (currentPage < 1) {
				currentPage = 1;
			}

			list.forEach(function (tile, index) {
				var pageIndex = Math.floor(index / perPage) + 1;
				tile.classList.toggle('tr-video-hub-tile--page-hidden', pageIndex !== currentPage);
			});

			Array.prototype.forEach.call(tiles, function (tile) {
				if (tile.classList.contains('is-hidden')) {
					tile.classList.remove('tr-video-hub-tile--page-hidden');
				}
			});

			if (totalPages <= 1) {
				nav.hidden = true;
				btnPrev.disabled = true;
				btnNext.disabled = true;
				pageList.textContent = '';
				return;
			}

			nav.hidden = false;
			btnPrev.disabled = currentPage <= 1;
			btnNext.disabled = currentPage >= totalPages;

			btnPrev.classList.toggle('is-muted', btnPrev.disabled);
			btnNext.classList.toggle('is-muted', btnNext.disabled);

			pageList.textContent = '';
			for (var p = 1; p <= totalPages; p++) {
				var el;
				if (p === currentPage) {
					el = document.createElement('span');
					el.className = 'is-current';
					el.setAttribute('aria-current', 'page');
					el.textContent = String(p);
				} else {
					el = document.createElement('button');
					el.type = 'button';
					el.className = 'tr-insights-pagination__page';
					el.setAttribute('data-tr-gallery-page-num', String(p));
					el.textContent = String(p);
					el.addEventListener('click', (function (page) {
						return function () {
							currentPage = page;
							updatePagination();
						};
					})(p));
				}
				pageList.appendChild(el);
			}
		}

		btnPrev.addEventListener('click', function () {
			if (currentPage > 1) {
				currentPage -= 1;
				updatePagination();
			}
		});
		btnNext.addEventListener('click', function () {
			var list = visibleTiles();
			var totalPages = list.length === 0 ? 1 : Math.ceil(list.length / perPage);
			if (currentPage < totalPages) {
				currentPage += 1;
				updatePagination();
			}
		});

		buttons.forEach(function (button) {
			button.addEventListener('click', function () {
				applyFilter(button.dataset.filter);
			});
		});

		applyFilter('all');
	}());
	</script>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-video-hub tr-video-hub--gallery tr-video-hub-gallery-shorts-band', turborank_section_mist_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-video-hub-gallery-shorts">
		<div class="tr-video-hub-gallery-shorts__intro">
			<p class="tr-eyebrow tr-video-hub-gallery-shorts__eyebrow"><?php esc_html_e( 'Shorts', 'turborank' ); ?></p>
			<h2 class="tr-video-hub-gallery-shorts__title"><?php esc_html_e( 'Swipe', 'turborank' ); ?> <em class="tr-em"><?php esc_html_e( 'the deck', 'turborank' ); ?></em></h2>
			<p class="tr-video-hub-gallery-shorts__lead"><?php esc_html_e( 'Swipe through the same TurboRank Shorts we feature on AI Discovery — tap play to watch.', 'turborank' ); ?></p>
		</div>
		<?php turborank_render_shorts_coverflow_deck( turborank_service_videos() ); ?>
	</div>
	<?php turborank_print_shorts_coverflow_init_script(); ?>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-service tr-service-close tr-video-hub-close tr-video-hub-close--white',
			'theme'         => 'light',
			'bg'            => turborank_section_white_color(),
			'heading'       => 'Ready to grow<br>where buyers search?',
			'lead'          => 'Book a Discovery Session to see how TurboRank fits your brand.',
		)
	);
}

/**
 * Shorts — hero with swipeable YouTube Shorts mocks (videos from AI Discovery learn section).
 */
function turborank_render_shorts_page() {
	turborank_render_shorts_hero_section( 'Shorts' );

	turborank_render_video_hub_close();
}
