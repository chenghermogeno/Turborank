<?php
/**
 * Discovery Snapshot block — YouTube-first session card.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default block attributes.
 *
 * @return array<string, string>
 */
function turborank_discovery_snapshot_default_attributes() {
	return array(
		'title'             => 'Discovery Snapshot',
		'meta'              => '[Your brand], 20 buyer searches on YouTube and Google, [date range]',
		'badge'             => 'Illustrative sample',
		'stat1Label'        => 'Your brand on YouTube',
		'stat1Pre'          => 'Top 5 for',
		'stat1Em'           => '9 of 20',
		'stat1Foot'         => 'buyer searches',
		'stat2Label'        => 'Competitor A and B',
		'stat2Em'           => 'Rank for 14',
		'stat2Foot'         => 'of the same 20 searches',
		'missedTitle'       => 'Missed opportunity',
		'missedLine'        => '“Best [product] for [use case]”: Competitor A ranks #1 and #3. You have no video that answers it.',
		'moveTitle'         => 'Move 1 of 3',
		'moveText'          => 'Retitle and repackage [N] existing videos around the buyer searches they already answer.',
		'strategistCaption' => '',
		'ariaLabel'         => 'Discovery Snapshot illustrative sample',
	);
}

/**
 * Merge block attributes with defaults.
 *
 * @param array<string, mixed> $attributes Block attributes.
 * @return array<string, mixed>
 */
function turborank_discovery_snapshot_normalize_attributes( $attributes ) {
	$a = wp_parse_args( $attributes, turborank_discovery_snapshot_default_attributes() );

	// Legacy single-line stats from older block saves.
	if ( empty( $a['stat1Pre'] ) && ! empty( $a['youtubeStat1'] ) ) {
		$a['stat1Pre'] = (string) $a['youtubeStat1'];
		$a['stat1Em']  = '';
	}
	if ( empty( $a['stat2Em'] ) && ! empty( $a['youtubeStat2'] ) ) {
		$a['stat2Em'] = (string) $a['youtubeStat2'];
	}

	return $a;
}

/**
 * Render the discovery snapshot card markup.
 *
 * @param array<string, mixed> $attributes Block attributes.
 * @return string
 */
function turborank_render_discovery_snapshot_card( $attributes ) {
	$a     = turborank_discovery_snapshot_normalize_attributes( $attributes );
	$photo = esc_url( get_template_directory_uri() . '/assets/images/team/matthew-pearce.png' );

	ob_start();
	?>
	<div class="tr-snapshot tr-snapshot--session" aria-label="<?php echo esc_attr( $a['ariaLabel'] ); ?>">
		<div class="tr-snapshot__head">
			<div class="tr-snapshot__head-copy">
				<p class="tr-snapshot__title"><?php echo esc_html( $a['title'] ); ?></p>
				<p class="tr-snapshot__meta"><?php echo esc_html( $a['meta'] ); ?></p>
			</div>
			<?php if ( '' !== trim( (string) $a['badge'] ) ) : ?>
				<span class="tr-snapshot__badge"><?php echo esc_html( $a['badge'] ); ?></span>
			<?php endif; ?>
		</div>

		<div class="tr-snapshot__grid">
			<div class="tr-snapshot__cell tr-snapshot__cell--stat">
				<?php if ( '' !== trim( (string) $a['stat1Label'] ) ) : ?>
					<span class="tr-snapshot__cell-label"><?php echo esc_html( $a['stat1Label'] ); ?></span>
				<?php endif; ?>
				<p class="tr-snapshot__cell-stat">
					<?php if ( '' !== trim( (string) $a['stat1Pre'] ) ) : ?>
						<span class="tr-snapshot__stat-pre"><?php echo esc_html( $a['stat1Pre'] ); ?></span>
					<?php endif; ?>
					<?php if ( '' !== trim( (string) $a['stat1Em'] ) ) : ?>
						<span class="tr-snapshot__stat-em"><?php echo esc_html( $a['stat1Em'] ); ?></span>
					<?php endif; ?>
				</p>
				<?php if ( '' !== trim( (string) $a['stat1Foot'] ) ) : ?>
					<span class="tr-snapshot__cell-foot"><?php echo esc_html( $a['stat1Foot'] ); ?></span>
				<?php endif; ?>
			</div>

			<div class="tr-snapshot__cell tr-snapshot__cell--stat tr-snapshot__cell--accent-stat">
				<?php if ( '' !== trim( (string) $a['stat2Label'] ) ) : ?>
					<span class="tr-snapshot__cell-label"><?php echo esc_html( $a['stat2Label'] ); ?></span>
				<?php endif; ?>
				<?php if ( '' !== trim( (string) $a['stat2Em'] ) ) : ?>
					<p class="tr-snapshot__cell-stat">
						<span class="tr-snapshot__stat-em"><?php echo esc_html( $a['stat2Em'] ); ?></span>
					</p>
				<?php endif; ?>
				<?php if ( '' !== trim( (string) $a['stat2Foot'] ) ) : ?>
					<span class="tr-snapshot__cell-foot"><?php echo esc_html( $a['stat2Foot'] ); ?></span>
				<?php endif; ?>
			</div>

			<?php if ( '' !== trim( (string) $a['missedTitle'] ) || '' !== trim( (string) $a['missedLine'] ) ) : ?>
				<div class="tr-snapshot__cell tr-snapshot__cell--insight">
					<?php if ( '' !== trim( (string) $a['missedTitle'] ) ) : ?>
						<strong class="tr-snapshot__insight-title tr-snapshot__insight-title--accent"><?php echo esc_html( $a['missedTitle'] ); ?></strong>
					<?php endif; ?>
					<?php if ( '' !== trim( (string) $a['missedLine'] ) ) : ?>
						<p class="tr-snapshot__insight-body"><?php echo esc_html( $a['missedLine'] ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( '' !== trim( (string) $a['moveTitle'] ) || '' !== trim( (string) $a['moveText'] ) ) : ?>
				<div class="tr-snapshot__cell tr-snapshot__cell--insight">
					<?php if ( '' !== trim( (string) $a['moveTitle'] ) ) : ?>
						<strong class="tr-snapshot__insight-title"><?php echo esc_html( $a['moveTitle'] ); ?></strong>
					<?php endif; ?>
					<?php if ( '' !== trim( (string) $a['moveText'] ) ) : ?>
						<p class="tr-snapshot__insight-body"><?php echo esc_html( $a['moveText'] ); ?></p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( '' !== trim( (string) $a['strategistCaption'] ) ) : ?>
			<footer class="tr-snapshot__foot">
				<div class="tr-snapshot__strategist">
					<img class="tr-snapshot__avatar" src="<?php echo esc_url( $photo ); ?>" alt="" width="44" height="44" loading="lazy" decoding="async">
					<p class="tr-snapshot__strategist-caption"><?php echo esc_html( $a['strategistCaption'] ); ?></p>
				</div>
			</footer>
		<?php endif; ?>
	</div>
	<?php
	return (string) ob_get_clean();
}

/**
 * Register TurboRank blocks.
 */
function turborank_register_blocks() {
	$block_dir = get_template_directory() . '/blocks/discovery-snapshot';

	register_block_type(
		$block_dir,
		array(
			'render_callback' => function ( $attributes ) {
				return turborank_render_discovery_snapshot_card( $attributes );
			},
		)
	);
}
add_action( 'init', 'turborank_register_blocks' );

/**
 * Editor script dependency for block preview.
 */
function turborank_discovery_snapshot_editor_assets() {
	wp_enqueue_script( 'wp-server-side-render' );
}
add_action( 'enqueue_block_editor_assets', 'turborank_discovery_snapshot_editor_assets' );

/**
 * Block inserter category.
 *
 * @param array<int, array<string, string>> $categories Block categories.
 * @return array<int, array<string, string>>
 */
function turborank_block_categories( $categories ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'turborank',
				'title' => __( 'TurboRank', 'turborank' ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'turborank_block_categories', 10, 1 );
