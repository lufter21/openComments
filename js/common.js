$(document).ready(function(){

	var winW = $(window).width(),
	winH = $(window).height();

	$('.wrapper, .wrapper__full-height').css('padding-bottom', $('.footer').innerHeight());

	$('#slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	$('.scroll-pane').jScrollPane();

	flexImage(winW);

	overfrowImg();


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

	Form.submit('#form1', function(form, callback) {
		var $f = $(form);
		Popup.message('#message-popup', 'Форма отправлена', function() {
			callback(true);
		});
		/*$.ajax({
			url: $f.attr('action'),
			type:"POST",
			dataType:"html",
			data: $f.serialize(), //new FormData(form),
			success: function(response){
				Popup.message('#message-popup', response);
				callback(true);
			},
			error: function() {
				alert('Send Error');
			}
		});*/
		
	});

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
				$('#replay-comments-container').append(response);
				callback(true, true);
			},
			error: function() {
				alert('Send Error');
			}
		});
	});

	Form.submit('#form3');

});