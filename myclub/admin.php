<?php
include ('../include/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-9" />
	<title>Harry Potter Movie Club Admin Page</title>
	<link rel="stylesheet" href="css/myclub.css" />
	<script type="text/javascript" src="javascript/javascriptadmin.js">
	</script>
</head>
<body>
	<br>
	<embed src="ThemeSong.mp3" width=25 height=25 autostart=true repeat=true loop=true align=right />

	<div style="text-align: center"><img src="../img/HarryPotter.png" alt="Hogwarts" /></div>
	<div class="transbox">

	<h1>Admin Page</h1>
	<?php
	displayTable();
	?>
	<br>
	
	<?php
	$houses = array("Gryffindor", "Slytherin", "Ravenclaw", "Hufflepuff");
	displayMailForm($houses);

	$truePassword = sha1("Napoleon");
	if (isset($_POST['mailpassword'])) {$Password = sha1($_POST['mailpassword']);}
	if (isset($_POST['subject'])) {$Subject = $_POST['subject'];}
	if (isset($_POST['message'])) {$Message = $_POST['message'];}
	if (isset($_POST['house_'])) {$House[] = $_POST['house_'];}

	/*
	echo "<pre>";
	print_r($_POST);
	echo "<pre>"; */

	if (isset ($_POST['send']) && isset($_POST['house_'])) {
		validation($Password, $truePassword, $Subject, $Message, $House);
	} 
	else
		echo "<br><h5>Please select recipients<br> and enter the password.</h5><br>";

	echo "</fieldset>
	</form>"

	?>
	</div>
</body>
</html>


<?php
function displayTable(){
	//grab all info from database
	$query = "select * from myclub";
	$dbc = connectToDB();

	$result = performQuery($dbc, $query);
	if ( ! $result )
		error("Info Grab Failed.");
	
	$headercolor = '#2c2c2c';
	echo "<table class = 'center' border='1'>";
	echo "<tr style='background-color: $headercolor; color: white; text-transform: uppercase'>";
	echo "<th colspan='1'>First Name</th><th colspan='1'>Last Name</th><th colspan='1'>House</th><th colspan='1'>Email</th><th colspan='1'>Registration Date</th></tr>";
	$color = "lightyellow";
	while ( @extract(mysqli_fetch_array($result, MYSQLI_ASSOC)) ) {
		$color = $color == "lightyellow" ? "white": "lightyellow";
		echo "<tr style='background-color: $color'>";
		echo "<td>$firstname</td> <td>$lastname</td> <td>$membertype</td> <td>$email</td> <td>$registrationdate</td> </tr>\n";
	}
	echo "</table>";

	disconnectFromDB($dbc, $result);

}

function displayMailForm($houses){
	//grab all info from database
	$query = "select * from myclub";
	$dbc = connectToDB();

	$result = performQuery($dbc, $query);
	if ( ! $result )
		error("Info Grab Failed.");
	
	echo "<form method='post' onsubmit='return validate()'>
	<fieldset>
	<legend>Group Mail</legend> <br>
	<div class = 'mail'>

	<label>Subject</label><br>
	<div id='subjecterror'></div>
	<input type= 'text' name='subject' id='subject'>
	<br><br>

	<label>Message</label><br>
	<div id='messageerror'></div>
	<textarea name='message' id='message'></textarea>
	<br><br>

	<label>Recipients</label>
	<div id='grouperror'></div>";
	create_checkboxes($houses, "house"); 

	echo "<label>Mail Password</label><br>
	<div id='passworderror'></div>
	<input type= 'password' name='mailpassword' id='mailpassword'>
	<br><br><br>
	</div>

	<script type='text/javascript'>setmeup();</script>

	<input type='submit' name='send' value='Send'>
	<br>";
	   
	disconnectFromDB($dbc, $result);
}

function validation($Password, $truePassword, $Subject, $Message, $House){
	if ( $Password == $truePassword )
		sendMail($Subject, $Message, $House);
	else
		echo "<br><h5>Sorry, incorrect mail password.</h5><br>";
}

function sendMail($Subject, $Message, $House){
	//get emails and houses of members
	$query = "select email, membertype from myclub";
	$dbc = connectToDB();

	$result = performQuery($dbc, $query);
	if ( ! $result )
		error("Info Grab Failed.");

	//get emails from members of selected houses
	$to = "";
	if ( isset( $_POST['house_'] )) {
		$house = $_POST['house_'];
		$numSelected = count( $_POST['house_'] );
	}
	while ( @extract(mysqli_fetch_array($result, MYSQLI_ASSOC)) ) {
    	foreach($_POST['house_'] as $key=>$value) {
	        if ($membertype == $value){
				$to.=$email;
				$to.=", ";
			}
		}
	}

	//send mail
	$headers = 'From: aapear@mac.com';
	if ( mail($to, $Subject, $Message, $headers) ){ 
		echo "<h5>Email was sent!</h5><br>";
		echo "<img src='../img/OwlPost.png' alt='OwlPost'><br><br><br>";
	}
	else
		echo " Mail was NOT sent ";
	}

function create_checkboxes ($values, $varname) {
	echo "<div class='mycb'>";
	foreach ($values as $v) {
		echo "<input type='checkbox' name='$varname []' id = '$v' value='$v'> $v <br>\n";
	}
	echo "</div>";
}

?>

