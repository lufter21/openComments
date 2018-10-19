/*
* In common.js use only ECMAScript 5.1
*/

document.addEventListener('DOMContentLoaded', function() {
	(function initFun() {
		/*if (window.innerWidth < 1200) {
			var fsElem = document.querySelector('.first-screen');

			if (fsElem) {
				fsElem.style.height = window.innerHeight +'px';
			}
		}
		
		FlexImg('.flex-img');

		CoverImg.reInit('body');

		Tab.reInit();*/

		if (window.innerWidth > 1000) {
			fixedBlock();
		}

		window.addEventListener('winResized', initFun);
	})();

	//fixed block
	function fixedBlock() {
		var elements = document.querySelectorAll('.js-fix-block');

		for (var i = 0; i < elements.length; i++) {
			var elem = elements[i],
			s = elem.style;

			s.top = s.left = s.width = s.position = '';

			s.top = (elem.getBoundingClientRect().top + window.pageYOffset) +'px';
			s.left = (elem.getBoundingClientRect().left + window.pageXOffset) +'px';
			s.width = elem.offsetWidth +'px';
			s.position = 'fixed';
		}
	}

	//init cover images
	//CoverImg.init();

	//init toggle button
	Toggle.init('.js-toggle');

	//ajax button
	/*Ajax.init('.js-ajax');

	Ajax.success = function(response) {
		// code...
	}*/

	//popup init
	Popup.init('.js-open-popup');
	MediaPopup.init('.js-open-media-popup');

	//menu
	/*if (window.innerWidth < 1000) {
		Menu.init('.menu__item_has-children', '.menu__sub-menu');
	}*/

	//mobile nav
	MobNav.init({
		openBtn: '.js-open-menu',
		closeBtn: '.js-close-menu',
		navId: 'header-mob-menu'
	});

	//bubble
	Bubble.init({
		element: '.js-bubble'
	});

	//accord
	//Accord.init('.accord__button');

	//more
	More.init('.more__btn');

	//tab
	/*Tab.init({
		container: '.tab',
		button: '.tab__button',
		item: '.tab__item'
	});

	//video
	Video.init('.video__btn-play');

	//fullscreen scroll
	FsScroll.init({
		container: '.fsscroll',
		screen: '.fsscroll__screen',
		duration: 700
	});*/

	//anchor
	Anchor.init('.js-anchor', 700, 100);

	//diagram
	/*var diagram = new Diagram({
		canvasId: 'diagram',
		charts: [
		{
			value: 37,
			color: 'green',
			width: 20,
			numContId: 'diagram-num-1'
		},
		{
			value: 45,
			color: '#d0295e',
			width: 10,
			offset: 2,
			numContId: 'diagram-num-2'
		}
		],
		maxValue: 100
	});


	//diagram 2
	var diagram_2 = new Diagram({
		canvasId: 'diagram-2',
		charts: [
		{
			value: 84,
			color: '#fd8d40',
			width: 30,
			numContId: 'diagram-2-num-1'
		},
		{
			value: 39,
			color: '#0000ff',
			width: 30,
			offset: 2,
			numContId: 'diagram-2-num-2'
		}
		],
		maxValue: 100,
		animate: true
	});

	diagram_2.animate(2700);

	//diagram 2
	var diagram_3 = new Diagram({
		canvasId: 'diagram-3',
		charts: [
		{
			value: 67,
			color: '#fd8d40',
			width: 15,
			numContId: 'diagram-3-num-1'
		},
		{
			value: 75,
			color: '#d0295e',
			width: 15,
			offset: 2,
			numContId: 'diagram-3-num-2'
		},
		{
			value: 83,
			color: 'green',
			width: 15,
			offset: 2,
			numContId: 'diagram-3-num-3'
		},
		{
			value: 91,
			color: '#0000ff',
			width: 15,
			offset: 2,
			numContId: 'diagram-3-num-4'
		}
		],
		maxValue: 100,
		animate: true
	});

	diagram_3.animate(4200);

	//numberspin
	var numberspin = new Numberspin('.numberspin');

	numberspin.animate(4200);

	//share
	Share.init('.js-share-btn');

	//timer
	var timer = new Timer({
		elemId: 'timer'
	});

	timer.onStop = function() {
		Popup.message('#message-popup', 'Timer Stopped');
	}

	timer.start(50);


	var timer2 = new Timer({
		elemId: 'timer-2',
		format: 'extended'
	});

	timer2.onStop = function() {
		Popup.message('#message-popup', 'Timer 2 Stopped');
	}

	timer2.start(130);


	var stopwatch = new Timer({
		elemId: 'stopwatch', 
		stopwatch: true
	});

	stopwatch.onStop = function() {
		Popup.message('#message-popup', 'Stopwatch Stopped');
	}

	stopwatch.start(0);


	var stopwatch2 = new Timer({
		elemId: 'stopwatch-1', 
		stopwatch: true,
		format: 'extended'
	});

	stopwatch2.onStop = function() {
		Popup.message('#message-popup', 'Stopwatch Stopped');
	}

	stopwatch2.start(0);*/

	//submit searchForm
	new Form('#search-form');

	//submit form
	var form = new Form('#form');

	NextFieldset.init(form.form, '.form__button');

	form.onSubmit = function(form, callback) {
		
	}
	
	//submit ajaxForm
	var ajaxForm = new Form('#form-ajax');

	ajaxForm.onSubmit = function(form, callback) {
		ajax({
			url: form.action,
			send: new FormData(form),
			success: function(response) {
				var response = JSON.parse(response);

				if (response.status == 'sent') {
					Popup.message('#message-popup', 'Форма отправлена');

					callback({clearForm: true, unlockSubmitButton: true});
				} else {
					console.log(response);
				}
			},
			error: function(response) {
				console.log(response);
			}
		});
	}


	//submit noAjaxForm
	var noAjaxForm = new Form('#form-no-ajax');

	

	//custom form
	var custForm = new Form('#custom-form');

	//custom form 2
	var custForm2 = new Form('#custom-form-2');

	custForm2.onSubmit = function(form, callback) {
		var files = CustomFile.files(form);

		console.log(files);

		ajax({
			url: form.action,
			send: new FormData(form),
			success: function(response) {
				console.log(response);

				callback({clearForm: true, unlockSubmitButton: true});
			},
			error: function(response) {
				console.log(response);
				callback({unlockSubmitButton: true});
			}
		});
	}

	//add like
	document.addEventListener('click', function(e) {
		var likeBtnElem = e.target.closest('.js-like');

		if (!likeBtnElem) {
			return;
		}

		var countElem = likeBtnElem.querySelector('.comm__like-count'),
		commId = likeBtnElem.getAttribute('data-comment-id');

		ajax({
			url: '/functions/like-comment.php',
			send: 'comm_id='+ commId,
			success: function(response) {
				countElem.innerHTML = response;

				if (likeBtnElem.classList.contains('comm__like_add')) {
					likeBtnElem.classList.remove('comm__like_add');
				} else {
					likeBtnElem.classList.add('comm__like_add');
				}
			},
			error: function(response) {
				console.log(response);
			}
		});
	});
	

});

function socAuth(data) {
	if(data){
		ajax({
			url: '/functions/auth.php',
			send: 'token='+ data,
			success: function(response) {
				var response = JSON.parse(response);

				if (response.msg == 'login') {
					window.location.reload();
				} else {
					var authMsgDivElem = document.getElementById('js_auth_msg');

					authMsgDivElem.innerHTML = '';
					authMsgDivElem.innerHTML = '<span>'+ response.msg +'</span>';
				}
			},
			error: function(response) {
				alert('auth:Error');
			}
		});
	}
}

//GetCountriesAndCitiesList
/*function dAirGetInit() {
	dAirGet.countries(function(c) {
		var contryObj = JSON.parse(c);
		CustomSelect.setOptions('.countries', contryObj, 'name', 'name');
	});
}*/

/*
ajax({
	url: 'test-ajax.php',
	send: 'data=return1',
	success: function(response) {
		console.log(response);
	}
});
*/


//jQuery plugins
/*$(document).ready(function(){
	//slick slider
	$('#slider').on('init', function() {
		CoverImg.reInit('#slider');
	});

	$('#slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	//scroll pane
	//$('.scroll-pane').jScrollPane();

	//masked inputs
	//$('input[data-type="tel"]').mask('+7(999)999-99-99');
	$('input[data-type="tel"]').each(function() {
		new Maskinput(this, 'tel');
	});
	//$('input[data-type="date"]').mask('99.99.9999');
});*/
