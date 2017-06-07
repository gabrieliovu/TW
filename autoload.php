<?php

function appAutoload($class) {
    
    if (substr($class, 0, 4) === 'App\\') {
        $class = substr($class, 4, strlen($class) - 1);
        

        $class = str_replace('\\', '/', $class);
       
        include_once $class . '.php';

        
    }
}

spl_autoload_register('appAutoload');
