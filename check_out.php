<?php
include "header.php";
?>
<style>
body{
	margin:0;
	font-family: Arial, Helvetica, sans-serif;
}
.midwrap{
	width:1200px;
	margin:auto;
	margin-top:100px;
	margin-bottom: 100px;
	text-align:center;
}
table,tr{
	width:100%;
	border-collapse: collapse;
	padding: 5px 5px;
}
td{
	border-bottom: 1px solid #c8cbd1;
	padding: 15px 5px;
	text-align:center;
}
th{
	padding: 10px 10px;
	text-align:center;
	background-color: orange;
	color:white;	
}
.remove_from_cart{
	background:  #4286f4;
	border: 1px solid #4286f4;
	color:white;
	padding:5px 5px;
	cursor: pointer;	
}
.proceed_to_checkout{
	background:  orange;
	border: 1px solid orange;
	width:300px;
	padding:15px 15px;
	cursor: pointer;
	margin-top: 20px;
	font-size:25px;	
}
.form_new{
	margin: 10px;
	padding:10px;
}
</style>

<body>

<div class="midwrap">

<div class="formwrap" >
		<p style="font-size: 25px;"><b>Update Details</b></p> 
	
	<?php 
	$sql = "SELECT * FROM `user` WHERE `id` = '$user_id'";
	$result = mysqli_query($connection,$sql);
	if(!$result){
		die(mysqli_error($connection));
	}
	while($row = mysqli_fetch_assoc($result)){
	?>	
	<form action="post/update_data.php" method="POST">
		<label>Name</label>
		<input class="name form_element form_new" type="text" name="name" id="name" value="<?php echo $row['name'];?>"><br>
		<label>Email</label>
		<input class="email form_element form_new" type="email" id="email" name="email" value="<?php echo $row['email'];?>"><br>
		<label>Phone</label>
		<input class="phone form_element form_new" type="phone" id="phone" name="phone" value="<?php echo $row['phone'];?>"><br>
		<label>Address</label>
		<textarea class="address form_element form_new" rows="5" cols="20" id="address" name="address" >
			<?php echo $row['address'];?>
		</textarea><br>  		
		<input type="submit" class="form_element" value="Update">
	</form>
	<?php }?>

	</div>

<button class="proceed_to_checkout">Confirm your Order</button>

</div>

<script>
$(".remove_from_cart").click(function(){
	var item_id = $(this).attr("data-id");
	$.ajax({
		type:"POST",
		url:"post/edit_cart.php",
		data:{'itemid':item_id,'flag':0},
		success:function(data){
			if(data){
				$("#order_num").html(data);
				$("."+item_id+"X").hide();
					
			}
		}

	});
})

$(".proceed_to_checkout").click(function(){
	window.location="post/update_dynamic_cart.php";
});
</script>


</body>