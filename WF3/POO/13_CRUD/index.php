<?php
require_once('autoload.php');

$controller = new Controller\Controller;// l'autoload voit passer le mot cle 'new' et fait appel au fichier controller.php. Et dans un deuxieme temps, dans le controller.php, il y a une instance 'new' de EntityRepository, donc l'autoload s'execute et fait appel au fichier EntityRepository
echo "<pre>"; var_dump($controller); echo"</pre>";

//etape 4
$controller->handlerRequest();// on fait appel à la methode handlerRequest se trouvant dans le fichier controller.php