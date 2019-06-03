<?php
echo '<pre>'; print_r($conducteur);  echo'</pre>';

?>

<!-- formulaire d'entrée d'un conducteur -->
<form method="post" class="col-md-6 offset-md-3 text-center">
    <?php foreach($fields as $value):?>
        <div class="form-group">
            <label form="<?= $value['Field']?>"><?=$value['Field']?></label>
            <input type="text" class="form-control" id="<?=$value['Field']?>" name="<?=$value['Field']?>" placeholder="Enter <?=$value['Field']?>" value="<?= ($op == "update") ? $values[$value['Field']] : ''?>"> 
        
        </div>
    <?php endforeach;?>

    <input type="submit" class="col-md-12 btn-dark mb-2">
</form>
<!-- fin formulaire -->

<!-- affichage tableau données conducteur -->
<table class="table table-bordered text-center">

<div><a href="?op=modif" class="btn btn-large btn-info mb-2"><i class="fas fa-edit"></i> Ajouter un nouveau conducteur</a></div>
<div><a href="?op=suppr" class="btn btn-large btn-info mb-2"><i class="fas fa-trash-alt"></i> Supprimer un conducteur</a></div>

<thead><tr>
  <th>ID</th>
  <!-- etape 10 --> 
  <!-- apres avoir supprimé l'affichage du champ id_employé grace a la fonction predefinie array_splice(), on a un decalage dans le tableau, on créé une <th></th> nous meme avant la premiere boucle foreach -->
<?php foreach($conducteur as $value): ?>
    <th><?= $value['Field']?></th> 
    
<?php endforeach; ?>   
<th>Modifier</th>
</tr></thead>
<tbody>
<?php foreach($fields as $value): ?>
    <tr>
        <td> <?= implode('</td><td>', $value) ?></td>
    </tr>
<?php endforeach; ?>

</tbody>
</table>
