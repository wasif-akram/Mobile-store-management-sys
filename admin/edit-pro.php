<?php
require("session_security.php");
require("db.php");
$id = $_REQUEST['id'];
$sql = "SELECT * FROM `product` WHERE `id` = '$id' ";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
// Get all categories
$sql_cat = "SELECT * FROM `category` ";
$res_cat = mysqli_query($con, $sql_cat);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        /* Styling for the form container */
        .edit-product-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        /* Style form elements */
        .edit-product-form select,
        .edit-product-form input[type="text"],
        .edit-product-form input[type="file"],
        .edit-product-form textarea,
        .edit-product-form input[type="radio"],
        .edit-product-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Apply transparency on hover for form elements */
        .edit-product-form select:hover,
        .edit-product-form input[type="text"]:hover,
        .edit-product-form input[type="file"]:hover,
        .edit-product-form textarea:hover,
        .edit-product-form input[type="radio"]:hover,
        .edit-product-form input[type="submit"]:hover {
            opacity: 0.7;
        }

        /* Style submit button */
        .edit-product-form input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        /* Apply different background color on hover for submit button */
        .edit-product-form input[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <form class="edit-product-form" action="editing-pro.php" method="post" enctype="multipart/form-data">
        <label for="cat_id">Select Category:</label>
        <select name="cat_id">
            <?php
            while ($row_cat = mysqli_fetch_assoc($res_cat)) {
                $selected = ($row['cat_id'] == $row_cat['id']) ? "selected" : "";
                echo "<option value='$row_cat[id]' $selected>$row_cat[name]</option>";
            }
            ?>
        </select>

        <input type="hidden" name="pid" value="<?php echo $row['id'] ?>">
        <br>
        <label for="nm">Name:</label>
        <input type="text" name="nm" value="<?php echo $row['name'] ?>"><br>

        <label for="prc">Price:</label>
        <input type="text" name="prc" value="<?php echo $row['price'] ?>"><br>

        <label for="dsc">Description:</label>
        <textarea name="dsc"><?php echo $row['description'] ?></textarea>
        <br>

        <label for="im">Image:</label>
        <input type="file" name="im">
        <input type="hidden" name="oldIm" value="<?php echo $row['image'] ?>">
        <br>

        <label>isActive:</label>
        <input type="radio" name="isActive" value="y" <?php echo ($row['is_active'] == "y") ? "checked='checked'" : ""; ?>> Yes
        <input type="radio" name="isActive" value="n" <?php echo ($row['is_active'] == "n") ? "checked='checked'" : ""; ?>> No
        <br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
