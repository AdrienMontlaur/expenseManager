<?php $title='Identification'?>
<?php ob_start(); ?>
<div class="container">
    <div class="col-sm-4">
        <h1>Expense Manager</h1>
        <h2>Page d'identification</h2>

        <?php require_once('../controller/controllerLogin.php'); ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once('templateIdentification.php'); ?>