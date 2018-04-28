<?php

class ErrorHandler{
    
    public static function processError(\Exception $e){
        
        if (DEBUG){
            echo '<pre>';
            print_r($e);
            echo '</pre>';
        }else{
            echo $e->getMessage();
        }
        exit;
    }
}