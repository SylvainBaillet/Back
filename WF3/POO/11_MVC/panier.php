<?php
session_start();

// nous avons réorganisé le code pour ne pas avoir à cliquer 2 fois sur "vider le panier", nous remontons donc la seconde condition if, au dessur du premier if
if(isset($_GET['action']) && $_GET['action'] =='vider')
    {
        unset(($_SESSION)['panier']);
    }    
    
if(isset($_GET['action']) && $_GET['action'] == 'create' || isset($_SESSION['panier']))
    {
        $_SESSION['panier'] = array(26,27,28);
        echo "Produit presents dans la panier : " . implode($_SESSION['panier'], '-')."<hr>";
        echo '<a href="?action=vider">Vider le panier</a>';  
    }
else
    {
        echo '<a href="?action=create">Creer le panier</a>';
    }

/* l'architecture MVC
1- Modele (echange avec la bdd)
2- View (affichage et presentation des données - html/css)
3- Controler (traitement PHP)

Le but de l'architecture MVC est de séparer les couches, c'est a dire de separer les langages au maximum
C'est comme ça que fonctionnent les CMS (Drupal, Wordpress etc...)

Avantages:
    -clarté de l'architecture , par exemple si le design doit changer , vous pouvez demander a l'integrateur de proceder aux mises a jour, , il ne risquera pas de faire sauter le code php par exemple, Cela favorise le travail d'equipe et les mises a jour.

Inconvenients: 
    - Nombre de fichiers (trop complexe pour de petites applications)
*/
    