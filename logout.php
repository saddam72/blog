<?php 
session_start();

// remove all session variables
if(isset($_SESSION['login'])) 
{
	unset($_SESSION['login']);
}
// destroy the session 
session_destroy(); 

header("Location: login.php");


 ?>