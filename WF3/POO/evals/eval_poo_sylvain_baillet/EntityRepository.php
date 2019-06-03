<?php

nameSpace Model;

    class EntityRepository
        {
           Private $db;
           public $table;
           public function getDb() //methode permettant d'instancier la class PDO et de creer un objet PDO
            {
                if(!$this->db) // si private $db n'est pas remplie, si il n'y a pas de connection à la bdd,alors on va la construire.
                    {
                        try
                            {
                                $xml= simplexml_load_file('app/config.xml');
                                
                                $this->table = $xml->table;
                                try
                                {   
                                    $this->db = new \PDO("mysql:dbname=" . $xml->db . ";host=" . $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
                                    // echo '<pre>'; var_dump($this->db); echo'</pre>'; si ce var_dump m'affiche un objet PDO, c'est que ma connexion a la bdd à bien reussi
                                }
                                catch(\PDOException $e)
                                {   // on entre dans le catch en cas de mauvaise connexion
                                    die("Probleme de connexion à la bdd");
                                }
                            }
                        
                        catch(\PDOException $e)
                            {
                                die("Probleme de fichier XML manquant");
                            }    
                    }
                return $this->db;// on retoune la connection
            }

            //methode de selection table conducteur
            public function selectAllConducteur()
                {

                    $q = $this->getDb()->query("SELECT * FROM conducteur");// $this->getDb represente PDO donc une connexion a la base de données. 
                    $r = $q->fetchAll(\PDO::FETCH_ASSOC);
                    return $r;
                }

            //methode de selection table vehicule    
            public function selectAllVehicule()
                {

                    $q = $this->getDb()->query("SELECT * FROM vehicule");// $this->getDb represente PDO donc une connexion a la base de données. 
                    $r = $q->fetchAll(\PDO::FETCH_ASSOC);
                    return $r;
                }
            
            //methode de selection table assiciation_vehicule_conducteur
            public function selectAllAssociation()
                {

                    $q = $this->getDb()->query("SELECT * FROM association_vehicule_conducteur");// $this->getDb represente PDO donc une connexion a la base de données. 
                    $r = $q->fetchAll(\PDO::FETCH_ASSOC);
                    return $r;
                }
            public function getFields()
                {
                    $q = $this->getDb()->query("DESC " . $this->table = 'conducteur'); // DESC pour  description de la table
                    $r = $q->fetchAll(\PDO::FETCH_ASSOC);
                    //etape 9
                    return array_splice($r,1); // array_splice() permet de retirer ici le premier champ id_employe dans le formulaire. 
                }    

            //methode permettant la modification en bdd dans ma table conducteur    
            public function saveConducteur()
                {
                    $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';

                    $q = $this->getDB()->query('REPLACE INTO ' . 'conducteur' . '(id' . ucfirst($this->table) . ',' . implode(',', array_keys($_POST)) . ') VALUES (' . $id . ',' . "'" . implode("','", $_POST) . "'" . ')');
                    
                }   
            //methode permettant la suppression dans ma table conducteur     
            public function deleteConducteur($id)
                {                                                                                                       
                    $q = $this->getDb()->query("DELETE FROM " . 'conducteur' . " WHERE id" . ucfirst($this->table) . '=' . (int)$id); 
                }    
        }

$e = new EntityRepository; 
$e->getDb();