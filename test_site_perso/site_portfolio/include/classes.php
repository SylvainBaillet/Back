<?php


class Membre
{

    private $pseudo;
    private $mdp;
    private $errorLog;

    public function setPseudo($pseudo){
        if(iconv_strlen($pseudo) > 2 && iconv_strlen($pseudo)< 21){
            $this->pseudo = $pseudo;
            }
        else{
            $this->errorLog = "entrer un pseudo compris entre 2 et 20 caractères";
            return $this->errorLog;
            }    
        }
    
    public function getPseudo(){
        return $this->pseudo;
    }

    public function setMdp($mdp){
        if(password_verify($mdp) && $mdp['statut'] == 1){
            $this->mdp = $mdp;
        }
        else{
            $this->errorLog = "le mot de passe n'est pas valide";
        }
    }
    public function getMdp(){
        return $this->mdp;
    }

    $req = $bdd->prepare('INSERT INTO membre (pseudo, mdp) VALUES (:pseudo, :mdp)');


}

