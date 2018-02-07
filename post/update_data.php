<?php
include "../header.php";
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$sql = "UPDATE `user` SET `name` = '$name', `phone` = '$phone' ,`email` = '$email',`address` = '$address' WHERE `id`='$user_id'";
$result = mysqli_query($connection,$sql);
if(!$result){
	die(mysqli_error($connection));
}else{
	header("Location: ../profile.php");
	die();

}
?>