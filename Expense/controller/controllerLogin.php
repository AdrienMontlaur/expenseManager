<?php
//Session start for user record
session_start();
require_once('../functions.php');

$log = new Formulaire("","POST");
$log->input("text", "login", "Tapez votre adresse email");
$log->input("password", "salMdp", "Tapez votre mot de passe");
$log->submit("envoiLog", "Log in");
echo $log->render();

$salManager = new SalarieManager();
$listeLogin=$salManager->readAll();

foreach ($listeLogin as $value){
    if(isset($_POST['envoiLog'])){
        if (($_POST['login'])==$value->getSalMail()){
            if ($_POST['salMdp']==$value->getSalMdp()){
                $_SESSION['id']=$value->getSalId();
                $_SESSION['nom']=$value->getSalNom();
                header('location:../view/viewGestionCommerciaux.php');
            }
            else{
                echo 'Erreur d\'identification';
            }
        }
        else{
            echo 'Erreur d\'identification';
        }
    }
}

