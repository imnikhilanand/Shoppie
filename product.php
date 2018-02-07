<?php
include "header.php";
$id=$_GET['p_pec'];

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
	width:250px;
	float:left;
	margin-left:10px;
	text-align:center;
	padding:10px 10px;
	position:static;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	margin-bottom: 10px;
}


</style>


<body>

<div class="midwrap">

<div class="products">
	<div class="products-list">
			<?php 
			$sql="SELECT * FROM products WHERE cat_id='$id' ORDER BY id DESC ";
			$result=mysqli_query($connection,$sql);
			while($row=mysqli_fetch_assoc($result)){
			?>
			<a href="product_spec.php?p_pec=<?php echo$row['id'];?>">
				<div class="products-list-table">
				<div style="margin-top: 10px"><img src="product/<?php echo$row['product_image'];?>" alt="image" height="200px"></div>
				<div style="margin-top: 10px"><?php echo $row['category'];?></div>
				<div style="margin-top: 10px"><?php echo "Price ".$row['price'];?></div>
				<div style="margin-top: 5px"><?php if($row['stock']==1){echo "<span style='color:green'>In Stock</span>";}?></div>
				</div>
			</a>
			<?php }?>
		
	</div>
</div>


</div>

</body>
