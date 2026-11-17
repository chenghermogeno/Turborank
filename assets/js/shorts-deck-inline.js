(function () {
	'use strict';

	function embedSrc(id) {
		var params = new URLSearchParams({
			autoplay: '1',
			rel: '0',
			modestbranding: '1',
			playsinline: '1',
		});
		return 'https://www.youtube.com/embed/' + encodeURIComponent(id) + '?' + params.toString();
	}

	function resetCard(card) {
		if (!card) {
			return;
		}
		card.classList.remove('is-playing');
		var host = card.querySelector('.tr-video-hub-short-phone__embed');
		if (host) {
			host.hidden = true;
			host.textContent = '';
		}
		var poster = card.querySelector('.tr-video-hub-short-phone__poster');
		if (poster) {
			poster.hidden = false;
		}
		var btn = card.querySelector('.js-tr-shorts-deck-play');
		if (btn) {
			btn.hidden = false;
		}
	}

	function stopAllPlaying(container) {
		if (!container) {
			return;
		}
		container.querySelectorAll('.tr-video-hub-short-phone.is-playing').forEach(function (card) {
			resetCard(card);
		});
	}

	document.addEventListener('click', function (event) {
		var trigger = event.target.closest('.js-tr-shorts-deck-play');
		if (!trigger) {
			return;
		}
		var deckRoot = trigger.closest('.tr-video-hub-shorts-coverflow--hero');
		if (!deckRoot) {
			return;
		}

		var id = trigger.getAttribute('data-youtube-id');
		if (!id) {
			return;
		}

		event.preventDefault();
		event.stopPropagation();

		var card = trigger.closest('.tr-video-hub-short-phone');
		if (!card) {
			return;
		}

		var screenEl = card.querySelector('.tr-video-hub-short-phone__screen');
		var host = card.querySelector('.tr-video-hub-short-phone__embed');
		var poster = card.querySelector('.tr-video-hub-short-phone__poster');

		if (!screenEl || !host) {
			return;
		}

		stopAllPlaying(deckRoot);

		host.textContent = '';
		var iframe = document.createElement('iframe');
		iframe.src = embedSrc(id);
		iframe.title = trigger.getAttribute('data-video-title') || 'YouTube Short';
		iframe.setAttribute(
			'allow',
			'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'
		);
		iframe.setAttribute('allowfullscreen', '');
		iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
		host.appendChild(iframe);
		host.hidden = false;
		if (poster) {
			poster.hidden = true;
		}
		trigger.hidden = true;
		card.classList.add('is-playing');
	});
}());
