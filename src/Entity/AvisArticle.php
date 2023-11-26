<?php

namespace App\Entity;

use App\Repository\AvisArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisArticleRepository::class)]
class AvisArticle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $id_note_article = null;

    #[ORM\Column]
    private ?int $avis_article = null;

    #[ORM\ManyToOne(inversedBy: 'avis_article')]
    private ?Article $article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdNoteArticle(): ?int
    {
        return $this->id_note_article;
    }

    public function setIdNoteArticle(int $id_note_article): static
    {
        $this->id_note_article = $id_note_article;

        return $this;
    }

    public function getAvisArticle(): ?int
    {
        return $this->avis_article;
    }

    public function setAvisArticle(int $avis_article): static
    {
        $this->avis_article = $avis_article;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): static
    {
        $this->article = $article;

        return $this;
    }
}
