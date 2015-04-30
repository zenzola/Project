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
	<title>Harry Potter Club: About</title>
	<link rel="stylesheet" href="css/myclub.css" />
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

	<div class="transbox">

	<h1>Our Club:</h1>
	<h2>For people who love movies and love Harry Potter!</h2><br>

	<h2>Attend our Harry Potter movie marathons, enjoy daily gifs and quotes, and design or buy Harry Potter apparel and novelty items. We'll host 3 large annual events, including a HP-themed party in October and a trip to Harry Potter World. </h2><br>
	<h3>Chocolate frogs, Butter Beer, and Bertie Bott's Every Flavour Beans always provided. </h3>

	<br><br>
	<img src="../img/Ron.jpg" alt="Ron">
	<img src="../img/Harry.jpg" alt="Harry">
	<img src="../img/Hermione.jpg" alt="Hermione">
	<br><br>

	<iframe width="560" height="315" src="https://www.youtube.com/embed/nAq0hrNUEi0" allowfullscreen></iframe>
	<br><br><br>
	</div>

</body>
</html>