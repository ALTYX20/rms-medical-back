<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements UserInterface
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
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
     * @ORM\Column(name="codepostal", type="string", length=4, nullable=false)
     */
    private $codepostal;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="num_tel", type="string", length=255, nullable=false)
     */
    private $numTel;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255, nullable=false)
     */
    private $sexe;

    /**
     * @ORM\Column(name="roles", type="json", nullable=false)
     */
    private $roles = [];

    /**
     * @var string
     *
     * @ORM\Column(name="motpass", type="string", length=255, nullable=false)
     */
    private $motpass;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date_naissance", type="date", nullable=false)
     */
    private $dateNaissance;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Presentation", mappedBy="presentationCreator")
     */
    private $presentations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="employes" , fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", inversedBy="projectCreator")
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Log", mappedBy="user", orphanRemoval=true)
     */
    private $logs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equip", inversedBy="member" )
     * @ORM\JoinColumn(nullable=true)
     */
    private $equip;


    public function __construct($email, array $roles)
    {
        $this->presentations = new ArrayCollection();
        $this->project = new ArrayCollection();
        $this->logs = new ArrayCollection();
        $this->email = $email;
        $this->roles = $roles;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }


    public function getRoles(): array
    {
        $roles[] = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }


    public function getMotpass(): ?string
    {
        return $this->motpass;
    }

    public function setMotpass(string $motpass): self
    {
        $this->motpass = $motpass;

        return $this;
    }

    public function getDateNaissance(): ?DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

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
            $presentation->setPresentationCreator($this);
        }

        return $this;
    }

    public function removePresentation(Presentation $presentation): self
    {
        if ($this->presentations->contains($presentation)) {
            $this->presentations->removeElement($presentation);
            // set the owning side to null (unless already changed)
            if ($presentation->getPresentationCreator() === $this) {
                $presentation->setPresentationCreator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(Project $project): self
    {
        if (!$this->project->contains($project)) {
            $this->project[] = $project;
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->project->contains($project)) {
            $this->project->removeElement($project);
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
            $log->setUser($this);
        }

        return $this;
    }

    public function removeLog(Log $log): self
    {
        if ($this->logs->contains($log)) {
            $this->logs->removeElement($log);
            // set the owning side to null (unless already changed)
            if ($log->getUser() === $this) {
                $log->setUser(null);
            }
        }

        return $this;
    }

    public function getEquip(): ?Equip
    {
        return $this->equip;
    }

    public function setEquip(?Equip $equip): self
    {
        $this->equip = $equip;

        return $this;
    }




    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->motpass;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @inheritDoc
     */
    public static function createFromPayload($email, array $payload)
    {
        return new self(
            $email,
            $payload['roles']  // Custom
        );
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


}
