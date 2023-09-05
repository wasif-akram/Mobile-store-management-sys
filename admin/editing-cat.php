<?php
require ("session_security.php");
require ("db.php");
extract($_POST);
$sql = "UPDATE `category` SET `name` ='$nm', `is_active` = '$isActive'
WHERE `id` = '$cid'";
$res = mysqli_query($con,$sql);
header("location:category.php?msg=record updated successfully!");
