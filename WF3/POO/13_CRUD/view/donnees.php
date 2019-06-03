<?php
// echo '<pre>'; print_r($donnees);  echo'</pre>';
// echo '<pre>'; print_r($fields);  echo'</pre>';
?>

<table class="table table-bordered text-center">
<!-- etape 8 -->
<!-- $donnees correspond a l'indicer 'donnees' declaré dans la methode render() dans controller.php' -->
<div><a href="?op=add" class="btn btn-large btn-info mb-2"><i class="fas fa-plus"></i>  Ajouter une nouvelle donnée</a></div>

<thead><tr>
  <th>ID</th>
  <!-- etape 10 --> 
  <!-- apres avoir supprimé l'affichage du champ id_employé grace a la fonction predefinie array_splice(), on a un decalage dans le tableau, on créé une <th></th> nous meme avant la premiere boucle foreach -->
<?php foreach($fields as $value): ?>
    <th><?= $value['Field']?></th> 
    <!-- on pointe sur le champ 'Field' que le print_r de $fields me renvoie, celui ci me donne ce qu'il y'a dans l'indice 'Field' de chaque tableau que ma methode getFields() declarée dans EntityRepository me renvoie -->
<?php endforeach; ?>   
<th>Detail</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr></thead>
<tbody>
<?php foreach($donnees as $value): ?>
    <tr>
        <td> <?= implode('</td><td>', $value) ?></td>
        <td> <a href="?op=select&id=<?=$value[$id]?>" class="text-dark"><i class="fas fa-eye"></i></a> </td>
        <td> <a href="?op=update&id=<?=$value[$id]?>" class="text-dark"><i class="fas fa-edit"></i></a></td>
        <td> <a href="?op=delete&id=<?=$value[$id]?>" class="text-dark"><i class="fas fa-trash-alt"></i></a> </td>
    </tr>
<?php endforeach; ?>

</tbody>
</table>