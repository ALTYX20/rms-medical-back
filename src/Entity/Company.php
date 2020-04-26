<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="text", length=0, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="text", length=0, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="numtel", type="text", length=0, nullable=false)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="text", length=0, nullable=false)
     */
    private $website;

    /**
     * @var int
     *
     * @ORM\Column(name="staffcount", type="integer", nullable=false)
     */
    private $staffcount;

    /**
     * @var string
     *
     * @ORM\Column(name="sector", type="text", length=0, nullable=false)
     */
    private $sector;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="text", length=0, nullable=false)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="activity", type="text", length=0, nullable=false)
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=0, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="period_subscription", type="date", nullable=true)
     */
    private $periodSubscription;

    /**
     * @var int|null
     *
     * @ORM\Column(name="databasesize", type="integer", nullable=true)
     */
    private $databasesize;

    /**
     * @var string
     *
     * @ORM\Column(name="slatype", type="string", length=255, nullable=false)
     */
    private $slatype;

    /**
     * @var string
     *
     * @ORM\Column(name="supporttype", type="string", length=255, nullable=false)
     */
    private $supporttype;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Users", mappedBy="company", orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $employes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Equip", mappedBy="company", orphanRemoval=true)
     */
    private $equips;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="company", orphanRemoval=true)
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Referance", mappedBy="company", orphanRemoval=true)
     */
    private $referances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="company", orphanRemoval=true)
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="company", orphanRemoval=true)
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Presentation", mappedBy="company", orphanRemoval=true)
     */
    private $presentations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="company", orphanRemoval=true)
     */
    private $logs;

    public function __construct()
    {
        $this->employes = new ArrayCollection();
        $this->equips = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->referances = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->presentations = new ArrayCollection();
        $this->logs = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumtel(): ?string
    {
        return $this->numtel;
    }

    public function setNumtel(string $numtel): self
    {
        $this->numtel = $numtel;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getStaffcount(): ?int
    {
        return $this->staffcount;
    }

    public function setStaffcount(int $staffcount): self
    {
        $this->staffcount = $staffcount;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

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

    public function getPeriodSubscription(): ?DateTimeInterface
    {
        return $this->periodSubscription;
    }

    public function setPeriodSubscription(?DateTimeInterface $periodSubscription): self
    {
        $this->periodSubscription = $periodSubscription;

        return $this;
    }

    public function getDatabasesize(): ?int
    {
        return $this->databasesize;
    }

    public function setDatabasesize(?int $databasesize): self
    {
        $this->databasesize = $databasesize;

        return $this;
    }

    public function getSlatype(): ?string
    {
        return $this->slatype;
    }

    public function setSlatype(string $slatype): self
    {
        $this->slatype = $slatype;

        return $this;
    }

    public function getSupporttype(): ?string
    {
        return $this->supporttype;
    }

    public function setSupporttype(string $supporttype): self
    {
        $this->supporttype = $supporttype;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    protected function getEmployes(): Collection
    {
        return $this->employes;
    }

    protected function addEmploye(Users $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setCompany($this);
        }

        return $this;
    }

    public function removeEmploye(Users $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
            // set the owning side to null (unless already changed)
            if ($employe->getCompany() === $this) {
                $employe->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Equip[]
     */
    public function getEquips(): Collection
    {
        return $this->equips;
    }

    public function addEquip(Equip $equip): self
    {
        if (!$this->equips->contains($equip)) {
            $this->equips[] = $equip;
            $equip->setCompany($this);
        }

        return $this;
    }

    public function removeEquip(Equip $equip): self
    {
        if ($this->equips->contains($equip)) {
            $this->equips->removeElement($equip);
            // set the owning side to null (unless already changed)
            if ($equip->getCompany() === $this) {
                $equip->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setCompany($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getCompany() === $this) {
                $medium->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Referance[]
     */
    public function getReferances(): Collection
    {
        return $this->referances;
    }

    public function addReferance(Referance $referance): self
    {
        if (!$this->referances->contains($referance)) {
            $this->referances[] = $referance;
            $referance->setCompany($this);
        }

        return $this;
    }

    public function removeReferance(Referance $referance): self
    {
        if ($this->referances->contains($referance)) {
            $this->referances->removeElement($referance);
            // set the owning side to null (unless already changed)
            if ($referance->getCompany() === $this) {
                $referance->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setCompany($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getCompany() === $this) {
                $product->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setCompany($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getCompany() === $this) {
                $project->setCompany(null);
            }
        }

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
            $presentation->setCompany($this);
        }

        return $this;
    }

    public function removePresentation(Presentation $presentation): self
    {
        if ($this->presentations->contains($presentation)) {
            $this->presentations->removeElement($presentation);
            // set the owning side to null (unless already changed)
            if ($presentation->getCompany() === $this) {
                $presentation->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Log[]
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(Log $log): self
    {
        if (!$this->logs->contains($log)) {
            $this->logs[] = $log;
            $log->setCompany($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getCompany() === $this) {
                $log->setCompany(null);
            }
        }

        return $this;
    }


}
