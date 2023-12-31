<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $annee_experience = null;

    #[ORM\Column(length: 255)]
    private ?string $localisation_potager = null;

    // #[ORM\Column]
    // private ?bool $role = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: Log::class)]
    private Collection $logs;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Article::class)]
    private Collection $Article;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Encyclopedie::class)]
    private Collection $encyclopedie;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Calendrier::class)]
    private Collection $calendrier;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Recette::class)]
    private Collection $recette;

    public function __construct()
    {
        $this->logs = new ArrayCollection();
        $this->Article = new ArrayCollection();
        $this->encyclopedie = new ArrayCollection();
        $this->calendrier = new ArrayCollection();
        $this->recette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
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
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
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

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAnneeExperience(): ?int
    {
        return $this->annee_experience;
    }

    public function setAnneeExperience(int $annee_experience): static
    {
        $this->annee_experience = $annee_experience;

        return $this;
    }

    public function getLocalisationPotager(): ?string
    {
        return $this->localisation_potager;
    }

    public function setLocalisationPotager(string $localisation_potager): static
    {
        $this->localisation_potager = $localisation_potager;

        return $this;
    }

    // public function isRole(): ?bool
    // {
    //     return $this->role;
    // }

    // public function setRole(bool $role): static
    // {
    //     $this->role = $role;

    //     return $this;
    // }

    /**
     * @return Collection<int, Log>
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(Log $log): static
    {
        if (!$this->logs->contains($log)) {
            $this->logs->add($log);
            $log->setParent($this);
        }

        return $this;
    }

    public function removeLog(Log $log): static
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getParent() === $this) {
                $log->setParent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticle(): Collection
    {
        return $this->Article;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->Article->contains($article)) {
            $this->Article->add($article);
            $article->setUtilisateur($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->Article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getUtilisateur() === $this) {
                $article->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Encyclopedie>
     */
    public function getEncyclopedie(): Collection
    {
        return $this->encyclopedie;
    }

    public function addEncyclopedie(Encyclopedie $encyclopedie): static
    {
        if (!$this->encyclopedie->contains($encyclopedie)) {
            $this->encyclopedie->add($encyclopedie);
            $encyclopedie->setUtilisateur($this);
        }

        return $this;
    }

    public function removeEncyclopedie(Encyclopedie $encyclopedie): static
    {
        if ($this->encyclopedie->removeElement($encyclopedie)) {
            // set the owning side to null (unless already changed)
            if ($encyclopedie->getUtilisateur() === $this) {
                $encyclopedie->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Calendrier>
     */
    public function getCalendrier(): Collection
    {
        return $this->calendrier;
    }

    public function addCalendrier(Calendrier $calendrier): static
    {
        if (!$this->calendrier->contains($calendrier)) {
            $this->calendrier->add($calendrier);
            $calendrier->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCalendrier(Calendrier $calendrier): static
    {
        if ($this->calendrier->removeElement($calendrier)) {
            // set the owning side to null (unless already changed)
            if ($calendrier->getUtilisateur() === $this) {
                $calendrier->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecette(): Collection
    {
        return $this->recette;
    }

    public function addRecette(Recette $recette): static
    {
        if (!$this->recette->contains($recette)) {
            $this->recette->add($recette);
            $recette->setUtilisateur($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): static
    {
        if ($this->recette->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getUtilisateur() === $this) {
                $recette->setUtilisateur(null);
            }
        }

        return $this;
    }
}
