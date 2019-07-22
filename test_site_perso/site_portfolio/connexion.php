<?php
require_once("include/init.php");
require_once("include/header.php");
?>

<div class="container">
    <form class="col-md-8 mx-auto">
    <div class="form-group">
        <label for="exampleInputEmail1">Adresse mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
    </div>
    <button type="submit" class="btn btn-dark mx-auto">Envoyer</button>
    </form>
</div> 
<?php
require_once("include/footer.php");
?>