<?php
/**
 * Long-form blog post layout (three columns: TOC, content, Discovery Session CTA).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output the “More like this” strip (Insights research cards).
 *
 * @param string $exclude_slug Optional article slug to omit from suggestions (e.g. current page).
 */
function turborank_render_longform_related_section( $exclude_slug = '' ) {
	turborank_service_open( 'tr-insights tr-blog-longform-related', turborank_section_mist_color(), '#121212' );
	ob_start();
	?>
	<div class="wp-block-group tr-insights-intro tr-blog-longform-related__intro">
		<div class="wp-block-group tr-section-intro">
			<h2 class="wp-block-heading"><?php esc_html_e( 'More like this', 'turborank' ); ?></h2>
			<p class="tr-insights-intro__lead"><?php esc_html_e( 'What we’re learning about how customers find and choose brands across AI answers, YouTube and search.', 'turborank' ); ?></p>
		</div>
		<p class="tr-insights-intro__link">
			<a class="tr-learn-more" href="<?php echo esc_url( home_url( '/insights/' ) ); ?>"><?php esc_html_e( 'All research & insights', 'turborank' ); ?> →</a>
		</p>
	</div>
	<div class="wp-block-columns tr-blog-longform-related__columns">
		<?php
		$insights_all  = function_exists( 'turborank_insights_articles' ) ? turborank_insights_articles() : array();
		$exclude_slug  = is_string( $exclude_slug ) ? $exclude_slug : '';
		$related_rows  = array();
		foreach ( $insights_all as $row ) {
			if ( ! empty( $row['featured'] ) ) {
				continue;
			}
			if ( $exclude_slug && isset( $row['slug'] ) && $row['slug'] === $exclude_slug ) {
				continue;
			}
			$related_rows[] = $row;
			if ( count( $related_rows ) >= 3 ) {
				break;
			}
		}
		if ( count( $related_rows ) < 3 && ! empty( $insights_all ) ) {
			foreach ( $insights_all as $row ) {
				if ( count( $related_rows ) >= 3 ) {
					break;
				}
				$slug = isset( $row['slug'] ) ? $row['slug'] : '';
				if ( $exclude_slug && $slug === $exclude_slug ) {
					continue;
				}
				$have = wp_list_pluck( $related_rows, 'slug' );
				if ( $slug && ! in_array( $slug, $have, true ) ) {
					$related_rows[] = $row;
				}
			}
		}
		if ( $related_rows ) :
			foreach ( $related_rows as $article ) :
				$slug   = isset( $article['slug'] ) ? $article['slug'] : '';
				$href   = ( $slug && function_exists( 'turborank_insight_url' ) ) ? turborank_insight_url( $slug ) : '#';
				$title  = isset( $article['title'] ) ? $article['title'] : '';
				$cat    = isset( $article['category'] ) ? $article['category'] : '';
				$author = isset( $article['author'] ) ? $article['author'] : '';
				$date   = isset( $article['date'] ) ? $article['date'] : '';
				$thumb  = ( isset( $article['thumb'] ) && function_exists( 'turborank_insight_thumb_src' ) ) ? turborank_insight_thumb_src( $article['thumb'] ) : '';
				?>
		<div class="wp-block-column">
			<a class="tr-research-card tr-blog-longform-related__card-link" href="<?php echo esc_url( $href ); ?>">
				<div class="tr-insight-card__media tr-insight-media-frame">
					<?php
					if ( $thumb && function_exists( 'turborank_render_insight_card_image' ) ) {
						turborank_render_insight_card_image( $thumb, $title );
					}
					?>
				</div>
				<p class="tr-cat"><?php echo esc_html( $cat ); ?></p>
				<h3 class="wp-block-heading tr-research-card__title"><?php echo esc_html( $title ); ?></h3>
				<p class="tr-research-card__meta"><?php echo esc_html( sprintf( __( 'By %1$s, %2$s', 'turborank' ), $author, $date ) ); ?></p>
			</a>
		</div>
				<?php
			endforeach;
		else :
			?>
		<div class="wp-block-column tr-blog-longform-related__empty-wrap">
			<p class="tr-blog-longform-related__empty"><?php esc_html_e( 'More articles coming soon.', 'turborank' ); ?></p>
		</div>
		<?php endif; ?>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Inline script: build FAQ-style TOC from H2 headings in .tr-blog-longform-post-content.
 */
function turborank_render_longform_toc_script() {
	ob_start();
	?>
	<script>
	(function () {
		var container = document.getElementById('tr-blog-toc-links');
		if (!container) {
			return;
		}
		var scope = document.querySelector('.tr-blog-longform-post-content');
		if (!scope) {
			return;
		}
		var headings = scope.querySelectorAll('h2.wp-block-heading');
		if (!headings.length) {
			container.parentElement.style.display = 'none';
			return;
		}
		headings.forEach(function (heading, index) {
			var text = heading.textContent.trim();
			if (!text) {
				return;
			}
			var id = heading.id;
			if (!id) {
				id = 'section-' + index + '-' + text.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
				heading.id = id;
			}
			var a = document.createElement('a');
			a.href = '#' + id;
			a.textContent = text;
			container.appendChild(a);
		});
		var links = container.querySelectorAll('a');
		var sections = [];
		headings.forEach(function (h) {
			if (h.id) {
				sections.push(h);
			}
		});
		function setActive(id) {
			links.forEach(function (link) {
				link.classList.toggle('is-active', link.getAttribute('href') === '#' + id);
			});
		}
		if ('IntersectionObserver' in window && sections.length) {
			var observer = new IntersectionObserver(function (entries) {
				entries.forEach(function (entry) {
					if (entry.isIntersecting) {
						setActive(entry.target.id);
					}
				});
			}, { rootMargin: '-40% 0px -45% 0px', threshold: 0 });
			sections.forEach(function (section) {
				observer.observe(section);
			});
			setActive(sections[0].id);
		}
	}());
	</script>
	<?php
	turborank_service_html( ob_get_clean() );
}

/**
 * Output the blog longform pattern (used by single-blog-longform template).
 *
 * Editors should add H2 headings in the post; the script builds the TOC from them.
 */
function turborank_render_blog_longform_page() {
	$session_url = turborank_discovery_session_url();

	$brief = get_the_excerpt();
	if ( '' === trim( (string) $brief ) ) {
		$brief = __( 'Use the post excerpt field for a short summary, or add one in the document settings.', 'turborank' );
	}

	turborank_service_open( 'tr-insights tr-blog-longform-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><a href="/insights/">Insights</a> &nbsp;/&nbsp; <?php echo esc_html( get_the_title() ); ?></span></p>
	<h1 class="tr-blog-longform-hero__title"><?php echo esc_html( get_the_title() ); ?></h1>
	<p class="tr-blog-longform-hero__meta">By <?php echo wp_kses_post( get_the_author_posts_link() ); ?><?php echo esc_html( ' · ' . get_the_date() ); ?></p>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	// Featured image band (optional; hidden if no thumbnail).
	if ( has_post_thumbnail() ) {
		ob_start();
		?>
		<!-- wp:group {"align":"full","className":"tr-blog-longform-featured","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"32px","right":"32px"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#ffffff"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
		<div class="wp-block-group alignfull tr-blog-longform-featured has-background" style="background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:0;padding-right:32px;padding-bottom:0;padding-left:32px">
			<!-- wp:post-featured-image {"align":"wide","sizeSlug":"large","style":{"border":{"radius":"12px"}}} /-->
		</div>
		<!-- /wp:group -->
		<?php
		echo ob_get_clean(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup.
	}

	turborank_service_open( 'tr-insights tr-blog-longform-body', turborank_section_white_color(), '#121212' );

	ob_start();
	?>
	<div class="tr-blog-longform__grid">
		<nav class="tr-faq-nav tr-blog-longform__toc" aria-label="<?php esc_attr_e( 'On this page', 'turborank' ); ?>">
			<p><?php esc_html_e( 'On this page', 'turborank' ); ?></p>
			<div class="tr-blog-longform__toc-links" id="tr-blog-toc-links"></div>
		</nav>
		<div class="tr-blog-longform__main">
			<div class="tr-blog-longform-summary">
				<p class="tr-blog-longform-summary__eyebrow"><?php esc_html_e( 'Article brief', 'turborank' ); ?></p>
				<p class="tr-blog-longform-summary__text"><?php echo esc_html( $brief ); ?></p>
				<ul class="tr-blog-longform-summary__bullets">
					<li><?php esc_html_e( 'Clear thinking for marketing leaders', 'turborank' ); ?></li>
					<li><?php esc_html_e( 'Practical priorities you can act on', 'turborank' ); ?></li>
					<li><?php esc_html_e( 'Grounded in buyer discovery and measurement', 'turborank' ); ?></li>
				</ul>
			</div>
	<?php
	turborank_service_html( ob_get_clean() );

	echo '<!-- wp:group {"className":"tr-blog-longform-post-content","layout":{"type":"constrained"},"style":{"spacing":{"blockGap":"1.5rem"}}} -->' . "\n";
	echo '<div class="wp-block-group tr-blog-longform-post-content">' . "\n";
	echo '<!-- wp:post-content {"layout":{"type":"constrained"}} /-->' . "\n";
	echo '</div>' . "\n";
	echo '<!-- /wp:group -->' . "\n";

	ob_start();
	?>
		</div>
		<aside class="tr-blog-longform__aside" aria-label="<?php esc_attr_e( 'Book a call', 'turborank' ); ?>">
			<div class="tr-blog-longform__cta tr-form-card">
				<h2 class="tr-blog-longform__cta-title"><?php esc_html_e( 'Book your Discovery Session', 'turborank' ); ?></h2>
				<p class="tr-blog-longform__cta-lead"><?php esc_html_e( 'Before we meet, our team researches how buyers find your brand. On the call you get honest findings and your top three moves.', 'turborank' ); ?></p>
				<ul class="tr-assessment-checklist">
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php esc_html_e( 'Where buyers find you (and where competitors win)', 'turborank' ); ?></span></li>
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php esc_html_e( 'The videos and pages that aren’t working hard enough', 'turborank' ); ?></span></li>
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php esc_html_e( 'Your top 3 moves — prepared for you', 'turborank' ); ?></span></li>
				</ul>
				<div class="tr-blog-longform__cta-btn">
					<div class="wp-block-button tr-btn-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $session_url ); ?>"><?php esc_html_e( 'Book a Discovery Session', 'turborank' ); ?></a></div>
				</div>
				<p class="tr-form-help tr-blog-longform__cta-help">
					<?php esc_html_e( '30 minutes · Prepared in advance · For established brands.', 'turborank' ); ?>
					<?php
					echo ' ';
					echo wp_kses(
						__( 'Or call <a href="tel:5105215100">(510) 521-5100</a>.', 'turborank' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					);
					?>
				</p>
			</div>
		</aside>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_longform_related_section( '' );
	turborank_render_longform_toc_script();
}

/**
 * Longform layout for a static Insights article page (same chrome as blog longform).
 *
 * @param array<string, mixed> $article Article row from turborank_insights_articles().
 */
function turborank_render_insight_longform_page( array $article ) {
	$session_url = turborank_discovery_session_url();
	$author_url  = turborank_insight_author_url();
	$slug        = isset( $article['slug'] ) ? $article['slug'] : '';
	$title       = isset( $article['title'] ) ? $article['title'] : '';
	$brief       = isset( $article['excerpt'] ) ? $article['excerpt'] : '';
	$cat         = isset( $article['category'] ) ? $article['category'] : '';
	$author      = isset( $article['author'] ) ? $article['author'] : '';
	$date        = isset( $article['date'] ) ? $article['date'] : '';
	$thumb_key   = isset( $article['thumb'] ) ? $article['thumb'] : 'featured';
	$thumb_src   = function_exists( 'turborank_insight_thumb_src' ) ? turborank_insight_thumb_src( $thumb_key ) : '';

	turborank_service_open( 'tr-insights tr-blog-longform-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><a href="/insights/">Insights</a> &nbsp;/&nbsp; <?php echo esc_html( $title ); ?></span></p>
	<p class="tr-blog-longform-hero__category"><?php echo esc_html( $cat ); ?></p>
	<h1 class="tr-blog-longform-hero__title"><?php echo esc_html( $title ); ?></h1>
	<p class="tr-blog-longform-hero__meta"><?php esc_html_e( 'By', 'turborank' ); ?> <a href="<?php echo esc_url( $author_url ); ?>"><?php echo esc_html( $author ); ?></a><?php echo esc_html( ' · ' . $date ); ?></p>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	if ( $thumb_src ) {
		ob_start();
		?>
		<!-- wp:group {"align":"full","className":"tr-blog-longform-featured","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"32px","right":"32px"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#ffffff"}},"layout":{"type":"constrained","contentSize":"1080px"}} -->
		<div class="wp-block-group alignfull tr-blog-longform-featured has-background" style="background-color:#ffffff;margin-top:0;margin-bottom:0;padding-top:0;padding-right:32px;padding-bottom:0;padding-left:32px">
			<!-- wp:html -->
			<div class="alignwide tr-blog-longform-featured__media">
				<div class="tr-insight-card__media tr-insight-media-frame">
					<?php
					if ( function_exists( 'turborank_render_insight_card_image' ) ) {
						turborank_render_insight_card_image( $thumb_src, $title );
					}
					?>
				</div>
			</div>
			<!-- /wp:html -->
		</div>
		<!-- /wp:group -->
		<?php
		echo ob_get_clean(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Block markup.
	}

	turborank_service_open( 'tr-insights tr-blog-longform-body', turborank_section_white_color(), '#121212' );

	ob_start();
	?>
	<div class="tr-blog-longform__grid">
		<nav class="tr-faq-nav tr-blog-longform__toc" aria-label="<?php esc_attr_e( 'On this page', 'turborank' ); ?>">
			<p><?php esc_html_e( 'On this page', 'turborank' ); ?></p>
			<div class="tr-blog-longform__toc-links" id="tr-blog-toc-links"></div>
		</nav>
		<div class="tr-blog-longform__main">
			<div class="tr-blog-longform-summary">
				<p class="tr-blog-longform-summary__eyebrow"><?php esc_html_e( 'Article brief', 'turborank' ); ?></p>
				<p class="tr-blog-longform-summary__text"><?php echo esc_html( $brief ); ?></p>
				<ul class="tr-blog-longform-summary__bullets">
					<li><?php esc_html_e( 'Map demand before you publish', 'turborank' ); ?></li>
					<li><?php esc_html_e( 'Build sources buyers and AI already trust', 'turborank' ); ?></li>
					<li><?php esc_html_e( 'Measure authority across search, YouTube and AI answers', 'turborank' ); ?></li>
				</ul>
			</div>
	<?php
	turborank_service_html( ob_get_clean() );

	echo '<!-- wp:group {"className":"tr-blog-longform-post-content","layout":{"type":"constrained"},"style":{"spacing":{"blockGap":"1.5rem"}}} -->' . "\n";
	echo '<div class="wp-block-group tr-blog-longform-post-content">' . "\n";

	if ( ! empty( $article['longform_sections'] ) && is_array( $article['longform_sections'] ) ) {
		foreach ( $article['longform_sections'] as $section ) {
			$h = isset( $section['heading'] ) ? $section['heading'] : '';
			if ( $h ) {
				echo '<!-- wp:heading -->' . "\n";
				echo '<h2 class="wp-block-heading">' . esc_html( $h ) . '</h2>' . "\n";
				echo '<!-- /wp:heading -->' . "\n";
			}
			$paras = isset( $section['paragraphs'] ) ? $section['paragraphs'] : array();
			if ( is_array( $paras ) ) {
				foreach ( $paras as $p ) {
					echo '<!-- wp:paragraph -->' . "\n";
					echo '<p>' . esc_html( $p ) . '</p>' . "\n";
					echo '<!-- /wp:paragraph -->' . "\n";
				}
			}
		}
	} else {
		$body = isset( $article['body'] ) && is_array( $article['body'] ) ? $article['body'] : array();
		foreach ( $body as $paragraph ) {
			echo '<!-- wp:paragraph -->' . "\n";
			echo '<p>' . esc_html( $paragraph ) . '</p>' . "\n";
			echo '<!-- /wp:paragraph -->' . "\n";
		}
	}

	echo '</div>' . "\n";
	echo '<!-- /wp:group -->' . "\n";

	ob_start();
	?>
		</div>
		<aside class="tr-blog-longform__aside" aria-label="<?php esc_attr_e( 'Book a call', 'turborank' ); ?>">
			<div class="tr-blog-longform__cta tr-form-card">
				<h2 class="tr-blog-longform__cta-title"><?php esc_html_e( 'Book your Discovery Session', 'turborank' ); ?></h2>
				<p class="tr-blog-longform__cta-lead"><?php esc_html_e( 'Before we meet, our team researches how buyers find your brand. On the call you get honest findings and your top three moves.', 'turborank' ); ?></p>
				<ul class="tr-assessment-checklist">
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php esc_html_e( 'Where buyers find you (and where competitors win)', 'turborank' ); ?></span></li>
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php esc_html_e( 'The videos and pages that aren’t working hard enough', 'turborank' ); ?></span></li>
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php esc_html_e( 'Your top 3 moves — prepared for you', 'turborank' ); ?></span></li>
				</ul>
				<div class="tr-blog-longform__cta-btn">
					<div class="wp-block-button tr-btn-primary"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( $session_url ); ?>"><?php esc_html_e( 'Book a Discovery Session', 'turborank' ); ?></a></div>
				</div>
				<p class="tr-form-help tr-blog-longform__cta-help">
					<?php esc_html_e( '30 minutes · Prepared in advance · For established brands.', 'turborank' ); ?>
					<?php
					echo ' ';
					echo wp_kses(
						__( 'Or call <a href="tel:5105215100">(510) 521-5100</a>.', 'turborank' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					);
					?>
				</p>
			</div>
		</aside>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_render_longform_related_section( $slug );
	turborank_render_longform_toc_script();
}
