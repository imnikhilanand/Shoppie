<?php 
include "../header.php";
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$password = $_POST["password"];
$address = $_POST["address"];
$sql = "INSERT INTO user(`name`,`phone`,`email`,`address`,`password`) VALUES('$name','$phone','$email','$address','$password')";
$result = mysqli_query($connection,$sql);
if(!$result){
	
	//die(mysqli_error($connection));
	header("Location: /signup.php");
	die();

}else{
	?>


<style>
body{
	margin:0;
	font-family: Arial, Helvetica, sans-serif;
}
.midwrap{
	width:1200px;
	margin:auto;
	margin-top:250px;
	text-align: center;
}
#continue_shopping{
	background: orange;
	border: 1px solid orange;
	color:white;
	padding:10px 10px;
	width:250px;
	font-size: 20px;
	cursor: pointer;	
}
</style>



<body>

<div class="midwrap">
	<p style="font-size: 38px;margin-top:20px">Thanks for joining Shoppie. Enjoy online shopping anywhere any time.</p>
	<button id="continue_shopping">Continue Shopping</button>
</div>

<script>
	$("#continue_shopping").click(function(){
		window.location="../index.php";
	});
</script>

</body>

<?php
//} 
?>