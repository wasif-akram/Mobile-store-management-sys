<?php
require("session_security.php");
require("db.php");
$sql = "SELECT * FROM category ";
$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9); /* Transparent white background */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease; /* Smooth transition on hover */
    }

    form:hover {
        background-color: rgba(255, 255, 255, 1); /* Fully opaque white background on hover */
    }

    label, select, input, textarea {
        display: block;
        margin-bottom: 10px;
    }

    select, input, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    select {
        height: 40px;
    }

    textarea {
        resize: vertical;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <form action="adding-pro.php" method="post" enctype="multipart/form-data">
        <label for="cat_id">Select Category:</label>
        <select name="cat_id" id="cat_id">
            <?php
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<option value='$row[id]'>$row[name]</option>";
            }
            ?>
        </select>
        <label for="nm">Name:</label>
        <input type="text" name="nm" id="nm">
        <label for="prc">Price:</label>
        <input type="text" name="prc" id="prc">
        <label for="dsc">Description:</label>
        <textarea cols="15" rows="8" name="dsc" id="dsc"></textarea>
        <label for="im">Image:</label>
        <input type="file" name="im" id="im">
        <div>
            <label for="isActive">Is Active:</label>
            <input type="radio" name="isActive" value="y" id="isActiveY" checked>
            <label for="isActiveY">Yes</label>
            <input type="radio" name="isActive" value="n" id="isActiveN">
            <label for="isActiveN">No</label>
        </div>
        <input type="submit" value="Add">
    </form>
</body>
</html>
