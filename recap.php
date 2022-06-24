<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
</head>
<body>
        <h1>Panier</h1>
        <nav>
            <a href="index.php">
                <button class="button">Ajouter un produit</button>
            </a>    
            <a href="recap.php">
            <button class="button" href="recap.php">Voir mon panier - <?php //echo count($_SESSION["products"]) ?> </button>
            </a>
        </nav>
    <div id="recap">
        
        <?php 
        /*  vérifie que "products" du tableau $_SESSION n'existe pas, 
        ou est null*/
        if(!isset($_SESSION["products"]) || empty($_SESSION["products"])){
            echo "<p>Aucun produit en session..</p>";
        }
        //  tableau html avec ligne d'en-tête   
        else{
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                "<tbody>";
            //Afficher tout les produits
            $totalGeneral = 0;
           
            foreach($_SESSION["products"] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='traitement.php?action=reduire&id=$index'>-</a>",
                        "".$product['qtt']."",
                        "<a href='traitement.php?action=augmenter&id=$index'>+</a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a href='traitement.php?action=supprimer&id=$index'>Supprimer</a></td>",
                        $totalGeneral+= $product['total'];
                    }
                    // foreach($_SESSION["products"] as $index => $product){
                    //     echo'<form method="session" action="">';
                    //     echo $product.'<input class button type="submit" name="supprimer" value="remove"/><br/>';
                    //     echo '<input type="hidden" name="product" value="'.$product.'"/>';
                    //     echo '</form>';
                    // }
                    
            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                "</table>";
        }
        ?>
        
        <a  href="traitement.php?action=viderPanier">     
            <button class="button">Vider le panier</button>
        </a>
    </div> 
</body>
</html>