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
.form_element2{
	margin-top: 20px;
	margin-left: 10px;
	width:400px;
	height:30px;
}
#new_user:hover{
	background:#ff9900;

}

#new_user{
	background: orange;
	border: 1px solid orange;
	color:black;
	padding:10px 10px;
	width:250px;
	font-size: 20px;
	cursor: pointer;
	border-radius: 4px;	
}

</style>
<body>

<div class="midwrap">
	<div class="formwrap" >
		<p style="font-size: 25px;"><b>Sign In</b></p> 
	<form action="post/signin_post.php" method="POST">
		<div style="position: relative; left:-25px">
		<label>Phone</label>
		<input class="phone form_element" type="text" id="phone" name="phone"><br>
		</div>
		<div style="position: relative; left:-37px">
		<label>Password</label>
		<input class="password form_element" type="password" name="password" id="password"><br>
		</div>
		<input type="submit" class="form_element2" name="SignIn" value="Sign In">
	</form>



	</div>

<div style="margin-top:100px">
	<p style="font-size:30px">New User ! Signup here </p><br>
	<button id="new_user" style="margin-top:-15px">Sign Up</button>
</div>

<script>
	$("#new_user").click(function(){
		window.location="signup.php";
	});
</script>


</div>


</body>