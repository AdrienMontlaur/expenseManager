<?php $title='GestionCommerciaux'?>
<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Gestion des commerciaux</h1>
    <a href="./viewAjoutCommercial.php">Ajouter un commercial</a>
    <a href="./viewModifierCommercial.php">Modifier un commercial</a>
    <a href="./viewSupprimerCommercial.php">Supprimer un commercial</a>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>

<?php require_once('templateGestionnaire.php'); ?>