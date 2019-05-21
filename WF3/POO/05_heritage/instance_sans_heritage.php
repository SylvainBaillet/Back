<?php
class A 
    {
        public function direBonjour()
        {
            return "Bonjour";
        }
    }

class B // sans heritage de la classe A
    {
        public $objetA;
        //s'execute automatiquement lorsque nous ionstancions B
        public function __construct()
        {
            $this->objetA = new A;// Je créé un objet issu de la class A que je stock dans la proprieté nommée $objetA
            echo "S'execute automatiquement et detail :";
            echo '<pre>'; var_dump($this->objetA); echo '</pre>';
        }
        public function uneMethode()
        {
            return $this->objetA->direBonjour();/* dans mon objet B "$B" ($this) je peux appeller des methodes sur mon objet A '$objetA'
            Habituellement nous ne mettons qu'une seule fleche, mais la $objetA contient un objet, une autre fleche est donc possible *//
        }
    }
// ------
$B = new B;
echo $B->uneMethode() .'<hr>';
echo $B->objetA->direBonjour();
?>