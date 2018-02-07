<?php
session_start();
$_SESSION['user_id']=NULL;
$_SESSION['user_name']=NULL;
$_SESSION['user_phone']=NULL;
$_SESSION['user_email']=NULL;
session_unset(); 
session_destroy(); 
header("Location: index.php");
die();
?>