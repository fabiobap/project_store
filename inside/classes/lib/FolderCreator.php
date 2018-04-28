<?php
class FolderCreator{
    
    function verifyAndCreateFolder(String $path){
        
        if( is_dir($path) === false ){
        return mkdir($path);
        }
    }
    
}