<?php  
require_once('inside/classes/conf/connection.php');
$ipaths[] = 'inside/classes/model';
$ipaths[] = 'inside/classes/dao';
$ipaths[] = 'inside/classes/lib';
$ipaths[] = 'inside/classes/conf';
$ipaths[] = 'inside/classes/error';
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