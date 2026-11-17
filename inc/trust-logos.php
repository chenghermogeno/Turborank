<?php
/**
 * Shared “Trusted by established brands including” logo treatments (homepage + contact).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Client names for the text marquee option.
 *
 * @return string[]
 */
function turborank_trust_logo_names() {
	return array(
		'Halo Collar',
		'AARP',
		'AquaTru',
		'AirDoctor',
		'National CORE',
		'FLRT',
		'MDAIRE',
		'Intuity Medical',
	);
}

/**
 * Trust marquee entries: image logos first, then text labels.
 *
 * Image files live in assets/images/trust-logos/ (filename only in `file`).
 *
 * @return array<int, array<string, string>>
 */
function turborank_trust_logo_items() {
	$dir = get_template_directory_uri() . '/assets/images/trust-logos/';
	$items = array(
		array(
			'file' => 'greenive.png',
			'alt'  => 'Greenivē',
		),
		array(
			'file'  => 'zatural.jpg',
			'alt'   => 'Zatural',
			'class' => 'tr-hero-trust__logo-img--zatural',
		),
	);

	foreach ( turborank_trust_logo_names() as $trust_logo_name ) {
		$items[] = array(
			'label' => $trust_logo_name,
		);
	}

	return $items;
}

/**
 * Markup for one marquee group (logo images + name spans).
 *
 * @return string
 */
function turborank_trust_logo_marquee_markup() {
	$markup = '';
	$dir    = get_template_directory_uri() . '/assets/images/trust-logos/';

	foreach ( turborank_trust_logo_items() as $item ) {
		if ( ! empty( $item['file'] ) ) {
			$src         = $dir . $item['file'];
			$alt         = isset( $item['alt'] ) ? $item['alt'] : '';
			$extra_class = ! empty( $item['class'] ) ? ' ' . esc_attr( $item['class'] ) : '';
			$markup     .= sprintf(
				'<img class="tr-hero-trust__logo-img%s" src="%s" alt="%s" width="160" height="48" loading="lazy" decoding="async" />',
				$extra_class,
				esc_url( $src ),
				esc_attr( $alt )
			);
			continue;
		}

		if ( ! empty( $item['label'] ) ) {
			$markup .= '<span class="tr-hero-trust__logo">' . esc_html( $item['label'] ) . '</span>';
		}
	}

	return $markup;
}

/**
 * Label + animated text logo marquee (shared block).
 */
function turborank_render_trust_logo_marquee() {
	$trust_logo_markup = turborank_trust_logo_marquee_markup();
	?>
	<p class="tr-hero-trust__label"><span class="tr-hero-trust__label-key">Trusted by</span> established brands including</p>
	<div class="tr-logo-marquee" role="region" aria-label="Client logos">
		<div class="tr-logo-marquee__viewport">
			<div class="tr-logo-marquee__track">
				<div class="tr-logo-marquee__group"><?php echo $trust_logo_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
				<div class="tr-logo-marquee__group" aria-hidden="true"><?php echo $trust_logo_markup; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Trust band with text logo marquee (homepage hero + contact; matches Hero Demo 1).
 */
function turborank_render_trust_logos_section() {
	?>
	<div class="tr-hero-trust">
		<?php turborank_render_trust_logo_marquee(); ?>
	</div>
	<?php
}
