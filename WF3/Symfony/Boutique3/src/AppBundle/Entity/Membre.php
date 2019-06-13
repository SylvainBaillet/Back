<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

//on fait un use de UserInterface pour le salt et la securité des mots de passe
use Symfony\Component\Security\Core\User\UserInterface;

use Doctrine\Common\Collections\ArrayCollection;




/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembreRepository")
 */
class Membre implements UserInterface
{

    /** 
     * un, membre peut avoir plusieurs commandes, on est dopnc dans une relation OneToMany() ci dessous
     * 
     * @ORM\OneToMany(targetEntity="Commande",mappedBy="membreId")
     * 
     */
    private $commandes;
    // cette proprieté va contenir un array avec toutes les commandes, un array avec toutes les commandes
    public function __construct()
    {
        $this->commandes = new ArrayCollection;
    }

    public function setCommandes(ArrayCollection $commandes)
    {
        $this->commandes = $commandes;
        return $this;
    }

    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=20, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=1, nullable=false)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=20, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=255, nullable=false)
     */
    private $codepostal;

    /**
     * @var integer
     *
     * @ORM\Column(name="adresse", type="integer", nullable=false)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer", nullable=false)
     */
    private $statut;

    /**
	* @ORM\Column(name="roles", type="array")
	*
    */
    
    /* 
    ici, 
     */

	private $roles = array();
	
	/**
	*
	* @ORM\Column(name="salt", type="string", length=256, nullable=true)
	*/
    private $salt; 
    
    
	
	public function setRoles(array $roles){
		$this -> roles = $roles;
		return $this; 
	}
	
	public function getRoles(){
		$roles = $this -> roles; 
		//$roles[] = 'ROLE_USER';
		return $this -> roles; 
	}
	
	/**
	* Fonction obligatoire liée à l'interface UserInterface
	*
	*/
	public function eraseCredentials(){}
	
	
	public function setSalt($salt){
		$this -> salt = $salt;
		return $this;
	}
	
	public function getSalt(){
		return $this -> salt; 
	}



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Membre
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Membre
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Membre
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return Membre
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Membre
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codepostal
     *
     * @param string $codepostal
     *
     * @return Membre
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return string
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Set adresse
     *
     * @param integer $adresse
     *
     * @return Membre
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return integer
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Membre
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
