<?php
class Ecole
    {
        public $nom = "POLES";
        public $cp = "44000";
        public function __clone()
            {
                $this->cp =92;
            }
    }

$ecole1 = new Ecole;
$ecole1->cp = 75;
echo'<pre>'; var_dump($ecole1); echo'</pre>';    

$ecole2 = new Ecole;
echo'<pre>'; var_dump($ecole2); echo'</pre>'; 

$ecole3 = $ecole1;
echo'<pre>'; var_dump($ecole3); echo'</pre>'; 

// lorsque je modifie $ecole1, cela prend effet sur $ecole3,  et vice versa, $ecole1 et $ecole3 ont des references qui pointent vers le meme objet à l'identifiant #1. ils representent le meme objet
$ecole3->cp = 91;
echo'Ecole1 = '. $ecole1->cp .'<hr>'; 
echo'Ecole1 = '. $ecole3->cp .'<hr>'; 

$ecole4 = clone $ecole2;
echo'<pre>'; var_dump($ecole4); echo'</pre>';
echo'<pre>'; var_dump($ecole2); echo'</pre>';
echo'Ecole4 = '. $ecole4->cp .'<hr>'; 
echo'Ecole2 = '. $ecole2->cp .'<hr>'; 
/* __clone() s'execute lorsque l'on clone un objet, cela créé un nouvel objet avec une nouvelle reference, ici '#3" */
/* Si nous avions 2 classes quasiment identiques, nous privilegerions le clonage et apporte une modification du comportement de la class */
?>

