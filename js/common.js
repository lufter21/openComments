$(document).ready(function(){

	var winW = $(window).width(),
	winH = $(window).height();

	$('.wrapper, .wrapper__full-height').css('padding-bottom', $('.footer').innerHeight());

	//headerFix
	$(window).scroll(function () {
		if (!$('body').hasClass('is-popup-opened')) {
			var winScrTop = $(window).scrollTop();
			if (winScrTop > 21) {
				$('.header').addClass('header_fixed');
			} else {
				$('.header').removeClass('header_fixed');
			}
		}
	});

	//fixed block
	$('.fix-block').each(function() {
		var _$ = $(this),
		ofsT = _$.offset().top,
		ofsL = _$.offset().left,
		wd = _$.width();
		_$.css({width: wd, top: ofsT, left: ofsL}).addClass('fix-block_fixed');
	});

	Form.submit('#search-form');

	Form.submit('#comment-form', function(form, callback) {
		var $f = $(form);
		$.ajax({
			url: $f.attr('action'),
			type:"POST",
			dataType:"html",
			data: $f.serialize(),
			success: function(response){
				$('#comments-container').prepend(response);
				callback(true, true);
			},
			error: function() {
				alert('Send Error');
			}
		});
	});

	Form.submit('.js-replay-form', function(form, callback) {
		var $f = $(form);
		$.ajax({
			url: $f.attr('action'),
			type:"POST",
			dataType:"html",
			data: $f.serialize(),
			success: function(response){
				if ($f.closest('.comments__replay').length) {
					$f.closest('.comments__replay').append(response);
				} else {
					$f.closest('.comm').next('.comments__replay').append(response);
				}
				callback(true, true);
				$('.comm__replay-btn[data-target-id="'+ $f.attr('id') +'"]').click();
			},
			error: function() {
				alert('Send Error');
			}
		});
	});

});