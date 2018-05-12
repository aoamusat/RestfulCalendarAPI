<?php

	session_start();
		
	if (!isset($_SESSION['token'])) {
		# code...
		header("Location: loginpage.php");
	}

	$curl = curl_init();

	$token = $_SESSION['token'];
	$id = "all";

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/calendarrest/view.php?token=$token&id=$id",
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

	if ($err) {

	  echo "cURL Error #:" . $err;
	} 

	else {

		$data = json_decode($response);
	}
			?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Dashboard | Home</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/custom.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
	      <a class="navbar-brand" href="dashboard.php">Rest Calendar</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	      <li><a href="addform.php">Add New Entry</a></li>
	        <li><a href="logout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- Hero unit -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center text-big">All Entries</h2>

				<?php
					if(array_key_exists('editsuccess',$_SESSION))
					{ ?>
						<div class="alert alert-dismissible alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<?php 
								echo $_SESSION['editsuccess'];
								unset($_SESSION['editsuccess']);
							?>
						</div>
					<?php }
				?>


				<?php
					if (isset($data->msg)){
						echo "<h2 class='text-center text-big'>No Entries Found!</h2>";
					}
					else{
						?>
				<table class="table table-responsive table-striped table-hover" style="margin-top:40px;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Event</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $dt) { ?>
							<tr>
								<td><?php echo $dt->id; ?></td>
								<td><?php echo $dt->description; ?></td>
								<td><?php echo $dt->date; ?></td>
								<td>
									<a href="http://localhost/calrestclient/editform.php?id=<?php echo $dt->id;?>&desc=<?php echo $dt->description;?>" title="Edit this Entry" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
									<a href="http://localhost/calrestclient/delcal.php?token=<?php echo $token;?>&id=<?php echo $dt->id;?>" title="Delete this Entry" class="btn btn-danger btn-sm" onclick="delFunction(event);"><i class="fa fa-trash"></i>&nbsp;Delete</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php } ?>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<script type="text/javascript">
  			function delFunction(event)
  			{
  				ans = confirm("Are you sure you want to delete this entry?");
  				if (ans == false) {
  					event.preventDefault();
  				}
  			}
  		</script>
</body>
</html>