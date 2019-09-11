<?php
require_once("include/init.php");
require_once("include/header.php");

extract($_POST);


/* Si l'indice 'action' est défini dans l'URL et qu'il a comme valeur 'deconnexion', cela  veut dire que l'on a cliqué sur le lien 'déconnexion', alors on supprime le fichier session. */
if(isset($_GET['action']) && $_GET['action'] == "deconnexion")
    {
        session_destroy(); 
        header("location: index.php");
    } 

if(isset($_GET['action']) && $_GET['action'] == 'validate')
    {
        $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Vous êtes connecté et admin!</div> '; 
    }
    
if($_POST)
    {
        $verifMembre = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp");
        $verifMembre->bindvalue(':pseudo', $pseudo, PDO::PARAM_STR);
        $verifMembre->bindvalue(':mdp', $mdp, PDO::PARAM_STR);
        $verifMembre->execute();

        if($verifMembre->rowCount() > 0)
        {
        $membre = $verifMembre->fetch(PDO::FETCH_ASSOC);// on recupere les données de l'internaute en BDD, qui a saisi le con pseudo et le bon email. on va pouvoir comparer les mots de passe


        // if(password_verify($mdp, $membre['mdp'])) /* dans le cas ou nous avons un mdp avec une clé de hashage, il faut comparer la clé de hashage avec une chaine de caractere avec (password_verify)*/
        // $mdp = $_POST['mdp'];
        $mdpm = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $verif_mdp = 'sylvain94'; 
        if(password_verify($verif_mdp, $mdpm)) {
            echo '<br>OK';
            } else {
            echo '<br>NOK';
}

        /* On entre dans le IF seulement dans le cas ou l'internaute à saisi le bon email/pseudo ou le bon mot de passe */
        if(password_verify($membre['mdp'],$mdpm))/* Si le mot de passe de la bdd est égale au mot de passe que l'internaute a saisi dans le formulaire, on entre dans le IF */
        {
            // echo 'mot de passe valide';
            foreach($membre as $key => $value)
            {
                if($key != 'mdp')// on exclu le mdp
                {
                    $_SESSION['membre'][$key] = $value;// chaque boucle foreach, on enregistre les données de l'internaute dans son fichier session
                }
            }
            echo '<pre>'; print_r($_SESSION);echo '</pre>';
            header("location: admin/gestionAdmin.php"); /* Apres l'enregistrement des données de l'internaute dans son fichier session, on le redirige vers sa page profil */
        }
        else /* on entre dans le ELSE dans le cas ou l'internaute n'a pas saisi le bon mot de passe */
        {
            $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le mot de passe est incorrect, veuillez en saisir un à nouveau</div> ';
        echo 'erreur pseudo/ email';
        }

    }
    /* On entre dans le ELSE si l'internaute n'a pas saisi le bon pseudo ou le bon email */
    else
    {
        $error .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Le pseudo ou le mot de passe est incorrect</div> ';
        echo 'erreur pseudo/ email';
    }
}
?>

<div class="container">
    <form class="col-md-8 mx-auto" method="post" action="">
    <div class="form-group">
        <label for="exampleInputEmail1">Pseudo</label>
        <input type="text" name="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="pseudo">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mot de passe</label>
        <input type="password" name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
    </div>
    <button type="submit" action="validate" class="btn btn-dark mx-auto">Envoyer</button>
    </form>
</div> 

<?php
require_once("include/footer.php");
?>