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
alertMsgBox.style.fontFamily = 'Segoe UI, Tahoma';
alertMsgBox.style.fontSize = '12pt';

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
	// var signUpBtn = document.getElementById('sign_up_simple_link');
	var signUpField = document.getElementById('sign_up_field');
	var signUpForm = document.getElementById('SignUpForm');
	var signUpSubmitBtn = document.getElementById('sign_up_submit_button');
	var signUpCloseBtn = document.getElementById('sign_up_close_button');
	var signUpSimpleBtn = document.getElementById('sign_up_simple_link');
	
	// LOGIN BUTTON, FIELD, AND FORM
	var loginBtn = document.getElementById('nav6');
	var loginField = document.getElementById('login_field');
	var loginForm = document.getElementById('LoginForm');
	var loginCloseBtn = document.getElementById('login_close_button');
	var loginSubmitBtn = document.getElementById('login_submit_button');
	var loginSimpleBtn = document.getElementById('login_simple_link');
	
	// SIGN UP INPUT FIELDS
	var signUpFullNameField = document.getElementById('sign_up_full_name');
	var signUpEmailField = document.getElementById('sign_up_email');
	var signUpPasswordField = document.getElementById('sign_up_password');
	var signUpConfirmationField = document.getElementById('sign_up_confirm_password');
	signUpPasswordField.type = signUpConfirmationField.type = 'password';
	
	// LOGIN INPUT FIELDS
	var loginEmailField = document.getElementById('login_email');
	var loginPasswordField = document.getElementById('login_password');
	loginPasswordField.type = 'password';
	
	// SIGN UP EVENT HANDLER
	/*
	// THERE IS NO SIGN UP BUTTON
	signUpBtn.onclick = function (arg){
		
	};
	*/
	
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
		} else if(password !== confirmation){
			createAlert('Password and confirm password must match!');
		} else{
			createAlert('Do not leave any fields blank!');
		}
	};
	
	signUpSimpleBtn.onclick = function (arg){
		loginField.style.display = 'none';
		signUpField.style.display = 'block';
	}
	
	// LOGIN EVENT HANDLER
	loginBtn.onclick = function (arg){
		loginField.style.display = 'block';
	};
	
	loginField.onclick = function (arg){
		loginField.style.display = 'none';
	};
	
	loginForm.onclick = function (arg){
		arg.stopPropagation();
	};
	
	loginCloseBtn.onclick = function (arg){
		loginField.style.display = 'none';
	};
	
	loginSimpleBtn.onclick = function (arg){
		signUpField.style.display = 'none';
		loginField.style.display = 'block';
	};
	
	loginSubmitBtn.onclick = function (arg){
		
	};
});