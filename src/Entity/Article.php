<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $num_article = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $texte = null;

    #[ORM\Column(length: 255)]
    private ?string $auteur = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire_publication = null;

    #[ORM\OneToMany(mappedBy: 'article', targetEntity: AvisArticle::class)]
    private Collection $avis_article;

    #[ORM\ManyToOne(inversedBy: 'Article')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $frise_chronologique = null;

    public function __construct()
    {
        $this->avis_article = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumArticle(): ?int
    {
        return $this->num_article;
    }

    public function setNumArticle(int $num_article): static
    {
        $this->num_article = $num_article;

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): static
    {
        $this->texte = $texte;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): static
    {
        $this->auteur = $auteur;

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
     * @return Collection<int, AvisArticle>
     */
    public function getAvisArticle(): Collection
    {
        return $this->avis_article;
    }

    public function addAvisArticle(AvisArticle $avisArticle): static
    {
        if (!$this->avis_article->contains($avisArticle)) {
            $this->avis_article->add($avisArticle);
            $avisArticle->setArticle($this);
        }

        return $this;
    }

    public function removeAvisArticle(AvisArticle $avisArticle): static
    {
        if ($this->avis_article->removeElement($avisArticle)) {
            // set the owning side to null (unless already changed)
            if ($avisArticle->getArticle() === $this) {
                $avisArticle->setArticle(null);
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

    public function getFriseChronologique(): ?string
    {
        return $this->frise_chronologique;
    }

    public function setFriseChronologique(?string $frise_chronologique): static
    {
        $this->frise_chronologique = $frise_chronologique;

        return $this;
    }
}
