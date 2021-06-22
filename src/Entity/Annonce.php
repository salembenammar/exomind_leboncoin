<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    /**
     * @ORM\OneToMany(targetEntity=AnnonceDetails::class, mappedBy="annonce", orphanRemoval=true)
     */
    private $annonceDetails;

    public function __construct()
    {
        $this->details = new ArrayCollection();
        $this->annonceDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

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
            $annonceDetail->setAnnonce($this);
        }

        return $this;
    }

    public function removeAnnonceDetail(AnnonceDetails $annonceDetail): self
    {
        if ($this->annonceDetails->removeElement($annonceDetail)) {
            // set the owning side to null (unless already changed)
            if ($annonceDetail->getAnnonce() === $this) {
                $annonceDetail->setAnnonce(null);
            }
        }

        return $this;
    }
}
