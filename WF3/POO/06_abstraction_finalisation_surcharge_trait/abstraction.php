<!-- methode abstraite, methodologie de travail, on declare des class et des methodes abstraites afin de les developper ensuite -->
<!--  une class abstraite n'est pas instanciable, les methodes abstraites n'ont pas de contenu, L'orsque l'on herite de methodes abstraites, nous sommes obligé de les redefinir.
Pour redefinir des methodes abstraites, il est necessaire que la class qui les contiennent soit abstraite. -->

<!-- Le developpeur qui ecrit la class Joueur est au coeur de l'application (noyau) et va obliger les autres developpeurs a redefinir les methodes EtreMajeur() et Devise() C'est une bonne methodologie de travail. On impose de bonnes contraintes. -->

<?php
    abstract class Joueur
        {
            public function seConnecter()
                {
                    return $this->EtreMajeur();
                }
            abstract public function EtreMajeur();
            abstract public function Devise();

        }
        // pour declarer des methodes abstraites, , ma class doit etre obligatoirement abstraite.
//-------------------------------

// $test= new Joueur; /!\ erreur, une class abstraite n'est pas instanciable 
class JoueurFr extends Joueur
{
    public function EtreMajeur()
    {
        return 18;
    }
    public function Devise()
    {
        return '€';
    }
}
class JoueurUs extends Joueur
    {
        public function EtreMajeur()
        {
            return 21;
        }
        public function Devise()
        {
            return '$';
        }
    }
 //Exo: creer un objet joueurFr et afficher les methodes contenues dans la class
 
 
 $joueurFr = new JoueurFr;
 echo "Il faut avoir " . $joueurFr->EtreMajeur() . " ans pour etre en ligne <hr>" ; 
 echo "la devise est " . $joueurFr->Devise() . "<hr>" ; 

//Exo: creer une class JoueurUs et creer le traitement permettant d'afficher '21'  pour la methode EtreMajeur() et afficher '$' pour la devise
 $joueurUs = new JoueurUs;
 echo "Il faut avoir " . $joueurUs->EtreMajeur() . " ans pour etre en ligne <hr>" ; 
 echo "la devise est " . $joueurUs->Devise() . "<hr>" ; 



 


