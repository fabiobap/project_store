<?php 
    $title = "Product List - Project Store";
    include("header.php");
?>
<hr>
<h2><i class="fa fa-list-alt" aria-hidden="true"></i> Table</h2>
    <?php
        $per_page = 10;
        $page = $_GET['page'] ?? 1;
    ?>
    <?php include("product-list-table.php");?>  
<?php include("footer.php"); ?>