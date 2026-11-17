<?php
/**
 * Discovery Session marketing page (dedicated booking landing).
 *
 * @package TurboRank
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Bullets shown in the hero and reused in later sections.
 *
 * @return string[]
 */
function turborank_discovery_session_deliverables() {
	return array(
		'Where buyers find you on YouTube, and where competitors win instead',
		'The videos you already have that aren\'t working for you',
		'Your top 3 moves, prepared for your brand and yours to keep',
	);
}

/**
 * Render the Discovery Session page (hero section first).
 */
function turborank_render_discovery_session_page() {
	$photo = esc_url( get_template_directory_uri() . '/assets/images/team/matthew-pearce.png' );

	turborank_render_discovery_session_hero( $photo );
	turborank_render_discovery_session_booking();
}

/**
 * Hero — value proposition and strategist credit.
 *
 * @param string $photo Strategist headshot URL.
 */
function turborank_render_discovery_session_hero( $photo ) {
	turborank_service_open( 'tr-dsession tr-dsession-hero tr-service-hero', '#121317', '#ffffff' );
	ob_start();
	?>
	<h1 class="tr-eyebrow">Discovery Session</h1>
	<div class="tr-split tr-dsession-split">
		<div class="tr-dsession-intro">
			<h2><span class="tr-dsession-title-plain">Book your</span> <em class="tr-em">Discovery Session.</em></h2>
			<p class="tr-dsession-lead">Before we meet, our team researches how buyers find your brand. On the call, you get:</p>
			<ul class="tr-hero-checklist">
				<?php foreach ( turborank_discovery_session_deliverables() as $item ) : ?>
					<li><span class="tr-check-mark" aria-hidden="true">✓</span><span class="tr-check-text"><?php echo esc_html( $item ); ?></span></li>
				<?php endforeach; ?>
			</ul>
			<p class="tr-hero-meta tr-dsession-meta">30 minutes · Prepared in advance · For established brands</p>
		</div>
		<aside class="tr-dsession-prepared" aria-label="<?php esc_attr_e( 'Who prepares your snapshot', 'turborank' ); ?>">
			<img class="tr-dsession-prepared__photo" src="<?php echo esc_url( $photo ); ?>" alt="" width="52" height="52" loading="lazy" decoding="async">
			<p class="tr-dsession-prepared__text">Your snapshot is prepared by Matthew Pearce, working on YouTube since 2007, and our specialist team.</p>
		</aside>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Booking form + sidebar (sections 01 and 02).
 */
function turborank_render_discovery_session_booking() {
	$status     = isset( $_GET['booking'] ) ? sanitize_key( wp_unslash( $_GET['booking'] ) ) : '';
	$slot_day   = wp_date( 'l, F j' );
	$time_slots = array(
		'9:00 am',
		'10:30 am',
		'1:00 pm',
		'3:30 pm',
	);

	turborank_service_open( 'tr-dsession tr-dsession-booking', '#ffffff', '#121418', 'book' );
	ob_start();
	?>
	<div class="tr-dsession-booking__layout">
		<div class="tr-form-card tr-dsession-booking-form-wrap">
			<?php if ( 'sent' === $status ) : ?>
				<p class="tr-form-status">Thanks — you’re booked. Check your email for your Zoom link.</p>
			<?php elseif ( 'error' === $status ) : ?>
				<p class="tr-form-status is-error">We couldn’t complete that booking just now. Call <a href="tel:5105215100">(510) 521-5100</a> or email <a href="mailto:hello@turborank.co">hello@turborank.co</a>.</p>
			<?php endif; ?>
			<form class="tr-dsession-booking-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" novalidate>
				<input type="hidden" name="action" value="turborank_discovery_session_booking">
				<?php wp_nonce_field( 'turborank_discovery_session_booking', 'turborank_dsession_nonce' ); ?>
				<p class="tr-hp"><label>Company fax<input type="text" name="tr_fax" tabindex="-1" autocomplete="off"></label></p>

				<div class="tr-dsession-step">
					<div class="tr-dsession-step__head">
						<span class="tr-dsession-step__num" aria-hidden="true">01</span>
						<h2>Tell us about your brand</h2>
					</div>
					<p class="tr-dsession-step__hint">All fields are required.</p>
					<div class="tr-dsession-form__row">
						<div>
							<label for="tr-dsession-name">Name <span class="tr-required" aria-hidden="true">*</span></label>
							<input id="tr-dsession-name" name="tr_name" type="text" required placeholder="Your full name" autocomplete="name">
						</div>
						<div>
							<label for="tr-dsession-email">Work email <span class="tr-required" aria-hidden="true">*</span></label>
							<input id="tr-dsession-email" name="tr_email" type="email" required placeholder="you@company.com" autocomplete="email">
						</div>
					</div>
					<div class="tr-dsession-form__row">
						<div>
							<label for="tr-dsession-company">Company name <span class="tr-required" aria-hidden="true">*</span></label>
							<input id="tr-dsession-company" name="tr_company" type="text" required placeholder="Your company" autocomplete="organization">
						</div>
						<div>
							<label for="tr-dsession-site">Website <span class="tr-required" aria-hidden="true">*</span></label>
							<input id="tr-dsession-site" name="tr_site" type="url" required placeholder="https://yourcompany.com" autocomplete="url">
						</div>
					</div>
					<div class="tr-dsession-form__row">
						<div>
							<label for="tr-dsession-youtube">YouTube channel <span class="tr-required" aria-hidden="true">*</span></label>
							<input id="tr-dsession-youtube" name="tr_youtube" type="text" required placeholder="youtube.com/@yourchannel" autocomplete="url">
						</div>
						<div>
							<label for="tr-dsession-phone">Cell phone <span class="tr-required" aria-hidden="true">*</span></label>
							<input id="tr-dsession-phone" name="tr_phone" type="tel" required placeholder="(555) 555-5555" autocomplete="tel">
						</div>
					</div>
					<label class="tr-dsession-sms">
						<input type="checkbox" name="tr_sms_reminders" value="1">
						<span>Text me reminders about my Discovery Session. Message and data rates may apply. Reply STOP to opt out. [Legal to confirm consent wording]</span>
					</label>
					<label for="tr-dsession-challenge">What are buyers asking that you’re not showing up for? <span class="tr-required" aria-hidden="true">*</span></label>
					<textarea id="tr-dsession-challenge" name="tr_challenge" required placeholder="The questions, searches or comparisons where competitors show up instead of you"></textarea>
				</div>

				<div class="tr-dsession-step tr-dsession-step--schedule">
					<div class="tr-dsession-step__head">
						<span class="tr-dsession-step__num" aria-hidden="true">02</span>
						<h2>Pick a time</h2>
					</div>
					<p class="tr-dsession-step__hint">30-minute Zoom call · Times shown in your time zone · [Calendar connects to Mary Ann’s availability]</p>
					<div class="tr-dsession-schedule-picker">
						<p class="tr-dsession-slot-day">[Day], [Date]</p>
						<div class="tr-dsession-slots" role="group" aria-label="<?php esc_attr_e( 'Available times', 'turborank' ); ?>">
							<?php foreach ( $time_slots as $time ) : ?>
								<?php
								$slot_value = $slot_day . ' · ' . $time;
								$slot_id    = 'tr-dsession-slot-' . sanitize_title( $time );
								?>
								<button type="button" class="tr-dsession-slot" id="<?php echo esc_attr( $slot_id ); ?>" data-slot="<?php echo esc_attr( $slot_value ); ?>" aria-pressed="false"><?php echo esc_html( $time ); ?></button>
							<?php endforeach; ?>
						</div>
						<a href="#" class="tr-dsession-text-link tr-dsession-more-days">See more days</a>
					</div>
					<input type="hidden" name="tr_slot" value="" required>
					<button type="submit" class="tr-dsession-submit">Book a Discovery Session</button>
					<p class="tr-dsession-booking-note">You can’t submit until every field is filled in and a time is picked. Your information stays with TurboRank. <a class="tr-dsession-text-link" href="/privacy/">Privacy Policy</a></p>
				</div>
			</form>
		</div>

		<aside class="tr-dsession-booking-aside" aria-label="<?php esc_attr_e( 'After you book', 'turborank' ); ?>">
			<div class="tr-dsession-after-book">
				<p class="tr-dsession-after-book__eyebrow">After you book</p>
				<h3>We’ll research your brand before we meet.</h3>
				<div class="tr-dsession-after-book__details">
					<p>A calendar invite with your Zoom link, by email</p>
					<p>Reminders by email and text, 24 hours and 1 hour before the call</p>
					<p><?php
					echo wp_kses(
						'Your Discovery Snapshot on the call, <span class="tr-keep-together">yours to keep</span>',
						array(
							'span' => array( 'class' => true ),
						)
					);
					?></p>
				</div>
			</div>
			<div class="tr-dsession-not-ready">
				<h3>Not ready to book?</h3>
				<p>Call <a href="tel:5105215100">(510) 521-5100</a>, email <a href="mailto:hello@turborank.co">hello@turborank.co</a> or <a href="<?php echo esc_url( turborank_contact_url( 'message' ) ); ?>">send us a message</a>.</p>
			</div>
			<p class="tr-dsession-sample-link"><a href="/discovery-snapshot/" target="_blank" rel="noopener noreferrer">See a sample snapshot</a></p>
		</aside>
	</div>
	<?php
	turborank_service_html( ob_get_clean() );
	turborank_service_close();
}

/**
 * Handle Discovery Session booking form posts.
 */
function turborank_handle_discovery_session_booking() {
	if ( ! isset( $_POST['turborank_dsession_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['turborank_dsession_nonce'] ) ), 'turborank_discovery_session_booking' ) ) {
		wp_die( esc_html__( 'The form expired. Please go back and try again.', 'turborank' ) );
	}

	$redirect = turborank_discovery_session_url() . '#book';

	if ( ! empty( $_POST['tr_fax'] ) ) {
		wp_safe_redirect( add_query_arg( 'booking', 'sent', $redirect ) );
		exit;
	}

	$name      = isset( $_POST['tr_name'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_name'] ) ) : '';
	$email     = isset( $_POST['tr_email'] ) ? sanitize_email( wp_unslash( $_POST['tr_email'] ) ) : '';
	$company   = isset( $_POST['tr_company'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_company'] ) ) : '';
	$site      = isset( $_POST['tr_site'] ) ? esc_url_raw( wp_unslash( $_POST['tr_site'] ) ) : '';
	$youtube   = isset( $_POST['tr_youtube'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_youtube'] ) ) : '';
	$phone     = isset( $_POST['tr_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_phone'] ) ) : '';
	$challenge = isset( $_POST['tr_challenge'] ) ? sanitize_textarea_field( wp_unslash( $_POST['tr_challenge'] ) ) : '';
	$slot      = isset( $_POST['tr_slot'] ) ? sanitize_text_field( wp_unslash( $_POST['tr_slot'] ) ) : '';
	$sms       = ! empty( $_POST['tr_sms_reminders'] ) ? 'yes' : 'no';

	if ( '' === $name || ! is_email( $email ) || '' === $company || '' === $site || '' === $youtube || '' === $phone || '' === $challenge || '' === $slot ) {
		wp_safe_redirect( add_query_arg( 'booking', 'error', $redirect ) );
		exit;
	}

	$body  = "Discovery Session booking\n\n";
	$body .= "Time: {$slot}\n";
	$body .= "Name: {$name}\nEmail: {$email}\nCompany: {$company}\n";
	$body .= "Website: {$site}\nYouTube: {$youtube}\nPhone: {$phone}\n";
	$body .= "SMS reminders: {$sms}\n\n{$challenge}\n";

	$sent = wp_mail(
		'hello@turborank.co',
		'Discovery Session booking — ' . $name,
		$body,
		array( 'Reply-To: ' . $name . ' <' . $email . '>' )
	);

	wp_safe_redirect( add_query_arg( 'booking', $sent ? 'sent' : 'error', $redirect ) );
	exit;
}
add_action( 'admin_post_nopriv_turborank_discovery_session_booking', 'turborank_handle_discovery_session_booking' );
add_action( 'admin_post_turborank_discovery_session_booking', 'turborank_handle_discovery_session_booking' );

/**
 * Ensure a published page exists at /discovery-session/ with the correct template.
 */
function turborank_ensure_discovery_session_page() {
	if ( is_admin() && ! wp_doing_ajax() ) {
		return;
	}

	$page = get_page_by_path( 'discovery-session' );
	if ( $page instanceof WP_Post ) {
		if ( 'page-discovery-session' !== get_page_template_slug( $page ) ) {
			update_post_meta( (int) $page->ID, '_wp_page_template', 'page-discovery-session' );
		}
		return;
	}

	wp_insert_post(
		array(
			'post_title'   => 'Discovery Session',
			'post_name'    => 'discovery-session',
			'post_status'  => 'publish',
			'post_type'    => 'page',
			'post_content' => '',
		)
	);

	$new_page = get_page_by_path( 'discovery-session' );
	if ( $new_page instanceof WP_Post ) {
		update_post_meta( (int) $new_page->ID, '_wp_page_template', 'page-discovery-session' );
	}
}
add_action( 'init', 'turborank_ensure_discovery_session_page', 25 );
