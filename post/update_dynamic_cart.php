<?php
session_start();
if(!empty(@$_SESSION['user_id'])){
  $connection=mysqli_connect("localhost","root","","ecomm");
  $select_all_items=array();
  $user_id = $_SESSION['user_id'];
  $sql2 = "SELECT * FROM dynamic_cart WHERE `user_id` = '$user_id'";
  $result2 = mysqli_query($connection,$sql2);
  while($row = mysqli_fetch_array($result2)){
  	array_push($select_all_items,$row);
  }
  
  $unique=uniqid();
  
  $_SESSION['current_unique']=$unique;
  
  foreach($select_all_items as $array){
  	$product_id_dynamic=$array['product_id'];
  	$quantity_dynamic=$array['quantity'];
  	$sql3="INSERT INTO `order_table`(`order_id`,`product_id`, `user_id`, `quantity`, `complete`) VALUES ('$unique','$product_id_dynamic','$user_id','$quantity_dynamic','0')";
  	$result3=mysqli_query($connection,$sql3);
  	if(!$result3){
  		die(mysqli_error($connection));
  	}
  }

  $sql4="DELETE FROM `dynamic_cart` WHERE `user_id`='$user_id'";
  $result4=mysqli_query($connection,$sql4);

  $sql5="INSERT INTO `order_generate`(`order_id`,`user_id`) VALUES ('$unique','$user_id')";
  $result5=mysqli_query($connection,$sql5);
  
  $sql6="SELECT * FROM `order_generate` WHERE `user_id`='$user_id'";
  $result6=mysqli_query($connection,$sql6);
  $row6=mysqli_fetch_array($result6);
  $order_id=$row6['order_id'];

  header('Location: ../thanks.php');
  exit;
}
?>