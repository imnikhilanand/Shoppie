<?php
$s=$_POST["s"];
if($s!=null)
{
	$s="%".$s."%";
	$c=mysqli_connect("localhost","root","","ecomm");
	$q="SELECT name,id FROM products WHERE name LIKE '$s'";
	$r=mysqli_query($c,$q);
	if(mysqli_num_rows($r)>0)
	{
  		while($row=mysqli_fetch_assoc($r))
		{
			//echo $row["name"];
			echo'<option data-id="'.$row["id"].'" value="'.$row["name"].'">';
		}
	}	
}
?>