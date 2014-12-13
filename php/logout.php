<?php
	session_start();
	
	if(isset($_GET['logout']) && $_GET['logout'] === '1'){
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['notify']);
		unset($_SESSION['full_name']);
		header('Location: ..?logout=1');
	} else {
		header('Location: ..');
	}
?>