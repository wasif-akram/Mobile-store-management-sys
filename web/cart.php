<?php
require("includes/header.php");

?>


<div class="about">
	<h2 style="margin:20px;font-size:30px;font-weight: bold;">Shopping Cart</h2>
	<br>
	<br>
	<table cellpadding="10" 
	border="1" height="50" width="100%" class="table" style="border: 1px solid #ccc;
	font-family: 'verdana'">		<tr>
			<th>Sl No.</th>
			<th>Product</th>
			<th>Image</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total price</th>
			<th colspan="3">Options</th>
		
		</tr>

<?php

$i=1;
$gTot = 0;
foreach ($_SESSION['cart'] as $id => $qnty) {
	$sql = "select * from `product` where `id`='$id'";
	$res = mysqli_query($con,$sql) or die("error");
	$row = mysqli_fetch_assoc($res);


	$tot = $row['price']*$qnty;
	$gTot += $tot;
	print "
	<tr>
			<td align='center'>$i</td>
			<td align='center'>$row[name]</td>
			<td align='center'><img src='../admin/pro_images/$row[image]' height='40' width='40'></td>
			<td align='center'>&#8377;$row[price]</td>
			<td align='center'>$qnty</td>
			<td align='center'>&#8377;".$tot."</td>

			<td align='center'>
			<a href='addToCart.php?pid=$id&op=add'>
			<img src='../admin/pro_images/add_cart.jpg' height='20' width='20'></td>
			
			<td align='center'>
			<a href='addToCart.php?pid=$id&op=del'>
			<img src='../admin/pro_images/del_cart.jpg' height='20' width='20'></td>
			

			<td align='center'>
			<a href='addToCart.php?pid=$id&op=rem'>
			<img src='../admin/pro_images/remove_cart.png' height='20' width='20'></a></td>


	</tr>";
	$i++;
}

?>
<tr>
			<td colspan="4"> </td>
			<td colspan="" align="center" style="font-weight: bold;font-size: 20px">Grand Total</td>
			<td colspan="1" align="center" style="font-weight: bold;font-size: 20px">&#8377;<?php echo $gTot; ?></td>
			<td colspan="3"> </td>
	
</tr>

</table>
<div class="brand-history"  align="center" style="">
<form action="checkOut.php" method="post">
<input type="submit" id="btn" value="CheckOut" style="font-size:24px;height:80px;width:200px;">		    </form>
</div>
</div>

<?php
require("includes/footer.php");
?>