<?php
	require_once('connect.php');
	
	$wid = $_GET['wid'];
	mysqli_query($SQL, "delete from wishes where wishes.wid=$wid;");
	
	header('Location: ../Wishes.php');
?>