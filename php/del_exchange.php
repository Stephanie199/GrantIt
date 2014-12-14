<?php
	require_once('connect.php');
	
	$eid = $_GET['eid'];
	
	mysqli_query($SQL, "delete from exchange where exchange.eid=$eid;");
	
	header('Location: ../Exchange.php');
?>