<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $num_recette = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $liste_ingredients = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $instruction = null;

    #[ORM\Column(length: 255)]
    private ?string $temps_preparation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $exemple_utilisation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire_publication = null;

    #[ORM\OneToMany(mappedBy: 'recette', targetEntity: AvisRecette::class)]
    private Collection $avis_recette;

    #[ORM\ManyToOne(inversedBy: 'recette')]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->avis_recette = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumRecette(): ?int
    {
        return $this->num_recette;
    }

    public function setNumRecette(int $num_recette): static
    {
        $this->num_recette = $num_recette;

        return $this;
    }

    public function getListeIngredients(): ?string
    {
        return $this->liste_ingredients;
    }

    public function setListeIngredients(string $liste_ingredients): static
    {
        $this->liste_ingredients = $liste_ingredients;

        return $this;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(string $instruction): static
    {
        $this->instruction = $instruction;

        return $this;
    }

    public function getTempsPreparation(): ?string
    {
        return $this->temps_preparation;
    }

    public function setTempsPreparation(string $temps_preparation): static
    {
        $this->temps_preparation = $temps_preparation;

        return $this;
    }

    public function getExempleUtilisation(): ?string
    {
        return $this->exemple_utilisation;
    }

    public function setExempleUtilisation(?string $exemple_utilisation): static
    {
        $this->exemple_utilisation = $exemple_utilisation;

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
     * @return Collection<int, AvisRecette>
     */
    public function getAvisRecette(): Collection
    {
        return $this->avis_recette;
    }

    public function addAvisRecette(AvisRecette $avisRecette): static
    {
        if (!$this->avis_recette->contains($avisRecette)) {
            $this->avis_recette->add($avisRecette);
            $avisRecette->setRecette($this);
        }

        return $this;
    }

    public function removeAvisRecette(AvisRecette $avisRecette): static
    {
        if ($this->avis_recette->removeElement($avisRecette)) {
            // set the owning side to null (unless already changed)
            if ($avisRecette->getRecette() === $this) {
                $avisRecette->setRecette(null);
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
