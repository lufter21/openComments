//label
function initOverLabels () {
	if (!document.getElementById) return; 
	var labels, id, field;
	labels = document.getElementsByTagName('label');
	for (var i = 0; i < labels.length; i++) {
		if (labels[i].className == 'overlabel') {
			id = labels[i].htmlFor || labels[i].getAttribute('for');
			if (!id || !(field = document.getElementById(id))) {
				continue;
			} 
			labels[i].className = 'overlabel-apply';
			if (field.value !== '') {
				hideLabel(field.getAttribute('id'), true);
			}
			field.onfocus = function () {
				hideLabel(this.getAttribute('id'), true);
			};
			field.onblur = function () {
				if (this.value === '') {
					hideLabel(this.getAttribute('id'), false);
				}
			};
			labels[i].onclick = function () {
				var id, field;
				id = this.getAttribute('for');
				if (id && (field = document.getElementById(id))) {
					field.focus();
				}
			};
		}
	}
}

function hideLabel (field_id, hide) {
	var field_for;
	var labels = document.getElementsByTagName('label');
	for (var i = 0; i < labels.length; i++) {
		field_for = labels[i].htmlFor || labels[i].getAttribute('for');
		if (field_for == field_id) {
			labels[i].style.textIndent = (hide) ? '-4000px' : '0';
			labels[i].style.paddingLeft = (hide) ? '0' : '';
			labels[i].style.paddingRight = (hide) ? '0' : '';
			return true;
		}
	}
}

//validateForm
var Form = {
	input: null,
	error: function(err,sec,trd) {
		var Field = this.input.closest('.form__field'),
		ErrTip = Field.find('.form__error-tip');

		if (!err) {
			Field.removeClass('form__field_error');
		} else {
			Field.addClass('form__field_error');

			if (trd) {
				if (!ErrTip.attr('data-first-error-text')) {
					ErrTip.attr('data-first-error-text', ErrTip.html());
				}

				ErrTip.html(ErrTip.attr('data-third-error-text'));
			} else if (sec) {
				if (!ErrTip.attr('data-first-error-text')) {
					ErrTip.attr('data-first-error-text', ErrTip.html());
				}

				ErrTip.html(ErrTip.attr('data-second-error-text'));
			} else {
				if (ErrTip.attr('data-first-error-text')) {
					ErrTip.html(ErrTip.attr('data-first-error-text'));
				}
			}
		}
	},
	youtube_link: function() {
		var _ = this,
		err = false;
		if (!/(?:youtube.*?\?v=|youtu\.be.*?)([\w\-]+)(?:$|\&)/i.test(_.input.val())) {
			_.error(true, true);
			err = true;
		} else {
			_.error(false);
		}
		return err;
	},
	keyup: function(inp) {
		var _ = this;
		_.input = $(inp);
		var type = _.input.attr('data-type');
		if (_.input.hasClass('tested')) {
			_[type]();
		}
	},
	validate: function(form) {
		var _ = this,
		err = 0,
		_form = $(form);

		_form.find('.form__text-input, .form__textarea').each(function() {
			_.input = $(this);

			var type = _.input.attr('data-type'),
			hidden = _.input.closest('.form__field_hidden, .form__fieldset_hidden');

			if (!hidden.length) {
				_.input.addClass('tested');

				if (_.input.attr('data-required') && _.input.val().length < 1) {
					_.error(true);
					err++;
				} else if (_.input.val().length > 0) {
					_.error(false);
					if (type && _[type]()) {
						err++;
					}
				} else {
					_.error(false);
				}

				if (type == 'pass' && _.pass()) {
					err++;
				}
			}

		});

		if (!err) {
			_form.removeClass('form_error');
		} else {
			_form.addClass('form_error');
		}

		return !err;
	},
	
	submitButton: function(f, st) {
		var Form = $(f),
		Button = Form.find('button[type="submit"], input[type="submit"]');
		if (st) {
			Button.prop('disabled', false).removeClass('form__button_loading');
		} else {
			Button.prop('disabled', true).addClass('form__button_loading');
		}
	},
	clearForm: function(f, st) {
		var Form = $(f);
		if (st) {
			Form.find('.form__text-input, .form__textarea').val('');
			Form.find('.overlabel-apply').attr('style','');
			Form.find('.form__textarea-mirror').html('');
		}
	},
	submit: function(el, form) {
		var _ = this;
		$('body').on('change', '.form__file-input', function(e) {
			_.file(this, e);
		});
		$('body').on('input', '.form__text-input', function() {
			_.keyup(this);
		});
		$('body').on('submit', el, function() {
			var f = this;
			if (_.validate(f)) {
				_.submitButton(f, false);
				if (form !== undefined) {
					form(f, function(unlockBtn, clearForm) {
						_.submitButton(f, unlockBtn);
						_.clearForm(f, clearForm);
					});
				} else {
					return true;
				}
			}
			return false;
		});
	}
};

$(document).ready(function() {
	$('label').each(function(i) {
		var _$ = $(this),
		sibLabel = _$.siblings('label'),
		Input = _$.siblings('input, textarea');

		if (!_$.attr('for') && !Input.attr('id')) {
			_$.attr('for', 'keylabel-'+ i);
			sibLabel.attr('for', 'keylabel-'+ i);
			Input.attr('id', 'keylabel-'+ i);
		}
	});

	initOverLabels();
});