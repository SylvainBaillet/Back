<?php

/* Les Traits ont été inventés pour repousser les limites de l'heritage, il est possible pour une class d'heriter de plusieurs trait en meme temps.
Un trait est un regroupement de methodes et de proprietés pouvant etre importées dans une class */ 
trait TPanier
    {
        public $nbProduit = 1;
        public function affichageProduits()
            {
                return "affichage des produits !! <hr>";
            }
    }

trait TMembre    
    {
        public function affichageMembres()
            {
                return "affichage des membres !! <hr>";
            }
    }
   
//--------------------------------------------------------------
class Site 
    {
        USE TPanier, TMembre;
    }    

//---------------------------------------------------------
/* creer un objet issu de la class 'Site' et afficher les methodes qui sont issues de cette class et faire les differents affichage des methodes declarées */

$site = new Site;
echo'<pre>'; print_r(get_class_methods($site)); echo '</pre>';
echo $site->affichageProduits();
echo $site->affichageMembres();
echo "Nombre de produits dans le panier :" . $site->nbProduit;
