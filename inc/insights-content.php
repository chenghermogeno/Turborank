<?php
/**
 * Shared Insights article data.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Insight URL for a child page slug.
 *
 * @param string $slug Page slug.
 * @return string
 */
function turborank_insight_url( $slug ) {
	return home_url( '/insights/' . $slug . '/' );
}

/**
 * Author profile URL.
 *
 * @param string $slug Author slug.
 * @return string
 */
function turborank_insight_author_url( $slug = 'matthew-pearce' ) {
	return home_url( '/insights/' . $slug . '/' );
}

/**
 * When true, insight list/featured blocks render without article URLs (mockups / WIP pages).
 *
 * @return bool
 */
function turborank_insights_presentation_mode() {
	return (bool) apply_filters( 'turborank_insights_presentation_mode', true );
}

/**
 * Open an article link or static wrapper for presentation mode.
 *
 * @param string $slug  Article slug.
 * @param string $class CSS classes.
 * @return string
 */
function turborank_insights_article_link_open( $slug, $class ) {
	if ( turborank_insights_presentation_mode() ) {
		return '<span class="' . esc_attr( $class ) . ' tr-insights-article-static">';
	}

	return '<a class="' . esc_attr( $class ) . '" href="' . esc_url( turborank_insight_url( $slug ) ) . '">';
}

/**
 * Close an article link or static wrapper.
 *
 * @return string
 */
function turborank_insights_article_link_close() {
	return turborank_insights_presentation_mode() ? '</span>' : '</a>';
}

/**
 * YouTube short thumbnails for Insights “Prefer video?” band.
 *
 * @return array<int, array<string, string>>
 */
function turborank_insights_video_shorts() {
	$images = get_template_directory_uri() . '/assets/images/';
	$search = 'https://www.youtube.com/results?search_query=TurboRank+';

	return array(
		array(
			'image' => $images . 'insights-video-appear-chatgpt.png',
			'alt'   => 'Appear in ChatGPT',
			'href'  => $search . 'Appear+in+ChatGPT',
		),
		array(
			'image' => $images . 'insights-video-authority-economy.png',
			'alt'   => 'The Authority Economy',
			'href'  => $search . 'Authority+Economy',
		),
		array(
			'image' => $images . 'insights-video-ai-discoverability.png',
			'alt'   => 'AI discoverability and the buyer journey',
			'href'  => $search . 'AI+discoverability',
		),
		array(
			'image' => $images . 'insights-video-ai-seo-mastery.png',
			'alt'   => 'YouTube A.I. SEO Mastery',
			'href'  => $search . 'YouTube+AI+SEO',
		),
	);
}

/**
 * Thumbnail path for an insight card.
 *
 * Static files in assets/images should be exported at TURBORANK_INSIGHT_CARD_WIDTH×TURBORANK_INSIGHT_CARD_HEIGHT
 * (see inc/insight-images.php). The front end crops via .tr-insight-media-frame.
 *
 * @param string $thumb Thumb key.
 * @return string
 */
function turborank_insight_thumb_src( $thumb ) {
	$uri  = get_template_directory_uri() . '/assets/images/';
	$dir  = get_template_directory() . '/assets/images/';
	$map  = array(
		'featured'                 => 'insights-featured-youtube-seo.png',
		'card-authority-framework' => 'insights-card-authority-framework.png',
		'card-growth-market-share' => 'insights-card-growth-market-share.png',
		'card-authority-trust'     => 'insights-card-authority-trust.png',
		'card-brand-vs-ads'        => 'insights-card-brand-vs-ads.png',
		'card-ai-visibility-cac'   => 'insights-card-ai-visibility-cac.png',
		'card-views-to-revenue'    => 'insights-card-views-to-revenue.png',
		'card-youtube-search'      => 'insights-card-youtube-search-strategy.png',
		'card-youtube-roi'         => 'insights-card-youtube-roi.png',
		'card-case-study-leader'   => 'insights-card-case-study-leader.png',
		'youtube'                  => 'research-youtube.svg',
		'brand-authority'          => 'research-authority.svg',
		'ai'                       => 'research-ai.svg',
		'growth'                   => 'chart.svg',
		'case-study'               => 'chart.svg',
	);
	$file = isset( $map[ $thumb ] ) ? $map[ $thumb ] : $map['youtube'];
	$url  = $uri . $file;
	$path = $dir . $file;
	if ( file_exists( $path ) ) {
		$url .= '?ver=' . filemtime( $path );
	}
	return $url;
}

/**
 * All Insights articles keyed by slug.
 *
 * @return array<string, array<string, mixed>>
 */
function turborank_insights_articles() {
	return array(
		'youtube-seo-services-established-brands' => array(
			'slug'     => 'youtube-seo-services-established-brands',
			'featured' => true,
			'category' => 'YouTube SEO',
			'filter'   => 'youtube-seo',
			'date'     => 'September 6, 2026',
			'title'    => 'What YouTube SEO Services Should Include for Established Brands',
			'excerpt'  => 'Real YouTube SEO isn’t titles and tags with better keywords sprinkled on top. It starts with what people are actually searching for, checks who’s beating you, and builds a strategy that grows your authority.',
			'thumb'    => 'featured',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Established brands rarely start from zero on YouTube. The challenge is making a large library visible for the searches and questions that actually precede a purchase.',
				'Strong YouTube SEO services should audit what you already have, map buyer intent to titles and chapters, improve packaging for click-through, and connect publishing to search, suggested video and AI citation opportunities.',
				'Measurement matters too: impressions from search, subscriber quality, watch time on high-intent videos, and whether your videos appear in Google results and AI answers for category questions.',
			),
		),
		'digital-authority-5-part-framework'      => array(
			'slug'     => 'digital-authority-5-part-framework',
			'category' => 'Brand Authority',
			'filter'   => 'brand-authority',
			'date'     => 'August 30, 2026',
			'title'    => 'How to Build Digital Authority: A 5-Part Framework',
			'excerpt'  => 'A practical, five-part system to build authority, create helpful content and show up where it matters.',
			'thumb'    => 'card-authority-framework',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Digital authority is the footprint buyers and AI tools recognize when they compare options in your category.',
				'This framework walks through demand research, source development, consistent publishing, third-party validation and measurement across search, YouTube and AI answers.',
			),
			'longform_sections' => array(
				array(
					'heading'    => __( 'Understand demand in your category', 'turborank' ),
					'paragraphs' => array(
						__( 'Start by documenting the questions buyers ask before they choose a vendor: search phrases, YouTube queries, and the prompts people use in AI assistants. Map those to stages of the journey so you know what “good” answers need to cover.', 'turborank' ),
						__( 'Compare your visibility to competitors on those questions. Gaps here tell you where authority work will move the needle first.', 'turborank' ),
					),
				),
				array(
					'heading'    => __( 'Develop sources AI and buyers already trust', 'turborank' ),
					'paragraphs' => array(
						__( 'List the domains, publishers, communities and formats that show up when your category is discussed. Prioritize places that both humans and AI systems cite.', 'turborank' ),
						__( 'Strengthen your presence there with accurate, consistent claims and helpful depth—not keyword stuffing. One strong, citable page often beats ten thin ones.', 'turborank' ),
					),
				),
				array(
					'heading'    => __( 'Publish and package for discovery', 'turborank' ),
					'paragraphs' => array(
						__( 'Turn demand research into a small set of flagship assets: articles, video, and landing pages that directly answer the questions you mapped. Align titles, thumbnails and structure with how people search and ask.', 'turborank' ),
						__( 'Reuse and atomize: one thorough piece can feed Shorts, chapters, FAQs and third-party summaries that reinforce the same story.', 'turborank' ),
					),
				),
				array(
					'heading'    => __( 'Earn third-party validation', 'turborank' ),
					'paragraphs' => array(
						__( 'Independent mentions—reviews, comparisons, community threads, and citations from neutral publishers—signal that your brand is a real option. Pursue the sources your buyers already read.', 'turborank' ),
						__( 'Where you participate on a client’s behalf, disclose it. Sustainable authority is built on what others can verify.', 'turborank' ),
					),
				),
				array(
					'heading'    => __( 'Measure across search, YouTube and AI answers', 'turborank' ),
					'paragraphs' => array(
						__( 'Track whether your brand appears in AI responses for your target prompts, whether AI cites your properties, and how search and YouTube performance move alongside that.', 'turborank' ),
						__( 'Report changes only when they clear normal variation—then tie those moves to the work you shipped so the next sprint stays focused.', 'turborank' ),
					),
				),
			),
		),
		'losing-market-share-ai-discoverability'  => array(
			'slug'     => 'losing-market-share-ai-discoverability',
			'category' => 'Growth Strategy',
			'filter'   => 'growth-strategy',
			'date'     => 'August 23, 2026',
			'title'    => 'Why You’re Losing Market Share and Don’t Even Know It',
			'excerpt'  => 'Most companies watch for competitive threats in ad channels, pipelines and quarterly reports. The biggest threat to market share today shows up in none of them.',
			'thumb'    => 'card-growth-market-share',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Buyers now ask AI assistants, search YouTube and scan Google before they ever fill out a form. If competitors own those answers, you can lose share without seeing it in last-click reports.',
			),
		),
		'digital-authority-more-important-than-advertising' => array(
			'slug'     => 'digital-authority-more-important-than-advertising',
			'category' => 'Brand Authority',
			'filter'   => 'brand-authority',
			'date'     => 'August 16, 2026',
			'title'    => 'Why Digital Authority Is More Important Than Advertising',
			'excerpt'  => 'For more than a century, businesses have competed for one thing: attention. Newspapers, radio, television, Google and Facebook each changed how it’s bought.',
			'thumb'    => 'card-authority-trust',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Paid media still matters, but authority compounds. When buyers trust your content and third-party sources cite you, discovery keeps working after the campaign ends.',
			),
		),
		'brand-authority-vs-paid-ads'             => array(
			'slug'     => 'brand-authority-vs-paid-ads',
			'category' => 'Brand Authority',
			'filter'   => 'brand-authority',
			'date'     => 'July 27, 2026',
			'title'    => 'Brand Authority vs Paid Ads: How Ecommerce Brands Reduce Ad Dependency',
			'excerpt'  => 'Paid ads create demand quickly, but they don’t create lasting authority. When the ad spend stops, the traffic often stops too.',
			'thumb'    => 'card-brand-vs-ads',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Ecommerce brands that invest in authority build organic demand through reviews, comparisons, video and educational content that keeps performing without daily spend.',
			),
		),
		'ai-visibility-ecommerce-cac'             => array(
			'slug'     => 'ai-visibility-ecommerce-cac',
			'category' => 'AI Visibility',
			'filter'   => 'ai-visibility',
			'date'     => 'July 12, 2026',
			'title'    => 'AI Visibility for Ecommerce: The Authority Gap Quietly Inflating Your CAC',
			'excerpt'  => 'There’s a moment in every ecommerce founder’s world when it becomes obvious the rules have changed.',
			'thumb'    => 'card-ai-visibility-cac',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'When AI answers recommend competitors first, paid ads work harder to close the gap. Closing the authority gap lowers acquisition cost over time.',
			),
		),
		'views-to-revenue-youtube'                => array(
			'slug'     => 'views-to-revenue-youtube',
			'category' => 'YouTube SEO',
			'filter'   => 'youtube-seo',
			'date'     => 'June 28, 2026',
			'title'    => 'From Views to Revenue: A Strategic Guide for Business Growth on YouTube',
			'excerpt'  => 'Views feel good, but revenue keeps the lights on. How to turn your YouTube channel into a reliable growth engine.',
			'thumb'    => 'card-views-to-revenue',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Revenue-focused YouTube programs tie content to buyer questions, track assisted conversions and optimize the library for search intent—not vanity metrics alone.',
			),
		),
		'youtube-search-strategy-stay-ahead'      => array(
			'slug'     => 'youtube-search-strategy-stay-ahead',
			'category' => 'YouTube SEO',
			'filter'   => 'youtube-seo',
			'date'     => 'June 14, 2026',
			'title'    => 'YouTube Search Strategy: How to Get Found and Stay Ahead',
			'excerpt'  => 'YouTube is the world’s second largest search engine. How to optimize your content to show up, stand out and stay ahead of competitors.',
			'thumb'    => 'card-youtube-search',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Search strategy starts with the questions buyers ask, then aligns titles, packaging, chapters and publishing cadence to win those queries consistently.',
			),
		),
		'measuring-youtube-roi-serious-brands'    => array(
			'slug'     => 'measuring-youtube-roi-serious-brands',
			'category' => 'Growth Strategy',
			'filter'   => 'growth-strategy',
			'date'     => 'May 28, 2026',
			'title'    => 'Measuring What Matters: YouTube ROI for Serious Brands',
			'excerpt'  => 'Go beyond vanity metrics. Which YouTube metrics actually affect business growth, and how to track them the right way.',
			'thumb'    => 'card-youtube-roi',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'Serious brands connect YouTube data to pipeline, revenue and branded search lift—not just views and subscribers in isolation.',
			),
		),
		'case-study-niche-channel-market-leader'  => array(
			'slug'     => 'case-study-niche-channel-market-leader',
			'category' => 'Case Studies',
			'filter'   => 'case-studies',
			'date'     => 'May 12, 2026',
			'title'    => 'Case Study: From Niche Channel to Market Leader',
			'excerpt'  => 'How a niche-market brand used YouTube to build authority, grow organic reach and capture market share in a competitive industry.',
			'thumb'    => 'card-case-study-leader',
			'author'   => 'Matthew Pearce',
			'body'     => array(
				'This documented example shows how sustained publishing, search optimization and authority building moved a niche channel into a category leadership position.',
			),
		),
	);
}

/**
 * Lookup one article by slug.
 *
 * @param string $slug Article slug.
 * @return array<string, mixed>|null
 */
function turborank_get_insight_article( $slug ) {
	$articles = turborank_insights_articles();
	return isset( $articles[ $slug ] ) ? $articles[ $slug ] : null;
}

/**
 * Render a grid/list insight card.
 *
 * @param array<string, mixed> $article Article data.
 * @param bool                 $compact Compact card (author page).
 * @return string
 */
function turborank_insight_card( $article, $compact = false ) {
	$slug   = $article['slug'];
	$class  = $compact ? 'tr-insight-card tr-insight-card--compact' : 'tr-insight-card';
	$filter = isset( $article['filter'] ) ? $article['filter'] : '';

	$html  = '<article class="' . esc_attr( $class ) . '" data-filter="' . esc_attr( $filter ) . '">';
	$html .= turborank_insights_article_link_open( $slug, 'tr-insight-card__media tr-insight-media-frame' );
	ob_start();
	turborank_render_insight_card_image( turborank_insight_thumb_src( $article['thumb'] ) );
	$html .= ob_get_clean();
	$html .= turborank_insights_article_link_close();
	$html .= '<div class="tr-insight-card__body">';
	$html .= '<p class="tr-insight-card__cat">' . esc_html( $article['category'] ) . '</p>';

	if ( turborank_insights_presentation_mode() ) {
		$html .= '<h3>' . esc_html( $article['title'] ) . '</h3>';
	} else {
		$html .= '<h3><a href="' . esc_url( turborank_insight_url( $slug ) ) . '">' . esc_html( $article['title'] ) . '</a></h3>';
	}

	if ( ! $compact ) {
		$html .= '<p class="tr-insight-card__excerpt">' . esc_html( $article['excerpt'] ) . '</p>';
		$html .= '<p class="tr-insight-card__meta"><span class="tr-insight-card__meta-text">By </span><a class="tr-insight-card__author" href="' . esc_url( turborank_insight_author_url() ) . '">' . esc_html( $article['author'] ) . '</a><span class="tr-insight-card__meta-text">, ' . esc_html( $article['date'] ) . '</span></p>';
	} else {
		$html .= '<p class="tr-insight-card__meta">' . esc_html( $article['date'] ) . '</p>';
	}

	$html .= '</div>';

	$html .= '</article>';
	return $html;
}
