<?php 
      /* Dans le modele MVC, on appelle plus un fichier, pour faire un affichage sur un e nouvelle page, mais on appelle un controller , un modele, puis une vue */
      // dans cet exemple on ne fait pas d'autoload car nou n'avons que 3 fichiers, c'est plus simple de faire sans, et de faire des require
require('produitsController.php');
// localhost/Symfony/PHPOO/MVC/index.php

$a = new produitsController;
$a->boutique();