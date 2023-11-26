<?php

namespace App\Entity;

use App\Repository\LogRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: true)]
    private ?int $id_log = null;

    #[ORM\Column(length: 255)]
    private ?string $description_log = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    private ?Utilisateur $parent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLog(): ?int
    {
        return $this->id_log;
    }

    public function setIdLog(int $id_log): static
    {
        $this->id_log = $id_log;

        return $this;
    }

    public function getDescriptionLog(): ?string
    {
        return $this->description_log;
    }

    public function setDescriptionLog(string $description_log): static
    {
        $this->description_log = $description_log;

        return $this;
    }

    public function getParent(): ?Utilisateur
    {
        return $this->parent;
    }

    public function setParent(?Utilisateur $parent): static
    {
        $this->parent = $parent;

        return $this;
    }
}
