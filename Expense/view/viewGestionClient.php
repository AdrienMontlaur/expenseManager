<?php $title='Gestion client'?>

<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Gestion des clients</h1>
    
    <a class="button" href="./viewAjoutClient.php">Ajouter un client</a>
    <a class="button" href="./viewModifierClient.php">Modifier un client</a>
    <a class="button" href="./viewSupprimerClient.php">Supprimer un client</a>
    <?php require_once('../controller/controllerClient.php'); ?>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>

<?php require_once('templateGestionnaire.php'); ?>