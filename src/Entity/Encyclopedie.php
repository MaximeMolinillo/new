<?php

namespace App\Entity;

use App\Repository\EncyclopedieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EncyclopedieRepository::class)]
class Encyclopedie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $id_encyclopedie = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $mois_semis = null;

    #[ORM\Column(nullable: true)]
    private ?int $mois_repiquage = null;

    #[ORM\Column(nullable: true)]
    private ?int $mois_recolte = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $climat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nouriture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $famille = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $localisation = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire_publication = null;

    #[ORM\OneToMany(mappedBy: 'encyclopedie', targetEntity: AvisEncyclopedie::class)]
    private Collection $avis_encyclopedie;

    #[ORM\ManyToOne(inversedBy: 'encyclopedie')]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->avis_encyclopedie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEncyclopedie(): ?int
    {
        return $this->id_encyclopedie;
    }

    public function setIdEncyclopedie(int $id_encyclopedie): static
    {
        $this->id_encyclopedie = $id_encyclopedie;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getMoisSemis(): ?int
    {
        return $this->mois_semis;
    }

    public function setMoisSemis(int $mois_semis): static
    {
        $this->mois_semis = $mois_semis;

        return $this;
    }

    public function getMoisRepiquage(): ?int
    {
        return $this->mois_repiquage;
    }

    public function setMoisRepiquage(?int $mois_repiquage): static
    {
        $this->mois_repiquage = $mois_repiquage;

        return $this;
    }

    public function getMoisRecolte(): ?int
    {
        return $this->mois_recolte;
    }

    public function setMoisRecolte(?int $mois_recolte): static
    {
        $this->mois_recolte = $mois_recolte;

        return $this;
    }

    public function getClimat(): ?string
    {
        return $this->climat;
    }

    public function setClimat(?string $climat): static
    {
        $this->climat = $climat;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getNouriture(): ?string
    {
        return $this->nouriture;
    }

    public function setNouriture(?string $nouriture): static
    {
        $this->nouriture = $nouriture;

        return $this;
    }

    public function getFamille(): ?string
    {
        return $this->famille;
    }

    public function setFamille(?string $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCommentairePublication(): ?string
    {
        return $this->commentaire_publication;
    }

    public function setCommentairePublication(?string $commentaire_publication): static
    {
        $this->commentaire_publication = $commentaire_publication;

        return $this;
    }

    /**
     * @return Collection<int, AvisEncyclopedie>
     */
    public function getAvisEncyclopedie(): Collection
    {
        return $this->avis_encyclopedie;
    }

    public function addAvisEncyclopedie(AvisEncyclopedie $avisEncyclopedie): static
    {
        if (!$this->avis_encyclopedie->contains($avisEncyclopedie)) {
            $this->avis_encyclopedie->add($avisEncyclopedie);
            $avisEncyclopedie->setEncyclopedie($this);
        }

        return $this;
    }

    public function removeAvisEncyclopedie(AvisEncyclopedie $avisEncyclopedie): static
    {
        if ($this->avis_encyclopedie->removeElement($avisEncyclopedie)) {
            // set the owning side to null (unless already changed)
            if ($avisEncyclopedie->getEncyclopedie() === $this) {
                $avisEncyclopedie->setEncyclopedie(null);
            }
        }

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
