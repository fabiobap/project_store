<?php  
require_once('classes/conf/connection.php');
$ipaths[] = 'classes/model';
$ipaths[] = 'classes/dao';
$ipaths[] = 'classes/lib';
$ipaths[] = 'classes/conf';
$ipaths[] = 'classes/error';
set_include_path(implode(PATH_SEPARATOR, $ipaths));
spl_autoload_register(function ($class) {
    $paths = explode(PATH_SEPARATOR, get_include_path());
    foreach ($paths AS $path) {
        $file = $path . '/' . $class . '.php';
        if (is_file($file)) {
            require_once($file);
            return;
        }
    }
});