<?php
session_start();
include "../header.php";
$phone = $_POST["phone"];
$password = $_POST["password"];
$sql = "SELECT * FROM user WHERE `phone`='$phone' AND `password`='$password'";
$query = mysqli_query($connection,$sql);
$is_user = mysqli_num_rows($query);
if($is_user>0){
if(!$query){
	die(mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($query)){
	echo $user_id = $row['id'];
	echo $username = $row['name'];
	echo $userphone = $row['phone'];
	echo $useremail = $row['email'];

}
$_SESSION['user_id']=$user_id;
$_SESSION['user_name']=$username;
$_SESSION['user_phone']=$userphone;
$_SESSION['user_email']=$useremail;

echo "<script> window.history.go(-2);</script>";

}else{
	header("Location: ../signin.php");
	die();
}
?>
