<?php
session_start();
extract($_POST);
extract($_REQUEST);

print_r($_SESSION);

print_r($_POST);


print_r($_REQUEST);

// die;
$op = $_REQUEST['op'];

if(isset($_SESSION['cart'][$pid])){
	
	if ( $op == 'add') {
		$_SESSION['cart'][$pid] +=1;	
		header("location:cart.php");
		exit;
	}
	if ($op == 'del') {
		if ($_SESSION['cart'][$pid]== 1) {
			unset($_SESSION['cart'][$pid]);
			header("location:cart.php");
			exit;
		}
		$_SESSION['cart'][$pid] -=1;
		header("location:cart.php");
		exit;
	}

	if ($op == 'rem') {
		unset($_SESSION['cart'][$pid]);
		header("location:cart.php");
		exit;
	}
		
	$_SESSION['cart'][$pid] +=1;

	header("location:product-detail.php?id=$pid&msg=item added to your cart");
}
else{
	$_SESSION['cart'][$pid] = 1;

	header("location:product-detail.php?id=$pid&msg=item added to your cart");
}
// add quantity of product in cart 

// del quantity of product in cart 

// remove quantity of product in cart 

?>