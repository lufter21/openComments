function socAuth(data) {
	if(data){
		$.ajax({
			url:"/functions/auth.php",
			type:"POST",
			dataType:"json",
			data: 'token='+ data,
			success: function(response){
				if (response.msg == 'login') {
					window.location.reload();
				} else {
					$('#js_auth_msg').empty().append('<span>'+ response.msg +'</span>');
				}
			},
			error: function() {
				alert('auth:Error');
			}
		});
	}
}


$(document).ready(function(){
	Form.submit('#login-form, #registration-form', function(form, callback) {
		var $f = $(form);
		$.ajax({
			url: $f.attr('action'),
			type:"POST",
			dataType:"json",
			data: $f.serialize(),
			success: function(response){
				if (response.msg == 'login') {
					window.location.reload();
				} else {
					$('#js_auth_msg').empty().append('<span>'+ response.msg +'</span>');
					callback(true);
				}
			},
			error: function() {
				alert('auth:Error');
			}
		});
	});
});