(function () {
	function slotsForDayOfWeek(dow) {
		// 0 Sun … 6 Sat; weekdays 1–5 only in UI
		if (dow === 1 || dow === 3 || dow === 5) {
			return ['9:00am', '11:00am', '1:30pm', '3:30pm'];
		}
		if (dow === 2 || dow === 4) {
			return ['10:00am', '12:00pm', '2:00pm', '4:00pm'];
		}
		return [];
	}

	function initMock(root) {
		var grid = root.querySelector('.tr-contact-calendly__mock-grid');
		var dateLabel = root.querySelector('.js-tr-calendly-date-label');
		var slotsUl = root.querySelector('.js-tr-calendly-slots');
		var live = root.querySelector('.js-tr-calendly-live');
		if (!grid || !dateLabel || !slotsUl) {
			return;
		}

		var dayBtns = grid.querySelectorAll('.tr-contact-calendly__mock-day-btn.is-available');
		var selectedDayBtn = grid.querySelector('.tr-contact-calendly__mock-day-btn.is-selected');
		if (!selectedDayBtn && dayBtns.length) {
			selectedDayBtn = dayBtns[0];
			selectedDayBtn.classList.add('is-selected');
			selectedDayBtn.setAttribute('aria-pressed', 'true');
		}

		function renderSlotsForButton(btn) {
			var dayNum = parseInt(btn.getAttribute('data-day'), 10);
			if (!dayNum) {
				return;
			}
			var d = new Date(2025, 10, dayNum);
			var slots = slotsForDayOfWeek(d.getDay());
			slotsUl.innerHTML = '';
			slots.forEach(function (t, i) {
				var li = document.createElement('li');
				var b = document.createElement('button');
				b.type = 'button';
				b.setAttribute('data-time', t);
				b.textContent = t;
				b.setAttribute('aria-pressed', i === 0 ? 'true' : 'false');
				if (i === 0) {
					b.classList.add('is-selected');
				}
				li.appendChild(b);
				slotsUl.appendChild(li);
			});
			bindSlotClicks();
			updateLive(btn, slotsUl.querySelector('button.is-selected'));
		}

		function updateLive(dayBtn, slotBtn) {
			if (!live || !dayBtn || !slotBtn) {
				return;
			}
			var dl = dayBtn.getAttribute('data-label') || '';
			var tm = slotBtn.getAttribute('data-time') || slotBtn.textContent || '';
			live.textContent =
				dl && tm
					? 'Selected (demo): ' + dl + ' at ' + tm
					: '';
		}

		function bindSlotClicks() {
			slotsUl.querySelectorAll('button').forEach(function (btn) {
				btn.addEventListener('click', function () {
					slotsUl.querySelectorAll('button').forEach(function (b) {
						b.classList.remove('is-selected');
						b.setAttribute('aria-pressed', 'false');
					});
					btn.classList.add('is-selected');
					btn.setAttribute('aria-pressed', 'true');
					var daySel = grid.querySelector(
						'.tr-contact-calendly__mock-day-btn.is-selected'
					);
					if (daySel) {
						updateLive(daySel, btn);
					}
				});
			});
		}

		dayBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				dayBtns.forEach(function (b) {
					b.classList.remove('is-selected');
					b.setAttribute('aria-pressed', 'false');
				});
				btn.classList.add('is-selected');
				btn.setAttribute('aria-pressed', 'true');
				var label = btn.getAttribute('data-label');
				if (label) {
					dateLabel.textContent = label;
				}
				renderSlotsForButton(btn);
			});
		});

		if (selectedDayBtn) {
			var dl0 = selectedDayBtn.getAttribute('data-label');
			if (dl0) {
				dateLabel.textContent = dl0;
			}
			renderSlotsForButton(selectedDayBtn);
		}
	}

	document.querySelectorAll('.js-tr-calendly-mock').forEach(initMock);
})();
