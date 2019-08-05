<?php $title='Modifier client'?>
<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Gestion des clients</h1>
    <h2>Modifier un client</h2>
    <div class='formulaire'>
        <?php require_once('../controller/controllerClient.php'); ?>
    </div>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>

<?php require_once('templateGestionnaire.php'); ?>