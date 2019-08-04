<?php

//ecriture des controleurs
session_start();
require_once('../functions.php');


$texte1= new Formulaire('controllerTestEntrepriseManager.php','POST');
$texte1->input('text','entSiret','entSiret');
$texte1->input('text','entNom','Nom');
$texte1->input('text','entAdresse','Adresse');
$texte1->input('text','entPostal','Code Postal');
$texte1->input('text','entVille','Ville');

$texte1->submit('envoyer','envoyer');
echo $texte1->render();

if (isset($_POST['envoyer'])){

    $entreprise= new Entreprise();
    $entreprise->setentSiret(filter_input(INPUT_POST,'entSiret',FILTER_SANITIZE_NUMBER_INT));
    $entreprise->setEntNom(filter_input(INPUT_POST,'entNom',FILTER_SANITIZE_STRING));
    $entreprise->setEntAdresse(filter_input(INPUT_POST,'entAdresse',FILTER_SANITIZE_STRING));
    $entreprise->setEntPostal(filter_input(INPUT_POST,'entPostal',FILTER_SANITIZE_NUMBER_INT));
    $entreprise->setEntVille(filter_input(INPUT_POST,'entVille',FILTER_SANITIZE_STRING));

    $manageEntreprise=new EntrepriseManager();
    $manageEntreprise->create($entreprise);

}
//echo $_SESSION['login'];
echo $_SESSION['id'];

