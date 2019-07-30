<?php

require('include/init.php');

class Membre
{

private $pseudo;
private $mdp;

public function contactAction($pseudo, $mdp){

    $this->pseudo = strip_tags($pseudo);
    $this->mdp = strip_tags($mdp);

    $req = $bdd->prepare('INSERT INTO membre (pseudo, mdp) VALUES (:pseudo, :mdp)');
    $req->execute([
    ':pseudo' => $this->pseudo,
    ':mdp' => $this->mdp]);

    $req->closeCursor();
    }
}



class Image 
{

private $nom_photo;
private $photo;

    public function addimageAction($nom_photo, $photo){

    $this->pseudo = strip_tags($nom_photo);
    $this->photo = strip_tags($photo);
    $req = $bdd->prepare('INSERT INTO photo (nom_photo, photo) VALUES (:nom_photo, :photo)');
    $req->execute([
        ':nom_photo' => $this->nom_photo,
        ':photo' => $this->photo]);
    
        $req->closeCursor();    
    }

    public function deleteimageAction(){
        
    $this->pseudo = strip_tags($nom_photo);
    $this->photo = strip_tags($photo);
    $req = $bdd->prepare('DELETE FROM photo WHERE id_photo = :id_photo');
    $req->execute([
        ':nom_photo' => $this->nom_photo,
        ':photo' => $this->photo]);
    
        $req->closeCursor();    
    
    }    
}