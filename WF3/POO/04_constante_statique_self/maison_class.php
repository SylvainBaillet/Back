<?php
    class Maison 
        {
            private static $nbPiece = 7;// proprieté qui appartient a la class
            public static $espaceTerrain = '500m';// proprieté qui appartient a la class
            public $couleur = 'blanc';// appartient a l'objet
            const HAUTEUR = '10m';// appartient a la class, une constante se declare toujours avec 'const NOM_EN_MAJUSCULE'
            private $nbPorte = 10;
            //methode apparenant a la class : static
            public static function getNbPiece()
            {
                return self::$nbPiece;//self permet de faire appel a une proprieté statique declarée a l'interieur de la class
            }
            //methode uqi appartient a l'objet
            public function getNbPorte()
            {
                return $this->nbPorte;
            }

        }

 
// afficher le nombre de pieces de la maison
//Lorsqu'une methode est 'static' cela veut dire qu'elle appartient, a la class, et non a l'objet, on l'appelle directement via la class, comme ici 'Maison::getNbPiece()'
echo "nombre de pieces de la maison : <strong>" . Maison::getNbPiece() . "</strong><hr>";

//2- Afficher l'espace terrain de la maison
echo "la surface du terrain est de : <strong>" . Maison::$espaceTerrain . "</strong><hr>";

//3- Afficher la hauteur dela maison
echo "la hauteur de la maison est de : <strong>" . Maison::HAUTEUR . "</strong><hr>";
//4- Afficher la couleur de la maison
//comme  $couleur est une methode 'public' appartenant a l'objet et non a la class, on doit instancier un nouvel objet pour pouvoir l'afficher. Je me servirai également de cet objet pour afficher le nombre de portes
$maison = new Maison;   
echo "la couleur de la maison est : <strong>" . $maison->$couleur . "</strong><hr>";
//afficher le nombre de porte de la maison. 
echo "la couleur de la maison est : <strong>" . $maison->getNbPorte() . "</strong><hr>";

?>