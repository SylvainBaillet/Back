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
<!-- 1- Déclarer un tableau ARRAY avec tout les fruits
	2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
	3- Affichez les 2 tableaux
	4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres a la fonction "calcul()" et obtenir le prix.
	5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
	6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).
	7- Faire un affichage dans une table HTML pour une présentation plus sympa. -->
    
    <div>
    <?php
    //1
    
    $fruits = array("cerises", "bananes", "pommes", "peches");
    $poids = array(100, 500 , 1000, 1500 , 2000 , 3000, 5000 , 10000);

    //2
    echo '<pre>'; print_r($fruits);echo '</pre>';
    echo '<pre>'; print_r($poids);echo '</pre>';

    //4
    require_once('fonction.php');/* require_once permet d'importer le fichier 'fonction.php' directement sur la page 'appel.php, c'est comme si on avait fait un copier/coller */
    echo calcul ($fruits[0],$poids[1]);

    //5
    echo '<div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';
   foreach($poids as $values)// la fleche fait partie du language et est obligatoire
{
    echo calcul($fruits[0],$values) .'<br>';
}
echo '</div>';
    //6
    
    foreach($fruits as $fruitsvalues)/* la boucle foreach parcours toutes les valeurs de $fruits  */
    {
        
        echo '<div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';
        foreach($poids as $poidsvalues)/* la boucle foreach parcours tous les poids et ensuite  on change de fruit  */
        {
            echo calcul($fruitsvalues,$poidsvalues) . '<hr>';// on ressort la fonction calcul qui va afficher le prix de chaque fruit par rapport a chaque poids.
        }
        echo '</div>';
    }

    //7
    echo'<table class="table table-bordered text-center"><tr>';
    echo '<th>Poids</th>';
    foreach($fruits as $fruitsvalues)
    {
        echo "<th>$fruitsvalues</th>";
    }
    echo '</tr>';
        foreach($poids as $poidsvalues)
        {
            echo '<tr>';   
            echo "<th>$poidsvalues g</th>";
            foreach($fruits as $fruitsvalues)
            {
                echo "<td>" .calcul($fruitsvalues, $poidsvalues) ."</td>";
            }
        echo '</tr>';    
            
        }


    echo '</table>';
    
?>
    </div>   
</body>
</html>