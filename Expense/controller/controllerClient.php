<?php

//TODO modif et supp

//ecriture des controleurs
session_start();
require_once('../functions.php');

$manageEntreprises=new EntrepriseManager();

$entreprises=$manageEntreprises->readAll();
//var_dump($entreprises);

//Dependencies for all the controller

//Instance of managers
$manageClient=new ClientManager();
$manageClient=new ClientManager();

//Table with all entreprise name
function getTableEntreprise($entreprises){
    $entreprisesNom=[];
    foreach($entreprises as $entreprise){
        $entreprisesNom[$entreprise->getEntSiret()]=$entreprise->getEntNom();
    }
    return $entreprisesNom;
}

//function to adapats objects client array to table 
function adaptClientsToArray($clients,$entreprises,$modif=false,$supp=false)
{

    $entreprisesNom=getTableEntreprise($entreprises);
    $array = [];
    foreach ($clients as $client) {
        $id = $client->getCliId();
        $nomEntrepriseClient='';
            foreach ($entreprisesNom as $key=>$entrepriseNom){
                if($key ==$client->getEntSiret()){
                    $nomEntrepriseClient=$entrepriseNom;
                }
            }
        if ($modif){
            $array[] = [
                'Entreprise' => $nomEntrepriseClient,           
                'Nom du contact' => $client->getCliNom(),
                'Prenom du contact' => $client->getCliPrenom(),
                'Fonction du contact' => $client->getCliFonction(),
                'Mail du contact' => $client->getCliMail(),
                'Numero de telephone' => $client->getCliNumeroTelephone(),
                'Commentaire' => $client->getCliCommentaire(),
                'Modifier' => "<a href='?idClientModif=$id'>Modifier</a>"
            ];
        }
        else if ($supp){
            $array[] = [
                'Entreprise' => $nomEntrepriseClient,           
                'Nom du contact' => $client->getCliNom(),
                'Prenom du contact' => $client->getCliPrenom(),
                'Fonction du contact' => $client->getCliFonction(),
                'Mail du contact' => $client->getCliMail(),
                'Numero de telephone' => $client->getCliNumeroTelephone(),
                'Commentaire' => $client->getCliCommentaire(),
                'Supprimer' => "<a href='?idClientSupp=$id'>Supprimer</a>"
            ];
        }
        else{
            $array[] = [
                'Entreprise' => $nomEntrepriseClient,           
                'Nom du contact' => $client->getCliNom(),
                'Prenom du contact' => $client->getCliPrenom(),
                'Fonction du contact' => $client->getCliFonction(),
                'Mail du contact' => $client->getCliMail(),
                'Numero de telephone' => $client->getCliNumeroTelephone(),
                'Commentaire' => $client->getCliCommentaire()
            ];
        }
    }
    return $array;
}

//List clients

if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="http://localhost/ExpenseGit/expenseManager/Expense/view/viewGestionClient.php"){

    $clients=$manageClient->readAll();
    $tableauObjetClientsAdapt=adaptClientsToArray($clients,$entreprises);
    echo (afficheTableau($tableauObjetClientsAdapt));
}
//Add client menu
if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="http://localhost/ExpenseGit/expenseManager/Expense/view/viewAjoutClient.php"){

    $entreprisesNom=getTableEntreprise($entreprises);

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
    
        $manageClient->create($client);
        var_dump($client);
    }
    echo $_SESSION['id'];
}


//Update client menu

if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="http://localhost/ExpenseGit/expenseManager/Expense/view/viewModifierClient.php"){

    $clients=$manageClient->readAll();
    $tableauObjetClientsAdapt=adaptClientsToArray($clients,$entreprises,true);
    echo (afficheTableau($tableauObjetClientsAdapt));
    
}

if (isset($_GET['idClientModif'])){

    $client = $manageClient->read($_GET['idClientModif']);
    $entreprisesNom=getTableEntreprise($entreprises);

    $formAjoutClient= new Formulaire('','POST');
    $formAjoutClient->select('entSiret',$entreprisesNom,$client->getEntSiret());
    echo "Si l'entreprise n'est pas connue:";
    echo '<a href="viewAjoutEntreprise">Ajouter une entreprise</a>';
    $formAjoutClient->input('text','cliNom','Nom du contact chez le client',$client->getCliNom());
    $formAjoutClient->input('text','cliPrenom','Prenom du contact chez le client',$client->getCliPrenom());
    $formAjoutClient->input('text','cliFonction','Fonction du contact chez le client',$client->getCliFonction());
    $formAjoutClient->input('text','cliMail','Mail du contact chez le client',$client->getCliMail());
    $formAjoutClient->input('text','cliNumeroTelephone','Numéro de téléphone du contact chez le client',$client->getCliNumeroTelephone());
    $formAjoutClient->input('text','cliCommentaire','Commentaire',$client->getCliCommentaire());

    $formAjoutClient->submit('envoyer','envoyer');
    echo $formAjoutClient->render();

    if (isset($_POST['envoyer'])){
        
        
        $client->setCliNom(filter_input(INPUT_POST,'cliNom',FILTER_SANITIZE_STRING));
        $client->setCliPrenom(filter_input(INPUT_POST,'cliPrenom',FILTER_SANITIZE_STRING));
        $client->setCliFonction(filter_input(INPUT_POST,'cliFonction',FILTER_SANITIZE_STRING));
        $client->setCliMail(filter_input(INPUT_POST,'cliMail',FILTER_SANITIZE_EMAIL));
        $client->setCliNumeroTelephone(filter_input(INPUT_POST,'cliNumeroTelephone',FILTER_SANITIZE_STRING));
        $client->setCliCommentaire(filter_input(INPUT_POST,'cliCommentaire',FILTER_SANITIZE_STRING));
        $client->setEntSiret($_POST['entSiret']);
    
        $manageClient->update($client);
        header('location:http://localhost/ExpenseGit/expenseManager/Expense/view/viewGestionClient.php');
    }
    echo $_SESSION['id'];
}
if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="http://localhost/ExpenseGit/expenseManager/Expense/view/viewSupprimerClient.php"){

    $clients=$manageClient->readAll();
    $tableauObjetClientsAdapt=adaptClientsToArray($clients,$entreprises,false,true);
    echo (afficheTableau($tableauObjetClientsAdapt));
    
}
if (isset($_GET['idClientSupp'])){
    $client=$manageClient->read($_GET['idClientSupp']);
    $manageClient->delete($client);
    header('location:http://localhost/ExpenseGit/expenseManager/Expense/view/viewGestionClient.php');
}