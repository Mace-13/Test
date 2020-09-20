<?php

if(isset($_GET['id'])){
    require ('connexion.php');

    $id=htmlspecialchars($_GET['id']);

    $req = $bdd->prepare('SELECT * FROM articles WHERE id=?');
    $req->execute([$id]);

    if(!$don = $req->fetch()){
        header('LOCATION:404.php');
    }
    $req->closeCursor();
}else{
    header('LOCATION:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit: <?=$don['nom']?></title>
</head>
<body>
    <?php
        if(empty($don['image'])){
            echo "pas d'image";
        }else{
            echo "<img id='test' src='images/".$don['image']."'>";
        }
    ?>
    <h1><?=$don['nom']?></h1>
    <h4>Prix: <?=$don['prix']?>€</h4>
    <p><?=nl2br($don['description'])?></p>
</body>
</html>