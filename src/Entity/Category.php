<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=AnnonceDetails::class, mappedBy="category", orphanRemoval=true)
     */
    private $annonceDetails;

    public function __construct()
    {
        $this->annonceDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|AnnonceDetails[]
     */
    public function getAnnonceDetails(): Collection
    {
        return $this->annonceDetails;
    }

    public function addAnnonceDetail(AnnonceDetails $annonceDetail): self
    {
        if (!$this->annonceDetails->contains($annonceDetail)) {
            $this->annonceDetails[] = $annonceDetail;
            $annonceDetail->setCategory($this);
        }

        return $this;
    }

    public function removeAnnonceDetail(AnnonceDetails $annonceDetail): self
    {
        if ($this->annonceDetails->removeElement($annonceDetail)) {
            // set the owning side to null (unless already changed)
            if ($annonceDetail->getCategory() === $this) {
                $annonceDetail->setCategory(null);
            }
        }

        return $this;
    }
}
