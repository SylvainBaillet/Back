<?php

    // j'appelle ma class Etudiant par le require_once()
    require_once('index.php');

    // J'instancie ma class Etudiant
    $etudiant = new Etudiant;

    $etudiant->setPrenom('sylvain');
    $etudiant->setNom('baillet');
    $etudiant->setEmail('sylvain.baillet@lepoles.com');
    $etudiant->setTelephone('0651469873');

    $e = $etudiant->getInfos();
    echo '<pre>'; print_r($e); echo '</pre>';
    
    echo "L'étudiant :" . $e['prenom'] . " " . $e['nom'] . " ,email :" . $e['email'] . " ,telephone :" . $e['telephone'];
?>