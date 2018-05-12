<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Home | Registration</title>
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
	      <a class="navbar-brand" href="/">Rest Calendar</a>
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
	<div class="container" style="margin-top:20px;">
		<div class="row">
			<div class="col-offset-md-4 col-md-8">
				<h1 class="text-big text-center">Registration</h1><br><br>
				<?php 
					if (isset($_GET['error'])) {
						?>
					<div class="alert alert-dismissible alert-danger" style="margin-left:auto;margin-right:auto;">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <?php echo $_GET['error'];?>
					</div>
						<?php
					}
				?>
				<?php 
					if (array_key_exists('msg', $_GET) && array_key_exists('token',$_GET)) {
						?>
					<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <?php echo $_GET['msg']; ?>
					  <?php echo "<br>Your token is: <strong>".$_GET['token']."</strong>"; ?>
					</div>
						<?php
					}
				?>
				<form class="form form-horizontal" action="register.php" method="POST" accept-charset="utf-8">
					<div class="form-group">
						<label for="fname" class="col-lg-5 control-label"><h4>First Name:</h4></label>
						<div class="col-lg-7">
							<input type="text" name="fname" class="form-control input-lg" placeholder="First Name" required pattern="[a-zA-z]+" />
						</div>
					</div>
					<div class="form-group">
						<label for="lname" class="col-lg-5 control-label"><h4>Last Name:</h4></label>
						<div class="col-lg-7">
							<input type="text" name="lname" class="form-control input-lg" placeholder="Last Name" required pattern="[a-zA-z]+" />
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-lg-5 control-label"><h4>Email Address</h4></label>
						<div class="col-lg-7">
							<input type="email" name="email" class="form-control input-lg" placeholder="someone@example.com" required />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-5">
							
						</div>
						<div class="col-lg-7">
							<button type="submit" class="btn btn-success">Submit</button>
							<button type="reset" class="btn btn-warning">Reset</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>