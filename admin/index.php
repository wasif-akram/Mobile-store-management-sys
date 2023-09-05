<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Login Form</title>
</head>
<body>
    <div class="login-container">
        <h1>Admin</h1>
        <?php
if(isset($_REQUEST['msg'])){
	print"<div style='color:#f00;'> $_REQUEST[msg]</div>";
}

?>
        <form id="login-form" action="login-check.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="em" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="pwd" required>

            <button type="submit" value="login">Login</button>
        </form>
    </div>
</body>
</html>
