<?php

namespace App\Entity;

use App\Repository\AnnonceDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceDetailsRepository::class)
 */
class AnnonceDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $jobSalary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contractType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeCarburant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $autoPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $immoSurface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $immoPrice;

    /**
     * @ORM\ManyToOne(targetEntity=Annonce::class, inversedBy="annonceDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="annonceDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobSalary(): ?int
    {
        return $this->jobSalary;
    }

    public function setJobSalary(?int $jobSalary): self
    {
        $this->jobSalary = $jobSalary;

        return $this;
    }

    public function getContractType(): ?string
    {
        return $this->contractType;
    }

    public function setContractType(?string $contractType): self
    {
        $this->contractType = $contractType;

        return $this;
    }

    public function getTypeCarburant(): ?string
    {
        return $this->typeCarburant;
    }

    public function setTypeCarburant(?string $typeCarburant): self
    {
        $this->typeCarburant = $typeCarburant;

        return $this;
    }

    public function getAutoPrice(): ?int
    {
        return $this->autoPrice;
    }

    public function setAutoPrice(?int $autoPrice): self
    {
        $this->autoPrice = $autoPrice;

        return $this;
    }

    public function getImmoSurface(): ?int
    {
        return $this->immoSurface;
    }

    public function setImmoSurface(?int $immoSurface): self
    {
        $this->immoSurface = $immoSurface;

        return $this;
    }

    public function getImmoPrice(): ?int
    {
        return $this->immoPrice;
    }

    public function setImmoPrice(?int $immoPrice): self
    {
        $this->immoPrice = $immoPrice;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
