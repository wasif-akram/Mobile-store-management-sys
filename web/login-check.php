<?php
session_start();
require ("lib/db.php");

extract($_POST);

$sql = "select * from `client` where `email`='$em' and `password`='$pass'";
// die($sql);
$res = mysqli_query($con, $sql) or die("error");
$tot = mysqli_num_rows($res);

if($tot == 1){
	$row = mysqli_fetch_assoc($res);
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['user_name'] = $row['name'];
	header("location:index.php");
}
else{
	header("location:login.php?msg=wrong user/pass, please try again!");
}