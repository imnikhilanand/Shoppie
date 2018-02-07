<?php
session_start();
if(!empty(@$_SESSION['user_id'])){
	$user_exist = 1;
	$user_id = $_SESSION['user_id'];
}


$connection=mysqli_connect("localhost","root","","ecomm");
$flag = $_POST["flag"];
if($flag == 1){
	$quantity = $_POST["quantity"];
	$product_id = $_POST["product_id"];
	if(isset($_POST["product_id"])){
		$sql = "INSERT INTO dynamic_Cart(`product_id`,`user_id`,`quantity`) VALUES('$product_id','$user_id','$quantity')";
		$result=mysqli_query($connection,$sql);
		if(!$result){
			die(mysqli_error($connection));
		}
	}	
}
else if($flag == 0){
	$itemid = $_POST["itemid"];
	$sql3 = "DELETE FROM `dynamic_Cart` WHERE `id` = '$itemid'";
	$result3 = mysqli_query($connection,$sql3);
	if(!$result3){
		die(mysqli_error($connection));
	}

}

$sql2 = "SELECT * FROM dynamic_Cart WHERE `user_id` = '$user_id' ";
$result2=mysqli_query($connection,$sql2);
if(!$result2){
	die(mysqli_error($connection));
}else{
	echo $num_of_rows = mysqli_num_rows($result2);
}

	
?>