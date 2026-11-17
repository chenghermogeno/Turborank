/**
 * Countdown for webinar live hero (data-tr-countdown ISO 8601 target).
 */
(function () {
	'use strict';

	function pad2(n) {
		return n < 10 ? '0' + n : String(n);
	}

	function parseTarget(el) {
		var raw = el.getAttribute('data-tr-countdown');
		if (!raw) {
			return null;
		}
		var t = Date.parse(raw);
		return isNaN(t) ? null : t;
	}

	function tick(el, target) {
		var now = Date.now();
		var diff = target - now;
		var daysEl = el.querySelector('[data-tr-cd="days"]');
		var hoursEl = el.querySelector('[data-tr-cd="hours"]');
		var minsEl = el.querySelector('[data-tr-cd="minutes"]');
		var secsEl = el.querySelector('[data-tr-cd="seconds"]');

		if (diff <= 0) {
			if (daysEl) { daysEl.textContent = '0'; }
			if (hoursEl) { hoursEl.textContent = pad2(0); }
			if (minsEl) { minsEl.textContent = pad2(0); }
			if (secsEl) { secsEl.textContent = pad2(0); }
			var label = el.querySelector('.tr-webinar-live-countdown__label');
			if (label) {
				label.textContent = 'Live now';
			}
			var regWrap = el.querySelector('.tr-webinar-live-countdown__register-wrap');
			if (regWrap) {
				regWrap.removeAttribute('hidden');
			}
			return false;
		}

		var sec = Math.floor(diff / 1000);
		var d = Math.floor(sec / 86400);
		sec -= d * 86400;
		var h = Math.floor(sec / 3600);
		sec -= h * 3600;
		var m = Math.floor(sec / 60);
		sec -= m * 60;
		var s = sec;

		if (daysEl) { daysEl.textContent = String(d); }
		if (hoursEl) { hoursEl.textContent = pad2(h); }
		if (minsEl) { minsEl.textContent = pad2(m); }
		if (secsEl) { secsEl.textContent = pad2(s); }
		return true;
	}

	function init(root) {
		var el = root.querySelector('.tr-webinar-live-countdown[data-tr-countdown]');
		if (!el) {
			return;
		}
		var target = parseTarget(el);
		if (target === null) {
			return;
		}
		var id = setInterval(function () {
			if (!tick(el, target)) {
				clearInterval(id);
			}
		}, 1000);
		tick(el, target);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			init(document);
		});
	} else {
		init(document);
	}
}());
