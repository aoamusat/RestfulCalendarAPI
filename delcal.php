<?php

		include 'connection.php';

		session_start();
		
		if (!isset($_SESSION['token'])) {
			# code...
			header("Location: loginpage.php");
		}

		  $token = $_SESSION['token'];
		  $id = $_GET['id'];
		  
		  $curl = curl_init();

		  curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://localhost/calendarrest/delete.php?token=$token&id=$id",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$data = json_decode($response);

		header("Location: dashboard.php?success=$data->msg");