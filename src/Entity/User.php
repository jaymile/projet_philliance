<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="user")
     */
    private $Article;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="user")
     */
    private $Commentaire;

    /**
     * @ORM\OneToMany(targetEntity=BonPlan::class, mappedBy="user")
     */
    private $BonPlan;

    /**
     * @ORM\OneToMany(targetEntity=JamConcert::class, mappedBy="user")
     */
    private $jamConcert;

    /**
     * @ORM\OneToMany(targetEntity=InstrumentJouer::class, mappedBy="user")
     */
    private $instrumentJouer;

    public function __construct()
    {
        $this->Article = new ArrayCollection();
        $this->Commentaire = new ArrayCollection();
        $this->BonPlan = new ArrayCollection();
        $this->jamConcert = new ArrayCollection();
        $this->instrumentJouer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getInstrumentJouerId(): ?int
    {
        return $this->instrument_jouer_id;
    }

    public function setInstrumentJouerId(?int $instrument_jouer_id): self
    {
        $this->instrument_jouer_id = $instrument_jouer_id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticle(): Collection
    {
        return $this->Article;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->Article->contains($article)) {
            $this->Article[] = $article;
            $article->setUser($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->Article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getUser() === $this) {
                $article->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->Commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->Commentaire->contains($commentaire)) {
            $this->Commentaire[] = $commentaire;
            $commentaire->setUser($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->Commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUser() === $this) {
                $commentaire->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BonPlan[]
     */
    public function getBonPlan(): Collection
    {
        return $this->BonPlan;
    }

    public function addBonPlan(BonPlan $bonPlan): self
    {
        if (!$this->BonPlan->contains($bonPlan)) {
            $this->BonPlan[] = $bonPlan;
            $bonPlan->setUser($this);
        }

        return $this;
    }

    public function removeBonPlan(BonPlan $bonPlan): self
    {
        if ($this->BonPlan->removeElement($bonPlan)) {
            // set the owning side to null (unless already changed)
            if ($bonPlan->getUser() === $this) {
                $bonPlan->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JamConcert[]
     */
    public function getJamConcert(): Collection
    {
        return $this->jamConcert;
    }

    public function addJamConcert(JamConcert $jamConcert): self
    {
        if (!$this->jamConcert->contains($jamConcert)) {
            $this->jamConcert[] = $jamConcert;
            $jamConcert->setUser($this);
        }

        return $this;
    }

    public function removeJamConcert(JamConcert $jamConcert): self
    {
        if ($this->jamConcert->removeElement($jamConcert)) {
            // set the owning side to null (unless already changed)
            if ($jamConcert->getUser() === $this) {
                $jamConcert->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InstrumentJouer[]
     */
    public function getInstrumentJouer(): Collection
    {
        return $this->instrumentJouer;
    }

    public function addInstrumentJouer(InstrumentJouer $instrumentJouer): self
    {
        if (!$this->instrumentJouer->contains($instrumentJouer)) {
            $this->instrumentJouer[] = $instrumentJouer;
            $instrumentJouer->setUser($this);
        }

        return $this;
    }

    public function removeInstrumentJouer(InstrumentJouer $instrumentJouer): self
    {
        if ($this->instrumentJouer->removeElement($instrumentJouer)) {
            // set the owning side to null (unless already changed)
            if ($instrumentJouer->getUser() === $this) {
                $instrumentJouer->setUser(null);
            }
        }

        return $this;
    }
}
