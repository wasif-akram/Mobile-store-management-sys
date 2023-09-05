<?php 
require ("session_security.php");
require ("db.php");
extract($_POST);
$sql = "INSERT INTO `product` VALUES(NULL,'$cat_id','$nm','$prc','$dsc','','$isActive')";
$res = mysqli_query($con,$sql);
$id = mysqli_insert_id($con);
if(isset($_FILES)){
	$im = $_FILES['im'];
	$im_name = $id."-".$im['name'];
	$fullpath = "pro_images/".$im_name;
	if($im['error'] == 0){
		if($im['type'] == "image/jpeg" || $im['type'] == "image/jpg" || $im['type'] == "image/png")
		{
			copy($im['tmp_name'], $fullpath);

			$sql = "update `product` set `image`='$im_name' where `id`='$id'";
			$res = mysqli_query($con, $sql);
		}

	}

}

header("location:product.php?msg=record added successfully!");
