document.addEventListener('DOMContentLoaded', function (arg){
	// SIGN UP BUTTONS, FIELD, AND FORM
	var signUpBtn = document.getElementById('nav6');
	var signUpField = document.getElementById('sign_up_field');
	var signUpForm = document.getElementById('SignUpForm');
	var signUpSubmitBtn = document.getElementById('sign_up_submit_button');
	var signUpCloseBtn = document.getElementById('sign_up_close_button');
	
	// LOGIN BUTTON, FIELD, AND FORM
	// LOGIN BUTTON MISSING
	var loginField = document.getElementById('login_field');
	var loginForm = document.getElementById('LoginForm');
	
	// SIGN UP INPUT FIELDS
	var signUpFullNameField = document.getElementById('sign_up_full_name');
	var signUpEmailField = document.getElementById('sign_up_email');
	var signUpPasswordField = document.getElementById('sign_up_password');
	var signUpConfirmationField = document.getElementById('sign_up_confirm_password');
	
	// SIGN UP EVENT HANDLER
	signUpBtn.onclick = function (arg){
		signUpField.style.display = 'block';
	};
	
	signUpForm.onclick = function (arg){
		arg.stopPropagation();
	};
	
	signUpField.onclick = function (arg){
		signUpField.style.display = 'none';
	};
	
	signUpCloseBtn.onclick = function (arg){
		signUpField.style.display = 'none';
	};
	
	signUpSubmitBtn.onclick = function (arg){
		var fullName = signUpFullNameField.value;
		var email = signUpEmailField.value;
		var password = signUpPasswordField.value;
		var confirmation = signUpConfirmationField.value;
		console.log(fullName, email, password, confirmation);
	};
	
	// LOGIN EVENT HANDLER
	loginField.onclick = function (arg){
		loginField.style.display = 'none';
	};
	
	loginForm.onclick = function (arg){
		arg.stopPropagation();
	};
});