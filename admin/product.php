<?php
require("session_security.php");
require("db.php");
require("includes/header.php");
require("includes/nav.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="product.css">
</head>
<body>

<div class="container">
  <?php
  function getCat($id){
      global $con;
      $sql = "select * from `category` where `id` = $id";
      $res = mysqli_query($con,$sql) or die (mysqli_error($con));
      $row = mysqli_fetch_assoc($res);
      return $row['name'];
  }

  // Rest of your PHP code goes here...
  $where = "";
$srch = "";
if(isset($_REQUEST['srch'])){
    extract($_REQUEST);
    $where = "where `name` like '%$srch%'";
}
//get the total record
$sql = "select * from `product`";
$res = mysqli_query($con,$sql) or die(mysqli_error($con));
$total = mysqli_num_rows($res);
$start = 0;
$limit = 3;
$page = ceil($total/$limit);

if(isset($_REQUEST['p'])){
    $start = ($_REQUEST['p']-1) * $limit;
}
print "<h1>Manage Product</h1>";
print "
<form action='product.php' method='post'>
Search: <input type='text' name='srch'>
<input type='submit' value='Search'>
<a href='product.php'>show all</a>
</form>
";
$sql = "SELECT *,`c`.`name` `cname`,`p`.`name` `pname` FROM `category` `c`,`product` `p` WHERE `c`.`id` = `p`.`cat_id` order by `p`.`id` DESC LIMIT $start,$limit ";
$res = mysqli_query($con,$sql) or die (mysqli_error($con));
if(isset($_REQUEST['msg'])){
	print"<div style='color:#f00;'> $_REQUEST[msg]</div>";
}
echo "<a href='add-pro.php'>Add  More Product...</a>";  
print "<table width='400' border='1' style='border-collapse:collapse;'>
		<tr>
			<th>Id</th>
			<th>Category</th>
			<th>Name</th>
			<th>price</th>
			<th>Desc</th>
			<th>Image</th>
			<th>isActive</th>
			<th>Option</th>
		</tr>";    
while($row = mysqli_fetch_assoc($res)){
    $path = "pro_images/".$row['image'];
    print "<tr>
    <td>$row[id]</td>
    <td>$row[cname]</td>
    <td>$row[pname]</td>
    <td>$row[price]</td>
    <td>$row[description]</td>
    <td><img src='$path' height='80' width='80'></td>
    <td>$row[is_active]</td>
    <td>
    <a href='#' onclick='confirmDel(\"del-pro.php?id=$row[id]\")'><img src='img/del.png' height='30' width='30'></a>
    <a href='edit-pro.php?id=$row[id]'><img src='img/edit.png' height='30' width='30'></a>
    </td>
</tr>";
}
print "</table>";
print "<div>";
for($i=1;$i<=$page;$i++){
	echo "<a href='product.php?p=$i&srch=$srch'>$i</a> | ";
}
print "</div>";

?>
<script type="text/javascript">
function confirmDel(x){
	var r = confirm("Are you sure to delete?");
	if (r == true) {
		window.location = x;
	} 
	else {
		return false;
	}

}
</script>
  
</div>

</body>
</html>

<?php
require("includes/footer.php");
?>
