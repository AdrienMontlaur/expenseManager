<?php $title='Gestion frais'?>
<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Gestion des frais</h1>
    <div class='formulaire'>
    
        <?php require_once('../controller/controllerFraisGestionnaire.php'); ?>

    </div>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>

<?php require_once('templateGestionnaire.php'); ?>

<a href="viewHistoriqueFrais.php">Voir l'historique des remboursements</a>