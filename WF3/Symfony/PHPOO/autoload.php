<?php

// require('autoload.php');

// require('fichier1.php');
// require('fichier2.php');
// require('fichier3.php');
// require('fichier4.php');
// require('fichier5.php');

// au lieu de faire un require de chaque page dont j'ai besoin pour charger un affichage, on require simplement l'autoload que l'on va creer

class Autoload 
    {
        public static function chargement()// static veut dire que c'est une methode qui appartient à la class et non a l'objet, on l'appelle avec '::' et non avec la fleche '->' comme avec l'objet
            {
                require('Controller/' . $class . '.php');
            }

    }
spl_autoload_register('autoload', 'chargement');
  //  spl_autoload_register s'execute a chaque fois qu'il voit passer le mot clé "new"
  // il va apporter en argument de notre methode 'chargement()' ce qui suit le new

Autoload::chargement('User'); // ceci est la maniere d'appeller une methode issue d'une class    

new User;
require('User.php');
