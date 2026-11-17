<?php
/**
 * Title: TurboRank Homepage
 * Slug: turborank/homepage
 * Categories: turborank
 * Inserter: true
 *
 * @package TurboRank
 */

$uri                   = esc_url( get_template_directory_uri() );
$discovery_session_url = esc_url( turborank_discovery_session_url() );
?>
<!-- wp:group {"align":"full","className":"tr-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#f6f1e7","text":"#121212"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group tr-hero alignfull has-text-color has-background" style="color:#121212;background-color:#f6f1e7;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"52%"} -->
		<div class="wp-block-column" style="flex-basis:52%">
			<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"clamp(2.15rem, 4.2vw, 3.35rem)","lineHeight":"1.05","fontWeight":"500"},"spacing":{"margin":{"bottom":"0.9rem"}},"color":{"text":"#ffffff"}}} -->
			<h2 class="wp-block-heading has-text-color" style="color:#ffffff;margin-bottom:0.9rem;font-size:clamp(2.15rem, 4.2vw, 3.35rem);font-weight:500;line-height:1.05">Your buyers are asking.<br><em class="tr-italic tr-accent-text">Is your brand the answer?</em></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"tr-hero-intro-lead","style":{"typography":{"fontSize":"1.2rem","lineHeight":"1.55"},"color":{"text":"#ffffff"}}} -->
			<p class="tr-hero-intro-lead has-text-color" style="color:#ffffff;font-size:1.2rem;line-height:1.55">They ask YouTube, Google and AI before they ever reach your website. Be where your customers search, watch and ask.</p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<div class="tr-hero-intro-divider" role="presentation" aria-hidden="true"></div>
			<!-- /wp:html -->

			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.05rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0"}},"color":{"text":"#ffffff"}}} -->
			<p class="has-text-color" style="color:#ffffff;margin-top:0;font-size:1.05rem;line-height:1.5"><strong class="tr-hero-lead-strong">Book your Discovery Session.</strong> Before we meet, our team researches how buyers find your brand. On the call, you get:</p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"tr-hero-checklist","style":{"typography":{"fontSize":"1.05rem","lineHeight":"1.5"},"color":{"text":"#ffffff"},"spacing":{"margin":{"top":"0.65rem","bottom":"0"}}}} -->
			<ul class="tr-hero-checklist has-text-color" style="color:#ffffff;margin-top:0.65rem;margin-bottom:0;font-size:1.05rem;line-height:1.5">
				<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text">Where buyers find you on YouTube, and where competitors win&nbsp;instead</span></li>
				<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text">The videos you already have that aren't working for you</span></li>
				<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text">Your top 3 moves, prepared for your brand and yours to keep</span></li>
			</ul>
			<!-- /wp:list -->

			<!-- wp:group {"className":"tr-hero-cta-row","style":{"spacing":{"margin":{"top":"1.75rem"},"blockGap":"0.65rem"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
			<div class="wp-block-group tr-hero-cta-row is-layout-flex wp-block-group-is-layout-flex" style="margin-top:1.75rem">
				<!-- wp:buttons {"className":"tr-btn-row","layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-buttons tr-btn-row is-layout-flex wp-block-buttons-is-layout-flex">
					<!-- wp:button {"className":"tr-btn-primary"} -->
					<div class="wp-block-button tr-btn-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo $discovery_session_url; ?>">Book a Discovery Session</a></div>
					<!-- /wp:button -->
					<!-- wp:button {"className":"tr-btn-ghost"} -->
					<div class="wp-block-button tr-btn-ghost"><a class="wp-block-button__link wp-element-button" href="/case-studies/">See our results</a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->

				<!-- wp:group {"className":"tr-hero-meta-stack","style":{"spacing":{"blockGap":"0.2rem"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group tr-hero-meta-stack">
					<!-- wp:paragraph {"className":"tr-hero-meta","style":{"typography":{"fontSize":"0.85rem","lineHeight":"1.5"},"color":{"text":"#ffffff"}}} -->
					<p class="tr-hero-meta has-text-color" style="color:#ffffff;font-size:0.85rem;line-height:1.5">30 minutes · Prepared in advance · For established brands</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"tr-hotline tr-hero-contact-line","style":{"typography":{"fontSize":"0.85rem","lineHeight":"1.5"},"spacing":{"margin":{"top":"0.75rem"}},"color":{"text":"#ffffff"}}} -->
			<p class="tr-hotline tr-hero-contact-line has-text-color" style="color:#ffffff;margin-top:0.75rem;font-size:0.85rem;line-height:1.5">Prefer to talk first? Call <a href="tel:5105215100">(510) 521-5100</a> or email <a href="mailto:hello@turborank.co">hello@turborank.co</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:html -->
			<aside class="tr-hero-proof-card" aria-label="Client result highlight">
				<p class="tr-hero-proof-card__text">A Pet Technology Brand we work with grew its YouTube subscribers 70.9% in 2025, and Google Search traffic to its channel rose 73%. <span class="tr-hero-proof-card__pending">[Client OK pending]</span> <span class="tr-kat-claim-badge tr-kat-claim-badge--after-pending">Kat claim</span></p>
			</aside>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"48%"} -->
		<div class="wp-block-column" style="flex-basis:48%">
			<!-- wp:turborank/discovery-snapshot {"strategistCaption":""} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:html -->
	<?php turborank_render_trust_logos_section(); ?>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"tr-journey-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"},"color":{"background":"#ffffff"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group tr-journey-section alignfull has-background" style="background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"tr-journey-intro tr-section-intro","style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group tr-journey-intro tr-section-intro is-layout-constrained wp-block-group-is-layout-constrained">
		<!-- wp:heading {"level":1,"className":"tr-pretitle","textAlign":"left"} -->
		<h1 class="tr-pretitle wp-block-heading has-text-align-left">Your buyers are asking AI. Is your brand the answer?</h1>
		<!-- /wp:heading -->

		<!-- wp:heading {"level":2,"textAlign":"left","style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3.1rem)"}}} -->
		<h2 class="wp-block-heading has-text-align-left" style="font-size:clamp(2rem, 4vw, 3.1rem)">The customer journey has changed. Has your marketing?</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"tr-journey-lead","style":{"typography":{"fontSize":"1.05rem","lineHeight":"1.55"},"color":{"text":"#3c4048"}}} -->
		<p class="tr-journey-lead has-text-color" style="color:#3c4048;font-size:1.05rem;line-height:1.55">Your next customer might discover a product on YouTube, compare options on Google, and ask ChatGPT which brand to trust. By the time they reach your website, they may already have made their decision.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.25rem"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-journey-card","style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.35rem","right":"1.35rem"}},"color":{"background":"#fffdf8"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group tr-journey-card has-background" style="border-radius:12px;background-color:#fffdf8;padding-top:1.5rem;padding-right:1.35rem;padding-bottom:1.5rem;padding-left:1.35rem">
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">Google</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"style":{"color":{"text":"#3c4048"}}} -->
				<p class="has-text-color" style="color:#3c4048">Where buyers compare their options, now with AI Overviews and AI Mode.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-journey-card","style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.35rem","right":"1.35rem"}},"color":{"background":"#fffdf8"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group tr-journey-card has-background" style="border-radius:12px;background-color:#fffdf8;padding-top:1.5rem;padding-right:1.35rem;padding-bottom:1.5rem;padding-left:1.35rem">
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">YouTube</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"style":{"color":{"text":"#3c4048"}}} -->
				<p class="has-text-color" style="color:#3c4048">Where buyers discover products through demos, reviews and expertise. Google and AI answers draw on its videos too.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-journey-card","style":{"spacing":{"padding":{"top":"1.5rem","bottom":"1.5rem","left":"1.35rem","right":"1.35rem"}},"color":{"background":"#fffdf8"},"border":{"radius":"12px"}},"layout":{"type":"constrained"}} -->
			<div class="wp-block-group tr-journey-card has-background" style="border-radius:12px;background-color:#fffdf8;padding-top:1.5rem;padding-right:1.35rem;padding-bottom:1.5rem;padding-left:1.35rem">
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">AI assistants</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"style":{"color":{"text":"#3c4048"}}} -->
				<p class="has-text-color" style="color:#3c4048">Where buyers ask ChatGPT, Gemini and Perplexity which brand to trust.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:columns {"verticalAlignment":"top","className":"tr-journey-stat-row","style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
	<div class="wp-block-columns tr-journey-stat-row are-vertically-aligned-top">
		<!-- wp:column {"verticalAlignment":"top","width":"25%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:25%">
			<!-- wp:html -->
			<div class="tr-stat-xx">XX%</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"top","width":"75%"} -->
		<div class="wp-block-column is-vertically-aligned-top" style="flex-basis:75%">
			<!-- wp:paragraph {"className":"tr-journey-ref__finding","style":{"typography":{"fontSize":"1.15rem","lineHeight":"1.5"}}} -->
			<p class="tr-journey-ref__finding" style="font-size:1.15rem;line-height:1.5">[One verified research finding that shows why AI discovery matters to a CEO or marketing leader.]</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"tr-journey-ref__source","style":{"typography":{"fontSize":"0.85rem","lineHeight":"1.45"},"color":{"text":"#3c4048"}}} -->
			<p class="tr-journey-ref__source has-text-color" style="color:#3c4048;font-size:0.85rem;line-height:1.45">Source: [Evertune or other verified source, year]</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|50"},"color":{"background":"#f5f5f5"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" id="services" style="background-color:rgb(245 245 245 / 70%);margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"tr-section-intro","style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group tr-section-intro">
		<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)"}}} -->
		<h2 class="wp-block-heading" style="font-size:clamp(2rem, 4vw, 3rem)">What does TurboRank do?</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.05rem","lineHeight":"1.55"},"color":{"text":"#a6a8b1"}}} -->
		<p class="has-text-color" style="color:#3c4048;font-size:1.05rem;line-height:1.55">We find where buyers discover brands like yours on YouTube, Google and AI. Then our specialists improve it by hand: optimizing the videos and content you already have, creating what’s missing, and building the third-party sources AI answers draw on.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.25rem"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column" id="ai-discovery">
			<!-- wp:group {"className":"tr-product-card","style":{"spacing":{"padding":{"top":"1.75rem","right":"1.5rem","bottom":"1.75rem","left":"1.5rem"},"blockGap":"0.75rem"},"color":{"background":"#1a1a1a","text":"#ffffff"},"border":{"radius":"14px"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-product-card has-text-color has-background" style="border-radius:14px;color:#ffffff;background-color:#1a1a1a;padding-top:1.75rem;padding-right:1.5rem;padding-bottom:1.75rem;padding-left:1.5rem">
				<!-- wp:paragraph {"className":"tr-product-card__eyebrow","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.4","fontWeight":"700"},"color":{"text":"#b8321b"}}} -->
				<p class="tr-product-card__eyebrow has-text-color" style="color:#b8321b;font-size:0.95rem;line-height:1.4;font-weight:700">Where we start</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--serif)","fontSize":"1.75rem","fontWeight":"500"}}} -->
				<h3 class="wp-block-heading" style="font-size:1.75rem;font-weight:500;font-family:var(--wp--preset--font-family--serif)">AI Discovery</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-product-card__intro","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"}}} -->
				<p class="tr-product-card__intro" style="font-size:0.95rem;line-height:1.5">When customers ask AI for recommendations, get your brand into the conversation.</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="tr-product-features">
					<p class="tr-product-feature">Where AI answers mention you today</p>
					<p class="tr-product-feature">Answers and content built to be cited</p>
					<p class="tr-product-feature">Competitor and source analysis</p>
				</div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-product-card__cta"} -->
				<p class="tr-product-card__cta"><a class="tr-learn-more tr-product-link" href="/ai-discovery/">Explore AI Discovery</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column" id="youtube-discovery">
			<!-- wp:group {"className":"tr-product-card","style":{"spacing":{"padding":{"top":"1.75rem","right":"1.5rem","bottom":"1.75rem","left":"1.5rem"},"blockGap":"0.75rem"},"color":{"background":"#1a1a1a","text":"#ffffff"},"border":{"radius":"14px"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-product-card has-text-color has-background" style="border-radius:14px;color:#ffffff;background-color:#1a1a1a;padding-top:1.75rem;padding-right:1.5rem;padding-bottom:1.75rem;padding-left:1.5rem">
				<!-- wp:paragraph {"className":"tr-product-card__eyebrow","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.4","fontWeight":"700"},"color":{"text":"#b8321b"}}} -->
				<p class="tr-product-card__eyebrow has-text-color" style="color:#b8321b;font-size:0.95rem;line-height:1.4;font-weight:700">Our proven foundation</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--serif)","fontSize":"1.75rem","fontWeight":"500"}}} -->
				<h3 class="wp-block-heading" style="font-size:1.75rem;font-weight:500;font-family:var(--wp--preset--font-family--serif)">YouTube Discovery</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-product-card__intro","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"}}} -->
				<p class="tr-product-card__intro" style="font-size:0.95rem;line-height:1.5">Turn your video library into a discovery channel that keeps attracting buyers long after you publish.</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="tr-product-features">
					<p class="tr-product-feature">Channel and library audit</p>
					<p class="tr-product-feature">Buyer-intent research and reoptimization</p>
					<p class="tr-product-feature">Titles, thumbnails and Shorts</p>
				</div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-product-card__cta"} -->
				<p class="tr-product-card__cta"><a class="tr-learn-more tr-product-link" href="/youtube-discovery/">Explore YouTube Discovery</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column" id="brand-authority">
			<!-- wp:group {"className":"tr-product-card","style":{"spacing":{"padding":{"top":"1.75rem","right":"1.5rem","bottom":"1.75rem","left":"1.5rem"},"blockGap":"0.75rem"},"color":{"background":"#1a1a1a","text":"#ffffff"},"border":{"radius":"14px"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-product-card has-text-color has-background" style="border-radius:14px;color:#ffffff;background-color:#1a1a1a;padding-top:1.75rem;padding-right:1.5rem;padding-bottom:1.75rem;padding-left:1.5rem">
				<!-- wp:paragraph {"className":"tr-product-card__eyebrow","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.4","fontWeight":"700"},"color":{"text":"#b8321b"}}} -->
				<p class="tr-product-card__eyebrow has-text-color" style="color:#b8321b;font-size:0.95rem;line-height:1.4;font-weight:700">The sources AI trusts</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"style":{"typography":{"fontFamily":"var(--wp--preset--font-family--serif)","fontSize":"1.75rem","fontWeight":"500"}}} -->
				<h3 class="wp-block-heading" style="font-size:1.75rem;font-weight:500;font-family:var(--wp--preset--font-family--serif)">Brand Authority</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-product-card__intro","style":{"typography":{"fontSize":"0.95rem","lineHeight":"1.5"}}} -->
				<p class="tr-product-card__intro" style="font-size:0.95rem;line-height:1.5">Build the independent credibility that helps buyers and discovery platforms recognize your brand.</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="tr-product-features">
					<p class="tr-product-feature">Reddit and community presence</p>
					<p class="tr-product-feature">Citations, mentions and reviews on trusted sites</p>
					<p class="tr-product-feature">Consistent brand descriptions everywhere</p>
				</div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-product-card__cta"} -->
				<p class="tr-product-card__cta"><a class="tr-learn-more tr-product-link" href="/brand-authority/">Explore Brand Authority</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"tr-framework","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#ffffff"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group tr-framework alignfull has-background" id="framework" style="background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<img class="tr-framework__section-arrow" src="<?php echo esc_url( $uri ); ?>/assets/images/framework-section-arrow.png" alt="" width="320" height="320" loading="lazy" decoding="async" aria-hidden="true" />
	<!-- wp:group {"className":"tr-framework-intro tr-section-intro","layout":{"type":"constrained"}} -->
	<div class="wp-block-group tr-framework-intro tr-section-intro is-layout-constrained wp-block-group-is-layout-constrained">
		<!-- wp:paragraph {"className":"tr-framework__eyebrow"} -->
		<p class="tr-framework__eyebrow">The TurboRank Discovery Framework</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3.2rem)"},"color":{"text":"#121212"}}} -->
		<h2 class="wp-block-heading has-text-color" style="color:#121212;font-size:clamp(2rem, 4vw, 3.2rem)">Discovery isn’t an accident.<br><em class="tr-italic tr-accent-text">It’s a system.</em></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"className":"tr-framework__lead","style":{"typography":{"fontSize":"1.05rem","lineHeight":"1.55"},"color":{"text":"#3c4048"}}} -->
		<p class="tr-framework__lead has-text-color" style="color:#3c4048;font-size:1.05rem;line-height:1.55">Every engagement follows the same four-stage cycle. YouTube is our proven foundation,<br>and it works alongside search, AI and third-party authority. What we learn in each cycle<br>shapes the next one.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<div class="tr-framework__grid">
		<article class="tr-framework-card">
			<span class="tr-framework-card__num">1</span>
			<h3 class="tr-framework-card__title">Understand demand</h3>
			<p class="tr-framework-card__text">Research the questions buyers ask on YouTube, Google and AI, and who shows up instead of the brand.</p>
		</article>
		<article class="tr-framework-card">
			<span class="tr-framework-card__num">2</span>
			<h3 class="tr-framework-card__title">Build authority</h3>
			<p class="tr-framework-card__text">YouTube content strategy and optimization, plus content built to be found and cited.</p>
		</article>
		<article class="tr-framework-card">
			<span class="tr-framework-card__num">3</span>
			<h3 class="tr-framework-card__title">Expand discovery</h3>
			<p class="tr-framework-card__text">Google search visibility, AI discoverability, Reddit and other third-party authority platforms, content distribution and audience engagement.</p>
		</article>
		<article class="tr-framework-card tr-framework-card--cycle">
			<span class="tr-framework-card__num">4</span>
			<h3 class="tr-framework-card__title">Measure and learn</h3>
			<p class="tr-framework-card__text">Measurement and ongoing optimization, feeding the next cycle.</p>
		</article>
	</div>

	<div class="tr-framework-callout">
		<span class="tr-framework-callout__icon" aria-hidden="true">
			<svg class="tr-framework-card__fa-rotate-right" width="20" height="20" viewBox="0 0 512 512" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M463.5 224h8.5c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8h119.5z"/></svg>
		</span>
		<p class="tr-framework-callout__text">What we learn in <strong>Measure and learn</strong> feeds straight back into <strong>Understand demand</strong>, so every cycle starts smarter than the last.</p>
	</div>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"},"color":{"background":"#f6f1e7"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" id="results" style="background-color:#f6f1e7;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"tr-results-intro","layout":{"type":"default"}} -->
	<div class="wp-block-group tr-results-intro">
		<!-- wp:group {"className":"tr-results-intro__row","layout":{"type":"default"}} -->
		<div class="wp-block-group tr-results-intro__row">
			<!-- wp:group {"className":"tr-section-intro tr-results-intro__copy","layout":{"type":"default"}} -->
			<div class="wp-block-group tr-section-intro tr-results-intro__copy">
				<!-- wp:html -->
				<h2 class="wp-block-heading tr-results-intro__heading" style="font-size:clamp(2rem, 4vw, 3rem)"><span class="tr-results-intro__heading-line"><span class="tr-results-intro__proof-segment">Proof in YouTube.</span><span class="tr-results-intro__evidence-stack"><span class="tr-results-intro__evidence-text"> Evidence in AI.</span><span class="tr-kat-claim-badge tr-kat-claim-badge--under-evidence">Kat claim</span></span></span></h2>
				<!-- /wp:html -->

				<!-- wp:paragraph {"className":"tr-results-intro__lead","style":{"color":{"text":"#a6a8b1"}}} -->
				<p class="tr-results-intro__lead has-text-color" style="color:#3c4048;font-weight:500">Growth on YouTube and in search, impact on the business, and presence in AI answers.<br class="tr-br-desktop"> Client names are anonymized, and every number shows its period.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"tr-results-intro__link"} -->
			<p class="tr-results-intro__link"><a class="tr-learn-more" href="/case-studies/">See all results →</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.25rem"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-proof-card","style":{"spacing":{"padding":{"top":"1.6rem","right":"1.4rem","bottom":"1.6rem","left":"1.4rem"},"blockGap":"0.7rem"},"color":{"background":"#fffdf8"},"border":{"radius":"12px","width":"1px","color":"#c8bfab"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-proof-card has-background" style="border-color:#c8bfab;border-width:1px;border-radius:12px;background-color:#fffdf8;padding-top:1.6rem;padding-right:1.4rem;padding-bottom:1.6rem;padding-left:1.4rem">
				<!-- wp:paragraph {"className":"tr-proof-step"} -->
				<p class="tr-proof-step">1. YouTube growth</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-client","style":{"color":{"text":"#121212"}}} -->
				<p class="tr-proof-client has-text-color" style="color:#121212">Pet Technology Brand</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-meta"} -->
				<p class="tr-proof-meta">2025 · [Client OK pending]</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="tr-proof-metrics">
					<div class="tr-proof-metric">
						<div class="tr-proof-metric__value">+70.9%</div>
						<div class="tr-proof-metric__label">YouTube subscribers</div>
					</div>
					<div class="tr-proof-metric">
						<div class="tr-proof-metric__value">+73%</div>
						<div class="tr-proof-metric__label">Google Search traffic to the channel</div>
					</div>
					<div class="tr-proof-metric">
						<div class="tr-proof-metric__value">+42.5%</div>
						<div class="tr-proof-metric__label">YouTube Search traffic</div>
					</div>
					<div class="tr-proof-metric">
						<div class="tr-proof-metric__value">500+</div>
						<div class="tr-proof-metric__label">Search keywords sending views</div>
					</div>
				</div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-proof-card__foot"} -->
				<p class="tr-proof-card__foot"><a class="tr-learn-more" href="/case-studies/">See the full result</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-proof-card","style":{"spacing":{"padding":{"top":"1.6rem","right":"1.4rem","bottom":"1.6rem","left":"1.4rem"},"blockGap":"0.7rem"},"color":{"background":"#fffdf8"},"border":{"radius":"12px","width":"1px","color":"#c8bfab"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-proof-card has-background" style="border-color:#c8bfab;border-width:1px;border-radius:12px;background-color:#fffdf8;padding-top:1.6rem;padding-right:1.4rem;padding-bottom:1.6rem;padding-left:1.4rem">
				<!-- wp:paragraph {"className":"tr-proof-step"} -->
				<p class="tr-proof-step">2. Business impact</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-client","style":{"color":{"text":"#121212"}}} -->
				<p class="tr-proof-client has-text-color" style="color:#121212">Adult Health &amp; Wellness Company</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-meta"} -->
				<p class="tr-proof-meta">[Measurement period]</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="tr-proof-pending" aria-label="Result pending approval">[Result pending approval]</div>
				<!-- /wp:html -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-proof-card","style":{"spacing":{"padding":{"top":"1.6rem","right":"1.4rem","bottom":"1.6rem","left":"1.4rem"},"blockGap":"0.7rem"},"color":{"background":"#fffdf8"},"border":{"radius":"12px","width":"1px","color":"#c8bfab"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-proof-card has-background" style="border-color:#c8bfab;border-width:1px;border-radius:12px;background-color:#fffdf8;padding-top:1.6rem;padding-right:1.4rem;padding-bottom:1.6rem;padding-left:1.4rem">
				<!-- wp:paragraph {"className":"tr-proof-step"} -->
				<p class="tr-proof-step">3. AI visibility</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-client","style":{"color":{"text":"#121212"}}} -->
				<p class="tr-proof-client has-text-color" style="color:#121212">Pet Technology Creator Program</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-meta"} -->
				<p class="tr-proof-meta">June 2026 · [Client OK pending]</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="tr-metric-big tr-metric-big--serif tr-proof-ai-metric">256</div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-proof-ai-summary"} -->
				<p class="tr-proof-ai-summary">AI citations of review videos we optimized, in a single month. Up 40% from 183 in May. Counted by an outside AI visibility tool.</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-proof-card__foot"} -->
				<p class="tr-proof-card__foot"><a class="tr-learn-more" href="/ai-discovery/#measure">How we measure AI visibility</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:html -->
<div class="tr-section-fade tr-section-fade--results-rent" role="presentation" aria-hidden="true"></div>
<!-- /wp:html -->

<!-- wp:group {"metadata":{"name":"Rent attention"},"align":"full","className":"tr-rent-attention","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#ffffff","text":"#121212"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group tr-rent-attention alignfull has-text-color has-background" style="color:#121212;background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"tr-rent-attention__grid","layout":{"type":"default"}} -->
	<div class="wp-block-group tr-rent-attention__grid">
		<!-- wp:group {"className":"tr-rent-attention__head","layout":{"type":"default"}} -->
		<div class="wp-block-group tr-rent-attention__head">
			<!-- wp:heading {"className":"tr-display"} -->
			<h2 class="wp-block-heading tr-display">Rent attention.<br>Own discovery.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"tr-rent-attention__body-row","layout":{"type":"default"}} -->
		<div class="wp-block-group tr-rent-attention__body-row">
			<!-- wp:group {"className":"tr-rent-attention__copy","layout":{"type":"default"}} -->
			<div class="wp-block-group tr-rent-attention__copy">
				<!-- wp:paragraph {"className":"tr-rent-attention__body"} -->
				<p class="tr-rent-attention__body">Advertising stops generating traffic when you stop paying. Strong discovery assets keep attracting customers long after they’re created.</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"tr-rent-attention__cta-wrap"} -->
				<p class="tr-rent-attention__cta-wrap"><a class="tr-rent-attention__cta" href="#assessment">Find out what your library could earn</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"tr-rent-attention__chart","layout":{"type":"default"}} -->
			<div class="wp-block-group tr-rent-attention__chart">
				<!-- wp:group {"metadata":{"name":"Chart card"},"className":"tr-rent-attention__card","layout":{"type":"default"}} -->
				<div class="wp-block-group tr-rent-attention__card">
					<!-- wp:image {"sizeSlug":"full","linkDestination":"none","className":"tr-rent-attention-chart"} -->
					<figure class="wp-block-image size-full tr-rent-attention-chart"><img src="<?php echo esc_url( $uri ); ?>/assets/images/rent-attention-chart.png" alt="Conceptual chart: paid attention rises and falls with spend while discovery assets build over time." loading="lazy" decoding="async"/></figure>
					<!-- /wp:image -->

					<!-- wp:paragraph {"className":"tr-rent-attention__chart-note tr-chart__fine-print"} -->
					<p class="tr-rent-attention__chart-note tr-chart__fine-print">Conceptual illustration, not actual performance data.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:html -->
	<div class="tr-rent-attention__stat">
		<div class="tr-rent-attention-stat__num" aria-hidden="true">450,635</div>
		<div class="tr-rent-attention-stat__copy">
			<p class="tr-rent-attention-stat__lead">Since our team began in August 2023, a Pet Technology Brand’s channel has earned 450,635 views<br>from Google Search, about 23 times the 19,640 it earned in all prior years. <span class="tr-kat-claim-badge tr-kat-claim-badge--after-pending">Kat claim</span></p>
			<p class="tr-rent-attention-stat__meta">Pet Technology Brand · Aug 2023 to Jan 2026 · [Client OK pending]</p>
		</div>
	</div>
	<!-- /wp:html -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"tr-established","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#f5f5f5"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull tr-established has-background" style="background-color:rgb(245 245 245 / 70%);margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"tr-established__title-grid","layout":{"type":"default"}} -->
	<div class="wp-block-group tr-established__title-grid">
		<!-- wp:heading {"className":"tr-established__title"} -->
		<h2 class="wp-block-heading tr-established__title">Built for established<br>brands ready to own their<br>discovery.</h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->
	<!-- wp:columns {"className":"tr-established__columns","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns tr-established__columns">
		<!-- wp:column {"width":"50%"} -->
		<div class="wp-block-column" style="flex-basis:50%">
			<!-- wp:paragraph -->
			<p>We work with established companies whose customers research, compare and evaluate before buying. Our founders have studied how buyers find brands since 2007.</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>Most of our clients generate roughly $10 million to $150 million in annual revenue, but the right fit matters more than the number.</p>
			<!-- /wp:paragraph -->
			<!-- wp:html -->
			<hr class="tr-established__divider" aria-hidden="true" />
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"tr-established__industries"} -->
			<p class="tr-established__industries">Working with established brands in pet technology, home water filtration, air purification and trade shows. <span class="tr-established__pending">[Client OK pending]</span></p>
			<!-- /wp:paragraph -->
			<!-- wp:html -->
			<div class="tr-established__kat-claim-wrap"><span class="tr-kat-claim-badge tr-kat-claim-badge--established-note">Kat claims: moved away from the logos</span></div>
			<!-- /wp:html -->
			<!-- wp:paragraph {"className":"tr-established__industries"} -->
			<p class="tr-established__industries">A Global Trade Show Organizer engaged TurboRank to run creator-led marketing and Authority Engine programs for three of its 2027 trade shows. <span class="tr-established__pending">[Client OK pending]</span></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"50%","className":"tr-established__card-col"} -->
		<div class="wp-block-column tr-established__card-col" style="flex-basis:50%">
			<!-- wp:group {"className":"tr-established__card","layout":{"type":"default"}} -->
			<div class="wp-block-group tr-established__card">
				<!-- wp:heading {"level":3} -->
				<h3 class="wp-block-heading">Does your buyer need to learn, investigate, compare, see, understand or trust something before they buy?</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-established__card-lead"} -->
				<p class="tr-established__card-lead">If so, discovery decides who makes the shortlist.</p>
				<!-- /wp:paragraph -->
				<!-- wp:html -->
				<hr class="tr-established__card-divider" aria-hidden="true" />
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-established__card-note"} -->
				<p class="tr-established__card-note">Growing a personal creator channel? We’re probably not the right fit.</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"tr-faq","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#ffffff"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull tr-faq has-background" id="faq" style="background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"34%"} -->
		<div class="wp-block-column" style="flex-basis:34%">
			<!-- wp:group {"className":"tr-faq__intro","style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-faq__intro">
				<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)"}}} -->
				<h2 class="wp-block-heading" style="font-size:clamp(2rem, 4vw, 3rem)">Frequently asked questions</h2>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"style":{"color":{"text":"#595c66"}}} -->
				<p class="has-text-color" style="color:#595c66">Straight answers to what buyers ask us most.</p>
				<!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"tr-faq__see-all"} -->
				<p class="tr-faq__see-all"><a href="/faq/">See all questions</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"66%"} -->
		<div class="wp-block-column" style="flex-basis:66%">
			<!-- wp:group {"className":"tr-faq__list","layout":{"type":"default"}} -->
			<div class="wp-block-group tr-faq__list">
				<!-- wp:group {"className":"tr-faq__item","layout":{"type":"default"}} -->
				<div class="wp-block-group tr-faq__item">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.05rem","fontStyle":"normal","fontWeight":"700"}}} -->
					<h3 class="wp-block-heading" style="font-size:1.05rem;font-style:normal;font-weight:700">What happens in a Discovery Session?</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph -->
					<p>A free 30-minute call. Before we meet, our team researches how buyers find your brand. On the call, you get where buyers find you on YouTube and where competitors win instead, the videos you already have that aren’t working for you, and your top 3 moves, prepared for your brand and yours to keep. <a href="<?php echo esc_url( turborank_discovery_session_url() ); ?>">Book a time</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"tr-faq__item","layout":{"type":"default"}} -->
				<div class="wp-block-group tr-faq__item">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.05rem","fontStyle":"normal","fontWeight":"700"}}} -->
					<h3 class="wp-block-heading" style="font-size:1.05rem;font-style:normal;font-weight:700">Is TurboRank a YouTube agency or an AI visibility agency?</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph -->
					<p>Neither. TurboRank is a discovery company. YouTube is our proven foundation, and our founders have worked on it since 2007. We work across AI answers, YouTube, Google search and third-party sources together, because buyers move between all of them.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"tr-faq__item","layout":{"type":"default"}} -->
				<div class="wp-block-group tr-faq__item">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.05rem","fontStyle":"normal","fontWeight":"700"}}} -->
					<h3 class="wp-block-heading" style="font-size:1.05rem;font-style:normal;font-weight:700">What is AI discovery?</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph -->
					<p>AI discovery is how often AI assistants like ChatGPT, Gemini, Perplexity and Google’s AI Overviews mention your brand when buyers ask questions in your category. TurboRank measures it with two metrics: Discovery Share and Citation Share.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"tr-faq__item","layout":{"type":"default"}} -->
				<div class="wp-block-group tr-faq__item">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.05rem","fontStyle":"normal","fontWeight":"700"}}} -->
					<h3 class="wp-block-heading" style="font-size:1.05rem;font-style:normal;font-weight:700">Can anyone guarantee that AI recommends my brand?</h3>
					<!-- /wp:heading -->
					<!-- wp:paragraph -->
					<p>No. No one controls AI answers, and we don’t pretend to. We measure where you appear, improve the content and sources AI answers draw on, and report what changed.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|40"},"color":{"background":"#f6f1e7"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group alignfull has-background" id="insights" style="background-color:#f6f1e7;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"className":"tr-insights-intro","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group tr-insights-intro">
		<!-- wp:group {"className":"tr-section-intro","style":{"spacing":{"blockGap":"1.25rem"}},"layout":{"type":"default"}} -->
		<div class="wp-block-group tr-section-intro">
			<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(2rem, 4vw, 3rem)"}}} -->
			<h2 class="wp-block-heading" style="font-size:clamp(2rem, 4vw, 3rem)">Research &amp; insights from<br>TurboRank</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"tr-insights-intro__lead","style":{"color":{"text":"#3c4048"}}} -->
			<p class="has-text-color tr-insights-intro__lead" style="color:#3c4048">What we’re learning about how customers find and choose brands across AI<br class="tr-br-desktop"> answers, YouTube and search.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- wp:paragraph {"className":"tr-insights-intro__link"} -->
		<p class="tr-insights-intro__link"><a class="tr-learn-more" href="/insights/">All research &amp; insights →</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"1.25rem"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-research-card","style":{"spacing":{"blockGap":"0.7rem"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-research-card">
				<!-- wp:html -->
				<div class="tr-insight-card__media tr-insight-media-frame"><?php turborank_render_insight_card_image( turborank_insight_thumb_src( 'card-growth-market-share' ), 'Why you’re losing market share — AI discoverability and digital authority' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-cat"} -->
				<p class="tr-cat">Growth Strategy</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"className":"tr-research-card__title"} -->
				<h3 class="wp-block-heading tr-research-card__title">Why You’re Losing Market Share and Don’t Even Know It</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-research-card__meta","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#595c66"}}} -->
				<p class="tr-research-card__meta has-text-color" style="color:#595c66;font-size:0.85rem">By Matthew Pearce, August 23, 2026</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-research-card","style":{"spacing":{"blockGap":"0.7rem"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-research-card">
				<!-- wp:html -->
				<div class="tr-insight-card__media tr-insight-media-frame"><?php turborank_render_insight_card_image( turborank_insight_thumb_src( 'card-ai-visibility-cac' ), 'AI Visibility for Ecommerce — the authority gap quietly inflating your CAC' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-cat"} -->
				<p class="tr-cat">AI Visibility</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"className":"tr-research-card__title"} -->
				<h3 class="wp-block-heading tr-research-card__title">AI Visibility for Ecommerce: The Authority Gap Quietly Inflating Your CAC</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-research-card__meta","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#595c66"}}} -->
				<p class="tr-research-card__meta has-text-color" style="color:#595c66;font-size:0.85rem">By Matthew Pearce, July 12, 2026</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"tr-research-card","style":{"spacing":{"blockGap":"0.7rem"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-research-card">
				<!-- wp:html -->
				<div class="tr-insight-card__media tr-insight-media-frame"><?php turborank_render_insight_card_image( turborank_insight_thumb_src( 'card-authority-framework' ), 'Be the Trusted Answer — How to Build Digital Authority' ); ?></div>
				<!-- /wp:html -->
				<!-- wp:paragraph {"className":"tr-cat"} -->
				<p class="tr-cat">Brand Authority</p>
				<!-- /wp:paragraph -->
				<!-- wp:heading {"level":3,"className":"tr-research-card__title"} -->
				<h3 class="wp-block-heading tr-research-card__title">How to Build Digital Authority: A 5-Part Framework</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"className":"tr-research-card__meta","style":{"typography":{"fontSize":"0.85rem"},"color":{"text":"#595c66"}}} -->
				<p class="tr-research-card__meta has-text-color" style="color:#595c66;font-size:0.85rem">By Matthew Pearce, August 30, 2026</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","className":"tr-assessment-cta","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#ffffff","text":"#121212"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
<div class="wp-block-group tr-assessment-cta alignfull has-text-color has-background" id="assessment" style="color:#121212;background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns">
		<!-- wp:column {"width":"58%"} -->
		<div class="wp-block-column" style="flex-basis:58%">
			<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(2.1rem, 4.5vw, 3.35rem)","fontWeight":"500","lineHeight":"1.08"},"color":{"text":"#ffffff"}}} -->
			<h2 class="wp-block-heading has-text-color" style="color:#ffffff;font-size:clamp(2.1rem, 4.5vw, 3.35rem);font-weight:500;line-height:1.08">Your competitors are being discovered.<br><em class="tr-italic tr-accent-text">Are you?</em></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"tr-assessment-lead","style":{"color":{"text":"#ffffff"},"typography":{"fontSize":"1rem","lineHeight":"1.55"}}} -->
			<p class="tr-assessment-lead has-text-color" style="color:#ffffff;font-size:1rem;line-height:1.55">Find out where buyers find your brand on YouTube, where competitors win instead, and what to do first.</p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons {"className":"tr-btn-row tr-assessment-actions","style":{"spacing":{"margin":{"top":"1.5rem"}}}} -->
			<div class="wp-block-buttons tr-btn-row tr-assessment-actions" style="margin-top:1.5rem">
				<!-- wp:button {"className":"tr-btn-primary"} -->
				<div class="wp-block-button tr-btn-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo $discovery_session_url; ?>">Book a Discovery Session</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
			<!-- wp:paragraph {"className":"tr-assessment-contact","style":{"typography":{"fontSize":"0.875rem","lineHeight":"1.5"},"color":{"text":"#ffffff"},"spacing":{"margin":{"top":"1rem"}}}} -->
			<p class="tr-assessment-contact has-text-color" style="color:#ffffff;margin-top:1rem;font-size:0.875rem;line-height:1.5">Or call <a href="tel:5105215100">(510) 521-5100</a> or email <a href="mailto:hello@turborank.co">hello@turborank.co</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"42%","className":"tr-assessment-card-col"} -->
		<div class="wp-block-column tr-assessment-card-col" style="flex-basis:42%">
			<!-- wp:group {"className":"tr-assessment-card","style":{"spacing":{"padding":{"top":"1.85rem","right":"1.65rem","bottom":"1.85rem","left":"1.65rem"}},"color":{"background":"#fffdf8"},"border":{"radius":"14px","width":"1px","color":"#c8bfab"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group tr-assessment-card has-background" style="border-color:#c8bfab;border-width:1px;border-radius:14px;background-color:#fffdf8;padding-top:1.85rem;padding-right:1.65rem;padding-bottom:1.85rem;padding-left:1.65rem">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"1.125rem","fontWeight":"700","fontFamily":"var(--wp--preset--font-family--sans)"},"color":{"text":"#1a1a1a"}}} -->
				<h3 class="wp-block-heading has-text-color" style="color:#1a1a1a;font-size:1.125rem;font-family:var(--wp--preset--font-family--sans);font-weight:700">What you get in your Discovery Session</h3>
				<!-- /wp:heading -->
				<!-- wp:list {"className":"tr-assessment-include","style":{"color":{"text":"#1a1a1a"}}} -->
				<ul class="wp-block-list tr-assessment-include has-text-color" style="color:#1a1a1a">
					<li>Where buyers find you on YouTube, and where competitors win&nbsp;instead</li>
					<li>The videos you already have that aren't working for you</li>
					<li>Your top 3 moves, prepared for your brand and yours to keep</li>
				</ul>
				<!-- /wp:list -->
				<!-- wp:paragraph {"className":"tr-assessment-card__foot","style":{"typography":{"fontSize":"0.825rem","lineHeight":"1.55"},"color":{"text":"#6b6d74"}}} -->
				<p class="tr-assessment-card__foot has-text-color" style="color:#6b6d74;font-size:0.825rem;line-height:1.55">30 minutes · Prepared in advance · For established brands. <a href="/discovery-snapshot/" target="_blank" rel="noopener noreferrer">See a sample snapshot</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
