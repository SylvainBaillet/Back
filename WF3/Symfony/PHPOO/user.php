<?php

/* Il est tres important de securiser ses formulaires et toutes les données car l'utilisateur peut provoquer une erreur sql, ce qui rend un site completement piratable */

/* L'interet de la visibilité (private - public) c'est que c'est la personne qui code la securité qui met son code dans le setteur, , et les developpeurs se servent des methodes public getteurs */

/* pour qu'une donnée soit accessible depuis une class heritiere, il doit etre en protected et non en private */

class User 
{
    private $pseudo;
    private $prenom;
    private $email;
    private $password
    private $date_naissance;

    public function setPrenom($prenom)
        {
            if(strlen($_POST['prenom']) >= 3 && strlen($_POST['prenom']) <= 20){
        $user->prenom = $_POST['prenom']; //l'utilisateur est en train de s'inscrire donc, formulaire, donc je passe par $_POST ou je crochete ['prenom']
        }
    public function getPrenom()
        {
            return $this->prenom;
        }    
}

$user = new User;

// $user->prenom = 'Sylvain';
if(!empty($_POST['prenom'])){
    if(strlen($_POST['prenom']) >= 3 && strlen($_POST['prenom']) <= 20){
        $user->prenom = $_POST['prenom']; //l'utilisateur est en train de s'inscrire donc, formulaire, donc je passe par $_POST ou je crochete ['prenom']
    }
}
echo 'prenom :' . $user->prenom;