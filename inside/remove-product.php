<?php
    if (!session_id()) @session_start();
    
    include("autoload.php");

    try{
        $id = $_POST['id'];

        $productDao = new ProductDAO($connection);

        if ($productDao->removeProduct($id)){
            if (!session_id()) @session_start();
            $_SESSION["success"] = "Product was successfully removed!";
            header("Location: product-search.php");
            exit;
        }else{
            if (!session_id()) @session_start();
            $_SESSION["danger"] = "Product was not removed!";
            header("Location: product-search.php");
            exit;
        }
        
     }catch (\Exception $e){
        ErrorHandler::processError($e);
        exit;
    }
?>