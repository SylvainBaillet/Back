<!-- Attention un getteur ne reçoit jamais d'arguments entre les parentheses -->
<!-- Par convention on place toujours 'set' et 'get' devant le nom des methodes -->

<?php
class Homme
{
    private $error;
    private $prenom;
    private $nom;
    // le setteur permet de controller les données 
    public function setPrenom($prenom)
    {
        if(is_string($prenom))
        {
            $this->prenom = $prenom;// this est une variable predefinie qui represente l'objet, a l'interieur de la class
        }
        else
        {
            $this->error = "ce n'est pas une chaine de caracteres!";
            return $this->error;
        }
    }
    //-----------------------------------------------------------------
    public function getPrenom()
    {
        return $this->prenom;
    }
    //---------------------------Exo ---------------------------
    public function setNom($nom)
    {
        if(iconv_strlen($nom) > 2 && iconv_strlen($nom) < 21)
        {
            $this->nom = $nom;
        }
        else
        {
            $this->error = "veuillez saisir un nom compris entre 2 et 20 caracteres";
            return $this->error;
        }
    }    
    public function getNom()  
    {
        return $this->nom;
    }  
}

$homme = new Homme;
echo '<pre>'; var_dump($homme);  echo'</pre>';

// $homme->prenom = 'sylvain';  /!\ erreur, il n'est pas possible d'affecter une valeur a une proprietéé 'private', cela permet de ne pas entrer n'importe quoi dans les proprietés


$homme->setPrenom('sylvain');
echo "mon prenom est :" . $homme->getPrenom() . "<hr>"; 

// echo $homme->setPrenom(28); test du message d'erreur

//realiser le setteur pour la proprieté 
$homme->setnom('baillet');
echo "mon nom est :" . $homme->getNom() . "<hr>"; 

//  test du message d'erreur
?>

