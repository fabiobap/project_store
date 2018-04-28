<?php
if (!session_id()) @session_start();
include("autoload.php");

if ($_POST['id']){
    
    $id = $_POST['id']; 
    
    try{
        $productDao = new ProductDAO($connection);
        $product = $productDao->getId($id);

        $cartItem = array($product->getId()=>array('image'=>$product->getImage(),'name'=>$product->getName(), 'id'=>$product->getId(), 'quantity'=>$_POST["quantity"], 'price'=>$product->getPrice()));

        $cart = new Cart();
        $cart->addToCart($product->getId(), $cartItem);

    }catch (\Exception $e){
        ErrorHandler::processError($e);
        exit;
    }
    header("Location: shopping-cart.php");
    exit;
}