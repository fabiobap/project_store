<?php
    class UploadHandler{
        
        function verifyImg($file){
            
        $listType = array(
            '.jpeg'=>'image/jpeg',
            '.png'=>'image/png',
            '.gif'=>'image/gif',
            '.bmp'=>'image/bmp');
            
        if (is_uploaded_file($file['tmp_name'])){
                //checa se arquivo contem o tipo certo
            if($key = array_search($file["type"],$listType)){
                return true;
            }else{
                    return false;
            }
        }else{
            return false;
        }
    }
        
    function upload($file, $path){
        
        if (move_uploaded_file($file['tmp_name'], "$path")){
            return true;
        }else{
            return false;
        }
    }
}