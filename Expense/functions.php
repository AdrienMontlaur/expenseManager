<?php

/**
* 
* @param str $className Classe appelé
*/  

function __autoload($className){
    $classDir = '../model/'.$className.'.php';
    if(file_exists($classDir)){
        require_once ($classDir);
    }else{
        echo "le fichier $classDir n'existe pas";
    }
}