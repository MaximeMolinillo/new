<?php

namespace App\Entity;

use App\Repository\AvisEncyclopedieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisEncyclopedieRepository::class)]
class AvisEncyclopedie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $id_note_encyclopedie = null;

    #[ORM\Column]
    private ?int $avis_encyclopedie = null;

    #[ORM\ManyToOne(inversedBy: 'avis_encyclopedie')]
    private ?Encyclopedie $encyclopedie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdNoteEncyclopedie(): ?int
    {
        return $this->id_note_encyclopedie;
    }

    public function setIdNoteEncyclopedie(int $id_note_encyclopedie): static
    {
        $this->id_note_encyclopedie = $id_note_encyclopedie;

        return $this;
    }

    public function getAvisEncyclopedie(): ?int
    {
        return $this->avis_encyclopedie;
    }

    public function setAvisEncyclopedie(int $avis_encyclopedie): static
    {
        $this->avis_encyclopedie = $avis_encyclopedie;

        return $this;
    }

    public function getEncyclopedie(): ?Encyclopedie
    {
        return $this->encyclopedie;
    }

    public function setEncyclopedie(?Encyclopedie $encyclopedie): static
    {
        $this->encyclopedie = $encyclopedie;

        return $this;
    }
}
