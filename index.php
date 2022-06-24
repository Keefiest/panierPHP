<!DOCTYPE html>
<?php 
session_start();
?>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>

</head>
<body>
    <div id="wrapper">
        <h1>Ajouter un produit</h1>
        <nav>
            <a href="index.php">
                <button class="button">Ajouter un produit</button>
            </a>    
            <a href="recap.php">
            <button class="button" href="recap.php">Voir mon panier - <?php //echo count($_SESSION["products"])?></button>
            </a>
        </nav>
        <article id="art1">
            <form class="formulaire" action="traitement.php?action=ajouter" method="post">
                <p>
                    <label>
                        Nom du produit :</br>
                        <input type="text" name="name" placeholder="Pomme">
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit :</br>
                        <input type="number" step="any" name="price" placeholder="1,99">
                    </label>
                </p>
                <p>
                    <label>
                        Quantité désirée :</br>
                        <input type="number" name="qtt" value="1">
                    </label>
                </p>
                <p>
                    <input class="button" type="submit" name="submit" value="Ajouter">
                </p>
            </form>
            <!-- <a class="formulaire" href="./recap.php">
                <button>Afficher le panier</button>
            </a> -->
        </article>
        
    </div>
</body>
</html>