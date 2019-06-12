<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;// pour pouvoir utiliser une propriété file pour uploader mes photos, je dois faire un use de UploadedFile au préalable

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
{
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
     * @ORM\Column(name="reference", type="string", length=20, nullable=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=20, nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="couleur", type="string", length=20, nullable=false)
     */
    private $couleur;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=5, nullable=false)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="public", type="string", length=5, nullable=false)
     */
    private $public;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=false)
     */
    private $photo = 'default.png';

    // on ne mappe pas cette proprieté ($file) car elle n'est pas liée à la base de donnée. elle va simplement nous permettre de manipuler la (les) photo d'un produit avant de l'enregistrer
    private $file;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;



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
     * Set reference
     *
     * @param string $reference
     *
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Produit
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Produit
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Produit
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Produit
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set public
     *
     * @param string $public
     *
     * @return Produit
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return string
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Produit
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Produit
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }


    /**
     * Set file
     *
     * @param object UploadedFile
     *
     * l'objet UploadedFile de symfony, nous permet de gerer tout ce qui est lié a un fichier uploadé, l'equivalent php de la superglobale ($_FILES ===> nop, taille, type, code erreur, emplacement temporaire)
     * 
     * @return Produit
     */
    public function setFile(UploadedFile $file = NULL)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return object UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    //en plus de file, on va rajouter des fonction permettant d'enregistrer et de renommer la photo avant de l'enregistrer dans son dossier definitif: 


    public function uploadPhoto()
        {
            //ici on créé la condition suivante: s'il n'y a pas de fichier chargé dans l'objet alors on sort de la fonction, (return sans rien nous fait juste sortir de la fonction) 
            if(!$this->file){
                return;
            }
            // puis on recupere le nom original de la photo pour la renommer
            $name = $this->renameFile($this->file->getClientOriginalName());

            // on enregistre en BDD le nouveau nom de la photo
            $this->photo = $name;

            // enfin il faut deplacer la photodans son dossier definitif
            $this->file->move($this->photoDir(), $name);

        }
    
    // notre fonction renameFile() nous permettra de changer le nom de la photo    
    public function renameFile($nom)// on rajoute la variable $nom dans notre fonction renamFile()
        {
            return 'file_' . time() . '_' .rand(1,9999) .$nom; 
        }  
    
    // notre fonction photoDir    
    public function photoDir()
        {
            return __DIR__. '/../../../web/photo'; //comme nous somme dans le dossier Entity, on crée le chemin en sortant 3 fois dans notre architecture, puis en indiquant le bon chemin

        }   
    
     //notre fonction removePhoto() nous permet de supprimer la photo   
    public function removePhoto()
        {
            if(file_exists($this->photoDir() . '/' . $this->photo) && $this->photo != 'default.png' ){  //file_exist() est une fonction php permettant de verifier si un fichier existe bien
                    unlink($this->photoDir() . '/' . $this-> photo);  // unlink supprime le fichier du serveur, 
            }
        }    

}
