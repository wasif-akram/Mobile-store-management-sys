<?php
session_start();
require("lib/db.php");

if(!isset($_SESSION['user_id'])){
	header("location:login.php?msg=Please login to place order");
	exit();
}

$uid = $_SESSION['user_id'];
$dt = date("d-m-y");
// die($dt);
foreach ($_SESSION['cart'] as $pid => $qnty) {
	$sql = "INSERT INTO `orders` (`id`, `cid`, `pid`, `qnty`, `ord_date`, `admin_comment`, `client_comment`, `status`) VALUES (NULL, '$uid', '$pid', '$qnty', '$dt', '', '', 'pending')";

	// echo $sql;
	// die;
	$res = mysqli_query($con,$sql) or die("error");
}
unset($_SESSION['cart']);

header("location:index.php?msg=Order Placed Successfully!");
	exit();