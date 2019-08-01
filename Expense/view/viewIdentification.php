<?php $title='Identification'?>
<?php 
//native function to save content on buffer
ob_start(); ?>

<div class="col-xs-4 container">
    <h1>Expense Manager</h1>
    <h2>Page d'identification</h2>
    <div class='formulaire'>
        <?php require_once('../controller/controllerLogin.php'); ?>
    </div>
</div>

<?php 
//native function affect the content to the buffer and clean it
$content = ob_get_clean(); ?>

<?php require_once('templateIdentification.php'); ?>