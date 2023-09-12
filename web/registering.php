<?php
session_start();
extract($_POST);

$_SESSION['frm']['nm'] = $nm;
// print_r($_SESSION);

// die;
require("lib/db.php");


if($_SESSION['captcha']['code'] != $cpt){
	header("location:http://localhost/mobilestore-asif/web/register.php?msg=invalid captcha code!");
	exit();
}


$sql = "INSERT INTO `client`  VALUES (NULL, 
        '$nm','$email','$pass1','$mobile','$add','y')";
        // print $sql;
$res = mysqli_query($con, $sql);
unset($_SESSION['frm']);
header("location:register.php?msg=account register successfully!");
