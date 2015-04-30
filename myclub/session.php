<?php
include ('../include/dbconn.php');

// Establishing Connection with Server and Database
$dbc = connectToDB();

// Starting Session
session_start();

// Storing Session
$user_check=$_SESSION['login_user'];

?>