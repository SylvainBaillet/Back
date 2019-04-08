<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire fruit</title>
</head>
<body>
<!-- 
    1 - réaliser un formulaire HTML permettant de selectionner un fruit (liste déroulante) et de saisir un poids (champ input)
    2 - traitement permettant d'afficher le prix en passant par la fonction déclarée 'calcul'
    3 - faire en sorte de garder le dernier fruit selectionné et le dernier poids saisi dans le formulaire lorsque celui ci est validé
 -->
<?php
echo '<pre>'; print_r($_POST); echo'</pre>';

require_once('fonction.php');
        if($_POST){
            echo calcul($_POST['fruits'], $_POST['poids']). '<hr>';
        }
?>

<div class="col-md-4 offset-md-4">
 <form method="post" action=""> 
 <!-- method: comment vont circuler les donéées / action: url de destination -->
    <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" name="fruits" id="exampleFormControlSelect1">

    <!-- si  un fruit a bien été selectionné et que ce fruit est égal à 'cerises', alors on affiche 'selected' dans la balise option -->
      <option value="cerises"
      <?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'cerises') echo 'selected' ?>>cerises</option>
                            <?= (isset($_POST['fruits']) && $_POST['fruits'] == 'cerises') ? 'selected' : ''?>
      <option value="bananes"<?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'bananes') echo 'selected' ?>>Bananes</option>
      <option value="pommes"<?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'pommes') echo 'selected' ?>>Pommes</option>
      <option value="peches"<?php if(isset($_POST['fruits']) && $_POST['fruits'] == 'peches') echo 'selected' ?>>Peches</option>
    </select>
  </div>
  <div class="form-group">
    <label for="Pseudo">Poids</label>
    <input type="text" class="form-control col-md-12" id="poids" name="poids" placeholder="poids" value="<?php if(isset($_POST['poids'])) echo $_POST['poids']?>">
  </div> 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



    
</body>
</html>