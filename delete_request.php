<?php

	session_start();
//	print_r($_SESSION);
	include("classes/connect.php");
	include("classes/login.php");
	include("classes/user.php");

// To check user is logged in or not

	$login = new Login();
	
	$user_data = $login-> check_login($_SESSION['linking_userid']);



	// delete friend_request : status =2
	function delete_request()
	{
		// use_one = req_from
		// use_two = req_two


		$own_userid=$_SESSION['linking_userid'];
		$user_two=$_GET['u_id'];

		print_r($own_userid." ".$user_two);

		/*
		$quary = "DELETE FROM friend_request WHERE user_one = $user_two AND  user_two = $own_userid ";*/
		$quary = "UPDATE friend_request SET status=2 WHERE user_one = $user_two AND  user_two = $own_userid ";
		$db = new Database();

		$db->save($quary);

		header('location: request.php');

	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Deleting Friends | Linking</title>
	</head>
	<body>
		<div>
			<?php
			delete_request();
			?>
		</div>

	</body>