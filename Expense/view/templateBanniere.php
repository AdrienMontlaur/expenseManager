<?php 
session_start();
if ($_SESSION['nom']==null){
    header('Location: viewIdentification.php');
}
$title='Banniere'?>
<div class="d-flex banniere no-gutter">
    <div class="col-3 logo">
    </div>
    <div class="d-flex col-9 banniereNom">
        <p>Gestionnaire :<?= $_SESSION['nom'] ?></p>
        <div class="buttonLogout"><?php //$_SESSION['nom']="" ?></div>
    </div>
</div>


