(function () {
	var PX_PER_SEC = 72;
	var motionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');

	function ensureGroups(track, viewport) {
		var sourceGroup = track.querySelector('.tr-logo-marquee__group');
		if (!sourceGroup) {
			return null;
		}

		var groups = track.querySelectorAll('.tr-logo-marquee__group');
		for (var i = groups.length - 1; i > 0; i -= 1) {
			groups[i].remove();
		}

		var minWidth = Math.max(viewport.clientWidth * 2, 1);
		while (track.scrollWidth < minWidth) {
			var clone = sourceGroup.cloneNode(true);
			clone.setAttribute('aria-hidden', 'true');
			track.appendChild(clone);
		}

		return sourceGroup;
	}

	function startTrack(track) {
		if (motionQuery.matches) {
			return;
		}

		var viewport = track.closest('.tr-logo-marquee__viewport');
		if (!viewport) {
			return;
		}

		var sourceGroup = ensureGroups(track, viewport);
		if (!sourceGroup) {
			return;
		}

		if (track._marqueeAnim) {
			track._marqueeAnim.cancel();
			track._marqueeAnim = null;
		}

		var distance = Math.round(sourceGroup.getBoundingClientRect().width);
		if (distance <= 0) {
			return;
		}

		track.style.animation = 'none';
		track.style.transform = 'translate3d(0, 0, 0)';

		var duration = Math.max((distance / PX_PER_SEC) * 1000, 22000);
		track._marqueeAnim = track.animate(
			[
				{ transform: 'translate3d(0, 0, 0)' },
				{ transform: 'translate3d(' + -distance + 'px, 0, 0)' },
			],
			{
				duration: duration,
				iterations: Infinity,
				easing: 'linear',
			}
		);

		track.classList.add('is-tr-marquee-ready');

		var marquee = track.closest('.tr-logo-marquee');
		if (!marquee || marquee.dataset.trMarqueeHover === '1') {
			return;
		}

		marquee.dataset.trMarqueeHover = '1';
		marquee.addEventListener('mouseenter', function () {
			if (track._marqueeAnim) {
				track._marqueeAnim.pause();
			}
		});
		marquee.addEventListener('mouseleave', function () {
			if (track._marqueeAnim) {
				track._marqueeAnim.play();
			}
		});
	}

	function refreshAll() {
		document.querySelectorAll('.tr-logo-marquee__track').forEach(startTrack);
	}

	function init() {
		if (!document.querySelector('.tr-logo-marquee__track')) {
			return;
		}

		refreshAll();

		var resizeTimer;
		window.addEventListener('resize', function () {
			window.clearTimeout(resizeTimer);
			resizeTimer = window.setTimeout(refreshAll, 150);
		});

		if (document.fonts && document.fonts.ready) {
			document.fonts.ready.then(refreshAll);
		}

		motionQuery.addEventListener('change', function () {
			if (motionQuery.matches) {
				document.querySelectorAll('.tr-logo-marquee__track').forEach(function (track) {
					if (track._marqueeAnim) {
						track._marqueeAnim.cancel();
						track._marqueeAnim = null;
					}
				});
				return;
			}
			refreshAll();
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();