(function () {
	var body = document.body;

	if (body.classList.contains('tr-is-discovery-snapshot')) {
		return;
	}

	var docEl = document.documentElement;
	var headerPart = document.querySelector(
		'header.wp-block-template-part:has(.tr-site-header)'
	);
	var backToTop = document.getElementById('tr-back-to-top');

	function adminBarOffset() {
		if (!body.classList.contains('admin-bar')) {
			return 0;
		}

		return window.matchMedia('(max-width: 782px)').matches ? 46 : 32;
	}

	function updateHeaderOffset() {
		if (!headerPart) {
			return;
		}

		var top = adminBarOffset();
		headerPart.style.top = top + 'px';
		docEl.style.setProperty(
			'--tr-sticky-header-height',
			headerPart.offsetHeight + 'px'
		);
		docEl.style.setProperty(
			'--tr-mega-panel-top',
			top + headerPart.offsetHeight + 'px'
		);
	}

	if (headerPart) {
		updateHeaderOffset();
		window.addEventListener('resize', updateHeaderOffset, { passive: true });

		if (typeof ResizeObserver !== 'undefined') {
			new ResizeObserver(updateHeaderOffset).observe(headerPart);
		}
	}

	/* Mega menu: close control, outside click, Escape */
	var megas = document.querySelectorAll('.tr-nav-mega');
	if (megas.length) {
		megas.forEach(function (mega) {
			var closeBtn = mega.querySelector('.tr-nav-mega__close');
			if (closeBtn) {
				closeBtn.addEventListener('click', function (e) {
					e.preventDefault();
					mega.removeAttribute('open');
					var sum = mega.querySelector('summary');
					if (sum) {
						sum.focus();
					}
				});
			}
		});
		document.addEventListener('click', function (e) {
			megas.forEach(function (mega) {
				if (!mega.open || mega.contains(e.target)) {
					return;
				}
				mega.removeAttribute('open');
			});
		});
		document.addEventListener('keydown', function (e) {
			if (e.key !== 'Escape') {
				return;
			}
			megas.forEach(function (mega) {
				if (mega.open) {
					mega.removeAttribute('open');
				}
			});
		});
	}

	if (!backToTop) {
		return;
	}

	function toggleBackToTop() {
		backToTop.hidden = window.scrollY < 400;
	}

	toggleBackToTop();
	window.addEventListener('scroll', toggleBackToTop, { passive: true });

	backToTop.addEventListener('click', function () {
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});
})();
