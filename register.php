<?php 
	include 'connection.php';
	include 'vendor/autoload.php';

	/**
	 * [generateToken description]
	 * @param  integer $len [description]
	 * @return string       [returns a 32 character wide string]
	 */
	function generateToken($len=32)
	{
		$token = "";
		$_CHARS = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

		for ($i=0; $i < $len; $i++) { 
			# code...
			$token .= $_CHARS[rand(0,61)];
		}

		return $token;
	}

	/* Save all the errros during registration */
	$errors = array();

	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$token = generateToken();

	/**
	 * Check if the email is already registered
	 */
	
	$check_sql = "SELECT * FROM user WHERE email='$email'";
	$check_query = $handler->query($check_sql);
	$check_res = $check_query->fetchAll(PDO::FETCH_OBJ);

	if (count($check_res) > 0) {
		# code...
		$msg = "Email Already Exist!";
		array_push($errors, $msg);
		header("Location: regpage.php?error=$msg");
		exit();
	}

	$sql = "INSERT INTO user(`FirstName`,`LastName`,`email`,`token`) VALUES('$fname','$lname','$email','$token');";

	$res = $handler->exec($sql);

	if ($res > 0) {

		$success = array();

		$msg_suc = "Registration Successfull! Your API token has been sent to your email address";
		$success['msg'] = $msg_suc;
		$success['token'] = $token;

		/*$mailer = new PHPMailer;
		$mailer->isSMTP();
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'your gmail address';
		$mail->Password = 'your gmail password';       
		$mail->SMTPSecure = 'tls'; 
		$mail->Port = 587; 
		$mailer->setFrom("sassycoder@outlook.com","Hutchinson Letitia RESTful Calendar");
		$mailer->addAddress("$email", "$fname $lname");

		$mailer->isHTML(false);
		$mailer->body = <<<EOT
		Your Token: { $token }
EOT;
		try {
			$mailer->send();
		} catch (Exception $e) {
			echo $e->getMessage();
		}*/

		header("Location: regpage.php?msg=$msg_suc&token=$token");
	}

?>