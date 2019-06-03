<?php
//etape 1
class Autoload 
    {                         //Controller\Controller ici pour notre test, vient se stocker  dans $className
        public static function className($className)
            {
                require __DIR__ . '/' . str_replace('\\' , '/' , $className . '.php');
                // str_replace permet de remplacer les antislash '\' (nous avons 2 antislash sinon l'interpreteur avec un seul le prend pour un caractere d'echappement)
               // echo "require " . __DIR__ . '/' . str_replace('\\','/', $className . '.php' );
            }
    }

spl_autoload_register(array('Autoload', 'className'));  // des que spl_autoload_register voit le mot clé 'new' il s'execute et en argument je l'envoie vers la class 'Autoload' et le deuxieme argument 'className' c'est la fonction  

/// au moment ou l'instanciation, l'autoload s'execute et va  chercher dans le dossier "controller" le fichier 'controller.php', d'ou l'importance du nommage des fichiers et des dossiers, le nameSpace doit avoir le meme nom que dossier

//Exo: faire le meme affichage avec  la ligne suivante: 
// $b = new Model\EntityRepository;