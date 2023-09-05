<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		/* Header Styles */
		.header-container {
			background-color: #333;
			color: white;
			padding: 10px;
			overflow: hidden;
		}

		.header-container h1 {
			margin: 0;
			font-size: 24px;
		}

		.logout-link {
			float: right;
			margin-top: 10px;
			margin-right: 20px;
			color: #f00;
			text-decoration: none;
		}
	</style>
</head>
<body>

<table width="100%" height="600px" border="1">
	<tr>
		<td colspan="2" height="100px" valign="middle" class="header-container">
			<div style="float: left; width: 500px; border: 0px solid #f00;"><h1><i>Welcome Admin</i></h1></div>
			<div style="float: right; border: 0px solid #f00; margin-top: 30px; margin-right: 10px;"><a href="logout.php" class="logout-link">logout</a></div>
		</td>
	</tr>
