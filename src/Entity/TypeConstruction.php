<?php

namespace App\Entity;

use App\Repository\TypeConstructionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeConstructionRepository::class)
 */
class TypeConstruction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Bien::class, mappedBy="type")
     */
    private $bien;

    public function __construct()
    {
        $this->bien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Bien[]
     */
    public function getBien(): Collection
    {
        return $this->bien;
    }

    public function addBien(Bien $bien): self
    {
        if (!$this->bien->contains($bien)) {
            $this->bien[] = $bien;
            $bien->setType($this);
        }

        return $this;
    }

    public function removeBien(Bien $bien): self
    {
        if ($this->bien->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getType() === $this) {
                $bien->setType(null);
            }
        }

        return $this;
    }
}
