<?php
/**
 * Service page markup for AI Discovery, YouTube Discovery, and Brand Authority.
 *
 * Layout follows Figma node 9:990.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Warm section surface (#f6f1e7) — only alternate to white for page bands.
 *
 * @return string
 */
function turborank_section_warm_color() {
	return '#f6f1e7';
}

/**
 * White section band — alternating layout.
 *
 * @return string
 */
function turborank_section_white_color() {
	return '#ffffff';
}

/**
 * Light gray section band — alternating layout (matches About timeline).
 *
 * @return string
 */
function turborank_section_mist_color() {
	return '#F9F9F7';
}

/**
 * Map dark / beige section backgrounds to warm or white; fix text on former dark bands.
 *
 * @param string $bg   Background hex.
 * @param string $text Text hex.
 * @return array{0: string, 1: string}
 */
function turborank_normalize_section_surface( $bg, $text ) {
	$bg_trim   = trim( (string) $bg );
	$text_trim = trim( (string) $text );
	$bg_key    = strtolower( ltrim( $bg_trim, '#' ) );
	$text_key  = strtolower( ltrim( $text_trim, '#' ) );

	$white_keys  = array( 'ffffff', 'fff' );
	$light_keys  = array( 'f6f1e7', 'f9f9f7', 'f3f1eb', 'fafaf6', 'efede8', 'f7f6f2' );
	$preserve_bg = in_array( $bg_key, $white_keys, true ) || in_array( $bg_key, $light_keys, true );

	if ( $preserve_bg ) {
		return array( $bg_trim, $text_trim );
	}

	$new_bg   = turborank_section_warm_color();
	$new_text = $text_trim;

	$light_text_keys = array( 'ffffff', 'fff' );
	if ( in_array( $text_key, $light_text_keys, true ) ) {
		$new_text = '#121212';
	}

	return array( $new_bg, $new_text );
}

/**
 * Phone / email contact line (matches homepage hero hotline).
 *
 * @param array<string, string> $args {
 *     @type string $mode  'prefer' (default) or 'or' for assessment-style lead-in.
 *     @type string $class Extra CSS classes on the paragraph.
 * }
 * @return string
 */
function turborank_contact_line( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'mode'  => 'prefer',
			'class' => 'tr-hotline tr-hero-contact-line',
		)
	);

	$lead = ( 'or' === $args['mode'] ) ? 'Or call' : 'Prefer to talk first? Call';

	return sprintf(
		'<p class="%1$s">%2$s <a href="tel:5105215100">(510) 521-5100</a> or email <a href="mailto:hello@turborank.co">hello@turborank.co</a></p>',
		esc_attr( $args['class'] ),
		esc_html( $lead )
	);
}

/**
 * Full-width closing CTA band (reference layout for service + marketing pages).
 *
 * Markup: tr-close-inner → tr-close-grid → heading (+ optional lead) + tr-close-actions.
 *
 * @param array<string, string> $args {
 *     @type string $section_class Wrapper classes (include `tr-service tr-service-close`).
 *     @type string $bg            Background hex.
 *     @type string $text          Text color hex.
 *     @type string $heading       H2 copy; may include `<br>`.
 *     @type string $lead           Optional subline below the heading.
 *     @type string $lead_badge     Optional badge after the lead (e.g. Updated).
 *     @type string $theme         Optional `light` (cream band) or default dark `#121317`.
 *     @type string $button_label  Primary button label.
 *     @type string $button_href   Primary button URL.
 *     @type string $button_variant Button style: `primary` or `ghost`.
 *     @type bool   $show_contact  Whether to show phone and email under the button.
 * }
 */
function turborank_render_close_cta( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'section_class'  => 'tr-service tr-service-close',
			'theme'          => 'dark',
			'bg'             => turborank_section_warm_color(),
			'text'           => '#121212',
			'heading'        => '',
			'lead'           => '',
			'lead_badge'     => '',
			'button_label'   => 'Book a Discovery Session',
			'button_href'    => turborank_discovery_session_url(),
			'button_variant' => 'primary',
			'show_contact'   => true,
		)
	);

	if ( 'light' === $args['theme'] ) {
		$args['text'] = '#121212';
		if ( false === strpos( $args['section_class'], 'tr-service-close--light' ) ) {
			$args['section_class'] .= ' tr-service-close--light';
		}
		$bg_trim = strtolower( ltrim( trim( (string) $args['bg'] ), '#' ) );
		$white_bg_keys = array( 'ffffff', 'fff' );
		$mist_bg_key   = strtolower( ltrim( trim( turborank_section_mist_color() ), '#' ) );
		if ( ! in_array( $bg_trim, $white_bg_keys, true ) && $bg_trim !== $mist_bg_key ) {
			$args['bg'] = turborank_section_warm_color();
		}
	}

	list( $args['bg'], $args['text'] ) = turborank_normalize_section_surface( $args['bg'], $args['text'] );

	$allowed_heading = array(
		'br'   => array(),
		'span' => array(
			'class' => true,
		),
	);

	turborank_service_open( $args['section_class'], $args['bg'], $args['text'] );
	ob_start();
	?>
	<div class="tr-close-inner">
		<div class="tr-close-grid">
			<?php if ( $args['lead'] ) : ?>
			<div class="tr-close-heading">
				<h2><?php echo wp_kses( $args['heading'], $allowed_heading ); ?></h2>
				<p class="tr-close-lead">
					<?php echo esc_html( $args['lead'] ); ?>
					<?php if ( ! empty( $args['lead_badge'] ) ) : ?>
						<span class="tr-lead-badge"><?php echo esc_html( $args['lead_badge'] ); ?></span>
					<?php endif; ?>
				</p>
			</div>
			<?php else : ?>
				<h2><?php echo wp_kses( $args['heading'], $allowed_heading ); ?></h2>
			<?php endif; ?>
			<div class="tr-close-actions">
				<div class="wp-block-buttons tr-btn-row is-layout-flex wp-block-buttons-is-layout-flex">
					<?php
					$btn_class = 'ghost' === $args['button_variant'] ? 'tr-btn-ghost' : 'tr-btn-primary';
					?>
					<div class="wp-block-button <?php echo esc_attr( $btn_class ); ?>"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $args['button_href'] ); ?>"><?php echo esc_html( $args['button_label'] ); ?></a></div>
				</div>
				<?php if ( $args['show_contact'] ) : ?>
				<p class="tr-close-contact">
					<a href="tel:5105215100">(510) 521-5100</a>
					<a href="mailto:hello@turborank.co">hello@turborank.co</a>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Shared learning videos from the AI Discovery frame.
 *
 * @return array<int, array<string, string>>
 */
function turborank_service_videos() {
	return array(
		array(
			'title'      => 'Does ChatGPT Know Your Brand How to …',
			'full_title' => 'Does ChatGPT Know Your Brand How to Appear in ChatGPT',
			'youtube_id' => 'W49JAJ4AMNs',
		),
		array(
			'title'      => 'AI Search Doesn’t Invent Experts, It Find…',
			'full_title' => 'AI Search Doesn\'t Invent Experts, It Finds Them. Is Your Business Visible?',
			'youtube_id' => 'MVvAA0TPSOA',
		),
		array(
			'title'      => 'The Buying Process Doesn’t Start Where…',
			'full_title' => 'The Buying Process Doesn\'t Start Where Most Executives Think',
			'youtube_id' => 'sT0-4lszSNs',
		),
		array(
			'title'      => 'Machine Readable Authority: Why YouTu…',
			'full_title' => 'Machine Readable Authority: Why YouTube Builds AI Trust',
			'youtube_id' => 'udDeCeUIhXY',
		),
		array(
			'title'      => 'YouTube’s AI Search Carousels (Premium): …',
			'full_title' => 'YouTube\'s AI Search Carousels (Premium): Rank with Clarity, Not Fluff',
			'youtube_id' => 'o04p1qndyd4',
		),
		array(
			'title'      => 'Mastering AI Content Indexing in 60 Second…',
			'full_title' => 'Mastering AI Content Indexing in 60 Seconds: SEO Optimization for YouTube, Reddit and Google',
			'youtube_id' => '3iYFYyXsK7s',
		),
	);
}

/**
 * First N learning Shorts for swipe decks (Shorts page, video gallery).
 *
 * @param int $limit Max videos (default 5).
 * @return array<int, array<string, string>>
 */
function turborank_service_videos_for_shorts_deck( $limit = 5 ) {
	$limit = max( 1, (int) $limit );
	$all   = turborank_service_videos();
	return array_slice( $all, 0, $limit );
}

/**
 * YouTube watch URL for a service video (Shorts when available).
 *
 * @param array<string, string> $video Video row from turborank_service_videos().
 * @return string
 */
function turborank_service_video_watch_url( $video ) {
	if ( ! empty( $video['youtube_id'] ) ) {
		return 'https://www.youtube.com/shorts/' . rawurlencode( $video['youtube_id'] );
	}

	if ( ! empty( $video['query'] ) ) {
		return 'https://www.youtube.com/results?search_query=' . rawurlencode( $video['query'] );
	}

	return 'https://www.youtube.com/@turborank-co/shorts';
}

/**
 * YouTube thumbnail for a service video.
 *
 * @param array<string, string> $video Video row from turborank_service_videos().
 * @return string
 */
function turborank_service_video_thumb_url( $video ) {
	if ( empty( $video['youtube_id'] ) ) {
		return '';
	}

	return 'https://i.ytimg.com/vi/' . rawurlencode( $video['youtube_id'] ) . '/hqdefault.jpg';
}

/**
 * Enqueue learn-section video modal script (safe to call during pattern render).
 */
function turborank_enqueue_service_learn_video_assets() {
	wp_enqueue_script(
		'turborank-service-learn-video',
		get_template_directory_uri() . '/assets/js/service-learn-video.js',
		array(),
		TURBORANK_VERSION,
		true
	);
}

/**
 * Shared modal for in-page YouTube playback.
 */
function turborank_render_service_video_modal() {
	turborank_enqueue_service_learn_video_assets();
	?>
	<div id="tr-video-modal" class="tr-video-modal" hidden>
		<div class="tr-video-modal__backdrop" data-tr-video-close tabindex="-1" aria-hidden="true"></div>
		<div class="tr-video-modal__panel" role="dialog" aria-modal="true" aria-labelledby="tr-video-modal-title">
			<button type="button" class="tr-video-modal__close" data-tr-video-close aria-label="<?php esc_attr_e( 'Close video', 'turborank' ); ?>">
				<span aria-hidden="true">&times;</span>
			</button>
			<p id="tr-video-modal-title" class="tr-video-modal__title"></p>
			<div class="tr-video-modal__frame"></div>
		</div>
	</div>
	<?php
}

/**
 * Markup for one learning-video card.
 *
 * @param array<string, string> $video Video row from turborank_service_videos().
 * @return void
 */
function turborank_render_service_video_card( $video ) {
	$watch      = turborank_service_video_watch_url( $video );
	$thumb      = turborank_service_video_thumb_url( $video );
	$label      = ! empty( $video['full_title'] ) ? $video['full_title'] : $video['title'];
	$yid        = ! empty( $video['youtube_id'] ) ? $video['youtube_id'] : '';
	$watch_attrs = '';
	if ( $yid ) {
		$watch_attrs = sprintf(
			' class="js-tr-video-watch" href="%1$s" data-youtube-id="%2$s" data-video-title="%3$s"',
			esc_url( $watch ),
			esc_attr( $yid ),
			esc_attr( $label )
		);
	} else {
		$watch_attrs = sprintf(
			' href="%1$s" target="_blank" rel="noopener noreferrer"',
			esc_url( $watch )
		);
	}
	?>
	<article class="tr-video">
		<?php if ( $thumb ) : ?>
			<a class="tr-video__thumb<?php echo $yid ? ' js-tr-video-watch' : ''; ?>" href="<?php echo esc_url( $watch ); ?>"<?php echo $yid ? ' data-youtube-id="' . esc_attr( $yid ) . '" data-video-title="' . esc_attr( $label ) . '"' : ' target="_blank" rel="noopener noreferrer"'; ?>>
				<img class="tr-video__img" src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $label ); ?>" width="480" height="720" loading="lazy" decoding="async" />
				<span class="tr-video__badge">Short</span>
			</a>
		<?php else : ?>
			<div class="tr-video__thumb tr-video__thumb--placeholder" aria-hidden="true"></div>
		<?php endif; ?>
		<h3 title="<?php echo esc_attr( $label ); ?>"><?php echo esc_html( $video['title'] ); ?></h3>
		<p class="tr-video__links">
			<a<?php echo $watch_attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>Watch</a>
		</p>
	</article>
	<?php
}

/**
 * Page content keyed by slug.
 *
 * @return array<string, array<string, mixed>>
 */
function turborank_service_definitions() {
	$videos = turborank_service_videos();

	return array(
		'ai-discovery'       => array(
			'hero_layout'     => 'centered',
			'hero_breadcrumb' => true,
			'eyebrow'         => 'AI Discovery',
			'title'       => '<span class="tr-service-hero__title-line">What does AI say about</span><span class="tr-service-hero__title-line"><em class="tr-em">your brand?</em></span>',
			'lead'        => 'Your buyers ask ChatGPT, Gemini, Perplexity and Google AI for recommendations. We measure where your brand appears, show which sources AI relies on when competitors appear instead, and our specialists improve the content and sources those answers draw on.',
			'secondary'  => 'How we measure',
			'panel'      => array(
				'class' => 'tr-monitor--hero-snapshot',
				'label' => 'Buyer prompt monitor',
				'badge' => 'Illustrative example',
				'note'  => '[N] prompts, each run [N] times',
				'heads' => array( 'Buyer prompt', 'ChatGPT', 'Gemini', 'Perplexity', 'Google AI' ),
				'rows'  => array(
					array( '“What’s the best [product] for …”', 'Mentioned', 'None', 'Cited', 'Cited' ),
					array( '“Compare [you] vs [competitor]”', 'Mentioned', 'Mentioned', 'None', 'Cited' ),
					array( '“Who should I use for …”', 'None', 'None', 'None', 'Mentioned' ),
					array( '“What companies offer …”', 'None', 'Mentioned', 'None', 'None' ),
				),
			),
			'about'      => array(
				'heading' => 'What is AI Discovery?',
				'body'    => array(
					'AI Discovery is TurboRank’s service for improving how often, and how accurately, AI assistants mention your brand when buyers ask questions in your category. We check how ChatGPT, Gemini, Perplexity and Google AI describe your brand, then improve the content and sources those answers draw on.',
				),
				'aside'   => 'No one controls AI answers. We don’t<br class="tr-aside__line-break" aria-hidden="true" /> pretend to.',
				'points'  => array(
					array( 'We measure', 'A fixed set of buyer prompts, run repeatedly and date-stamped, so changes are real and not noise.' ),
					array( 'Our team acts', 'Our answer engine and video specialists improve and create the content, videos and third-party sources AI answers cite in your category.' ),
					array( 'We report what changed', 'What changed in AI answers, reported alongside the work we did.' ),
				),
			),
			'why'        => array(
				'heading' => '<span class="tr-ai-why-heading__line">Why does AI recommend some </span><span class="tr-ai-why-heading__line">brands and not' . "\u{00A0}" . 'others?</span>',
				'lead'    => 'Every AI engine draws on different sources, and answers change from one run to the next. A single AI answer tells you almost nothing. Patterns across repeated runs tell you a lot.',
				'stats'   => array(
					array( '86%', 'of AI-cited YouTube videos weren’t in YouTube’s top 10 for the same query. Ranking on YouTube and being cited by AI aren’t the same thing.', '[Source link]' ),
					array( '37%', 'of cited sites were shared between repeated runs of the same ChatGPT question. That’s why we run every prompt more than once.', '[Source link]' ),
					array( '59% vs 4.8%', 'Share of cited AI answers that included YouTube in Google AI Overviews versus ChatGPT, in a B2B software dataset.', '[Source link]' ),
				),
			),
			'measure'    => array(
				'heading' => 'How do we measure AI visibility?',
				'lead'    => 'With two metrics, defined once and used the same way for every client. We run a fixed set of buyer prompts on each platform, repeat every run, and date-stamp the results.',
				'cards'   => array(
					array( 'Discovery Share', 'The percentage of a fixed set of monitored buyer-intent prompts in which your brand appears in an AI-generated answer, measured across defined platforms, runs and time periods.' ),
					array( 'Citation Share', 'The percentage of monitored AI answers in which your own content or domain is cited as a source. It shows whether AI is learning about you from you.' ),
				),
			),
			'include'    => array(
				'heading' => 'What does AI Discovery include?',
				'lead'    => 'Measurement is where the work starts, not where it ends. Every engagement follows the TurboRank Discovery Framework, directed by what the measurement shows.',
				'items'   => array(
					array( 'AI visibility baseline', 'Where your brand appears today, on which platforms and for which buyer questions.' ),
					array( 'Competitor and source analysis', 'Which competitors appear instead of you, and which sites AI cites when they do.' ),
					array( 'Answer engine optimization', 'Buyer-intent answers, content gaps, and consistent descriptions of your brand, products and claims.' ),
					array( 'Structured content guidance', 'Schema and page structure that make your content easier for AI to understand and quote.' ),
					array( 'Video where it’s part of the answer', 'When AI cites video in your category, we optimize or create it through <a class="tr-include-link" href="/youtube-discovery/">YouTube Discovery</a>.' ),
					array( 'Ongoing tracking', 'Discovery Share and Citation Share over time, with what changed and what we did.' ),
				),
			),
			'work'       => array(
				'heading' => 'What does the work look like?',
				'lead'    => 'Every piece of work starts from a gap the measurement shows, and ends with a report on whether it moved.',
				'note'    => 'Illustrative sequence.',
				'steps'   => array(
					array( 'light', '1. What we found', 'A buyer prompt you’re missing', '“[Comparison prompt]”: competitors appear in most runs, you appear in none. The answers cite [review site], [competitor page] and a competitor video.' ),
					array( 'light', '2. What our team did', 'Worked on the sources behind the answer', 'Strengthened the answer on your [comparison page], reoptimized a relevant video, and pursued a mention on the most-cited third-party source.' ),
					array( 'dark', '3. What we reported', 'Whether it moved', 'Whether your brand began appearing, on which platforms, in how many runs, and whether the change beat normal variation.' ),
				),
			),
			'proof'      => array(
				'heading' => 'Documented AI citations',
				'lead'    => 'Brands we work with, cited in AI answers. Client names are anonymized, and each example shows the program, the period and what was counted.',
				'layout'  => 'text',
				'cards'   => array(
					array(
						'1. Documented citation',
						'Pet Technology Creator Program',
						'June 2026 · [Client OK pending]',
						'256',
						'times AI platforms cited review videos we optimized, up 40% from 183 in May.',
						'Counted by an outside AI visibility tool. A citation count, not Citation Share.',
					),
					array(
						'2. Documented citation',
						'[Public client label]',
						'[Measurement period]',
						'',
						'',
						'pending',
					),
					array(
						'3. Documented citation',
						'[Public client label]',
						'[Measurement period]',
						'',
						'',
						'pending',
					),
				),
			),
			'learn'      => array(
				'heading'                  => 'What have we learned about AI discoverability?',
				'lead'                     => 'Short videos from our team on what we’re testing and measuring across ChatGPT, Gemini, Perplexity and Google AI.',
				'videos'                   => $videos,
				'note'                     => '[Titles are cut off in the screenshots. Paste the full titles, and use the original YouTube thumbnails for the build.]',
			),
			'form'       => array(
				'heading'     => 'Book your Discovery Session',
				'lead'        => 'A free 30-minute call. Before we meet, our team researches how buyers find your brand. On the call, you get:',
				'checklist'   => array(
					'Where buyers find you on YouTube, and where competitors win instead',
					'The videos you already have that aren\'t working for you',
					'Your top 3 moves, prepared for your brand and yours to keep',
				),
				'meta'        => '30 minutes · Prepared in advance · For established brands.',
				'use_booking' => true,
			),
			'faq'        => array(
				array( 'Which AI platforms do you look at?', 'ChatGPT, Gemini, Perplexity, Google AI Overviews and Google AI Mode.' ),
				array( 'How is AI Discovery different from traditional SEO?', 'SEO focuses on ranking pages in search results. AI Discovery focuses on whether AI answers mention and cite your brand. The two overlap, since AI tools draw on search results and trusted pages, but they’re measured differently.' ),
				array( 'Do we need YouTube to improve AI visibility?', 'Not always. Some AI surfaces cite video often, while others lean on reviews and articles. We look at which sources AI uses in your category before recommending video.' ),
				array( 'Who is AI Discovery for?', 'Established brands that compete for high-value buyer questions and want to know how AI represents them against competitors.' ),
				array( 'How long does it take to see results?', '[Typical timeframe, to confirm]. Because AI answers vary from run to run, we only report a change when it beats the normal variation we measured at the start.' ),
			),
			'close'      => 'See where buyers find<br>your brand, and where<br>competitors win instead.',
		),
		'youtube-discovery'  => array(
			'hero_layout'     => 'centered',
			'hero_breadcrumb' => true,
			'eyebrow'         => 'YouTube Discovery',
			'title'       => '<span class="tr-service-hero__title-line">Is your video library</span><span class="tr-service-hero__title-line">being <em class="tr-em">found?</em></span>',
			'lead'        => 'Buyers discover products through demos, reviews and expertise, and AI answers draw on those videos too. We audit the library you already have, reoptimize it for buyer intent, and build what is missing so it keeps attracting customers after you publish.',
			'secondary'   => 'How we measure',
			'panel'       => array(
				'class' => 'tr-monitor--hero-snapshot',
				'label' => 'Library snapshot',
				'badge' => 'Illustrative example',
				'note'  => 'Buyer-intent searches on the videos you already have',
				'heads' => array( 'Buyer search', 'Your video', 'Competitor video', 'In AI answers' ),
				'rows'  => array(
					array( '“Best [product] for [use case]”', 'Page 2', 'Top result', 'Competitor cited' ),
					array( '“[Product] review”', 'Not ranking', 'Cited', 'Cited' ),
					array( '“[You] vs [competitor]”', 'Short only', 'Long review', 'None' ),
					array( '“How to choose [category]”', 'Older upload', 'Recent demo', 'Your video cited' ),
				),
			),
			'about'      => array(
				'heading' => 'What is YouTube Discovery?',
				'body'    => array(
					'YouTube Discovery turns the video library you already have into a channel that keeps attracting buyers. We audit the channel, research the questions people ask before they buy, and reoptimize titles, thumbnails, descriptions and Shorts so the right videos get found.',
					'Google and AI answers draw on YouTube as well. A video that ranks on YouTube and a video that gets cited by AI are not always the same video, so we treat both.',
				),
				'aside'   => 'Most brands don’t have a production problem. They have a discovery problem.',
				'points'  => array(
					array( 'We audit the library', 'Which videos match buyer intent, which are invisible, and which competitors own the searches that matter.' ),
					array( 'Our team reoptimizes', 'Titles, thumbnails, structure and Shorts on videos you already published, then we create what the library is missing.' ),
					array( 'We report what moved', 'Impressions, views, subscribers and whether those videos show up when AI answers the same questions.' ),
				),
			),
			'why'        => array(
				'heading' => 'Why does a video library stall?',
				'lead'    => 'Strong videos still miss the buyers searching for them. These figures come from current client reporting, each with its period. They are not a promise of the same result.',
				'stats'   => array(
					array( '+42.5%', 'YouTube Search traffic for a Pet Technology Brand.', 'Pet Technology Brand · 2025 · [Client OK pending]' ),
					array( '+57%', 'more daily Search views on 42 videos we reoptimized.', 'Water Filtration Brand · Q3 2026 · [Client OK pending]' ),
					array( '11.65%', 'search click-through rate on those reoptimized videos, against 6.94% channel-wide.', 'Water Filtration Brand · Q3 2026 · [Client OK pending]' ),
				),
			),
			'measure'    => array(
				'heading' => 'How do we measure YouTube discovery?',
				'lead'    => "Two views of the same\u{00A0}library: whether buyers can find the\u{00A0}video, and whether AI answers use\u{00A0}it.",
				'cards'   => array(
					array( 'Search visibility', 'Buyer-intent queries where your videos appear, how they rank against the videos buyers actually click, and which queries you are missing entirely.' ),
					array( 'AI citation', 'Whether those videos are the ones ChatGPT, Gemini, Perplexity or Google AI cite. A YouTube ranking and an AI citation are measured separately.' ),
				),
			),
			'include'    => array(
				'heading' => 'What does YouTube Discovery include?',
				'lead'    => 'The work follows the same four-stage Discovery Framework: understand demand, build the assets, expand where they are found, then measure and learn.',
				'items'   => array(
					array( 'Channel and library audit', 'What you already have, what buyers are searching, and where competitors are being chosen instead.' ),
					array( 'Buyer-intent research', 'The questions, comparisons and use cases that should shape titles, chapters and the videos you still need.' ),
					array( 'Titles and thumbnails', 'Click-worthy packaging that still matches the search, then tested against what actually gets watched.' ),
					array( 'Shorts', 'Short cuts of the same expertise, aimed at the queries and feeds where buyers first notice a brand.' ),
					array( 'Retention structure', 'Openings, chapters and pacing so the viewers who click stay long enough for the video to keep being recommended.' ),
					array( 'Where video meets AI', 'When AI cites video in your category, this work connects to <a href="/ai-discovery/">AI Discovery</a> and <a href="/brand-authority/">Brand Authority</a>.' ),
				),
			),
			'work'       => array(
				'heading' => 'What does the work look like?',
				'lead'    => 'Each cycle starts from a search or citation gap and ends with whether the video started getting found.',
				'note'    => 'Illustrative sequence.',
				'steps'   => array(
					array( 'light', '1. What we found', 'A buyer search your library misses', '“Best [product] for [use case]” is owned by competitor demos. Your closest video uses a different title, an older thumbnail, and never appears in the AI answers that cite video.' ),
					array( 'light', '2. What our team did', 'Rebuilt how that video gets chosen', 'Retitled and rethumbnailed the existing video, added chapters around the buyer question, cut a Short from the same footage, and aligned the description with the comparison buyers are asking.' ),
					array( 'dark', '3. What we reported', 'Whether it got found', 'Impressions, click-through, average view duration, and whether the video started appearing in AI answers that cite YouTube for that query.' ),
				),
			),
			'proof'      => array(
				'heading' => 'Documented YouTube results',
				'lead'    => 'Results from current client reporting. Client names are anonymized, and every number shows its period.',
				'layout'  => 'text',
				'cards'   => array(
					array(
						'1. YouTube growth',
						'Pet Technology Brand',
						'Aug 2023 to June 2026 · [Client OK pending]',
						'40,118',
						'YouTube subscribers, up from about 2,700. In June 2026, videos we optimized earned 48,082 views and 847 watch hours.',
						'The brand’s own product launches also contributed.',
					),
					array(
						'2. Library reoptimization',
						'Water Filtration Brand',
						'Oct 2025 to Jan 2026 · [Client OK pending]',
						'+105%',
						'organic views in our first 12 weeks, against the 12 weeks before. Google Search views rose 432% and Shorts views 392%.',
						'Reoptimizing 15 existing videos lifted their daily views from 80 to 209.',
					),
					array(
						'3. Video in AI answers',
						'Pet Technology Creator Program',
						'June 2026 · [Client OK pending]',
						'256',
						'times AI platforms cited review videos we optimized, up 40% from 183 in May.',
						'Counted by an outside AI visibility tool.',
					),
				),
			),
			'learn'      => array(
				'heading'                  => 'What have we learned about YouTube discovery?',
				'lead'                     => 'Short videos from our team on how buyers find videos, and how those videos show up in AI answers.',
				'videos'                   => $videos,
				'note'                     => '[Titles are cut off in the screenshots. Paste the full titles, and use the original YouTube thumbnails for the build.]',
			),
			'form'       => array(
				'heading'     => 'Book your Discovery Session',
				'lead'        => 'A free 30-minute call. Before we meet, our team researches how buyers find your brand. On the call, you get:',
				'checklist'   => array(
					'Where buyers find you on YouTube, and where competitors win instead',
					'The videos you already have that aren\'t working for you',
					'Your top 3 moves, prepared for your brand and yours to keep',
				),
				'meta'        => '30 minutes · Prepared in advance · For established brands.',
				'use_booking' => true,
			),
			'faq'        => array(
				array( 'Do you produce the videos?', 'We can. A lot of the gain is in videos you have already published: titles, thumbnails, structure and the queries they were never aimed at.' ),
				array( 'Is this the same as YouTube ads?', 'No. The work is on organic discovery. Paid views stop when the spend stops. A video that matches buyer intent can keep being found.' ),
				array( 'Will this make AI recommend us?', 'No one controls AI answers. If AI cites video in your category, we measure whether yours is the one being cited and improve the video and the sources around it.' ),
				array( 'Who is YouTube Discovery for?', 'Established brands with a library, or a reason to build one, whose customers watch, compare and ask before they buy.' ),
				array( 'How do you report progress?', 'Against the buyer searches we agreed at the start: impressions, views, subscribers, and whether those videos appear in AI answers.' ),
			),
			'close'      => 'Find out which buyer searches your videos are missing.',
		),
		'brand-authority'    => array(
			'hero_layout'     => 'centered',
			'hero_breadcrumb' => true,
			'eyebrow'         => 'Brand Authority',
			'title'           => '<span class="tr-service-hero__title-line">Do buyers and AI recognize</span><span class="tr-service-hero__title-line"><em class="tr-em">your brand?</em></span>',
			'lead'            => 'Discovery platforms recommend brands they can corroborate. We build the citations, reviews, Reddit presence and consistent descriptions that help buyers and AI assistants recognize yours.',
			'secondary'       => 'How we measure',
			'panel'           => array(
				'class' => 'tr-monitor--hero-snapshot',
				'label' => 'Authority snapshot',
				'badge' => 'Illustrative example',
				'note'  => 'Sources AI cites when buyers ask about your category',
				'heads' => array( 'Source type', 'You', 'Competitor', 'AI cites it' ),
				'rows'  => array(
					array( 'Review site', 'Thin', 'Featured', 'Yes' ),
					array( 'Industry publication', 'None', 'Quoted', 'Yes' ),
					array( 'Comparison page', 'Your page', 'Theirs ranks', 'Theirs' ),
					array( 'Reddit thread', 'Absent', 'Recommended', 'Sometimes' ),
				),
			),
			'about'      => array(
				'heading' => 'What is Brand Authority?',
				'body'    => array(
					'Brand Authority is the independent credibility around your site: mentions on trusted sites, reviews, community presence, and the same description of your brand everywhere a buyer or an AI answer might look.',
					'It sits next to AI Discovery and YouTube Discovery because those answers are only as strong as the sources they can cite.',
				),
				'aside'   => 'If AI cannot find a consistent story, it will tell someone else’s.',
				'points'  => array(
					array( 'We map the sources', 'Which sites, reviews and videos AI and buyers already trust in your category, and where you are missing.' ),
					array( 'Our team builds the footprint', 'Citations, accurate descriptions, and the third-party mentions those answers draw on.' ),
					array( 'We report the footprint', 'Where you are cited, where a competitor is cited instead, and which gaps we closed.' ),
				),
			),
			'why'        => array(
				'heading' => 'Why authority decides the shortlist',
				'lead'    => 'Buyers research, compare and ask before they purchase. These are the surfaces we work across. They are not performance claims.',
				'stats'   => array(
					array( 'Since 2007', 'Our founders have studied how customers find brands since the early days of YouTube.', 'How we got here' ),
					array( '3', 'Surfaces that now shape the shortlist: YouTube, Google (including AI Overviews and AI Mode), and AI assistants.', 'Where buyers look' ),
					array( '1 story', 'The same description of your brand, products and claims, on your site and on the sources that cite you.', 'What we align' ),
				),
			),
			'measure'    => array(
				'heading' => 'How do we measure brand authority?',
				'lead'    => 'Two questions, tracked the same way each cycle: who is being cited, and whether the story those sources tell is yours.',
				'cards'   => array(
					array( 'Citation footprint', 'The third-party sources that appear when buyers ask about your category, and whether your brand or a competitor is the one they name.' ),
					array( 'Description consistency', 'Whether your name, products and claims are described the same way on your site, on YouTube, and on the pages AI assistants cite.' ),
				),
			),
			'include'    => array(
				'heading' => 'What does Brand Authority include?',
				'lead'    => 'The work follows the Discovery Framework and is aimed at the sources measurement shows buyers and AI already rely on.',
				'items'   => array(
					array( 'Source gap analysis', 'The review sites, publications, comparisons and communities AI cites in your category, and where you are absent.' ),
					array( 'Citations and mentions', 'Accurate mentions on the trusted sites those answers already use.' ),
					array( 'Reviews and community', 'A presence where buyers compare notes, so the public record matches the product.' ),
					array( 'Consistent descriptions', 'One description of the brand, products and claims, repeated on the pages and videos people cite.' ),
					array( 'Pages worth citing', 'Comparison and answer pages on your site that a model can quote without guessing.' ),
					array( 'Tied to the other two', 'Authority work feeds <a href="/ai-discovery/">AI Discovery</a> and <a href="/youtube-discovery/">YouTube Discovery</a>, because those answers cite someone.' ),
				),
			),
			'work'       => array(
				'heading' => 'What does the work look like?',
				'lead'    => 'Each cycle starts from a source that mentions a competitor and not you, and ends with whether that changed.',
				'note'    => 'Illustrative sequence.',
				'steps'   => array(
					array( 'light', '1. What we found', 'A source AI keeps citing', 'For “[best product for use case]”, answers cite a review site and a competitor page. Your brand is missing, and the descriptions of you that do exist disagree with each other.' ),
					array( 'light', '2. What our team did', 'Closed the gap in the record', 'Aligned the on-site description, pursued a mention on the most-cited third-party source, and corrected the outdated claims those pages were repeating.' ),
					array( 'dark', '3. What we reported', 'Whether the record moved', 'Which sources now name you, whether AI answers picked them up, and which descriptions are still inconsistent.' ),
				),
			),
			'proof'      => array(
				'heading' => 'Documented authority signals',
				'lead'    => 'Results from current client reporting. Client names are anonymized, and every number shows its period.',
				'layout'  => 'text',
				'cards'   => array(
					array(
						'1. Search authority',
						'Pet Technology Brand',
						'Aug 2023 to Jan 2026 · [Client OK pending]',
						'450,635',
						'views from Google Search since our team began in August 2023, about 23 times the 19,640 the channel earned in all prior years.',
						'Data through January 2026.',
					),
					array(
						'2. Authority signal',
						'[Public client label]',
						'[Measurement period]',
						'',
						'',
						'pending',
					),
					array(
						'3. Authority signal',
						'[Public client label]',
						'[Measurement period]',
						'',
						'',
						'pending',
					),
				),
			),
			'learn'      => array(
				'heading'                  => 'What have we learned about brand authority?',
				'lead'                     => 'Short videos on how AI systems decide which brands and sources to trust.',
				'videos'                   => $videos,
			),
			'form'       => array(
				'heading'     => 'Book your Discovery Session',
				'lead'        => 'A free 30-minute call. Before we meet, our team researches how buyers find your brand. On the call, you get:',
				'checklist'   => array(
					'Where buyers find you on YouTube, and where competitors win instead',
					'The videos you already have that aren\'t working for you',
					'Your top 3 moves, prepared for your brand and yours to keep',
				),
				'meta'        => '30 minutes · Prepared in advance · For established brands.',
				'use_booking' => true,
			),
			'faq'        => array(
				array( 'Is this link building?', 'It is closer to a citation program than a link campaign. The target is the sources buyers and AI already use, and the description of you on those sources.' ),
				array( 'Can you guarantee a mention in ChatGPT?', 'No. We don’t control the answer. We change the sources the answer can draw on, then measure whether the mention showed up.' ),
				array( 'Do we need reviews?', 'If buyers in your category rely on reviews, yes. We look at which sources are actually cited before we recommend where to spend the effort.' ),
				array( 'Who is Brand Authority for?', 'Established companies whose customers compare options and need a reason to trust one brand over another.' ),
				array( 'How does this relate to YouTube?', 'Video is one of the sources AI cites. Authority work covers the rest of the public record: Reddit, reviews, articles, comparisons and consistent claims.' ),
			),
			'close'      => 'Make sure buyers and AI<br>recognize your brand.',
		),
	);
}

/**
 * Open a full-bleed group block.
 *
 * @param string $class CSS class.
 * @param string $bg    Background color.
 * @param string $text  Text color.
 * @param string $id    Optional anchor.
 */
function turborank_service_open( $class, $bg, $text, $id = '' ) {
	list( $bg, $text ) = turborank_normalize_section_surface( $bg, $text );
	$anchor = $id ? ',"anchor":"' . $id . '"' : '';
	$idattr = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	echo '<!-- wp:group {"align":"full","className":"' . esc_attr( $class ) . '"' . $anchor . ',"style":{"spacing":{"padding":{"top":"72px","bottom":"72px","left":"32px","right":"32px"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"' . esc_attr( $bg ) . '","text":"' . esc_attr( $text ) . '"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->' . "\n";
	echo '<div class="wp-block-group alignfull ' . esc_attr( $class ) . ' has-text-color has-background"' . $idattr . ' style="color:' . esc_attr( $text ) . ';background-color:' . esc_attr( $bg ) . ';margin-top:0;margin-bottom:0;padding-top:72px;padding-right:32px;padding-bottom:72px;padding-left:32px">' . "\n";
}

/**
 * Close a group block.
 */
function turborank_service_close() {
	echo "</div>\n<!-- /wp:group -->\n";
}

/**
 * Heading block. $html may include trusted inline tags from this file.
 *
 * @param int    $level Heading level.
 * @param string $html  Heading HTML.
 */
function turborank_service_heading( $level, $html ) {
	$level = (int) $level;
	echo '<!-- wp:heading {"level":' . $level . '} -->' . "\n";
	echo '<h' . $level . ' class="wp-block-heading">' . $html . '</h' . $level . ">\n";
	echo "<!-- /wp:heading -->\n";
}

/**
 * HTML block.
 *
 * @param string $html Trusted markup.
 */
function turborank_service_html( $html ) {
	echo "<!-- wp:html -->\n" . $html . "\n<!-- /wp:html -->\n";
}

/**
 * Buyer prompt monitor / library panel in the service hero.
 *
 * @param array<string, mixed> $panel Panel config from turborank_service_definitions().
 */
function turborank_render_service_monitor_panel( $panel ) {
	$monitor_class = 'tr-monitor';
	if ( ! empty( $panel['class'] ) ) {
		$monitor_class .= ' ' . $panel['class'];
	}
	?>
	<div class="<?php echo esc_attr( $monitor_class ); ?>" aria-label="<?php echo esc_attr( $panel['label'] ); ?>">
		<div class="tr-monitor__head">
			<p><?php echo esc_html( $panel['label'] ); ?></p>
			<span class="tr-monitor__badge"><?php echo esc_html( $panel['badge'] ); ?></span>
		</div>
		<table>
			<thead>
				<tr>
					<?php foreach ( $panel['heads'] as $head ) : ?>
						<th><?php echo esc_html( $head ); ?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $panel['rows'] as $row ) : ?>
					<tr>
						<?php foreach ( $row as $index => $cell ) : ?>
							<?php
							$class = '';
							if ( $index > 0 && ( false !== stripos( $cell, 'cited' ) || 'Yes' === $cell ) ) {
								$class = 'is-cited';
							} elseif ( $index > 0 && ( 'None' === $cell || 'Absent' === $cell || 'Thin' === $cell || 'Not ranking' === $cell ) ) {
								$class = 'is-none';
							}
							?>
							<td<?php echo $class ? ' class="' . esc_attr( $class ) . '"' : ''; ?>><?php echo esc_html( $cell ); ?></td>
						<?php endforeach; ?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<p class="tr-monitor__note"><?php echo esc_html( $panel['note'] ); ?></p>
	</div>
	<?php
}

/**
 * Primary + secondary CTAs and contact line for service heroes.
 *
 * @param array<string, string> $p Service page definition row.
 */
function turborank_render_service_hero_actions( $p ) {
	?>
	<div class="tr-hero-cta-row">
		<div class="wp-block-buttons tr-btn-row is-layout-flex wp-block-buttons-is-layout-flex">
			<div class="wp-block-button tr-btn-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( turborank_discovery_session_url() ); ?>">Book a Discovery Session</a></div>
			<div class="wp-block-button tr-btn-ghost"><a class="wp-block-button__link wp-element-button" href="#measure"><?php echo esc_html( $p['secondary'] ); ?></a></div>
		</div>
	</div>
	<?php
	echo turborank_contact_line( array( 'class' => 'tr-hotline tr-hero-contact-line tr-service-hero__contact' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Service hero intro paragraph, optionally with a status badge (e.g. Updated).
 *
 * @param array<string, mixed> $p Service page definition row.
 */
function turborank_render_service_hero_lead( $p ) {
	if ( empty( $p['lead'] ) ) {
		return;
	}
	?>
	<p class="tr-lead">
		<?php echo esc_html( $p['lead'] ); ?>
		<?php if ( ! empty( $p['lead_badge'] ) ) : ?>
			<span class="tr-lead-badge"><?php echo esc_html( $p['lead_badge'] ); ?></span>
		<?php endif; ?>
	</p>
	<?php
}

/**
 * Render one service page pattern.
 *
 * @param string $slug Page slug.
 */
function turborank_render_service_page( $slug ) {
	$pages = turborank_service_definitions();
	if ( ! isset( $pages[ $slug ] ) ) {
		return;
	}
	$p = $pages[ $slug ];

	$hero_class = 'tr-service tr-service-hero';
	if ( ! empty( $p['hero_layout'] ) && 'centered' === $p['hero_layout'] ) {
		$hero_class .= ' tr-service-hero--centered';
	}

	turborank_service_open( $hero_class, '#121317', '#ffffff' );
	ob_start();

	$title_allowed = array(
		'br'   => array(),
		'em'   => array( 'class' => array() ),
		'span' => array( 'class' => array() ),
	);

	if ( ! empty( $p['hero_layout'] ) && 'centered' === $p['hero_layout'] ) {
		if ( ! empty( $p['hero_breadcrumb'] ) ) {
			?>
		<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><?php echo esc_html( $p['eyebrow'] ); ?></span></p>
			<?php
		}
		?>
		<h1 class="tr-eyebrow"><?php echo esc_html( $p['eyebrow'] ); ?></h1>
		<div class="tr-service-hero__stack">
			<h2><?php echo wp_kses( $p['title'], $title_allowed ); ?></h2>
			<?php turborank_render_service_hero_lead( $p ); ?>
			<?php turborank_render_service_monitor_panel( $p['panel'] ); ?>
			<?php turborank_render_service_hero_actions( $p ); ?>
		</div>
		<?php
	} else {
		?>
		<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><?php echo esc_html( $p['eyebrow'] ); ?></span></p>
		<h1 class="tr-eyebrow"><?php echo esc_html( $p['eyebrow'] ); ?></h1>
		<div class="tr-split">
			<div>
				<h2><?php echo wp_kses( $p['title'], $title_allowed ); ?></h2>
				<?php turborank_render_service_hero_lead( $p ); ?>
				<?php turborank_render_service_hero_actions( $p ); ?>
			</div>
			<?php turborank_render_service_monitor_panel( $p['panel'] ); ?>
		</div>
		<?php
	}

	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-service-about', '#F9F9F7', '#121418' );
	ob_start();
	?>
	<div class="tr-split tr-split--about">
		<div class="tr-prose">
			<h2><?php echo esc_html( $p['about']['heading'] ); ?></h2>
			<?php foreach ( $p['about']['body'] as $para ) : ?>
				<p><?php echo esc_html( $para ); ?></p>
			<?php endforeach; ?>
		</div>
		<aside class="tr-aside">
			<hr class="tr-aside__rule" aria-hidden="true" />
			<h3><?php echo wp_kses( $p['about']['aside'], array( 'br' => array( 'class' => array(), 'aria-hidden' => array() ) ) ); ?></h3>
			<?php foreach ( $p['about']['points'] as $point ) : ?>
				<div class="tr-aside-item">
					<strong><?php echo esc_html( $point[0] ); ?></strong>
					<p><?php echo esc_html( $point[1] ); ?></p>
				</div>
			<?php endforeach; ?>
		</aside>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-ai-why-section', '#121212', '#ffffff' );
	ob_start();
	?>
	<div class="tr-ai-why-inner">
		<?php if ( 'youtube-discovery' === $slug ) : ?>
		<div class="tr-ai-why-heading-row">
			<h2><?php echo wp_kses( $p['why']['heading'], array( 'span' => array( 'class' => array() ), 'br' => array() ) ); ?></h2>
			<span class="tr-kat-claim-badge"><?php esc_html_e( 'Kat claim', 'turborank' ); ?></span>
		</div>
		<?php else : ?>
		<h2><?php echo wp_kses( $p['why']['heading'], array( 'span' => array( 'class' => array() ), 'br' => array() ) ); ?></h2>
		<?php endif; ?>
		<p class="tr-ai-why-lead"><?php echo esc_html( $p['why']['lead'] ); ?></p>
		<div class="tr-stats tr-ai-why-stats">
			<?php foreach ( $p['why']['stats'] as $stat ) : ?>
				<div class="tr-stat">
					<p class="tr-stat__num"><?php echo esc_html( $stat[0] ); ?></p>
					<p><?php echo esc_html( $stat[1] ); ?></p>
					<span class="tr-source"><?php echo esc_html( $stat[2] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-service-measure', '#FAFAF6', '#121418', 'measure' );
	ob_start();
	?>
	<div class="tr-measure-inner">
		<h2><?php echo esc_html( $p['measure']['heading'] ); ?></h2>
		<p class="tr-measure-lead"><?php echo esc_html( $p['measure']['lead'] ); ?></p>
		<div class="tr-measure">
			<?php foreach ( $p['measure']['cards'] as $card ) : ?>
				<article>
					<h3><?php echo esc_html( $card[0] ); ?></h3>
					<p><?php echo esc_html( $card[1] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-service-include', '#EFEDE8', '#121418' );
	ob_start();
	?>
	<div class="tr-include-inner">
		<h2><?php echo esc_html( $p['include']['heading'] ); ?></h2>
		<p class="tr-include-lead"><?php echo esc_html( $p['include']['lead'] ); ?></p>
		<div class="tr-include">
			<?php foreach ( $p['include']['items'] as $item ) : ?>
				<article>
					<h3><?php echo esc_html( $item[0] ); ?></h3>
					<p><?php echo wp_kses_post( $item[1] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-service-work', '#ffffff', '#121418' );
	ob_start();
	?>
	<div class="tr-work-inner">
		<h2><?php echo esc_html( $p['work']['heading'] ); ?></h2>
		<p class="tr-work-lead"><?php echo esc_html( $p['work']['lead'] ); ?></p>
		<div class="tr-steps">
			<?php foreach ( $p['work']['steps'] as $step ) : ?>
				<article class="tr-step-card is-<?php echo esc_attr( $step[0] ); ?>">
					<span class="tr-kicker"><?php echo esc_html( $step[1] ); ?></span>
					<h3><?php echo esc_html( $step[2] ); ?></h3>
					<p><?php echo esc_html( $step[3] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		<p class="tr-note"><?php echo esc_html( $p['work']['note'] ); ?></p>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-service-proof', '#121317', '#ffffff' );
	ob_start();
	?>
	<div class="tr-proof-inner">
		<?php if ( in_array( $slug, array( 'ai-discovery', 'youtube-discovery', 'brand-authority' ), true ) ) : ?>
		<div class="tr-proof-heading-row">
			<h2><?php echo esc_html( $p['proof']['heading'] ); ?></h2>
			<span class="tr-kat-claim-badge"><?php esc_html_e( 'Kat claim', 'turborank' ); ?></span>
		</div>
		<?php else : ?>
		<h2><?php echo esc_html( $p['proof']['heading'] ); ?></h2>
		<?php endif; ?>
		<p class="tr-proof-lead"><?php echo esc_html( $p['proof']['lead'] ); ?></p>
		<div class="tr-proofs<?php echo ! empty( $p['proof']['layout'] ) && 'text' === $p['proof']['layout'] ? ' tr-proofs--text' : ''; ?>">
			<?php
			$proof_layout = ! empty( $p['proof']['layout'] ) ? $p['proof']['layout'] : 'screenshot';
			foreach ( $p['proof']['cards'] as $proof_index => $card ) :
				$card_class = 'tr-proof-card';
				if ( 'text' === $proof_layout ) {
					$card_class .= ' tr-proof-card--text';
				}
				?>
				<article class="<?php echo esc_attr( $card_class ); ?>">
					<?php if ( 'text' === $proof_layout ) : ?>
						<?php
						$proof_footnote = isset( $card[5] ) ? (string) $card[5] : '';
						$proof_pending  = ( 'pending' === $proof_footnote );
						?>
						<?php if ( ! empty( $card[0] ) ) : ?>
							<p class="tr-proof-card__kicker"><?php echo esc_html( $card[0] ); ?></p>
						<?php endif; ?>
						<h3><?php echo esc_html( $card[1] ); ?></h3>
						<?php if ( ! empty( $card[2] ) ) : ?>
							<p class="tr-proof-card__period"><?php echo esc_html( $card[2] ); ?></p>
						<?php endif; ?>
						<?php if ( $proof_pending ) : ?>
							<div class="tr-proof-card__pending" aria-label="Result pending approval"><?php esc_html_e( '[Result pending approval]', 'turborank' ); ?></div>
						<?php else : ?>
							<?php if ( ! empty( $card[3] ) ) : ?>
								<p class="tr-proof-card__metric"><?php echo esc_html( $card[3] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $card[4] ) ) : ?>
								<p class="tr-proof-card__detail"><?php echo esc_html( $card[4] ); ?></p>
							<?php endif; ?>
							<?php if ( $proof_footnote ) : ?>
								<p class="tr-proof-card__footnote"><?php echo esc_html( $proof_footnote ); ?></p>
							<?php endif; ?>
						<?php endif; ?>
					<?php else : ?>
						<div class="tr-proof-card__shot">
							<?php turborank_render_proof_shot( $proof_index, $card[0] ); ?>
						</div>
						<h3><?php echo esc_html( $card[1] ); ?></h3>
						<div class="tr-proof-card__meta">
							<p><?php echo esc_html( $card[2] ); ?></p>
							<p><?php echo esc_html( $card[3] ); ?></p>
							<p><?php echo esc_html( $card[4] ); ?></p>
						</div>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-service tr-service-learn', '#ffffff', '#121418' );
	ob_start();
	?>
	<div class="tr-learn-inner">
		<div class="tr-learn-intro">
			<h2><?php echo esc_html( $p['learn']['heading'] ); ?></h2>
			<div class="tr-learn-intro__row">
				<p class="tr-learn-lead"><?php echo esc_html( $p['learn']['lead'] ); ?></p>
				<a class="tr-learn-channel" href="https://www.youtube.com/@turborank-co/shorts" target="_blank" rel="noopener noreferrer">See all videos on YouTube</a>
			</div>
		</div>
		<div class="tr-videos">
			<?php
			foreach ( $p['learn']['videos'] as $video ) :
				turborank_render_service_video_card( $video );
			endforeach;
			?>
		</div>
		<?php if ( ! empty( $p['learn']['note'] ) ) : ?>
			<p class="tr-learn-note"><?php echo esc_html( $p['learn']['note'] ); ?></p>
		<?php endif; ?>
		<?php turborank_render_service_video_modal(); ?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	$status = isset( $_GET['assessment'] ) ? sanitize_key( wp_unslash( $_GET['assessment'] ) ) : '';

	turborank_service_open( 'tr-service tr-service-assessment', '#FAFAF6', '#121418', 'assessment' );
	ob_start();
	?>
	<div class="tr-assessment-inner">
		<div class="tr-assessment-bottom">
			<div class="tr-form-card">
				<h2><?php echo esc_html( $p['form']['heading'] ); ?></h2>
				<p class="tr-form-lead"><?php echo esc_html( $p['form']['lead'] ); ?></p>
				<?php if ( ! empty( $p['form']['use_booking'] ) ) : ?>
					<?php if ( ! empty( $p['form']['checklist'] ) ) : ?>
					<ul class="tr-assessment-checklist">
						<?php foreach ( $p['form']['checklist'] as $item ) : ?>
							<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php echo esc_html( $item ); ?></span></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
					<div class="tr-hero-cta-row tr-assessment-booking">
						<div class="wp-block-buttons tr-btn-row is-layout-flex wp-block-buttons-is-layout-flex">
							<div class="wp-block-button tr-btn-primary">
								<a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( turborank_discovery_session_url() ); ?>">Book a Discovery Session</a>
							</div>
						</div>
					</div>
					<?php if ( ! empty( $p['form']['meta'] ) ) : ?>
					<p class="tr-form-help tr-form-help--booking">
						<?php echo esc_html( $p['form']['meta'] ); ?>
						Or call <a href="tel:5105215100">(510) 521-5100</a> or email <a href="mailto:hello@turborank.co">hello@turborank.co</a>
					</p>
					<?php else : ?>
					<?php echo turborank_contact_line( array( 'mode' => 'or', 'class' => 'tr-form-help tr-hotline' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					<?php endif; ?>
				<?php else : ?>
				<?php if ( 'sent' === $status ) : ?>
					<p class="tr-form-status">Thanks. We reply within one business day.</p>
				<?php elseif ( 'error' === $status ) : ?>
					<p class="tr-form-status is-error">We couldn’t send that just now. Email <a href="mailto:hello@turborank.co">hello@turborank.co</a> and we’ll take it from there.</p>
				<?php endif; ?>
				<form class="tr-assessment-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<input type="hidden" name="action" value="turborank_assessment">
					<input type="hidden" name="tr_service" value="<?php echo esc_attr( $slug ); ?>">
					<?php wp_nonce_field( 'turborank_assessment', 'turborank_assessment_nonce' ); ?>
					<p class="tr-hp"><label>Company fax<input type="text" name="tr_fax" tabindex="-1" autocomplete="off"></label></p>
					<label for="tr-name-<?php echo esc_attr( $slug ); ?>">Name</label>
					<input id="tr-name-<?php echo esc_attr( $slug ); ?>" name="tr_name" type="text" required placeholder="Your full name" autocomplete="name">
					<label for="tr-email-<?php echo esc_attr( $slug ); ?>">Work email</label>
					<input id="tr-email-<?php echo esc_attr( $slug ); ?>" name="tr_email" type="email" required placeholder="you@company.com" autocomplete="email">
					<label for="tr-site-<?php echo esc_attr( $slug ); ?>">Company website</label>
					<input id="tr-site-<?php echo esc_attr( $slug ); ?>" name="tr_site" type="url" required placeholder="https://" autocomplete="url">
					<label for="tr-challenge-<?php echo esc_attr( $slug ); ?>">Biggest visibility challenge</label>
					<textarea id="tr-challenge-<?php echo esc_attr( $slug ); ?>" name="tr_challenge" required placeholder="What are buyers asking that you’re not showing up for?"></textarea>
					<button type="submit">Request my assessment</button>
					<p class="tr-form-help">We reply within one business day. Prefer to talk? Call<br><a class="tr-form-help__phone" href="tel:5105215100">(510) 521-5100</a></p>
				</form>
				<?php endif; ?>
			</div>
			<div class="tr-assessment-faq">
				<h2>Frequently asked questions</h2>
				<div class="tr-faq-list">
					<?php foreach ( $p['faq'] as $faq ) : ?>
						<article>
							<h3><?php echo esc_html( $faq[0] ); ?></h3>
							<p><?php echo esc_html( $faq[1] ); ?></p>
						</article>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-service tr-service-close',
			'heading'       => $p['close'],
			'button_href'   => turborank_discovery_session_url(),
		)
	);
}

/**
 * Handle the assessment form.
 */
function turborank_handle_assessment() {
	if ( ! isset( $_POST['turborank_assessment_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['turborank_assessment_nonce'] ) ), 'turborank_assessment' ) ) {
		wp_die( esc_html__( 'The form expired. Please go back and try again.', 'turborank' ) );
	}

	$service = isset( $_POST['tr_service'] ) ? sanitize_title( wp_unslash( $_POST['tr_service'] ) ) : 'ai-discovery';
	$allowed = array( 'ai-discovery', 'youtube-discovery', 'brand-authority' );
	if ( ! in_array( $service, $allowed, true ) ) {
		$service = 'ai-discovery';
	}

	$redirect = home_url( '/' . $service . '/' );

	if ( ! empty( $_POST['tr_fax'] ) ) {
		wp_safe_redirect( add_query_arg( 'assessment', 'sent', $redirect ) . '#assessment' );
		exit;
	}

	$name      = isset( $_POST['tr_name'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_name'] ) ) : '';
	$email     = isset( $_POST['tr_email'] ) ? sanitize_email( wp_unslash( $_POST['tr_email'] ) ) : '';
	$site      = isset( $_POST['tr_site'] ) ? esc_url_raw( wp_unslash( $_POST['tr_site'] ) ) : '';
	$challenge = isset( $_POST['tr_challenge'] ) ? sanitize_textarea_field( wp_unslash( $_POST['tr_challenge'] ) ) : '';

	if ( '' === $name || ! is_email( $email ) || '' === $site || '' === $challenge ) {
		wp_safe_redirect( add_query_arg( 'assessment', 'error', $redirect ) . '#assessment' );
		exit;
	}

	$body = "Service: {$service}\nName: {$name}\nEmail: {$email}\nWebsite: {$site}\n\n{$challenge}\n";
	$sent = wp_mail(
		'hello@turborank.co',
		'Discovery Assessment request — ' . $name,
		$body,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect( add_query_arg( 'assessment', $sent ? 'sent' : 'error', $redirect ) . '#assessment' );
	exit;
}
add_action( 'admin_post_nopriv_turborank_assessment', 'turborank_handle_assessment' );
add_action( 'admin_post_turborank_assessment', 'turborank_handle_assessment' );
