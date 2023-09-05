<?php
require("session_security.php");
require("db.php");
$id = $_REQUEST['id'];
$sql = "SELECT * FROM `category` WHERE `id` = '$id' ";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Style the form container */
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Style form inputs */
        input[type="text"],
        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Apply transparency on hover */
        input[type="text"]:hover,
        input[type="radio"]:hover {
            opacity: 0.7;
        }

        /* Style the submit button */
        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Apply transparency on hover for the submit button */
        input[type="submit"]:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <form action="editing-cat.php" method="post">
        <input type="hidden" name="cid" value="<?php echo $row['id'] ?>">
        Name: <input type="text" name="nm" value="<?php echo $row['name'] ?>"><br>
        isActive: <input type="radio" name="isActive" value="y" <?php echo ($row['is_active'] == "y") ? "checked='checked'" : ""; ?>> Yes
        <input type="radio" name="isActive" value="n" <?php echo ($row['is_active'] == "n") ? "checked='checked'" : ""; ?>> No
        <input type="submit" value="Update">
    </form>
</body>
</html>
