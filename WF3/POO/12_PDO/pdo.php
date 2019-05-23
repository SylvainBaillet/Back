<?php

//connexion a la base de données entreprise
$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING)) ;
echo '<pre>'; print_r($pdo); echo'</pre>';
echo '<pre>'; print_r(get_class_methods($pdo)); echo'</pre>';
echo "<hr><h2 class='display-4 text-center> exemple n°1 SELECT + QUERY + FETCH </h2><hr>";

$resultat = $pdo->query("dfhsdhgf");//erreur de requete volontaire
echo '<pre>'; print_r($pdo->errorInfo()); echo'</pre>';// en cas d'erreurs de requete SQL, errorInfo() contient le message d'erreur et les codes d'erreurs

//EXO: afficher les données de l'employé 415
$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");
$employe = $resultat->fetch(PDO::FETCH_ASSOC); 

echo "<div class='display-4 text-center'>exemple </div> ";
foreach($employe as $key => $value)
{
    echo "$key - $value <hr>";
}
echo '</div>';

$resultat = $pdo->query("SELECT * FROM employes");
$employes = $resultat->fetchall(PDO::FETCH_ASSOC); 
// echo '<pre>'; print_r($employes); echo'</pre>';

//--------------------------------------
echo "<div class='display-4 text-center alert alert-success'>exemple n°1</div> ";
foreach($employes as $key => $tab)
{
  foreach($tab as $key2 => $value)
    {
      echo "$key2 - $value <hr>";
    }  
    echo '</div>'; 
}

//--------------------------------------
echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°3  SELECT + QUERY + FETCH_ASSOC</h2><hr> ";

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);// on demande d'indexer avec le nom des champs quand c'est toujours au stade objet
// echo '<pre>'; var_dump($resultat); echo'</pre>';

//EXO nous avns associé l'objet' PDO::FETCH_ASSOC a la requete de selection, nous n'avons donc plus a faire de fetch, nous travaillons directement avec l'objet, afficher toutes les données de chaque employé sous forme de tableau HTML
echo "<table class='table table-bordered text-center'><tr>";
for($i = 0; $i < $resultat->columnCount(); $i++)
  {
    $colonne =$resultat->getColumnMeta($i);
    echo "<th> $colonne[name]</th>";
  }
  echo"</tr>";
  foreach($resultat as $employe)
    {
      echo"<tr>";
      foreach($employe as $value)
          {
            echo "<td>$value</td>";
          }
       echo"</tr>";   
      }
echo"</table>";

echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°4  INSERT + UPDATE + DELETE</h2><hr> ";

$resultat = $pdo->exec("INSERT INTO employes VALUES (DEFAULT, 'sylvain', 'baillet', 'm' ,'direction', '2019-10-21', '50000')");
echo "Nombre de reultat affectées par l'insert : $resultat <hr>";
 
//--------------------------------------
echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°5  PREPARE + '?' + FETCH </h2><hr> ";  

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ? AND prenom = ?"); // On va dans un premier temps "preparer la requete sans la partie variable, que l'on representera avec un marqueur sos forme de point d'interrogation, ce sont des marqueurs anonymes
$resultat->execute(array("Gallet", "Clement")); //Gallet va remplacer le point d'interrogation juste au dessus
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - '); // implode sert a extraire les valeurs d'un tableau ARRAY dans des chaines de caracteres , avec un separateur en deuxieme argument ' - '

//--------------------------------------
echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°6  PREPARE + '?' + FETCH </h2><hr> ";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$resultat->execute(array("nom"=> "baillet"));// il est possible d'envoyer directement a l'execution la valeur des marqueurs nominatifs
$donnees =$resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');

//--------------------------------------
echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°7  PREPARE + ':' + FETCH_OBJ </h2><hr> ";
//EXO selectionner a l'aide d'une requete preparée les informations de l'employé 'Thoyer'  et afficher ses données a l'aide de la methode FETCH_OBJ
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$resultat->execute(array("nom"=> "Thoyer"));// il est possible d'envoyer directement a l'execution la valeur des marqueurs nominatifs
$donnees =$resultat->fetch(PDO::FETCH_OBJ);//retourner un objet issu de la class STDClass avec chaque indice comme propriete public
echo "prenom :" . $donnees->prenom . "<hr>";// comme $donnees est un objet, pour afficher seulement le prenom, je pointe sur $donnees->prenom

echo "<div class='display-4 text-center'>";
foreach($donnees as $key => $value)
{
    echo "$key - $value <hr>";
}
echo '</div>';

//--------------------------------------
echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°8  transaction + requete et annulation de celle ci</h2><hr> ";

$pdo->beginTransaction();

$result = $pdo->exec("UPDATE employes SET salaire = 1000");
echo "nombre d'enregistrements affectés par l' UPDATE : $result";

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo "<span>Avec le changement :</span>";

// affichage de la table de tous les employés, tout le monde est bien passé avec un salaire de 1000 euros, mais le changement n'a pas été effectué dans la bdd
// si on avait voulu valider la transation dans la bdd, nous aurions du pointer sur la methode "commit": $pdo->commit() apres la transaction et la requete de selection
// une fois le 'commit executé, on ne peut pas faire de rollback()
echo "<table class='table table-bordered text-center'><tr>";
for($i = 0; $i < $resultat->columnCount(); $i++)
  {
    $colonne =$resultat->getColumnMeta($i);
    echo "<th> $colonne[name]</th>";
  }
  echo"</tr>";
  foreach($resultat as $employe)
    {
      echo"<tr>";
      foreach($employe as $value)
          {
            echo "<td>$value</td>";
          }
       echo"</tr>";   
      }
echo"</table>";

// $pdo->commit(); ceci validerait la transaction et les changements seraient effectués dans la bdd


$pdo->rollBack(); // permet d'annuler la transation et de revenir a l'état initial 
$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo "<span>on annule le changement :</span>";
echo "<table class='table table-bordered text-center'><tr>";
for($i = 0; $i < $resultat->columnCount(); $i++)
  {
    $colonne =$resultat->getColumnMeta($i);
    echo "<th> $colonne[name]</th>";
  }
  echo"</tr>";
  foreach($resultat as $employe)
    {
      echo"<tr>";
      foreach($employe as $value)
          {
            echo "<td>$value</td>";
          }
       echo"</tr>";   
      }
echo"</table>";

//--------------------------------------
echo "<hr><h2 class='display-4 text-center alert alert-success'>exemple n°9  FETCH_CLASS</h2><hr> ";

// la constante FETCH_CLASS permet de prendre les ressultats de la requete et d'affecter les propietes de l'objet. Chaque valeur va etre re-associée aux differents proprietés de la class (il faut pour cela que l'orthographe des noms des champs SQL correspondent au  proprietés de l'objet, comme ci dessous: public $prenom; etc...)
class Employes
      {
        public $id_employes;
        public $prenom;
        public $nom;
        public $sexe;
        public $service;
        public $date_embauche;
        public $salaire;
      }

$result = $pdo->query("SELECT * FROM employes");
$objet = $result->fetchAll(PDO::FETCH_CLASS, "Employes"); // le 2 ème argument "Employe" correspond a la class Employe declarée juste au dessus
echo '<pre>'; print_r($objet); echo'</pre>';     

foreach($objet as $value)
      echo $value->prenom . "<hr>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  
</body>
</html>