<?php
namespace General;

require_once('namespace_commerce.php');

Use Commerce1, Commerce2, Commerce3; // permet de preciser quel namespace je souhaite importer du fichier namespace_commerce.php

echo __NAMESPACE__ . '<hr>'; // Si un jour on est perdu dans les fihiers pour retrouver nos namespace, il y'a une constante magique qui permet d'afficher dans quel fichier on se trouve

/* sans l'antislash, il genere une erreur!! l'inbterpreteur va chercher si la methode StdClass() est declarée dans le namespace 'general. Donc pour revenir dans l'espace global de php, nous devons mettre un antislash devant la class*/
$std = new \StdClass();
echo '<pre>'; var_dump($std); echo'</pre>';

$commande = new Commerce1\Commande;
echo "Nombre de commande : " . $commande->nbProduit . '<hr>';
var_dump($commande);

//Exo: creer un objet de toutes les class declarées et faire les affichages des proprietés
$produit = new Commerce2\Produit;
echo "Nombre de produits : " . $produit->nbProduit . '<hr>';

$panier = new Commerce3\Panier;
echo "Nombre de panier : " . $panier->nbProduit . '<hr>';

$produits = new Commerce3\Produit;
echo "Nombre de produits : " . $produits->nbProduit . '<hr>';
?>