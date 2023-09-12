<?php
session_start();
require("lib/db.php");
// print_r($_SERVER);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | About :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
	
		<?php
		if(isset($css))
		echo $css;

		if(isset($js))
		echo $js
		?>
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		
	</head>
	<body>
		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				<form method="post" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
					<input type="text" name="srch">

					<input type="submit" value="Search" />
				</form>
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
					<?php if(!isset($_SESSION['user_id'])){
					echo'<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>';
					}
					else{
						echo "<li>Welcome $_SESSION[user_name],</li>";
					echo"<li><a href=\"myaccount.php\">My account</a></li>";
					echo"<li><a href=\"logout.php\">Logout</a></li>";
					}
					?>
					
					<li>
						<label>
						<img src="images/cart.png" height="30" width="30"> 
					<?php
					if(isset($_SESSION['cart']))
					{
						echo "<a href='cart.php'>".count($_SESSION['cart'])." item(s)</a>";
					}	
					else{
					echo "noitems";
					}
					
					?>

				</label></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.html"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="product.php">Mobiles</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
		    <div class="clear"> </div>
		    <div class="wrap">
		    <div class="content">