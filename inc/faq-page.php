<?php
/**
 * FAQ page content and renderer.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * FAQ sections from the website mockup.
 *
 * @return array<int, array<string, mixed>>
 */
function turborank_faq_sections() {
	return array(
		array(
			'id'    => 'about-turborank',
			'title' => 'About TurboRank',
			'items' => array(
				array(
					'q' => 'What does TurboRank do?',
					'a' => 'TurboRank helps established brands get discovered across YouTube, Google and AI answers. We do it through three services, AI Discovery, YouTube Discovery and Brand Authority, guided by the TurboRank Discovery Framework.',
				),
				array(
					'q' => 'Who founded TurboRank, and when?',
					'a' => 'TurboRank was founded in 2025 by Mary Ann Bautista and Matthew Pearce, who have worked on YouTube discovery since 2007.',
				),
				array(
					'q' => 'Is TurboRank a YouTube agency or an AI visibility agency?',
					'a' => 'Neither. TurboRank is a discovery company. YouTube is our proven foundation, and our founders have worked on it since 2007. We work across AI answers, YouTube, Google search and third-party sources together, because buyers move between all of them.',
				),
				array(
					'q' => 'How is TurboRank different from a traditional marketing agency?',
					'a' => 'We focus on discovery: how buyers find, compare and choose brands across AI answers, YouTube and search. Every engagement follows the same four-stage framework, and we measure progress with defined metrics like Discovery Share and Citation Share.',
				),
				array(
					'q' => 'Where is TurboRank based?',
					'a' => 'Alameda, California. We work with brands across [the United States].',
				),
			),
		),
		array(
			'id'    => 'ai-discovery',
			'title' => 'AI Discovery',
			'items' => array(
				array(
					'q' => 'What is AI discovery?',
					'a' => 'AI discovery is how often AI assistants like ChatGPT, Gemini, Perplexity and Google’s AI Overviews mention your brand when buyers ask questions in your category. TurboRank measures it with two metrics: Discovery Share and Citation Share.',
				),
				array(
					'q' => 'What’s the difference between Discovery Share and Citation Share?',
					'a' => 'Discovery Share is the percentage of a fixed set of buyer-intent prompts in which your brand appears in the AI answer. Citation Share is the percentage of those answers that cite your own content or domain as a source.',
				),
				array(
					'q' => 'Which AI platforms do you look at?',
					'a' => 'ChatGPT, Gemini, Perplexity, Google AI Overviews and Google AI Mode.',
				),
				array(
					'q' => 'How is AI Discovery different from traditional SEO?',
					'a' => 'SEO focuses on ranking pages in search results. AI Discovery focuses on whether AI answers mention and cite your brand. The two overlap, since AI tools draw on search results and trusted pages, but they’re measured differently.',
				),
				array(
					'q' => 'Can anyone guarantee that AI recommends my brand?',
					'a' => 'No. No one controls AI answers, and we don’t pretend to. We measure where you appear, improve the content and sources AI answers draw on, and report what changed.',
				),
				array(
					'q' => 'Why do you run each prompt more than once?',
					'a' => 'Because AI answers change from one run to the next. A single answer tells you almost nothing, so we run a fixed set of prompts repeatedly and only report a change when it beats the normal variation we measured at the start.',
				),
			),
		),
		array(
			'id'    => 'youtube-discovery',
			'title' => 'YouTube Discovery',
			'items' => array(
				array(
					'q' => 'Do you create new videos or optimize existing ones?',
					'a' => 'Both, starting with what you already have. We reoptimize the videos you’ve already invested in, then recommend new videos only where there’s a real gap.',
				),
				array(
					'q' => 'Do we need an existing YouTube channel?',
					'a' => 'It helps. We work best with brands that already have a content library or video program. [Confirm whether TurboRank takes on brands starting from scratch.]',
				),
				array(
					'q' => 'Do we need YouTube to improve AI visibility?',
					'a' => 'Not always. Some AI surfaces cite video often, while others lean on reviews and articles. We look at which sources AI uses in your category before recommending video.',
				),
			),
		),
		array(
			'id'    => 'brand-authority',
			'title' => 'Brand Authority',
			'items' => array(
				array(
					'q' => 'What is brand authority?',
					'a' => 'Brand authority is how much trusted, independent sources vouch for your brand: mentions, citations, reviews and community discussion. Search engines and AI answers lean on these signals when deciding which brands to recommend.',
				),
				array(
					'q' => 'How do you build brand authority?',
					'a' => 'We earn relevant citations and mentions on the sources AI answers draw on, strengthen reviews and community presence, and keep your brand described consistently everywhere. Any participation on a client’s behalf is disclosed. [Confirm policy wording.]',
				),
			),
		),
		array(
			'id'    => 'working-with-us',
			'title' => 'Working with us',
			'items' => array(
				array(
					'q' => 'Who do you work with?',
					'a' => 'Established companies whose customers research, compare and evaluate before buying. Most of our clients generate roughly $10 million to $150 million in annual revenue, but the right fit matters more than the number.',
				),
				array(
					'q'    => 'What happens in a Discovery Session?',
					'a'    => 'A free 30-minute call. Before we meet, our team researches how buyers find your brand. On the call, you get where buyers find you on YouTube and where competitors win instead, the videos you already have that aren\'t working for you, and your top 3 moves, prepared for your brand and yours to keep.',
					'link' => array(
						'label' => 'Book a time',
						'url'   => turborank_discovery_session_url(),
					),
				),
				array(
					'q' => 'What is a Discovery Assessment?',
					'a' => 'A review of how buyers find your brand, delivered as a Discovery Snapshot: a short report showing how often AI answers mention and cite your brand, which competitors appear instead, the sources AI relies on, your YouTube visibility, and your top three opportunities with what our team would do first.',
				),
				array(
					'q' => 'Is the Discovery Session free?',
					'a' => 'Yes.',
				),
				array(
					'q' => 'How do you report results?',
					'a' => 'We report what changed alongside the work we did, including Discovery Share, Citation Share, YouTube visibility and the business metrics that matter to you, [every week].',
				),
				array(
					'q' => 'How long does it take to see results?',
					'a' => '[Typical timeframe, to confirm.] Because AI answers vary from run to run, we only report changes that are meaningful.',
				),
				array(
					'q' => 'How quickly will you reply?',
					'a' => 'Within one business day. Our team works Monday to Friday, 9am to 5pm Pacific time.',
				),
			),
		),
	);
}

/**
 * Render the FAQ page pattern.
 */
function turborank_render_faq_page() {
	$sections = turborank_faq_sections();

	turborank_service_open( 'tr-faq-page tr-faq-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail">FAQ</span></p>
	<h1 class="tr-eyebrow">FAQ</h1>
	<h2>Frequently asked <em class="tr-em">questions</em></h2>
	<div class="tr-faq-hero__copy">
		<p class="tr-lead">Straight answers about TurboRank, AI discovery, YouTube and working with us.</p>
		<p class="tr-lead">Can’t find what you need? Call <a href="tel:5105215100">(510) 521-5100</a> or email <a href="mailto:hello@turborank.co">hello@turborank.co</a>.</p>
	</div>
	<div class="tr-faq-jumps">
		<?php foreach ( $sections as $section ) : ?>
			<a href="#<?php echo esc_attr( $section['id'] ); ?>"><?php echo esc_html( $section['title'] ); ?></a>
		<?php endforeach; ?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-faq-page tr-faq-body', '#f7f6f2', '#121212' );
	ob_start();
	?>
	<div class="tr-faq-layout">
		<nav class="tr-faq-nav" aria-label="FAQ sections">
			<p>On this page</p>
			<?php foreach ( $sections as $index => $section ) : ?>
				<a href="#<?php echo esc_attr( $section['id'] ); ?>"<?php echo 0 === $index ? ' class="is-active"' : ''; ?>><?php echo esc_html( $section['title'] ); ?></a>
			<?php endforeach; ?>
		</nav>
		<div class="tr-faq-sections">
			<?php foreach ( $sections as $section ) : ?>
				<section class="tr-faq-section" id="<?php echo esc_attr( $section['id'] ); ?>">
					<h2><?php echo esc_html( $section['title'] ); ?></h2>
					<?php foreach ( $section['items'] as $item ) : ?>
						<article class="tr-faq-item">
							<h3><?php echo esc_html( $item['q'] ); ?></h3>
							<p>
								<?php
								echo esc_html( $item['a'] );
								if ( ! empty( $item['link']['url'] ) && ! empty( $item['link']['label'] ) ) {
									echo ' <a href="' . esc_url( $item['link']['url'] ) . '">' . esc_html( $item['link']['label'] ) . '</a>';
								}
								?>
							</p>
						</article>
					<?php endforeach; ?>
				</section>
			<?php endforeach; ?>
		</div>
	</div>
	<script>
	(function () {
		var links = document.querySelectorAll('.tr-faq-nav a, .tr-faq-jumps a');
		var sections = [...document.querySelectorAll('.tr-faq-section')];
		if (!sections.length) {
			return;
		}
		function setActive(id) {
			links.forEach(function (link) {
				var active = link.getAttribute('href') === '#' + id;
				link.classList.toggle('is-active', active);
			});
		}
		if ('IntersectionObserver' in window) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						setActive(entry.target.id);
					}
				});
			}, { rootMargin: '-40% 0px -50% 0px', threshold: 0 });
			sections.forEach(function (section) { observer.observe(section); });
		}
		setActive(sections[0].id);
	}());
	</script>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_close_cta(
		array(
			'section_class' => 'tr-faq-page tr-faq-close tr-service tr-service-close',
			'heading'       => 'Still have a question?',
			'lead'          => 'Talk to our team, or book a Discovery Session to see where buyers find you today.',
		)
	);
}
