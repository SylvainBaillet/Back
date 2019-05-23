<?php
// <!-- c'est ici que l'on va mettre toutes ce qui est connection a la bdd, toutes les requetes 
// etape 3
nameSpace Model;

    class EntityRepository
        {
           Private $db;
           public $table;
           public function getDb() //methode permettant d'instancier la class PDO et de creer  un objet PDO
            {
                if(!$this->db) // si private $db n'est pas remplie, si il n'y a pas de connection à la bdd,alors on va la construire.
                    {
                        try
                            {
                                $xml= simplexml_load_file('app/config.xml');
                                // echo "<pre>"; print_r($xml); echo"</pre>"; // pour afficher ce print_r de $xml j'ai instancié ma class EntityRepository et j'ai pioché dedans pour afficher la fonction getDb()
                                $this->table = $xml->table;// on associe la table du fichier XML à la proprieté '$table' de la class. Cette proprieté nous servira pour toutes nos requetes SQL (INSERT INTO, $this->table)
                                try
                                {   // connexion a la bdd, si jamais nous changeaons de bdd nous n'aurons pas besoin de modifier ce code, c'est un code generique, c'est le fichier config .xml que l'on modifiera.
                                    $this->db = new \PDO("mysql:dbname=" . $xml->db . ";host=" . $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
                                    // echo '<pre>'; var_dump($this->db); echo'</pre>'; si ce var_dump m'affiche un objet PDO, c'est que ma connexion a la bdd à bien reussi
                                }
                                catch(\PDOException $e)
                                {   // on entre dans le catch en cas de mauvaise connexion
                                    die("Probleme de connexion à la bdd");
                                }
                            }
                        /* sans l'antislash, il genere une erreur!! l'inbterpreteur va chercher si la methode StdClass() est declarée dans le namespace 'general. Donc pour revenir dans l'espace global de php, nous devons mettre un antislash devant la class*/
                        catch(\PDOException $e)
                            {
                                die("Probleme de fichier XML manquant");
                            }    
                    }
                return $this->db;// on retoune la connection
            }

            public function selectAll()
                {
    // c'est comme si j'avais fait $q = $dbb->query("SELECT* FROM employes")
                    $q = $this->getDb()->query("SELECT * FROM " . $this->table);// $this->getDb represente PDO donc une connexion a la base de données. $this->table represente dans notre cas la table employe que l'on a recuperé du fichier config.xml
                    $r = $q->fetchAll(\PDO::FETCH_ASSOC);
                    return $r;
                }
            
        }

$e = new EntityRepository;  
$e->getDb();
