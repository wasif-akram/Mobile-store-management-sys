<?php
require ("session_security.php");
require ("db.php");
extract($_POST);
extract($_FILES);
$path = "pro_images/";
$im_name = $oldIm;
if(isset($im)){
	if($im['error']==0){
		if($im['type']=="image/jpg" || $im['type']=="image/jpeg" || $im['type']=="image/png")
		{
		unlink($path.$im_name);
        $im_name =$im['name'];
        copy($im['tmp_name'], $path.$im_name);
        }
    }
}
$sql = "UPDATE `product` SET `name` ='$nm' ,`price` = '$prc', `image` ='$img_name',`description` ='$dsc', `is_active` = '$isActive' WHERE `id` = '$pid' ";
$res = mysqli_query($con ,$sql);
header("location:product.php?msg=record updated successfully!");
