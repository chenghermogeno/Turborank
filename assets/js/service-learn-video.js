(function () {
	'use strict';

	var modal = document.getElementById('tr-video-modal');
	if (!modal) {
		return;
	}

	var frameHost = modal.querySelector('.tr-video-modal__frame');
	var titleEl = modal.querySelector('.tr-video-modal__title');
	var closeEls = modal.querySelectorAll('[data-tr-video-close]');
	var lastFocus = null;

	function embedSrc(id) {
		var params = new URLSearchParams({
			autoplay: '1',
			rel: '0',
			modestbranding: '1',
			playsinline: '1',
		});
		return 'https://www.youtube.com/embed/' + encodeURIComponent(id) + '?' + params.toString();
	}

	function openModal(id, title) {
		if (!id || !frameHost) {
			return;
		}

		lastFocus = document.activeElement;

		if (titleEl) {
			titleEl.textContent = title || '';
		}

		frameHost.textContent = '';
		var iframe = document.createElement('iframe');
		iframe.src = embedSrc(id);
		iframe.title = title || 'YouTube video';
		iframe.setAttribute(
			'allow',
			'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
		);
		iframe.setAttribute('allowfullscreen', '');
		iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
		// Match Shorts portrait frame (9:16) for YouTube’s embed layout
		iframe.width = '405';
		iframe.height = '720';
		frameHost.appendChild(iframe);

		modal.hidden = false;
		document.documentElement.classList.add('tr-video-modal-open');

		var closeBtn = modal.querySelector('.tr-video-modal__close');
		if (closeBtn) {
			closeBtn.focus();
		}
	}

	function closeModal() {
		modal.hidden = true;
		document.documentElement.classList.remove('tr-video-modal-open');
		if (frameHost) {
			frameHost.textContent = '';
		}
		if (lastFocus && typeof lastFocus.focus === 'function') {
			lastFocus.focus();
		}
	}

	document.addEventListener('click', function (event) {
		var trigger = event.target.closest('.js-tr-video-watch');
		if (!trigger) {
			return;
		}

		var id = trigger.getAttribute('data-youtube-id');
		if (!id) {
			return;
		}

		event.preventDefault();
		openModal(id, trigger.getAttribute('data-video-title') || '');
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
