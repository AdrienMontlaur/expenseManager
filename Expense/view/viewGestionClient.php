<?php $title='Gestion client'?>

<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Gestion des commerciaux</h1>
    
    <a href="./viewAjoutClient.php">Ajouter un client</a>
    <a href="./viewModifierClient.php">Modifier un client</a>
    <a href="./viewSupprimerClient.php">Supprimer un client</a>
    <?php require_once('../controller/controllerClient.php'); ?>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>

<?php require_once('templateGestionnaire.php'); ?>