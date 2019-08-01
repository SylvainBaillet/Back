<?php
require_once("include/init.php");
require_once("include/header.php");
require_once("include/classes.php");

$connexion = new Membre;

?>

<div class="container">
    <form class="col-md-8 mx-auto" method="post">
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

<?php
require_once("include/footer.php");
?>