<?php
session_start();
$connection=mysqli_connect("localhost","root","","ecomm");
$user_exist = 0;
if(!empty(@$_SESSION['user_id'])){
	$user_exist = 1;
  $user_id = $_SESSION['user_id'];
  $sql2 = "SELECT * FROM dynamic_cart WHERE `user_id` = '$user_id'";
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
  <li style="float:left !important"><a href="index.php" >Shoppie</a></li>
  <li style="float:left !important"><form action="product_spec.php" method="get">
    <input id="search_text" list="products" name="submit_text" type="text" onkeyup="g()" placeholder="Search for products">
    <datalist id="products">
    </datalist>
    <input type="submit" name="submit" id="submit_button" value="Search">
  </form></li>
  <?php if($user_exist==1){?>
  <li><a href="logout.php">Log Out</a></li>
  <li><a href="profile.php"><?php echo $_SESSION['user_name'];?></a></li>
  <li><a href="cart.php"><i class="fa fa-shopping-cart" style="font-size:18px;color:white !important;"></i><span id="order_num" style="margin-left: 5px;border:1px solid red;padding:1px 4px;background: red"><?php if($no_of_items>0){echo $no_of_items;}?></span></a></li>
<?php 
}else{?>
  <li><a href="signin.php">Sign In</a></li>
  <li><a href="#"><i class="fa fa-shopping-cart" style="font-size:18px;color:white !important;"></i> <span id="order_num" style="margin-left: 5px;"></span></a></li>
<?php }?>
</ul>

<script>
function g()
{
    var index = document.getElementById("search_text").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
        {
          //alert(this.responseText);
          document.getElementById("products").innerHTML=this.responseText;
        }
        };
    xhttp.open("POST","select_dropdown.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("s="+index);
}
</script>