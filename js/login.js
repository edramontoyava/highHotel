$(document).ready(function() {
	$('#loginForm').submit(function(e) {
		e.preventDefault();
		var email = $('#email').val();
		var password = $('#password').val();
		if (validateEmail(email) && validatePassword(password)) {
			this.submit();
		}
	});

	function validateEmail(email) {
		var re = /\S+@\S+\.\S+/;
		if (re.test(email)) {
			return true;
		} else {
			alert('Ingrese una dirección de correo electrónico válida.');
			return false;
		}
	}

	function validatePassword(password) {
		if (password.length >= 8) {
			return true;
		} else {
			alert('La contraseña debe tener al menos 8 caracteres.');
			return false;
		}
	}
});