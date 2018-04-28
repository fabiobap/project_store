<?php 
   $title = "Alter Product - Project Store";
    include("header.php");

?>
<?php
    $id = $_GET['id'];
try{

    $categoryDao = new CategoryDAO($connection);
    $categories = $categoryDao->categoriesList();

    $productDao = new ProductDAO($connection);
    $product = $productDao->getId($id);

}catch (\Exception $e){
    ErrorHandler::processError($e);
    exit;
}
?>
<h2><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Alter product -
    <?=$product->getName()?>
</h2>
<div class="form-alter">
    <form action="alter-product.php" method="POST" class="container" id="needs-validation" novalidate>
        <input type="hidden" name="id" id="id" value="<?=$product->getId()?>" />
        <div class="form-row">

            <?php include("product-form-base.php");?>

            </div>
        <button type="submit" class="btn btn-outline-warning button-search">Alter</button>
    </form>
</div>
 <?php include("footer.php"); ?>