<?php
$loginerror = $_SESSION['login_error'];

 // remove all session variables
 session_unset(); 

 // destroy the session 
 session_destroy(); 

echo "<h1>".$loginerror."</h1>";
?>
 <div id='alert'><div class=' alert alert-block alert-info fade in center'>$loginerror</div></div> 