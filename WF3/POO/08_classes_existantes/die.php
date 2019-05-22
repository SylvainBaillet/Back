<?php            //$liste // Mario viennent se stocker dans $tab et dans $elem
function recherche($tab, $elem)
{
    if(!is_array($tab))
        {
            die('vous devez envoyer un ARRAY');/* Si die() s'execute tous les traitements suivant ne sortent pas. die() permet de gerer les erreurs et d'afficher des erreurs propres en français */
        }
        //array_search est une fonction predefinie qui permet de trouver a quelle position se trouve un étlément dans un tableau, cela retourne l'indice auquel se trouve l'element
                                //Mario //$liste
        $position = array_search($elem, $tab);

    return $position;    
}

$liste = array('Mario', 'Yoshi', 'Toad', 'Bowser');

echo "Position de 'Mario' dans le tableau ARRAY :" . recherche($liste, 'Mario') . "<hr>";// ici l'echo me renvoie l'indice 0
echo "Position de 'Toad' dans le tableau ARRAY :" . recherche($liste, 'Toad') . "<hr>";// ici l'echo me renvoie l'indice 2
echo "Position de 'Mario' dans le tableau ARRAY :" . recherche('dfhdfh', 'Toad') . "<hr>";// ici je rentre dans ma condition IF, donc l'affichage est 'vous devez envoyer un ARRAY', ici die() s'execute et les traitements suivants ne seront pas executés

// une erreur dans le script peut en engendre une autre, d'ou l'importance de die() si l'on ne rentre pas dans la condition, le reste du script ne sera pas executé
echo "traitements...";//ne s'affiche donc pas, car die()..







?>