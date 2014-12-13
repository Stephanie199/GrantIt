var alertBoxContainer = document.createElement('div');
alertBoxContainer.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
alertBoxContainer.style.position = 'fixed';
alertBoxContainer.style.left = alertBoxContainer.style.top = '0';
alertBoxContainer.style.display = 'none';
alertBoxContainer.style.width = alertBoxContainer.style.height = '100%';
alertBoxContainer.style.zIndex = '1001';

var alertMsgBox = document.createElement('div');
alertMsgBox.style.maxWidth = '30%';
alertMsgBox.style.backgroundColor = 'rgba(255, 255, 255, 1)';
alertMsgBox.style.borderRadius = '20px';
alertMsgBox.style.margin = '12.5% auto 0 auto';
alertMsgBox.style.padding = '20px';
alertMsgBox.textContent = 'Put your message here!';

alertBoxContainer.appendChild(alertMsgBox);
document.body.appendChild(alertBoxContainer);

alertBoxContainer.onclick = function (arg){
	this.style.display = 'none';
};

function createAlert(msg){
	alertMsgBox.textContent = msg;
	alertBoxContainer.style.display = 'block';
}



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
	signUpPasswordField.type = signUpConfirmationField.type = 'password';
	
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
		
		signUpFullNameField.name = 'sign_up_full_name';
		signUpEmailField.name = 'sign_up_email';
		signUpPasswordField.name = 'sign_up_password';
		signUpConfirmationField.name = 'sign_up_confirm_password';
		
		if(fullName && email && password && confirmation && (password == confirmation)){
			signUpForm.action = 'php/registration.php';
			signUpForm.target = '_top';
			signUpForm.method = 'post';
			signUpForm.submit();
		} else{
			createAlert('Please fill in all the fields!');
		}
	};
	
	// LOGIN EVENT HANDLER
	loginField.onclick = function (arg){
		loginField.style.display = 'none';
	};
	
	loginForm.onclick = function (arg){
		arg.stopPropagation();
	};
});