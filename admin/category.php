<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
<link rel="stylesheet" href="category.css">
</head>
<body>
<?php
require("session_security.php");
require("db.php");


$where = "";
$srch = "";

if (isset($_REQUEST['srch'])) {
    extract($_REQUEST);
    $where = "where `name` like '%$srch%'";
}

// GET TOTAL RECORD
$sql = "select * from `category` $where";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
$total = mysqli_num_rows($res);
$start = 0;
$limit = 3;
$page = ceil($total / $limit);

if (isset($_REQUEST['p'])) {
    $start = ($_REQUEST['p'] - 1) * $limit;
}
?>

<?php require("includes/header.php"); ?>
<?php require("includes/nav.php"); ?>

<div class="search-form">
    <form action="category.php" method="post">
        <label for="srch">Search:</label>
        <input type="text" name="srch" id="srch">
        <input type="submit" value="Search">
        <a href="category.php">Show All</a>
    </form>
</div>

<?php
$sql = "select * from `category` $where LIMIT $start,$limit";
$res = mysqli_query($con, $sql) or die(mysqli_error($con));
?>

<div class="sql-query-info">
    SQL Query: <?php echo $sql; ?>
</div>

<?php
if (isset($_REQUEST['msg'])) {
    echo "<div class='error-msg'>$_REQUEST[msg]</div>";
}
?>

<div class="add-category-link">
    <a href="add-cat.php">Add More Category...</a>
</div>

<table class="category-table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>isActive</th>
        <th>Option</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($res)) : ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['is_active']; ?></td>
            <td>
                <a href="#" onclick="confirmDel('del-cat.php?id=<?php echo $row['id']; ?>')">
                    <img src='img/del.png' alt='Delete' height='30' width='30'>
                </a>
                <a href='edit-cat.php?id=<?php echo $row['id']; ?>'>
                    <img src='img/edit.png' alt='Edit' height='30' width='30'>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<div class="pagination-links">
    <?php for ($i = 1; $i <= $page; $i++) : ?>
        <a href='category.php?p=<?php echo $i; ?>&srch=<?php echo $srch; ?>'><?php echo $i; ?></a> |
    <?php endfor; ?>
</div>

<script type="text/javascript">
    function confirmDel(x) {
        var r = confirm("Are you sure to delete?");
        if (r === true) {
            window.location = x;
        } else {
            return false;
        }
    }
</script>
<?php require("includes/footer.php"); ?>

</body>
</html>

