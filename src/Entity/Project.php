<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity
 */
class Project
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
     * @ORM\Column(name="logo", type="text", length=0, nullable=false)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="territories", type="string", length=255, nullable=false)
     */
    private $territories;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Presentation", mappedBy="project")
     */
    private $presentations;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Users", mappedBy="project")
     */
    private $projectCreator;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="project")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;



    public function __construct()
    {
        
        $this->presentations = new ArrayCollection();
        $this->projectCreator = new ArrayCollection();
        $this->product = new ArrayCollection();

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTerritories(): ?string
    {
        return $this->territories;
    }

    public function setTerritories(string $territories): self
    {
        $this->territories = $territories;

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
            $presentation->addProject($this);
        }

        return $this;
    }

    public function removePresentation(Presentation $presentation): self
    {
        if ($this->presentations->contains($presentation)) {
            $this->presentations->removeElement($presentation);
            $presentation->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getProjectCreator(): Collection
    {
        return $this->projectCreator;
    }

    public function addProjectCreator(Users $projectCreator): self
    {
        if (!$this->projectCreator->contains($projectCreator)) {
            $this->projectCreator[] = $projectCreator;
            $projectCreator->addProject($this);
        }

        return $this;
    }

    public function removeProjectCreator(Users $projectCreator): self
    {
        if ($this->projectCreator->contains($projectCreator)) {
            $this->projectCreator->removeElement($projectCreator);
            $projectCreator->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
            $product->setProject($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getProject() === $this) {
                $product->setProject(null);
            }
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
