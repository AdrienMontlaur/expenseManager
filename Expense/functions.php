<?php

/**
* Function to autoload class by names
*
* @param str $className Call of class
*/  

function __autoload($className){
    $classDir = '../model/'.$className.'.php';
    if(file_exists($classDir)){
        require_once ($classDir);
    }else{
        echo "le fichier $classDir n'existe pas";
    }
}