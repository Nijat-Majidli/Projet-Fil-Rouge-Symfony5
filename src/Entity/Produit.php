<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pro_libelle;

    /**
     * @ORM\Column(type="text")
     */
    private $pro_description;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_achat_HT;

    /**
     * @ORM\Column(type="float")
     */
    private $Taux_TVA;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_vente;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pro_photo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pro_stock;

    /**
     * @ORM\ManyToOne(targetEntity=SousCategories::class, inversedBy="produits")
     */
    private $sous_cat;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProLibelle(): ?string
    {
        return $this->pro_libelle;
    }

    public function setProLibelle(string $pro_libelle): self
    {
        $this->pro_libelle = $pro_libelle;

        return $this;
    }

    public function getProDescription(): ?string
    {
        return $this->pro_description;
    }

    public function setProDescription(string $pro_description): self
    {
        $this->pro_description = $pro_description;

        return $this;
    }

    public function getPrixAchatHT(): ?float
    {
        return $this->prix_achat_HT;
    }

    public function setPrixAchatHT(float $prix_achat_HT): self
    {
        $this->prix_achat_HT = $prix_achat_HT;

        return $this;
    }

    public function getTauxTVA(): ?float
    {
        return $this->Taux_TVA;
    }

    public function setTauxTVA(float $Taux_TVA): self
    {
        $this->Taux_TVA = $Taux_TVA;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prix_vente;
    }

    public function setPrixVente(float $prix_vente): self
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getProPhoto(): ?string
    {
        return $this->pro_photo;
    }

    public function setProPhoto(string $pro_photo): self
    {
        $this->pro_photo = $pro_photo;

        return $this;
    }

    public function getProStock(): ?int
    {
        return $this->pro_stock;
    }

    public function setProStock(?int $pro_stock): self
    {
        $this->pro_stock = $pro_stock;

        return $this;
    }

    public function getSousCat(): ?SousCategories
    {
        return $this->sous_cat;
    }

    public function setSousCat(?SousCategories $sous_cat): self
    {
        $this->sous_cat = $sous_cat;

        return $this;
    }

}
