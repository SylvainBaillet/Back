<?php

/* __construct() est une methode magique en php, qui s'execute automatiquement l'orsque l'on instancie la class. Elle sera l'équivalent du init.php avec session_start(), connexion BDD, autoload etc... */

class Etudiant
{
    private $prenom;
    private $error;
    public function __construct($arg)
    {
        echo "Instanciation, nous avons reçu l'information suivante : $arg<br>";
        return $this->setPrenom($arg);
    }
    //exo: realiser le getteur et setteur pour la proprieté $prenom
    public function setPrenom($prenom)
    {
        if(iconv_strlen($prenom) > 2 && iconv_strlen($prenom) < 11)
        {
            $this->prenom = $prenom;
        }
        else
        {
            $this->error = "veuillez saisir un prenom compris entre 2 et 10 caracteres";
            return $this->error;
        }
    }
    public function getPrenom()  
    {  
        return $this->prenom;
    }
    public function getError()
    {
        return $this->error;
    }  
    
}
//-------------------------------
//  ici on instancie un objet, comme nous le faisions avec $bdd = new PDO('les arguments de connection a la bdd...') 
$etudiant = new Etudiant('sylvain');// sylvain va directement se stocker dans l'argument '$arg' de la methode __construct()
echo'<pre>'; var_dump($etudiant); echo'</pre>';
echo "Votre prenom est :". $etudiant->getPrenom() . "<hr>";
echo $etudiant->getPrenom(28) . "<hr>";//
$etudiant->__construct('sylvain') . "<hr>";


/* new etudiant('sylvain') -> a l'instanciation de la class, 'sylvain' va automatiquementse stocker en argument  de la methode magique __construct()*/
// $etudiant2 = new Etudiant('s');
// echo $etudiant2->getError() . '<hr>';

/*
    -setter: permet de controlerles données
    -getter: permet de voir, / exploiterles données finales
    -private $prenom : la proprieté est privée afin que l'on ne puisse pas la remplir de l'exterieurde la class. sans avoir fair de controles au prealable.c'est a dire sans etre passé par les gettuer/ setteur

    si nous avons un formulaire avec 10  champs , nous aurons 10 setteur et 10 getteur --> 
*/
