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

	$FirstName = $_POST['firstname'];
	$LastName = $_POST['lastname'];
	$Email = $_POST['email'];
	if (isset($_POST['house'])){
		$House = $_POST['house'];}
	$Password = $_POST['password'];
	$Password2 = $_POST['password2'];

	if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["password2"])){
    	error("Please fill in all fields.");
  	} 
  	else {
	handleform($FirstName, $LastName, $Email, $House, $Password, $Password2);
	}
	?>

	<br><br><br>
	</div>
</body>
</html>

<?php

function handleform($FirstName, $LastName, $Email, $House, $Password, $Password2){
	//password check
	if ($Password != $Password2){
		error("I'm sorry, your passwords don't match!");
		exit();
	}
	
	//repeated user check
	$dbc= connectToDB();
	$result = performQuery( $dbc, "select email, firstname, lastname from myclub" );

	while ( @extract(mysqli_fetch_array($result, MYSQLI_ASSOC)) ) {
		if ($FirstName == $firstname && $LastName == $lastname){
			error("Name already registered");
			exit();
		}
		if ($Email == $email){
			error("Email already registered");
			exit();
		}
	}

	//name check
    if (!preg_match("/^[a-zA-Z ]*$/",$FirstName)) {
      error("Invalid Name");
      exit();
    }
	if (!preg_match("/^[a-zA-Z ]*$/",$LastName)) {
      error("Invalid Name");
      exit();
    }

  	//email check
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
      error("Invalid Email");
      break;
    }
	
    //ready to go
    insert($FirstName, $LastName, $Email, $House, $Password); 

}

function insert($FirstName, $LastName, $Email, $House, $Password){
	$PasswordFinal = sha1( $Password);
	$query="insert into myclub values ('$FirstName', '$LastName', '$Email', '$PasswordFinal', NOW(), '$House')";
	$dbc= connectToDB();
	$result = performQuery($dbc, $query);
	if ( ! $result )
		error("Registration failed.");
	else
		success("You have successfully joined ".$House.". Welcome!", $House);
	disconnectFromDB($dbc, $result);
}

function error($message) {
	echo"<h1>Error</h1>";
	echo "<h2>".$message."</h2><br><br><br>";
	echo "<input type= 'submit' name= 'redirect' value='Retry' onclick=\"location.href='../myclub/join.php'\"/>";
	echo "<br><br><br>";
}

function success($message, $House) {
	echo"<h1>Thank you!</h1>";
	echo "<h2>".$message."</h2><br><br>";
	echo "<img src='../img/$House.png' alt='$House'><br><br><br>";
	echo "<input type= 'submit' name= 'redirect' value='Back to Home' onclick=\"location.href='../myclub/index.php'\"/>";
	echo "<br><br><br>";
}

