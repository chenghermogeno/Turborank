<?php
/**
 * About page markup, from the TurboRank website mockup.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the About page pattern.
 */
function turborank_render_about_page() {
	$uri = get_template_directory_uri() . '/assets/images/team/';

	$founders = array(
		array(
			'name'  => 'Mary Ann Bautista',
			'role'  => 'Co-founder',
			'image' => 'mary-ann-bautista.png',
			'bio'   => 'Mary Ann is a direct response marketing pioneer and co-founder of TurboRank, a YouTube growth firm specializing in search-driven video strategies. With over 30 years of experience, she’s led campaigns for some of the most recognized consumer brands in America, including Hooked on Phonics and The Pimsleur System. Today, she brings that same results-driven mindset to helping brands grow organically on YouTube.',
			'note'  => 'Outside of work, Mary Ann is a passionate wine lover and can often be found exploring new vintages.',
		),
		array(
			'name'  => 'Matthew Pearce',
			'role'  => 'Co-founder',
			'image' => 'matthew-pearce.png',
			'bio'   => 'Matthew has been helping brands grow on YouTube since nearly the beginning, first hired to create a viral video in 2007. Since then, he’s launched hundreds of YouTube channels and driven millions in sales directly tied to the platform. He specializes in content development and strategic channel growth, and leads a weekly YouTube series breaking down the latest trends and what they mean for marketers.',
			'note'  => 'When he’s not in creator mode, Matthew is likely planning his next trip to Hawaii or hunting for the perfect tiki bar.',
		),
	);

	$team = array(
		array(
			'name'              => 'Kat Butil',
			'role'              => '[Role: confirm with Matthew]',
			'badge'             => 'New',
			'photo_placeholder' => true,
			'bio'               => '[Bio from Matthew.]',
			'note'              => '[Personal note.]',
		),
		array(
			'name'  => 'Alexx Wells',
			'role'  => 'Chief YouTube Strategist',
			'image' => 'alexx-wells.png',
			'bio'   => 'Alexx is a data scientist and TurboRank’s Chief YouTube Strategist, known for going far beyond what software tools can show. She translates data into strategy with an instinct for what truly performs, helping clients unlock new levels of growth through precise, personalized YouTube tactics.',
			'note'  => 'Alexx recharges by spending time in nature: hiking, exploring and soaking up every peaceful moment outdoors.',
		),
		array(
			'name'  => 'Rico Young',
			'role'  => 'YouTube Growth Strategist',
			'image' => 'rico-young.png',
			'bio'   => 'Rico oversees end-to-end YouTube channel operations, combining analytics, strategy and execution. He handles performance reporting, contributes to content planning, reviews scripts and guides the editing team to ensure quality across all videos. He manages publishing with SEO-optimized metadata and coordinates off-page distribution and backlink networks to drive traffic and boost engagement.',
			'note'  => 'In his free time, Rico enjoys rollerblading by the coast, flying drones, freediving and climbing mountains in search of new perspectives.',
		),
		array(
			'name'  => 'Jennifer Joy Ud-Ulon',
			'role'  => 'SEO, GEO & Paid Media Strategist',
			'image' => 'jennifer-ud-ulon.png',
			'bio'   => 'Jen leads TurboRank’s SEO, generative engine optimization (GEO) and paid media work. She makes sure clients’ websites and content are easy for search engines and AI tools to find, understand and cite, and she designs YouTube ad campaigns that enhance, rather than compete with, organic growth.',
			'note'  => 'A true foodie, Jen loves exploring new restaurants, discovering recipes and cooking for friends and family. She’s equally passionate about travel and is an animal lover through and through, especially fond of both cats and dogs.',
		),
		array(
			'name'  => 'Leanne Lambert',
			'role'  => 'Social Media & Content Strategist',
			'image' => 'leanne-lambert.png',
			'bio'   => 'Leanne brings over 15 years of experience as a social media manager, content creator and graphic designer, having worked with top brands like USA TODAY and Bozell Advertising. She’s partnered with bestselling authors and national companies to deliver content that connects quickly, creatively and effectively. At TurboRank, she channels that expertise into the YouTube space, helping brands communicate with clarity, personality and results.',
			'note'  => 'When she’s not writing or designing, Leanne is likely experimenting with makeup, blasting punk rock or spoiling her cats.',
		),
		array(
			'name'  => 'Dulce De Leon',
			'role'  => 'Billing Manager',
			'image' => 'dulce-de-leon.png',
			'bio'   => 'Dulce handles invoicing and payment coordination with accuracy and a people-first approach. She helps keep TurboRank’s operations running smoothly, ensuring that clients always have clarity and confidence when it comes to billing and account support.',
			'note'  => 'She loves taking trips to the beach to soak in some much-needed vitamin “sea.” The sound of the waves keeps her grounded and recharged.',
		),
	);

	turborank_service_open( 'tr-about tr-about-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">About</span></p>
	<div class="tr-split">
		<div class="tr-about-hero__intro">
			<h1 class="tr-eyebrow">About TurboRank</h1>
			<h2>Be where your<br>customers search,<br>watch <em class="tr-em">and ask.</em></h2>
			<p class="tr-lead">TurboRank helps established brands get discovered across<br>YouTube, Google and AI answers. For nearly 20 years, our founders<br>have studied one question: why does one answer get discovered<br>while another doesn’t?</p>
			<p class="tr-lead">Buyers keep moving to new places to ask. We follow them, so your<br>brand is there when they do.</p>
		</div>
		<div class="tr-glance">
			<p class="tr-glance__title">TurboRank at a glance</p>
			<dl class="tr-glance__list">
				<div class="tr-glance__row">
					<dt>Founders</dt>
					<dd>Mary Ann Bautista<br class="tr-glance__break" aria-hidden="true"> and Matthew Pearce</dd>
				</div>
				<div class="tr-glance__row">
					<dt>Founders working on YouTube since</dt>
					<dd>2007</dd>
				</div>
				<div class="tr-glance__row">
					<dt>Company founded</dt>
					<dd>[Founding year]</dd>
				</div>
				<div class="tr-glance__row">
					<dt>Longest client relationship</dt>
					<dd class="tr-glance__dd--with-badge">
						<span>More than 3 years</span>
						<span class="tr-kat-claim-badge"><?php esc_html_e( 'Kat claim', 'turborank' ); ?></span>
					</dd>
				</div>
				<div class="tr-glance__row">
					<dt>Based in</dt>
					<dd>Alameda, California</dd>
				</div>
				<div class="tr-glance__row tr-glance__row--stack">
					<dt>Services</dt>
					<dd>AI Discovery, YouTube Discovery, Brand Authority</dd>
				</div>
				<div class="tr-glance__row tr-glance__row--stack">
					<dt>Who we serve</dt>
					<dd>Established brands, typically $10M–$150M in annual revenue</dd>
				</div>
			</dl>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-about tr-about-story', '#ffffff', '#121212', 'story' );
	ob_start();
	?>
	<div class="tr-story">
		<div>
			<h2>How did TurboRank start?</h2>
			<p>Our founders’ work began on YouTube in 2007, studying how buyers find answers on the world’s largest video discovery platform. They learned how buyer intent, content relevance, authority and platform algorithms decide what gets discovered.</p>
			<p>Then buyers started asking in more places: Google, YouTube, Shorts and now AI assistants. Each new platform changed where buyers asked, but not the question we work on.</p>
			<p>In [founding year], Mary Ann and Matthew founded TurboRank to help established brands get discovered wherever their buyers search, watch and ask. Our longest client relationship is now more than three years old.</p>
			<p class="tr-fine">[Story details to confirm with Mary Ann and Matthew.]</p>
		</div>
		<div>
			<a
				class="tr-story-video tr-story-video--placeholder"
				href="https://www.youtube.com/@turborank-co"
				target="_blank"
				rel="noopener noreferrer"
				aria-label="<?php esc_attr_e( 'TurboRank on YouTube — founder story video coming soon', 'turborank' ); ?>"
			>
				<span class="tr-story-video__yt-icon" aria-hidden="true">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68 48" width="68" height="48" focusable="false">
						<path fill="#FF0000" d="M66.52 7.74a8.27 8.27 0 0 0-5.81-5.86C55.81 1 34 1 34 1S12.19 1 7.29 1.88A8.27 8.27 0 0 0 1.48 7.74C.56 12.65 0 24 0 24s.56 11.35 1.48 16.26A8.27 8.27 0 0 0 7.29 46.12C12.19 47 34 47 34 47s21.81 0 26.71-.88a8.27 8.27 0 0 0 5.81-5.86C67.44 35.35 68 24 68 24s-.56-11.35-1.48-16.26z"/>
						<path fill="#FFF" d="M45 24 27 14v20l18-10z"/>
					</svg>
				</span>
				<p>[Video: Mary Ann and Matthew on why TurboRank exists]</p>
			</a>
			<div class="tr-story-meta">
				<span>The TurboRank story, in about two minutes</span>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-about tr-about-timeline', '#F9F9F7', '#121212' );
	ob_start();
	?>
	<h2>We follow the customer.</h2>
	<p class="tr-lead tr-timeline-lead">Discovery keeps moving. Our approach has always been the same: find where buyers ask their questions, then make sure the right answer is there.</p>
	<div class="tr-timeline">
		<article>
			<span class="tr-year">2007</span>
			<h3>Buyers watch</h3>
			<p>YouTube becomes where buyers see products and expertise before they buy.</p>
			<p>Our founders begin helping brands get discovered on YouTube</p>
		</article>
		<article>
			<span class="tr-year">[Year]</span>
			<h3>Buyers search</h3>
			<p>Google starts showing videos in results, and search and video become one journey.</p>
			<p>[TurboRank milestone]</p>
		</article>
		<article>
			<span class="tr-year">[Year]</span>
			<h3>Buyers scroll</h3>
			<p>Shorts and short-form feeds put discovery in front of buyers who weren’t searching yet.</p>
			<p>[TurboRank milestone]</p>
		</article>
		<article>
			<span class="tr-year">Today</span>
			<h3>Buyers ask</h3>
			<p>ChatGPT, Gemini and Perplexity build shortlists before buyers ever visit a website.</p>
			<p>Discovery across AI, YouTube and search</p>
		</article>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-about tr-about-beliefs', '#ffffff', '#121212', 'beliefs' );
	ob_start();
	?>
	<h2>What do we believe?</h2>
	<p class="tr-belief-lead">Four principles guide every engagement, and one promise sits under all of them: we report what changed, honestly, alongside what we did.</p>
	<div class="tr-beliefs">
		<article class="tr-belief">
			<h3>Authority over<br>attention</h3>
			<p>Brands shouldn’t rely only on attention they rent from paid media.</p>
		</article>
		<article class="tr-belief">
			<h3>Discovery should<br>compound</h3>
			<p>Organic visibility should keep creating value long after the work is done.</p>
		</article>
		<article class="tr-belief">
			<h3>Content should<br>build confidence</h3>
			<p>Buyers need to learn, compare and trust before they buy. Good content helps them&nbsp;do&nbsp;it.</p>
		</article>
		<article class="tr-belief">
			<h3>Visibility beyond<br>YouTube</h3>
			<p>Strong brands should show up on YouTube, in Google and in AI answers.</p>
		</article>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-about tr-about-team', '#f3f1eb', '#121212' );
	ob_start();
	?>
	<h2>Who is behind TurboRank?</h2>
	<p class="tr-team-lead">Led by our two co-founders, with specialists in YouTube strategy, search and AI visibility, content and paid media.</p>
	<div class="tr-founders">
		<?php foreach ( $founders as $person ) : ?>
			<?php echo turborank_about_person( $person, $uri, false ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php endforeach; ?>
	</div>
	<p class="tr-team-label">Our team</p>
	<div class="tr-team-grid">
		<?php foreach ( $team as $person ) : ?>
			<?php echo turborank_about_person( $person, $uri, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?php endforeach; ?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-about tr-about-work', '#ffffff', '#121212' );
	ob_start();
	?>
	<div class="tr-work">
		<div class="tr-work__intro">
			<h2>Who do we work with?</h2>
			<p class="tr-work-lead">Established brands that already have expertise, content and market presence, and want buyers to find it. We’re strongest when buyers need to learn, investigate, compare, see, understand or trust something before they buy.</p>
			<ul class="tr-clients tr-clients--placeholders" aria-label="Approved client logos">
				<li><div class="tr-clients__tile"><span class="tr-placeholder">[Approved logo]</span></div></li>
				<li><div class="tr-clients__tile"><span class="tr-placeholder">[Approved logo]</span></div></li>
				<li><div class="tr-clients__tile"><span class="tr-placeholder">[Approved logo]</span></div></li>
				<li><div class="tr-clients__tile"><span class="tr-placeholder">[Approved logo]</span></div></li>
			</ul>
			<p class="tr-fine">[Approved logos only]</p>
			<p class="tr-work-cta"><a class="tr-about-link" href="/case-studies/">See our results</a></p>
		</div>
		<div class="tr-work__aside">
			<p class="tr-award-label">Trusted and recognized</p>
			<div class="tr-awards">
				<div class="tr-award"><a href="https://www.goodfirms.co/" target="_blank" rel="noreferrer">GoodFirms</a><span class="tr-placeholder">[Rating or award]</span></div>
				<div class="tr-award"><a href="https://www.trustpilot.com/" target="_blank" rel="noreferrer">Trustpilot</a><span class="tr-placeholder">[Rating or award]</span></div>
				<div class="tr-award"><a href="https://www.designrush.com/" target="_blank" rel="noreferrer">DesignRush</a><span class="tr-placeholder">[Rating or award]</span></div>
			</div>
			<p class="tr-award-label">Speaking and press</p>
			<div class="tr-awards">
				<div class="tr-award tr-award--press"><span>[Talk or article title], [Event or publication], [Year]</span></div>
				<div class="tr-award tr-award--press"><span>[Talk or article title], [Event or publication], [Year]</span></div>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-about tr-about-facts', '#F9F9F7', '#121212' );
	ob_start();
	?>
	<div class="tr-facts">
		<div class="tr-facts__intro">
			<h2>Quick facts</h2>
			<p class="tr-facts-lead">The questions people ask most about TurboRank itself.</p>
		</div>
		<div class="tr-facts__list">
			<div class="tr-fact">
				<h3>Who founded TurboRank?</h3>
				<p>TurboRank was founded in 2025 by Mary Ann Bautista and Matthew Pearce, who have worked on YouTube discovery since 2007.</p>
			</div>
			<div class="tr-fact">
				<h3>What does TurboRank do?</h3>
				<p>TurboRank helps established brands get discovered across YouTube, Google and AI answers through three services: AI Discovery, YouTube Discovery and Brand Authority.</p>
			</div>
			<div class="tr-fact">
				<h3>How is TurboRank different from an SEO agency?</h3>
				<p>Most SEO agencies focus on ranking web pages. TurboRank started with YouTube and works across video, search and AI answers together, because buyers move between all three before they decide.</p>
			</div>
			<div class="tr-fact">
				<h3>Where is TurboRank based?</h3>
				<p>Alameda, California. We work with brands across [the United States].</p>
			</div>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-about tr-about-close tr-service tr-service-close',
			'theme'         => 'light',
			'bg'            => '#ffffff',
			'heading'       => 'Let’s find out where your buyers are looking.',
			'lead'          => 'Book a Discovery Session, or just say hello.',
		)
	);
}

/**
 * One person card.
 *
 * @param array<string, string> $person Person fields.
 * @param string                $uri    Team image directory URI.
 * @param bool                  $team   Whether this is a team card.
 * @return string
 */
function turborank_about_person( $person, $uri, $team ) {
	$class = $team ? 'tr-person tr-person--team' : 'tr-person';
	$link  = 'https://www.linkedin.com/search/results/all/?keywords=' . rawurlencode( $person['name'] );

	if ( ! empty( $person['photo_placeholder'] ) ) {
		$photo = '<div class="tr-person__photo tr-person__photo--placeholder" aria-hidden="true">[Photo]</div>';
	} else {
		$photo = '<img src="' . esc_url( $uri . $person['image'] ) . '" alt="' . esc_attr( $person['name'] ) . '" width="160" height="160">';
	}

	$title = '<div class="tr-person__title-row"><h3>' . esc_html( $person['name'] ) . '</h3>';
	if ( ! empty( $person['badge'] ) ) {
		$title .= '<span class="tr-person-badge">' . esc_html( $person['badge'] ) . '</span>';
	}
	$title .= '</div>';

	$linkedin = '';
	if ( ! $team ) {
		$linkedin = '<a class="tr-about-link" href="' . esc_url( $link ) . '" target="_blank" rel="noreferrer">LinkedIn</a>';
	}

	return '<article class="' . esc_attr( $class ) . '">'
		. '<div class="tr-person__head">'
		. $photo
		. '<div class="tr-person__identity">'
		. $title
		. '<p class="tr-role">' . esc_html( $person['role'] ) . '</p>'
		. '</div></div>'
		. '<div class="tr-person__body">'
		. '<p>' . esc_html( $person['bio'] ) . '</p>'
		. '<p class="tr-about-note">' . esc_html( $person['note'] ) . '</p>'
		. $linkedin
		. '</div></article>';
}
