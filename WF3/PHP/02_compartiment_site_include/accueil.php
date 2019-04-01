<?php
require_once("include/header.php");
require_once("include/nav.php");

/* require et include: Pas de difference entre les deux sauf en cas d'erreur sur le nom du ficher: 'include' genere une erreur et continue l'execution du script, alors que 'require' genere une érreur et stop l'execution du script.
Le once verifie si le fichier à deja été inclus, si c'est le cas il ne le ré inclus pas.
*/
?>
    <section class="p-4 text-center border border-dark" style="height:500px"> 
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
    </section>
<?php
require_once("include/footer.php");
?>    
    
    