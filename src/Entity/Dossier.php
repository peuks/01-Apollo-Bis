<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierRepository::class)
 */
class Dossier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="text",nullable=false)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=100,nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255,nullable=false)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $statut;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="dossier", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        // unset the owning side of the relation if necessary
        if ($user === null && $this->user !== null) {
            $this->user->setDossier(null);
        }

        // set the owning side of the relation if necessary
        if ($user !== null && $user->getDossier() !== $this) {
            $user->setDossier($this);
        }

        $this->user = $user;

        return $this;
    }
}
