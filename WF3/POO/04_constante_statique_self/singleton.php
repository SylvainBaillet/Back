<!-- création d'un pattern Singleton -->
<!-- Un pattern Singleton permet de trouver une solution simple a un probleme recurent, par exemple si plusieurs personnes travaillent sur le meme projet, le pattern servira pour que tous se connecte a la bdd par le meme objet 'Singleton' -->

<?php
    class Singleton 
        {
            public $numero = 20;
            private static $instance = null;
            private function __construct(){}// la class n'est pas instanciable car le constructeur est privé
            private function __clone(){}// l'objet ne sera pas clonable
            public function getInstance()
                {
                    if(is_null(self::$instance))// si l'instance est null, le premeiere fois c'est null, toutes les autres fois je ne rentre pas ici car il y a un objet dans l'instance.
                        {
                            self::$instance = new Singleton;// on stock l'objet de la class Singleton
                        }
                    return self::$instance;    // dans tous les cas je retourne un objet $instance
                }    
                
        }

        // $s = new Singleton;  /!\ cela genere une erreur, il n'est pas possible d'instancier la class puisque le constructeur est 'private'
$objet1 = Singleton::getInstance();
echo "<pre>"; var_dump($objet1);  echo"</pre>";/* L'orsque je crée un objet1 de la class Singleton, il a la réference 1 */

$objet2 = Singleton::getInstance();
echo "<pre>"; var_dump($objet2);  echo"</pre>";/* objet2 a aussi la référence 1, il s'agit du meme objet. */



// ici l'orsqu'on a changé la valeur de la proprieté numero, cela a impacté sur les 2 variables objet1 et objet2, c'est normal puisque c'est le meme objet.
echo $objet1->numero . "<hr>";
echo $objet2->numero . "<hr>";
$objet2->numero = 22;
echo $objet1->numero . "<hr>";
echo $objet2->numero . "<hr>";