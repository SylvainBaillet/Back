<?php
// on declare une class, par convention, a premiere lettre de la class doit toujours etre en majuscule
class Panier
{
    public $nbProduits;// on declare une proprieté $nbProduits( de visibilite public) ici on la laisse vide
    public function ajouterArticle()
    {
        return "L'article a été ajouté";
    }
    protected function retirerArticle()
    {
        return "L'article a été retiré";
    }
    private function affichageArticles()
    {
        return "Voici les articles !";
    }
}


//on instancie un objet '$panier1' , on créé donc un exemplaire de la class
$panier1 = new Panier;
echo '<pre>'; var_dump($panier1);  echo'</pre>';// on observe un objet issu de la class 'Panier' à l'identifiant '#1' (reference de l'objet). Il peut y avoir plusieurs objets conservés en RAM, ils auront tous un identifiant different

echo '<pre>'; var_dump(get_class_methods($panier1));  echo'</pre>';// permet d'observer uniquement les methods (fonctions) publiques issues de la class

//exo, affecter la valeur de '5' à la proprieté publique 'nbPoduits'.

$panier1->nbProduits = 5;// pour affecter une valeur a unre proprieté public, on ne met pas le signe '$' devant, ici notre objet '$panier1' pointe '->' sur la propriete 'nbProduits pour lui affecter une valeur
echo '<pre>'; var_dump($panier1);  echo'</pre>';

echo "Nombre de produit dans le panier :" . $panier1->nbProduits . "<hr>";
echo "Panier 1 >" . $panier1->ajouterArticle() . "<hr>";// ici on pioche une methode de la class à travers l'objet, toujours des parntheses car on fait appel a une methode (fonction) / methode public s'affiche bien

// echo "Panier 1 >" . $panier1->retirerArticle() . "<hr>";
/* /!\ erreur: l'echo ci dessus a generé une erreur car, la methode protected 'retirerArticle()' est accessible dans la class ou cela a été affecté (class mère) ainsi que dans les classes heritieres    */

// echo "Panier 1 >" . $panier1->affichageArticles() . "<hr>";
/* /!\ erreur: l'echo ci dessus a generé une erreur car, la methode protected 'affichageArticles()' est accessible uniquement dans la class ou cela a été affecté (class mère) */

/* Les niveaux de visibilités permettent de proteger des données, par ex les données saisies d'un formulaire ne pourront pas etre attribuées a n'importe quelle propriete declarée. elles passeront par des methodes qui permettront  de controler ces données*/

$panier2 = new Panier;// on créé un nouvel exemplaire  / objet issu de la class 'Panier' 
echo '<pre>'; var_dump($panier2);  echo'</pre>'; /* on peut observer un objet issu de la class 'Pnier' à l'identifiant '#2' */

//exo: affecter 3 produits a la proprieté '$nbProduits' et afficher le nombre de produits
$panier2->nbProduits = 3; //affectation de la valeur 3 à la proprieté '$nbProduits'
echo '<pre>'; var_dump($panier2);  echo'</pre>';

/* 
    Niveau de visibilité: - public: accessible de partout
                          - protected : accessible dans la class mere et heritieres
                          - private : accessible uniquement dans la class mere    
                          
    'new' est un mot cle permettant d'effectuer une instanciation (creer un objet) 
    Une class peut produire plusieurs objets
    $panier1 represente l'objet issu de la class 'Panier' 
    La class est le plan de construction/$panier1 represente un exemplaire de la class                    
*/


?>