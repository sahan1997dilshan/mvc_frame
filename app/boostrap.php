<?php
//load configu
require_once 'config/config.php'; 
//load libraries
/*require_once 'libraries/Controller.php';
require_once 'libraries/Core.php';
require_once 'libraries/Database.php';*/

//auto core libraries
spl_autoload_register(function($classname){
    require_once 'libraries/' . $classname . '.php';
});