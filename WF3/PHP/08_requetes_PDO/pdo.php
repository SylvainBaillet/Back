<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Requetes pdo</title>
</head>
<body>
<table class="container">
    <h2 class="display-4 text-center">01. PDO : Connexion</h2>
    <?php

        // class PDO 
        // {
        //     methodes (fonction)
        //     propriétés (variables)
        // }

        /* PDO est une class predefinie en PHP, qui permet de se connecter a une base de donnée. Cette class possede ses propres methodes (fonctions) qui nous permettrons par exemple de formuler et executer une requete SQL . 
         $pdo est l'objet qui permet d'interagir, d'interroger une base de donnée.
         argument: 1-(serveur : BDD) / 2- (identifiant) / 3- (mdp) / 4-(options PDO)
         */
         $pdo = new PDO('mysql:host=localhost;dbname=entreprise','root', '', array(PDO:: ATTR_ERRMODE => PDO :: ERRMODE_WARNING, PDO :: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));   

         echo '<pre>'; print_r($pdo); echo '</pre>';//affiche l'objet PDO
         echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';
         //affiche les methodes issues de la class PDO

         //----------------------------------------------------------------------------------------------
         echo '<hr><h2 class="display-4 text-center">02. PDO : EXEC - INSERT / UPDATE / DELETE</h2><hr>';
        // formuler la requete permettant de vous inserer dans la BDD 'entreprise' donc dans la table enployés

        // INSERT------------ 

         $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service ,date_embauche, salaire) VALUES('Sylvain', 'Baillet','m', 'informatique', '2019-04-20', 3000)");
         echo "Nombre d'enregistrement affecté(s) par l'INSERT : $resultat<br>";
         echo "dernier ID generé : " .$pdo->lastInsertId() . '<hr>';

         /*  exec() est une methode issue de la class prédefinie PDO, elle permet de formuler et executer des requetes SQL. C'est en  argument (entre les parentheses de la methode)  que l'on envoie la requete SQL complete. La methode exec() retourne le nombre d'enregistrements affectés par la requete.
             exec() est prevu pour des requetes et ne retourne pas de jeu de resultats, ceci est uniquement prevu pour INSERT / UPDATE / DELETE
         */

         // UPDATE-------------

         //Exo: réaliser le traitement permettant de modifier le salaire de l'employé n° 350 par 1200.
        $resultat = $pdo->exec("UPDATE employes SET salaire = 1200 WHERE id_employes = 350");
        echo "Nombre d'enregistrement affecté(s) par le UPDATE : $resultat<br>";

         //DELETE -------------

         //Exo: réaliser le traitement permettant de supprimer l'employé n° 350.
        $resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 350"); 
        echo "Nombre d'enregistrement affecté(s) par le DELETE : $resultat<br>";

        //-----------------------------------------------------------------------------------------------------
        echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC (1 seul resultat)</h2><hr>';

        /* requete selection -> query , on a en retour l'objet PDOStatement (inexploitable en l'état). pour exploiter le resultat, on associe une methode. fetch() ou fetchall issus de la class PDOStatement, qui retournent un tableau ARRAY. fetch() retourne le tableau indexé par ses champs, fetchall() retourne le tableau multidimentionnel avec chaque tableau  indexé numériquement .*/ 
        
        $result = $pdo->query("SELECT * FROM employes WHERE id_employes = 415"); 
        echo '<pre>'; var_dump($result);echo '</pre>'; 
        echo '<pre>'; print_r(get_class_methods($result));echo '</pre>';

        $employe = $result->fetch(PDO::FETCH_ASSOC);//retourne un tableau ARRAY indexé avec le nom des champs
        // $employe = $result->fetch(PDO::FETCH_NUM); // retourne un tableau ARRAY indexé numeriquement
        // $employe = $result->fetch(PDO::FETCH_BOTH); //retourne un tableau indexé a la fois numeriquement et avec le nom des champs, si j'enleve la methode au fetch() , c'est comme si je faisais un PDO::FETCH_BOTH
        echo '<pre>'; print_r($employe);echo '</pre>';  
        
        //Exo : afficher les informations à l'aide d'un affichage conventionnel en excluant l'id employé
         foreach($employe as $key => $values)
         {
             if($key != 'id_employes')
             {
                echo  "$key : $values . <hr>";
             }
         }
        /* query() est une methode issue de la classe PDO qui permet de formuler et d'executer des requetes SQL. Elles est prevue pour des requetes retournant un jeu de resultats (SELECT)
        Lorsqu'on execute une requete de selection, on obtient toujours en retour un autre objet, issu d'une autre class: PDOStatement.
        Cette class possede ses propres proprietés et methodes.
        La methode fetch() permet de rendre le resultat exploitable sous forme de tableau de données ARRAY
        */

        //-----------------------------------------------------------------------------------------------------------
        echo '<hr><h2 class="display-4 text-center">04. PDO : QUERY + SELECT + WHILE (plusieurs resultats)</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        echo '<pre>'; print_r($resultat);echo '</pre>'; 

        /* En executant une requete de selection, on obtient en retour un objet PDOStatement, cet objet est inexploitable en l'état, on lui associe donc la methode fetch qui retourne un tableau ARRAY.
        Pour recuperer l'ensemble des employés, dans ce cas precis nous sommes obligé de boucler avec while (tant qu'il y'a des employés)  $employes receptionne un tableau ARRAY d'un employé par tour de boucle.*/
        while($employes = $resultat->fetch(PDO::FETCH_ASSOC))// PDO::FETCH_ASSOC  , les '::' permettent de faire appel a une constante de la classe PDO sans devoir l'instancier.
        {
             
            echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
            echo $employes['nom'] . '<hr>' .$employes['prenom'] . '<hr>' .$employes['service'] . '<hr>' .$employes['salaire']; 
            echo '</div> ';
        }

        //-------------------------------------------------------------------------------------------------------------------
        echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + FETCH_ASSOC (plusieurs resultats)</h2><hr>';

        $resultat = $pdo->query("SELECT * FROM employes");

        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);/* fetchAll() retourne un tableau multidimentionnel avec chaque tableau (de chaque employé) indexé numériquement */
        echo '<pre>'; print_r($donnees); echo '</pre>';

        //Exo : Afficher successivement les données de chaque employé a l'aide de boucles foreach (indice: boucle imbriquée)          //[0]   //ARRAY 
        foreach($donnees as $key => $tab)// tab receptionne un tableau array d'un employé par tour de boucle
         {
             echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-warning text-center">';

             // la boucle foreach permet de passer en revue, chaque tableau de chaque employé
                   //ARRAY  //[nom]  //'Sylvain' 
             foreach($tab as $key2 =>$value)
             {
                echo  "$key2 : $value <hr>";  
             }
             echo '</div> ';
         }

        //----------------------------------------------------------------------------------- 
        echo '<hr><h2 class="display-4 text-center">06. PDO : QUERY + FETCH + BDD </h2><hr>';
 

         //Exo : Afficher la liste des bases de données, puis les mettre dans une liste ul li
        $bdd = $pdo->query("SHOW DATABASES"); 
        echo '<pre>'; print_r($bdd); echo '</pre>';

        echo '<ul class="list-group">';
        while($data = $bdd->fetch(PDO::FETCH_ASSOC))// ici $data receptionne un tableau ARRY par tour de boucle contenant les informations d'une bdd
        {
            echo '<li class="list-group-item">' . $data['Database'] . '</li>';// on va crocheter à l'inDice [Database] pour afficher le nom de la bdd
        }
        echo '</ul>';

        //-----------------------------------------------------------------------------
        echo '<hr><h2 class="display-4 text-center">07. PDO : QUERY + TABLE </h2><hr>';

        /* columnCount() est une methode issue de la class PDOStatement qui retourne le nombre de colonnes selectionnées via la requete de selection. Dans notre cas retourne integer 7, donc la boucle for tourne 7 fois, autant de fois qu'il y'a de colonnes.
        
        getColumnMeta() est une methode issue de la class PDO Statement qui permet de recolter les informations des champs/colonnes selectionnées
        */

        $employes = $pdo->query("SELECT * FROM employes");

        echo '<table class="table col-md-6 table-bordered mx-auto text-center"><tr>';
        for($i = 0; $i < $employes->columnCount(); $i++)
        {
            $colonne = $employes->getColumnMeta($i);
            // echo '<pre>'; print_r($colonne); echo '</pre>';
            echo "<th>$colonne[name]</th>" ;// on va crocheter à l'indice 'name' pour afficher le nom de la colonne par tour de boucle
        }
        echo '</tr>';
        
        //$donnees receptionne un tableau ARRAY par emloyé par tour de boucle
        while($donnees = $employes->fetch(PDO::FETCH_ASSOC))
        {
            // echo '<pre>'; print_r($donnees); echo '</pre>';
            echo '<tr>';
            foreach($donnees as $value)// la boucle foreach permet de parcourir chaque tableau ARRAY de chaque employé
            {
                echo "<td>$value</td>";
            }
            echo' </tr>';
        }
        echo '</table>';

        //----------------Exo: faire la meme chose avec la methode fetchAll

        $employes = $pdo->query("SELECT *FROM employes");

        $donnees = $employes->fetchAll(PDO::FETCH_ASSOC);/* fetchAll() retourne un tableau multidimentionnel avec chaque tableau (de chaque employé) indexé numériquement */
        // echo '<pre>'; print_r($donnees); echo '</pre>';

        echo '<table class="col-md-6 table table-bordered mx-auto text-center"><tr>';
        /* On va crocheter au premier indice du tableau multi pour récuperer les indices et les stocker dans les entetes <th> </th>*/
        foreach($donnees[0] as $key => $value)
        {
            echo "<th>$key</th>" ;
        }
            echo '</tr>';
        foreach($donnees as $tab)//tab contient un ARRAY d'un employé par tour de boucle
             {
                echo '<tr>';/* on crée une ligne par employé */
                foreach($tab as $infos)/* La boucle foreach permet de parcourir chaque tableau ARRAY de chaque employés */
                {
                    echo  "<td> $infos </td>"; 
                }
             echo '</tr>';
        }
        echo '</table>';

        //---------------------------------------------------------------------------------------------
        echo '<hr><h2 class="display-4 text-center">08. PDO : PREPARE + BINDVALUE + EXECUTE </h2><hr>';

        /* Les requetes préparées permettent de formuler une seule fois la requete et de l'executer autant de fois que l'on souhaite.
        Les requetes preparées permettent de parer aux injections SQL, cela permet de proteger les requetes SQL
        Il y'a 3 cylces dans une requete: analyse / interpretation / execution.*/

        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");// ici on prepare la requete mais a aucun moment on l'execute.
        // :nom marqueur nominatif que l'on peux comparer à une boite ou un tampon.
        echo '<pre>'; print_r($resultat); echo '</pre>';
        $resultat->bindValue( ':nom' , 'Winter', PDO::PARAM_STR);/* bindValue() est une methode PDOStatement() qui permet d'associer une valeur au marqueur nominatif :nom  , les 3 arguments: ('nom du marqueur', 'valeur', type) A ce stade la requete n'a toujours pas été executée. */
        $resultat->execute();// methode PDOStatement() / premet d'executer la requete preparée
        echo '<pre>'; print_r($resultat); echo '</pre>';
        
        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($donnees); echo '</pre>';

        echo'<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
        foreach($donnees as $key => $value)
        {
            echo "$key : $value <hr>";
        }
        echo '</div><hr>';
        //-------------------------------------------------------------------

        //A tout moment on peut changer la valeur du marqueur :nom sans avoir a reformuler la requete SQL.
        $nom = 'Dubar';// la valeur du marqueur peut etre aussi une variable
        $resultat->bindValue(':nom', $nom , PDO::PARAM_STR);// on change la valeur du marqueur sans avoir à reformuler la requete SQL
        $resultat->execute();// on execute la requete
        $employe = $resultat->fetch(PDO::FETCH_ASSOC);
        echo '<pre>'; print_r($employe); echo '</pre>';
        

        



        









    ?>


</div>
    
</body>
</html>