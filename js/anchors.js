$(document).ready(function() {
	$('body').on('click', '.js-anchor', function () {
		var anch = $(this).attr('href');

		if($(anch).length){
			var scrTo = $(anch).offset().top - $('.header').innerHeight() - 21;

			$('html, body').stop().animate({scrollTop: scrTo}, 921, 'easeInOutQuart', function() {
				$(anch).addClass('comm_bg');

				setTimeout(function() {
					$(anch).removeClass('comm_bg');
				}, 921);
			});
		}

		return false;
	});
});