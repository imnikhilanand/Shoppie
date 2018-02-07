<?php
include "header.php";
@$id=$_GET['p_pec'];
@$name=$_GET['submit_text'];
if(empty($id)){
	$sql="SELECT * FROM products WHERE name='$name'";
	$result=mysqli_query($connection,$sql);
			while($row=mysqli_fetch_assoc($result)){
				$id=$row['id'];
			}
}

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

<div class="products">
	<div class="products-list">
			<?php 
			$sql="SELECT * FROM products WHERE id='$id' ORDER BY id DESC ";
			$result=mysqli_query($connection,$sql);
			while($row=mysqli_fetch_assoc($result)){
			?>
			<a href="product.php?p_pec=<?php echo$row['id'];?>">
				<div class="products-list-table">
				<div style="margin-top: 10px"><img src="product/<?php echo$row['product_image'];?>" alt="image" width="400px"></div>
				</div>
			</a>

			<div class="products-list-table" style="text-align: left !important;padding: 20px 20px !important; ">
			<div style="margin-top: -40px"><p style="font-size:40px"><?php echo $row['name'];?></p></div>
			<div style="margin-top: -20px"><p style="font-size:25px">Price : <b>$<?php echo $row['price'];?></b></p></div>
			<div style="margin-top: -20px"><p style="font-size:25px">Availabilty : <?php if($row['stock']==1){echo "<span style='color:green'>In Stock</span>";}?></p></div>
			
			<div style="margin-top: -20px"><p style="font-size:25px">Color : <?php echo $row['color'];?></p></div>
			<div style="margin-top: -20px"><p style="font-size:25px">Specification : <?php echo $row['specification'];?></p></div>
			<div style="margin-top: -15px;">
			<label ><span style="font-size:25px;margin-right:15px;">Quantity</span></label>
			<input class="no_of_item" type="number" min="1" max="10" value="1" id="quantity" style="margin-bottom: 10px;margin-bottom: 20px;height:30px;"><br>
			</div>
			<button class="add_to_cart" id="add_to_cart" data-id="<?php echo$id;?>" ><i class="fa fa-shopping-cart" style="font-size:22px;color:white !important;"></i> Add to Cart</button>
			<button class="buy" id="buy" data-id="<?php echo$id;?>">Buy</button>
			</div>
			<?php }?>
		
	</div>
</div>

</div>

<script>


$("#add_to_cart").click(function(){
	var product_cart = $(this).attr("data-id");
	var quantity = $("#quantity").val();
	
	$.ajax({
		type:"POST",
		url:"post/edit_cart.php",
		data:{'product_id':product_cart,'quantity':quantity,'flag':1},
		success:function(data){
			if(data){
				$("#order_num").html(data);
			}
		}

	});
});

</script>

</body>
