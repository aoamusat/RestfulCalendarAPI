<?php

	include 'connection.php';

	$token = $_POST['token'];
	$email = $_POST['email'];

	$sql = "SELECT * FROM user WHERE token='$token' AND email='$email';";
	$query = $handler->query($sql);

	$res = $query->fetchAll(PDO::FETCH_ASSOC);

	if (count($res) > 0) {
		# code...
		session_start();
		$_SESSION['token'] = $token;
		header("Location: dashboard.php");
	}
	else{

		$login_err = "Invalid Token!";
		header("Location: loginpage.php?login_err=$login_err");
	}
?>