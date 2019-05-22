<?php
class Societe 
{
    public $adresse;
    public $ville;
    public $cp;

    /* __set() est une methode magique qui se declenche uniquement en cas de tentative d'affectation sur une propriete qui n'existe pas. */
    public function __set($nom, $valeur)
        {
            echo "la proprieté $nom n'a pas été declarée, la valeur $valeur n'a donc pas été affectée ! <hr>";
        }
    // __get() est une methode magique qui se declenche dans le cas ou l'on tente d'fficher une propriete qui n'a pas été declarée    
    public function __get($nom)
        {
            echo "la proprieté $nom n'a pas été declarée, on ne peut donc pas l'afficher ! <hr>";
        }   
    // __call() est une methode magique qui s'execute automatiquement en cas de tentative d'execution d'une methode qui n'a pas été declarée. $arguments : tableau array qui receptionne les arguments de la methode executée    
    public function __call($nom, $argument)
        {
            //implode permet d'exraire chaque valeur d'un tableau, ici separé par des tirets
            echo "la methode $nom 'a pas été declarée, les arguments étaient" . implode('-' , $argument) . "<hr>";
            echo'<pre>'; print_r($argument); echo'</pre>';
        }     
}

$societe = new Societe;

$societe->villes= "Paris"; // tentative d'affectation d'un proprieté qui n'existe pas :je créé volontairement une erreur en rajoutant un 's' a la proprieté $ville, sans la methode magique __set(), php est permissif et me rajoute une propriete villes dans ma class avec la valeur 'Paris'.

echo $societe->titre; // tentative d'affichage d'une proprieté qui n'a pas été declarée

echo $societe->sdgsdffdhd(1, 'test', true);//tentative d'execution d'une methode qui n'existe pas.

echo'<pre>'; print_r($societe); echo'</pre>';

/* Il y'a trop d'erreurs "sales" en PHP, les methodes magiques permettent d'afficher des erreurs "propres" en français */



?>