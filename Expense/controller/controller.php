<?php

//ecriture des controleurs

require_once('../model/Formulaire.php');
require_once('../model/Database.php');
require_once('../model/Entreprise.php');

$texte1= new Formulaire('controller.php','POST');
$texte1->input('text',1);
$texte1->input('text',2);

$texte1->submit('envoyer','envoyer');
echo $texte1->render();
if (isset($_POST['envoyer'])){

    $entreprise= new Entreprise();
    $entreprise->setNom($_POST['1']);
    $entreprise->setSiret($_POST['2']);

    $requete= new Database();
    $requete->insert($entreprise->getSiret(),$entreprise->getNom());

}