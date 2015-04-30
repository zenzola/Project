<?php
include('session.php');
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
		<a href = "http://cscilab.bc.edu/~pear/project/myclub/logout.php">Log Out</a>
	</div>

	<div style="text-align: center">
		<div class="menu">
			<ul id= "nav">
			  <li><a href="">Profile</a></li>
			  <li><a href="">Gringots</a></li>
			</ul>
		</div>
		<br><br><br><br><br><br>

		<img src="../img/HarryPotter.png" alt="Hogwarts" /></div>
	</div>
	<div class="centering">
		<?php
		echo "<h1> Welcome ".$user_check."!</h1>";
		?>
	</div>

	<br><br>
</body>
</html>

