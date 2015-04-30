<?php
include ('../include/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-9" />
	<title>Harry Potter Movie Club</title>
	<link rel="stylesheet" href="../myclub/css/myclub.css" />
</head>
<body>
	<br>
	<embed src="../myclub/ThemeSong.mp3" width=25 height=25 autostart=true repeat=true loop=true />

	<div style="text-align: center"><img src="../img/HarryPotter.png" alt="Hogwarts" /></div>
	<div class="transbox">


	<?php
	/*
	echo "<pre>";
	print_r($_POST);
	echo "<pre>";
	echo sha1($_POST['password']); */

	$Email = $_POST['email'];

	if (empty($_POST["email"])) {
    	error("Please enter your email.");
  	} 
  	else {
		handleform($Email);
	}
	?>

	<br><br><br>
	</div>
</body>
</html>

<?php

function handleform($Email){
	//repeated user check
	$dbc= connectToDB();
	$result = performQuery( $dbc, "select email from myclub" );

	while ( @extract(mysqli_fetch_array($result, MYSQLI_ASSOC)) ) {
		if ($Email == $email){
			changePassword($Email);
			exit();
		}
	}
	//no user registered
    error("I'm sorry, that email is not registered.");

}

function changePassword($Email){
	//generate password
	$newPassword = createPassword();

	//update user password in database
	$query = "UPDATE myclub SET password = SHA1('$newPassword') WHERE email = '$Email'";
	$dbc= connectToDB();
	$result = performQuery($dbc, $query);
	if ( ! $result )
		error("Dataase Update Failed.");
	disconnectFromDB($dbc, $result);

	//email to user
	mailPassword($newPassword, $Email);

}

function createPassword() {// start with an empty password
	$password="";
	
	//define possible characters
	$possible="23456789abcdefghjklmnpwrstuvwxyz";
	
	$password="";
	$length=8;
	
	for ($i=1; $i<=$length; $i++){
		$pick=rand(0, strlen($possible)-1);
		
		// pick a random character from the possible characters
		$passchar=substr($possible, $pick, 1);
		
		$password .= $passchar;
	}
	return $password;
}

function mailPassword($newPassword, $Email) {
	//$to='your address here';
	$to = "$Email";
	$subject='New Password!';
	$body='Here is your new password for The Harry Potter Movie Club: '.$newPassword;
	$headers = 'From: aapear@mac.com';
	if ( mail($to, $subject, $body, $headers) )
		success("Your new password has been emailed to ".$to);
	else
		echo " Mail was NOT sent ";
}

function error($message) {
	echo"<h1>Error</h1>";
	echo "<h2>".$message."</h2><br><br><br>";
	echo "<input type= 'submit' name= 'redirect' value='Retry' onclick=\"location.href='../myclub/forgotpassword.php'\"/>";
	echo "<br><br><br>";
}

function success($message) {
	echo"<h1>Thank you!</h1>";
	echo "<h2>".$message."</h2><br><br>";
	echo "<input type= 'submit' name= 'redirect' value='Back to Home' onclick=\"location.href='../myclub/index.php'\"/>";
	echo "<br><br><br>";
}