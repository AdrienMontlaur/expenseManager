<?php

session_start();
require_once('../functions.php');

$log = new Formulaire("","POST");
$log->input("text", "login", "Tapez votre adresse mail");
$log->input("password", "mdp", "Tapez votre mot de passe");
$log->submit("envoiLog", "Log in");
echo $log->render();
/*
$salManager = new SalarieManager();
$listeLogin=$salManager->readAll;

foreach ($listeLogin as $value){
    if ((filter_input(INPUT_POST,'login',FILTER_SANITIZE_EMAIL))==$value->getSalMail){
        if ($_POST['mdp']==$value->getSalMdp){
            $_SESSION['login']=$_POST['login'];
        }
        else{
            echo 'Mot de passe incorrect';
        }
    }
    else{
        echo 'Adresse mail non reconnue';
    }
}
*/