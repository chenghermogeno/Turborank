(function ($) {
	'use strict';

	function bindField($field) {
		var $input = $field.find('.turborank-proof-image-id');
		var $preview = $field.find('.turborank-proof-image-preview');
		var $remove = $field.find('.turborank-proof-remove');
		var frame;

		$field.find('.turborank-proof-upload').on('click', function (event) {
			event.preventDefault();

			if (frame) {
				frame.open();
				return;
			}

			frame = wp.media({
				title: 'Citation screenshot',
				button: { text: 'Use this image' },
				library: { type: 'image' },
				multiple: false,
			});

			frame.on('select', function () {
				var attachment = frame.state().get('selection').first().toJSON();
				$input.val(attachment.id);
				$preview.html(
					'<img src="' +
						attachment.url +
						'" alt="" style="max-width:100%;height:auto;display:block;" />'
				);
				$remove.show();
			});

			frame.open();
		});

		$remove.on('click', function (event) {
			event.preventDefault();
			$input.val('0');
			$preview.empty();
			$remove.hide();
		});
	}

	$(function () {
		$('.turborank-proof-image-field').each(function () {
			bindField($(this));
		});
	});
})(jQuery);
