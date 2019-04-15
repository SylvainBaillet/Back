<?php
require_once('include/init.php');

extract($_POST);

if(internauteEstConnecte()) /* Si l'internaute est connecté,; il n'a rien a faire dans la page connexion, on le redirige vers sa page profil */
{
    header("location: profil.php");
}

/* Si l'indice 'action est défini dans l'URL et qu'il a comme valeur 'deconnexion, cela  veut deire que l'on a cliqué sur me lien 'déconnexion',  du coup on supprime le fichier session. */
if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
  {
      session_destroy(); 
  }

if(isset($_GET['action']) && $_GET['action'] == 'validate')
{
    $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Vous êtes inscrits sur le site! Vous pouvez des à présent vous connecter</div> ';
    

}

/* 
1- Realiser un formulaire de connexion avec les champs suivants: email ou pseudo/ mdp /bouton submit
2- Controler en PHP que l'on receptionne bien toutes les données   
*/
// echo '<pre>'; print_r($_POST);echo '</pre>';

if($_POST)
{
    /* On selectionne tout dans la table 'membres' à condition que la colonne 'pseudo' ou 'email' de la BDD soit bien égale au pseudo ou email saisie dans le formulaire */
    $verif_pseudo_email = $bdd->prepare("SELECT * FROM membres WHERE pseudo = :pseudo OR email = :email");
    $verif_pseudo_email->bindvalue(':pseudo', $email_pseudo, PDO::PARAM_STR);
    $verif_pseudo_email->bindvalue(':email', $email_pseudo, PDO::PARAM_STR);
    $verif_pseudo_email->execute();

    /* Si le reultat de la requete  de selection (SELECT) est supérieure à 0, cela veut dire que l'internaute a saisi un bon email ou un bon pseudo, donc on entre dans le IF */
    if($verif_pseudo_email->rowCount() > 0)
    {
        // echo 'pseudo / email valide';
        $membres = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC);// on recupere les données de l'internaute en BDD, qui a saisi le con pseudo et le bon email. on va pouvoir comparer les mots de passe
        // echo '<pre>'; print_r($membres);echo '</pre>';

        // if(password_verify($mdp, $membres['mdp'])) /* dans le cas ou nous avons un mdp avec une clé de hashage, il faut comparer la clé de hashage avec une chaine de caractere avec (password_verify)*/

        /* On entre dans le IF seulement dans le cas ou l'internaute à saisi le bon email/pseudo ou le bon mot de passe */
        if($membres['mdp'] == $mdp)/* Si le mot de passe de la bdd est égale au mot de passe que l'internaute a saisi dans le formulaire, on entre dans le IF */
        {
            // echo 'mot de passe valide';
            foreach($membres as $key => $value)
            {
                if($key != 'mdp')// on exclu le mdp
                {
                    $_SESSION['membre'][$key] = $value;// chaque boucle foreach, on enregistre les données de l'internaute dans son fichier session
                }
            }
            // echo '<pre>'; print_r($_SESSION);echo '</pre>';
            header("location: profil.php"); /* Apres l'enregistrement des données de l'internaute dans son fichier session, on le redirige vers sa page profil */
        }
        else /* on entre dans le ELSE dans le cas ou l'internaute n'a pas saisi le bon mote de passe */
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le mot de passe est incorrect, veuillez en saisir un à nouveau</div> ';
        echo 'erreur pseudo/ email';
        }

    }
    /* On entre dans le ELSE si l'internaute n'a pas saisi le bon pseudo ou le bon email */
    else
    {
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo ou email est incorrect</div> ';
        echo 'erreur pseudo/ email';
    }
}
require_once('include/header.php');
?>

<hr><h1 class="display-4 text-center">CONNEXION</h1><hr>

<?= $validate ?>
<?= $error ?>

    <form class="col-md-6 offset-md-3" method="post" action="">
  <div class="form-group">
    <label for="Pseudo">Email ou Pseudo</label>
    <input type="text" class="form-control col-md-12" id="Pseudo" name="email_pseudo" placeholder="pseudo">
  </div> 
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="text" class="form-control col-md-12" id="exampleInputPassword1" name="mdp" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>









<?php
require_once('include/footer.php');

?>