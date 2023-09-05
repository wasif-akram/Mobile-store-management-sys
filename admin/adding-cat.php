<?php
require ("session_security.php");
require ("db.php");
extract($_POST);
$sql = "INSERT INTO `category` VALUES (NULL,'$nm', '$isActive')";
$res = mysqli_query($con,$sql);
header("location:category.php?msg=record added successfully!");