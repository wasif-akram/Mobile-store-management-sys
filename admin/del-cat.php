<?php
require ("session_security.php");
require ("db.php");
$id = $_REQUEST['id'];
$sql = " DELETE FROM `category` WHERE `id` = '$id' ";
$res = mysqli_query($con,$sql);
header("location:category.php?msg=record successfully deleted!");
