<?php
require ("session_security.php");
require ("db.php");
require ("includes/header.php");
require ("includes/nav.php");

// Get the total record
$sql = " SELECT * FROM `orders` ";
$res = mysqli_query($con,$sql);
$total = mysqli_num_rows($res);
$start = 0;
$limit = 3;
$page = ceil($total/$limit);

if(isset($_REQUEST['p'])){
    $start = ($_REQUEST['p']-1) * $limit;
}

print "<h1>Manage Orders</h1>";

$sql = "SELECT *,`cl`.`name` `clname`,`c`.`name` `cname`, `p`.`name` `pname`    FROM `orders`  `o`
		inner join
		`product` `p` on `o`.`pid`=`p`.`id`
		inner join
		`category` `c` on `p`.`cat_id`=`c`.`id`
		inner join
		`client` `cl` on `o`.`cid`=`cl`.`id`
		LIMIT $start,$limit";

        $res = mysqli_query($con,$sql) or die(mysqli_error($con));
        if(isset($_REQUEST['msg'])){
            print"<div style='color:#f00;'> $_REQUEST[msg]</div>";
        }

        print "<table width='600' border='1' style='border-collapse:collapse;'>
		<tr>
			<th>Id</th>
			<th>Category</th>
			<th>Name</th>
			<th>price</th>
			<th>Image</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Date</th>
			<th>Status</th>
			<th>Option</th>
		</tr>";
        $j=0;
while($row=mysqli_fetch_assoc($res)){
    $j++;
    $tot = $row['price'] * $row['qnty'];
    $path = "pro_images/".$row['image'];
    print "<tr>
    <td>$row[id]</td>
    <td id='ordDetail$j'>$row[cname]</td>
    <td>$row[pname]</td>
    <td>$row[price]</td>
    <td><img src='$path' height='80' width='80'></td>
    <td>$row[qnty]</td>
    <td>$tot</td>
    <td>$row[ord_date]</td>
    <td>$row[status]</td>
    <td>
    <a href='#' onclick='confirmDel(\"del-pro.php?id=$row[id]\")'><img src='img/del.png' height='30' width='30'></a>
    <a href='edit-pro.php?id=$row[id]'><img src='img/edit.png' height='30' width='30'></a>
    </td>
</tr>
<tr id='clDetail$j' style='display:none'><td colspan='10' height='50'>
<div style='padding:10px;background:#ccc;'>Client Name: $row[clname], Mobile: $row[mobile]
</div>
</td></tr>
";
}
print "</table>";   
?>
<script src="lib/js/jquer.js"></script>
<script type="text/javascript">
    $("document").ready(function(){
        $("tr").click(function(){
            $(this).next().slideToggle(100);
        })
    })
</script>
<?php
require("includes/footer.php");
?>