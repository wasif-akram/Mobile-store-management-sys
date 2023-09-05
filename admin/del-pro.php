<?php
require ("session_security.php");
require ("db.php");
$id = $_REQUEST['id'];
$sql = "DELETE FROM `product` WHERE `id` = '$id' ";
$res = mysqli_query($con,$sql);
header("location:product.php?msg=record deleted successfully!");
