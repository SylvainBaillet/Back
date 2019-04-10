<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>TCHAT PHP</title>
</head>
<body>
<!-- 
    Exercice: espace de dialogue (tchat)
    1- modelisation et creation
      BDD : tchat
      Table : commentaire
             id_commentaire      // INT(3) PK - AI (clé primaire auto-incrémentée) 
             pseudo              // VARCHAR(20)
             dateEnregistrement  //DATETIME
             message             // TEXT
    2- connexion a la BDD
    3- création d'un formulaire HTML (pour l'ajout de message)
    4- Recuperation et affichage des saisies en PHP ($_POST)
    5- Requete SQL d'enregistrement (INSERT)
    6- Affichage les messages
 -->

 
<?php
echo '<hr><h2 class="display-4 text-center">TCHAT</h2><hr>';

$pdo = new PDO('mysql:host=localhost;dbname=tchat','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));   

        //  echo '<pre>'; print_r($pdo); echo '</pre>';//affiche l'objet PDO
        //  echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

echo '<pre>'; print_r($_POST); echo '</pre>'; 

extract($_POST);
if($_POST)
{
    foreach($_POST as $key => $value)
{
    $_POST[$key] = strip_tags($values);
}
// $rec = "INSERT INTO commentaire (pseudo, dateEnregistrement, message) VALUES ('$pseudo', NOW(), '$message')";

// $resultat = $pdo->exec();    
// echo "nombre d'enregistrements : $resultat";

// echo $req;

$resultat = $pdo->prepare("INSERT INTO commentaire (pseudo, dateEnregistrement, message) VALUES (:pseudo, NOW(), :message)");
$resultat->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
$resultat->bindValue(':message',$message, PDO::PARAM_STR);
$resultat->execute();

/* INJECTION SQL: 
ok'); DELETE FROM commentaire;(
    si l'on ne prepare pas une requete SQL, l'internaute qui a la main sur le champ peut faire des injections SQL et planter le site  
*/
/* FAILLES XSS
 <script type="text/javascript">
 var point = true;
 while (point == true)
 alert("j'ai planté ton site!!") 
 </script>

 <style>
 body{
     display: none;
 }
 
 </style>

 Pour parer aux failles XSS, il existe plusieurs fonction predefinies: 
 -strip_tags() : permet de supprimer toutes les balises HTML
 -HTMLspecialchars() : permet de rendre innofensives les balises HTML
 -htmlentities() : permet de convertir les balises HTML en entités HTML

*/
}

// $affichage = $pdo->query("SELECT * FROM commentaire"); <------ma methode qui fonctionne
$affichage = $pdo->query("SELECT pseudo, message, DATE_FORMAT (dateEnregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(dateEnregistrement, '%H:%i:%S') AS heurefr FROM commentaire ORDER BY dateEnregistrement DESC"); /* autre type d'affichage qui permet d'afficher la date et l'heure independament et au format fr, avec DATE_FORMAT */


        // echo '<pre>'; print_r($affichage);echo '</pre>'; 

        while($commentaire = $affichage->fetch(PDO::FETCH_ASSOC))
        {

            // echo '<pre>'; print_r($commentaire);echo '</pre>'; 
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
            echo $commentaire['pseudo'] . '<hr>' . 'le ' .$commentaire['datefr'] . '<hr>' . 'a '.$commentaire['heurefr']. '<hr>' .$commentaire['message']; 
            echo '</div> ';
        }

        echo "<div class='test-center'>Nombre de commentaire(s) : <strong class='badge badge-danger'></strong>" . $affichage->rowCount() . "</strong></div>";
        //rowCount est une methode PDOStatement qui retourne le nombre de ligne resultant de la requete SELECT

        
?>



 <form class="col-md-4 offset-md-4" method="post" action="">
  <div class="form-group">
    <label for="Pseudo">Pseudo</label>
    <input type="text" class="form-control col-md-12" id="Pseudo" name="pseudo" placeholder="pseudo">
  </div> 
 <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
    
</body>
</html>