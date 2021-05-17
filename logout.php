<?php 
session_start();
session_unset();
    $_SESSION['FBID'] = NULL;
    $_SESSION['FULLNAME'] = NULL;
    $_SESSION['EMAIL'] =  NULL;
	setcookie("kullanici");  
header("Refresh:0; url=index.php");   
?>
