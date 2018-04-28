<?php
if (!session_id()) @session_start();
include("autoload.php");

if ($_POST['id']){
    
    $id = $_POST['id']; 
    $quantity = $_POST['quantity']; 
    
    try{

        $cart = new Cart();
        $cart->updateCart($id, $quantity);

    }catch (\Exception $e){
        ErrorHandler::processError($e);
        exit;
    }
    header("Location: shopping-cart.php");
    exit;
}