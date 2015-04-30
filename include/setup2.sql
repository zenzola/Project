// Create Table: //////////////////////////////////////////////////////

CREATE TABLE myclub
(
lastname char(50),
firstname char(50),
email char(50),
password char(40),
registrationdate DATETIME,
membertype enum('Gryffindor', 'Slytherin', 'Ravenclaw', 'Hufflepuff')
);



// Insert Members: ////////////////////////////////////////////////////

php example:
<?php
function insert($FirstName, $LastName, $Email, $House, $Password){
	$PasswordFinal = sha1( $Password);
	$query="insert into myclub values ('$FirstName', '$LastName', '$Email', '$PasswordFinal', 'NOW()', '$House')";
	$dbc= connectToDB();
	$result = performQuery($dbc, $query);
	if ( ! $result )
		echo "<br>Insert Failed - $query";
	else
		echo "<br>Insert Success- $query";
	disconnectFromDB($dbc, $result);
}
?>

query examples: 
* note: over the web the passwords will be encoded

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Alex", "Pear", "aapear@mac.com", "Fluffy1", now(), "Gryffindor");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Alex", "Anne", "pear@bc.edu", "Dobby2", now(), "Ravenclaw");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Haein", "Kang", "haein.kang.1@bc.edu", "Dumbledore", now(), "Hufflepuff");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Caroline", "Kulig", "caroline.kulig.1@bc.edu", "phoenix33", now(), "Slytherin");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Christine", "Cocce", "christine.cocce.1@bc.edu", "patronum1998", now(), "Gryffindor");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Courtney", "Shea", "courtney.shea.1@bc.edu", "BertieBotts11", now(), "Ravenclaw");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Michaela", "Nolan", "michaela.nolan.1@bc.edu", "quidditch2000", now(), "Hufflepuff");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Rachael", "O'Keefe", "rachael.okeefe.1@bc.edu", "potions20", now(), "Hufflepuff");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Katie", "Williamson", "katie.williamson.1@bc.edu", "chocofrog10", now(), "Slytherin");

INSERT INTO myclub (firstname, lastname, email, password, registrationdate, membertype)
VALUES ("Kate", "Lowrie", "lowriek@bc.edu", "swordfish", now(), "Gryffindor");



// Select: ////////////////////////////////////////////////////////////

php example:
<?php
function selectEmail($email){
	$dbc= connectToDB( "pear" );
	$id = $_GET['myclub'];
	$result = performQuery( $dbc, "SELECT * FROM myclub WHERE email=$email );
	extract(mysqli_fetch_array( $result, MYSQLI_ASSOC ) );	
}
?>

query examples:
SELECT * FROM myclub WHERE email=$email 
SELECT * FROM myclub WHERE email="aapear@mac.com"



// Update Member: /////////////////////////////////////////////////////

php example (update email):
<?php
function updateEmail($FirstName, $LastName, $Email){
	$query= "UPDATE 'myclub' SET 'email' = '$email' WHERE 'firstname' = '$FirstName' AND 'lastname' = '$LastName'";
	$dbc= connectToDB();
	$result = performQuery($dbc, $query);
	if ( ! $result )
		echo "<br>Insert Failed - $query";
	else
		echo "<br>Insert Success- $query";
	disconnectFromDB($dbc, $result);
}

query examples:
UPDATE 'myclub' SET 'email' = 'apear43@gmail.com' WHERE 'firstname' = 'Alex' AND 'lastname' = 'Pear'";
UPDATE 'myclub' SET 'email' = 'apear@hotmail.com' WHERE 'firstname' = 'Alex' AND 'lastname' = 'Anne'";
UPDATE 'myclub' SET 'membertype' = 'Gryffindor' WHERE 'membertype' = 'Slytherin';



// Delete Member ////////////////////////////////////////////////////

php example:
<?php
function deleteMembers($membertype){
	$query= "DELETE FROM 'myclub' WHERE 'membertype' = '$membertype'";
	$dbc= connectToDB();
	$result = performQuery($dbc, $query);
	if ( ! $result )
		echo "<br>Insert Failed - $query";
	else
		echo "<br>Insert Success- $query";
	disconnectFromDB($dbc, $result);
}

query examples:
DELETE FROM 'myclub' WHERE 'membertype' = 'Slytherin';
DELETE FROM 'myclub' WHERE 'FirstName' = 'Alex';
