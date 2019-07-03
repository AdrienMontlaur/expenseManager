<?php

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
            echo 'coucou';
            if ($_POST['salMdp']==$value->getSalMdp()){
                //$_SESSION['login']=$_POST['login'];
                $_SESSION['id']=$value->getSalId();
                echo 'bonjour M'.$_SESSION['login'];
                header('location:../controller/controllerTestEntrepriseManager.php');
            }
            else{
                echo 'Mot de passe incorrect';
            }
        }
        else{
            echo 'Adresse salMail non reconnue';
        }
    }
}

