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
	
	// PROFILE BUTTON IS VISIBLE IF USER IS LOGGED IN
	var profileBtn = document.getElementById('nav2');
	var logoutBtn = document.createElement('div');
	logoutBtn.style.position = 'absolute';
	logoutBtn.style.zIndex = '1002';
	logoutBtn.style.top = '0';
	logoutBtn.style.right = '0';
	logoutBtn.style.color = '#fff';
	logoutBtn.style.fontFamily = 'Segoe UI, Tahoma';
	logoutBtn.style.fontSize = '9pt';
	logoutBtn.style.display = 'none';
	logoutBtn.style.cursor = 'pointer';
	logoutBtn.style.fontWeight = 'normal';
	logoutBtn.style.background = '';
	logoutBtn.textContent = 'Log out';
	
	logoutBtn.onmouseenter = function (arg){
		this.style.textShadow = '0px 0px 3px #fff';
	};
	
	logoutBtn.onmouseleave = function (arg){
		this.style.textShadow = '0px 0px 0px #000';
	};
	
	logoutBtn.onclick = function (arg){
		var form = document.createElement('form');
		form.method = 'get';
		form.action = 'php/logout.php';
		form.target = '_top';
		
		var input = document.createElement('input');
		input.name = 'logout';
		input.type = 'hidden';
		input.value = '1';
		
		form.appendChild(input);
		document.body.appendChild(form);
		form.submit();
	};
	
	document.body.appendChild(logoutBtn);
	
	var nameContainer = document.createElement('div');
	nameContainer.style.position = 'absolute';
	nameContainer.style.left = '0';
	nameContainer.style.top = '0';
	nameContainer.style.zIndex = '1003';
	nameContainer.style.fontFamily = 'Segoe UI, Tahoma';
	nameContainer.style.fontSize = '11pt';
	nameContainer.style.fontWeight = 'normal';
	nameContainer.style.color = '#fff';
	nameContainer.style.display = 'none';
	nameContainer.style.background = '';
	document.body.appendChild(nameContainer);
	
	if(isLogin){
		profileBtn.style.display = 'block';
		loginBtn.style.display = 'none';
		logoutBtn.style.display = 'block';
		
		nameContainer.textContent = 'Hi, ' + fullName;
		nameContainer.style.display = 'block';
		
	} else{
		profileBtn.style.display = 'none';
		loginBtn.style.display = 'block';
		logoutBtn.style.display = 'none';
	}
});