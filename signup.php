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
	<div class="formwrap" >
		<p style="font-size: 25px;"><b>Sign Up</b></p> 
	<form action="post/new_user.php" method="POST">
		<div style="position: relative; left:-25px">
		<label>Name</label>
		<input class="name form_element" type="text" name="name" id="name"><br>
		</div>
		<div style="position: relative; left:-38px">
		<label>Password</label>
		<input class="password form_element" type="password" name="password" id="password"><br>
		</div>
		<div style="position: relative; left:-72px">
		<label>Re-enter Password</label>
		<input class="password form_element" type="password" id="re-password" ><br>
		</div>
		<div style="position: relative; left:-24px">
		<label>Email</label>
		<input class="email form_element" type="email" id="email" name="email"><br>
		</div>
		<div style="position: relative; left:-29px">
		<label>Phone</label>
		<input class="phone form_element" type="phone" id="phone" name="phone"><br>
		</div>
		<div style="position: relative; left:-35px">
		<label>Address</label>
		<textarea class="address form_element_t" rows="5" cols="20" id="address" name="address">
		</textarea><br>  		
		</div>
		<input type="submit" class="form_element2" name="Sign Up">
	</form>

	</div>

	<div style="margin-top:70px">
	<p style="font-size:30px">Already a member</p><br>
	<button id="new_user" style="margin-top:-15px">Sign Up</button>
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