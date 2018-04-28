<?php
if (!session_id()) @session_start();
include("autoload.php");

if ($_GET['id']){
    
    $id = $_GET['id']; 
    
    try{

        $cart = new Cart();
        $cart->removeFromCart($id);

    }catch (\Exception $e){
        ErrorHandler::processError($e);
        exit;
    }
        header("Location: shopping-cart.php");
        exit;
}