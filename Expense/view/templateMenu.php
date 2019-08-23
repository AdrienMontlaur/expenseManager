<?php $title='Menu';
$page = $_SERVER['PHP_SELF'];
require_once('../functions.php');?>
<div class="col-3">
    <nav>
        <ul class='menu'>
            <li><a class="puceMenu<?php if($page=="") echo' active'; ?>" href="">Accueil</a></li>
            <li><a class="puceMenu<?php if($page=="$arborescence"."view/viewGestionCommerciaux.php") echo' active'; ?>" href="viewGestionCommerciaux.php">Gestion des commerciaux</a></li>
            <li><a class="puceMenu<?php if($page=="$arborescence"."view/viewGestionClient.php"||$page=="$arborescence"."view/viewAjoutClient.php"||$page=="$arborescence"."view/viewModifierClient.php"||$page=="$arborescence"."view/viewSupprimerClient.php") echo' active'; ?>" href="viewGestionClient.php">Gestion des clients</a></li>
            <li><a class="puceMenu<?php if($page=="$arborescence"."view/viewGestionFrais.php"||$page=="$arborescence"."view/viewHistoriqueFrais.php") echo' active'; ?>" href="viewGestionFrais.php">Gestion des frais</a></li>
            <li><a class="puceMenu<?php if($page=="") echo' active'; ?>" href="">Statistiques</a></li>
        </ul>
    </nav>
</div>


