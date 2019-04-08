<?php

function calcul($fruit, $poids)
{
    switch($fruit)
    {
        case 'cerises': $prix_kg= 5.76; break;
        case 'bananes': $prix_kg= 1.06; break;
        case 'pommes': $prix_kg= 1.61; break;
        case 'peches': $prix_kg= 3.23; break;
        default: return 'fruits inexistant'; break;
    }

$resultat = round(($poids*$prix_kg/1000),2);// round est une fonction predefinie qui permet d'arrondir un chiffre, ici 2 decimales apres la virgule
return "les $fruit coutent $resultat Euros pour $poids kg<br>";
}
// echo calcul('bananes', 500);

//Exo: afficher le prix de 2 kg de bananes en executant la fonction 'calcul' sans la copier coller, ni la changer
// echo calcul ('bananes', (2000/1000),2);