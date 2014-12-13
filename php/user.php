<?php
	require_once('connect.php');
	if(!isset($_SESSION)){
		session_start();
	}
	
	function getRow(){
		global $SQL;
		if(isset($_SESSION['email']) && isset($_SESSION['password'])){
			$result = mysqli_query($SQL, "select * from users where email='$_SESSION[email]' and password='$_SESSION[password]';");
			if($result -> num_rows == 1){
				return $result -> fetch_assoc();
			}
		}
		return null;
	}
	
	function getUid(){
		global $SQL;
		$entry = getRow();
		if($entry !== null){
			return $entry['uid'];
		}
		return null;
	}
	
	function genWish(){
		global $SQL;
		$result = mysqli_query($SQL,
			"select * from users
			inner join wishes
			on wishes.uid=$_SESSION[uid];");
		return $result;
	}
?>