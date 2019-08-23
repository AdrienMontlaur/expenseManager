<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="../public/CSS/style.css" rel="stylesheet" /> 
    </head>
    <body>
        <?php require_once "templateBanniere.php"?>
        <div class="d-flex no-gutter">
            <?php require_once "templateMenu.php"?> 
            <div class="col-9">   
                <?= $content ?>
            </div>
        </div>
    </body>
</html>
