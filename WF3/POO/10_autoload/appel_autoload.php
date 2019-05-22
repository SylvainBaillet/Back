<?php

 /* habituellement nous devons faire appel a des fichiers que nous appellons avec require_once, mais imaginons que nous avons 100 class déclarées dans 100 fichiers, nous ne devons pas faire 100 require_once*/
 require_once('autoload.php');

 //Exo: instancier les 4 class pour voir si l'autoload fonctionne correctement

 $a = new A;
 $b = new B;
 $c = new C;
 $d = new D;
