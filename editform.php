<?php

    session_start();

    if (!array_key_exists('token', $_SESSION)) {
      # code...
      header("Location: loginpage.php");
      exit();
    }

      $id = $_GET['id'];
      $desc = $_GET['desc'];

      if(array_key_exists('desc', $_POST) && array_key_exists('date', $_POST)) {
      
      $new_desc = $_POST['desc'];
      $new_date = $_POST['date'];
      $token = $_SESSION['token'];
      
      /* Curl Initialization to communicate with the REST API*/
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => "http://localhost/calendarrest/edit.php",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "token=$token&desc=$new_desc&date=$new_date&id=$id",
      CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
     ),
    ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      /* Decode the API response */
      $data = json_decode($response);

      curl_close($curl);
      $_SESSION['editsuccess'] = $data->msg;
      header("Location: dashboard.php");
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard | Edit Entry</title>
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
  <div class="container" style="margin-top:30px;">
    <div class="row">
      <div class="col-offset-md-4 col-md-8">
        <h1 class="text-big text-center"><i class="fa fa-calendar"></i>Edit Entry</h1><br>
        <form class="form form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" accept-charset="utf-8">
          <div class="form-group">
            <label for="desc" class="col-lg-5 control-label"><h4>Event Description</h4></label>
            <div class="col-lg-7">
              <input type="text" name="desc" class="form-control input-lg" placeholder="" required value="<?php echo $desc;?>" />
            </div>
          </div>
          <div class="form-group">
            <label for="date" class="col-lg-5 control-label"><h4>Date</h4></label>
            <div class="col-lg-7">
              <input id="datepicker" type="text" name="date" class="form-control input-lg" placeholder="YYYY-MM-DD" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-5">
              
            </div>
            <div class="col-lg-7">
              <button type="submit" class="btn btn-success">Update Entry</button>
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
          $("#datepicker").datepicker();
          $("#datepicker").datepicker("option","dateFormat","yy-mm-dd");
        });
    </script>
</body>
</html>