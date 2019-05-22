<?php

    //il est possible de mettre plusieurs blocs try/catch a la suite, imbriqués! try et catch fonctionnent ensemble, on ne peut pas avoir un try sans le catch

    function recherche($tab, $elem)
        {
            if(!is_array($tab))
                throw new Exception('Vous devez envoyer un ARRAY');

            if(sizeof($tab)<= 0)
                throw new Exception('Vous devez envoyer un ARRAY avec un contenu');

            $position = array_search($elem,$tab); 
            return $position;   
        }

    $liste1 = array();    
    $liste2 = array('Mario', 'Yoshi', 'Toad', 'Bowser');   
    
    try// bloc d'essai, on va essayer d'executer les instructions suivantes dans le try
        {
            echo "Position de 'Mario' dans le tableau ARRAY :" . recherche($liste2, 'Mario') . "<hr>";
            echo "Position de 'Toad' dans le tableau ARRAY :" . recherche($liste2, 'Toad') . "<hr>";
            echo "Position de 'Bowse' dans le tableau ARRAY :" . recherche($liste1, 'Bowser') . "<hr>";
            echo "traitements...";//ne s'affiche pas
        }
    catch(Exception $e)//bloc de capture, on tombe dans le bloc 'catch' si un traitement a disfonctionné dans le bloc 'try', cela permet d'attrapper les exceptions et de personnaliser les messages d'erreurs, on créé un objet '$e' avec lequel on instancie 'Exception' $e va stocker les messages d'erreurs
    /*$e est un objet issu de la class Exception, il possede */
        {
            echo '<pre>'; print_r($e); echo'</pre>';
            echo '<pre>'; print_r(get_class_methods($e)); echo'</pre>';
            // Exo, afficher un e phrase comportant le message d'erreur , le fichier dans lequel est l'erreur et la ligne de l'erreur
            echo "Erreur : <strong>" . $e->getMessage() . "</strong> dans le fichier : <strong>" . $e->getFile() . "</strong> a la ligne <strong>" . $e->getLine() ."</strong> <br>";
        }    

    //-----------------------Connexion BDD

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test2', 'root', '');
        echo "connexion reussie";
    }
    catch(PDOException $e)// L'orsque le traitement disfonctionne dans le try, on tombe dans le catch, et la classe PDOException est instanciée, et stockée dans '$e' 
    {
        echo '<pre>'; print_r($e); echo'</pre>';
        echo '<pre>'; print_r(get_class_methods($e)); echo'</pre>';//cet objet contient des methodes que je vais aller afficher grace a get_class_methods, afin de piocher dans '$e' et d'afficher les messages d'erreurs et les infos 
        //Exo: afficher un message d'erreur  en cas de mauvaise connexion a la BDD:
        echo 'Erreur :<strong>' . $e->getMessage() . "</strong> dans le fichier : <strong>" . $e->getFile() . "</strong> a la ligne <strong>" . $e->getLine() ."</strong> <br>";
    }
    
    


?>