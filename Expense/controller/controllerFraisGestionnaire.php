<?php

require_once('../functions.php');

$manageFrais=new FraisManager();

$frais=$manageFrais->readAll();

//Dependencies for all the controller

//Instance of managers
$manageClient=new ClientManager();
$manageEntreprise=new EntrepriseManager();
$manageSalarie=new SalarieManager();
$manageJustificatif=new JustificatifManager();
//function to adapats objects client array to table 
function adaptFraisToArray($frais,$page)
{
    //Instance of managers
    $manageClient=new ClientManager();
    $manageEntreprise=new EntrepriseManager();
    $manageSalarie=new SalarieManager();

    $array = [];

    foreach ($frais as $frai) {
        if($page=='liste'){
            if($frai->getFraStatut()!=="VALIDE"){
                $array[] = [
                    ''=>"<input type=radio name='radio' id='".$frai->getFraId()."' value='".$frai->getFraId()."'>",
                    'Status de la demande' => $frai->getFraStatut(),
                    'Commercial' => ($manageSalarie->read($frai->getSalId()))->getSalNom()." ".($manageSalarie->read($frai->getSalId()))->getSalPrenom(),
                    'Date du frais' => $frai->getFraDate(),           
                    'Type de frais' => $frai->getFraType(),
                    'Entreprise du client' => $frai->getFraEntSiret(),
                    'Nom du client' => ($manageClient->read($frai->getCliId())->getCliNom()),
                    'Remboursement (€)' => $frai->getFraRemboursement()
                ];
            }
        }
        if($page=='historique'){
            if($frai->getFraStatut()=="VALIDE"){
                $array[] = [
                    'Status de la demande' => $frai->getFraStatut(),
                    'Commercial' => ($manageSalarie->read($frai->getSalId()))->getSalNom()." ".($manageSalarie->read($frai->getSalId()))->getSalPrenom(),
                    'Date du frais' => $frai->getFraDate(),           
                    'Type de frais' => $frai->getFraType(),
                    'Entreprise du client' => $frai->getFraEntSiret(),
                    'Nom du client' => ($manageClient->read($frai->getCliId())->getCliNom()),
                    'Remboursement (€)' => $frai->getFraRemboursement()
                ];
            }
        }
    }
    return $array;
}

$frais=$manageFrais->readAll();

if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="$wampPath"."view/viewGestionFrais.php"){
    $page="liste";
    $manageForm=new Formulaire("","GET");
    $tableauObjetFraisAdapt=adaptFraisToArray($frais,$page);

    echo ('<form method="GET" action"">');
    echo (afficheTableau($tableauObjetFraisAdapt));
    echo ('<input class="submit" type="submit" name="envoyer" value="Traiter le frais sélectionné"></form>');
    echo'<a class="button" href="viewHistoriqueFrais.php">Voir l\'historique des remboursements</a>';
}
if (isset($_GET['radio'])){

    $fraisTraite=$manageFrais->read($_GET['radio']);

    $recapitulatif[]=[
    'Commercial' => $manageSalarie->read($fraisTraite->getSalId())->getSalNom()." ".$manageSalarie->read($manageFrais->read($_GET['radio'])->getSalId())->getSalPrenom(),
    'Date du frais' => $fraisTraite->getFraDate(),           
    'Type de frais' => $fraisTraite->getFraType(),
    'Entreprise du client' => $fraisTraite->getFraEntSiret(),
    'Nom du client' => $manageClient->read($fraisTraite->getCliId())->getCliNom()
    ];

    $justificatifs=$manageJustificatif->readAll();
    $jusId=[]; 
    foreach ($justificatifs as $justificatif){
        if($justificatif->getFraId()==$_GET['radio']){
            $jusId[$justificatif->getJusId()]=$justificatif->getJusId();
            $array[$justificatif->getJusId()]=[
            'jusPhoto'=> $justificatif->getJusPhoto()
            ];
        }
    }
    $jusIdForm=new Formulaire('','POST');
    $jusIdForm->select('jusId',$jusId,'',"Selectionner un justificatif");
    $jusIdForm->submit('envoyer','envoyer');
    echo (afficheTableau($recapitulatif));
    echo $jusIdForm->render();
    if(isset($_POST['jusId'])){
        echo  '<img src="data:image/jpeg;base64,'.base64_encode($array[$_POST['jusId']]['jusPhoto']).'"/><br />';
    }
    $statut=['VALIDE','REFUSE'];
    $rembourementForm=new Formulaire('','POST');
    $rembourementForm->label('remboursement','Mantant remboursé');
    $rembourementForm->input('text','remboursement','€');
    $rembourementForm->label('statut','Statut de la demande');
    $rembourementForm->select('statut',$statut,'','Selectionner un statut');    
    echo ("<h3>Montant demandé :</h3>".$manageFrais->read($_GET['radio'])->getFraRemboursementDemande()."€");
    $rembourementForm->label('dateRemboursement','Date du traitement');
    $rembourementForm->input('date','dateRemboursement','',date("Y-m-d"));
    $rembourementForm->submit('envoyerRemboursement','envoyer');
    echo $rembourementForm->render();
 

    if (isset($_POST['envoyerRemboursement'])){

        $fraisTraite->setFraDateRemboursement($_POST['dateRemboursement']);
        $fraisTraite->setFraStatut($statut[$_POST['statut']]);
        $fraisTraite->setFraRemboursement($_POST['remboursement']);
        $manageFrais->validateManager($fraisTraite);
        header('Location: viewGestionFrais.php');
    }
}
if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="$wampPath"."view/viewHistoriqueFrais.php"){
    $page="historique";
    $tableauObjetFraisAdapt=adaptFraisToArray($frais,$page);
    echo (afficheTableau($tableauObjetFraisAdapt));
    echo'<a class="button" href="viewGestionFrais.php">Retourner à la gestion des remboursements</a>';
}



