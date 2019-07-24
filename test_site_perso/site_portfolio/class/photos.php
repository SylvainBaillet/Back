<?php

class Photo 
{
    private $nom_photo;
    private $photo;
    private $file;
    public function setNomphoto()
        {
            if(iconv_strlen($nom_photo)>2 && iconv_strlen($nom_photo) < 61)
                {
                    $this->nom_photo = $nom_photo;
                }
            else
                {
                    $this->error = "veuillez rentrer un nom entre 2 et 60 caractères";
                    return $this->error;
                }    
        }
    public function getNomphoto()
        {
                
        }
    public function setFile(UploadedFile $file = NULL)
        {
            $this->file = $file;

            return $this;
        }
        // fonction photo
    public function getFile()
        {
            return $this->file;
        }  
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
            return __DIR__. '/images'; //comme nous somme dans le dossier Entity, on crée le chemin en sortant 3 fois dans notre architecture, puis en indiquant le bon chemin

        }       
}