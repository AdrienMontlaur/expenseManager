<?php

session_start();
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
    echo ('<input type="submit" name="envoyer" value="Traiter le frais sélectionné"></form>');
}
if (isset($_GET['radio'])){

    $recapitulatif[]=[
    'Commercial' => $manageSalarie->read($manageFrais->read($_GET['radio'])->getSalId())->getSalNom()." ".$manageSalarie->read($manageFrais->read($_GET['radio'])->getSalId())->getSalPrenom(),
    'Date du frais' => $manageFrais->read($_GET['radio'])->getFraDate(),           
    'Type de frais' => $manageFrais->read($_GET['radio'])->getFraType(),
    'Entreprise du client' => $manageFrais->read($_GET['radio'])->getFraEntSiret(),
    'Nom du client' => $manageClient->read($manageFrais->read($_GET['radio'])->getCliId())->getCliNom()
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
    var_dump($jusId);
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
    $rembourementForm->submit('envoyer','envoyer');
    echo $rembourementForm->render();
    echo ('<a href="viewGestionFrais.php">Retourner à la gestion des remboursements</a>');
}
if ($url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']==="$wampPath"."view/viewHistoriqueFrais.php"){
    $page="historique";
    $tableauObjetFraisAdapt=adaptFraisToArray($frais,$page);
    echo (afficheTableau($tableauObjetFraisAdapt));
}



