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
	<title>Harry Potter Movie Club Join Form</title>
	<link rel="stylesheet" href="css/myclub.css" />
	<script type="text/javascript" src="javascript/javascript2.js"></script>
	<script type="text/javascript">
	function image(thisImg) {
    	var img = document.createElement("IMG");
    	img.src = "../img/"+thisImg;
    	document.getElementById('imageDiv').appendChild(img);
	}
	</script>
</head>
<body>
	<br>
	<embed src="ThemeSong.mp3" width=25 height=25 autostart=false repeat=true loop=true align=right />
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

		<img src="../img/HarryPotter.png" alt="Hogwarts" />
	</div>

	<div class="transbox">

	<?php

	$houses = array("Gryffindor", "Slytherin", "Ravenclaw", "Hufflepuff");

	displayform($houses);

	?>

	<br><br><br>
	</div>
</body>
</html>



<?php

function displayform($houses){
	?>
		<h1>Register</h1>
		<form id = "join" method="post" action="../include/dboperation.php" onsubmit="return validate()">

		<label>First Name:</label><br>
		<div id="firstnameerror"></div>
		<input type="text" name="firstname" id="firstname" >
		<br><br>

		<label>Last Name:</label><br>
		<div id="lastnameerror"></div>
		<input type="text" name="lastname" id="lastname">
		<br><br>
		
		<label>Email:</label><br>
		<div id="emailerror"></div>
		<input type="text" name="email" id="email" >
		<br><br>

		<label>House Selection!</label><br>
		<div id="houseerror"></div>
		<div id="myHouse" value="Ravenclaw"></div>
		<div id="takenQuiz"></div>
		<div id="imageDiv"></div>

		<script type "text/javascript">
			var display = "yes";
			if (display == "yes") {
				if (document.getElementById('myHouse').value == "Gryffindor"){
					image('Gryffindor.png');
				}
				else if (document.getElementById('myHouse').value == "Slytherin"){
					image('Slytherin.png');
				}
				else if (document.getElementById('myHouse').value == "Ravenclaw"){
					image('Ravenclaw.png');
				}
				else if (document.getElementById('myHouse').value == "Hufflepuff"){
					image('Hufflepuff.png');
				}
			}
		</script>
		<?php
			if (! isset($_POST['quizsubmitted']) ){
				echo "<div class = \"housequiz\">
					<a href=\"http://cscilab.bc.edu/~pear/project/myclub/housequiz.php\"
					onclick=\"javascript:void window.open('http://cscilab.bc.edu/~pear/project/myclub/housequiz.php','1430339746572','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');
					return false;\">Get Sorted!</a>
					</div>";
			}
		?>
		<br><br>

		<label>Create Password:</label><br>
		<div id="passworderror"></div>
		<input type="password" name="password" id="password">
		<br><br>

		<label>Confirm Password:</label><br>
		<div id="password2error"></div>
		<input type="password" name="password2" id="password2">
		<br><br>

		<br><br><br>
		<input type="submit" name= "submitted" value="Finish!" >
		<br>
		<script type="text/javascript">setmeup();</script>
		</form>
<?php
}

function create_radiobuttons ($values, $varname) {
	echo "<div class='myrb'>";
	foreach ($values as $v) {
		echo "<input type='radio' name='$varname' value='$v'> $v <br>\n";
	}
	echo "</div>";
}

?>