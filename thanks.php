<?php
include "header.php";
$unique=$_SESSION['current_unique'];
?>
<style>
body{
	margin:0;
	font-family: Arial, Helvetica, sans-serif;
}

.midwrap{
	width:1200px;
	margin:auto;
	margin-top:50px;
	
}

.products{
	width:100%;
	margin-top:70px;
	
}
.products-list-table{
	width:45%;
	float:left;
	margin-left:10px;
	text-align:center;
	padding:10px 10px;
	position:static;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	margin-bottom: 10px;
}
.add_to_cart{
	background: orange;
	border: 1px solid orange;
	color:white;
	padding:10px 10px;
	width:250px;
	font-size: 20px;
	cursor: pointer;	
}
.buy{
	background: green;
	border: 1px solid green;
	color:white;
	padding:10px 10px;
	width:250px;
	font-size: 20px;	
	cursor: pointer;	
}

</style>


<body>

<div class="midwrap">

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div>
Thankns Your order has been confirmed. Your order ID is <?php echo $unique;?>
</div>



</div>

<script>



</script>

</body>
