(function () {
	var blocks = document.querySelectorAll('[data-tr-trust-logos-client]');

	if (!blocks.length) {
		return;
	}

	blocks.forEach(function (block) {
		var viewport = block.querySelector('.tr-trust-logos-client__viewport');
		var prevBtn = block.querySelector('.tr-trust-logos-client__btn--prev');
		var nextBtn = block.querySelector('.tr-trust-logos-client__btn--next');
		var track = block.querySelector('.tr-trust-logos-client__track');
		var thumb = block.querySelector('.tr-trust-logos-client__track-thumb');

		if (!viewport || !prevBtn || !nextBtn || !track || !thumb) {
			return;
		}

		var drag = null;

		function maxScroll() {
			return Math.max(0, viewport.scrollWidth - viewport.clientWidth);
		}

		function getMetrics() {
			var scrollMax = maxScroll();
			var trackWidth = track.clientWidth;
			var ratio = viewport.clientWidth / viewport.scrollWidth;
			var thumbWidth = Math.max(trackWidth * ratio, 32);
			var travel = Math.max(trackWidth - thumbWidth, 0);

			return {
				scrollMax: scrollMax,
				trackWidth: trackWidth,
				thumbWidth: thumbWidth,
				travel: travel,
			};
		}

		function scrollFromThumbOffset(thumbOffset) {
			var metrics = getMetrics();

			if (metrics.scrollMax <= 0) {
				return;
			}

			var clamped =
				metrics.travel > 0
					? Math.min(metrics.travel, Math.max(0, thumbOffset))
					: 0;
			var progress = metrics.travel > 0 ? clamped / metrics.travel : 0;

			viewport.scrollLeft = progress * metrics.scrollMax;
		}

		function updateUi() {
			var metrics = getMetrics();

			if (metrics.scrollMax <= 0) {
				block.classList.add('is-static');
				return;
			}

			block.classList.remove('is-static');

			var progress =
				metrics.scrollMax > 0 ? viewport.scrollLeft / metrics.scrollMax : 0;

			thumb.style.width = metrics.thumbWidth + 'px';
			thumb.style.transform =
				'translateX(' +
				metrics.travel * progress +
				'px) translateY(-50%)';

			prevBtn.disabled = viewport.scrollLeft <= 1;
			nextBtn.disabled = viewport.scrollLeft >= metrics.scrollMax - 1;
		}

		function scrollByDirection(direction) {
			var amount = Math.max(viewport.clientWidth * 0.75, 200);

			viewport.scrollBy({
				left: direction * amount,
				behavior: 'smooth',
			});
		}

		function endDrag(event) {
			if (!drag || event.pointerId !== drag.pointerId) {
				return;
			}

			if (thumb.releasePointerCapture) {
				thumb.releasePointerCapture(event.pointerId);
			}

			thumb.classList.remove('is-dragging');
			drag = null;
		}

		prevBtn.addEventListener('click', function () {
			scrollByDirection(-1);
		});

		nextBtn.addEventListener('click', function () {
			scrollByDirection(1);
		});

		thumb.addEventListener('pointerdown', function (event) {
			if (event.button !== 0) {
				return;
			}

			event.preventDefault();
			event.stopPropagation();

			var metrics = getMetrics();

			if (metrics.scrollMax <= 0) {
				return;
			}

			drag = {
				pointerId: event.pointerId,
				startX: event.clientX,
				startScrollLeft: viewport.scrollLeft,
				travel: metrics.travel,
				scrollMax: metrics.scrollMax,
			};

			thumb.classList.add('is-dragging');

			if (thumb.setPointerCapture) {
				thumb.setPointerCapture(event.pointerId);
			}
		});

		thumb.addEventListener('pointermove', function (event) {
			if (!drag || event.pointerId !== drag.pointerId) {
				return;
			}

			event.preventDefault();

			if (drag.travel <= 0) {
				return;
			}

			var deltaX = event.clientX - drag.startX;
			var deltaScroll = (deltaX / drag.travel) * drag.scrollMax;

			viewport.scrollLeft = drag.startScrollLeft + deltaScroll;
		});

		thumb.addEventListener('pointerup', endDrag);
		thumb.addEventListener('pointercancel', endDrag);

		track.addEventListener('pointerdown', function (event) {
			if (event.button !== 0 || event.target === thumb) {
				return;
			}

			var metrics = getMetrics();

			if (metrics.scrollMax <= 0) {
				return;
			}

			event.preventDefault();

			var clickX = event.clientX - track.getBoundingClientRect().left;
			var thumbOffset = clickX - metrics.thumbWidth / 2;

			scrollFromThumbOffset(thumbOffset);
		});

		viewport.addEventListener('scroll', updateUi, { passive: true });
		window.addEventListener('resize', updateUi, { passive: true });

		if (typeof ResizeObserver !== 'undefined') {
			new ResizeObserver(updateUi).observe(viewport);
		}

		updateUi();
	});
})();
