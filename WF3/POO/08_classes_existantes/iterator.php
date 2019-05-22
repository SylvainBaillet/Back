<?php
    // un iterateur, sert a trouver des solutions communes a des problemes recurrents
   //Iterator est ce qu'on appelle un design pattern, qui permet de definir une solution pratique à un probleme frequent.
 // Dans les 3 cas , nous avons des données de type differetns, mais nous avons la meme structure de code permettant de parcourir les données, les memes methodes sont presentes dans les 3 cas dirfferents    
$perso = array("m" => "Mario", "l" => "Luigi", "t" => "Toad", "b" => "Bowser");

$it1 = new ArrayIterator($perso);
echo '<pre>'; var_dump($it1); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($it1)); echo'</pre>';

/*
rewind() permet de se placer au debut des informations
valid() permet de verifier si il y'a des information a parcourir
key() permet d'afficher l'indice
current() permet d'afficher la valeur
next() permet de passer a l'élément suivant, comme l'incrémentation $i++ etc...
*/

$it1->rewind();
while($it1->valid())
    {
        echo $it1->key() . ' - '. $it1->current() . '<br>';
        $it1->next();
    }

//---------------------------------------------------- Meme traitement sur un fichier xml

// SimpleXmlIterator est une class predefinie de php
$it2 = new SimpleXmlIterator('liste.xml', null, true);
echo '<pre>'; var_dump($it2); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($it2)); echo'</pre>';

$it2->rewind();
while($it2->valid())
    {
        echo $it2->key() . ' - '. $it2->current() . '<br>';
        $it2->next();
    }



//Exo: faire la meme chose avec la class DirectoryIterator()

/* Permet de lire le contenu d'un systeme de fichier, une hierarchie des ficchiers, les '..' e, arguments permettent de revenir en arriere dans le dossier par rapport auquel on se trouve actuellement, si je met par ex 'c://' a la place de '..' il me donne l'arborescence des fichiers a la racine du c */
$it3 = new DirectoryIterator('..');

echo '<pre>'; var_dump($it3); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($it3)); echo'</pre>';

$it3->rewind();
while($it3->valid())
    {
        echo $it3->key() . ' - '. $it3->current() . '<br>';
        $it3->next();
    }
?> 