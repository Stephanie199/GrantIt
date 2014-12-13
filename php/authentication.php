<?php
	session_start();
	require_once('connect.php');
	
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];
	
	echo "$email $password <br />";
	
	$result = mysqli_query($SQL, "select * from users where email='$email' and password='$password';");
	
	if($result -> num_rows == 1){
		$entry = $result -> fetch_assoc();
		echo $entry['full_name'].' '.$entry['email'].' '.$entry['password'].'<br />';
		
		$_SESSION['full_name'] = $entry['full_name'];
		$_SESSION['email'] = $entry['email'];
		$_SESSION['password'] = $entry['password'];
		$_SESSION['notify'] = 1;
		header('Location: ..');
	}
	else{
		header('Location: ..?loginFailed=1');
	}
?>