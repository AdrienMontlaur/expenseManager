<?php

//TODO modif et supp

//ecriture des controleurs
session_start();
require_once('../functions.php');

$manageEntreprises=new EntrepriseManager();

$entreprises=$manageEntreprises->readAll();
//var_dump($entreprises);
if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="http://localhost/ExpenseGit/expenseManager/Expense/view/viewAjoutClient.php"){

    $entreprisesNom=[];
    foreach($entreprises as $entreprise){
        echo $entreprise->getEntSiret();
        $entreprisesNom[$entreprise->getEntSiret()]=$entreprise->getEntNom();
    }
    var_dump($entreprisesNom);

    $formAjoutClient= new Formulaire('','POST');
    $formAjoutClient->select('entSiret',$entreprisesNom);
    echo "Si l'entreprise n'est pas connue:";
    echo '<a href="viewAjoutEntreprise">Ajouter une entreprise</a>';
    $formAjoutClient->input('text','cliNom','Nom du contact chez le client');
    $formAjoutClient->input('text','cliPrenom','Prenom du contact chez le client');
    $formAjoutClient->input('text','cliFonction','Fonction du contact chez le client');
    $formAjoutClient->input('text','cliMail','Mail du contact chez le client');
    $formAjoutClient->input('text','cliNumeroTelephone','Numéro de téléphone du contact chez le client');
    $formAjoutClient->input('text','cliCommentaire','Commentaire');
    
    $formAjoutClient->submit('envoyer','envoyer');
    echo $formAjoutClient->render();

    if (isset($_POST['envoyer'])){

        $client= new Client();
        $client->setCliNom(filter_input(INPUT_POST,'cliNom',FILTER_SANITIZE_STRING));
        $client->setCliPrenom(filter_input(INPUT_POST,'cliPrenom',FILTER_SANITIZE_STRING));
        $client->setCliFonction(filter_input(INPUT_POST,'cliFonction',FILTER_SANITIZE_STRING));
        $client->setCliMail(filter_input(INPUT_POST,'cliMail',FILTER_SANITIZE_EMAIL));
        $client->setCliNumeroTelephone(filter_input(INPUT_POST,'cliNumeroTelephone',FILTER_SANITIZE_STRING));
        $client->setCliCommentaire(filter_input(INPUT_POST,'cliCommentaire',FILTER_SANITIZE_STRING));
        $client->setEntSiret($_POST['entSiret']);
    
        $manageClient=new ClientManager();
        $manageClient->create($client);
        var_dump($client);
    }
    echo $_SESSION['id'];
}





