<?php
class ShowAlert{
    
    function showGenericAlert(String $tipo){  
        if (!session_id()) @session_start();
        if(isset($_SESSION[$tipo])){
    ?>
    <p class="alert-<?= $tipo?>"><?= $_SESSION[$tipo]?></p>
    <?php 
        unset($_SESSION[$tipo]);
        }
    }
}
