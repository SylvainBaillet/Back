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
            public function handlerRequest()
                {
                    $op = isset($_GET['op']) ? $_GET['op'] : NULL;

                        try
                    {
                        if($op == 'modif') $this->save($op);// si on ajoute ou modifie un employé, on appelle la methode save()
                        elseif($op == 'suppr') $this->deleteConducteur();// si on supprime un employé, on fait appel a la methode delete()
                        else $this->selectAllConducteur();// permet d'afficher l'ensemble des employés
                    }
                    catch(Exception $e)
                    {
                        die("probleme dans l'action de l'internaute !");
                    }  
                }
            public function selectAllConducteur()  
                {
                    $this->render('index.php', 'conducteur.php', array ('title' => 'tous les conducteurs', 'conducteur' => $this->db->selectAllConducteur(), 'conducteur' =>$this->db->getFields(), 'id' => 'id'.ucfirst($this->db->'conducteur')
                    ));
                }
            
            public function save($op)
                {
                    $title = $op;// permet de recuperer la donnée envoyée dans l'url et de la stocker dans $title

                    $id = isset($_GET['id']) ? $_GET['id'] : NULL; //permet de controller si il y'a un id envoyé dans l'url, dans ce cas on le stock dans la variable $id

                    $values = ($op == 'modif') ? $this->db->selectAllConducteur($id) : '' ; 
                    if($_POST)
                    {
                        
                        $r = $this->db->save(); // lorsqu'on ajoute le formulaire d'ajout, on execute la methode seve() du fichier EntityRepository.php
                        $this->redirect("index.php");// une fois la modification ou la suppression faite, on redirige vers la page index.php grace a la methode redirect() qu'on a declarée ci dessous
                    }
                    $this->render('index.php', 'conducteur.php', array ('title' =>"Donnee : $title" , "op" => $op , "fields" => $this->db->getFields(), "values" => $values // permet de recuperer les données de l'employé en cas de modification   
                ));    
                }      

            public function deleteConducteur()
                {
                    $id = isset($_GET['id']) ? $_GET['id'] : NULL; //on controle qu'un id a bien été passé dans l'url et on le stocke dans $id,
                    $r = $this->db->deleteConducteur($id); // on fait appel a la methode delete() du fichier EntityRepository.php
                    $this->redirect("index.php");// une fois la suppression faite, on redirige vers la page index.php grace a la methode redirect() qu'on a declaréci dessous
                }        
            public function render($layout, $template, $parameters = array())
                {
                    extract($parameters); // cela permet d'avoir les indices des tableaux comme variable
                    ob_start(); // fonction predefinie qui permet de commencer la temporisation) 
                    
                    require "view/$template";

                    $content = ob_get_clean();// tout ce qui se trouve dans le template sera stocké dans $content grace a la fonction predefinie ob_get_clean()

                    ob_start(); // on temporise la sortie de l'affichage
                    require "view/$layout";

                    return ob_end_flush();
                }     
            public function redirect($url)// methode permettant d'effectuer une redirection apres modification ou suppression
                {
                    header("location:". $url);
                }                  
        }        
