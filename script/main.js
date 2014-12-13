var grayScreen = document.createElement('div');
grayScreen.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
grayScreen.style.position = 'fixed';
grayScreen.style.left = grayScreen.style.top = '0';
grayScreen.style.display = 'none';
grayScreen.style.width = grayScreen.style.height = '100%';
grayScreen.style.zIndex = '1001';

var alertMsgBox = document.createElement('div');
alertMsgBox.style.maxWidth = '25%';
alertMsgBox.style.backgroundColor = '#faa';
alertMsgBox.style.borderRadius = '20px';
alertMsgBox.style.margin = '12.5% auto 0 auto';
alertMsgBox.style.padding = '20px';
alertMsgBox.textContent = 'Put your message here!';
alertMsgBox.style.fontFamily = 'Segoe UI, Tahoma';
alertMsgBox.style.fontSize = '12pt';
alertMsgBox.style.display = 'none';
alertMsgBox.style.border = '2px solid #f33';

var notifMsgBox = document.createElement('div');
notifMsgBox.style.maxWidth = '25%';
notifMsgBox.style.backgroundColor = '#ffa';
notifMsgBox.style.borderRadius = '20px';
notifMsgBox.style.margin = '6.25% auto 0 auto';
notifMsgBox.style.padding = '20px';
notifMsgBox.textContent = 'Put your message here!';
notifMsgBox.style.fontFamily = 'Segoe UI, Tahoma';
notifMsgBox.style.fontSize = '12pt';
notifMsgBox.style.display = 'none';
notifMsgBox.style.border = '2px solid #ff0';

grayScreen.appendChild(alertMsgBox);
grayScreen.appendChild(notifMsgBox);
document.body.appendChild(grayScreen);

grayScreen.onclick = function (arg){
	this.style.display = 'none';
	alertMsgBox.style.display = 'none';
	notifMsgBox.style.display = 'none';
};

function createAlert(msg){
	alertMsgBox.textContent = msg;
	grayScreen.style.display = 'block';
	alertMsgBox.style.display = 'block';
}

function createNotif(msg){
	notifMsgBox.textContent = msg;
	grayScreen.style.display = 'block';
	notifMsgBox.style.display = 'block';
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
		
		if(fullName && email && password && confirmation && (password == confirmation)){
			signUpFullNameField.name = 'sign_up_full_name';
			signUpEmailField.name = 'sign_up_email';
			signUpPasswordField.name = 'sign_up_password';
			signUpConfirmationField.name = 'sign_up_confirm_password';
			
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
		var email = loginEmailField.value;
		var password = loginPasswordField.value;
		
		if(email && password){
			loginEmailField.name = 'login_email';
			loginPasswordField.name = 'login_password';
			
			loginForm.action = 'php/authentication.php';
			loginForm.target = '_top';
			loginForm.method = 'post';
			loginForm.submit();
		} else{
			createAlert('Do not leave any fields blank!');
		}
	};
	
	var profileBtn = document.getElementById('nav2');
	profileBtn.style.display = 'none';
});