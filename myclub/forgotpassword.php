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
	<title>Harry Potter Movie Club Forgotten Password</title>
	<link rel="stylesheet" href="css/myclub.css" />
	<script type="text/javascript" src="javascript/javascript3.js">
	</script>
</head>
<body>
	<br>
	<embed src="ThemeSong.mp3" width=25 height=25 autostart=true repeat=true loop=true />
	<div style="text-align: center"><img src="../img/HarryPotter.png" alt="Hogwarts" /></div>
	<div class="transbox">

	<?php

	displayform();

	?>

	<br><br><br>
	</div>
</body>
</html>



<?php

function displayform(){
	?>
		<h1>Forgotten Password</h1>
		<form id = "forgot" method="post" action="../include/dboperation2.php" onsubmit="return validate()">

		<label>Email:</label><br>
		<div id="emailerror"></div>
		<input type="text" name="email" id="email" >
		

		<br><br><br>
		<input type="submit" name= "submitted" value="Get New Password!" >
		<br>
		<script type="text/javascript">setmeup();</script>
		</form>
<?php
}