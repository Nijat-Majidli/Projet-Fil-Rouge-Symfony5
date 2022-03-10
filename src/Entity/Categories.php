<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     * message="Veuillez renseigner le nom de catégorie"
     * )
     * @Assert\Regex(
     * pattern="/^[\s\w\#\_\-éèàçâêîôûùäaëïüö]+$/",
     * message="Caratère(s) non valide(s)"
     * )
     */
    private $cat_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cat_photo;

    /**
     * @ORM\OneToMany(targetEntity=SousCategories::class, mappedBy="cat")
     */
    private $sousCategories;


    public function __construct()
    {
        $this->sousCategories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatNom(): ?string
    {
        return $this->cat_nom;
    }

    public function setCatNom(string $cat_nom): self
    {
        $this->cat_nom = $cat_nom;

        return $this;
    }

    public function getCatPhoto(): ?string
    {
        return $this->cat_photo;
    }
    
    public function setCatPhoto(string $cat_photo): self
    {
        $this->cat_photo = $cat_photo;

        return $this;
    }


    /**
     * @return Collection|SousCategories[]
     */
    public function getSousCategories(): Collection
    {
        return $this->sousCategories;
    }

    public function addSousCategory(SousCategories $sousCategory): self
    {
        if (!$this->sousCategories->contains($sousCategory)) {
            $this->sousCategories[] = $sousCategory;
            $sousCategory->setCat($this);
        }

        return $this;
    }

    public function removeSousCategory(SousCategories $sousCategory): self
    {
        if ($this->sousCategories->removeElement($sousCategory)) {
            // set the owning side to null (unless already changed)
            if ($sousCategory->getCat() === $this) {
                $sousCategory->setCat(null);
            }
        }

        return $this;
    }

}
