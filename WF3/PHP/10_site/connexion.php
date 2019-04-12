<?php
require_once('include/init.php');

if(isset($_GET['action']) && $_GET['action'] == 'validate')
{
    $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Vous êtes inscrits sur le site! Vous pouvez des à présent vous connecter</div> ';
}

require_once('include/header');
?>

<hr><h1 class="display-4 text-center">CONNEXION</h1><hr>






<?php
require_once('include/footer.php');

?>