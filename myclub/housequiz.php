<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-9" />
	<title>House Sorting</title>
	<link rel="stylesheet" href="css/myclub.css" />
	<link href='http://fonts.googleapis.com/css?family=Satisfy|Berkshire+Swash' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		function doSubmit() {
			window.opener.document.getElementById('myHouse').value="Gryffindor";
			window.opener.document.getElementById('takenQuiz').value="yes";
			window.opener.location.reload(true);
   			self.close();
		}
	</script>
</head>
<body>
	<div class="centering">
		<h1>Get Sorted!</h1>


		<form id = "housesort" method="post" action="../myclub/join.php" onsubmit= "return doSubmit()" >

		<label>Question 1:</label><br>
		<div id="q1error"></div>
		<input type="text" name="q1" id="q1" >
		<br><br>

		<label>Question 2:</label><br>
		<div id="q2error"></div>
		<input type="text" name="q2" id="q2" >
		<br><br>

		<label>Question 3:</label><br>
		<div id="q3error"></div>
		<input type="text" name="q3" id="q3" >
		<br><br>

		<br>
		<input type="submit" name= "quizsubmitted" value="Find Out!" >
		<br>


	</div>
</body>
</html>