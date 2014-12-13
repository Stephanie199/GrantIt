<?php
	require_once('connect.php');
	require_once('user.php');
	
	$wish_title = $_POST['wish_title'];
	$wish_image_url = $_POST['wish_image_url'];
	$wish_price = $_POST['wish_price'];
	$wish_desc = $_POST['wish_desc'];
	
	$uid = getUid();
	
	if($uid !== null){
		echo "insert into wishes (uid, title, image_url, price, desc) values ($uid, '$wish_title', '$wish_image_url', $wish_price, '$wish_desc');";
		mysqli_query($SQL, "insert into wishes (uid, title, image_url, price, wishes.desc) values ($uid, '$wish_title', '$wish_image_url', $wish_price, '$wish_desc');");
		echo 'Success';
	} else{
		die('Failed to add wish!');
	}
	header('Location: ../Wishes.php');
?>