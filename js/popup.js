var Popup = {
	show: function(id) {
		var _ = this,
		_popup = $(id);
		_.Pop = _popup;
		if (_popup.length && _popup.hasClass('popup__window')) {
			var pos = $(window).scrollTop();
			$('.popup').fadeIn(321).scrollTop(0);
			$('.popup__window').removeClass('popup__window_visible');
			_popup.addClass('popup__window_visible');
			$('body').css('top', -pos).attr('data-position', pos).addClass('is-popup-opened');
		}
	},
	hide: function() {
		var _ = this;
		$('.popup__window').removeClass('popup__window_visible');
		$('.popup').fadeOut(321);
		$('body').removeClass('is-popup-opened').removeAttr('style');
		$('html,body').scrollTop($('body').attr('data-position'));
	}
};


$(document).ready(function() {
	$('body').on('click', '.js-open-popup', function () {
		Popup.show($(this).attr('href'));
		return false;
	});

	$('body').on('click', '.popup__close', function () {
		Popup.hide();
		return false;
	});

	$('body').on('click', '.popup', function(e) {
		if (!$(e.target).closest('.popup__window').length) {
			Popup.hide();
		}
	});

	if (window.location.hash) {
		Popup.show(window.location.hash);
	}

});