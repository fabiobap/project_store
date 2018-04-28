<?php 
    $title = "Search for Products - Project Store";
    include("header.php");
?>
<?php
try{

    $categoryDao = new CategoryDAO($connection);
    $categories = $categoryDao->categoriesList();
}catch (\Exception $e){
    ErrorHandler::processError($e);
    exit;
}
?>
<h2><i class="fa fa-search" aria-hidden="true"></i> Search for Products</h2>
<div class="form-search">
    <form action="product-search.php" method="GET">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="basic-addon2">Name</span>
                    <input type="text" class="form-control" aria-label="" name="name" id="name" value="<?=$_GET['name']?>" autofocus>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon" id="basic-addon2">Category</span>
                    <select name="category" id="category" class="form-control">
                    <?php foreach($categories as $category) :
                        $thisCategory = $_GET['category'] == $category->getId();
                        $selecao = $thisCategory ? "selected='selected'" : "";
                    ?> 
                    <option value="<?=$category->getId()?>" <?=$selecao?>>
                        <?=$category->getName()?> 
                    </option>
                    <?php endforeach ?> 
                </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary button-search">Search</button>
        </div>
    </form>
</div>
<hr>
<h2><i class="fa fa-list-alt" aria-hidden="true"></i> Table</h2>
<?php
        $name = $_GET['name'] ?? '';
        $categoryId = $_GET['category'] ?? 1;
        $per_page=5;
        $page = $_GET['page'] ?? 1;

        include("product-search-table.php");
    ?>
    <?php 
    include("footer.php"); 
?>
