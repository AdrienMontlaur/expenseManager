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
//path on personal wamp
$wampPath="http://localhost/expense/expenseManager/Expense/";

function afficheTableau($data){
    // Ouverture du tableau html et entete
    $html = '<table>';
    $html .= ' <thead><tr>';

    // Boucle sur les indices du premier tableau
    foreach ($data[0] as $key => $value){
        $html .= "<th>$key</th>";
    }

    // Fermeture entete html
    $html .= '</tr></thead>';

    // Ouverture du tbody
    $html .= '<tbody>';

    // boucle sur toutes le ligne du tableau
    foreach($data as $ligne){
        $html .= '<tr>';
        foreach($ligne as $celulle){
            $html .= "<td>$celulle</td>";
        }
        $html .= '</tr>';
    }

    // Ferme le tbody et table
    $html .= '</tbody></table>';

    return $html;
}
