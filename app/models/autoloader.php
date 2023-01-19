<?php

spl_autoload_register('autoloader');
function autoloader($classname)
{
    $classname = str_replace('\\', '/', $classname);

    $path = "../models/".$classname.".php";

    if (file_exists($path)) {
        require_once($path);
    }
}