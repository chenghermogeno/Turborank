<?php
/**
 * Contact page markup from the TurboRank website mockup.
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Privacy policy URL for contact forms.
 */
function turborank_contact_privacy_url() {
	return 'https://app.termly.io/policy-viewer/policy.html?policyUUID=9a9e4fb2-5ce9-4b50-a00f-5466ff0dcf85';
}

/**
 * Privacy note markup below contact forms.
 */
function turborank_contact_privacy_markup() {
	return sprintf(
		wp_kses(
			/* translators: %s: privacy policy URL */
			__( 'Your information stays with TurboRank. See our <a href="%s" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.', 'turborank' ),
			array(
				'a' => array(
					'href'   => true,
					'target' => true,
					'rel'    => true,
				),
			)
		),
		esc_url( turborank_contact_privacy_url() )
	);
}

/**
 * Status banner for a contact form after redirect.
 *
 * @param string $form_key   Form identifier (snapshot|message).
 * @param string $status     sent|error.
 * @param string $form_query Which form was submitted (from query string).
 * @param string $reason     Optional error reason.
 */
function turborank_contact_render_form_feedback( $form_key, $status, $submitted_form, $reason = '' ) {
	if ( ! in_array( $status, array( 'sent', 'error' ), true ) || $submitted_form !== $form_key ) {
		return;
	}
	if ( 'sent' === $status ) {
		if ( 'snapshot' === $form_key ) {
			echo '<p class="tr-form-status" role="status">' . esc_html__( 'Thanks! We received your Snapshot request and will reply within one business day.', 'turborank' ) . '</p>';
		} else {
			echo '<p class="tr-form-status" role="status">' . esc_html__( 'Thanks! We received your message and will reply within one business day.', 'turborank' ) . '</p>';
		}
		return;
	}
	if ( 'error' !== $status ) {
		return;
	}
	$validation = 'validation' === $reason;
	if ( 'snapshot' === $form_key && $validation ) {
		$message = __( 'Please complete all required fields: name, email, phone number, company website, and main goal.', 'turborank' );
	} elseif ( 'message' === $form_key && $validation ) {
		$message = __( 'Please complete all required fields: name, email, and message.', 'turborank' );
	} else {
		echo '<p class="tr-form-status is-error" role="alert">';
		echo wp_kses(
			__( 'We couldn’t send that just now. Email <a href="mailto:hello@turborank.co">hello@turborank.co</a> and we’ll take it from there.', 'turborank' ),
			array(
				'a' => array( 'href' => true ),
			)
		);
		echo '</p>';
		return;
	}
	echo '<p class="tr-form-status is-error" role="alert">' . esc_html( $message ) . '</p>';
}

/**
 * FAQ items for the contact page.
 *
 * @return array<int, array{q: string, a: string}>
 */
function turborank_contact_faq_items() {
	$discovery_url = turborank_discovery_session_url();

	return array(
		array(
			'q' => 'How quickly will you reply?',
			'a' => 'Within one business day. Our team works Monday to Friday, 9am to 5pm Pacific time.',
		),
		array(
			'q' => 'What is a Discovery Session?',
			'a' => 'A free 30-minute call. Before we meet, our team researches how buyers find your brand. On the call, you get where buyers find you on YouTube and where competitors win instead, the videos you already have that aren\'t working for you, and your top 3 moves, prepared for your brand and yours to keep.',
			'link' => array(
				'label' => 'Book a time',
				'url'   => $discovery_url,
			),
		),
		array(
			'q' => 'Is the Discovery Session free?',
			'a' => 'Yes.',
		),
		array(
			'q' => 'Who do you work with?',
			'a' => 'Established brands with an existing content library or video program, especially when buyers need to learn, compare or trust something before they buy.',
		),
	);
}

/**
 * Default arguments for contact page rendering.
 *
 * @return array<string, mixed>
 */
function turborank_contact_page_defaults() {
	return array(
		'context_class'       => '',
		'crumb_label'         => __( 'Contact', 'turborank' ),
		'eyebrow'             => __( 'Contact TurboRank', 'turborank' ),
		'lead_html'           => '',
		'snapshot_tab_label'  => __( 'Request a Snapshot', 'turborank' ),
		'message_tab_label'   => __( 'Send a message', 'turborank' ),
		'snapshot_intro'      => __( 'Get a free Discovery Snapshot preview for your brand.<br>Fields marked <span class="tr-required" aria-hidden="true">*</span> are required.', 'turborank' ),
		'message_intro'       => __( 'Ask a question or say hello.<br>Fields marked <span class="tr-required" aria-hidden="true">*</span> are required.', 'turborank' ),
		'show_calendly_mock'  => false,
		'show_snapshot_form'  => false,
		'show_message_form'   => true,
		'use_form_tabs'       => false,
		'contact_context'     => '',
	);
}

/**
 * Render the Contact page (default).
 */
function turborank_render_contact_page() {
	$args = turborank_contact_page_defaults();
	$args['show_snapshot_form'] = true;
	$args['show_message_form']  = true;
	$args['use_form_tabs']      = true;
	$args['lead_html']          = sprintf(
		/* translators: %s: in-page anchor to snapshot tab */
		__( 'Ask a question or request a free Snapshot. Someone from our team replies within one business day. Ready for a Discovery Session? <a href="%s">Pick a time.</a>', 'turborank' ),
		esc_url( turborank_discovery_session_url() )
	);

	turborank_render_contact_page_inner( $args );
}

/**
 * Render Contact 2 — same structure as Contact with a Calendly scheduling mockup.
 */
function turborank_render_contact_page_contact_2() {
	$args                        = turborank_contact_page_defaults();
	$args['context_class']       = 'tr-contact--calendly';
	$args['crumb_label']         = __( 'Contact 2', 'turborank' );
	$args['show_calendly_mock'] = true;
	$args['show_message_form']  = false;
	$args['contact_context']    = 'contact-2';
	$args['lead_html']          = sprintf(
		/* translators: %s: URL to discovery session page */
		__( 'Ask a question or just say hello. Someone from our team replies within one business day. Ready for a Discovery Session? <a href="%s">Pick a time.</a>', 'turborank' ),
		esc_url( turborank_discovery_session_url() )
	);
	turborank_render_contact_page_inner( $args );
}

/**
 * Output Calendly scheduling mock markup.
 *
 * @param bool $wrap_card Whether to wrap in the standalone form card.
 */
function turborank_contact_render_calendly_mock( $wrap_card = true ) {
	if ( $wrap_card ) {
		echo '<div class="tr-form-card tr-contact-calendly" id="schedule">';
		echo '<h2>' . esc_html__( 'Schedule time', 'turborank' ) . '</h2>';
	} else {
		echo '<div class="tr-contact-calendly tr-contact-calendly--in-tab" id="schedule">';
		echo '<h2 class="screen-reader-text">' . esc_html__( 'Schedule time', 'turborank' ) . '</h2>';
	}
	?>
	<p class="tr-contact-calendly__intro"><?php esc_html_e( 'Mock Calendly embed — replace with your real', 'turborank' ); ?> <code>calendly.com</code> <?php esc_html_e( 'link or embed code when ready.', 'turborank' ); ?></p>
	<div class="tr-contact-calendly__mock js-tr-calendly-mock" role="region" aria-label="<?php esc_attr_e( 'Demo calendar — pick a date and time', 'turborank' ); ?>">
		<div class="tr-contact-calendly__mock-header">
			<span class="tr-contact-calendly__mock-logo">Calendly</span>
			<span class="tr-contact-calendly__mock-sub"><?php esc_html_e( 'Discovery call · 30 min', 'turborank' ); ?></span>
		</div>
		<div class="tr-contact-calendly__mock-body">
			<div class="tr-contact-calendly__mock-calendar">
				<p class="tr-contact-calendly__mock-month"><?php esc_html_e( 'November 2025', 'turborank' ); ?></p>
				<div class="tr-contact-calendly__mock-weekdays" aria-hidden="true">
					<?php foreach ( array( 'S', 'M', 'T', 'W', 'T', 'F', 'S' ) as $wd ) : ?>
						<span class="tr-contact-calendly__mock-weekday"><?php echo esc_html( $wd ); ?></span>
					<?php endforeach; ?>
				</div>
				<div class="tr-contact-calendly__mock-grid">
					<?php
					$tz            = wp_timezone();
					$month_start   = new DateTimeImmutable( '2025-11-01', $tz );
					$days_in_month = (int) $month_start->format( 't' );
					$first_weekday = (int) $month_start->format( 'w' );
					$first_avail   = null;
					for ( $i = 0; $i < $first_weekday; $i++ ) {
						echo '<span class="tr-contact-calendly__mock-pad" aria-hidden="true"></span>';
					}
					for ( $d = 1; $d <= $days_in_month; $d++ ) {
						$day_date = $month_start->setDate( 2025, 11, $d );
						$wday     = (int) $day_date->format( 'w' );
						$is_avail = $wday >= 1 && $wday <= 5;
						if ( $is_avail && null === $first_avail ) {
							$first_avail = $d;
						}
						$is_default = $is_avail && $d === $first_avail;
						$classes    = 'tr-contact-calendly__mock-day-btn';
						if ( $is_avail ) {
							$classes .= ' is-available';
						} else {
							$classes .= ' is-muted';
						}
						if ( $is_default ) {
							$classes .= ' is-selected';
						}
						$label_short = $day_date->format( 'D, M j' );
						$label       = $label_short . ( $is_avail ? '' : ' — ' . __( 'No openings', 'turborank' ) );
						?>
						<button
							type="button"
							class="<?php echo esc_attr( $classes ); ?>"
							data-day="<?php echo esc_attr( (string) $d ); ?>"
							data-label="<?php echo esc_attr( $label_short ); ?>"
							aria-pressed="<?php echo $is_default ? 'true' : 'false'; ?>"
							<?php echo $is_avail ? '' : ' disabled'; ?>
							aria-label="<?php echo esc_attr( $label ); ?>"
						><?php echo esc_html( (string) $d ); ?></button>
						<?php
					}
					$default_label = null !== $first_avail
						? $month_start->setDate( 2025, 11, $first_avail )->format( 'D, M j' )
						: '';
					?>
				</div>
			</div>
			<div class="tr-contact-calendly__mock-times">
				<p class="tr-contact-calendly__times-label js-tr-calendly-date-label"><?php echo $default_label ? esc_html( $default_label ) : '&nbsp;'; ?></p>
				<ul class="js-tr-calendly-slots">
					<li><button type="button" class="is-selected" data-time="9:00am" aria-pressed="true">9:00am</button></li>
					<li><button type="button" data-time="11:00am" aria-pressed="false">11:00am</button></li>
					<li><button type="button" data-time="1:30pm" aria-pressed="false">1:30pm</button></li>
					<li><button type="button" data-time="3:30pm" aria-pressed="false">3:30pm</button></li>
				</ul>
				<p class="tr-contact-calendly__mock-pick js-tr-calendly-live" role="status" aria-live="polite">
					<?php
					if ( $default_label ) {
						echo esc_html(
							sprintf(
								/* translators: 1: date like Mon, Nov 3; 2: time like 9:00am */
								__( 'Selected (demo): %1$s at %2$s', 'turborank' ),
								$default_label,
								'9:00am'
							)
						);
					}
					?>
				</p>
			</div>
		</div>
		<p class="tr-contact-calendly__mock-foot">
			<a class="tr-contact-calendly__mock-cta" href="<?php echo esc_url( turborank_discovery_session_url() ); ?>"><?php esc_html_e( 'Open real booking page', 'turborank' ); ?></a>
		</p>
	</div>
	</div>
	<?php
}

/**
 * Output Snapshot request form markup.
 *
 * @param array<string, mixed> $args       Page args.
 * @param string               $status     Form status query flag.
 * @param string               $form_query Which form was submitted.
 * @param string               $reason     Error reason.
 * @param bool                 $wrap_card  Whether to wrap in the standalone form card.
 */
function turborank_contact_render_snapshot_form( $args, $status, $form_query, $reason, $wrap_card = true ) {
	if ( $wrap_card ) {
		echo '<div class="tr-form-card tr-contact-form" id="snapshot">';
	} else {
		echo '<div class="tr-contact-form tr-contact-form--in-tab">';
	}
	?>
	<h2 class="<?php echo $wrap_card ? '' : 'screen-reader-text '; ?>tr-contact-form__title"><?php echo esc_html( $args['snapshot_tab_label'] ); ?></h2>
	<p class="tr-contact-form__intro"><?php echo wp_kses_post( $args['snapshot_intro'] ); ?></p>
	<?php turborank_contact_render_form_feedback( 'snapshot', $status, $form_query, $reason ); ?>
	<form class="js-tr-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
		<input type="hidden" name="action" value="turborank_contact">
		<input type="hidden" name="tr_form_type" value="snapshot">
		<?php if ( ! empty( $args['contact_context'] ) ) : ?>
		<input type="hidden" name="tr_contact_context" value="<?php echo esc_attr( $args['contact_context'] ); ?>">
		<?php endif; ?>
		<?php wp_nonce_field( 'turborank_contact', 'turborank_contact_nonce' ); ?>
		<p class="tr-hp" aria-hidden="true"><label>Company fax<input type="text" name="tr_fax" tabindex="-1" autocomplete="off"></label></p>
		<div class="tr-contact-form__row">
			<div>
				<label for="tr-snapshot-name">Name <span class="tr-required" aria-hidden="true">*</span></label>
				<input id="tr-snapshot-name" name="tr_name" type="text" required placeholder="Your full name" autocomplete="name">
			</div>
			<div>
				<label for="tr-snapshot-email">Email <span class="tr-required" aria-hidden="true">*</span></label>
				<input id="tr-snapshot-email" name="tr_email" type="email" required placeholder="you@company.com" autocomplete="email">
			</div>
		</div>
		<div class="tr-contact-form__row">
			<div>
				<label for="tr-snapshot-phone">Phone number <span class="tr-required" aria-hidden="true">*</span></label>
				<input id="tr-snapshot-phone" name="tr_phone" type="tel" required placeholder="(555) 555-5555" autocomplete="tel">
			</div>
			<div>
				<label for="tr-snapshot-website">Company website <span class="tr-required" aria-hidden="true">*</span></label>
				<input id="tr-snapshot-website" name="tr_website" type="text" required placeholder="https://yourcompany.com" autocomplete="url" inputmode="url">
			</div>
		</div>
		<label for="tr-snapshot-youtube">YouTube channel <span class="tr-contact-optional">(optional)</span></label>
		<input id="tr-snapshot-youtube" name="tr_youtube" type="text" placeholder="youtube.com/@yourchannel" autocomplete="url" inputmode="url">
		<label for="tr-snapshot-goal">Main goal <span class="tr-required" aria-hidden="true">*</span></label>
		<textarea id="tr-snapshot-goal" name="tr_goal" required placeholder="What would you like this Snapshot to help you understand or improve?"></textarea>
		<button type="submit"><?php esc_html_e( 'Request my free Snapshot', 'turborank' ); ?></button>
		<p class="tr-form-help tr-contact-privacy"><?php echo turborank_contact_privacy_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
	</form>
	</div>
	<?php
}

/**
 * Output contact message form markup.
 *
 * @param array<string, mixed> $args       Page args.
 * @param string               $status     Form status query flag.
 * @param string               $form_query Which form was submitted.
 * @param string               $reason     Error reason.
 * @param bool                 $wrap_card  Whether to wrap in the standalone form card.
 */
function turborank_contact_render_message_form( $args, $status, $form_query, $reason, $wrap_card = true ) {
	if ( $wrap_card ) {
		echo '<div class="tr-form-card tr-contact-form" id="message">';
	} else {
		echo '<div class="tr-contact-form tr-contact-form--in-tab">';
	}
	?>
	<h2 class="<?php echo $wrap_card ? '' : 'screen-reader-text '; ?>tr-contact-form__title"><?php echo esc_html( $args['message_tab_label'] ); ?></h2>
	<p class="tr-contact-form__intro"><?php echo wp_kses_post( $args['message_intro'] ); ?></p>
	<?php turborank_contact_render_form_feedback( 'message', $status, $form_query, $reason ); ?>
	<form class="js-tr-contact-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
		<input type="hidden" name="action" value="turborank_contact">
		<input type="hidden" name="tr_form_type" value="message">
		<?php if ( ! empty( $args['contact_context'] ) ) : ?>
		<input type="hidden" name="tr_contact_context" value="<?php echo esc_attr( $args['contact_context'] ); ?>">
		<?php endif; ?>
		<?php wp_nonce_field( 'turborank_contact', 'turborank_contact_nonce' ); ?>
		<p class="tr-hp" aria-hidden="true"><label>Company fax<input type="text" name="tr_fax" tabindex="-1" autocomplete="off"></label></p>
		<div class="tr-contact-form__row">
			<div>
				<label for="tr-message-name">Name <span class="tr-required" aria-hidden="true">*</span></label>
				<input id="tr-message-name" name="tr_name" type="text" required placeholder="Your full name" autocomplete="name">
			</div>
			<div>
				<label for="tr-message-email">Email <span class="tr-required" aria-hidden="true">*</span></label>
				<input id="tr-message-email" name="tr_email" type="email" required placeholder="you@company.com" autocomplete="email">
			</div>
		</div>
		<label for="tr-message-website">Company website <span class="tr-contact-optional">(optional)</span></label>
		<input id="tr-message-website" name="tr_website" type="text" placeholder="https://yourcompany.com" autocomplete="url" inputmode="url">
		<label for="tr-message-body">Message <span class="tr-required" aria-hidden="true">*</span></label>
		<textarea id="tr-message-body" name="tr_message" required placeholder="How can we help?"></textarea>
		<button type="submit"><?php esc_html_e( 'Send my message', 'turborank' ); ?></button>
		<p class="tr-form-help tr-contact-privacy"><?php echo turborank_contact_privacy_markup(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
	</form>
	</div>
	<?php
}

/**
 * Render Contact page markup (shared).
 *
 * @param array<string, mixed> $args Arguments from turborank_contact_page_defaults() plus overrides.
 */
function turborank_render_contact_page_inner( $args ) {
	$args = wp_parse_args( $args, turborank_contact_page_defaults() );

	$status         = isset( $_GET['contact'] ) ? sanitize_key( wp_unslash( $_GET['contact'] ) ) : '';
	$submitted_form = isset( $_GET['form'] ) ? sanitize_key( wp_unslash( $_GET['form'] ) ) : '';
	$error_reason   = isset( $_GET['reason'] ) ? sanitize_key( wp_unslash( $_GET['reason'] ) ) : '';

	$layout_classes = 'tr-contact-layout';
	$tabbed_forms   = $args['use_form_tabs'] && $args['show_snapshot_form'] && $args['show_message_form'];
	if ( $tabbed_forms ) {
		$layout_classes .= ' tr-contact-layout--tabbed';
	} elseif ( $args['show_calendly_mock'] && ! $args['show_message_form'] && ! $args['show_snapshot_form'] ) {
		$layout_classes .= ' tr-contact-layout--calendly-only';
	} elseif ( $args['show_calendly_mock'] && ( $args['show_message_form'] || $args['show_snapshot_form'] ) ) {
		$layout_classes .= ' tr-contact-layout--triple';
	}

	turborank_service_open( 'tr-contact tr-contact-hero ' . $args['context_class'], '#121212', '#ffffff' );
	ob_start();
	?>
	<p class="tr-crumb"><span class="tr-crumb__prefix"><a href="/">Home</a> &nbsp;/&nbsp;</span><span class="tr-crumb__trail"><?php echo esc_html( $args['crumb_label'] ); ?></span></p>
	<div class="tr-split tr-contact-hero__split">
		<div class="tr-contact-hero__intro">
			<p class="tr-eyebrow"><?php echo esc_html( $args['eyebrow'] ); ?></p>
			<h1 class="tr-contact-hero__title">Let’s talk about how<br><em class="tr-em">buyers find you.</em></h1>
			<p class="tr-lead"><?php echo wp_kses_post( $args['lead_html'] ); ?></p>
		</div>
		<div class="tr-contact-cards">
			<article class="tr-contact-card">
				<p class="tr-contact-card__label">Email us</p>
				<p class="tr-contact-card__value"><a href="mailto:hello@turborank.co">hello@turborank.co</a></p>
				<p class="tr-contact-card__note">Reply within one business day</p>
			</article>
			<article class="tr-contact-card">
				<p class="tr-contact-card__label">Call us</p>
				<p class="tr-contact-card__value"><a href="tel:5105215100">(510) 521-5100</a></p>
				<p class="tr-contact-card__note">Monday to Friday, 9am to 5pm PT</p>
			</article>
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-contact tr-contact-main ' . $args['context_class'], '#F9F9F7', '#121212' );
	ob_start();
	?>
	<div class="<?php echo esc_attr( $layout_classes ); ?>">
		<?php if ( $tabbed_forms ) : ?>
		<div class="tr-form-card tr-contact-form-tabs js-tr-contact-tabs">
			<span class="tr-contact-hash-anchor" id="snapshot" tabindex="-1" aria-hidden="true"></span>
			<span class="tr-contact-hash-anchor" id="message" tabindex="-1" aria-hidden="true"></span>
			<div class="tr-contact-tabs-wrap">
			<div class="tr-contact-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Contact options', 'turborank' ); ?>" data-active="snapshot">
				<span class="tr-contact-tabs__glider" aria-hidden="true"></span>
				<button
					type="button"
					class="tr-contact-tabs__tab is-active"
					role="tab"
					id="tr-contact-tab-snapshot"
					aria-selected="true"
					aria-controls="tr-contact-panel-snapshot"
					data-tr-contact-tab="snapshot"
				><?php echo esc_html( $args['snapshot_tab_label'] ); ?></button>
				<button
					type="button"
					class="tr-contact-tabs__tab"
					role="tab"
					id="tr-contact-tab-message"
					aria-selected="false"
					aria-controls="tr-contact-panel-message"
					data-tr-contact-tab="message"
					tabindex="-1"
				><?php echo esc_html( $args['message_tab_label'] ); ?></button>
			</div>
			</div>
			<div
				class="tr-contact-tab-panel is-active"
				role="tabpanel"
				id="tr-contact-panel-snapshot"
				aria-labelledby="tr-contact-tab-snapshot"
				data-tr-contact-panel="snapshot"
			>
		<?php endif; ?>
		<?php
		if ( $args['show_snapshot_form'] ) {
			turborank_contact_render_snapshot_form( $args, $status, $submitted_form, $error_reason, ! $tabbed_forms );
		}
		if ( $tabbed_forms ) {
			?>
			</div>
			<div
				class="tr-contact-tab-panel"
				role="tabpanel"
				id="tr-contact-panel-message"
				aria-labelledby="tr-contact-tab-message"
				data-tr-contact-panel="message"
				hidden
			>
			<?php
			turborank_contact_render_message_form( $args, $status, $submitted_form, $error_reason, false );
			?>
			</div>
		</div>
			<?php
		} elseif ( $args['show_message_form'] ) {
			turborank_contact_render_message_form( $args, $status, $submitted_form, $error_reason, true );
		}
		if ( ! $tabbed_forms && $args['show_calendly_mock'] ) {
			turborank_contact_render_calendly_mock( true );
		}
		?>
		<aside class="tr-contact-aside">
			<div class="tr-contact-steps">
				<h2>What happens next?</h2>
				<ol>
					<li>
						<strong>We reply within one business day</strong>
						<span class="tr-contact-steps__desc"><?php echo $args['show_message_form'] ? esc_html__( 'A real person from our team reads every message.', 'turborank' ) : esc_html__( 'Reach out by email or phone — a real person from our team will get back to you.', 'turborank' ); ?></span>
					</li>
					<li>
						<strong>We answer your question</strong>
						<span class="tr-contact-steps__desc">Or point you to the right next step, whether that’s one of our services or a call with our team.</span>
					</li>
					<li>
						<strong>Want a Discovery Session instead?</strong>
						<span class="tr-contact-steps__desc">
							<?php if ( $tabbed_forms ) : ?>
								<?php
								echo wp_kses_post(
									sprintf(
										/* translators: %s: link to discovery session booking */
										__( '%s for a live call. Before we meet, our team researches how buyers find your brand.', 'turborank' ),
										'<a href="' . esc_url( turborank_discovery_session_url() ) . '">' . esc_html__( 'Book a Discovery Session', 'turborank' ) . '</a>'
									)
								);
								?>
							<?php else : ?>
								<?php
								echo wp_kses_post(
									sprintf(
										/* translators: %s: link to discovery session booking */
										__( 'Skip the form and %s. Before we meet, our team researches how buyers find your brand.', 'turborank' ),
										'<a href="' . esc_url( turborank_discovery_session_url() ) . '">' . esc_html__( 'pick a time', 'turborank' ) . '</a>'
									)
								);
								?>
							<?php endif; ?>
						</span>
					</li>
				</ol>
			</div>
			<div class="tr-contact-services">
				<h2>Our services</h2>
				<article>
					<h3><a href="/ai-discovery/">AI Discovery</a></h3>
					<p>When customers ask AI for recommendations, get your brand into the conversation.</p>
				</article>
				<article>
					<h3><a href="/youtube-discovery/">YouTube Discovery</a></h3>
					<p>Turn your video library into a discovery channel that keeps attracting buyers long after you publish.</p>
				</article>
				<article>
					<h3><a href="/brand-authority/">Brand Authority</a></h3>
					<p>Build the independent credibility and digital presence that help buyers and discovery platforms recognize your brand.</p>
				</article>
			</div>
			<div class="tr-contact-office">
				<p class="tr-contact-office__brand">TurboRank</p>
				<p>Alameda, California</p>
				<p><a class="tr-contact-office__link" href="mailto:hello@turborank.co">hello@turborank.co</a></p>
				<p><a class="tr-contact-office__link" href="tel:5105215100">(510) 521-5100</a></p>
			</div>
		</aside>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-contact tr-contact-logos ' . $args['context_class'], '#ffffff', '#121212' );
	ob_start();
	turborank_render_trust_logos_section();
	turborank_service_html( ob_get_clean() );
	turborank_service_close();

	turborank_service_open( 'tr-contact tr-contact-faq ' . $args['context_class'], '#F9F9F7', '#121212', 'before-you-reach-out' );
	ob_start();
	?>
	<div class="tr-contact-faq-layout">
		<div class="tr-contact-faq-intro">
			<h2>Before you reach out</h2>
			<p class="tr-contact-faq-lead">Answers to the questions we hear most often.</p>
		</div>
		<div class="tr-contact-faq-list">
		<?php foreach ( turborank_contact_faq_items() as $item ) : ?>
			<article>
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
		</div>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Handle the contact form.
 */
function turborank_handle_contact() {
	if ( ! isset( $_POST['turborank_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['turborank_contact_nonce'] ) ), 'turborank_contact' ) ) {
		wp_die( esc_html__( 'The form expired. Please go back and try again.', 'turborank' ) );
	}

	$context    = isset( $_POST['tr_contact_context'] ) ? sanitize_key( wp_unslash( $_POST['tr_contact_context'] ) ) : '';
	$form_type  = isset( $_POST['tr_form_type'] ) ? sanitize_key( wp_unslash( $_POST['tr_form_type'] ) ) : 'message';
	$redirect   = ( 'contact-2' === $context ) ? home_url( '/contact-2/' ) : home_url( '/contact/' );
	$hash       = ( 'snapshot' === $form_type ) ? '#snapshot' : '#message';
	$query_form = in_array( $form_type, array( 'snapshot', 'message' ), true ) ? $form_type : 'message';

	if ( ! empty( $_POST['tr_fax'] ) ) {
		wp_safe_redirect(
			add_query_arg(
				array(
					'contact' => 'sent',
					'form'    => $query_form,
				),
				$redirect
			) . $hash
		);
		exit;
	}

	$name     = isset( $_POST['tr_name'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_name'] ) ) : '';
	$email    = isset( $_POST['tr_email'] ) ? sanitize_email( wp_unslash( $_POST['tr_email'] ) ) : '';
	$phone    = isset( $_POST['tr_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_phone'] ) ) : '';
	$website  = isset( $_POST['tr_website'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_website'] ) ) : '';
	$youtube  = isset( $_POST['tr_youtube'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_youtube'] ) ) : '';
	$goal     = isset( $_POST['tr_goal'] ) ? sanitize_textarea_field( wp_unslash( $_POST['tr_goal'] ) ) : '';
	$message  = isset( $_POST['tr_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['tr_message'] ) ) : '';
	$invalid  = false;

	if ( 'snapshot' === $form_type ) {
		if ( '' === $name || ! is_email( $email ) || '' === $phone || '' === $website || '' === $goal ) {
			$invalid = true;
		}
		$subject = 'Snapshot request — ' . $name;
		$body    = "Form: Discovery Snapshot request\nName: {$name}\nEmail: {$email}\nPhone: {$phone}\nWebsite: {$website}\n";
		if ( $youtube ) {
			$body .= "YouTube: {$youtube}\n";
		}
		$body .= "\nMain goal:\n{$goal}\n";
	} else {
		if ( '' === $name || ! is_email( $email ) || '' === $message ) {
			$invalid = true;
		}
		$subject = 'Contact message — ' . $name;
		$body    = "Form: Contact message\nName: {$name}\nEmail: {$email}\n";
		if ( $website ) {
			$body .= "Website: {$website}\n";
		}
		$body .= "\nMessage:\n{$message}\n";
	}

	if ( $invalid ) {
		wp_safe_redirect(
			add_query_arg(
				array(
					'contact' => 'error',
					'form'    => $query_form,
					'reason'  => 'validation',
				),
				$redirect
			) . $hash
		);
		exit;
	}

	$sent = wp_mail(
		'hello@turborank.co',
		$subject,
		$body,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect(
		add_query_arg(
			array(
				'contact' => $sent ? 'sent' : 'error',
				'form'    => $query_form,
			),
			$redirect
		) . $hash
	);
	exit;
}
add_action( 'admin_post_nopriv_turborank_contact', 'turborank_handle_contact' );
add_action( 'admin_post_turborank_contact', 'turborank_handle_contact' );

/**
 * Ensure a published page exists at /contact-2/ with the Contact 2 template.
 */
function turborank_ensure_contact_2_page() {
	if ( is_admin() && ! wp_doing_ajax() ) {
		return;
	}

	$page = get_page_by_path( 'contact-2' );
	if ( $page instanceof WP_Post ) {
		if ( 'page-contact-2' !== get_page_template_slug( $page ) ) {
			update_post_meta( (int) $page->ID, '_wp_page_template', 'page-contact-2' );
		}
		return;
	}

	wp_insert_post(
		array(
			'post_title'   => __( 'Contact 2', 'turborank' ),
			'post_name'    => 'contact-2',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		)
	);

	$new_page = get_page_by_path( 'contact-2' );
	if ( $new_page instanceof WP_Post ) {
		update_post_meta( (int) $new_page->ID, '_wp_page_template', 'page-contact-2' );
	}
}
add_action( 'init', 'turborank_ensure_contact_2_page', 26 );
