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
</head>
<body>
	<embed src="ThemeSong.mp3" width=25 height=25 autostart=true repeat=true loop=true align=right />
	<br>

	<div class="login">
		<a href = "http://cscilab.bc.edu/~pear/project/myclub/login.php">Login</a>
	</div>

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
		<form method="post" action="join.php">	
		<input type="submit" name="submitted" value= "Join!" >
		</form> 
	</div>

	<br><br>
</body>
</html>

