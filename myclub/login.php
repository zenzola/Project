<?php
include('logintry.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
	header("location: memberhome.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-9" />
	<title>Harry Potter Movie Club</title>
	<link rel="stylesheet" href="css/myclub.css" />
	<link href='http://fonts.googleapis.com/css?family=Satisfy|Berkshire+Swash' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="javascript/javascriptlogin.js"></script>
</head>
<body>
	<embed src="ThemeSong.mp3" width=25 height=25 autostart=true repeat=true loop=true align=right />
	<br>

	<div style="text-align: center">
		<div class="menu">
			<ul id= "nav">
			  <li><a href="index.php">Home</a></li>
			  <li><a href="about.php">About</a></li>
			  <li><a href="join.php">Join</a></li>
			</ul>
		</div>
		<br><br><br><br><br><br>

		<img src="../img/HarryPotter.png" alt="Hogwarts" /></div>
	</div>
	<div class="centering">

		<?php
		if(isset($_SESSION['login_error'])){
			echo "<h5>".$_SESSION['login_error']."</h5>";
			session_unset($_SESSION['login_error']);
		}
		?>

		<form method="post" id="loginform" onsubmit="return validate()">	
			<label>Email: </label><br>
			<div id="usernameerror"></div>
			<input type="text" id = "username" name="username" ><br><br>

			<label>Password: </label><br>
			<div id="passworderror"></div>
			<input type="password" id = "password" name="password" ><br><br>

			<input type="submit" name="loggingin" value= "Login" >

			<script type="text/javascript">setmeup();</script>
		</form> 
		<br><br>

		<form method="post" action="forgotpassword.php">	
			<div class="forgot">
				<input type="submit" name="forgot" value= "I forgot my password!" >
			</div>
		</form> 

		<br><br>
	</div>
</body>
</html>