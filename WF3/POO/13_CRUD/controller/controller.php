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
            public function handlerRequest()// methode qui permet de definir l'action de l'utilisateur, par exemple si l'utilisateur veut ajouter un employé, c'est la methode save qui s'exacute.
                {
                 $op = isset($_GET['op']) ? $_GET['op'] : NULL; //si 'op' pour operation est defini dans l'url, je le stocke dans une variable '$op', sinon on stock NULL  
                
                    try
                    {
                        if($op == 'add' || $op == 'update') $this->save($op);// si on ajoute ou modifie un employé, on appelle la methode save()
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
                    // echo "Methode selectAll()";
                    // $r = $this->db->selectAll();// $this->db represente un objet issu de la class EntityRepository. quand je pointe sur la methode selectAll, c'est celle qui est declarée dans  la class EntityRepository 
                    // echo '<pre>'; print_r($r); echo '</pre>';
                    // la methode render, prends le layout, le stocke et l'envoie vers l'index
                    $this->render('layout.php', 'donnees.php', array ('title' => 'toutes les donnees', 'donnees' => $this->db->selectAll(), 'fields' =>$this->db->getFields(), 'id' => 'id'.ucfirst($this->db->table)
                )); // on pointe sur la methode EntityRepository()
                }
            //etape 8 
            public function save($op)
                {
                    $title = $op;// permet de recuperer la donnée envoyée dans l'url et de la stocker dans $title

                    $id = isset($_GET['id']) ? $_GET['id'] : NULL; //permet de controller si il y'a un id envoyé dans l'url, dans ce cas on le stock dans la variable $id

                    $values = ($op == 'update') ? $this->db->select($id) : '' ; // si on a envoyé un id dans l'url, on l'envoi en argument de la methode select() de EntityRepository.php, cela permettra de selectionner toutes les données de l'employé pour la modification 
                    if($_POST)
                    {
                        //etape 10
                        $r = $this->db->save(); // lorsqu'on ajoute le formulaire d'ajout, on execute la methode seve() du fichier EntityRepository.php
                        $this->redirect("index.php");// une fois l'insertion ou modification faite, on redirige vers la page index.php grace a la methode redirect() qu'on a declarée ci dessous
                    }
                    $this->render('layout.php', 'donnees_form.php', array ('title' =>"Donnee : $title" , "op" => $op , "fields" => $this->db->getFields(), "values" => $values // permet de recuperer les données de l'employé en cas de modification   
                ));    
                }  
            public function select()
                {
                    $id = isset($_GET['id']) ? $_GET['id'] : NULL;// on controle si un id a bien été envoyé a l'url et on le stocke dans la variable $id
                    $this->render('layout.php', 'details.php', array(
                        "title" => "Detail de l'employé ID : $id", 
                        "donnees" => $this->db->select($id)// on appelle la methode select() du fichier EntityRepository.php
                    ));    
                }      

            public function delete()
                {
                    $id = isset($_GET['id']) ? $_GET['id'] : NULL; //on controle qu'un id a bien été passé dans l'url et on le stocke dans $id,
                    $r = $this->db->delete($id); // on fait appel a la methode delete() du fichier EntityRepository.php
                    $this->redirect("index.php");// une fois la suppression faite, on redirige vers la page index.php grace a la methode redirect() qu'on a declaréci dessous
                }    
            //étape 5    
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
            public function redirect($url)// methode permettant d'effectuer une redirection apres modification ou ajout, c'est dans la variable $url qu'on stocke, l'adresse de destination, comme index declaré plus haut dans la redirection apres le methode save()
                {
                    header("location:". $url);
                }    
        }