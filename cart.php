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
	width:200px;
	padding:15px 15px;
	cursor: pointer;
	margin-top: 20px;
	font-size:25px;	
}
</style>

<body>

<div class="midwrap">

<table>


	<tr>
		<th width="10%">S No.</th>
		<th width="20%">Item</th>
		<th width="20%">Name</th>
		<th width="20%">Price</th>
		<th width="10%">Unit</th>
		<th width="20%">Edit cart</th>

	</tr>

	<?php 
		$sql = "SELECT * FROM `dynamic_cart` WHERE `user_id` = '$user_id' ORDER BY `id` DESC";
		$result = mysqli_query($connection,$sql);
		$no=1;
		$total=0;
		while($row = mysqli_fetch_assoc($result)){
			$product_id = $row['product_id'];
			$sql2 = "SELECT * FROM `products` WHERE `id` = '$product_id'";
			$result2 = mysqli_query($connection,$sql2);
			while($row2 = mysqli_fetch_assoc($result2)){
				
	?>
				<tr class="<?php echo $row['id']."X";?>">
				<td><?php echo $no;?></td>
				<td><img src="product/<?php echo $row2['product_image'];?>" width="80px"></td>
				<td><?php echo $row2['name'];?></td>
				<td><?php echo "$".$row2['price'];?></td>
				<td><?php echo $row['quantity'];?></td>
				<td><button class="remove_from_cart" data-id="<?php echo $row['id']?>">Remove from Cart</button></td>
				</tr>


			
			<?php 
			$total=$total+($row2['price']*$row['quantity']);
		}
		$no++;
		
	} 
	?>

	
</table>


<table class="total_table">
	
	<tr bgcolor="#c8cbd1"><td width="10%"></td><td width="20%">Total Amount </td><td width="20%"></td><td width="20%"><?php echo "$".$total;?></td><td width="10%"></td><td width="20%"></td></tr>
</table>

<button class="proceed_to_checkout" id="move_to_checkout">Checkout</button>

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

$("#move_to_checkout").click(function(){
	window.location = "check_out.php";
});
</script>


</body>