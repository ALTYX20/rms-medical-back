<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Referance
 *
 * @ORM\Table(name="referance")
 * @ORM\Entity
 */
class Referance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Presentation", mappedBy="referance")
     */
    private $presentations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="referances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    public function __construct()
    {
        $this->presentations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Presentation[]
     */
    public function getPresentations(): Collection
    {
        return $this->presentations;
    }

    public function addPresentation(Presentation $presentation): self
    {
        if (!$this->presentations->contains($presentation)) {
            $this->presentations[] = $presentation;
            $presentation->addReferance($this);
        }

        return $this;
    }

    public function removePresentation(Presentation $presentation): self
    {
        if ($this->presentations->contains($presentation)) {
            $this->presentations->removeElement($presentation);
            $presentation->removeReferance($this);
        }

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }


}
