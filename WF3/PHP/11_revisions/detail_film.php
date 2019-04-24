<?php
echo '<print>'; print_r($_GET);  echo'</print>';

/*soit on peut faire une boucle pour passer en revue la superglobale get at afficher tous les détail*/
foreach($_GET as $key =>$value)
{
    echo '<p>' . $key .'</p>' . '<p>' . $value .'</p>';
}

/* soit on va crocheter à l'indice voulu, via la superglobale $_GET  , ici par exemple je recupere juste l'idfilm*/

echo "<h1> détail du film num : <strong> $_GET[idfilm]</strong> </h1>";

?>