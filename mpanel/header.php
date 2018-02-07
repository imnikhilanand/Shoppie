<?php
session_start();
$connection=mysqli_connect("localhost","root","","ecomm");
$admin_exist = 0;
if(!empty(@$_SESSION['user_admin_id'])){
	$admin_exist = 1;
  $user_admin_id = $_SESSION['user_admin_id'];
  $sql2 = "SELECT * FROM dynamic_cart WHERE `user_admin_id` = '$user_admin_id'";
  $result2 = mysqli_query($connection,$sql2);
  $no_of_items = mysqli_num_rows($result2);
}
?>

<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
</head>

<style>
body{
  margin:0;
  font-family: Arial, Helvetica, sans-serif;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #4286f4;
    position: fixed;
    top: 0;
    width: 100%;
}
li {
    float: right;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: orange;
}

.products{
	width:100%;
	margin-top:70px;
}
.products-list-table{
	width:250px;
	float:left;
	margin-left:10px;
	text-align:center;
	padding:10px 10px;
	position:static;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#search_text{
  position:relative;
  top:11px;
  border:1px solid white;
  height: 25px;
  width:400px;
  padding-left: 6px;
}
#submit_button{
  background-color:orange;
  position:relative;
  left:-4px;
  top:11px;
  border:1px solid orange;
  height: 25px;
  width: 70px;
  color:white;
}
</style>
<ul>
  <li style="float:left !important"><a href="index.php" >Shoppie - Admin Panel</a></li>
  <?php if($admin_exist==1){s?>
  <li><a href="products.php">Products</a></li>
  <li><a href="orders.php">Orders</a></li>
  <li><a href="logout.php">Log Out</a></li>
<?php 
}else{?>
  <li><a href="signin.php">Sign In</a></li>
<?php }?>
</ul>

