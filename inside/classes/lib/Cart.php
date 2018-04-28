<?php
class Cart{
    
    public function addToCart($itemId, array $cartItem){
        
        if(!empty($_SESSION["cart_item"])) {
			if(in_array($itemId,array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $key => $value):
                    if($itemId == $key) {
                        if(empty($_SESSION["cart_item"][$key]["quantity"])) {
                            $_SESSION["cart_item"][$key]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$key]["quantity"] += $_SESSION["cart_item"][$key]["quantity"];
                    }
				endforeach;
			}else{
				$_SESSION["cart_item"] = $_SESSION["cart_item"]+$cartItem;
			}
		}else{
			$_SESSION["cart_item"] = $cartItem;
		}
    }
    
    public function removeFromCart($itemId){
        
        if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $key => $value):
                if($itemId == $key){
                    unset($_SESSION["cart_item"][$key]);
                }
                if(empty($_SESSION["cart_item"])){
                    unset($_SESSION["cart_item"]);
                }
			endforeach;
		}
    }
    
    public function updateCart($itemId, $quantity){
        
        if(in_array($itemId,array_keys($_SESSION["cart_item"]))) {
            foreach($_SESSION["cart_item"] as $key => $value):
                if($itemId == $key) {
                    if(empty($_SESSION["cart_item"][$key]["quantity"])) {
                        $_SESSION["cart_item"][$key]["quantity"] = 0;
                    }
                    $_SESSION["cart_item"][$key]["quantity"] = $quantity;
                }
            endforeach;
        }
    }
    
    
    
}