<?php
	require_once('connect.php');
	require_once('user.php');
	if(!isset($_SESSION)){
		session_start();
	}
	
	$uid = getUid();
	
	$itemName = $_POST['item_name'];
	$imageUrl = $_POST['image_url'];
	$itemDesc = $_POST['item_desc'];
	$minPrice = $_POST['min_price'];
	
	echo $itemName.' '.$imageUrl.' '.$itemDesc.' '.$minPrice;
	mysqli_query($SQL, "insert into exchange (uid, item_name, image_url, item_desc, min_price) values ($uid, '$itemName', '$imageUrl', '$itemDesc', $minPrice);");
	echo "insert into exchange (uid, item_name, image_url, item_desc, min_price) values ($uid, '$itemName', '$imageUrl', '$itemDesc', $minPrice);";
	header('Location: ../Exchange.php');
?>