<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EquipRepository")
 */
class Equip
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="equip")
     */
    private $leader;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="equip")
     */
    private $member;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="equips")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;


    public function __construct()
    {
        $this->leader = new ArrayCollection();
        $this->employe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Users[]
     */
    public function getLeader(): Collection
    {
        return $this->leader;
    }

    public function addLeader(Users $leader): self
    {
        if (!$this->leader->contains($leader)) {
            $this->leader[] = $leader;
            $leader->setEquip($this);
        }

        return $this;
    }

    public function removeLeader(Users $leader): self
    {
        if ($this->leader->contains($leader)) {
            $this->leader->removeElement($leader);
            // set the owning side to null (unless already changed)
            if ($leader->getEquip() === $this) {
                $leader->setEquip(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(Users $employe): self
    {
        if (!$this->employe->contains($employe)) {
            $this->employe[] = $employe;
            $employe->setEquip($this);
        }

        return $this;
    }

    public function removeEmploye(Users $employe): self
    {
        if ($this->employe->contains($employe)) {
            $this->employe->removeElement($employe);
            // set the owning side to null (unless already changed)
            if ($employe->getEquip() === $this) {
                $employe->setEquip(null);
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
