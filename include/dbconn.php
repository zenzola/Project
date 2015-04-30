<?php
function connectToDB(){
$dbc= @mysqli_connect("localhost", "pear", "8w7uvQmy2WdUL8Ea", "pear") or
					die("Connect failed: ". mysqli_connect_error());
	return $dbc;
}

function disconnectFromDB($dbc, $result){
	mysqli_close($dbc);
}

function performQuery($dbc, $query){
	/*echo "My query is >$query< <br>"; */
	$result = mysqli_query($dbc, $query) or die("bad query".mysqli_error($dbc));
	return $result;
}
?>