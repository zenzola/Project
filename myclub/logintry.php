<?php
session_start(); // Starting Session
include ('../include/dbconn.php');

if (isset($_POST['loggingin'])) {
	if ( empty( $_POST['username'] ) || empty( $_POST['password'] ) ) {
		$_SESSION['login_error']= "Invalid username or password!";
		header("location: login.php");
		exit();
	}
	else
	{
		// Define $username and $password
		$username = $_POST['username'];
		$password = sha1( $_POST['password'] );

		// Establishing Connection with Server
		$dbc = connectToDB();

		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		/*$username = mysqli_real_escape_string($username);
		$password = mysqli_real_escape_string($password);*/

		// SQL query to fetch information of registerd users and finds user match.
		$query = "SELECT * FROM myclub where password= '$password' and email='$username'";
		$result = performQuery($dbc, $query);
		if ( ! $result ) {
			error("Info Grab Failed.");
			disconnectFromDB($dbc, $result);
			return false;
		}
		$count = 0;
		while ( @extract(mysqli_fetch_array($result, MYSQLI_ASSOC)) ) {
			$count++;
		}

		if ($count == 1	) {
			$_SESSION['login_user']=$username; // Initializing Session
			header("location: memberhome.php"); // Redirecting To Other Page
		} 
		else {
			$_SESSION['login_error']= "Invalid username or password!";
			header("location: login.php");
			exit();
		}

		//Close Connection
		disconnectFromDB($dbc, $result);
	}
}
?>
