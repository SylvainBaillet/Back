<?php
require_once("include/init.php");
require_once("include/header.php");
require_once("Class/membre.php");

extract($_POST);

$errorMembre = "";
$succesMembre = "";

if($_POST)
    {
        if(!isset($pseudo) || strlen($pseudo)< 3 || strlen($pseudo) > 30){
        $errorMembre .= '<div class="alert alert-warning text-danger"> Mettez un pseudo entre 3 et 30 caractères </div>';
        }
        if(!isset($mdp)){
        $errorMembre .= '<div class="alert alert-warning text-danger"> Mettez un pseudo entre 3 et 30 caractères </div>';
        }
        if(empty($errorMembre)){
            foreach($_POST as $key => $value){
                            $_POST[$key] = htmlspecialchars($value, ENT_QUOTES);

        
        }
        // je créé un nouvel objet de ma classe Membre
        $contact = new Membre();

        // j'utilise la methode membreAction() de ma class Membre.php
        $contact->membreAction($pseudo, $mdp);


        unset($pseudo);
        unset($mdp);

        $successMembre .='<div class="alert alert-success">Vous êtes connecté</div>';


?>

<div class="container">
    <form class="col-md-8 mx-auto">
    <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="email" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-dark mx-auto">Envoyer</button>
    </form>
</div> 

