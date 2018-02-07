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
}
#new_user{
	background: orange;
	border: 1px solid orange;
	color:white;
	padding:10px 10px;
	width:250px;
	font-size: 20px;
	cursor: pointer;	
}
</style>
	

<div class="midwrap">
	
	<?php 
	$sql = "SELECT * FROM `order` WHERE `id` = '$user_id'";
	$result = mysqli_query($connection,$sql);
	if(!$result){
		die(mysqli_error($connection));
	}
	while($row = mysqli_fetch_assoc($result)){
	?>	
	<div>
	</div>
	<?php }?>

	
	<script>
		$("#new_user").click(function(){
			window.location="signin.php";
		});
	</script>


</div>


<style>

</style>

</body>