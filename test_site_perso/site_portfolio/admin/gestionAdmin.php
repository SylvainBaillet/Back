<?php

if(!adminConnecte())
{
    header("location:" . URL . "connexion.php");
}

// insertion produit
if($_POST)
{
    $img_insert = $bdd->prepare("INSERT INTO produit (reference, categorie, titre, description, couleur, taille, public, photo, prix, stock ) VALUES (:reference, :categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)");
}