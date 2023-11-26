<?php

namespace App\Entity;

use App\Repository\AvisRecetteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRecetteRepository::class)]
class AvisRecette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $id_note_recette = null;

    #[ORM\Column]
    private ?int $avis_recette = null;

    #[ORM\ManyToOne(inversedBy: 'avis_recette')]
    private ?Recette $recette = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdNoteRecette(): ?int
    {
        return $this->id_note_recette;
    }

    public function setIdNoteRecette(int $id_note_recette): static
    {
        $this->id_note_recette = $id_note_recette;

        return $this;
    }

    public function getAvisRecette(): ?int
    {
        return $this->avis_recette;
    }

    public function setAvisRecette(int $avis_recette): static
    {
        $this->avis_recette = $avis_recette;

        return $this;
    }

    public function getRecette(): ?Recette
    {
        return $this->recette;
    }

    public function setRecette(?Recette $recette): static
    {
        $this->recette = $recette;

        return $this;
    }
}
