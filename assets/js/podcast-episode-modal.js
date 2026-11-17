(function () {
	'use strict';

	var modal = document.getElementById('tr-podcast-episode-modal');
	if (!modal) {
		return;
	}

	var titleEl = modal.querySelector('.tr-podcast-modal__title');
	var dateEl = modal.querySelector('.tr-podcast-modal__date');
	var durationEl = modal.querySelector('.tr-podcast-modal__duration');
	var descEl = modal.querySelector('.tr-podcast-modal__description');
	var closeEls = modal.querySelectorAll('[data-tr-podcast-modal-close]');
	var lastFocus = null;

	function openModal(trigger) {
		if (!trigger) {
			return;
		}

		lastFocus = document.activeElement;

		if (titleEl) {
			titleEl.textContent = trigger.getAttribute('data-episode-title') || '';
		}
		if (dateEl) {
			dateEl.textContent = trigger.getAttribute('data-episode-date') || '';
		}
		if (durationEl) {
			durationEl.textContent = trigger.getAttribute('data-episode-duration') || '';
		}
		if (descEl) {
			descEl.textContent = trigger.getAttribute('data-episode-description') || '';
		}

		modal.hidden = false;
		document.documentElement.classList.add('tr-podcast-modal-open');

		var closeBtn = modal.querySelector('.tr-podcast-modal__close');
		if (closeBtn) {
			closeBtn.focus();
		}
	}

	function closeModal() {
		modal.hidden = true;
		document.documentElement.classList.remove('tr-podcast-modal-open');
		if (lastFocus && typeof lastFocus.focus === 'function') {
			lastFocus.focus();
		}
	}

	document.addEventListener('click', function (event) {
		var trigger = event.target.closest(
			'.tr-video-hub--podcast .tr-video-hub-episode__play[data-episode-title]'
		);
		if (!trigger) {
			return;
		}

		event.preventDefault();
		openModal(trigger);
	});

	closeEls.forEach(function (el) {
		el.addEventListener('click', closeModal);
	});

	document.addEventListener('keydown', function (event) {
		if (event.key === 'Escape' && !modal.hidden) {
			closeModal();
		}
	});
})();
