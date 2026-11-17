(function () {
	function positionGlider(root) {
		var tablist = root.querySelector('.tr-contact-tabs');
		var glider = root.querySelector('.tr-contact-tabs__glider');
		var active = root.querySelector('.tr-contact-tabs__tab.is-active');
		if (!tablist || !glider || !active) {
			return;
		}
		var listRect = tablist.getBoundingClientRect();
		var tabRect = active.getBoundingClientRect();
		var offsetX = tabRect.left - listRect.left;
		var offsetY = tabRect.top - listRect.top;
		glider.style.width = tabRect.width + 'px';
		glider.style.height = tabRect.height + 'px';
		glider.style.transform = 'translate(' + offsetX + 'px, ' + offsetY + 'px)';
	}

	function activateTab(root, tabName, options) {
		options = options || {};
		var tabs = root.querySelectorAll('[data-tr-contact-tab]');
		var panels = root.querySelectorAll('[data-tr-contact-panel]');
		var tablist = root.querySelector('.tr-contact-tabs');
		tabs.forEach(function (tab) {
			var isActive = tab.getAttribute('data-tr-contact-tab') === tabName;
			tab.classList.toggle('is-active', isActive);
			tab.setAttribute('aria-selected', isActive ? 'true' : 'false');
			tab.tabIndex = isActive ? 0 : -1;
		});
		panels.forEach(function (panel) {
			var isActive = panel.getAttribute('data-tr-contact-panel') === tabName;
			panel.classList.toggle('is-active', isActive);
			if (isActive) {
				panel.removeAttribute('hidden');
			} else {
				panel.setAttribute('hidden', '');
			}
		});
		if (tablist) {
			tablist.setAttribute('data-active', tabName);
		}
		positionGlider(root);
		if (!options.skipHash && window.history && window.history.replaceState) {
			var hash = tabName === 'message' ? '#message' : '#snapshot';
			window.history.replaceState(null, '', hash);
		}
	}

	function queryToTab() {
		try {
			var params = new URLSearchParams(window.location.search);
			var form = params.get('form');
			if (form === 'message' || form === 'snapshot') {
				return form;
			}
		} catch (e) {
			return null;
		}
		return null;
	}

	function hashToTab() {
		var h = (window.location.hash || '').replace('#', '');
		if (h === 'message') {
			return 'message';
		}
		if (h === 'snapshot' || h === 'schedule') {
			return 'snapshot';
		}
		return 'snapshot';
	}

	function initialTab() {
		return queryToTab() || hashToTab();
	}

	function stickyHeaderOffset() {
		var header = document.querySelector('.tr-site-header');
		if (header) {
			var rect = header.getBoundingClientRect();
			var extra = 20;
			if (document.body.classList.contains('admin-bar')) {
				extra = 12;
			}
			return rect.height + extra;
		}
		var rootStyle = getComputedStyle(document.documentElement);
		var cssVar = rootStyle.getPropertyValue('--tr-sticky-header-height').trim();
		if (cssVar) {
			var probe = document.createElement('div');
			probe.style.cssText = 'position:absolute;visibility:hidden;height:' + cssVar;
			document.documentElement.appendChild(probe);
			var height = probe.offsetHeight;
			document.documentElement.removeChild(probe);
			return height + 20;
		}
		return 140;
	}

	function scrollContactTabsIntoView(root, behavior) {
		if (!root) {
			return;
		}
		var hash = (window.location.hash || '').replace('#', '');
		var anchor =
			hash === 'message' || hash === 'snapshot' || hash === 'schedule'
				? root.querySelector('#' + (hash === 'schedule' ? 'snapshot' : hash))
				: null;
		var target = anchor && anchor.classList.contains('tr-contact-hash-anchor') ? anchor : root;
		var top = target.getBoundingClientRect().top + window.pageYOffset - stickyHeaderOffset();
		window.scrollTo({ top: Math.max(0, top), behavior: behavior || 'auto' });
	}

	function initRoot(root) {
		var tabs = root.querySelectorAll('[data-tr-contact-tab]');
		if (!tabs.length) {
			return;
		}
		tabs.forEach(function (tab) {
			tab.addEventListener('click', function () {
				activateTab(root, tab.getAttribute('data-tr-contact-tab'));
			});
			tab.addEventListener('keydown', function (e) {
				var keys = ['ArrowLeft', 'ArrowRight', 'Home', 'End'];
				if (keys.indexOf(e.key) === -1) {
					return;
				}
				e.preventDefault();
				var list = Array.prototype.slice.call(tabs);
				var idx = list.indexOf(tab);
				if (e.key === 'Home') {
					idx = 0;
				} else if (e.key === 'End') {
					idx = list.length - 1;
				} else if (e.key === 'ArrowRight') {
					idx = (idx + 1) % list.length;
				} else if (e.key === 'ArrowLeft') {
					idx = (idx - 1 + list.length) % list.length;
				}
				list[idx].focus();
				activateTab(root, list[idx].getAttribute('data-tr-contact-tab'));
			});
		});
		function contactTabFromHref(href) {
			if (!href) {
				return null;
			}
			var hashIdx = href.indexOf('#');
			if (hashIdx === -1) {
				return null;
			}
			var fragment = href.slice(hashIdx + 1);
			if (fragment === 'schedule') {
				fragment = 'snapshot';
			}
			if (fragment === 'snapshot' || fragment === 'message') {
				return fragment;
			}
			return null;
		}

		document.querySelectorAll('a[href*="#snapshot"], a[href*="#message"], a[href*="#schedule"]').forEach(function (link) {
			link.addEventListener('click', function (e) {
				var target = contactTabFromHref(link.getAttribute('href') || '');
				if (target !== 'snapshot' && target !== 'message') {
					return;
				}
				if (!root.querySelector('[data-tr-contact-panel="' + target + '"]')) {
					return;
				}
				e.preventDefault();
				activateTab(root, target, { skipHash: true });
				window.location.hash = target;
				scrollContactTabsIntoView(root, 'smooth');
			});
		});
		activateTab(root, initialTab(), { skipHash: true });
		if (window.location.hash || queryToTab()) {
			requestAnimationFrame(function () {
				scrollContactTabsIntoView(root, 'auto');
			});
		}
		window.addEventListener('hashchange', function () {
			activateTab(root, hashToTab(), { skipHash: true });
			scrollContactTabsIntoView(root, 'smooth');
		});
		window.addEventListener('resize', function () {
			positionGlider(root);
		});
		if (typeof ResizeObserver !== 'undefined' && root.querySelector('.tr-contact-tabs')) {
			var ro = new ResizeObserver(function () {
				positionGlider(root);
			});
			ro.observe(root.querySelector('.tr-contact-tabs'));
		}
	}

	document.querySelectorAll('.js-tr-contact-tabs').forEach(initRoot);

	document.querySelectorAll('.js-tr-contact-form').forEach(function (form) {
		form.addEventListener('submit', function (e) {
			if (form.reportValidity()) {
				return;
			}
			e.preventDefault();
			var firstInvalid = form.querySelector(':invalid');
			if (firstInvalid && typeof firstInvalid.focus === 'function') {
				firstInvalid.focus();
			}
		});
	});
})();