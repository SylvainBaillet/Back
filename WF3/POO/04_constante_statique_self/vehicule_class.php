<?php
class Vehicule
    {
        private static $marque = 'BMW';
        private $couleur = 'noir';
        public static function setMarque($marque)
        {
            self::$marque = $marque; // L'orsqu'pon appelle une propriété 'static' la syntaxe est self:: la premiere variable prends un '$' , dans le cas d'une propreieté non static, lapremiere variable derriere this ne prend pas de dollar.
        }
        public static function getMarque()
        {
            return self::$marque;
        }
        public function setCouleur($couleur)
        {
            $this->couleur = $couleur; // 
        }
        public function getCouleur()
        {
            return $this->couleur;
        }
    }
        
//exo creer un objet issu de la class Vehicule et faites une phrase en affichant la couleur et la marque du vehicule: 

$vehicule1 = new Vehicule;

echo "Le vehicule 1 est de marque " . Vehicule::getMarque() . " et sa couleur est " . $vehicule1->getCouleur() . "<hr>";

// exo: creer un autre vehicule et changer la couleur par 'violet' et faites une phrase en affichant la couleur et la marque du vehicule.

$vehicule2 = new Vehicule;

$vehicule2->setCouleur('violet');

echo "Le vehicule 2 est de marque " . Vehicule::getMarque() . " et sa couleur est " . $vehicule2->getCouleur() . "<hr>";; 

// exo: creer un vehicule 3 et changer la couleur par 'violet' et faites une phrase en affichant la couleur et la marque du vehicule.

$vehicule3 = new Vehicule;
echo "Le vehicule 3 est de marque " . Vehicule::getMarque() . " et sa couleur est " . $vehicule3->getCouleur(). "<hr>";

// exo: creer un vehicule 4 et changer la marque par 'mercedes' et faites une phrase en affichant la couleur et la marque du vehicule.

$vehicule4 = new Vehicule;
Vehicule::setMarque('Mercedes');
echo "Le vehicule 4 est de marque " . Vehicule::getMarque() . " et sa couleur est " . $vehicule4->getCouleur(). "<hr>";

/* Un élément declaré comme 'static' appartient à la class et non à l'objet, Si je modifie un élément 'static' jemodifie la class elle meme
$objet-> élément d'un objet à l'exterieur de la class
$this-> élément d'un objet à l'intérieur de la class
class:: élément de la class à l'exterieur de la class
self:: élément de la class à l'interieur de la class
*/
?>