<?php                              

/* je crée une fonction inclusionAutomatique($nomDeLaClasse) '$nomDeLaClasse etant le nom de la class que je vais instancier et spl_autoload_register() auquel je met en argument ma fonction, va envoyer mon instanciation (ma class) des qu'il lira 'new' et declenchera ma fonction  */
                                     //A
     function inclusionAutomatique($nomDeLaClasse)     
        {   // dans le cas de new A, cela reviens a: require_once("A_class.php")
            require_once($nomDeLaClasse) . "_class.php";
            echo " On passe dans inclusionAutomatique()<hr>";
            echo "require_once($nomDeLaClasse)_class.php)<hr>";
        }

        /* spl_autoload_register est une fonction predefinie qui s'execute automatiquement quand l'interpreteur voir passer le mot clé 'new'  , donc lorsque l'on instancie une class.
        En plus nous demandons a spl_autoload_register() d'executer notre fonction inclusionAutomatique) 
        spl_auload_register recuper tout ce qu'il y'a pares le 'new' et l'envoie en argument de la fonction includeAutomatique(), c'est ce qui permet de faire appel au bon fichier dans lequel la class est declarée */
    spl_autoload_register('inclusionAutomatique');
    
    //test
    // $a = new A;
        
?>