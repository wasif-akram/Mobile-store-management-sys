<?php
require("includes/header.php");
require("includes/nav.php");
?>

<!-- Begin Body Part -->
<div class="body-part">
    <?php
    if (isset($_GET['page'])) { // which page is requested assign in $page variable by isset function
        $page = $_GET['page'];

        switch ($page) {
            case 'category':
                include("category.php");
                break;
            case 'product':
                include("product.php");
                break;
            default:
                include("includes/default.php");  // Include from the 'includes' folder
                break;
        }
    } else {
        include("includes/default.php");  // Include from the 'includes' folder
    }
    ?>
</div>
<!-- End Body Part -->

<?php
require("includes/footer.php");
?>
