<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailsCommande
 *
 * @ORM\Table(name="details_commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetailsCommandeRepository")
 */
class DetailsCommande
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
     * @var integer
     *
     * @ORM\Column(name="commande_id", type="integer", nullable=false)
     */
    private $commandeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="produit_id", type="integer", nullable=false)
     */
    private $produitId;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantité", type="integer", nullable=false)
     */
    private $quantit�;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;



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
     * Set commandeId
     *
     * @param integer $commandeId
     *
     * @return DetailsCommande
     */
    public function setCommandeId($commandeId)
    {
        $this->commandeId = $commandeId;

        return $this;
    }

    /**
     * Get commandeId
     *
     * @return integer
     */
    public function getCommandeId()
    {
        return $this->commandeId;
    }

    /**
     * Set produitId
     *
     * @param integer $produitId
     *
     * @return DetailsCommande
     */
    public function setProduitId($produitId)
    {
        $this->produitId = $produitId;

        return $this;
    }

    /**
     * Get produitId
     *
     * @return integer
     */
    public function getProduitId()
    {
        return $this->produitId;
    }

    /**
     * Set quantit�
     *
     * @param integer $quantit�
     *
     * @return DetailsCommande
     */
    public function setQuantit�($quantit�)
    {
        $this->quantit� = $quantit�;

        return $this;
    }

    /**
     * Get quantit�
     *
     * @return integer
     */
    public function getQuantit�()
    {
        return $this->quantit�;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return DetailsCommande
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
