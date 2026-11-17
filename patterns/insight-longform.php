<?php
/**
 * Title: Insight article — longform (TOC + Discovery)
 * Slug: turborank/insight-longform
 * Categories: turborank
 * Inserter: no
 *
 * @package TurboRank
 */

$slug    = get_post_field( 'post_name', get_queried_object_id() );
$article = function_exists( 'turborank_get_insight_article' ) ? turborank_get_insight_article( $slug ) : null;

if ( ! $article ) {
	echo '<!-- wp:paragraph --><p>Article not found.</p><!-- /wp:paragraph -->';
	return;
}

if ( function_exists( 'turborank_render_insight_longform_page' ) ) {
	turborank_render_insight_longform_page( $article );
}
