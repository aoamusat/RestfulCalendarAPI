<?php
	?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Home</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/custom.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="">
</head>
<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse" style="margin-bottom:0px;border-radius:0px;">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Rest Calendar</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="regpage.php">Register</a></li>
	        <li><a href="loginpage.php">Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Hero unit -->
	<div class="container" style="
				background: linear-gradient(
					rgba(20,20,20,.7),
			    	rgba(20,20,20,.7)),
			    	url(assets/cal2.jpg);
			    background-size: cover;
			    text-align: center;
			    width: 100%;
			    height: 700px;
			    padding-top: 13%;
	">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-big" style="color:white;">Welcome to RESTful Calendar Web Client</h1>
				<br>
				<a href="regpage.php" title="" class="btn btn-success btn-lg">Register</a>&nbsp;
				<a href="loginpage.php" title="" class="btn btn-default btn-lg">Login</a>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>