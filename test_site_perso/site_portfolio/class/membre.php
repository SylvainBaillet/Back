<?php 


class Membre
{
    private $pseudo;
    private $mdp;

    public function membreAction($pseudo, $mdp)
    {
    $this->pseudo = strip_tags($pseudo);    
    $this->mdp = strip_tags($mdp);

    require 'include/init.php';
    ​
    ​$bdd = $pdo->prepare('INSERT INTO membre (pseudo, mdp) VALUES (:pseudo, :mdp)');

    $req->execute([
    ':pseudo' => $this->pseudo,
    ':mdp' => $this->mdp]);

    $req->closeCursor();
    }
}
?>