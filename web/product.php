<?php
extract($_REQUEST);
$css = "<link href='css/style1.css' rel='stylesheet' type='text/css'  media='all' />";
require("includes/header.php");
?>

		    <div class="content-grids">
		    	
<div align="left" style="min-height:800px;">
	
	<div id="cart_wrapper" align="center">
	
		<form action="#" id="cart_form" name="cart_form">
		
			<div class="cart-info"> </div>
			
			<div class="cart-total">
			
				<b>Total Charges:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> $<span>0</span>
				
				<input type="hidden" name="total-hidden-charges" id="total-hidden-charges" value="0" />
			</div>
			
			<button type="submit" id="Submit">CheckOut</button>
		
		</form>
	</div>
	
	<div id="wrap" align="center">
		
	<!-- 	<a id="show_cart" href="javascript:void(0)">View My Cart</a> -->
	<ul>
		<?php
		$srchWhere = "";
		$catWhere="";
		if(isset($_POST['srch'])){
			 extract($_POST);
			 if(isset($cid)){
				$srchWhere = " and `name` like '%$srch%'  and cat_id='$cid'";

			 }
			 else{
				$srchWhere = " and `name` like '%$srch%'";

			 }
		}
		elseif(isset($cid) and !isset($srch))
		{
			$catWhere = " and cat_id='$cid'";
		}
		// get the total record
		$sql = "SELECT * FROM `product` where 1 $srchWhere $catWhere";
		// print $sql;

		$res = mysqli_query($con, $sql) or die(mysqli_error($con));
		$total = mysqli_num_rows($res);
		$start = 0;
		$limit = 3;
		$page = ceil($total / $limit);

		if(isset($_REQUEST['p'])){
			$start = ($_REQUEST['p']-1) * $limit;
		}

		$sql = "select * from product where 1 $srchWhere $catWhere LIMIT $start,$limit";
		
		
		// print $sql;
		$res = mysqli_query($con, $sql) or die("error");
		$i =1;

		while($row = mysqli_fetch_assoc($res)){
			$im = "m1.jpg";
			if($row['image'])
			{
				$im = $row['image'];
			}
			print"<li id='$i'>
			<a href='product-detail.php?id=$row[id]'>
				<img src='../admin/pro_images/$im' class='items' alt='' />
				<br clear='all' />
				<div>$row[name]</div>
			</a>
			</li>";
			$i++;
		}
		?>
		</ul>
		<div class="clear"></div>
<?php
print "<div style='font-size:30px'>";
for($i=1;$i<=$page;$i++){
	echo "<a href='product.php?p=$i'>$i</a> | ";
}
print "</div>";
?>
		<br clear="all" />
	</div>

		
</div>

		    </div>
		    </div>
		    	<?php include ("includes/blocks/category.php");
		    	?>
		    </div>
		<?php include ("includes/footer.php");
		    	?>    