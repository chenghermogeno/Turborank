(function () {
	var form = document.querySelector('.tr-dsession-booking-form');
	if (!form) {
		return;
	}

	var slotInput = form.querySelector('input[name="tr_slot"]');
	var slots = form.querySelectorAll('.tr-dsession-slot');
	var slotsGroup = form.querySelector('.tr-dsession-slots');

	slots.forEach(function (btn) {
		btn.addEventListener('click', function () {
			slots.forEach(function (other) {
				other.classList.remove('is-selected');
				other.setAttribute('aria-pressed', 'false');
			});
			btn.classList.add('is-selected');
			btn.setAttribute('aria-pressed', 'true');
			if (slotInput) {
				slotInput.value = btn.getAttribute('data-slot') || '';
			}
			if (slotsGroup) {
				slotsGroup.removeAttribute('data-invalid');
			}
		});
	});

	form.addEventListener('submit', function (event) {
		var validFields = form.checkValidity();
		var hasSlot = Boolean(slotInput && slotInput.value);

		if (!hasSlot && slotsGroup) {
			slotsGroup.setAttribute('data-invalid', 'true');
		}

		if (!validFields || !hasSlot) {
			event.preventDefault();
			if (!validFields) {
				form.reportValidity();
			} else if (slots[0]) {
				slots[0].focus();
			}
		}
	});
})();
