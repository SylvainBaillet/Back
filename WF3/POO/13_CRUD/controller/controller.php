<?php
// etape 2

// c'est dans ce fichier controller.php contient toutes les actions et les methodes a executer. Par exemple si je souhaite afficher  les informations 10 par 10, c'est dans ce fichier que l'on fera ce traitement 

nameSpace Controller;

    class Controller
        {
            public $db;
            public function __construct()
                {
                 $this->db = new \Model\EntityRepository;// permet de recuperer une connexion a la bdd qui se trouve dans le fichier EntityRepository.php
                }
            //etape 3    
            public function handlerRequest()
                {
                 $op = isset($_GET['op']) ? $_GET['op'] : NULL; //si 'op' pour operation est defini dans l'url, je le stocke dans une variable '$op', sinon on stock NULL  
                

                    try
                    {
                        if($op == 'add' || $op == 'update') $this->save($op);// si on ajoute ou madifie un employé, on appel la methode save()
                        elseif($op == 'select') $this->select();// si on selectionne l'employé, on fait appel a la methode select()
                        elseif($op == 'delete') $this->delete();// si on supprime un employé, on fait appel a la methode delete()
                        else $this->selectAll();// permet d'afficher l'ensemble des employés
                    }
                    catch(Exception $e)
                    {
                        die("probleme dans l'action de l'internaute !");
                    }  
                }    
            public function selectAll()
                {
                    echo "Methode selectAll()";
                    $r = $this->db->selectAll();// $this->db represente un objet issu de la class EntityRepository. quand je pointe sur la methode selectAll, c'est celle qui est declarée dans  la class EntityRepository 
                    echo '<pre>'; print_r($r); echo '</pre>';
                }

        }