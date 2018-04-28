<?php 
    if (!session_id()) @session_start();
    
    include("autoload.php");

    try{
        /* Product do post */
        $id = $_POST["id"];
        $name = $_POST["name"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $price = $_POST["price"];
        $description = $_POST["description"];
        $details = $_POST["details"];
        $categoryId = $_POST["category"];

        $category = new Category();
        $category->setId($categoryId);

        $product = new Product();
        $product->setId($id);
        $product->setName($name);
        $product->setBrand($brand);
        $product->setModel($model);
        $product->setPrice($price);
        $product->setDescription($description);
        $product->setDetails($details);
        $product->setCategory($category);

        $productDao = new ProductDAO($connection);
        
    }catch (\Exception $e){
        ErrorHandler::processError($e);
         exit;
     }

    if ($productDao->alterProduct($product)){
        if (!session_id()) @session_start();
        $_SESSION["success"] = "Product was successfully altered!";
        header("Location: product-search.php");
        exit;
    }else{
        if (!session_id()) @session_start();
        $_SESSION["danger"] = "Product was not altered!";
        header("Location: product-form-alter.php?id=$id");
        exit;
    }