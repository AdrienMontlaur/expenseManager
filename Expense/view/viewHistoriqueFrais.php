<?php $title='Historique frais'?>
<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Historique des frais</h1>
    <div class='formulaire'>
        <?php require_once('../controller/controllerFraisGestionnaire.php'); ?>
    </div>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>



<?php require_once('templateGestionnaire.php'); ?>
<a href="viewGestionFrais.php">Retourner à la gestion des remboursements</a>