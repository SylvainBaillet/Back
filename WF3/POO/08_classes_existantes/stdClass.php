<?php

echo '<pre>'; print_r(get_declared_classes()); echo'</pre>';

$tab = array('Mario', 'Yoshi' , 'Toad' , 'Bowser');
$objet = (object) $tab; // cast : transformation 
echo '<pre>'; var_dump($objet); echo'</pre>'; /*Un objet fait parti de la class 'STDCLASS' (classe stadart en PHP)  lorsque celui-ci est orphelin et n'a pas été instancié par un 'new', l'objet n'est issu d'aucune class en particulier  */

//Exo: afficher Yoshi en passant par l'objet StdClass '$objet'

// lorsque l'on veut afficher un élément de l'objet, donc pointer vers l'indice d'un array, il faut mettre l'indice entre des accolades
echo $objet->{1};

// la boucle foreach permet de parcourir les données d'un tableau array, mais aussi d'un objet.

foreach($objet as $key => $value)
{
    echo "$key - $value <br>";
}