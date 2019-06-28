<?php

//ecriture des controleurs

require_once('../functions.php');


$texte1= new Formulaire('controllerTestEntrepriseManager.php','POST');
$texte1->input('text','entSiret','Siret');
$texte1->input('text','entNom','Nom');
$texte1->input('text','entAdresse','Adresse');
$texte1->input('text','entPostal','Code Postal');
$texte1->input('text','entVille','Ville');

$texte1->submit('envoyer','envoyer');
echo $texte1->render();

if (isset($_POST['envoyer'])){

    $entreprise= new Entreprise();
    $entreprise->setEntSiret($_POST['entSiret']);
    $entreprise->setEntNom($_POST['entNom']);
    $entreprise->setEntAdresse($_POST['entAdresse']);
    $entreprise->setEntPostal($_POST['entPostal']);
    $entreprise->setEntVille($_POST['entVille']);

    $manageEntreprise=new EntrepriseManager();
    $manageEntreprise->create($entreprise);

}
