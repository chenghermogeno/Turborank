<?php
/**
 * Insights author profile page (Matthew Pearce).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render Matthew Pearce author page.
 */
function turborank_render_author_page() {
	$articles = turborank_insights_articles();
	$recent   = array_slice( array_values( $articles ), 0, 6 );
	$uri      = get_template_directory_uri() . '/assets/images/team/matthew-pearce.png';

	turborank_service_open( 'tr-insights tr-author-profile-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><a href="/insights/">Insights</a> &nbsp;/&nbsp; Matthew Pearce</span></p>
	<div class="tr-author-hero">
		<img class="tr-author-hero__photo" src="<?php echo esc_url( $uri ); ?>" alt="Matthew Pearce" width="220" height="220">
		<div class="tr-author-hero__intro">
			<h1 class="tr-eyebrow">Author</h1>
			<h2>Matthew Pearce</h2>
			<p class="tr-author-role">Co-founder, TurboRank</p>
			<p class="tr-lead">Matthew has helped brands grow on YouTube since 2007. He writes about YouTube search, AI discoverability and brand authority, drawing on hundreds of channel launches and TurboRank’s ongoing testing across YouTube, Google and AI&nbsp;answers.</p>
			<p class="tr-author-links">
				<a href="https://www.linkedin.com/search/results/all/?keywords=Matthew%20Pearce%20TurboRank" target="_blank" rel="noreferrer">LinkedIn</a>
				<span class="tr-author-links__sep" aria-hidden="true">·</span>
				<a href="https://www.youtube.com/results?search_query=TurboRank" target="_blank" rel="noreferrer">YouTube</a>
				<span class="tr-author-links__sep" aria-hidden="true">·</span>
				<span class="tr-placeholder">[Other profile]</span>
			</p>
		</div>
		<div class="tr-glance tr-author-glance">
			<p class="tr-glance__title">At a glance</p>
			<div class="tr-glance__row"><dt>Working on YouTube since</dt><dd>2007</dd></div>
			<div class="tr-glance__row"><dt>YouTube channels launched</dt><dd>Hundreds</dd></div>
			<div class="tr-glance__row"><dt>Articles on Insights</dt><dd>[Number]</dd></div>
			<div class="tr-glance__row tr-glance__row--stack"><dt>Hosts</dt><dd>A weekly YouTube series on trends for&nbsp;marketers</dd></div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-author-about-band', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-author-about">
		<div class="tr-author-about__copy">
			<h2>About Matthew</h2>
			<p>Matthew has been helping brands grow on YouTube since nearly the beginning. He was first hired to create a viral video in 2007, and since then he’s launched hundreds of YouTube channels and driven millions in sales directly tied to the platform.</p>
			<p>He specializes in content development and strategic channel growth. As buyers began asking AI assistants for recommendations, he extended that work to how brands are discovered across Google and AI answers, which is now the focus of TurboRank’s research and&nbsp;testing.</p>
			<p>Matthew co-founded TurboRank with Mary Ann Bautista and leads a weekly YouTube series breaking down the latest platform trends and what they mean for&nbsp;marketers.</p>
			<p class="tr-fine">[Add credentials, speaking, press or notable clients Matthew is comfortable listing.]</p>
		</div>
		<div class="tr-author-about__sidebar">
			<p class="tr-author-label">Writes about</p>
			<div class="tr-author-tags">
				<span>YouTube SEO</span>
				<span>AI Visibility</span>
				<span>Brand Authority</span>
				<span>Growth Strategy</span>
				<span>Case Studies</span>
			</div>
			<div class="tr-author-note">
				<p class="tr-author-note__title">How we write</p>
				<p>Every TurboRank article is written or reviewed by a specialist and based on our own client work and testing. We link to sources for any outside data, and we update articles when platforms change. Each article shows when it was last&nbsp;updated.</p>
				<p class="tr-fine">[Confirm this matches your editorial process.]</p>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-author-articles', turborank_section_mist_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-author-articles-head">
		<h2>Articles by Matthew</h2>
		<a class="tr-insights-link" href="/insights/">See all articles</a>
	</div>
	<div class="tr-insights-grid tr-insights-grid--author">
		<?php
		foreach ( $recent as $article ) {
			echo turborank_insight_card( $article, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-author-videos', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-author-videos-head">
		<div>
			<h2>Videos with Matthew</h2>
			<p class="tr-lead">Short breakdowns of what’s changing on YouTube and in AI search, and what it means for marketers.</p>
		</div>
		<a class="tr-insights-link" href="https://www.youtube.com/channel/UCE1EQUksmaJT_YHwIeMZn4Q" target="_blank" rel="noreferrer">Watch on YouTube</a>
	</div>
	<div class="tr-insights-video__thumbs tr-insights-video__thumbs--author">
		<?php
		foreach ( turborank_service_videos() as $video ) :
			$thumb = turborank_service_video_thumb_url( $video );
			if ( ! $thumb ) {
				continue;
			}
			$label = ! empty( $video['full_title'] ) ? $video['full_title'] : $video['title'];
			?>
			<div class="tr-insights-video__thumb tr-insights-video__thumb--static">
				<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $label ); ?>" width="480" height="720" loading="lazy" decoding="async">
			</div>
		<?php endforeach; ?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-insights tr-author-close tr-insights-close tr-service tr-service-close',
			'theme'         => 'light',
			'bg'            => turborank_section_warm_color(),
			'heading'       => '<span class="tr-author-close-h2__line">Want Matthew’s team to look</span><span class="tr-author-close-h2__line">at your brand?</span>',
			'lead'          => 'A free Discovery Session shows where buyers find you on YouTube today, and your top 3 moves.',
			'button_href'   => turborank_discovery_session_url(),
		)
	);
}

/**
 * Render Mary Ann Bautista author page (same layout as Matthew’s profile).
 */
function turborank_render_author_mary_ann_page() {
	$articles = turborank_insights_articles();
	$recent   = array_slice( array_values( $articles ), 0, 6 );
	$uri      = get_template_directory_uri() . '/assets/images/team/mary-ann-bautista.png';

	turborank_service_open( 'tr-insights tr-author-profile-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><a href="/insights/">Insights</a> &nbsp;/&nbsp; Mary Ann Bautista</span></p>
	<div class="tr-author-hero">
		<img class="tr-author-hero__photo" src="<?php echo esc_url( $uri ); ?>" alt="Mary Ann Bautista" width="220" height="220">
		<div class="tr-author-hero__intro">
			<h1 class="tr-eyebrow">Author</h1>
			<h2>Mary Ann Bautista</h2>
			<p class="tr-author-role">Co-founder, TurboRank</p>
			<p class="tr-lead">Direct response marketer turned organic-discovery strategist. Mary Ann helps established brands earn attention in search, video and AI answers—with systems that compound, not one-off&nbsp;campaigns.</p>
			<p class="tr-author-links">
				<a href="https://www.linkedin.com/search/results/all/?keywords=Mary%20Ann%20Bautista%20TurboRank" target="_blank" rel="noreferrer">LinkedIn</a>
				<span class="tr-author-links__sep" aria-hidden="true">·</span>
				<a href="https://www.youtube.com/results?search_query=TurboRank" target="_blank" rel="noreferrer">YouTube</a>
				<span class="tr-author-links__sep" aria-hidden="true">·</span>
				<span class="tr-placeholder">[Other profile]</span>
			</p>
		</div>
		<div class="tr-glance tr-author-glance">
			<p class="tr-glance__title">At a glance</p>
			<div class="tr-glance__row"><dt>Years in direct response</dt><dd>30+</dd></div>
			<div class="tr-glance__row"><dt>National brand campaigns</dt><dd>HOP, Pimsleur</dd></div>
			<div class="tr-glance__row"><dt>Focus at TurboRank</dt><dd>YouTube &amp; AI</dd></div>
			<div class="tr-glance__row tr-glance__row--stack"><dt>Co-founder with</dt><dd>Matthew&nbsp;Pearce</dd></div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-author-about-band', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-author-about">
		<div class="tr-author-about__copy">
			<h2>About Mary Ann</h2>
			<p>Mary Ann is a direct response marketing pioneer and co-founder of TurboRank. With more than 30 years of experience, she has led campaigns for some of the best-known consumer brands in America—and today she brings that same results mindset to helping brands grow organically on&nbsp;YouTube.</p>
			<p>She focuses on how buyers actually decide: the prompts they type, the videos they watch and the trust signals that move them from curiosity to purchase. At TurboRank she works alongside strategists in YouTube, search and AI visibility so recommendations stay grounded in what is working for clients&nbsp;now.</p>
			<p>Mary Ann co-founded TurboRank with Matthew Pearce. Outside of work, she is a passionate wine lover and can often be found exploring new&nbsp;vintages.</p>
			<p class="tr-fine">[Add credentials, speaking, press or notable clients Mary Ann is comfortable listing.]</p>
		</div>
		<div class="tr-author-about__sidebar">
			<p class="tr-author-label">Writes about</p>
			<div class="tr-author-tags">
				<span>Growth systems</span>
				<span>YouTube strategy</span>
				<span>Brand positioning</span>
				<span>AI visibility</span>
				<span>Direct response</span>
			</div>
			<div class="tr-author-note">
				<p class="tr-author-note__title">How we write</p>
				<p>Every TurboRank article is written or reviewed by a specialist and based on our own client work and testing. We link to sources for any outside data, and we update articles when platforms change. Each article shows when it was last&nbsp;updated.</p>
				<p class="tr-fine">[Confirm this matches your editorial process.]</p>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-author-articles', turborank_section_mist_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-author-articles-head">
		<h2>Articles by Mary Ann</h2>
		<a class="tr-insights-link" href="/insights/">See all articles</a>
	</div>
	<div class="tr-insights-grid tr-insights-grid--author">
		<?php
		foreach ( $recent as $article ) {
			echo turborank_insight_card( $article, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-insights tr-author-videos', turborank_section_white_color(), '#121212' );
	ob_start();
	?>
	<div class="tr-author-videos-head">
		<div>
			<h2>Videos with Mary Ann</h2>
			<p class="tr-lead">Short breakdowns of what’s changing on YouTube and in AI search, and what it means for marketers.</p>
		</div>
		<a class="tr-insights-link" href="https://www.youtube.com/channel/UCE1EQUksmaJT_YHwIeMZn4Q" target="_blank" rel="noreferrer">Watch on YouTube</a>
	</div>
	<div class="tr-insights-video__thumbs tr-insights-video__thumbs--author">
		<?php
		foreach ( turborank_service_videos() as $video ) :
			$thumb = turborank_service_video_thumb_url( $video );
			if ( ! $thumb ) {
				continue;
			}
			$label = ! empty( $video['full_title'] ) ? $video['full_title'] : $video['title'];
			?>
			<div class="tr-insights-video__thumb tr-insights-video__thumb--static">
				<img src="<?php echo esc_url( $thumb ); ?>" alt="<?php echo esc_attr( $label ); ?>" width="480" height="720" loading="lazy" decoding="async">
			</div>
		<?php endforeach; ?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-insights tr-author-close tr-insights-close tr-service tr-service-close',
			'theme'         => 'light',
			'bg'            => turborank_section_warm_color(),
			'heading'       => '<span class="tr-author-close-h2__line">Want Mary Ann’s team to look</span><span class="tr-author-close-h2__line">at your brand?</span>',
			'lead'          => 'A free Discovery Session shows where buyers find you on YouTube today, and your top 3 moves.',
			'button_href'   => turborank_discovery_session_url(),
		)
	);
}
