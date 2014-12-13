<?php
	require_once('connect.php');
	
	$fullName = $_POST['sign_up_full_name'];
	$email = $_POST['sign_up_email'];
	$password = $_POST['sign_up_password'];
	$confirmation = $_POST['sign_up_confirm_password'];
	
	echo "$fullName $email $password $confirmation <br />";
	
	mysqli_query($SQL, "insert into users (full_name, email, password) values ('$fullName', '$email', '$password');");
	
	echo 'registration success';
	header('Location: ..');
?>