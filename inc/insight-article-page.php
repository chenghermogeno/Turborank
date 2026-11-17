<?php
/**
 * Single Insights article page.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the current insight article page.
 */
function turborank_render_insight_article_page() {
	$slug    = get_post_field( 'post_name', get_queried_object_id() );
	$article = turborank_get_insight_article( $slug );

	if ( ! $article ) {
		echo '<!-- wp:paragraph --><p>Article not found.</p><!-- /wp:paragraph -->';
		return;
	}

	$page_id   = get_queried_object_id();
	$template  = $page_id ? get_page_template_slug( $page_id ) : '';
	$longform  = is_string( $template ) && false !== strpos( $template, 'insight-longform' );
	if ( $longform && function_exists( 'turborank_render_insight_longform_page' ) ) {
		turborank_render_insight_longform_page( $article );
		return;
	}

	$author_url = turborank_insight_author_url();

	turborank_service_open( 'tr-insights tr-insight-article', '#ffffff', '#121212' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><a href="/insights/">Insights</a> &nbsp;/&nbsp; <?php echo esc_html( $article['title'] ); ?></span></p>
	<h1 class="tr-insight-article__cat"><?php echo esc_html( $article['category'] ); ?></h1>
	<h2><?php echo esc_html( $article['title'] ); ?></h2>
	<p class="tr-insight-article__meta">By <a href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_html( $article['author'] ); ?></a>, <?php echo esc_html( $article['date'] ); ?></p>
	<div class="tr-insight-article__hero tr-insight-media-frame">
		<?php turborank_render_insight_card_image( turborank_insight_thumb_src( $article['thumb'] ) ); ?>
	</div>
	<div class="tr-insight-article__content">
		<p class="tr-insight-article__deck"><?php echo esc_html( $article['excerpt'] ); ?></p>
		<?php foreach ( $article['body'] as $paragraph ) : ?>
			<p><?php echo esc_html( $paragraph ); ?></p>
		<?php endforeach; ?>
	</div>
	<div class="tr-insight-article__author-box">
		<img src="<?php echo esc_url( turborank_insight_thumb_src( 'featured' ) ); ?>" alt="<?php echo esc_attr( $article['author'] ); ?>" width="96" height="96">
		<div>
			<p class="tr-eyebrow" style="margin-bottom:0.35rem">Author</p>
			<h2 style="font-size:1.5rem;margin:0 0 0.35rem"><a href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_html( $article['author'] ); ?></a></h2>
			<p>Co-founder, TurboRank. Matthew has helped brands grow on YouTube since 2007 and writes about YouTube search, AI discoverability and brand authority.</p>
			<p><a class="tr-insights-link" href="<?php echo esc_url( $author_url ); ?>">View author profile</a></p>
		</div>
	</div>
	<p><a class="tr-insights-link" href="/insights/">← Back to Insights</a></p>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_insights_video_cta();
}
