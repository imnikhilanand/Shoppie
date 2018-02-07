<?php
include "header.php";
?>
<body>
<style>
body{
	margin:0;
	font-family: Arial, Helvetica, sans-serif;
}
.midwrap{
	width:1200px;
	margin:auto;
	margin-top:100px;
	margin-bottom:70px;
	text-align: center;
	
}
.form_element{
	margin-top: 20px;
	margin-left: 10px;
	width:400px;
	height:30px;
	padding: 20px 20px;
}
.form_element_t{
	margin-top: 20px;
	margin-left: 10px;
	width:400px;
	height:70px;
	padding: 20px 20px;
}
.form_element2{
	margin-top: 20px;
	margin-left: 10px;
	width:400px;
	height:30px;
}
textarea{
	resize:none;
	overflow:hidden; 
}

</style>
	

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
		<div style="position: relative; left:-25px">
		<label>Name</label>
		<input class="name form_element" type="text" name="name" id="name" value="<?php echo $row['name'];?>"><br>
		</div>
		<div style="position: relative; left:-25px">
		<label>Email</label>
		<input class="email form_element" type="email" id="email" name="email" value="<?php echo $row['email'];?>"><br>
		</div>
		<div style="position: relative; left:-28px">
		<label>Phone</label>
		<input class="phone form_element" type="phone" id="phone" name="phone" value="<?php echo $row['phone'];?>"><br>
		</div>
		<div style="position: relative; left:-34px">
		<label>Address</label>
		<textarea class="address form_element_t" rows="15" cols="20" id="address" name="address" >
			<?php echo $row['address'];?>
		</textarea><br>  		
		</div>
		<input type="submit" style="position: relative; left:-4px" class="form_element2" value="Update">
	</form>
	<?php }?>

	</div>

	<script>
	$("#new_user").click(function(){
		window.location="signin.php";
	});
</script>


</div>


<style>

</style>

</body>