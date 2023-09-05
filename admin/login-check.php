<?php
session_start();
require ("db.php");
extract($_POST);
$sql = "select * from `admin` where `email`='$em' and `pass`='$pwd'";
// die($sql);
$res = mysqli_query($con, $sql) or die("error");
$tot = mysqli_num_rows($res);

if($tot == 1){
	$row = mysqli_fetch_assoc($res);
	$_SESSION['active_id'] = $row['id'];
	header("location:home.php");
}
else{
	header("location:index.php?msg=wrong username or password, try again!");
}