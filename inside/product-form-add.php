<?php 
   $title = "Products - Project Store";
    include("header.php");
?>
<?php
try{

    $categoryDao = new CategoryDAO($connection);
    $categories = $categoryDao->categoriesList();
    
    $product = new Product();
}catch (\Exception $e){
    ErrorHandler::processError($e);
    exit;
}
?>
<h2><i class="fa fa-level-up" aria-hidden="true"></i> Products</h2>
<div class="form-add">
    <form action="add-product.php" method="POST" enctype="multipart/form-data" id="needs-validation" novalidate>
        <div class="form-row">
            <div class="form-group col-lg-12">
                <label for="image">Image</label>
                <input class="form-control" type="file" value="<?=$product->getImage()?>" id="image" name="image" />
            </div>
        <?php include("product-form-base.php");?>
        </div>
        <button type="submit" class="btn btn-primary button-search">Add</button>
    </form>
</div>
<?php include("footer.php"); ?>
