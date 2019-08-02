<?php
require_once("include/init.php");
require_once("include/header.php");

extract($_POST);

if(adminConnecte()) /* Si l'internaute est connecté,; il n'a rien a faire dans la page connexion, on le redirige vers la page gestionAdmin.php */
{
    header("location: gestionAdmin.php");
}

/* Si l'indice 'action' est défini dans l'URL et qu'il a comme valeur 'deconnexion, cela  veut deire que l'on a cliqué sur me lien 'déconnexion',  du coup on supprime le fichier session. */
if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
  {
      session_destroy(); 
  }

// if(isset($_GET['action']) && $_GET['action'] == 'validate')
// {
//     $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Vous êtes inscrits sur le site! Vous pouvez des à présent vous connecter</div> ';
// }

if($_POST)
    {
        $verifMembre = $bdd->prepare("SELECT * FROM membres WHERE pseudo = :pseudo AND mdp = :mdp");
        $verifMembre->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
        $verifMembre->bindvalue(':mdp', $mdp, PDO::PARAM_STR);
        $verifMembre->execute();

        if($verifMembre->rowCount() > 0)
            {
                $membres = $verifMembre->fetch(PDO::FETCH_ASSOC);
            }
    }
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