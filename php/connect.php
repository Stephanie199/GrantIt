<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'GrantIt';
	
	$SQL = new mysqli($servername, $username, $password, $database);
	
	if($SQL -> connect_error){
		die($SQL -> connect_error);
	}
	// echo 'connected to db<br />';
?>