<?php
//  class et methode 'final' est une methodologie de travail, pour verouiller les class et methodes
/* La class finale (final class) est instanciable , on ne peut pas heriter d'une classe finale*/

final class Application
    {
        public function lancementApplication()
            {
                return "L'appli se lance comme cela ! <hr>";
            }
    }

//---------------------------------------------------------
// Le code final permet de verouiller une class ou une methode, c'est une methodologie de travail
$app = new Application;// une class final est bien instanciable
echo '<pre>'; var_dump($app); echo '</pre>';    
echo $app->lancementApplication();

// class Test extends Application  /:\ erreur, une class ne peut pas heriter d'une class finale

class Application2
    {
        final public function lancementApplication()
            {
                return "l'appli se lance comme ceci ! <hr>";
            }
    }

class Extension extends Application2
{
    // public function lancementApplication() cela genere une erreur, ici j'ai voulu redeclarer ma methode au dessus pour l'ameliorer, la surcharger, , cela me met une erreur, c'est une methode finale qui ne peut etre redeclarée ou madifiée, une methode finale est verouillée
    // {

    // }
}    

//---------------------------------------------------------
$ext = new Extension;
echo $ext-> lancementApplication();

//---------------------------------------------------------
//L'interet de mettre le mot clé 'final'  sur une methode est de verouiller afin d'empecher toue sous-classe de la redefinir (quand nous voulons que le comportement d'une methode soit preservée durant l'heritage).