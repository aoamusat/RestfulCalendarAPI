<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Web Client | Login</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/custom.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
	      <a class="navbar-brand" href="/calrestclient">Rest Calendar</a>
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
	<div class="container" style="margin-top:30px;">
		<div class="row">
			<div class="col-offset-md-4 col-md-8">
			<?php if (isset($_GET['login_err'])) {
				?>
				<div class="alert alert-dismissible alert-danger">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Oh snap!</strong>&nbsp;Your information don't match our record &nbsp;Try again.
				</div>
			<?php }
			?>
				<h1 class="text-big text-center" style="color:;">Login Here!</h1>
				<form class="form form-horizontal" action="login.php"  method="POST" accept-charset="utf-8">
					<div class="form-group">
						<label for="email" class="col-lg-5 control-label"><h4>Email Address:</h4></label>
						<div class="col-lg-7">
							<input type="email" name="email" class="form-control input-lg" placeholder="someone@example.com" required/>
						</div>
					</div>
					<div class="form-group">
						<label for="token" class="col-lg-5 control-label"><h4>API Token</h4></label>
						<div class="col-lg-7">
							<input type="password" name="token" class="form-control input-lg" placeholder="Your Token" required pattern="[a-zA-z0-9]{32}" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-5">
							
						</div>
						<div class="col-lg-7">
							<button type="submit" class="btn btn-success">Login</button>
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